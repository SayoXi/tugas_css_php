<?php 

include 'koneksi.php';
 

$id_pesanan = $_GET['id_pesanan'];
 
mysqli_query($conn,"DELETE FROM pesanans where id_pesanan='$id_pesanan'");
 
// mengalihkan halaman kembali ke index.php
header("location:pesanan.php");
 
?>