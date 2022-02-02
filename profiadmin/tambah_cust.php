<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$Kd_Customer=$_POST['kode'];
	$Customer=$_POST['customer'];
    $Jenkel=$_POST['gender'];
    $Alamat=$_POST['alamat'];
    $Kota=$_POST['kota'];
    $Telp=$_POST['telp'];
    $Email=$_POST['email'];
    $Gabung=$_POST['gabung'];
	

	$cek="INSERT INTO  tbl_customer (Kd_Customer, Customer, Jenkel, Alamat, Kd_Kota, Telp, Email, Gabung) VALUE('$Kd_Customer','$Customer','$Jenkel','$Alamat','$Kota','$Telp','$Email','$Gabung')";
	$query_add = mysql_query($cek);

	if ($query_add) {
        echo "<script>alert('Data Berhasil Ditambahkan');window.location='kelola_customer.php'</script>";
	}
	else
		echo "<script>alert('Data Gagal Ditambahkan, Periksa Kembali');window.location='kelola_customer.php'</script>";

}
?>