<?php 
include("koneksi.php");
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$Kd_Customer = $_POST['kode'];
	$Customer = $_POST['nama'];
	$Alamat = $_POST['alamat'];
	$Kd_Kota = $_POST['kota'];
	$Telp = $_POST['telepon'];
	$Email = $_POST['email'];
	$Gabung = $_POST['join'];
	$Jenkel = $_POST['gender'];

	$cek = "INSERT INTO `tbl_customer` (`id_customer`,`Kd_Customer`,`Customer`,`Alamat`,`Kd_Kota`,`Telp`,`Email`,`Gabung`,`Jenkel`)
            VALUES(NULL ,'$Kd_Customer', '$Customer', '$Alamat', '$Kd_Kota', '$Telp', '$Email', '$Gabung', '$Jenkel')";

		$query_add = mysql_query($cek);
			if ($query_add) {
				$cek = "INSERT INTO `tbl_user`(`username`,`password`,`nama`) VALUES ('$username',
				'$password','$Customer')";
				$query_add = mysql_query($cek);
				echo "<script>alert('Registrasi Berhasil');window.location='index.php'</script>";
			}
			else
				echo "<script>alert('Registrasi Gagal. Coba Lagi!');window.location='regis-2.php'</script>";
}
 ?>