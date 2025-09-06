<?php
ini_set('session.use_strict_mode', 1);
session_start();
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Location: ' . (!empty($_SESSION['is_admin']) ? 'dashboard.php' : '../index.php'));
exit;
