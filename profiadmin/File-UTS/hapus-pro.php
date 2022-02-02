<?php 
include("koneksi.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];

$cek = "DELETE FROM tbl_produk WHERE id_barang=$id";

// print_r($_GET['id']);
// print_r($cek);
		$query_add = mysql_query($cek);
			if ($query_add) {
				echo "<script>alert('Berhasil Dihapus');window.location='kel-produk.php'</script>";
			}
			else
				echo "<script>alert('OPerasi Gagal. Coba Lagi!');window.location='index.php'</script>";

}
 ?>