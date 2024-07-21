<?php
include 'koneksi.php';
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $conn->query("SELECT nis,nama,kelas FROM siswa WHERE nama LIKE '%".$searchTerm."%' or nis LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nis'].", ".$row['nama'].",".$row['kelas'];
}
//return json data
echo json_encode($data);
?>