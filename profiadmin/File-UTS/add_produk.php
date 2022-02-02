<?php 
include ("koneksi.php");
 ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8" />
  <title>Administrator</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
  <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
</head>
<body class="padTop53 " >
  <div id="wrap">
     <div id="top">
        <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
           <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" 
           class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
           <i class="icon-align-justify"></i></a>
           <header class="navbar-header"><a href="../profiadmin/" class="navbar-brand"><img src="assets/img/logo.png" alt="" /></a></header>
           <ul class="nav navbar-top-links navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user "></i>&nbsp; <i class="icon-chevron-down ">
                </i></a>
         <ul class="dropdown-menu dropdown-user">
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="icon-signout"></i> Logout </a></li>
                 </ul>
              </li>
           </ul>
        </nav>
      </div>
    <div id="left">
      <div class="media user-media well-small">
         <a class="user-link" href="../profiadmin/">
         <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" /></a><br />
         <div class="media-body">
            <h5 class="media-heading">Admin</h5>
            <ul class="list-unstyled user-info">                        
               <li><a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a>&nbsp;&nbsp;Online</li> 
            </ul>
        </div><br />
      </div>
      <!-- Bikin Menu.php --->
      <?php 
        include ("menu.php");
       ?>
    </div>
       <div id="content">
          <div class="inner">
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Produk</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <form role="form" action="tambah-produk.php" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" name="nama" placeholder="Enter text">
                                      
                                    </div>  
                                    <div>
                                        <label>Kategori</label>
                                        <select style="width: 100px" name="kategori" class="form-control">
                                          <option value="01">01</option>
                                          <option value="02">02</option>
                                          <option value="03">03</option>
                                          <option value="04">04</option>
                                        </select>
                                      </div>
                                    <div >
                                      <label>Kode Barang</label>
                                      <select name="c_barang" style="width: 100px" class="form-control">
                                      <option value="01">01</option><option value="02">02</option>
                                      <option value="03">03</option><option value="04">04</option>
                                      <option value="05">05</option><option value="06">06</option>
                                      <option value="07">07</option><option value="08">08</option>
                                      <option value="09">09</option><option value="10">10</option>
                                      <option value="11">11</option><option value="12">12</option>
                                      <option value="13">13</option><option value="14">14</option>
                                      <option value="15">15</option><option value="16">16</option>
                                      <option value="17">17</option><option value="18">18</option>
                                      <option value="19">19</option><option value="20">20</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Suplier</label>;&nbsp;&nbsp;
                                        <select class="form-control" name="suplier" id="suplier" style="width: 100px">
                                          <option value="01">01</option>
                                          <option value="02">02</option>
                                        </select>
                                     </div> 
                                     <div class="form-group">
                                        <label>Tanggal Beli</label>
                                        <input type="date" class="form-control" name="tgl_beli" id="tgl_beli" placeholder="Enter text">
                                     </div>
                                     <div class="form-group">
                                        <label>Stok</label>
                                        <input class="form-control" name="stok" placeholder="Enter text">
                                     </div>    
                                     <div class="form-group">
                                        <label>Harga Beli</label>
                                        <input class="form-control" name="beli" placeholder="Enter text">
                                     </div>
                                     <div class="form-group">
                                        <label>Harga jual</label>
                                        <input class="form-control" name="jual" placeholder="Enter text">
                                     </div>
                                     <div>
                                       <label>Deskripsi</label>
                                       <input class="form-control" type="text" name="deskripsi" placeholder="Tulis Keterangan Deskripsi" style="height: 50px">
                                     </div>
                                     Pilih file :&nbsp; <input type="file" name="gambar" />
                                    <!--  <form action="upload.php" method="post" enctype="multipart/form-data">
                                        
                                        <input type="submit" name="upload" value="upload" />
                                    </form>  -->
                                    <div class="form-group">
                                      <button type="save" class="form-control" name="submit">Save</button>
                                    </div>   
                               </form>                                    
                                </div>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    <div id="footer">
      <p>SR12 HERBAL SKINCARE</p>
    </div>
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</body>
</html>