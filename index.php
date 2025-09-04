<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dimple Star Transport - Modern Bus Booking System</title>
<link rel="stylesheet" type="text/css" href="style/modern-style.css" />
<link rel="icon" href="images/icon.ico" type="image/x-icon">

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- Slider Scripts -->
<script src="slide/js/jquery.js"></script>
<script src="slide/js/amazingslider.js"></script>
<script src="slide/js/initslider-1.js"></script>

<!-- SEO -->
<meta name="description" content="Dimple Star Transport modern bus booking system with routes, schedules, and terminals.">

<style>
/* Extra styles to replace inline CSS */

/* Contact Info Box */
.info-box {
    margin-top: 3rem;
    padding: 2rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
}

/* Contact Grid */
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    align-items: center;
}

/* Responsive */
@media (max-width: 768px) {
    #mainnav {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    .contact-grid {
        grid-template-columns: 1fr !important;
        text-align: center;
    }
    #header h1 {
        font-size: 1.5rem;
        text-align: center;
    }
}
</style>
</head>
<body>
<div id="wrapper">
    
    <!-- HEADER -->
    <div id="header">
        <h1><a href="index.php"><i class="fas fa-bus"></i>&nbsp;&nbsp;Dimple Star Transport</a></h1>
        <ul id="mainnav">
            <li class="current"><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
            <li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="book.php">Book Now</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div id="content">
        <div id="gallerycontainer">
            
            <!-- LOGIN / SESSION -->
            <div class="login">
                <div>Welcome to Dimple Star Transport</div>
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
            
            <!-- SLIDER -->
            <div class="content-wrapper fade-in-up">
                <div style="margin:0px auto;max-width:1024px;">
                    <div id="amazingslider-1" class="hover-lift">
                        <ul class="amazingslider-slides" style="display:none;">
                            <li><img src="slide/images/b1.png" alt="Bus Service 1" /> </li>
                            <li><img src="slide/images/b2.png" alt="Bus Service 2" /></li>
                            <li><img src="slide/images/b3.png" alt="Bus Service 3" /></li>
                            <li><img src="slide/images/b4.png" alt="Bus Service 4" /></li>
                        </ul>
                    </div>
                </div>

                <!-- CONTACT INFO -->
                <div class="slide-in info-box">
                    <h2 style="text-align: center; margin-bottom: 2rem;">Contact Information</h2>
                    <div class="contact-grid">
                        <div>
                            <h2 style="color: #dc2626; font-size: 2rem; margin-bottom: 1rem;">📞 0929 209 0712</h2>
                            <p style="font-size: 1.1rem; line-height: 1.8; color: #374151;">
                                📍 Block 1 lot 10, Southpoint Subdivision<br>
                                Brgy Banay-Banay, Cabuyao, Laguna<br>
                                Philippines
                            </p>
                        </div>
                        <div id="right" style="text-align: right;">
                            <h3><?php include_once("php_includes/date_time.php"); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>    

    <!-- FOOTER -->
    <div id="footer">
        <a href="index.php"><img src="images/Transport.jpg" alt="Dimple Star Transport" /></a>
        <p>&copy; <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.<br />
        Providing reliable transportation services across Metro Manila and Mindoro Province.</p>
    </div>

</div>

<!-- INTERACTIONS -->
<script>
// Add smooth scrolling and modern interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add fade-in animation to elements
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
    
    // Add hover effects to navigation
    document.querySelectorAll('#mainnav a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        link.addEventListener('mouseleave', function() {
            if (!this.parentElement.classList.contains('current')) {
                this.style.transform = 'translateY(0)';
            }
        });
    });
});
</script>
</body>
</html>
