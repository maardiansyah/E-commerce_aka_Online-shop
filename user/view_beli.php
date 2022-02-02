<?php 
include("../koneksi.php");
session_start();
if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-COMMERCE</title>
    <link rel="stylesheet" href="tampilan.css">
    <link rel="stylesheet" href="w3.css">
</head>
<style>
.mySlides {display:none;}
</style>
<body>     
    <div class="badan-utama">        
     <header>&nbsp;</header> 
        <nav class="navigasi">
          <?php include('menu.php');?>
		</nav> 
        <div class="banner">
          <div class="w3-content w3-display-container">
            <img class="mySlides" src="images/44.jpg"="width:100%"><img class="mySlides" src="images/555.jpg" style="width:100%">
            <img class="mySlides" src="images/777.jpg" style="width:100%">                
            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
          <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
          </div>
          <script>
             var slideIndex = 1;
                showDivs(slideIndex);
                
                function plusDivs(n) {
                  showDivs(slideIndex += n);
                }
                
                function showDivs(n) {
                  var i;
                  var x = document.getElementsByClassName("mySlides");
                  if (n > x.length) {slideIndex = 1}
                  if (n < 1) {slideIndex = x.length}
                  for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                  }
                  x[slideIndex-1].style.display = "block";  
                }
          </script>
        </div>          
        <div class="menu-tengah1">
			<div class="badan">
			<h2>DETAIL PESANAN</h2>
				<?php
					$query = "SELECT * FROM tbl_produk INNER JOIN tbl_kategori on tbl_produk.Kd_Kategori = tbl_kategori.Kd_Kategori 
					INNER JOIN tbl_supplier on  tbl_produk.Kd_Supplier = tbl_supplier.Kd_Supplier INNER JOIN tbl_pesanan on tbl_produk.Kd_Barang = tbl_pesanan.Kd_Barang
					INNER JOIN tbl_customer ON tbl_pesanan.Kd_Customer = tbl_customer.Kd_Customer
					WHERE id_pesan ='".$_REQUEST['id_pesan']."' ORDER BY id_barang";       
					$result = mysql_query($query);
					$data=mysql_fetch_array($result);
					
					//untuk harga jual dari tbl barang
					$query_hj = "SELECT tbl_produk.Kd_Barang, tbl_produk.Harga_Jual, tbl_pesanan.Kd_Barang FROM tbl_produk INNER JOIN tbl_pesanan on tbl_produk.Kd_Barang = tbl_pesanan.Kd_Barang
					WHERE id_pesan ='".$_REQUEST['id_pesan']."'";
					$hasil = mysql_query($query_hj);
					$harga = mysql_fetch_array($hasil);
					
					
					$cek_inv = "SELECT SUBSTR(`Kd_Invoice`,9,1) AS `Total` FROM `tbl_transaksi` ORDER BY `Kd_Invoice` DESC LIMIT 0,1";
					$resultl = mysql_query($cek_inv);
					$data_inv = mysql_fetch_array($resultl);
					$kode = $data_inv['Total'] + 1;
				?>
				<div class="list-produk-det-1">
					<img src="../profiadmin/produk/<?php echo $data['Foto']?>" width="30%">
				</div>
				<div class="list-produk-det-2">
					<form class="w3-container" action="tambah_beli.php" method="post">
							<div class="w3-section">
								<label><b>Kode Pesanan</b></label>
								<input class="w3-input w3-border" type="text" name="id_pesan" value="<?php echo $data['id_pesan']?>" readonly>
								<label><b>Nama Customer</b></label>
								<select class="w3-input w3-border" name="customer">
									<option value="<?php echo $data['Kd_Customer']?>"><?php echo $data['Customer']?></option>
								</select>
								<label><b>No Invoice</b></label>
								<input class="w3-input w3-border" type="text" name="invoice" value="INV/BRG/<?php echo $kode?>/2020" readonly>
								<label><b>Nama Barang</b></label>
								<select class="w3-input w3-border" name="barang">
									<option value="<?php echo $data['Kd_Barang']?>"><?php echo $data['Nama']?></option>
								</select>
								<label><b>Jumlah Beli</b></label>
								<input class="w3-input w3-border" type="text" name="jumlah" value="<?php echo $data['Jumlah']?>" readonly>
								<label><b>Harga beli</b></label>
								<select class="w3-input w3-border" name="harga_jual" readonly>
									<option value="<?php echo $harga['Harga_Jual']?>">Rp. <?php echo number_format($harga['Harga_Jual'],0,',','.')?></option>
								</select>
								<!--<input  class="w3-input w3-border" type="text" name="harga_jual" value="<?php echo $harga['Harga_Jual']?>" readonly>-->
								<label><b>Total Harga</b></label>
								<select class="w3-input w3-border" name="harga" readonly>
									<option value="<?php echo $data['Harga_Jual']?>">Rp. <?php echo number_format($data['Harga_Jual'],0,',','.')?></option>
								</select>
								<!--<input  class="w3-input w3-border" type="number" name="harga" value="<?php echo $data['Harga_Jual']?>" readonly>-->
								<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Add Chart</button>
							</div>
						</form>
				</div>
          </div>      
        <footer>
            @copyright 2020 || by STMIK GLOBAL
            <br>Edited By All
        </footer> 
    </div> 
</body>
</html>
<?php }?>