<?php 
    
    //Include Koneksi
    include_once('../koneksi.php');

    //Mengambil ID transaksi
    $id_pesanan = $_GET['id_pesanan'];
    
    $hasil = mysqli_query($conn, "DELETE FROM pesanans WHERE id_pesanan=$id_pesanan");
    
    //Dialokasikan ke halaman history.php
    header("Location:../admin/page/history.php");
    
?>