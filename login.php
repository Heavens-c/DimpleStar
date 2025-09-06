<?php
// =======================
// login.php  (bcrypt; no salt; role-based redirect)
// =======================
ini_set('session.use_strict_mode', 1);
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// Compute base URL (e.g., "/DimpleStar/" or "/")
$basePath = rtrim(str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME'])), '/');
$BASE_URL = ($basePath === '' || $basePath === '/') ? '/' : ($basePath . '/');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: " . $BASE_URL . "signlog.php"); exit;
}

// CSRF
if (empty($_POST['csrf']) || empty($_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], (string)$_POST['csrf'])) {
  header("Location: " . $BASE_URL . "signlog.php?message=" . urlencode("Invalid session, try again.")); exit;
}

require_once __DIR__ . '/php_includes/connection.php';
if (!$conn) {
  header("Location: " . $BASE_URL . "signlog.php?message=" . urlencode("Server error.")); exit;
}

$emailRaw = trim((string)($_POST['login_email'] ?? ''));
$pwdRaw   = (string)($_POST['login_password'] ?? '');

if (!filter_var($emailRaw, FILTER_VALIDATE_EMAIL) || $pwdRaw === '') {
  header("Location: " . $BASE_URL . "signlog.php?message=" . urlencode("Login Failed!")); exit;
}
$email = strtolower($emailRaw);

// Fetch user (no salt column anymore)
$sql  = "SELECT id, email, password, role FROM members WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($sql);
if (!$stmt) {
  // Uncomment the next line if you need to debug DB errors:
  // error_log("Prepare failed: {$conn->errno} {$conn->error}");
  header("Location: " . $BASE_URL . "signlog.php?message=" . urlencode("Login Failed!")); exit;
}
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result();

if (!$res || $res->num_rows < 1) {
  header("Location: " . $BASE_URL . "signlog.php?message=" . urlencode("Login Failed!")); exit;
}
$user = $res->fetch_assoc();
$stmt->close();

// Verify hash
if (!password_verify($pwdRaw, $user['password'])) {
  header("Location: " . $BASE_URL . "signlog.php?message=" . urlencode("Login Failed!")); exit;
}

// Optional: rehash if cost/algo changed
if (password_needs_rehash($user['password'], PASSWORD_BCRYPT)) {
  $new = password_hash($pwdRaw, PASSWORD_BCRYPT);
  if ($up = $conn->prepare("UPDATE members SET password=? WHERE id=?")) {
    $up->bind_param("si", $new, $user['id']);
    $up->execute();
    $up->close();
  }
}

// Success
session_regenerate_id(true);
$_SESSION['email']    = $user['email'];
$_SESSION['role']     = $user['role'];
$_SESSION['is_admin'] = ($user['role'] === 'admin');
$_SESSION['csrf']     = bin2hex(random_bytes(32)); // rotate token

// Redirect by role (admin -> /admin/index.php, user -> /index.php)
$dest = !empty($_SESSION['is_admin']) ? ($BASE_URL . 'admin/index.php') : ($BASE_URL . 'index.php');
header("Location: " . $dest);
exit;
