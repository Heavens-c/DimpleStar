<?php
// /includes/audit.php
if (!function_exists('add_audit')) {
  function add_audit(mysqli $conn, string $actor, string $action): void {
    $ip = $_SERVER['REMOTE_ADDR']     ?? '';
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if ($stmt = $conn->prepare("INSERT INTO audit_trail (actor, action, ip_address, user_agent) VALUES (?, ?, ?, ?)")) {
      $stmt->bind_param("ssss", $actor, $action, $ip, $ua);
      $stmt->execute();
      $stmt->close();
    }
  }
}
