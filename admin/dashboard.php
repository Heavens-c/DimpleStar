<?php
// /admin/dashboard.php
ini_set('session.use_strict_mode', 1);
session_start();
if (empty($_SESSION['is_admin'])) { header("Location: ../login.php"); exit; }

// DB connection (must define $conn)
require_once __DIR__ . '/../php_includes/connection.php';

// CSRF for dashboard forms
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(32)); }

// Simple audit helper (local; avoids other includes)
function audit_log(mysqli $conn, string $actor, string $action): void {
  $ip = $_SERVER['REMOTE_ADDR'] ?? '';
  $ua = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500);
  if ($stmt = $conn->prepare("INSERT INTO audit_trail (actor, action, ip_address, user_agent) VALUES (?,?,?,?)")) {
    $stmt->bind_param("ssss", $actor, $action, $ip, $ua);
    $stmt->execute();
    $stmt->close();
  }
}

$tab = $_GET['tab'] ?? 'overview';

/* ----------------------------------------------------------------
   ABOUT PAGE (DB-backed) : load / save + audit
----------------------------------------------------------------- */
$about_notice = $about_error = '';
$about_row = null;

if ($tab === 'about') {
  // 1) Ensure table exists
  $conn->query("CREATE TABLE IF NOT EXISTS about_page (
    id TINYINT UNSIGNED NOT NULL PRIMARY KEY,
    hero_badge     VARCHAR(64)  NOT NULL DEFAULT 'About Us',
    hero_title     VARCHAR(255) NOT NULL DEFAULT 'Moving People, Connecting Places',
    hero_subtitle  TEXT         NOT NULL,
    story          TEXT         NOT NULL,
    c1_icon        VARCHAR(64)  NOT NULL DEFAULT 'fa-shield-heart',
    c1_title       VARCHAR(100) NOT NULL DEFAULT 'Safety First',
    c1_body        TEXT         NOT NULL,
    c2_icon        VARCHAR(64)  NOT NULL DEFAULT 'fa-clock',
    c2_title       VARCHAR(100) NOT NULL DEFAULT 'On-Time Schedules',
    c2_body        TEXT         NOT NULL,
    c3_icon        VARCHAR(64)  NOT NULL DEFAULT 'fa-people-group',
    c3_title       VARCHAR(100) NOT NULL DEFAULT 'Friendly Service',
    c3_body        TEXT         NOT NULL,
    c4_icon        VARCHAR(64)  NOT NULL DEFAULT 'fa-bullseye',
    c4_title       VARCHAR(100) NOT NULL DEFAULT 'Mission',
    c4_body        TEXT         NOT NULL,
    c5_icon        VARCHAR(64)  NOT NULL DEFAULT 'fa-eye',
    c5_title       VARCHAR(100) NOT NULL DEFAULT 'Vision',
    c5_body        TEXT         NOT NULL,
    c6_icon        VARCHAR(64)  NOT NULL DEFAULT 'fa-hands-holding',
    c6_title       VARCHAR(100) NOT NULL DEFAULT 'Values',
    c6_body        TEXT         NOT NULL,
    contact_email  VARCHAR(191) NOT NULL DEFAULT 'info@dimplestar.example',
    contact_phone  VARCHAR(64)  NOT NULL DEFAULT '(02) 1234-5678',
    terminals_url  VARCHAR(191) NOT NULL DEFAULT 'terminal.php',
    updated_at     DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

  // 2) Seed a default row if empty
  $res = $conn->query("SELECT COUNT(*) c FROM about_page");
  if ($res && (int)$res->fetch_assoc()['c'] === 0) {
    $conn->query("INSERT INTO about_page (id, hero_subtitle, story, c1_body, c2_body, c3_body, c4_body, c5_body, c6_body)
      VALUES (1,
        'Since day one, we’ve focused on safe, reliable, and friendly transport across Metro Manila and Mindoro.',
        'We started with a simple goal: make provincial and city travel easier and more comfortable. Today, Dimple Star Transport is trusted by thousands of passengers every year—thanks to our dedicated team, well-maintained fleet, and a culture of care.',
        'Regular vehicle checks, trained drivers, and strict safety protocols keep your journey worry-free.',
        'We plan smart routes and update schedules so you can get where you’re going—right on time.',
        'Real people who care. From terminals to drop-off points, our team is here to help.',
        'Deliver dependable transportation that improves everyday life for commuters and communities we serve.',
        'Be a leading regional transport partner known for safety, innovation, and customer care.',
        'Integrity, safety, respect, and continuous improvement—on the road and behind the scenes.'
      )");
  }

  // 3) Save (POST)
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['csrf']) || !hash_equals($_SESSION['csrf'], (string)$_POST['csrf'])) {
      $about_error = 'Invalid session. Please reload and try again.';
    } else {
      $fields = [
        'hero_badge','hero_title','hero_subtitle','story',
        'c1_icon','c1_title','c1_body',
        'c2_icon','c2_title','c2_body',
        'c3_icon','c3_title','c3_body',
        'c4_icon','c4_title','c4_body',
        'c5_icon','c5_title','c5_body',
        'c6_icon','c6_title','c6_body',
        'contact_email','contact_phone','terminals_url'
      ];
      $placeholders = implode('=?, ', $fields) . '=?';
      $sql = "UPDATE about_page SET $placeholders WHERE id=1";
      if ($stmt = $conn->prepare($sql)) {
        $vals = [];
        foreach ($fields as $f) { $vals[] = (string)($_POST[$f] ?? ''); }
        $types = str_repeat('s', count($vals));
        $stmt->bind_param($types, ...$vals);
        if ($stmt->execute()) {
          $about_notice = 'About page saved.';
          audit_log($conn, $_SESSION['email'], 'about_update'); // <— audit!
        } else {
          $about_error = 'Save failed.';
        }
        $stmt->close();
      } else {
        $about_error = 'Server error. Please try again.';
      }
    }
  }

  // 4) Load current row for form
  $about_row = $conn->query("SELECT * FROM about_page WHERE id=1")->fetch_assoc();
}

/* ----------------------------------------------------------------
   AUDIT TAB: search/pagination
----------------------------------------------------------------- */
$search = trim($_GET['q'] ?? '');
$page   = max(1, (int)($_GET['page'] ?? 1));
$limit  = 10;
$offset = ($page - 1) * $limit;

$totalRows = 0;
$rows = [];
if ($tab === 'audit') {
  if ($search !== '') {
    $like = '%'.$search.'%';
    $count = $conn->prepare("SELECT COUNT(*) c FROM audit_trail WHERE actor LIKE ? OR action LIKE ? OR ip_address LIKE ?");
    $count->bind_param("sss", $like, $like, $like);
    $count->execute();
    $totalRows = (int)$count->get_result()->fetch_assoc()['c'];
    $count->close();

    $stmt = $conn->prepare("SELECT id, actor, action, ip_address, user_agent, created_at
                            FROM audit_trail
                            WHERE actor LIKE ? OR action LIKE ? OR ip_address LIKE ?
                            ORDER BY created_at DESC
                            LIMIT ? OFFSET ?");
    $stmt->bind_param("sssii", $like, $like, $like, $limit, $offset);
  } else {
    $resCount = $conn->query("SELECT COUNT(*) c FROM audit_trail");
    $totalRows = (int)$resCount->fetch_assoc()['c'];

    $stmt = $conn->prepare("SELECT id, actor, action, ip_address, user_agent, created_at
                            FROM audit_trail
                            ORDER BY created_at DESC
                            LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $limit, $offset);
  }
  $stmt->execute();
  $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $totalPages = max(1, (int)ceil($totalRows / $limit));
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../style/modern-style.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .shell { min-height: 100vh; display:flex; flex-direction:column; background: var(--bg-secondary); }
    .app-header { height:64px; background: var(--bg-primary); border-bottom:1px solid var(--border-color);
      display:flex; align-items:center; justify-content:space-between; padding:0 1rem; position:sticky; top:0; z-index:20; }
    .brand { display:flex; align-items:center; gap:.6rem; font-weight:700; color:var(--text-primary); }
    .brand i { color: var(--primary-color); }
    .userbox { display:flex; align-items:center; gap:.6rem; }
    .wrap { flex:1; display:flex; min-height: calc(100vh - 64px - 60px); }
    .sidebar { width:260px; background:var(--bg-primary); border-right:1px solid var(--border-color);
      box-shadow: var(--shadow-sm); padding: .9rem; position:sticky; top:64px; height: calc(100vh - 64px); overflow:auto; }
    .toggle { display:none; }
    .navlink { display:flex; align-items:center; gap:.6rem; padding:.55rem .7rem; border-radius:10px; color:var(--text-primary); text-decoration:none; margin-bottom:.25rem; }
    .navlink:hover, .navlink.active { background: var(--gradient-primary); color:#fff; box-shadow: var(--shadow-md); transform: translateY(-1px); }
    .main { flex:1; padding: 1rem 1.25rem; }
    .cards { display:grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap:1rem; }
    .cardx { background:var(--bg-primary); border:1px solid var(--border-color); border-radius:12px; box-shadow:var(--shadow-sm); padding:1rem; }
    .cardx h3 { font-size:.95rem; color:var(--text-secondary); margin-bottom:.25rem; }
    .cardx .num { font-size:1.6rem; font-weight:700; color:var(--text-primary); }
    .tab-title { display:flex; align-items:center; gap:.6rem; margin-bottom:1rem; }
    .table-wrap { overflow:auto; background:var(--bg-primary); border:1px solid var(--border-color); border-radius:12px; }
    table { width:100%; border-collapse:collapse; }
    th, td { padding:.75rem 1rem; border-bottom:1px solid var(--border-color); vertical-align:top; }
    th { text-align:left; font-size:.9rem; color:var(--text-secondary); background: var(--bg-accent); }
    .toolbar { display:flex; gap:.5rem; justify-content:space-between; margin-bottom:.75rem; }
    .toolbar form { display:flex; gap:.5rem; }
    .app-footer { height:60px; display:flex; align-items:center; justify-content:center; border-top:1px solid var(--border-color); background:var(--bg-primary); }
    @media (max-width: 992px) {
      .sidebar { position:fixed; left:-270px; top:64px; transition:.25s; z-index:999; }
      .sidebar.open { left:0; }
      .toggle { display:inline-flex; align-items:center; gap:.4rem; }
      .cards { grid-template-columns: repeat(2, minmax(0,1fr)); }
    }
    @media (max-width: 600px) { .cards { grid-template-columns: 1fr; } }
  </style>
</head>
<body>
<div class="shell">

  <!-- Header -->
  <header class="app-header">
    <div class="brand">
      <button id="btnSidebar" class="btn btn-sm btn-outline-secondary toggle"><i class="fa fa-bars"></i></button>
      <i class="fa-solid fa-rectangle-list"></i>
      <span>Admin Dashboard</span>
    </div>
    <div class="userbox">
      <span class="small text-muted">Signed in as <strong><?= htmlspecialchars($_SESSION['email']) ?></strong></span>
      <a class="btn btn-sm btn-outline-secondary" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
  </header>

  <div class="wrap">
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
      <nav>
        <a class="navlink <?= $tab==='overview'?'active':'' ?>" href="?tab=overview"><i class="fa-solid fa-gauge"></i> Overview</a>
        <a class="navlink <?= $tab==='audit'?'active':'' ?>" href="?tab=audit"><i class="fa-solid fa-clipboard-list"></i> Audit Trail</a>
        <a class="navlink <?= $tab==='about'?'active':'' ?>" href="?tab=about"><i class="fa-solid fa-file-lines"></i> About Page</a>
      </nav>
    </aside>

    <!-- Main -->
    <main class="main">
      <?php if ($tab === 'overview'): ?>
        <div class="tab-title"><i class="fa-solid fa-gauge"></i><h2>Overview</h2></div>
        <div class="cards">
          <div class="cardx">
            <h3>Total Members</h3>
            <div class="num">
              <?php $r = $conn->query("SELECT COUNT(*) c FROM members"); echo (int)$r->fetch_assoc()['c']; ?>
            </div>
          </div>
          <div class="cardx">
            <h3>Audit Entries</h3>
            <div class="num">
              <?php $r = $conn->query("SELECT COUNT(*) c FROM audit_trail"); echo (int)$r->fetch_assoc()['c']; ?>
            </div>
          </div>
          <div class="cardx">
            <h3>Last Login (You)</h3>
            <div class="num">
              <?php
                if ($p = $conn->prepare("SELECT created_at FROM audit_trail WHERE action='login_success' AND actor=? ORDER BY created_at DESC LIMIT 1")) {
                  $p->bind_param("s", $_SESSION['email']);
                  $p->execute();
                  $res = $p->get_result()->fetch_assoc();
                  echo $res ? htmlspecialchars($res['created_at']) : '—';
                  $p->close();
                } else { echo '—'; }
              ?>
            </div>
          </div>
          <div class="cardx">
            <h3>System</h3>
            <div class="num">OK</div>
          </div>
        </div>

      <?php elseif ($tab === 'audit'): ?>
        <div class="tab-title"><i class="fa-solid fa-clipboard-list"></i><h2>Audit Trail</h2></div>

        <div class="toolbar">
          <form method="GET" role="search">
            <input type="hidden" name="tab" value="audit">
            <input class="form-control" type="search" name="q" value="<?= htmlspecialchars($search) ?>" placeholder="Search actor, action, IP...">
            <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
            <?php if ($search): ?>
              <a class="btn btn-outline-secondary" href="?tab=audit"><i class="fa fa-times"></i></a>
            <?php endif; ?>
          </form>
          <div>
            <a class="btn btn-outline-primary" href="export_audit_csv.php<?= $search ? ('?q=' . urlencode($search)) : '' ?>">
              <i class="fa-solid fa-file-csv"></i> Export CSV
            </a>
          </div>
        </div>

        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th width="70">ID</th>
                <th>Actor</th>
                <th>Action</th>
                <th>IP</th>
                <th>User Agent</th>
                <th width="180">Timestamp</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!$rows): ?>
                <tr><td colspan="6" style="text-align:center; padding:1.25rem;">No audit records found.</td></tr>
              <?php else: foreach ($rows as $r): ?>
                <tr>
                  <td><?= (int)$r['id'] ?></td>
                  <td><?= htmlspecialchars($r['actor']) ?></td>
                  <td><code><?= htmlspecialchars($r['action']) ?></code></td>
                  <td><?= htmlspecialchars($r['ip_address']) ?></td>
                  <td style="max-width:360px;word-break:break-word;"><?= htmlspecialchars($r['user_agent']) ?></td>
                  <td><?= htmlspecialchars($r['created_at']) ?></td>
                </tr>
              <?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>

        <?php if (($totalPages ?? 1) > 1): ?>
          <div class="pager" style="display:flex; gap:.3rem; flex-wrap:wrap; margin-top:.75rem;">
            <?php
              $base = '?tab=audit' . ($search ? '&q=' . urlencode($search) : '');
              for ($i=1; $i<=$totalPages; $i++):
                if ($i === $page) echo '<span class="btn btn-sm btn-primary">'.$i.'</span>';
                else echo '<a class="btn btn-sm btn-outline-secondary" href="'.$base.'&page='.$i.'">'.$i.'</a>';
              endfor;
            ?>
          </div>
        <?php endif; ?>

      <?php elseif ($tab === 'about'): ?>
        <div class="tab-title"><i class="fa-solid fa-file-lines"></i><h2>About Page</h2></div>

        <?php if ($about_notice): ?><div class="alert alert-success"><?= htmlspecialchars($about_notice) ?></div><?php endif; ?>
        <?php if ($about_error):  ?><div class="alert alert-danger"><?= htmlspecialchars($about_error) ?></div><?php endif; ?>

        <form method="post" action="?tab=about" class="mb-3">
          <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">

          <div class="cardx mb-3">
            <h3>Hero</h3>
            <div class="row g-2">
              <div class="col-md-3"><label class="form-label">Badge</label>
                <input class="form-control" name="hero_badge" value="<?= htmlspecialchars($about_row['hero_badge']) ?>">
              </div>
              <div class="col-md-9"><label class="form-label">Title</label>
                <input class="form-control" name="hero_title" value="<?= htmlspecialchars($about_row['hero_title']) ?>">
              </div>
              <div class="col-12"><label class="form-label">Subtitle</label>
                <textarea class="form-control" name="hero_subtitle" rows="2"><?= htmlspecialchars($about_row['hero_subtitle']) ?></textarea>
              </div>
            </div>
          </div>

          <div class="cardx mb-3">
            <h3>Story</h3>
            <textarea class="form-control" name="story" rows="3"><?= htmlspecialchars($about_row['story']) ?></textarea>
          </div>

          <?php $cards = [1,2,3,4,5,6]; ?>
          <div class="row">
            <?php foreach ($cards as $i): ?>
              <div class="col-md-6">
                <div class="cardx mb-3">
                  <h3>Card <?= $i ?></h3>
                  <div class="row g-2">
                    <div class="col-md-4"><label class="form-label">Icon (Font Awesome)</label>
                      <input class="form-control" name="c<?= $i ?>_icon" value="<?= htmlspecialchars($about_row['c'.$i.'_icon']) ?>">
                      <div class="small text-muted mt-1"><code>fa-shield-heart</code>, <code>fa-clock</code>, etc.</div>
                    </div>
                    <div class="col-md-8"><label class="form-label">Title</label>
                      <input class="form-control" name="c<?= $i ?>_title" value="<?= htmlspecialchars($about_row['c'.$i.'_title']) ?>">
                    </div>
                    <div class="col-12"><label class="form-label">Body</label>
                      <textarea class="form-control" rows="3" name="c<?= $i ?>_body"><?= htmlspecialchars($about_row['c'.$i.'_body']) ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="cardx mb-3">
            <h3>Contact</h3>
            <div class="row g-2">
              <div class="col-md-5"><label class="form-label">Email</label>
                <input class="form-control" name="contact_email" value="<?= htmlspecialchars($about_row['contact_email']) ?>">
              </div>
              <div class="col-md-4"><label class="form-label">Phone</label>
                <input class="form-control" name="contact_phone" value="<?= htmlspecialchars($about_row['contact_phone']) ?>">
              </div>
              <div class="col-md-3"><label class="form-label">Terminals URL</label>
                <input class="form-control" name="terminals_url" value="<?= htmlspecialchars($about_row['terminals_url']) ?>">
              </div>
            </div>
          </div>

          <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
          <a class="btn btn-outline-secondary" target="_blank" href="../about.php"><i class="fa-solid fa-up-right-from-square"></i> View</a>
        </form>
      <?php endif; ?>
    </main>
  </div>

  <footer class="app-footer">
    <div class="text-muted small">© <?= date('Y') ?> • Admin Dashboard</div>
  </footer>
</div>

<script>
  const btn = document.getElementById('btnSidebar');
  const sb  = document.getElementById('sidebar');
  if (btn && sb) btn.addEventListener('click', () => sb.classList.toggle('open'));
</script>
</body>
</html>
