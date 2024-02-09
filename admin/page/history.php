<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - HALAMAN RIWAYAT PESANAN</title>
    <link href="../../dist/css/style.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<?php 
        session_start();
        include_once("../../koneksi.php"); //Koneksi

        $result = mysqli_query($conn, "SELECT * FROM produks ORDER BY id_produk DESC"); //Mengambil data produk atau printer_tb
        $ambilData = mysqli_query($conn, "SELECT * FROM produks, pesanans WHERE produks.id_produk = pesanans.id_produk") or die (mysqli_error($conn)); //Mengambil data transaksi

        if($_SESSION['status']!="login"){ //Cek Session
            header("location:../../index.php?pesan=Silahkan-Login-Terlebih-Dahulu");
        }

        if($_SESSION['username']!="admin"){ //Cek Session
            die("Anda bukan Admin");
        }

    ?>

<body>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light text-light bg-dark">
                <div class="navbar-header position-fixed" data-logobg="skin6">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                        <img src="../../img/banner1.jpg" width="200px" alt="homepage" class="dark-logo" />
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="mdi mdi-menu"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto"></ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <span class="logo-text">
                                <h2 class="mx-3 fw-bold text-light">HALAMAN ADMIN
                                </h2>
                            </span>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar position-fixed" data-sidebarbg="skin6">

            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="../dashboard.php" aria-expanded="false"><i class="fas fa-home"></i><span class="hide-menu">Dashboard</span></a></li>
                    </ul>
                </nav>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="produk.php" aria-expanded="false"><i class="fas fa-box"></i><span
                                    class="hide-menu">Produk</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="pesanan.php" aria-expanded="false"><i class="fas fa-list"></i><span
                                    class="hide-menu">Daftar Pesanan</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="history.php" aria-expanded="false"><i class="fas fa-clock"></i><span
                                    class="hide-menu">Riwayat Pesanan</span></a></li>

                </nav>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark "
                                href="../tambahproduk.php" aria-expanded="false"><i
                                    class="mdi mdi-view-dashboard"></i><span class="hide-menu">Tambah Produk</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper bg-dark" style="color: dark !important; background-color: #ffff !important;">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb text-dark">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item text-dark"><a href="index.html" class="link text-dark"><i
                                            class="mdi mdi-home-outline fs-4 "></i></a></li>
                                <li class="breadcrumb-item active text-dark" aria-current="page"></li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Riwayat Pesanan</h1>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <a href="logout.php" class="btn btn-danger text-white"><i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>No Transaksi</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                    while($hasil = mysqli_fetch_object($ambilData)) { if ($hasil->status == 2) { ?>
                        <tr>
                            <td class="text-center"><?= $hasil->id_pesanan ?></td>
                            <td><?= $hasil->nama_produk ?></td>
                            <td><?= "Rp. " . number_format($hasil->harga_total, 0, ".", "."); ?></td>
                            <td class="text"><span class="btn btn-info">Sudah Dikonfirmasi</span></td>
                            <td class="text"><a
                                    href="../../proses/hapus_riwayat.php?id_pesanan=<?= $hasil->id_pesanan?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <!-- <td><a href='edit.php?IdPrinter=$barang[IdPrinter]'>Edit</a> | <a href='delete.php?IdPrinter=$barang[IdPrinter]'>Delete</a></td></tr> -->
                        <?php
                    } }
                    ?>
                                        </tbody>
                                    </table>
                                    <?php

//Script ini untuk mengubah status konfirmasi dari orderan pembeli
if (isset($_GET['id'])) {
    
    include '../../koneksi.php'; //Koneksi

    $id = $_GET['id'];
    $status = 2;

    $query = "UPDATE pesanans SET status='$status' WHERE id_pesanan = '$id'";
    $run = mysqli_query($conn, $query);
    
    if ($run) {
        header("location:pesanan.php");
    }

}

?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <script src="../../dist/js/waves.js"></script>
    <script src="../../dist/js/sidebarmenu.js"></script>
    <script src="../../dist/js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
    let table = new DataTable('#myTable');
    </script>

</body>

</html>