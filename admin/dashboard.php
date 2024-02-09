<?php 
        session_start();
        include_once("../koneksi.php"); //Koneksi

		// $jumlah_uang = mysqli_query($koneksi, "SELECT SUM(Jumlah) FROM transaksi WHERE status='2'");
		$jumlah_produk = mysqli_query($conn, "SELECT count(*) as id_produk FROM produks");
		$jumlah_pesanan = mysqli_query($conn, "SELECT count(*) as id_pesanan FROM pesanans");
		$jumlah_user = mysqli_query($conn, "SELECT count(*) as id_user FROM user");

        if($_SESSION['status']!="login"){ //Cek Session
            header("location:../index.php?pesan=Silahkan-Login-Terlebih-Dahulu");
        }

        if($_SESSION['username']!="admin"){ //Cek Session
            die("Anda bukan Admin");
        }

    ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - HALAMAN DATA PRODUK</title>
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
  
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full" style="color: dark !important; background-color: #b8dde5 !important;">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light text-light bg-dark">
                <div class="navbar-header position-fixed" data-logobg="skin6">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                        <img src="../img/banner1.jpg" width="200px" alt="homepage" class="dark-logo" />
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

        <aside class="left-sidebar position-fixed" data-sidebarbg="skin6" >

            <div class="scroll-sidebar" >
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark "
                                href="../admin/dashboard.php" aria-expanded="false"><i class="fas fa-home"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                    </ul>
                </nav>
                <nav class="sidebar-nav" >
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                href="../admin/page/produk.php" aria-expanded="false"><i class="fas fa-box"></i><span
                                    class="hide-menu">Produk</span></a>
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="../admin/page/pesanan.php" aria-expanded="false"><i class="fas fa-list"></i><span
                                    class="hide-menu">Daftar Pesanan</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="../admin/page/history.php" aria-expanded="false"><i class="fas fa-clock"></i><span
                                    class="hide-menu">Riwayat Pesanan</span></a></li>
                    </ul>
                </nav>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark "
                                href="../admin/tambahproduk.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Tambah Produk</span></a></li>
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
                        <h1 class="mb-0 fw-bold">Dashboard Admin </h1>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <a href="logout.php" class="btn btn-danger text-white"><i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
        </div>


        <div class="row px-5 py-3">
        <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4" >
            <div class="card" style="color: dark !important; background-color: #b8dde5 !important;">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <h1>
                                <?php 
								while($jumlahh = mysqli_fetch_array($jumlah_produk)){
									echo $jumlahh['id_produk'];
								}
							?>
                          </h1> 
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data</p>
                        <h4 class="mb-0">Jumlah Produk</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a class="btn btn-info" href="../admin/page/produk.php">klik Disini</a> 
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
            <div class="card" style="color: dark !important; background-color: #b8dde5 !important;">
                <div class="card-header p-3 pt-2">
                <div
                        class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <h1>
                        <?php 
								while($jumlah_pes = mysqli_fetch_array($jumlah_pesanan)){
									echo $jumlah_pes['id_pesanan'];
								}
							?>
                          </h1> 
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data</p>
                        <h4 class="mb-0"> Pesanan</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a class="btn btn-info" href="../admin/page/pesanan.php">klik Disini</a> 
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
            <div class="card" style="color: dark !important; background-color: #b8dde5 !important;">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <h1>
                        <?php 
								while($jumlah_us = mysqli_fetch_array($jumlah_user)){
									echo $jumlah_us['id_user'];
								}
							?>
                          </h1> 
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data</p>
                        <h4 class="mb-0">User</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a class="btn btn-info" href="#">Klik Disini</a> 
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
    let table = new DataTable('#myTable');
    </script>

</body>

</html>