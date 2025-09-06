<?php
// php_includes/buslist.php

ini_set('session.use_strict_mode', 1);
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

require_once __DIR__ . '/connection.php';
if (!$conn) { echo "DB error."; return; }

/* --------- Read inputs (POST -> SESSION fallback) --------- */
$Origin      = isset($_POST['Origin'])      ? trim($_POST['Origin'])      : ($_SESSION['Origin']      ?? '');
$Destination = isset($_POST['Destination']) ? trim($_POST['Destination']) : ($_SESSION['Destination'] ?? '');
$Departure   = isset($_POST['Departure'])   ? trim($_POST['Departure'])   : ($_SESSION['Departure']   ?? '');
$Number      = isset($_POST['no_of_pass'])  ? (int)$_POST['no_of_pass']   : (int)($_SESSION['Number'] ?? 1);
$BusType     = isset($_POST['bustype'])     ? trim($_POST['bustype'])     : ($_SESSION['BusType']     ?? '');

/* Save fresh POST into session for later steps */
if (!empty($_POST)) {
  $_SESSION['Origin']      = $Origin;
  $_SESSION['Destination'] = $Destination;
  $_SESSION['Departure']   = $Departure;
  $_SESSION['Number']      = $Number;
  $_SESSION['BusType']     = $BusType;
}

/* ---------- Handlers for the multi-step flow ---------- */

if (isset($_POST['register'])) {
  // finalize booking: insert one row per seat
  $id = $_SESSION['id'] ?? null;
  if (!$id) { echo "<div class='error'>Missing route id.</div>"; return; }

  // fetch route
  $stmt = $conn->prepare("SELECT bustype, origin, destination, price, `time` FROM routes WHERE busid=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $r = $stmt->get_result()->fetch_assoc();
  $stmt->close();
  if (!$r) { echo "<div class='error'>Route not found.</div>"; return; }

  $bustype = $r['bustype'];
  $origin = $r['origin'];
  $destination = $r['destination'];
  $price = $r['price'];
  $time = $r['time']; // must match regs.timetodep format

  $Name    = $_SESSION['Name']    ?? '';
  $Address = $_SESSION['Address'] ?? '';
  $Email   = $_SESSION['Email']   ?? '';
  $Contact = $_SESSION['Contact'] ?? '';
  $Seats   = $_SESSION['Seats']   ?? '';
  $Seat    = preg_split('/\s+/', trim($Seats));

  $ins = $conn->prepare(
    "INSERT INTO regs (name, address, mobile, email, bustype, origin, destination, price, seat_no, timetodep)
     VALUES (?,?,?,?,?,?,?,?,?,?)"
  );
  foreach ($Seat as $seatnumber) {
    if ($seatnumber === '') continue;
    $ins->bind_param("ssssssssss",
      $Name, $Address, $Contact, $Email,
      $bustype, $origin, $destination, $price,
      $seatnumber, $time
    );
    $ok = @$ins->execute();
    if (!$ok && $conn->errno == 1062) {
      echo "<script>alert('Seat $seatnumber is already taken for this route/time.');</script>";
    }
  }
  $ins->close();
  echo "<script>alert('Information has been added.');</script>";
  return;
}

if (isset($_POST['sub'])) {
  // confirm details
  $_SESSION['Name']    = $_POST['rn']   ?? '';
  $_SESSION['Address'] = $_POST['addr'] ?? '';
  $_SESSION['Email']   = $_POST['email']?? '';
  $_SESSION['Contact'] = $_POST['cont'] ?? '';
  $_SESSION['Seats']   = $_POST['seat'] ?? '';

  echo "Please Confirm your Information:<br/>
    <form action='".htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES)."' method='POST'>
      <table border='1'>
        <tr><td>Name</td><td>".htmlspecialchars($_SESSION['Name'])."</td></tr>
        <tr><td>Address</td><td>".htmlspecialchars($_SESSION['Address'])."</td></tr>
        <tr><td>Email</td><td>".htmlspecialchars($_SESSION['Email'])."</td></tr>
        <tr><td>Contact No.</td><td>".htmlspecialchars($_SESSION['Contact'])."</td></tr>
        <tr><td>Seats</td><td>".htmlspecialchars($_SESSION['Seats'])."</td></tr>
        <tr><td colspan='2' align='center'><input type='submit' name='register' value='Register'/></td></tr>
      </table>
    </form>";
  return;
}

if (isset($_POST['Book'])) {
  // personal info form
  $_SESSION['id'] = (int)($_POST['hidden'] ?? 0);
  echo "Personal Info:<br/>
    <form action='".htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES)."' method='POST'>
      <table border='1'>
        <tr><td>Name</td><td><input type='text' name='rn' placeholder='Name' required /></td></tr>
        <tr><td>Address</td><td><input type='text' name='addr' placeholder='Address' required /></td></tr>
        <tr><td>Email</td><td><input type='email' name='email' placeholder='Email Address' required /></td></tr>
        <tr><td>Contact No.</td><td><input type='text' name='cont' placeholder='Contact Number' required /></td></tr>
        <tr><td>Seats</td><td><input type='text' name='seat' placeholder='e.g. 7 8 9' required /></td></tr>
        <tr><td colspan='2' align='center'><input type='submit' name='sub' value='Register'/></td></tr>
      </table>
    </form>";
  return;
}

/* ---------- Initial list (no Book/sub yet) ---------- */

if ($Origin === '' || $Destination === '' || $BusType === '') {
  echo "No Records Found.";
  return;
}

/* Availability per route */
$sql = "SELECT
          r.busid, r.origin, r.destination, r.bustype, r.price, r.`time`, r.capacity,
          (r.capacity - COUNT(g.id)) AS seats_available
        FROM routes r
        LEFT JOIN regs g
          ON g.origin = r.origin
         AND g.destination = r.destination
         AND g.bustype = r.bustype
         AND g.timetodep = r.`time`
        WHERE r.origin = ? AND r.destination = ? AND r.bustype = ?
        GROUP BY r.busid, r.origin, r.destination, r.bustype, r.price, r.`time`, r.capacity
        ORDER BY r.`time`";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $Origin, $Destination, $BusType);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
  echo "<table border='1'>
          <tr>
            <th>Origin</th>
            <th>Destination</th>
            <th>Time</th>
            <th>Price</th>
            <th>Bus Type</th>
            <th>Available Seats</th>
            <th></th>
          </tr>";
  while ($row = $res->fetch_assoc()) {
    echo "<tr>
      <td>".htmlspecialchars($row['origin'])."</td>
      <td>".htmlspecialchars($row['destination'])."</td>
      <td>".htmlspecialchars($row['time'])."</td>
      <td>".htmlspecialchars($row['price'])."</td>
      <td>".htmlspecialchars($row['bustype'])."</td>
      <td>".(int)$row['seats_available']."</td>
      <td>
        <form action='".htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES)."' method='POST' style='margin:0'>
          <input type='hidden' name='hidden' value='".(int)$row['busid']."'>
          <input type='submit' name='Book' value='Book'>
        </form>
      </td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "No Records Found.";
}

$stmt->close();
