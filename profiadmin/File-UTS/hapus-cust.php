<?php 
include("koneksi.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];

$cek = "DELETE FROM tbl_customer WHERE id_customer=$id";

		$query_add = mysql_query($cek);
			if ($query_add) {
				echo "<script>alert('Berhasil Dihapus');window.location='kel-cust.php'</script>";
			}
			else
				echo "<script>alert('OPerasi Gagal. Coba Lagi!');window.location='index.php'</script>";

}
 ?>