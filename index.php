<?php
session_start();

  include 'config.php';
  include 'koneksi.php';
  $queryProduk = mysqli_query($conn, "SELECT id_produk, nama_produk, harga, stock, gambar_produk, desk_produk FROM produks"); 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="gayaku.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
    <title><?php echo $siteNAME; ?></title>
  </head>
  <body>

  <?php 
        if (isset($_SESSION["role"])) {
        
            if ($_SESSION["role"] == "") {
                
            } else if ($_SESSION["role"] == "admin") {  
                header('Location:admin/dashboard.php');
            }
        }
    ?>
   
    <nav class="navbar navbar-expand-lg " style="background-color: lightblue !important; ">
        <div class="container">
            <a class="navbar-brand" style="font-family: Poppins; font-size: 40px;">Aliaely's Shop</a>
            <div><h6 style="font-family: Poppins;">Temukan Fashionmu dan berbagai pakaian menarik di sini!!</h6 ></div>
            <div> <a href="login.php "class="btn btn-info " style="font-family: Poppins; font-size: 15px;"> Login</a>
            <a href="register.php "class="btn btn-info " style="font-family: Poppins; font-size: 15px;"> Register</a>
          </div>
         
        </div>
      </nav>

<div style="background-color: white;">
  <div class="wrapper" >
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
         <div class="carousel-item active">
         <img src="img/banner1.jpg" class="img-fluid" alt="Responsive image" width="auto" height="auto" style="border-radius: 18px;">
       </div>
     <div class="carousel-item">
       <img src="img/banner2.jpg" class="img-fluid" alt="Responsive image" width="auto" height="auto" style="border-radius: 18px;">
        </div>
       <div class="carousel-item">
       <img src="img/banner3.jpg" class="img-fluid" alt="Responsive image" width="auto" height="auto" style="border-radius: 18px;">
    </div>
  </div>
</div>
    </div>

    <div class="m-4 text-center">
       <b><h5>Produk kami</h5></b>
     </div>
    
     <div class="container">
     
    <div class="row justify-content-center">
          <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
      <div class="col-sm-3 mt-4">
        <div class="card" style="width: 100%; background-color: lightblue; border-radius: 18px;">
          <img src="img/<?php echo $data['gambar_produk']; ?>" class="card-img-top" alt="..." style="border-radius: 18px;">
          <div class="card-body"  width="auto" height="auto">
            <h5 class="card-title"><?php echo $data['nama_produk']; ?></h5>
            <p><?php echo $data['desk_produk']; ?></p>
            <p><?= "Rp. " . number_format($data['harga'], 0, ".", "."); ?></p>
            <p>Stok: <?= $data['stock']; ?></p>
            <div class="">
            <!-- <a  href="pesan.php?nama_produk=<?php echo $data['nama_produk'];?>" class="btn btn-outline-success  mt-2 mx-3">Pesan</a> -->
            <a  href="pesan.php?id_produk=<?php echo $data['id_produk'];?>" class="btn btn-outline-primary w-100">Pesan</a>
            
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

    
     <!-- Modal Produk 1-->
<div class="modal fade" id="produk1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="" alt=""  style="border-radius: 18px; width: 100%; ">
          </div>
          <div class="col-md-6">
        
            <table class="table table-borderless">
                <tr>
                  <th>Nama Produk:</th>
                  <td><span id=name_produk></span></td>
                </tr>
                <tr>
                  <th>Deskripsi:</th>
                  <td><span id=desk_produk></span></td>
                </tr>
                <tr>
                  <th>Harga:</th>
                  <td><span id=harga></span></td>
                </tr>
            </table>
           
          </div>
          <div class="col-md-6"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
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
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script>
      $(document).ready(function() {
        $(document).on('click', '#detail', function() {
         
            var namaProduk = $(this).data('namaProduk');
            var Stock = $(this).data('Stock');
            var deskProduk = $(this).data('deskProduk');
            var gambarProduk = $(this).data('gambarProduk');
    
            $('#namaProduk').text(namaProduk);
            $('#Stock').text(stock);
            $('#deskProduk').text(deskProduk);
            $('#gambarProduk').text(gambarProduk);

            $('#modal').modal('hide');
          })
      })
    </script>
  </body>
</html>