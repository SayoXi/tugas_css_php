<?php
  require 'config.php';
  require 'koneksi.php';
    
  $id = htmlspecialchars($_GET['id_produk']);
  $queryProduk = mysqli_query($conn, "SELECT * FROM produks WHERE id_produk='$id'");
  $data = mysqli_fetch_array($queryProduk);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteNAME; ?> / Detail Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: lightblue !important; ">
        <div class="container">
            <a class="navbar-brand" style="font-family: Poppins; font-size: 40px;">Aliaely's Shop</a>
            <div><h6 style="font-family: Poppins;">Temukan Fashionmu dan berbagai pakaian menarik diini!!</h6 ></div>
            <div> <a href="login.php "class="btn btn-info " style="font-family: Poppins; font-size: 15px;"> Login</a>
            
          </div>
        </div>
      </nav>
      <hr>
<div class="wrapper">
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
            
             <table class="table">
              <tbody>
                <tr>
                  <td>Deskripsi Produk</td>
                  <td>:</td>
                  <td>
                  <p><?php echo $data['desk_produk']; ?></p>
                  </td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td>
                   <p><?php echo $data['harga']; ?></p>
                  </td>
                </tr>
                <tr>
                  <td>Stok</td>
                  <td>:</td>
                  <td>
                   <p><?php echo $data['stock']; ?></p>
                  </td>
                </tr>
              </tbody>
             </table>
             <a href="index.php" class="btn btn-primary">Kembali</a>
             <a href="pesan.php?id_produk=<?php echo $data['id_produk'];?>" class="btn btn-primary">Pesan Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ADD8E6" fill-opacity="1" d="M0,192L48,208C96,224,192,256,288,256C384,256,480,224,576,229.3C672,235,768,277,864,272C960,267,1056,213,1152,176C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
<footer class="pt-5 pb-5" style=" background-color:lightblue !important;">
    <div class="text-center"  >
        <span class="text-secondary" style="font-size: 15px; color: black !important;">
        Made with ❤️ by Alia Desta Laily
        </span>
    </div>
</footer>
</body>
</html>