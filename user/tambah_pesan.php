<?php
include("../koneksi.php");
if(isset($_POST['submit'])){
	$Customer = $_POST['customer'];
	$Barang = $_POST['barang'];
	$Jumlah = $_POST['jumlah'];
	$Harga =$_POST['jumlah'] * $_POST['harga'];
	$Tanggal = date("Y-m-d");
	
	$cek = "INSERT INTO `tbl_pesanan`(`Kd_Barang`,`Kd_Customer`,`Jumlah`,`Harga_Jual`,`Tanggal_Pesan`)
	VALUES ('$Barang','$Customer','$Jumlah','$Harga','$Tanggal')";
	$query_add = mysql_query($cek);

	if($query_add){
		header('Location: troli.php');
	}else{
		//mysql_error();
		header('Location: index.php');
		}
}
?>