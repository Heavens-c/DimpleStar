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
            <li class="current"><a href="terminal.php">Terminals</a></li>
			<li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
			<li><a href="book.php">Book Now</a></li>
    	</ul>
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
		<br><br><br>
		<h1>TERMINALS</h1><br>
		<h3>Espana Terminal</h3>
		<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star,+836BAntipoloStSampaloc,521,Manila,&amp;aq=0&amp;oq=Metro+Manila&amp;sll=14.6125312,120.9948033&amp;sspn=0.011772,0.021136&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Dimple+Star&amp;ll=14.6125312,120.9948033&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://www.google.com/maps/place/Dimple+Star/@14.6125312,120.9948033,770m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b60300001d5d:0xd30645794daddf84?hl=en;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
		<br><h4>Contact#+63.02.985.1451/+63.908.926.9163</h4>
		<br /><hr><br />
		<h3>San Jose Terminal</h3>
		<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star+Transport,+BonifacioSt,SanJose,OccidentalMindoro,&amp;aq=0&amp;oq=&amp;sll=12.3540632,121.0618653&amp;sspn=0.011772,0.021136&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Dimple+Star+Transport&amp;ll=12.3540632,121.0618653&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://www.google.com/maps/place/Dimple+Star+Transport/@14.6143711,120.9841972,458m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b5fe6f7ebf6b:0xc34baa5ed38261eb?hl=en;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
		<br><h4>Contact#+63.02.6684151/+63.921.568.6449</h4>
				
				<div id="right">
					<h3><?php include_once("php_includes/date_time.php"); ?></h3>
				</div>			
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