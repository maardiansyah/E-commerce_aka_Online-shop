<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
    $supplier=$_POST['supplier'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];
    
    $cek="UPDATE tbl_supplier SET Kd_Supplier='$kode', Nama_Supplier='$supplier', Telp='$telp', Alamat='$alamat' WHERE id_supplier='".$_REQUEST['id']."' ";
    $query_edit = mysql_query($cek);
// echo $cek;
// echo $query_edit;
    if ($query_edit) {
        echo "<script>alert('Data Berhasil Diubah');window.location='kelola_supplier.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Diubah');window.location='kelola_supplier.php'</script>";

}

// echo mysql_eror(link);
// echo mysql_eror();
?>
   