<?php 
include("../koneksi.php");
$result=mysql_query("SELECT * FROM `tbl_produk` WHERE `id_barang`='".$_REQUEST['id_barang']."'ORDER BY `id_barang`"); //execute query
$data=mysql_fetch_array($result);
$nama_file=$data['Foto'];
$target_file="produk/".$nama_file;

$cek="DELETE FROM `tbl_produk` WHERE `tbl_produk`.`id_barang`='".$_REQUEST['id_barang']."'";
$query_hapus=mysql_query($cek);

// echo "1.".$result;
// echo "<br>";
// echo $data['Foto'];
// echo"<br>","2";
// echo $cek;
// echo "<br>","3";
// echo $target_file;
// echo "<br>","4";
// echo $nama_file;
// echo"<br>","5.";
// echo $query_hapus;
// echo"<br>","6";

if ($query_hapus) {
	unlink($target_file);
	header('Location:kelola_barang.php');
}else
	header('Location:index.php');
 
?>