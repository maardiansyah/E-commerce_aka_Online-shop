<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
    $kategori=$_POST['kategori'];
    
    $cek="UPDATE tbl_kategori SET Kd_Kategori='$kode', Kategori='$kategori' WHERE id_kategori='".$_REQUEST['id']."' ";
    $query_edit = mysql_query($cek);

    if ($query_edit) {
        echo "<script>alert('Data Berhasil Diubah');window.location='kelola_kategori.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Diubah');window.location='kelola_kategori.php'</script>";

}
?>
   