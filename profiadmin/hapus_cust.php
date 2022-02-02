<?php  
include("../koneksi.php");
	$cek = "DELETE From tbl_customer WHERE id_customer='".$_REQUEST['id']."'";
	$delete=mysql_query($cek);
//echo $cek;
//echo $query_edit;
	if ($delete) {
        echo "<script>alert('Data Berhasil Dihapus');window.location='kelola_customer.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Dihapus');window.location='kelola_customer.php'</script>";

?>