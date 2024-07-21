<?php
if (isset($_GET['r'])) {
	$key = $_GET['r'];
	if ($key == 'input_kelas') {
		include 'modul/kelas/inputkelas.php';
	}
	if ($key == 'data_kelas') {
		include 'modul/kelas/kelas.php';
	}
	if ($key == 'input_siswa') {
		include 'modul/siswa/inputsiswa.php';
	}
	if ($key=='import_siswa') {
		include 'modul/siswa/importsiswa.php';
	}
	if ($key=='data_siswa') {
		include 'modul/siswa/siswa.php';
	}
	if ($key=='data_siswa_kelas') {
		include 'modul/siswa/datasiswa.php';
	}
	if ($key=='edit_data_siswa') {
		include 'modul/siswa/editsiswa.php';
	}
	if ($key=='hapus_data_siswa') {
		include 'modul/siswa/hapus.php';
	}
	if ($key=='input_siswa_hadir') {
		include 'modul/transaksi/inputtelat.php';
	}
	if ($key=='laporan_siswa_hadir') {
		include 'modul/transaksi/laporan.php';
	}
	if ($key=='data_siswa_hadir') {
		include 'modul/transaksi/datalaporan.php';
	}
	if ($key=='detail_siswa_hadir') {
		include 'modul/transaksi/detailtelat.php';
	}
	if ($key=='tambah_admin') {
		include 'modul/admin/tambahAdmin.php';
	}
	if ($key=='lihat_admin') {
		include 'modul/admin/lihatAdmin.php';
	}
	if ($key=='kenaikan_kelulusan_siswa') {
		include 'modul/siswa/kelasLulus.php';
	}
	if ($key=='proses_kenaikan_kelulusan_siswa') {
		include 'modul/siswa/prosesKelasLulus.php';
	}
	if ($key=='input_siswa_terlambat') {
		include 'modul/transaksi/inputtelat.php';
	}
	if ($key=='laporan_siswa_terlambat') {
		include 'modul/transaksi/laporan.php';
	}
	if ($key=='data_siswa_terlambat') {
		include 'modul/transaksi/datalaporan.php';
	}
	if ($key=='detail_siswa_terlambat') {
		include 'modul/transaksi/detailtelat.php';
	}
	if ($key=='input_hadir') {
		include 'modul/transaksi/hadir.php';
	}
	if ($key=='hadir') {
		include 'modul/transaksi/inputhadir.php';
	}
}
?>