<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dimple Star Transport</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="icon" href="images/icon.ico" type="image/x-con">
<script src="slide/js/jquery.js"></script>
<script src="slide/js/amazingslider.js"></script>
<script src="slide/js/initslider-1.js"></script>
<script src="slide/js/chatbot.js"></script>
</head>
<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="images/logo.png" class="logo" alt="Dimple Star Transport" /></a></h1>
        <ul id="mainnav">
			<li class="current"><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
			<li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
			<li><a href="book.php">Book Now</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
			<div style="margin:10 auto; padding:30px 20px 20px 20px;">	
				<div class="login">
					<div id="right">
						<?php
							session_start();
							if(isset($_SESSION['email'])){
								$email = $_SESSION['email'];
								echo "Welcome,". $email. "!";
								echo "<a href='logout.php'>Logout</a>";
							}
							if(empty($email)){
								echo "<a href='signlog.php'>SignUp / Login</a>.";
							}?>
					</div>
				</div>
				<div style="margin:0px auto;max-width:1024px;">
					<div id="amazingslider-1">
						<ul class="amazingslider-slides" style="display:none;">
						<li><img src="slide/images/b1.png" /> </li>
						<li><img src="slide/images/b2.png" /></li>
						<li><img src="slide/images/b3.png" /></li>
						<li><img src="slide/images/b4.png" /></li>
						</ul>
					</div>
				</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	Contact us at:
	<h2>0929 209 0712</h2>
	Block 1 lot 10, southpoint Subd.<br>
	Brgy Banay-Banay, Cabuyao, Laguna<br>

	<div id="right">
		<h3><?php include_once("php_includes/date_time.php"); ?></h3>
	</div>			
				<div class="column-clear"></div>
            </div>
				<div class="clearfix"></div>
        </div>
    </div>    
  <footer id="footer" class="site-footer" role="contentinfo">
    <div class="container footer-inner">
      <a href="index.php" class="footer-logo" aria-label="Dimple Star Transport home">
        <img src="images/wifi.png" alt="Dimple Star Transport" loading="lazy" />
      </a>
      <p class="muted">&copy; Dimple Star Transport</p>
    </div>
  </footer>


</div>
</body>
</html>