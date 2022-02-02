<?php 
include("koneksi.php");
if (isset($_POST['submit'])) {
	
	$Nama = $_POST['nama'];
	$Kd_Kategori = $_POST['kategori'];
	$Kd_Barang = $_POST['c_barang'];
	$Kd_Supplier = $_POST['suplier'];
	$Tanggal_Beli = $_POST['tgl__beli'];
	$Stok = $_POST['stok'];
	$Harga_Beli = $_POST['beli'];
	$Harga_Jual = $_POST['jual'];
	$Deskripsi = $_POST['deskripsi'];

	// upload
	$gambar = upload(); 


	$cek = "UPDATE `tbl_produk` SET `id_barang`=NULL, `Kd_Barang`='$Kd_Barang', `Nama`='$Nama', `Deskripsi`='$Deskripsi', `Kd_Kategori`='$Kd_Kategori', `Kd_Supplier`='$Kd_Supplier', `Tanggal_Beli`='$Tanggal_Beli', `Stok`='$Stok', `Harga_Beli`='$Harga_Beli', `Harga_Jual`='$Harga_Jual', `Foto`='$gambar' WHERE `id_barang`='$id'";

		$qry = mysql_query($cek);
			if ($qry){
				echo "<script>alert('Berhasil Diubah');window.location='kel-produk.php'</script>";
			}
			else
				echo "<script>alert('OPerasi Gagal. Coba Lagi!');window.location='index.php'</script>";
	// print_r($id)		
}


function upload() {

// ambil data file
$namaFile = $_FILES['gambar']['name'];
$ukuranFile = $_FILES['gambar']['size'];
$eror = $_FILES['gambar']['eror'];
$tmpName = $_FILES['gambar']['tmp_name'];

// cek function
if (eror === 4) {
	echo "<script>alert('Silahkan Masukan Gambar')</script>";
	return false;
}

//cek gambar upload
$ekstensiGambarValid = ['jpg','jpeg','png','tif'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
	echo "<script>
			alert('Silahkan Masukan Gambar');
		</script>";
	return false;
}

// proses upload
move_uploaded_file($tmpName, 'produk/' .$namaFile);

return $namaFile;

}
//  print_r($namaFile);



 ?>