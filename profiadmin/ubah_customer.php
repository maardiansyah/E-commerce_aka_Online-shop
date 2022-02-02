<?php 
include ("../koneksi.php");
if (isset($_POST['submit'])) {
	$Kd_Customer=$_POST['Kd_Customer'];
	$Customer=$_POST['Customer'];
    $Jenkel=$_POST['Jenkel'];
    $Alamat=$_POST['Alamat'];
    $Kota=$_POST['Kota'];
    $Telp=$_POST['Telp'];
    $Email=$_POST['Email'];
    $Gabung=$_POST['Gabung'];
	

	$cek="UPDATE tbl_customer SET Kd_Customer='$Kd_Customer',Customer='$Customer',Jenkel='$Jenkel', Alamat='$Alamat', Kd_Kota='$Kota', Telp='$Telp', Email='$Email',Gabung='$Gabung' WHERE id_customer='".$_REQUEST['id']."' ";
	$query_edit = mysql_query($cek);

	if ($query_edit) {
        echo "<script>alert('Data Berhasil Diubah');window.location='kelola_customer.php'</script>";
	}
	else
		header('Location: index.php');

}
?>