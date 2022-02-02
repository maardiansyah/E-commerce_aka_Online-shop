<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
    $durasi=$_POST['durasi'];
    $ongkir=$_POST['ongkir'];
	

	$cek="UPDATE tbl_jasakirim SET Kd_Jasa='$kode', Nama_Jasa='$nama', Durasi='$durasi', Ongkir='$ongkir' WHERE id_jasa='".$_REQUEST['id']."' ";
   $query_edit = mysql_query($cek);
	
	if($query_edit){
		echo "<script type ='text/javascript'> alert ('Data berhasil di ubah');document.location='kelola_jasa.php';
		</script>";
	}else{
		echo "<script type ='text/javascript'> alert ('Data gagl di ubah');document.location='javascript:history.back(1)';
		</script>";
	}

}
?>