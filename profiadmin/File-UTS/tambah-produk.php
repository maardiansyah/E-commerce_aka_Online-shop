<?php 
include("koneksi.php");
if (isset($_POST['submit'])) {
	$Nama = $_POST['nama'];
	$Kd_Kategori = $_POST['kategori'];
	$Kd_Barang = $_POST['c_barang'];
	$Kd_Supplier = $_POST['suplier'];
	$Tanggal_Beli = $_POST['tgl_beli'];
	$Stok = $_POST['stok'];
	$Harga_Beli = $_POST['beli'];
	$Harga_Jual = $_POST['jual'];
	$Deskripsi = $_POST['deskripsi'];

	// upload
	$gambar = upload(); 


	$cek = "INSERT INTO `tbl_produk`(id_barang,Kd_Barang, Nama, Deskripsi, Kd_Kategori, Kd_Supplier, Tanggal_Beli, Stok, Harga_Beli, Harga_Jual, Foto)
            VALUES(NULL,'$Kd_Barang','$Nama','$Deskripsi','$Kd_Kategori','$Kd_Supplier','$Tanggal_Beli','$Stok','$Harga_Beli','$Harga_Jual','$gambar')";

		$qry = mysql_query($cek);
			if ($qry)
				echo "<script>alert('Berhasil Ditambahkan');window.location='kel-produk.php'</script>";

			else 
				echo "<script>alert('Produk Gagal Ditambahkan');window.location='index.php'</script>";
			
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

// cek gambar upload
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
move_uploaded_file($tmpName, 'produk/'.$namaFile);

return $namaFile;

}
 

 ?>