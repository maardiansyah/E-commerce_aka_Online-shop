<?php 
session_start();
if(isset($_SESSION['user'])){
	session_destroy();
	echo"<script type='text/javascript'>
		alert('Logout berhasil');
		location=('../../e-commerce');
		</script>";
}
?>