<?php
ini_set('session.use_strict_mode', 1);
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
require_once __DIR__ . '/php_includes/connection.php';

$about = null;
if ($conn) {
  $res = $conn->query("SELECT * FROM about_page WHERE id=1 LIMIT 1");
  if ($res && $res->num_rows) { $about = $res->fetch_assoc(); }
}
if (!$about) {
  // Fallback defaults if DB not available
  $about = [
    'hero_badge'=>'About Us',
    'hero_title'=>'Moving People, Connecting Places',
    'hero_subtitle'=>'Since day one, we’ve focused on safe, reliable, and friendly transport across Metro Manila and Mindoro.',
    'story'=>'We started with a simple goal: make provincial and city travel easier and more comfortable. Today, Dimple Star Transport is trusted by thousands of passengers every year—thanks to our dedicated team, well-maintained fleet, and a culture of care.',
    'c1_icon'=>'fa-shield-heart','c1_title'=>'Safety First','c1_body'=>'Regular vehicle checks, trained drivers, and strict safety protocols keep your journey worry-free.',
    'c2_icon'=>'fa-clock','c2_title'=>'On-Time Schedules','c2_body'=>'We plan smart routes and update schedules so you can get where you’re going—right on time.',
    'c3_icon'=>'fa-people-group','c3_title'=>'Friendly Service','c3_body'=>'Real people who care. From terminals to drop-off points, our team is here to help.',
    'c4_icon'=>'fa-bullseye','c4_title'=>'Mission','c4_body'=>'Deliver dependable transportation that improves everyday life for commuters and communities we serve.',
    'c5_icon'=>'fa-eye','c5_title'=>'Vision','c5_body'=>'Be a leading regional transport partner known for safety, innovation, and customer care.',
    'c6_icon'=>'fa-hands-holding','c6_title'=>'Values','c6_body'=>'Integrity, safety, respect, and continuous improvement—on the road and behind the scenes.',
    'contact_email'=>'info@dimplestar.example','contact_phone'=>'(02) 1234-5678', 'terminals_url'=>'terminal.php'
  ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dimple Star Transport • About Us</title>

<link rel="stylesheet" href="style/modern-style.css">
<link rel="icon" href="images/icon.ico" type="image/x-icon">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
<style>
  .hero { background: var(--gradient-primary); color: #fff; border-radius: 16px; padding: 32px; box-shadow: var(--shadow-lg); }
  .hero h1 { margin: 0 0 8px; font-size: 2rem; }
  .hero p { margin: 0; opacity: .95; }
  .grid { display: grid; gap: 18px; grid-template-columns: repeat(3, minmax(0,1fr)); }
  .grid .card { background: var(--bg-primary); border: 1px solid var(--border-color); border-radius: 12px; padding: 18px; box-shadow: var(--shadow-sm); }
  .grid .card h3 { margin: 0 0 8px; font-size: 1.05rem; }
  .grid .card p { margin: 0; color: var(--text-secondary); }
  .badge { display:inline-flex; align-items:center; gap:.4rem; padding:.35rem .6rem; border-radius:999px; background:var(--bg-accent); color:var(--text-secondary); font-weight:600; font-size:.85rem; }
  .section { margin-top: 22px; }
  .lead { color: var(--text-secondary); }
  @media (max-width: 900px){ .grid { grid-template-columns: 1fr; } }
</style>
</head>
<body>
<div id="wrapper">
  <div id="header">
    <h1><a href="index.php"><i class="fas fa-bus"></i>&nbsp;&nbsp;Dimple Star Transport</a></h1>
    <ul id="mainnav">
      <li><a href="index.php">Home</a></li>
      <li class="current"><a href="about.php">About Us</a></li>
      <li><a href="terminal.php">Terminals</a></li>
      <li><a href="routeschedule.php">Routes / Schedules</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="book.php">Book Now</a></li>
      <?php if (!empty($_SESSION['is_admin'])): ?>
        <li><a href="admin/dashboard.php?tab=about"><i class="fa-solid fa-gauge"></i> Admin</a></li>
      <?php endif; ?>
    </ul>
  </div>

  <div id="content">
    <div id="gallerycontainer">

      <div class="hero">
        <div class="badge"><i class="fa-solid fa-circle-info"></i> <?= htmlspecialchars($about['hero_badge']) ?></div>
        <h1><?= htmlspecialchars($about['hero_title']) ?></h1>
        <p class="lead"><?= htmlspecialchars($about['hero_subtitle']) ?></p>
      </div>

      <div class="section">
        <h2>Our Story</h2>
        <p><?= nl2br(htmlspecialchars($about['story'])) ?></p>
      </div>

      <?php
        $cards = [
          ['icon'=>$about['c1_icon'],'title'=>$about['c1_title'],'body'=>$about['c1_body']],
          ['icon'=>$about['c2_icon'],'title'=>$about['c2_title'],'body'=>$about['c2_body']],
          ['icon'=>$about['c3_icon'],'title'=>$about['c3_title'],'body'=>$about['c3_body']],
          ['icon'=>$about['c4_icon'],'title'=>$about['c4_title'],'body'=>$about['c4_body']],
          ['icon'=>$about['c5_icon'],'title'=>$about['c5_title'],'body'=>$about['c5_body']],
          ['icon'=>$about['c6_icon'],'title'=>$about['c6_title'],'body'=>$about['c6_body']],
        ];
      ?>
      <div class="grid section">
        <?php foreach ($cards as $c): ?>
          <div class="card">
            <h3><i class="fa-solid <?= htmlspecialchars($c['icon']) ?>"></i> <?= htmlspecialchars($c['title']) ?></h3>
            <p><?= nl2br(htmlspecialchars($c['body'])) ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="section">
        <h2>Contact & Support</h2>
        <p class="lead">Questions about routes, schedules, or bookings? We’re here:</p>
        <ul>
          <li><i class="fa-solid fa-envelope"></i> Email: <a href="mailto:<?= htmlspecialchars($about['contact_email']) ?>"><?= htmlspecialchars($about['contact_email']) ?></a></li>
          <li><i class="fa-solid fa-phone"></i> Phone: <?= htmlspecialchars($about['contact_phone']) ?></li>
          <li><i class="fa-solid fa-location-dot"></i> Terminals: See <a href="<?= htmlspecialchars($about['terminals_url']) ?>">all terminals</a></li>
        </ul>
      </div>

    </div>
  </div>

  <div id="footer">
    <a href="index.php"><img src="images/Transport.jpg" alt="Dimple Star Transport" /></a>
    <p>&copy; <?= date('Y'); ?> Dimple Star Transport. All rights reserved.<br />
      Providing reliable transportation services across Metro Manila and Mindoro Province.
    </p>
  </div>
</div>
</body>
</html>
