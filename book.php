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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div id="right"><h3><?php include_once("php_includes/date_time.php"); ?></h3></div>
      </div>

      <div class="content-wrapper">
        <div class="fade-in-up">
          <h1 style="text-align:center;margin-bottom:2rem;">🚌 BOOK NOW!</h1>

          <div style="max-width: 680px; margin: 0 auto;">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form" id="bookingForm" novalidate>
              <div style="display:grid; gap:1.5rem;">

                <!-- Trip Type -->
                <div style="background:#f8fafc;padding:1.5rem;border-radius:8px;border:2px solid #e5e7eb;">
                  <h3 style="margin-bottom:1rem;color:#374151;">🔄 Trip Type</h3>
                  <div style="display:flex;gap:2rem;">
                    <label style="display:flex;align-items:center;cursor:pointer;font-weight:500;">
                      <input type="radio" name="way" value="1" id="oneWay" checked style="margin-right:.5rem;"> One Way
                    </label>
                    <label style="display:flex;align-items:center;cursor:pointer;font-weight:500;">
                      <input type="radio" name="way" value="2" id="roundTrip" style="margin-right:.5rem;"> Round Trip
                    </label>
                  </div>
                </div>

                <!-- Origin / Destination -->
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                  <div>
                    <label class="form-label">📍 From (Origin)</label>
                    <select name="Origin" id="origin" required style="width:100%;">
                      <option value="">Select Origin</option>
                      <option>San Lazaro</option><option>Espana</option><option>Alabang</option>
                      <option>Cabuyao</option><option>Naujan</option><option>Victoria</option>
                      <option>Pinamalayan</option><option>Gloria</option><option>Bongabong</option>
                      <option>Roxas</option><option>Mansalay</option><option>Bulalacao</option>
                      <option>Magsaysay</option><option>San Jose</option><option>Pola</option>
                      <option>Soccoro</option>
                    </select>
                  </div>
                  <div>
                    <label class="form-label">🎯 To (Destination)</label>
                    <select name="Destination" id="destination" required style="width:100%;">
                      <option value="">Select Destination</option>
                      <option>San Lazaro</option><option>Espana</option><option>Alabang</option>
                      <option>Cabuyao</option><option>Naujan</option><option>Victoria</option>
                      <option>Pinamalayan</option><option>Gloria</option><option>Bongabong</option>
                      <option>Roxas</option><option>Mansalay</option><option>Bulalacao</option>
                      <option>Magsaysay</option><option>San Jose</option><option>Pola</option>
                      <option>Soccoro</option>
                    </select>
                  </div>
                </div>

                <!-- Passengers / Bus Type -->
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                  <div>
                    <label class="form-label">👥 Number of Passengers</label>
                    <input type="number" name="no_of_pass" min="1" max="50" required placeholder="Enter number of passengers">
                  </div>
                  <div>
                    <label class="form-label">🚌 Bus Type</label>
                    <select name="bustype" required>
                      <option value="">Select Bus Type</option>
                      <option value="Air Conditioned">❄️ Air Conditioned</option>
                      <option value="Ordinary">🌡️ Ordinary</option>
                    </select>
                  </div>
                </div>

                <!-- Dates & Times -->
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                  <div>
                    <label class="form-label">📅 Departure Date</label>
                    <input type="date" id="date_depart" name="Departure" required>
                    <label class="form-label" style="margin-top:.5rem;">⏰ Departure Time</label>
                    <input type="time" id="time_depart" name="DepartureTime" step="300">
                  </div>
                  <div>
                    <label class="form-label">🔄 Return Date</label>
                    <input type="date" id="date_return" name="Return" disabled>
                    <label class="form-label" style="margin-top:.5rem;">⏰ Return Time</label>
                    <input type="time" id="time_return" name="ReturnTime" step="300" disabled>
                  </div>
                </div>

                <!-- Submit -->
                <div style="text-align:center;margin-top:1rem;">
                  <button type="submit" name="submit" id="submit" style="padding:1rem 3rem;font-size:1.1rem;">
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
      <p>&copy; <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.<br>Safe and reliable bus booking system.</p>
    </div>
  </div>
</div>

<script>
  // Fancy fade in
  document.querySelectorAll('.fade-in-up').forEach(el => {
    el.style.opacity = '0'; el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity .6s ease, transform .6s ease';
    new IntersectionObserver(entries => {
      entries.forEach(e => { if (e.isIntersecting) { el.style.opacity='1'; el.style.transform='translateY(0)'; }});
    }, {threshold:0.1, rootMargin:'0px 0px -50px 0px'}).observe(el);
  });

  // Date/Time logic
  const oneWay     = document.getElementById('oneWay');
  const roundTrip  = document.getElementById('roundTrip');
  const dDepart    = document.getElementById('date_depart');
  const dReturn    = document.getElementById('date_return');
  const tDepart    = document.getElementById('time_depart');
  const tReturn    = document.getElementById('time_return');
  const origin     = document.getElementById('origin');
  const destination= document.getElementById('destination');
  const form       = document.getElementById('bookingForm');

  // set today's min date
  const today = new Date();
  const pad = n => String(n).padStart(2,'0');
  const yyyy = today.getFullYear();
  const mm   = pad(today.getMonth()+1);
  const dd   = pad(today.getDate());
  const todayStr = `${yyyy}-${mm}-${dd}`;

  dDepart.min = todayStr;
  dReturn.min = todayStr;

  function toggleTripMode(){
    const rt = roundTrip.checked;
    dReturn.disabled = !rt;
    tReturn.disabled = !rt;
    dReturn.required = rt;
    // if switching back to one-way, clear return values
    if (!rt) { dReturn.value=''; tReturn.value=''; }
  }

  function syncReturnMin(){
    if (dDepart.value) {
      dReturn.min = dDepart.value;
      if (dReturn.value && dReturn.value < dDepart.value) dReturn.value = dDepart.value;
    } else {
      dReturn.min = todayStr;
    }
  }

  // origin/destination must differ
  function validateRoute(){
    if (origin.value && destination.value && origin.value === destination.value) {
      destination.setCustomValidity('Destination must be different from Origin');
    } else {
      destination.setCustomValidity('');
    }
  }

  oneWay.addEventListener('change', toggleTripMode);
  roundTrip.addEventListener('change', toggleTripMode);
  dDepart.addEventListener('change', syncReturnMin);
  origin.addEventListener('change', validateRoute);
  destination.addEventListener('change', validateRoute);

  // initial state
  toggleTripMode();
  validateRoute();

  // simple required feedback
  form.querySelectorAll('input[required], select[required]').forEach(el => {
    el.addEventListener('blur', function(){
      if (this.checkValidity()) {
        this.style.borderColor = '#10b981';
        this.style.boxShadow = '0 0 0 3px rgba(16,185,129,.1)';
      } else {
        this.style.borderColor = '#ef4444';
        this.style.boxShadow = '0 0 0 3px rgba(239,68,68,.1)';
      }
    });
  });
</script>
</body>
</html>
