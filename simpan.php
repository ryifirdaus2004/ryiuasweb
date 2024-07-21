<?php
include 'koneksi.php';
$ip = $_GET['ip'];
$sql="";
if ($ip=="input_kelas") {
	$kelas=$_POST['kelas'];
	$sql = "insert into kelas (kode_kelas,nama_kelas) values(NULL,'".$kelas."')";
	if ($conn->query($sql)===TRUE) {
		echo "<script>window.alert('Data Tersimpan');
        window.location=('home.php?r=input_kelas')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($ip=='import_siswa') {
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	try {
		while (($filename = fgetcsv($handle, 10000, ","))!==FALSE) {
			$c++;
			if ($c>1) {
				$namaString = $conn->real_escape_string($filename[2]);
				$sql = "insert into siswa value('".$filename[0]."','".$filename[1]."','".$namaString."','".$filename[3]."','".$filename[4]."')";
				if ($conn->query($sql)===TRUE) {
					
				}
				else{
					echo "error".$conn->error;
				}
			}
		}
		echo "<script>window.alert('Data Siswa Tersimpan');
        window.location=('home.php?r=import_siswa')</script>";
	} catch (Exception $e) {
		echo "error";
	}
}
if ($ip=='input_siswa') {
	$no = $_POST['no'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$nama = $conn->real_escape_string($nama);
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$sql = "insert into siswa value('".$no."','".$nis."','".$nama."','".$jk."','".$kelas."')";
	if ($conn->query($sql)===TRUE) {
		echo "<script>window.alert('Data Siswa Tersimpan');
        window.location=('home.php?r=input_siswa')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($ip=='edit_siswa') {
	$no = $_POST['no'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$nama = $conn->real_escape_string($nama);
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$sql = "UPDATE siswa SET no = '".$no."', nis = '".$nis."', nama = '".$nama."', jk = '".$jk."', kelas = '".$kelas."' WHERE nis = '".$nis."'";
	if ($conn->query($sql)===TRUE) {
		echo "<script>window.alert('Data Edit Siswa Tersimpan');
        window.location=('home.php?r=data_siswa')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($ip=='input_siswa_telat') {
	$var = $_POST['tgl'];
	$nis = $_POST['nistelat'];
	$alasan='';
	if (empty($_POST['alasan'])) {
		$alasan = '-';
	}
	else{
		$alasan = $_POST['alasan'];
	}
	$alasan = $conn->real_escape_string($alasan);
	$tgl = str_replace('/', '-', $var);
	$date = date('Y-m-d', strtotime($tgl));
	$nisi = explode(',', $nis);
	$sqltransaksi = "insert into transaksitelat value(NULL,'".$nisi[0]."','".$date."','".$alasan."')";
	if ($conn->query($sqltransaksi)===TRUE) {
		echo "<script>window.alert('Data Tersimpan');
        window.location=('home.php?r=input_siswa_terlambat')</script>";
	}
	else{
		echo "error".$conn->error;
	}
	
}
if ($ip =='input_admin') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	$nama=$_POST['nama'];
	$username = $conn->real_escape_string($username);
	$password = $conn->real_escape_string($password);
	$password = md5($password);
	$nama = $conn->real_escape_string($nama);
	$sqlAdmin = "insert into admin value(NULL,'".$username."','".$password."','".$level."','".$nama."')";
	if ($conn->query($sqlAdmin)===TRUE) {
		echo "<script>window.alert('Data Tersimpan');
        window.location=('home.php?r=tambah_admin')</script>";
	}
	else{
		echo "<script>window.alert('eror ".$conn->error."');
        window.location=('home.php?r=tambah_admin')</script>";
	}
}
if ($ip=='update_kelas') {
	$kelas = $_POST['kelas'];
	foreach ($_POST['naik'] as $naik) {
		$updateKelas = "update siswa set kelas = '".$kelas."' where nis ='".$naik."'";
		if ($conn->query($updateKelas)===TRUE) {
		}
		else{
			echo "error".$updateKelas."<br/>".$conn->error;
		}
	}
	echo "<script>window.alert('Data Update Tersimpan');
        window.location=('home.php?r=kenaikan_kelulusan_siswa')</script>";
}
if ($ip=='hadir') {
	$var = $_POST['tgl'];
	$alasan='';
	if (empty($_POST['alasan'])) {
		$alasan = '-';
	}
	else{
		$alasan = $_POST['alasan'];
	}
	$alasan = $conn->real_escape_string($alasan);
	$tgl = str_replace('/', '-', $var);
	$date = date('Y-m-d', strtotime($tgl));
	foreach ($_POST['naik'] as $naik) {
		$updateKelas = "insert into transaksitelat value(NULL,'".$naik."','".$date."','".$alasan."')";
		if ($conn->query($updateKelas)===TRUE) {
		}
		else{
			echo "error".$updateKelas."<br/>".$conn->error;
		}
	}
	echo "<script>window.alert('Data Tersimpan');
        window.location=('home.php?r=input_hadir')</script>";
}
$conn->close();
?>