<!DOCTYPE html>
<?php
	include 'php_includes/connection.php';
	include 'php_includes/book.php';
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Now - Dimple Star Transport</title>
<link rel="stylesheet" type="text/css" href="style/modern-style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="icon" href="images/icon.ico" type="image/x-icon">
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
            <li><a href="contact.php">Contact</a></li>
			<li class="current"><a href="book.php">Book Now</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer2">
			<div class="login">
				<div>🎫 Book Your Journey</div>
				<div id="right">
					<h3><?php include_once("php_includes/date_time.php"); ?></h3>
				</div>
			</div>
			
			<div class="content-wrapper">
				<div class="fade-in-up">
					<h1 style="text-align: center; margin-bottom: 2rem;">🚌 BOOK NOW!</h1>
					
					<div style="max-width: 600px; margin: 0 auto;">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
							<div style="display: grid; gap: 1.5rem;">
								
								<!-- Trip Type Selection -->
								<div style="background: #f8fafc; padding: 1.5rem; border-radius: 8px; border: 2px solid #e5e7eb;">
									<h3 style="margin-bottom: 1rem; color: #374151;">🔄 Trip Type</h3>
									<div style="display: flex; gap: 2rem;">
										<label style="display: flex; align-items: center; cursor: pointer; font-weight: 500;">
											<input type="radio" name="way" value="1" onclick="document.getElementById('datepick2').disabled=true" checked style="margin-right: 0.5rem;">
											One Way
										</label>
										<label style="display: flex; align-items: center; cursor: pointer; font-weight: 500;">
											<input type="radio" name="way" value="2" onclick="document.getElementById('datepick2').disabled=false" style="margin-right: 0.5rem;">
											Round Trip
										</label>
									</div>
								</div>

								<!-- Origin and Destination -->
								<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">📍 From (Origin)</label>
										<select name="Origin" required style="width: 100%;">
											<option value="">Select Origin</option>
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
									</div>
									
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">🎯 To (Destination)</label>
										<select name="Destination" required style="width: 100%;">
											<option value="">Select Destination</option>
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
									</div>
								</div>

								<!-- Passengers and Bus Type -->
								<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">👥 Number of Passengers</label>
										<input type="number" name="no_of_pass" min="1" max="50" required placeholder="Enter number of passengers">
									</div>
									
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">🚌 Bus Type</label>
										<select name="bustype" required>
											<option value="">Select Bus Type</option>
											<option value="Air Conditioned">❄️ Air Conditioned</option>
											<option value="Ordinary">🌡️ Ordinary</option>
										</select>
									</div>
								</div>

								<!-- Dates -->
								<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">📅 Departure Date</label>
										<input id="datepick1" name="Departure" placeholder="Select departure date" required>
									</div>
									
									<div>
										<label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374141;">🔄 Return Date</label>
										<input id="datepick2" name="Return" placeholder="Select return date (optional)" disabled>
									</div>
								</div>

								<!-- Submit Button -->
								<div style="text-align: center; margin-top: 1rem;">
									<button type="submit" name="submit" id="submit" style="padding: 1rem 3rem; font-size: 1.1rem;">
										🎫 Book My Trip
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
        </div>
		
		<div id="footer">
			<a href="index.php"><img src="/images/DimpleStarTransport.jpg" alt="Dimple Star Transport" /></a>
			<p>&copy; <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.<br />
			Safe and reliable bus booking system.</p>
		</div>
    </div>
</body>

<script type="text/javascript" src="js/datepickr.js"></script>
<script type="text/javascript">
	new datepickr('datepick1', {
		'dateFormat': '20y-m-d'
	});
    
    new datepickr('datepick2', {
		'dateFormat': '20y-m-d'
	});

	// Add modern interactions
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
		document.querySelectorAll('.fade-in-up').forEach(el => {
			el.style.opacity = '0';
			el.style.transform = 'translateY(30px)';
			el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
			observer.observe(el);
		});

		// Form validation feedback
		const form = document.querySelector('form');
		const inputs = form.querySelectorAll('input[required], select[required]');
		
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
</html>