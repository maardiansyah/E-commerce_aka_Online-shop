<!DOCTYPE html>
<?php 
include('../koneksi.php');
session_start();
if(isset($_SESSION['user'])){
?>
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
         <?php include("menu.php");?>
		</nav> 
        <div class="banner">
          <div class="w3-content w3-display-container">
            <img class="mySlides" src="images/44.jpg" style ="width:100%"><img class="mySlides" src="images/555.jpg" style="width:100%">
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
          <div class="badan" id="">
          <h2>DETAIL PRODUK</h2>
			<?php
			$query = "SELECT * FROM `tbl_produk` INNER JOIN `tbl_kategori` ON `tbl_produk`.`Kd_Kategori` = `tbl_kategori`.`Kd_Kategori`
			INNER JOIN `tbl_supplier` ON `tbl_produk`.`Kd_Supplier`= `tbl_supplier`.`Kd_Supplier` WHERE `Kd_Barang` ='".$_REQUEST['kd']."'";
			$hasil = mysql_query($query);
			$data = mysql_fetch_array($hasil);

			$query_cust = "SELECT * FROM `tbl_customer` WHERE `Kd_Customer` = '".$_SESSION['user']."' ORDER BY `id_customer`";
			$result_cust = mysql_query($query_cust);
			$data1 = mysql_fetch_array($result_cust);
			?>
             <div class="list-produk-det-1">
			 <img src="../profiadmin/produk/<?php echo $data['Foto']?>" width="30%">
			 </div>
			 <div class="list-produk-det-2">
			 <table>
				<tbody>
					<tr>
					<td><h4>Nama</h4></td>
					<td width="10px"><h4>:</h4></td>
					<td><h4><?php echo $data['Nama'];?></h4></td>
					</tr>
					<tr>
					<td><h4>Deskripsi</h4></td>
					<td width="17px"><h4>:</h4></td>
					<td><h4><?php echo $data['Deskripsi'];?></h4></td>
					</tr>
					<tr>
					<td><h4>Kategori</h4></td>
					<td width="10px"><h4>:</h4></td>
					<td><h4><?php echo $data['Kategori'];?></h4></td>
					</tr>
					<tr>
					<td><h4>Nama Brand</h4></td>
					<td width="10px"><h4>:</h4></td>
					<td><h4><?php echo $data['Nama_Supplier'];?></h4></td>
					</tr>
					<tr>
					<td><h4>Stok</h4></td>
					<td width="10px"><h4>:</h4></td>
					<td><h4><?php echo $data['Stok'];?></h4></td>
					</tr>
					<tr>
					<td><h5>Harga</h5></td>
					<td width="10px"><h5>:</h5></td>
					<td><h5>Rp. <?php echo number_format ($data['Harga_Jual'],0,',','.')?></h5></td>
					</tr>
				</tbody>
			 </table>
			 <button onclick="document.getElementById('id02').style.display='block'" class="tombol tombol-beli" style="border-left:#0C3; border-bottom-left-radius:7; border-bottom:#0c3;border-left:solid">Pesan </button>
			 <div id="id02" class="w3-modal">
				 <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
					<div class="w3-center"><br>
						<h2>FORM PEMESANAN PRODUK</h2>
						<span onclick="document.getElementById('id02').style.display='none'"
						class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">X</span>
					</div>
					<form class="w3-container" action="tambah_pesan.php" method="post">
							<div class="w3-section">
								<label><b>Nama Customer</b></label>
								<select class="w3-input w3-border" name="customer">
									<option value="<?php echo $data1['Kd_Customer']?>"><?php echo $data1['Customer']?></option>
								</select>
								<label><b>Nama Barang</b></label>
								<select class="w3-input w3-border" name="barang">
									<option value="<?php echo $data['Kd_Barang']?>"><?php echo $data['Nama']?></option>
								</select>
								<label><b>Jumlah</b></label>
								<input class="w3-input w3-border" type="text" name="jumlah" placeholder="Enter QTY" require>
								<label><b>Harga Produk</b></label>
								<select class="w3-input w3-border" name="harga">
									<option value="<?php echo $data['Harga_Jual']?>">Rp. <?php echo number_format($data['Harga_Jual'],0,',','.')?></option>
								</select>
								<!--<input  class="w3-input w3-border" type="text" name="harga" value="<?php echo $data['Harga_Jual']?>" readonly>-->
								<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">pesan</button>
							</div>
						</form>
				 </div>
			 </div>
			 </div>			 
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