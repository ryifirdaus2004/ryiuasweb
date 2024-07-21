<?php
$conn = new mysqli("127.0.0.1","root","","ryi");
if (!$conn) {
	die("connection failed".$conn->connect_error());
}
?>