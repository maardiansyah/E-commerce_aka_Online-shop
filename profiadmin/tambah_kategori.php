<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
	$kategori=$_POST['kategori'];
	

	$cek="INSERT INTO  tbl_kategori (Kd_Kategori, Kategori) VALUE('$kode','$kategori')";
	$query_add = mysql_query($cek);

	if ($query_add) {
        echo "<script>alert('Data Berhasil Ditambahkan');window.location='kelola_kategori.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Ditambahkan, Periksa Kembali');window.location='kelola_kategoris.php'</script>";

}
?>