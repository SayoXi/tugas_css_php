<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - HALAMAN DATA PRODUK</title>
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

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
                                href="../dashboard.php" aria-expanded="false"><i class="fas fa-home"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                    </ul>
                </nav>
                <nav class="sidebar-nav">
                <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="" aria-expanded="false"><i class="fas fa-box"></i><span
                                    class="hide-menu">Produk</span></a></li> 
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="pesanan.php" aria-expanded="false"><i class="fas fa-list"></i></i><span
                                    class="hide-menu">Daftar Pesanan</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="history.php" aria-expanded="false"><i class="fas fa-clock"></i><span
                                    class="hide-menu">Riwayat Pesanan</span></a></li>
                    </ul>
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
                        <h1 class="mb-0 fw-bold">Data Produk </h1>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <a href="../logout.php" class="btn btn-danger text-white"><i class="fas fa-sign-out-alt"></i>
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
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Gambar</th>
                                                <th>Nama Produk</th>
                                                <th>Deskripsi Produk</th>
                                                <th>Harga</th>
                                                <th>Stock</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                           include_once("../../koneksi.php");
                                            if(isset($_GET['search'])){
                                                $search = $_GET['search'];
                                                $data = mysqli_query($conn, "select * from produks WHERE id_produk LIKE '%".$search."%' OR  nama_produk LIKE '%".$search."%'");				
                                            }else{
                                                $data = mysqli_query($conn, "select * from produks");		
                                            }
                                                $no = 1;
                                                while($d = mysqli_fetch_array($data)){
                                            ?>
                                            <tr class="text">
                                                <td><?php echo $d['id_produk']; ?></td>
                                                <td class="text-center"><img src="../../img/<?= $d['gambar_produk']; ?>" alt="gambar" width="50px">  </td>
                                                <td><?php echo $d['nama_produk']; ?></td>
                                                <td><?php echo $d['desk_produk']; ?></td>
                                                <td><?php echo $d['harga']; ?></td>
                                                <td><?php echo $d['stock']; ?></td>
                                               
                                                <td class="text"><a class="btn btn-primary "
                                                        href="../edit.php?id_produk=<?=$d['id_produk']; ?>"><i class="fas fa-pen"></i>Edit</a>
                                                            <a class="btn btn-danger "
                                                        href="../delete.php?id_produk=<?=$d['id_produk']; ?>"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php 
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
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