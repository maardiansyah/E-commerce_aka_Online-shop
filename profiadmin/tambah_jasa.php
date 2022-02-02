<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
    $durasi=$_POST['durasi'];
    $ongkir=$_POST['ongkir'];

	$cek="INSERT INTO  tbl_jasakirim (Kd_Jasa, Nama_Jasa, Durasi, Ongkir) VALUE('$kode','$nama','$durasi','$ongkir')";
	$query_add = mysql_query($cek);

	if ($query_add) {
        echo "<script>alert('Data Berhasil Ditambahkan');window.location='kelola_jasa.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Ditambahkan, Periksa Kembali');window.location='kelola_jasa.php'</script>";

}
?>