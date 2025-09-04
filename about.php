<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - Dimple Star Transport</title>
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
            <li class="current"><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
            <li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="book.php">Book Now</a></li>
        </ul>
    </div>
    <div id="content">
        <div id="gallerycontainer">
            <div class="login">
                <div>About Dimple Star Transport</div>
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
                    <h1>ABOUT US</h1>
                    
                    <div style="display: grid; grid-template-columns: 1fr 300px; gap: 2rem; margin: 2rem 0;">
                        <div>
                            <img src="images/oldbus.jpg" alt="Historical Bus Photo" class="hover-lift" style="width: 100%; border-radius: 12px;">
                        </div>
                        <div id="fb">
                            <?php include_once("php_includes/fblike.php"); ?>
                        </div>
                    </div>
                    
                    <div class="slide-in" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); margin: 2rem 0;">
                        <h3 style="color: #2563eb; margin-bottom: 1rem;">📜 Our History</h3>
                        <p style="line-height: 1.8; color: #374151; margin-bottom: 1rem;">
                            Photo taken on October 16, 1993. Napat Transit (now Dimple Star Transport) NVR-963
                            (fleet No 800) going to Alabang and jeepneys under the Light Rail Line in Taft Ave near
                            United Nations Avenue, Ermita, Manila, Philippines.
                        </p>
                        <p style="line-height: 1.8; color: #374151;">
                            Year 2004 of May changes has been made, Napat Transit became <strong>Dimple Star Transport</strong>.
                        </p>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin: 3rem 0;">
                        <div class="fade-in-up" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem; border-radius: 12px; color: white; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
                            <h3 style="color: white; margin-bottom: 1rem; display: flex; align-items: center;">
                                🎯 Our Mission
                            </h3>
                            <p style="line-height: 1.8; color: rgba(255, 255, 255, 0.9);">
                                To provide superior transport service to Metro Manila and Mindoro Province commuters with safety, reliability, and comfort as our top priorities.
                            </p>
                        </div>
                        
                        <div class="fade-in-up" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 2rem; border-radius: 12px; color: white; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
                            <h3 style="color: white; margin-bottom: 1rem; display: flex; align-items: center;">
                                🚀 Our Vision
                            </h3>
                            <p style="line-height: 1.8; color: rgba(255, 255, 255, 0.9);">
                                To lead the bus transport industry through innovative service excellence and continuous improvement for the riding public.
                            </p>
                        </div>
                    </div>
                    
                    <div class="slide-in" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 2rem; border-radius: 12px; color: white; margin: 2rem 0; text-align: center;">
                        <h3 style="color: white; margin-bottom: 1rem;">🏆 Our Commitment</h3>
                        <p style="line-height: 1.8; color: rgba(255, 255, 255, 0.9); font-size: 1.1rem;">
                            Over 30 years of trusted service connecting communities across Metro Manila and Mindoro Province. 
                            We continue to modernize our fleet and improve our services while maintaining our commitment to safety and reliability.
                        </p>
                    </div>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
<div id="footer">
    <a href="index.php"><img src="/images/Transport.jpg" alt="Dimple Star Transport" /></a>
    <p>&copy; <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.<br />
    Providing reliable transportation services since 1993.</p>
</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animation observer
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