<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - Dimple Star Transport</title>
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
			<li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li class="current"><a href="contact.php">Contact</a></li>
			<li><a href="book.php">Book Now</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
			<div class="login">
				<div>📞 Get in Touch</div>
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
					<h1>CONTACT US</h1>
					
					<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin: 2rem 0;">
						<!-- Contact Information -->
						<div class="slide-in">
							<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem; border-radius: 12px; color: white; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
								<h3 style="color: white; margin-bottom: 1.5rem; display: flex; align-items: center;">
									📍 Our Location
								</h3>
								<div style="line-height: 1.8; color: rgba(255, 255, 255, 0.9);">
									<p style="margin-bottom: 1rem;">
										<strong>📧 Address:</strong><br>
										Block 1 lot 10, Southpoint Subdivision<br>
										Brgy Banay-Banay, Cabuyao, Laguna<br>
										Philippines
									</p>
									<p style="margin-bottom: 1rem;">
										<strong>📞 Phone:</strong><br>
										<span style="font-size: 1.2rem; color: #fbbf24;">0929 209 0712</span>
									</p>
									<p>
										<strong>🕒 Business Hours:</strong><br>
										Monday - Sunday: 5:00 AM - 10:00 PM
									</p>
								</div>
							</div>
						</div>
						
						<!-- Contact Form -->
						<div class="fade-in-up">
							<div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
								<h3 style="margin-bottom: 1.5rem; color: #374151;">💬 Send us a Message</h3>
								<form action="#" method="post" style="display: grid; gap: 1rem;">
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Your Name</label>
										<input type="text" name="name" required placeholder="Enter your full name">
									</div>
									
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Email Address</label>
										<input type="email" name="email" required placeholder="Enter your email">
									</div>
									
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Subject</label>
										<select name="subject" required>
											<option value="">Select a subject</option>
											<option value="booking">Booking Inquiry</option>
											<option value="schedule">Schedule Information</option>
											<option value="complaint">Complaint</option>
											<option value="suggestion">Suggestion</option>
											<option value="other">Other</option>
										</select>
									</div>
									
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Message</label>
										<textarea name="message" rows="4" required placeholder="Type your message here..."></textarea>
									</div>
									
									<button type="submit" style="margin-top: 1rem;">
										📤 Send Message
									</button>
								</form>
							</div>
						</div>
					</div>
					
					<!-- Services Information -->
					<div class="slide-in" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 2rem; border-radius: 12px; color: white; margin: 2rem 0;">
						<h3 style="color: white; margin-bottom: 1.5rem; text-align: center;">🚌 Our Services</h3>
						<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; text-align: center;">
							<div>
								<h4 style="color: white; margin-bottom: 0.5rem;">🎫 Online Booking</h4>
								<p style="color: rgba(255, 255, 255, 0.9);">Easy and convenient online ticket booking system</p>
							</div>
							<div>
								<h4 style="color: white; margin-bottom: 0.5rem;">❄️ Air Conditioned Buses</h4>
								<p style="color: rgba(255, 255, 255, 0.9);">Comfortable air-conditioned buses for your journey</p>
							</div>
							<div>
								<h4 style="color: white; margin-bottom: 0.5rem;">🛡️ Safe Travel</h4>
								<p style="color: rgba(255, 255, 255, 0.9);">Professional drivers and well-maintained vehicles</p>
							</div>
							<div>
								<h4 style="color: white; margin-bottom: 0.5rem;">📍 Multiple Routes</h4>
								<p style="color: rgba(255, 255, 255, 0.9);">Serving Metro Manila and Mindoro Province</p>
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
	Your trusted partner for safe and reliable transportation.</p>
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

    // Form validation
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.style.borderColor = '#ef4444';
                this.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)';
            } else {
                this.style.borderColor = '#10b981';
                this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.1)';
            }
        });
    });
});
</script>
</body>
</html>