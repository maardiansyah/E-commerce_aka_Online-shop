<?php  
include("../koneksi.php");
	$cek = "DELETE From tbl_kategori WHERE id_kategori='".$_REQUEST['id']."'";
	$delete=mysql_query($cek);
//echo $cek;
//echo $query_edit;
	if ($delete) {
        echo "<script>alert('Data Berhasil Dihapus');window.location='kelola_kategori.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Dihapus');window.location='kelola_kategori.php'</script>";

?>