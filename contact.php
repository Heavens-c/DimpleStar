<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dimple Star Transport</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="icon" href="images/icon.ico" type="image/x-con">
<style>
.submit{
	width:140px;
	padding:10px;
}
.submit:hover{
	background:#ECBD2F;
	border-radius:5px;
}
</style>

</head>
<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="images/logo.png" class="logo" alt="Dimple Star Transport" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
			<li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li class="current"><a href="contact.php">Contact</a></li>
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
					<br><br><br><h1>CONTACT US</h1><br>
					Dimple Star Transport<br>
					Block 1 lot 10, southpoint Subd.<br>
					Brgy Banay-Banay, Cabuyao, Laguna<br>
					Phone:  0929 209 0712<br><br>
				<div id="contactright">
					<h3>Message Form</h3>
					<form class="validate" action="messageexec.php" method="POST">
                        <p>
                            <label for="name" class="required label">Name:</label><br>
                            <input id="name" class="contactform" type="text" name="name" />
                        </p>
                        <p>
                            <label for="email" class="required label">Email:</label><br>
                            <input id="email" class="contactform" placeholder="Example: aaron@gwaps.com" type="text" name="email" />
                        </p>
                        <p>
                            <label for="subject" class="required label">Subject:</label><br>
                            <input id="subject" class="contactform" type="text" name="subject" />
                        </p>
                        <p>
                            <label id="message-label" for="message" class="required label">Message:</label><br>
                            <textarea id="message" class="contactform" name="message" cols="28" rows="5"></textarea>
                        </p>
                        <p>
                            <label></label>
                            <input class="submit" id="submit-button" type="submit" name="Submit" value="Submit" />
                        </p>
                    </form>
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