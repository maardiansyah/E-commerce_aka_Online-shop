<?php 
include("../koneksi.php");
session_start();
if (isset($_SESSION['nama'])) 
{
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Administrator</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link rel="icon" type="image/png" href="images/favicon.ico"/>
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
  <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
  <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<script type="text/javascript">
    function delete_data(id)
     {
       if(confirm('Anda Yakin Menghapus Data Barang Dengan Kode : '+id+' ?'))
         {
          window.location.href='delete_barang.php?delete_id='+id;
         }
     }
</script>
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
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                </a>
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
      <?php
    include("menu.php");
    ?>
    </div>
    <div id="content">
       <div class="inner">
          <div class="row">
              <div class="col-lg-12">
                  <h2> KELOLA DATA PRODUK | Edit</h2>
        </div>
          </div><hr />
      <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                     <div class="panel-body">
                         <div class="table-responsive">                            
              Tambah Data Barang :&nbsp;<a href="add_barang.php"><img src="assets/img/add.png" width="20"></br></br></a> 
                            <div class="col-lg-6">
                              <?php 
                                $query = "SELECT * FROM `tbl_produk` WHERE `id_barang` = '".$_REQUEST['id_barang']."' ORDER BY `id_barang`";
                                $result=mysql_query($query); //execute query
                                $data=mysql_fetch_array($result);

                                $query_kategori = "SELECT * FROM `tbl_kategori` WHERE `id_kategori` = '".$data['Kd_Kategori']."' ORDER BY `id_kategori`";
										$result_kat = mysql_query($query_kategori);
										$data_kat = mysql_fetch_array($result_kat);
										
										$query_supplier = "SELECT * FROM `tbl_supplier` WHERE `id_supplier` = '".$data['Kd_Supplier']."' ORDER BY `id_supplier`";
										$result_sup = mysql_query($query_supplier);
										$data_sup = mysql_fetch_array($result_sup);
									?>
									<form role="form" action="ubah_barang.php?id=<?php echo $data['id_barang']?>" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Kode Barang</label>
											<input class="form-control" name="Kd_Barang" placeholder="Enter text" value="<?php echo $data['Kd_Barang']?>">
										</div>  
										<div class="form-group">
											<label>Kategori</label>
											<select name="Kd_Kategori" class="form-control">
												<option value="<?php echo $data_kat['Kd_Kategori']?>"><?php echo $data_kat['Kategori']?></option>
												<?php
												  $result_kategori = mysql_query("SELECT * FROM `tbl_kategori` ORDER BY `id_kategori`");
													 while ($data_kategori = mysql_fetch_array($result_kategori)) {
												?>
													 <option value="<?php echo $data_kategori['Kd_Kategori'] ?>"><?php echo $data_kategori['Kategori'] ?></option>
												<?php
													}
												?>
                                    </select>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Beli</label>
                                <input type="date" class="form-control" name="tanggal" value="<?php echo $data['Tanggal_Beli'] ?>"></input>
                              </div>
                              <div class="form-group">
                                <label>Harga Beli</label>
                                <input class="form-control" name="beli" value="<?php echo $data['Harga_Beli'] ?>"></input>
                              </div>
                              <div class="form-group">
                                <label>Deskripi Produk</label>
                                <textarea class="form-control" name="deskripsi"><?php echo $data ['Deskripsi']?></textarea>
                              </div>
                                <button type="save" class="btn btn-default" name="submit">Save</button>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label>Nama Produk</label>
                                <input class="form-control" name="nama" value="<?php echo $data['Nama'] ?>"></input>
                              </div>
                              <div class="form-group">
                               <label>Supplier</label>
										<select name="Kd_Supplier" class="form-control">
											<option value="<?php echo $data_sup['Kd_Supplier']?>"><?php echo $data_sup['Nama_Supplier']?></option>
											<?php
											  $result_supplier = mysql_query("SELECT * FROM `tbl_supplier` ORDER BY `id_supplier`");
												 while ($data_supplier = mysql_fetch_array($result_supplier)) {
											?>
												 <option value="<?php echo $data_supplier['Kd_Supplier'] ?>"><?php echo $data_supplier['Nama_Supplier'] ?></option>
											<?php
												}
											?>
										</select>
                                    <div class="form-group">
                                      <label>Jumlah</label>
                                      <input class="form-control" name="jumlah" value="<?php echo $data['Stok'] ?>"></input>
                                    </div>
                                    <div class="form-group">
                                      <label>Harga Jual</label>
                                      <input class="form-control" name="jual" value="<?php echo $data['Harga_Jual'] ?>"></input>
                                    </div>
                                    <div class="form-group">
                                      <img src="produk/<?php echo $data['Foto'] ?>" width="350">
                                    </div>
                                    <div class="form-group">
                                      <label>Image Produk</label>
                                      <input type="file" class="form-control" name="image" placeholder="Enter text"></input>
                                    </div>
                              </div>
                               </form>
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
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
</body>
</html>
<?php } ?>