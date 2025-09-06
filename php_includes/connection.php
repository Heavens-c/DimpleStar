<?php
$conn = mysqli_connect("localhost", "root", null, "dimplestar");
	if (!$conn) { die("DB connection failed"); }
	mysqli_set_charset($conn, 'utf8mb4');
?>