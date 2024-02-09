<?php

session_start();
if($_SESSION['status']!="login"){
  header("location:login.php?pesan=Silahkan-Login-Terlebih-Dahulu"); //Cek Session, jika blm login akan diarahkan ke login.php
}
$errorMSG = '';
$successMSG = '';

include 'config.php';
include 'koneksi.php';

if (isset($_GET['id_produk'])) {
  $id_produk = $_GET['id_produk'];
  $query = "SELECT * FROM produks WHERE id_produk = '$id_produk'";
  $sql = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($sql);
}

if (isset($_POST['submit'])) {
  $id_produk = $_POST['id'];
  $nama_pemesan = $_POST['nama_pemesan'];
  $jumlah_pesanan = $_POST['jumlah_pesanan'];
  $status = 1;

  $dataProduk = mysqli_query($conn, "SELECT id_produk, nama_produk, harga, 
    stock, gambar_produk, desk_produk FROM produks WHERE id_produk = '$id_produk'");
  $dataProduk = mysqli_fetch_assoc($dataProduk);
  $hargaAwal = $dataProduk['harga'];
  $jumlahAwal = $dataProduk['stock'];

  $jumlahAkhir = $jumlahAwal - $jumlah_pesanan;
  if ($jumlahAkhir <= 0) {
    $_SESSION['errorMSG'] = 'Persediaan Produk Tidak Mencukupi Jumlah Permintaan Anda';
    header('Location: ' . $siteURL . 'pesan.php?id_produk=' . $id_produk);
    exit();
  } else {
    $status = 1;
    $totalHarga = $hargaAwal * $jumlah_pesanan;
    $query = "INSERT INTO pesanans ( id_produk, nama_pemesan, jumlah_pesanan, harga_total, status)
                VALUES ( '$id_produk', '$nama_pemesan', '$jumlah_pesanan', '$totalHarga', '$status')";
    $sql = mysqli_query($conn, $query);
    if ($query) {
      $query = "UPDATE produks SET stock='$jumlahAkhir' WHERE id_produk='$id_produk'";
      $sql = mysqli_query($conn, $query);
      if ($query) {
        $_SESSION['successMSG'] = 'Order Product Successfully!';
        header('Location: ' . $siteURL . 'pesan.php?id_produk=' . $id_produk);
        exit();
      }
    } else {
      $_SESSION['errorMSG'] = 'Order Product Failed!';
      header('Location: pesan.php?id_produk=' . $id_produk);
      exit();
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $siteNAME; ?> / Pesan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg " style="background-color: lightblue !important; ">
    <div class="container">
      <a class="navbar-brand" style="font-family: Poppins; font-size: 40px;">Aliaely's Shop</a>
      <div>
        <h6 style="font-family: Poppins;">Temukan Fashionmu dan berbagai pakaian menarik diini!!</h6>
      </div>
      <div> <a href="pesanan.php "class="btn btn-info " style="font-family: Poppins; font-size: 15px;"><i class="fas fa-shopping-cart"></i> Daftar Pesanan</a></div>
    </div>

  </nav>
  <hr>
  <div class="wrapper">
    <div class="mt-3">
      <?php
      if (isset($_SESSION['errorMSG'])) :
      ?>
        <div class="mb-3">
          <div class="alert alert-danger" role="alert" style="font-size: 14px;">
            <?php
            echo $_SESSION['errorMSG'];
            unset($_SESSION['errorMSG']);
            ?>
          </div>
        </div>
      <?php
      endif;

      if (isset($_SESSION['successMSG'])) :
      ?>
        <div class="mb-3">
          <div class="alert alert-success" role="alert" style="font-size: 14px;">
            <?php
            echo $_SESSION['successMSG'];
            unset($_SESSION['successMSG']);
            ?>
          </div>
        </div>
      <?php
      endif;
      ?>
       <?php

if (isset($_SESSION["Username"])) {
    
    if ($_SESSION["Username"] == "") {
        
    } else if ($_SESSION["Username"] == "admin") {  
        header('Location:admin/dashboard.php');
    }
}

if($_SESSION['status']!="login"){
    header("location:login.php?pesan=Silahkan-Login-Terlebih-Dahulu"); //Cek Session, jika blm login akan diarahkan ke login.php
}

?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">

                  <div class="col-md-6">
                    <img src="img/<?php echo $data['gambar_produk']; ?>" width="400px" class="img-fluid" alt="Responsive image">
                  </div>

                  <div class="col-md-6">

                    <h4><?php echo $data['nama_produk']; ?></h4>
                    <span class="badge bg-primary text-white float-end mb-2"><?php echo $data['stock']; ?> PRODUK </span>
                    <form method="POST" action="<?php echo $siteURL; ?>pesan.php?id_produk=<?php echo $data['id_produk']; ?>" class="row border-top">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>Nama Pembeli</td>
                            <td>:</td>
                            <td>
                              <input name="id" type="hidden" value="<?php echo $data['id_produk']; ?>">
                              <input name="harga" type="hidden" value="<?php echo $data['harga']; ?>">
                              <!-- <input name="status" type="hidden" value="1"> -->
                              <input type="text" name="nama_pemesan" class="form-control" required>
                            </td>
                          </tr>
                          <tr>
                            <td>Jumlah Pesanan</td>
                            <td>:</td>
                            <td>
                              <input type="text" name="jumlah_pesanan" class="form-control" required>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <a href="index_user.php" class="btn btn-primary">Kembali</a>
                      <button type="submit" name="submit" class="btn btn-primary mx-2">Pesan sekarang!</button>
                    </form>
                    <!-- <a href="pesanan.php" class="btn btn-primary">Pesan Sekarang</a> -->
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ADD8E6" fill-opacity="1" d="M0,192L48,208C96,224,192,256,288,256C384,256,480,224,576,229.3C672,235,768,277,864,272C960,267,1056,213,1152,176C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <footer class="pt-5 pb-5" style=" background-color:lightblue !important;">
      <div class="text-center">
        <span class="text-secondary" style="font-size: 15px; color: black !important;">
          Made with ❤️ by Alia Desta Laily
        </span>
      </div>
    </footer>
</body>

</html>