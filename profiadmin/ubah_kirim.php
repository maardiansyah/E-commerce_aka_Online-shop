<?php
include("../koneksi.php");
$target_dir = "bukti_kirim/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['submit'])){
	$id_kirim = $_GET['id_kirim'];
	$Jasa_Kirim = $_POST['jasa'];
	$Status_Kirim = $_POST['status'];
	$Tanggal_Kirim = $_POST['tanggal'];
	$Image_name = addslashes($_FILES['image']['name']);
	
	$result = mysql_query("SELECT * FROM `tbl_kirim` WHERE `id_kirim` = '".$_REQUEST['id_kirim']."' ORDER BY `id_kirim`");
	$data = mysql_fetch_array($result);
	
	if($Image_name <> ''){
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false){
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		}else{
			echo "File is not an image.";
			$uploadOk = 0;
		}
		
		if(file_exists($target_file)){
			echo "<br>Sorry, file already exists.</br>";
			$uploadOk = 0;
		}
		if($_FILES["image"]["size"] > 500000){
			echo "<br>Sorry, your file is too large.</br>";
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
			echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</br>";
			$uploadOk = 0;
		}else{
			$image_1 = $data['Bukti_Kirim'];
			$name_file = "bukti_kirim/".$image_1;
			unlink($name_file);
			
			if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
				$image_name = addslashes($_FILES["image"]["name"]);
				
				$cek = "UPDATE `tbl_kirim` SET `Tanggal_Kirim` = '$Tanggal_Kirim', `Status_Kirim` = '$Status_Kirim',
				`Penyedia_Jasa` = '$Jasa_Kirim', `Bukti_Kirim` = '$image_name' WHERE `id_kirim` = '".$_REQUEST['id_kirim']."'";
				$query_add = mysql_query($cek);
				
				if($query_add){
					header('Location: kelola_pengiriman.php');
				}else
					//mysql_error();
					header('Location: edit_kirim.php?id_kirim=$id_kirim');
			}
		
		}
	}else{
		$cek = "UPDATE `tbl_kirim` SET `Tanggal_Kirim` = '$Tanggal_Kirim', `Status_Kirim` = '$Status_Kirim',
			`Penyedia_Jasa` = '$Jasa_Kirim' WHERE `id_kirim` = '".$_REQUEST['id_kirim']."'";
		
		$query_add = mysql_query($cek);
		if($query_add){
			$query_beli = mysql_query("UPDATE `tbl_pembelian` SET `Status_Beli` = 'Done' WHERE `Kd_Invoice` = '".$data['Kd_Invoice']."'");
			$query_trans = mysql_query("UPDATE `tbl_transaksi` SET `Status_Bayar` = 'Lunas' WHERE `Kd_Invoice` = '".$data['Kd_Invoice']."'");
			header('Location: kelola_pengiriman.php');
		}else
			//mysql_error();
			header('Location: edit_kirim.php?id_kirim=$id_kirim');
	}
}
?>