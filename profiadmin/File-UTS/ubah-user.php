<?php 
include("koneksi.php");
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$email=$_POST['email'];
	$telp=$_POST['telp'];
	$alamat=$_POST['alamat'];

$cek = "UPDATE `tbl_user` SET `id`=NULL, `username`='$username', `password`='$password', `nama`='$nama', `level`='$level' WHERE `id`='$id'";


		$query_add = mysql_query($cek);
			if ($query_add) {
				echo "<script>alert('Data Berhasil Diubah');window.location='index.php'</script>";
			}
			else
				echo "<script>alert('Data Gagal Diubah, Periksa Data Kembali (username). Coba Lagi!');window.location='index.php'</script>";

}
 ?>