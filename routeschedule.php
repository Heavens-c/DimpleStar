<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Routes & Schedules - Dimple Star Transport</title>
<link rel="stylesheet" type="text/css" href="style/modern-style.css" />
<link rel="icon" href="images/icon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="wrapper">
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
    <div id="content">
    	<div id="gallerycontainer">
			<div class="login">
				<div>🗺️ Routes & Schedules</div>
				<div id="right">
					<?php
						session_start();
						if(isset($_SESSION['email'])){
							$email = $_SESSION['email'];
							echo "Welcome, ". $email. "!";
							echo " <a href='logout.php'>Logout</a>";
						}
						if(empty($email)){
							echo "<a href='signlog.php'>SignUp / Login</a>";
						}?>
				</div>
			</div>
			
			<div class="content-wrapper">
				<div id="right" style="margin-bottom: 2rem;">
					<h3><?php include_once("php_includes/date_time.php"); ?></h3>
				</div>
				
				<div class="fade-in-up">
					<h1>ROUTES & SCHEDULES</h1>
					
					<!-- Route Map -->
					<div class="slide-in" style="text-align: center; margin: 2rem 0;">
						<img src="images/route.png" alt="Route Map" class="hover-lift" style="max-width: 100%; border-radius: 12px; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
					</div>
					
					<!-- Main Routes -->
					<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 2rem; margin: 3rem 0;">
						<!-- Manila to Mindoro Route -->
						<div class="fade-in-up hover-lift" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem; border-radius: 12px; color: white; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
							<h3 style="color: white; margin-bottom: 1.5rem; text-align: center;">
								🚌 Manila ↔ Mindoro Route
							</h3>
							<div style="background: rgba(255, 255, 255, 0.1); padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem;">
								<h4 style="color: white; margin-bottom: 1rem;">📍 Route Stops:</h4>
								<div style="line-height: 2; color: rgba(255, 255, 255, 0.9);">
									<p>🏙️ <strong>Manila Terminals:</strong></p>
									<p style="margin-left: 1rem;">• San Lazaro Terminal</p>
									<p style="margin-left: 1rem;">• España Terminal</p>
									<p style="margin-left: 1rem;">• Alabang Terminal</p>
									<br>
									<p>🌿 <strong>Laguna:</strong></p>
									<p style="margin-left: 1rem;">• Cabuyao Terminal</p>
									<br>
									<p>🏝️ <strong>Mindoro Destinations:</strong></p>
									<p style="margin-left: 1rem;">• All major towns and municipalities</p>
								</div>
							</div>
						</div>
						
						<!-- Schedule Information -->
						<div class="slide-in hover-lift" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 2rem; border-radius: 12px; color: white; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
							<h3 style="color: white; margin-bottom: 1.5rem; text-align: center;">
								⏰ Daily Schedules
							</h3>
							<div style="background: rgba(255, 255, 255, 0.1); padding: 1.5rem; border-radius: 8px;">
								<div style="margin-bottom: 1.5rem;">
									<h4 style="color: white; margin-bottom: 0.5rem;">🌅 Morning Trips</h4>
									<p style="color: rgba(255, 255, 255, 0.9);">5:00 AM - 11:00 AM</p>
									<p style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Every 30 minutes</p>
								</div>
								<div style="margin-bottom: 1.5rem;">
									<h4 style="color: white; margin-bottom: 0.5rem;">☀️ Afternoon Trips</h4>
									<p style="color: rgba(255, 255, 255, 0.9);">12:00 PM - 6:00 PM</p>
									<p style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Every 45 minutes</p>
								</div>
								<div>
									<h4 style="color: white; margin-bottom: 0.5rem;">🌙 Evening Trips</h4>
									<p style="color: rgba(255, 255, 255, 0.9);">7:00 PM - 10:00 PM</p>
									<p style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Every 60 minutes</p>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Fare Information -->
					<div class="fade-in-up" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); margin: 2rem 0;">
						<h3 style="text-align: center; margin-bottom: 2rem; color: #374151;">💰 Fare Information</h3>
						<div style="overflow-x: auto;">
							<table style="width: 100%; min-width: 600px;">
								<thead>
									<tr style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
										<th style="padding: 1rem; text-align: left;">Route</th>
										<th style="padding: 1rem; text-align: center;">Ordinary Bus</th>
										<th style="padding: 1rem; text-align: center;">Air Conditioned</th>
										<th style="padding: 1rem; text-align: center;">Travel Time</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="font-weight: 600;">Manila - Naujan</td>
										<td style="text-align: center;">₱180</td>
										<td style="text-align: center;">₱220</td>
										<td style="text-align: center;">3.5 hours</td>
									</tr>
									<tr style="background: #f8fafc;">
										<td style="font-weight: 600;">Manila - Victoria</td>
										<td style="text-align: center;">₱200</td>
										<td style="text-align: center;">₱240</td>
										<td style="text-align: center;">4 hours</td>
									</tr>
									<tr>
										<td style="font-weight: 600;">Manila - Pinamalayan</td>
										<td style="text-align: center;">₱220</td>
										<td style="text-align: center;">₱260</td>
										<td style="text-align: center;">4.5 hours</td>
									</tr>
									<tr style="background: #f8fafc;">
										<td style="font-weight: 600;">Manila - Roxas</td>
										<td style="text-align: center;">₱250</td>
										<td style="text-align: center;">₱290</td>
										<td style="text-align: center;">5 hours</td>
									</tr>
									<tr>
										<td style="font-weight: 600;">Manila - San Jose</td>
										<td style="text-align: center;">₱280</td>
										<td style="text-align: center;">₱320</td>
										<td style="text-align: center;">6 hours</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div style="margin-top: 1.5rem; padding: 1rem; background: #fef3c7; border-radius: 8px; border-left: 4px solid #f59e0b;">
							<p style="color: #92400e; font-weight: 500;">
								ℹ️ <strong>Note:</strong> Fares are subject to change. Senior citizens and PWDs enjoy discounted rates as per government regulations.
							</p>
						</div>
					</div>
					
					<!-- Special Services -->
					<div class="slide-in" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 2rem; border-radius: 12px; color: white; margin: 2rem 0;">
						<h3 style="color: white; margin-bottom: 1.5rem; text-align: center;">⭐ Special Services</h3>
						<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
							<div style="padding: 1.5rem; background: rgba(255, 255, 255, 0.1); border-radius: 8px; text-align: center;">
								<div style="font-size: 2rem; margin-bottom: 1rem;">🎫</div>
								<h4 style="color: white; margin-bottom: 0.5rem;">Online Booking</h4>
								<p style="color: rgba(255, 255, 255, 0.9);">Reserve your seats in advance through our website</p>
							</div>
							<div style="padding: 1.5rem; background: rgba(255, 255, 255, 0.1); border-radius: 8px; text-align: center;">
								<div style="font-size: 2rem; margin-bottom: 1rem;">📱</div>
								<h4 style="color: white; margin-bottom: 0.5rem;">Mobile Updates</h4>
								<p style="color: rgba(255, 255, 255, 0.9);">Real-time schedule and delay notifications</p>
							</div>
							<div style="padding: 1.5rem; background: rgba(255, 255, 255, 0.1); border-radius: 8px; text-align: center;">
								<div style="font-size: 2rem; margin-bottom: 1rem;">🎒</div>
								<h4 style="color: white; margin-bottom: 0.5rem;">Baggage Service</h4>
								<p style="color: rgba(255, 255, 255, 0.9);">Safe and secure luggage handling</p>
							</div>
							<div style="padding: 1.5rem; background: rgba(255, 255, 255, 0.1); border-radius: 8px; text-align: center;">
								<div style="font-size: 2rem; margin-bottom: 1rem;">🚐</div>
								<h4 style="color: white; margin-bottom: 0.5rem;">Charter Service</h4>
								<p style="color: rgba(255, 255, 255, 0.9);">Group bookings and special trips available</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="clearfix"></div>
            </div>
			<div class="clearfix"></div>
        </div>
    </div>
   
<div id="footer">
	<a href="index.php"><img src="images/footer-logo.jpg" alt="Dimple Star Transport" /></a>
	<p>&copy; <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.<br />
	Your reliable partner for Metro Manila - Mindoro travel.</p>
</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.fade-in-up, .slide-in').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});
</script>
</body>
</html>