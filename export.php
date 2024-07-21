<?php
include 'koneksi.php';
$key = $_GET['e'];
if ($key=='export_transaksi') {
	$tgl1 = $_GET['date1'];
	$tgl2 = $_GET['date2'];
	$kelas = $_GET['kelas'];
	$hari = date("d-m-Y");
	$sqlsiswatelat = "";
    if ($kelas=="semua") {
        $sqlsiswatelat = "select transaksitelat.nis, siswa.nama,siswa.kelas,transaksitelat.tanggal,transaksitelat.alasan from transaksitelat join siswa on transaksitelat.nis = siswa.nis where transaksitelat.tanggal between '".$tgl1."' and '".$tgl2."' order by transaksitelat.no asc";
    }
    else{
        $sqlsiswatelat = "select transaksitelat.nis, siswa.nama,siswa.kelas,transaksitelat.tanggal,transaksitelat.alasan from transaksitelat join siswa on transaksitelat.nis = siswa.nis where siswa.kelas = '".$kelas."' and transaksitelat.tanggal between '".$tgl1."' and '".$tgl2."' order by transaksitelat.no asc";
    }
    // Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");
 
	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=data_siswa_telat_$hari.xls");
	?>
	<table bordered="1">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Tanggal</th>
				<th>Alasan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$ab = 1;
			$resultsiswatelat = $conn->query($sqlsiswatelat);
            if ($resultsiswatelat->num_rows>0) {
                while ($row = $resultsiswatelat->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $ab;?></td>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['kelas'];?></td>
                    <td><?php
                    $tanggal1 = str_replace('-', '/', $row['tanggal']);
                    $hasiltanggal = date('d/m/Y', strtotime($tanggal1));
                    echo $hasiltanggal;
                    ?></td>
                    <td><?php echo $row['alasan'];?></td>
                </tr>
                <?php
                $ab++;
            	}
            }
            ?>
		</tbody>
	</table>
	<?php
}
?>