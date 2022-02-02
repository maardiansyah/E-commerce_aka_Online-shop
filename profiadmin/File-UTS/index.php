<?php 
include ("koneksi.php");
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
      <!-- Bikin Menu.php ----->
      <?php 
        include ("menu.php");
       ?>
      <!-- akhir menu -->
    </div>
    <div id="content">
       <div class="inner">
          <div class="row">
              <div class="col-lg-12"><h2> ADMINISTRATOR</h2></div>
          </div><hr />
      <div class="row">
             <div class="col-lg-12">
                <div class="panel panel-default">
                   <div class="panel-body">
                      <div class="table-responsive">                            
               Tambah Data User :&nbsp;<a href="regis-2.php"><img src="assets/img/add.png" width="20"></br></br></a> 
                             <table class="table table-striped table-border table-hover">
                               <thead>
                                <tr>
                                 <th width="85"><div align="center">No.</div></th>
                                 <th width="85"><div align="center">Username</div></th>
                                 <th width="85"><div align="center">Password</div></th>
                                 <th width="85"><div align="center">Nama</div></th>
                                 <th width="85"><div align="center">Action</div></th>
                               </tr>
                               </thead>
                               <tbody>
                                 <?php 
                                    $noPage = (isset($_GET['page']))? $_GET['page'] : 1;
                                    $dataPerPage = 10;
                                    $offset = ($noPage - 1) * $dataPerPage;
                                    $total_data="SELECT COUNT(*) AS jumData FROM `tbl_user` ORDER BY `username`";
                                    $query = "SELECT * FROM `tbl_user` ORDER BY `id`LIMIT $offset, $dataPerPage";
                                    $result = mysql_query($query); 
                                    //eksekusi query
                                    $No = 1;
                                    While ($data = mysql_fetch_array($result)){
                                      ?>
                                      <tr>
                                      <td><div align="center"><?php echo $No ?></div></td>
                                      <td><div align="left"><?php echo $data['username'] ?></div></td>
                                      <td><div align="center"><?php echo $data['password'] ?></div></td>
                                      <td><div align="left"><?php echo $data['nama'] ?></div></td>
                                      <td align="center">
                                        <a href="edit_user.php?id=<?php echo $data['id']?>"><img src="assets/img/edit.png" width="20"></a>&nbsp;
                                        <a href="hapus.php?id=<?php echo $data['id'] ?>">
                                        <img src="assets/img/delete.png" width="20"></a>
                                      </td>
                                    </tr>
                                    <?php 
                                      $No++;
                                    }
                                      $hasil = mysql_query($total_data);
                                      $data = mysql_fetch_array($hasil);

                                      $jumData = $data['jumData'];
                                      $jumPage = ceil($jumData/$dataPerPage);

                                      $showPage = 1;
                                     ?>
                                     <tr>
                                       <td colspan="10"><div class="center">
                                         <div class="paginatioan">
                                           <?php 
                                           // tampilan 1st page
                                           if($noPage != 1)
                                            echo "<a href='".$_SERVER['PHP_SELF']."?page=".$showPage." 'class=active> &laquo; First</a>&nbsp&nbsp";
                                          // tampilan lnik previous
                                          if($noPage>1)
                                            echo"<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'class=active>Prev</a>&nbsp&nbsp";
                                          // halaman dan link
                                          for($page = 1; $page <=$jumPage;$page++)
                                          {
                                            if ((($page>=$noPage - 3) && ($page<=$noPage+3))||($page ==1)||($page==$jumPage))
                                            {
                                              if(($showPage==1)&&($page!=2));
                                              if(($showPage != ($jumPage-1))&&($page==$jumPage));
                                              if($page==$noPage)
                                                echo "<a href='".$_SERVER['PHP_SELF']."?page=".$page."' class=active>".$page."</a>&nbsp";
                                              else
                                                echo "<a href='".$_SERVER['PHP_SELF']."?page=".$page."'class=active>".$page."</a>&nbsp";
                                              $showPage=$page;
                                            }

                                          }

                                          // Link Next
                                          if ($noPage<$jumPage)
                                            echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'class=active>Next</a>&nbsp&nbsp";
                                          // the last page
                                          if ($noPage<$jumPage)
                                            echo "<a href='".$_SERVER['PHP_SELF']."?page=".($jumPage)."'class=active>Last&raquo</a>&nbsp&nbsp";
                                            ?>
                                          
                                         </div>
                                       </div>
                                     </td>
                                    </tr>
                                
                               </tbody>
                             </table>
                         </div>      
                   </div>
                </div>
             </div>
      </div>
          <hr>
     </div>
  </div>
    <div id="footer">
      <p align="center">SR12 HERBAL SKINCARE</p>
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
<?php 
}
 ?>