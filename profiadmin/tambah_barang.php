<?php
include("../koneksi.php");
$target_dir ="produk/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk =1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($_POST['submit'])){
		$Kd_Barang = $_POST['kode'];
		$Nama = $_POST['nama'];
		$Kd_Kategori = $_POST['kategori'];
		$Kd_Supplier = $_POST['supplier'];
		$Tanggal_Beli = $_POST['tanggal'];
		$Stok = $_POST['jumlah'];
		$Deskripsi = $_POST['deskripsi'];
		$Harga_Beli = $_POST['beli'];
		$Harga_Jual = $_POST['jual'];

		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image -".$check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
		if (file_exists($target_file)) {
			echo "<br>Sorry,file already exists.</br>";
			$uploadOk = 0;
		}
		if ($_FILES["image"]["size"] > 1000000000000){
			echo "<br>Sorry, your file is too large.</br>";
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="jpeg" && $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "GIF" && $imageFileType != "JPEG"){
			echo "<br>Sorry, only JPG,JPEG,PNG & GIF file are allowed.</br>";
			$uploadOk =0;
		}
		if ($uploadOk ==0) {
			echo "<br>Sorry, your file was not uploaded.</br>";
		} else
			{
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
					$image_name = addslashes($_FILES['image']['name']);
					$cek ="INSERT INTO `tbl_produk`(`id_barang`,`Kd_Barang`,`Nama`,`Kd_Kategori`,`Kd_Supplier`,`Tanggal_Beli`,`Stok`,`Deskripsi`,`Harga_Beli`,`Harga_Jual`,`Foto`) VALUES (NULL,'$Kd_Barang','$Nama','$Kd_Kategori','$Kd_Supplier','$Tanggal_Beli','$Stok','$Deskripsi','$Harga_Beli','$Harga_Jual','$image_name')";
					$query_add = mysql_query($cek);

					if($query_add){
						header('Location: kelola_barang.php');
					}
					else 
						header ('Location: add_barang.php');
				} else{
					echo "<br>Sorry, there was an eror upload your file.</br>";
				}
			}
}
  ?>
