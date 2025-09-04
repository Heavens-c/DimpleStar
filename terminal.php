<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Terminals - Dimple Star Transport</title>
<link rel="stylesheet" type="text/css" href="style/modern-style.css" />
<link rel="icon" href="images/icon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* You can add custom styles here if needed */
.map-container {
    margin-top: 2rem;
}
iframe {
    border-radius: 8px;
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
}
</style>
</head>
<body>
<div id="wrapper">
    <div id="header">
    <h1><a href="index.php"><i class="fas fa-bus"></i>&nbsp;&nbsp;Dimple Star Transport</a></h1>
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
            <div class="login">
                <div>🚌 Our Terminals</div>
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
                    <h1>OUR TERMINALS</h1>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin: 2rem 0;">
                        <div class="slide-in hover-lift" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem; border-radius: 12px; color: white; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
                            <h3 style="color: white; margin-bottom: 1.5rem; display: flex; align-items: center;">
                                🏙️ España Terminal
                            </h3>
                            <div style="line-height: 1.8; color: rgba(255, 255, 255, 0.9);">
                                <div style="margin-bottom: 1rem; padding: 1rem; background: rgba(255, 255, 255, 0.1); border-radius: 8px;">
                                    <p>España Blvd, Sampaloc, Manila</p>
                                    <p style="margin-top: 0.5rem; font-weight: 600;">Contact# +63.02.985.1451 / +63.908.926.9163</p>
                                </div>
                            </div>
                            
                            <div class="map-container">
                                <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?f=q&source=s_q&hl=en&geocode=&q=Dimple+Star,+836BAntipoloStSampaloc,521,Manila,&aq=0&oq=Metro+Manila&sll=14.6125312,120.9948033&sspn=0.011772,0.021136&t=h&ie=UTF8&hq=&hnear=Dimple+Star&ll=14.6125312,120.9948033&spn=0.011772,0.021136&z=14&output=embed"></iframe>
                                <small><a href="https://www.google.com/maps/place/Dimple+Star/@14.6125312,120.9948033,770m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b60300001d5d:0xd30645794daddf84?hl=en;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                            </div>
                        </div>

                        <div class="slide-in hover-lift" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 2rem; border-radius: 12px; color: white; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
                            <h3 style="color: white; margin-bottom: 1.5rem; display: flex; align-items: center;">
                                🏝️ San Jose Terminal
                            </h3>
                            <div style="line-height: 1.8; color: rgba(255, 255, 255, 0.9);">
                                <div style="margin-bottom: 1rem; padding: 1rem; background: rgba(255, 255, 255, 0.1); border-radius: 8px;">
                                    <p>San Jose, Occidental Mindoro</p>
                                    <p style="margin-top: 0.5rem; font-weight: 600;">Contact# +63.02.6684151 / +63.921.568.6449</p>
                                </div>
                            </div>
                            
                            <div class="map-container">
                                <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?f=q&source=s_q&hl=en&geocode=&q=Dimple+Star+Transport,+BonifacioSt,SanJose,OccidentalMindoro,&aq=0&oq=&sll=12.3540632,121.0618653&sspn=0.011772,0.021136&t=h&ie=UTF8&hq=&hnear=Dimple+Star+Transport&ll=12.3540632,121.0618653&spn=0.011772,0.021136&z=14&output=embed"></iframe>
                                <small><a href="https://www.google.com/maps/place/Dimple+Star+Transport/@14.6143711,120.9841972,458m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b5fe6f7ebf6b:0xc34baa5ed38261eb?hl=en;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="fade-in-up" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); margin: 2rem 0;">
                        <h3 style="text-align: center; margin-bottom: 2rem; color: #374151;">🛠️ Terminal Services & Amenities</h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
                            <div>
                                <div style="font-size: 2rem; margin-bottom: 0.5rem;">🎫</div>
                                <h4 style="color: #374151; margin-bottom: 0.5rem;">Ticket Counter</h4>
                                <p style="color: #6b7280;">On-site ticket purchasing</p>
                            </div>
                            <div>
                                <div style="font-size: 2rem; margin-bottom: 0.5rem;">🚻</div>
                                <h4 style="color: #374151; margin-bottom: 0.5rem;">Restrooms</h4>
                                <p style="color: #6b7280;">Clean facilities available</p>
                            </div>
                            <div>
                                <div style="font-size: 2rem; margin-bottom: 0.5rem;">🪑</div>
                                <h4 style="color: #374151; margin-bottom: 0.5rem;">Waiting Area</h4>
                                <p style="color: #6b7280;">Comfortable seating</p>
                            </div>
                            <div>
                                <div style="font-size: 2rem; margin-bottom: 0.5rem;">🛡️</div>
                                <h4 style="color: #374151; margin-bottom: 0.5rem;">Security</h4>
                                <p style="color: #6b7280;">24/7 security personnel</p>
                            </div>
                            <div>
                                <div style="font-size: 2rem; margin-bottom: 0.5rem;">📱</div>
                                <h4 style="color: #374151; margin-bottom: 0.5rem;">WiFi</h4>
                                <p style="color: #6b7280;">Free internet access</p>
                            </div>
                            <div>
                                <div style="font-size: 2rem; margin-bottom: 0.5rem;">🍽️</div>
                                <h4 style="color: #374151; margin-bottom: 0.5rem;">Food Stalls</h4>
                                <p style="color: #6b7280;">Snacks and refreshments</p>
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
    <p>© <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.<br />
    Connecting communities across Metro Manila and Mindoro Province.</p>
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