<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
	$kota=$_POST['kota'];
	

	$cek="INSERT INTO  tbl_kota (Kd_Kota, Kota) VALUE('$kode','$kota')";
	$query_add = mysql_query($cek);

	if ($query_add) {
        echo "<script>alert('Data Berhasil Ditambahkan');window.location='kelola_kota.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Ditambahkan, Periksa Kembali');window.location='kelola_kota.php'</script>";

}
?>