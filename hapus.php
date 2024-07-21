<?php
include 'koneksi.php';
$key = $_GET['k'];
$nis = $_GET['id'];
$nis = $conn->real_escape_string($nis);
if ($key=='hapus_siswa') {
	$sqlhapus = "delete from siswa where nis ='".$nis."'";
	if ($conn->query($sqlhapus)===TRUE) {
		echo "<script>window.alert('Data Siswa Terhapus');
        window.location=('home.php?r=data_siswa')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_detail') {
	$sqlHapusDetail = "delete from transaksitelat where no ='".$nis."'";
	if ($conn->query($sqlHapusDetail)===TRUE) {
		echo "<script>window.alert('Data Terhapus');
        window.location=('home.php?r=laporan_siswa_telat')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_admin') {
	$idAdmin = $_GET['id'];
	$sqlHapusAdmin = "delete from admin where id_admin = '".$idAdmin."'";
	if ($conn->query($sqlHapusAdmin)===TRUE) {
		echo "<script>window.alert('Data Terhapus');
        window.location=('home.php?r=lihat_admin')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_kelas') {
	$idKelas = $_GET['id'];
	$sqlHapusKelas = "delete from kelas where kode_kelas = '".$idKelas."'";
	if ($conn->query($sqlHapusKelas)===TRUE) {
		echo "<script>window.alert('Data Terhapus');
        window.location=('home.php?r=data_kelas')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
$conn->close();
?>