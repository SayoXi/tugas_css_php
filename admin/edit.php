<?php

include_once("../koneksi.php"); //Koneksi

if (isset($_POST['update'])) {    
    $id_produk = $_POST['id_produk']; //Id Printer
    
    $nama_produk= $_POST['nama_produk']; //Nama
    $desk_produk= $_POST['desk_produk']; //Spek
    $harga= $_POST['harga']; //Harga
    $stock= $_POST['stock']; //Stok
    
	if (empty($_FILES['berkas']['tmp_name'])) {
		$namaFile = "";
		$namaSementara = "";
	
		$dirUpload = "../img/";
	
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		$result = mysqli_query($conn, "UPDATE `produks` SET `nama_produk`='$nama_produk', `desk_produk`='$desk_produk', `harga`='$harga', `stock`='$stock' WHERE `id_produk`=$id_produk");
      
        header("Location: page/produk.php"); //Dialokasikan ke halaman admin.php
	}
	else {
		$namaFile = $_FILES['berkas']['name'];
		$namaSementara = $_FILES['berkas']['tmp_name'];
	
		$dirUpload = "../img/";
	
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		$result = mysqli_query($conn, "UPDATE `produks` SET `nama_produk`='$nama_produk', `desk_produk`='$desk_produk', `harga`='$harga', `gambar_produk`='$namaFile', `stock`='$stock' WHERE `id_produk`=$id_produk");
    
		header("Location: page/produk.php"); //Dialokasikan ke halaman admin.php
	}
    
}
?>

<?php
$id_produk = $_GET['id_produk']; //Mengambil IdPrinter
 
$result = mysqli_query($conn, "SELECT * FROM produks WHERE id_produk=$id_produk"); //Mengambil data dari tabel printer_tb berdasarkan IdPrinter
 
while($data = mysqli_fetch_array($result)) //Perulangan
{
    $nama_produk = $data['nama_produk']; //Nama
    $desk_produk = $data['desk_produk']; //Spek
    $harga = $data['harga']; //Harga
    $gambar_produk= $data['gambar_produk']; //Image
    $stock= $data['stock']; //Stok
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - HALAMAN TAMBAH PRODUK</title>
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<?php 
        session_start();
        include_once("../koneksi.php"); //Koneksi

        if($_SESSION['status']!="login"){ //Cek Sesi
            header("location:../index.php?pesan=Silahkan-Login-Terlebih-Dahulu");
        }

        if($_SESSION['username']!="admin"){ //Cek Sesi
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

        <aside class="left-sidebar position-fixed" data-sidebarbg="skin6">

            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark "
                                href="../admin/dashboard.php" aria-expanded="false"><i class="fas fa-home"></i><span class="hide-menu">Dashboard</span></a></li>
                    </ul>
                </nav>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                href="../admin/page/produk.php" aria-expanded="false"><i class="fas fa-box"></i><span class="hide-menu">Produk</span></a>
                            <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="../admin/page/pesanan.php" aria-expanded="false"><i class="fas fa-list"></i><span class="hide-menu">Daftar Pesanan</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="../admin/page/history.php" aria-expanded="false"><i class="fas fa-clock"></i><span class="hide-menu">Riwayat
                                    Pesanan</span></a></li>
                    </ul>
                </nav>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark "
                                href="../admin/tambahproduk.php" aria-expanded="false"><i
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
                        <h1 class="mb-0 fw-bold">Data Pesanan </h1>
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
                                <div class="form-group">

                                    <section class="container-tambah-edit">
                                        <form name="update_printer" method="post" action="edit.php"
                                            enctype="multipart/form-data">
                                            <table border="0">
                                                <p>Preview:</p>
                                                <img id="thumb" src="../img/<?php echo $gambar_produk; ?>" width="100"
                                                    height="100" />
                                                <p>
                                                    <input class="form-control" type="file" id="image" name="berkas"
                                                        value="<?php echo $gambar_produk; ?>" onchange="preview()">
                                                </p>
                                                <script>
                                                function preview() {
                                                    thumb.src = URL.createObjectURL(event.target.files[0]);
                                                }
                                                </script>

                                                <p>Nama</p>
                                                <p><input type="text" class="form-control" name="nama_produk"
                                                        value="<?php echo $nama_produk; ?>"></p>

                                                <p>Spesifikasi</p>
                                                <p><input type="text" class="form-control" name="desk_produk"
                                                        value="<?php echo $desk_produk; ?>"></p>

                                                <p>Harga</p>
                                                <p><input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>"></p>

                                                <p>Stok</p>
                                                <p><input type="number" class="form-control" name="stock" value="<?php echo $stock; ?>"></p>

                                                <p><input type="hidden"  name="id_produk"
                                                        value=<?php echo $_GET['id_produk'];?>></p>
                                                <p><input class="btn btn-warning" type="submit" name="update"
                                                        id="submit" value="Update"></p>

                                            </table>
                                        </form>
                                    </section>

                                </div>
                            </div>
                        </div>
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