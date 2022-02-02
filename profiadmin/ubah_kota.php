<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
    $kota=$_POST['kota'];
    
    $cek="UPDATE tbl_kota SET Kd_Kota='$kode', Kota='$kota' WHERE id_kota='".$_REQUEST['id']."' ";
    $query_edit = mysql_query($cek);

    if ($query_edit) {
        echo "<script>alert('Data Berhasil Diubah');window.location='kelola_kota.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Diubah');window.location='kelola_kota.php'</script>";

}
?>
   