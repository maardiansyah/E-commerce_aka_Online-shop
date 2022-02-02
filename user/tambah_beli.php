<?php
include("../koneksi.php");
$Id_Pesanan = $_POST['id_pesan'];
$Kd_Customer = $_POST['customer'];
$Kd_Barang = $_POST['barang'];
$Jumlah_Barang = $_POST['jumlah'];
$Harga_Jual = $_POST['harga_jual'];
$Total_Bayar = $_POST['harga'];
$Kd_Invoice = $_POST['invoice'];

$cek = "INSERT INTO `tbl_pembelian` (`Kd_Barang`, `Kd_Customer`, `Jumlah_Barang`, `Harga_Jual`, `Total_Bayar`, `Kd_Invoice`, `Status_Beli`)
VALUES ('$Kd_Barang','$Kd_Customer','$Jumlah_Barang','$Harga_Jual','$Total_Bayar','$Kd_Invoice','Pending')";
$query_add = mysql_query($cek);

if($query_add){
	$query_del = mysql_query("DELETE FROM `tbl_pesanan` WHERE `id_pesan` = '".$Id_Pesanan."'");
	header('Location: pembelian.php');
}else{
	header('Location: troli.php');
}
?>