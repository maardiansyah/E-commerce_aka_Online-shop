<?php 
include('../koneksi.php');
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
          <h2>DETAIL TRANSAKSI</h2>
            <?php
				$query = "SELECT * FROM `tbl_transaksi` INNER JOIN `tbl_kirim` ON `tbl_transaksi`.`Kd_Invoice` = `tbl_kirim`.`Kd_Invoice` 
					INNER JOIN `tbl_customer` ON `tbl_customer`.`Kd_Customer` = `tbl_kirim`.`Kd_Customer` INNER JOIN tbl_kota
					ON `tbl_customer`.`Kd_Kota` =  `tbl_kota`.`Kd_Kota` WHERE `tbl_transaksi`.`Kd_Invoice` = '".$_REQUEST['kd_inv']."' AND `tbl_customer`.`Kd_Customer` = '".$_SESSION['user']."' ORDER BY `id_transaksi`";
				$result = mysql_query($query);
				$data = mysql_fetch_array($result);	
			?>
			<div class="list-produk-det-1">
				<h4 align="center">Bukti Bayar Transaksi</h4>
				<hr>
				<?php
					if($data['Bukti_Bayar'] <> ''){
				?>
					<img src="bukti_bayar/<?php echo $data['Bukti_Bayar'];?>" width="100%">
					<hr>
					<h4>Status Bayar &nbsp;<?php echo $data['Status_Bayar']?></h4>
					<h4>Status Pengeiriman &nbsp; &nbsp;<?php echo $data['Status_Kirim']?></h4>
				<?php 
				}else{
					echo "
					<h4 align=center>Belum ada pembayaran<br>Silahkan melalukukan pembayaran sesuai total transaksi & Upload bukti bayar
					<p>Nama&nbsp;&nbsp;Imas Santika Sammas</p>
					<p>Transfer ke rekening &nbsp;&nbsp;BNI-MANDIRI-BCA</p></h4>";
					echo "<hr>";
					echo "<form role=form action=ubah_beli.php?kd_inv=".$_REQUEST['kd_inv']." method =post enctype=multipart/form-data> ";
					echo "<label><h4>Upload Bukti Bayar</h4></label>";
					echo "<input type=file name=image>";
					echo "<hr>";
					echo "<button type=save name=submit>save</button>";
					echo "</form>";
				}
				?>
			</div>
			<div class="list-produk-det-2">
				<table>
					<tr>
						<td width="20%"><h4>Nama</h4></td>
						<td width="5%"><h4>:</h4></td>
						<td><h4><?php echo $data['Customer']?></h4></td>
					</tr>
					<tr>
						<td><h4>Alamat</h4></td>
						<td width="5%"><h4>:</h4></td>
						<td><h4><?php echo $data['Alamat']?>, <?php echo $data['Kota']?></h4></td>
					</tr>
					<tr>
						<td><h4>Telpon</h4></td>
						<td width="5%"><h4>:</h4></td>
						<td><h4><?php echo $data['Telp']?></h4></td>
					</tr>
				</table>
				<hr>
				<table>
					<tr>
						<td width="20%"><h4>No. Invoice</h4></td>
						<td width="5%"><h4>:</h4></td>
						<td><h4><?php echo $data['Kd_Invoice']?></h4></td>
					</tr>
					<tr>
						<td><h4>Jumlah Barang</h4></td>
						<td width="5%"><h4>:</h4></td>
						<td><h4><?php echo $data['Jumlah_Barang']?></h4></td>
					</tr>
					<tr>
						<td><h4>Ongkos Kirim</h4></td>
						<td width="5%"><h4>:</h4></td>
						<td><h4>Rp. <?php echo number_format($data['Fee_Kirim'],0,',','.')?></h4></td>
					</tr>
					<tr>
						<td><h4>Total Bayar</h4></td>
						<td width="5%"><h4>:</h4></td>
						<td><h4>Rp. <?php echo number_format($data['Total_Bayar'],0,',','.')?></h4></td>
					</tr>
				</table>
				<hr>
				<table class="demo-table responsive">
					<thead>
						<tr>
							<th width="23%" scope="col">Nama Barang</th>
							<th width="23%" scope="col">Gambar</th>
							<th width="20%" scope="col">Price</th>
							<th width="10%" scope="col">Jumlah</th>
							<th width="23%" scope="col">Total Bayar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query1 = "SELECT * FROM `tbl_pembelian` INNER JOIN `tbl_produk` ON `tbl_pembelian`.`Kd_Barang` = `tbl_produk`.`Kd_Barang`
							INNER JOIN `tbl_customer` ON `tbl_pembelian`.`Kd_Customer` = `tbl_customer`.`Kd_Customer`
							WHERE `Kd_Invoice` = '".$data['Kd_Invoice']."' ORDER BY `id_beli`";
							$result1 = mysql_query($query1);
							while($data1 = mysql_fetch_array($result1)){
						?>
						<tr>
							<td><?php echo $data1['Nama']?></td>
							<td><img src="../profiadmin/produk/<?php echo $data1['Foto']?>" width="45%"></td>
							<td align="right">Rp. <?php echo number_format($data1['Harga_Jual'],0,',','.')?></td>
							<td><?php echo $data1['Jumlah_Barang']?></td>
							<td>Rp. <?php echo number_format($data1['Total_Bayar'],0,',','.')?></td>
						</tr>
						<?php }?>
						<tr>
							<td colspan="4" align="left"><h4>Total Pembayaran</h4></td>
							<td align = "right"><h4>Rp. <?php echo number_format($data['Total_Bayar'],0,',','.')?></h4></td>
						</tr>
					</tbody>
				</table>
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