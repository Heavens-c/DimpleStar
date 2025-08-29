<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dimple Star Transport</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="icon" href="images/icon.ico" type="image/x-con">
</head>
<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="images/logo.png" class="logo" alt="Dimple Star Transport" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
			<li class="current"><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
			<li><a href="book.php">Book Now</a></li>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
			<div style="margin:0 auto; padding:30px 20px 20px 20px; width:820px;">
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
									echo "<a href='signlog.php'></a>.";
								}?>
						</div>
					</div>
				<div id="right">
					<h3><?php include_once("php_includes/date_time.php"); ?></h3>
				</div>
				<img src="images/route.png" / width="820">
				<h2>(All trips are vice versa)</h2><hr>
				<table style="width:70%">
				  <tr>
					<br>
					<td><h3>Origin</h3></td>
					<td><h3>Regular Schedule</h3></td>		
					<td><h3>Destination</h3></td>
				  </tr>
				  <tr>
					<td>Ali Mall Cubao Terminal</td>
					<td>9:00 am / 10:00 am / 1:00 pm / 4:00pm</td>		
					<td>San Jose</td>
				  </tr>
				  <tr>
					<td>Alabang Terminal</td>
					<td>6:00 am / 7:00 am / 2:00 pm / 6:00 pm / 10:00 pm</td>	
					<td>San Jose</td>
				  </tr>
				  <tr>
					<td>Cabuyao Terminal</td>
					<td>8:00 am / 9:00 am / 4:00 pm / 8:00 pm</td>		
					<td>San Jose</td>
				  </tr>
				  <tr>
					<td>Espana Terminal</td>
					<td>4:30 am / 5:30 am / 12:00 am / 4:00 pm / 8:00 pm</td>	
					<td>San Jose</td>
				  </tr>
				  <tr>
					<td>San Lazaro Terminal</td>
					<td>3:00 am / 4:30 am / 11:00 am / 3:00 pm / 7:00 pm</td>	
					<td>San Jose</td>
				  </tr>
				  <tr>
					<td>Pasay Terminal</td>
					<td>5:00 am / 6:00 am / 1:00 pm / 3:00pm</td>	
					<td>San Jose</td>
				  </tr>
				</table>
				<div class="column-clear"></div>
            </div>
				<div class="clearfix"></div>
        </div>
    </div>
    
<div id="footer">
	<a href="index.php"><img src="images/footer-logo.jpg" alt="Dimple Star Transport" /></a>
	<p>&copy;Dimple Star Transport<br /></p>
</div>

</div>
</body>
</html>