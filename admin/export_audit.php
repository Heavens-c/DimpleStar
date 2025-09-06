<?php
session_start();
if (empty($_SESSION['is_admin'])) { http_response_code(403); exit('Forbidden'); }
require_once __DIR__ . '/../config.php';

$search = trim($_GET['q'] ?? '');
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=audit_trail.csv');

$out = fopen('php://output', 'w');
fputcsv($out, ['ID','Actor','Action','IP','User Agent','Timestamp']);

if ($search) {
  $like = '%'.$search.'%';
  $stmt = $conn->prepare("SELECT id, actor, action, ip_address, user_agent, created_at
                          FROM audit_trail
                          WHERE actor LIKE ? OR action LIKE ? OR ip_address LIKE ?
                          ORDER BY created_at DESC");
  $stmt->bind_param("sss", $like, $like, $like);
} else {
  $stmt = $conn->prepare("SELECT id, actor, action, ip_address, user_agent, created_at
                          FROM audit_trail
                          ORDER BY created_at DESC");
}
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) { fputcsv($out, $row); }
fclose($out);
