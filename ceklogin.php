<?php
include 'koneksi.php';
$error = "";
if (isset($_POST['login'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$user = $conn->real_escape_string($user);
	$pass = $conn->real_escape_string($pass);
	$pass = md5($pass);
	$sql = "select username,password,level,nama from admin where username='".$user."' and password='".$pass."'";
	$hasil = $conn->query($sql);
	if ($hasil->num_rows == 1) {
		header('location: home.php');
		session_start();
		$row = $hasil->fetch_assoc();
		$_SESSION['a_user']=$row['username'];
		$_SESSION['b_level']=$row['level'];
		$_SESSION['c_nama']=$row['nama'];
	}
	else{
		echo "<script>window.alert('username atau Password Salah');window.location=('login.php')</script>";
	}
}
?>