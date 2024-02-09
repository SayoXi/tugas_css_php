<?php
    include_once("../koneksi.php"); //Koneksi
    
    $id_produk = $_GET['id_produk']; //Mengambil IdPrinter
    
    $result = mysqli_query($conn, "DELETE FROM produks WHERE id_produk=$id_produk"); //Menghapus data dari tabel printer_tb berdasarkan IdPrinteer
    echo ("<script LANGUAGE='JavaScript'>
					window.alert('Data Berhasil dihapus! Silahkan Cek Di Page Produk');
					</script>");
    header("Location:dashboard.php?pesan=berhasil menghapus data"); //Dialokasikan ke halaman admin.php
?>