<!DOCTYPE html>
<?php
include("../koneksi.php");
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
          <h2>KATALOG PRODUK</h2>
			<?php
			$query =  "SELECT * FROM tbl_produk ORDER BY id_barang";
			$hasil = mysql_query($query);
			?>
			<?php
			while($data = mysql_fetch_array($hasil)){
			?>
             <div class="list-produk">
			 <img src="../profiadmin/produk/<?php echo $data['Foto']?>" width="30%">
			 <h4><?php echo $data['Nama'];?></h4>
			 <h5>Rp. <?php echo number_format($data['Harga_Jual'],0,',','.')?></h5>
			 <a class="tombol tombol-detail" href="view_det.php?kd=<?php echo $data['Kd_Barang'];?>">Detail</a>
			 </div>
            <?php }?>
          </div>      
        <footer>
            @copyright 2020 || by STMIK GLOBAL
            <br>Edited By All
        </footer> 
    </div> 
</body>
</html>
<?php }?>