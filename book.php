<!DOCTYPE html>
<?php
	include 'php_includes/connection.php';
	include 'php_includes/book.php';
?>
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
			<li><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
			<li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
			<li class="current"><a href="book.php">Book Now</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer2">
			<div style="margin:0 auto; padding:30px 20px 20px 20px; width:820px;">	
					<div class="login">
						<!-- <div id="right">
							<?php
								session_start();
								if(isset($_SESSION['email'])){
									$email = $_SESSION['email'];
									echo "Welcome,". $email. "!";
									echo "<a href='logout.php'>Logout</a>";
								}
								if(empty($email)){
									echo "<a href='signlog.php'></a>.";
								}
								?>
						</div> -->	
					</div>
					<div id="right">
						<h3><?php include_once("php_includes/date_time.php"); ?></h3>
					</div><br><br><br>
		
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table height="50%" width="30%" border="0" align="left">
		<tr>
			<td colspan="4"> <h1> BOOK NOW!</h1><br> </td>
		</tr>
		<tr>
			<td  colspan="4"><input type="radio" name="way" value="2" onclick="document.getElementById('datepick2').disabled=false"> Two Way </input>
			<input type="radio" name="way" value="1" onclick="document.getElementById('datepick2').disabled=true" checked> One Way </input> </td>
		</tr> 
		<tr>
			<td colspan="2">Origin: </td>
			<td colspan="2">
				<select name="Origin">
					<option value="0">Select</option>
					<option value="San Lazaro">San Lazaro</option>
					<option value="Espana">Espana</option>
					<option value="Alabang">Alabang</option>
					<option value="Cabuyao">Cabuyao</option>
					<option value="Naujan">Naujan</option>
					<option value="Victoria">Victoria</option>
					<option value="Pinamalayan">Pinamalayan</option>
					<option value="Gloria">Gloria</option>
					<option value="Bongabong">Bongabong</option>
					<option value="Roxas">Roxas</option>
					<option value="Mansalay">Mansalay</option>
					<option value="Bulalacao">Bulalacao</option>
					<option value="Magsaysay">Magsaysay</option>
					<option value="San Jose">San Jose</option>
					<option value="Pola">Pola</option>
					<option value="Soccoro">Soccoro</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">Destination: </td>
			<td colspan="2">
				<select name="Destination">
					<option value="0">Select</option>
					<option value="San Lazaro">San Lazaro</option>
					<option value="Espana">Espana</option>
					<option value="Alabang">Alabang</option>
					<option value="Cabuyao">Cabuyao</option>
					<option value="Naujan">Naujan</option>
					<option value="Victoria">Victoria</option>
					<option value="Pinamalayan">Pinamalayan</option>
					<option value="Gloria">Gloria</option>
					<option value="Bongabong">Bongabong</option>
					<option value="Roxas">Roxas</option>
					<option value="Mansalay">Mansalay</option>
					<option value="Bulalacao">Bulalacao</option>
					<option value="Magsaysay">Magsaysay</option>
					<option value="San Jose">San Jose</option>
					<option value="Pola">Pola</option>
					<option value="Soccoro">Soccoro</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"> No.Of Passangers:</td>
			<td> <input type="number" name="no_of_pass" required />
			<!-- <td>
			<select name ="adult">
			<option value="0">Adult</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			</select>
			</td>
			
			<td>
			<select name ="child">
			<option value="0">Child</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			</select>
			</td>-->
		</tr>
		<tr>
		<td colspan="2"> Departure</td>
		<td colspan="2"><input id="datepick1" size="10" name="Departure" />
		</tr>
		<tr>
		<td colspan="2"> Return</td>
		<td colspan="2"><input id="datepick2" size="10"  name="Return" disabled/>
		</tr>
		<tr>
			<td colspan="2">Bus Type: </td>
			<td colspan="2">
			<select name="bustype">
				<option value="0">Select</option>
				<option value="Air Conditioned">Air Conditioned</option>
				<option value="Ordinary">Ordinary</option>
			</select>
			</td>
		</tr>

		<tr>

		<td colspan ="4" style="padding-top:10pt;padding-left:0pt"><input type="submit" name="submit" id="submit" value="Submit"></input></td>
		</tr>
		<tr>
			<td rowspan="100" length="100">
			</td>
		</tr>
	</table>
</form>
				</div>
				<div class="column-clear"></div>
            </div>
			<div class="clearfix"></div>
        </div>
		<div id="footer">
			<a href="index.php"><img src="images/footer-logo.jpg" alt="Dimple Star Transport" /></a>
			<p>&copy;Dimple Star Transport<br /></p>
		</div>
    </div>
</body>
		<style type="text/css">
			.calendar {
				font-family: 'Trebuchet MS', Tahoma, Verdana, Arial, sans-serif;
				font-size: 0.9em;
				background-color: #EEE;
				color: #333;
				border: 1px solid #DDD;
				-moz-border-radius: 4px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				padding: 1.2em;
				width: 11em;
			}
			
			.calendar .months {
				background-color: #F6AF3A;
				border: 1px solid #E78F08;
				-moz-border-radius: 4px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				color: #FFF;
				padding: 0.2em;
				text-align: center;
			}
			
			.calendar .prev-month,
			.calendar .next-month {
				padding: 0;
			}
			
			.calendar .prev-month {
				float: left;
			}
			
			.calendar .next-month {
				float: right;
			}
			
			.calendar .current-month {
				margin: 0 auto;
			}
			
			.calendar .months .prev-month,
			.calendar .months .next-month {
				color: #FFF;
				text-decoration: none;
				padding: 0 0.4em;
				-moz-border-radius: 4px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				cursor: pointer;
			}
			
			.calendar .months .prev-month:hover,
			.calendar .months .next-month:hover {
				background-color: #FDF5CE;
				color: #C77405;
			}
			
			.calendar table {
				border-collapse: collapse;
				padding: 0;
				font-size: 0.8em;
				width: 70%;
			}
			
			.calendar th {
				text-align: center;
			}
			
			.calendar td {
				text-align: right;
				padding: 1px;
				width: 14.3%;
			}
			
			.calendar td span {
				display: block;
				color: #1C94C4;
				background-color: #F6F6F6;
				border: 1px solid #CCC;
				text-decoration: none;
				padding: 0.2em;
				cursor: pointer;
			}
			
			.calendar td span:hover {
				color: #C77405;
				background-color: #FDF5CE;
				border: 1px solid #FBCB09;
			}
			
			.calendar td.today span {
				background-color: #FFF0A5;
				border: 1px solid #FED22F;
				color: #363636;
			}
		</style>


<script type="text/javascript" src="js/datepickr.js"></script>
		<script type="text/javascript">
						
			new datepickr('datepick1', {
				'dateFormat': '20y-m-d'
			});
            
            new datepickr('datepick2', {
				'dateFormat': '20y-m-d'
			});
			
			
		</script>
</html>