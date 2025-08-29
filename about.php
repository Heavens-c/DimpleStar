<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dimple Star Transport</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="icon" href="images/icon.ico" type="image/x-con">
<style>

</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="images/logo.png" class="logo" alt="Dimple Star Transport" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
			<li class="current"><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
			<li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
			<li><a href="book.php">Book Now</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
			<div  style="margin:0 auto; padding:30px 20px 20px 20px; width:820px;">	
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
				</div><div id="right">
						<h3><?php include_once("php_includes/date_time.php"); ?></h3>
					</div>
		<br><br><br>
		<h1>ABOUT US</h1><br>
					<img src="images/oldbus.jpg" alt="" width="470">
				<div id ="fb">
					<?php include_once("php_includes/fblike.php"); ?>
				</div>
				<h3>History</h3>
				Photo taken on October 16, 1993. Napat Transit (now Dimple Star Transport) NVR-963<br>
				(fleet No 800) going to Alabang and jeepneys under the Light Rail Line in Taft Ave near<br>
				United Nations Avenue, Ermita, Manila, Philippines.
				<br>
				Year 2004 of May changes has been made, Napat Transit became Dimple Star Transport.
				<br>
				<table style="width:55%">
				  <tr>
					<br>
					<td><h3>Mission</h3></th>
					<td><h3>Vision</h3></th>		
				  </tr>
				  <tr>
				  	<td>To provide superior transport service to Metro Manila and Mindoro Province commuters. </td>
					<td>To lead the bus transport industry through its innovation service to the riding public. </td>		
					
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