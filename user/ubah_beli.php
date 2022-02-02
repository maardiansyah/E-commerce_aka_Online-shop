<?php
include("../koneksi.php");
$target_dir = "bukti_bayar/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['submit'])){
	$kode_Invoice = $_GET['kd_inv'];
	$Tanggal = date("Y-m-d");
	
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false){
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	}else{
		echo "File is not an image";
		$uploadOk = 0;
	}
	
	if(file_exists($target_file)){
		echo "<br>Sorry, File alredy exists";
		$uploadOk = 0;
	}
	
	if($_FILES["image"]["size"] > 500000){
		echo "<br>Sorry, Your file is to large";
	}
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif"){
		echo "<br>Sory, Only JPG,PNG, & GIF are allowed";
		$uploadOk = 0;
	}
	if($uploadOk === 0){
		echo "<br>Sorry, your file was not uploaded";
	}else{
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
			$image_name = addslashes($_FILES["image"]["name"]);
			
			$cek = "UPDATE `tbl_transaksi` SET `Bukti_Bayar` = '$image_name', `Status_Bayar` = 'Konfirmasi', `Tanggal_Bayar` = '$Tanggal'
			WHERE `Kd_Invoice` = '".$kode_Invoice."'";
			$query_add = mysql_query($cek);
			
			if($query_add){
				header('Location: pengiriman_beli.php');
			}else
				header('Location: view_trans.php?kd_inv=$kode_Invoice');
		}
		
	}
}
?>