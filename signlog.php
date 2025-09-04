<?php
// ---- DATABASE CONNECT (no scary warnings on top) ----
mysqli_report(MYSQLI_REPORT_OFF);                 // don’t spew warnings
$con = @mysqli_connect("localhost", "root", "", "dimplestar");
$db_ok = (bool) $con;

$errors = [];
$successful = "";

// Only attempt registration logic if DB is OK and form was posted
if ($db_ok && $_SERVER['REQUEST_METHOD'] === 'POST') {

    // Basic validation
    if (preg_match("/\S+/", $_POST['fname'] ?? '') === 0) {
        $errors['fname'] = "* First Name is required.";
    }
    if (preg_match("/\S+/", $_POST['lname'] ?? '') === 0) {
        $errors['lname'] = "* Last Name is required.";
    }
    if (preg_match("/.+@.+\..+/", $_POST['email'] ?? '') === 0) {
        $errors['email'] = "* Not a valid e-mail address.";
    }
    if (preg_match("/.{8,}/", $_POST['password'] ?? '') === 0) {
        $errors['password'] = "* Password must contain at least 8 characters.";
    }
    if (strcmp($_POST['password'] ?? '', $_POST['confirm_password'] ?? '') !== 0) {
        $errors['confirm_password'] = "* Passwords do not match.";
    }

    // Create account
    if (count($errors) === 0) {
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);

        // (keeping your hashing approach)
        $password = hash('sha256', $_POST['password']);
        function createSalt() {
            $string = md5(uniqid(rand(), true));
            return substr($string, 0, 3);
        }
        $salt = createSalt();
        $password = hash('sha256', $salt . $password);

        $search_query = mysqli_query($con, "SELECT 1 FROM members WHERE email = '$email' LIMIT 1");
        $num_row = $search_query ? mysqli_num_rows($search_query) : 0;

        if ($num_row >= 1) {
            $errors['email'] = "Email address is unavailable.";
        } else {
            $sql = "INSERT INTO members(`fname`, `lname`, `email`, `salt`, `password`)
                    VALUES ('$fname', '$lname', '$email', '$salt', '$password')";
            mysqli_query($con, $sql);
            $_POST['fname'] = $_POST['lname'] = $_POST['email'] = '';
            $successful = "<div class='message success'>You are successfully registered.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dimple Star Transport • Sign In / Sign Up</title>

<link rel="stylesheet" href="style/modern-style.css">
<link rel="icon" href="images/icon.ico" type="image/x-icon">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Page-only tweaks to keep the boxes neat -->
<style>
  #gallerycontainer { padding-bottom: 0; }
  .auth-wrapper { padding: 24px; }
  .auth-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
  }
  .card {
    background: var(--bg-primary);
    border-radius: 12px;
    box-shadow: var(--shadow-lg);
    padding: 20px;
  }
  .card h2 { display:flex; align-items:center; gap:10px; margin:0 0 8px; }
  .card p.lead { color: var(--text-secondary); margin: 0 0 16px; }

  .card table { width:100%; border-collapse:separate; border-spacing:0 10px; }
  .card th { text-align:left; font-weight:600; color:var(--text-secondary); padding:0 6px; }
  .card td { padding:0 6px; vertical-align:middle; }

  .card input[type="text"],
  .card input[type="email"],
  .card input[type="password"]{
    width:100%;
    padding:.75rem .9rem;
    border:2px solid var(--border-color);
    border-radius:8px;
    background:var(--bg-primary);
    font:inherit;
    transition:.2s;
  }
  .card input:focus{
    outline:none; border-color:var(--primary-color);
    box-shadow:0 0 0 3px rgba(14,165,233,.15);
  }

  .card input[type="submit"],
  .card #login,
  .card #submit{
    background:var(--gradient-primary);
    color:#fff; border:0;
    padding:.8rem 1.4rem; border-radius:8px;
    font-weight:600; cursor:pointer; transition:.2s; box-shadow:var(--shadow-md);
  }
  .card input[type="submit"]:hover,
  .card #login:hover,
  .card #submit:hover{
    transform:translateY(-2px);
    box-shadow:var(--shadow-lg);
    background:var(--gradient-secondary);
  }

  .message.success { background:#d1fae5; color:#065f46; border:1px solid #a7f3d0; padding:.8rem 1rem; border-radius:8px; margin-bottom:10px; }
  h2 { margin:4px 0 0; color:#b91c1c; font-size:.95rem; }

  .db-warning{
    margin:16px 24px 0;
    background:#fff3cd; color:#7a5d00; border:1px solid #ffe69c;
    padding:.8rem 1rem; border-radius:8px; font-weight:600;
  }

  @media (max-width: 900px){ .auth-grid { grid-template-columns:1fr; } }
</style>
</head>
<body>

<div id="wrapper">
  <!-- HEADER -->
	<div id="header">
    <h1><a href="index.php"><i class="fas fa-bus"></i>&nbsp;&nbsp;Dimple Star Transport</a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
			<li class="current"><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
			<li><a href="book.php">Book Now</a></li>
    	</ul>
	</div>

  <!-- CONTENT -->
  <div id="content">
    <div id="gallerycontainer">
      <div class="login">
        <div>Welcome to Dimple Star Transport</div>
        <div><a href="index.php"><i class="fa-solid fa-house"></i> Back to Home</a></div>
      </div>

      <?php if(!$db_ok): ?>
        <div class="db-warning">
          Can’t connect to database <strong>users_db</strong>. Please create it in phpMyAdmin
          (or change the DB name in <code>signlog.php</code> line 4). The forms are shown below,
          but registration won’t work until the database is available.
        </div>
      <?php endif; ?>

      <div class="auth-wrapper">
        <div class="auth-grid">
          <!-- SIGN IN -->
          <div class="card">
            <h2><i class="fa-solid fa-right-to-bracket"></i> Sign In</h2>
            <p class="lead">Access your bookings and profile.</p>
            <form method="post" action="login.php" autocomplete="on">
              <table>
                <tr>
                  <th style="width:45%;">E-mail</th>
                  <th>Password</th>
                </tr>
                <tr>
                  <td><input type="email" name="login_email" id="login_email" placeholder="you@email.com" required></td>
                  <td><input type="password" name="login_password" id="login_password" placeholder="••••••••" required></td>
                </tr>
                <tr>
                  <td colspan="2" style="padding-top:8px;">
                    <input type="submit" name="submit" id="login" value="Login">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <?php if(isset($_GET['message'])){ echo "<h2>".htmlspecialchars($_GET['message'])."</h2>"; } ?>
                  </td>
                </tr>
              </table>
            </form>
          </div>

          <!-- SIGN UP -->
          <div class="card">
            <h2><i class="fa-solid fa-user-plus"></i> Create Account</h2>
            <p class="lead">New here? Register in seconds.</p>

            <?php if($successful){ echo $successful; } ?>

            <form method="post" action="signlog.php" autocomplete="on">
              <table>
                <tr>
                  <td><input type="text" name="fname" id="fname" placeholder="First Name"
                    value="<?php if(isset($_POST['fname'])){echo htmlspecialchars($_POST['fname']);} ?>" required></td>
                  <td><input type="text" name="lname" id="lname" placeholder="Last Name"
                    value="<?php if(isset($_POST['lname'])){echo htmlspecialchars($_POST['lname']);} ?>" required></td>
                </tr>
                <tr>
                  <td><?php if(isset($errors['fname'])){echo "<h2>".$errors['fname']."</h2>"; } ?></td>
                  <td><?php if(isset($errors['lname'])){echo "<h2>".$errors['lname']."</h2>"; } ?></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <input type="email" name="email" id="email" placeholder="E-mail Address"
                      value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['email']);} ?>" required>
                  </td>
                </tr>
                <tr>
                  <td colspan="2"><?php if(isset($errors['email'])){echo "<h2>".$errors['email']."</h2>"; } ?></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <input type="password" name="password" id="pw" placeholder="Password (min. 8 characters)" required>
                  </td>
                </tr>
                <tr>
                  <td colspan="2"><?php if(isset($errors['password'])){echo "<h2>".$errors['password']."</h2>"; } ?></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <input type="password" name="confirm_password" id="cpw" placeholder="Confirm Password" required>
                  </td>
                </tr>
                <tr>
                  <td colspan="2"><?php if(isset($errors['confirm_password'])){echo "<h2>".$errors['confirm_password']."</h2>"; } ?></td>
                </tr>
                <tr>
                  <td><input type="submit" name="submit" id="submit" value="Sign Up"></td>
                </tr>
              </table>
            </form>
          </div>
        </div><!-- /.auth-grid -->
      </div><!-- /.auth-wrapper -->
    </div><!-- /#gallerycontainer -->
  </div><!-- /#content -->

  <!-- FOOTER -->
  <div id="footer">
    <a href="index.php"><img src="images/Transport.jpg" alt="Dimple Star Transport" /></a>
    <p>&copy; <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.<br />
      Providing reliable transportation services across Metro Manila and Mindoro Province.
    </p>
  </div>
</div>

</body>
</html>
