<?php  
include("../koneksi.php");
	$cek = "DELETE From tbl_jasakirim WHERE id_jasa='".$_REQUEST['id']."'";
	$delete=mysql_query($cek);
//echo $cek;
//echo $query_edit;
	if ($delete) {
        echo "<script>alert('Data Berhasil Dihapus');window.location='kelola_jasa.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Dihapus');window.location='kelola_jasa.php'</script>";

?>