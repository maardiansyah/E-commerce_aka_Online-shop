<?php 
// mengaktifkan session
session_start();

$_SESSION['session_email']='';
unset($_SESSION['session_email']);
session_unset();
// menghapus semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
echo "<script>alert('Terimakasih Atas Kerja Keras nya');window.location='../index.php'</script>";
?>