<?php 
include("koneksi.php");
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$level = $_POST['level'];

$cek = "INSERT INTO `tbl_user` (`id`,`username`,`password`,`nama`,`level`) VALUES(NULL ,'$username', '$password', '$nama', 'level')";

		$query_add = mysql_query($cek);
			if ($query_add) {
				header('Location: index.php');

			}
			else
				header('Location: edit_user.php');

}
 ?>