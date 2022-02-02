<?php  
include("../koneksi.php");
	$cek = "DELETE From tbl_kota WHERE id_kota='".$_REQUEST['id']."'";
	$delete=mysql_query($cek);
//echo $cek;
//echo $query_edit;
	if ($delete) {
        echo "<script>alert('Data Berhasil Dihapus');window.location='kelola_kota.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Dihapus');window.location='kelola_kota.php'</script>";

?>