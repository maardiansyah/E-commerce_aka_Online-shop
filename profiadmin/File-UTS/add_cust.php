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
                    <h1 class="page-header">Tambah Data Customer (Only)</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="badan">
                                <?php
                                 $kode_cst = mysql_query("SELECT `id_customer` FROM `tbl_customer` ORDER BY `id_customer` DESC LIMIT 0,1"); 
                                 $data_cst = mysql_fetch_array($kode_cst);
                                 $Kode_Customer = $data_cst['id_customer'] + 1; 
                                ?>
                                <form action="../tambah_cust.php" method="post" role="form-group">
                                  <div class="container">
                                    <div class="form-group">
                                      <tr>
                                        <td><label><b>User Name</b></label></td>
                                        <td><input class="form-control" type="text" name="username" id="username" value="<?php echo "CST00".$Kode_Customer ?>" readonly> </td>
                                      </tr>
                                    </div>
                                    <div class="form-group">
                                      <tr>
                                        <td><label for="password"><b>Password</b></label></td>
                                        <td><input class="form-control" type="password" placeholder="Enter Password" name="password" id="password" required></td>
                                      </tr>
                                    </div>  
                                    <div class="form-group">
                                      <tr>
                                        <td><label for="nama"><b>Nama Customer</b></label></td>
                                        <td><input class="form-control" type="text" name="nama" id="nama" placeholder="Enter Your Name"  required></td>
                                      </tr>
                                      <div class="form-group">
                                      <tr>
                                        <td><label  for="alamat"><b>Alamat</b></label></td>
                                        <td><textarea class="form-control"name="alamat" id="alamat"></textarea></td>
                                      </tr>
                                    </div>
                                    <div class="form-group">
                                      <tr>
                                        <td><label for="kota"><b>Nama Kota</b></label></td>
                                        <td><select class="form-control" name="kota" id="kota"></td>
                                      </tr>
                                    </div>
                                    <?php
                                      $result_kategori = mysql_query("SELECT * FROM `tbl_kota` ORDER BY `id_kota`"); //execute the query $query 
                                      while ($data_kategori = mysql_fetch_array($result_kategori)) {
                                    ?>
                                     <option value="<?php echo $data_kategori['Kd_Kota'] ?>"><?php echo $data_kategori['Kota'] ?></option>
                                    <?php } ?>
                                    </select> 
                                    <div>
                                      <tr>
                                        <td><label for="telp"><b>Telp Number</b></label></td>
                                        <td><input class="form-control" type="text" name="telepon" id="telepon" placeholder="Enter Your Telphone Number"  required></td>
                                      </tr>
                                    </div>          
                                    <div>
                                      <tr>
                                        <td><label for="email"><b>Email</b></label></td>
                                        <td><input class="form-control" type="text" name="email" id="email" placeholder="Enter Your Email"  required></td>
                                      </tr>
                                    </div>    
                                    <div>
                                      <tr>
                                        <td><label for="tgl"><b>Tanggal Registrasi</b></label></td>
                                        <td><input class="form-control" type="date" name="join" id="join" placeholder="Enter Your Date Of Registration"  required></td>
                                      </tr>
                                    </div>          
                                    <div>
                                      <tr>
                                        <td><label for="gender"><b>Gender</b></label></td>
                                        <td>
                                          <select class="form-control" name="gender" id="gender">
                                          <option value="Wanita">Wanita</option>
                                          <option value="Pria">Pria</option>
                                          </select>
                                        </td>
                                      </tr>
                                    </div> 
                                    <hr>    
                                    <div>
                                      <tr>
                                        <td><button type="submit" class="form-control" name="submit" 
                                          style="background-color: green;
                                          color: white;
                                          border: 1px;
                                          border-radius: 5px">Register</button></td>
                                      </tr>
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