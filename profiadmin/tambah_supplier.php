<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
    $supplier=$_POST['supplier'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];
	

	$cek="INSERT INTO  tbl_supplier (Kd_Supplier, Nama_Supplier, Alamat, Telp) VALUE('$kode','$supplier','$alamat','$telp')";
	$query_add = mysql_query($cek);

	if ($query_add) {
        echo "<script>alert('Data Berhasil Ditambahkan');window.location='kelola_supplier.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Ditambahkan, Periksa Kembali');window.location='kelola_supplier.php'</script>";

}
?>