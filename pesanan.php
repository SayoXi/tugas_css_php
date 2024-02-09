<?php
include "config.php";
include "koneksi.php";

$ambilData = mysqli_query($conn, "SELECT * FROM produks, pesanans WHERE produks.id_produk = pesanans.id_produk") or die (mysqli_error($conn));


$query = "SELECT id_pesanan, status FROM pesanans";
$sql = mysqli_query($conn, $query);
$count = $sql->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteNAME; ?> / Pesanan</title>
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: lightblue !important; ">
        <div class="container">
            <a class="navbar-brand" style="font-family: Poppins; font-size: 40px;">Aliaely's Shop</a>
            <div><h6 style="font-family: Poppins;">Temukan Fashionmu dan berbagai pakaian menarik diini!!</h6 ></div>
        </div>
        <div><a href="logout.php "class="btn btn-danger " style="font-family: Poppins; font-size: 15px;">Logout <i class="fa fa-arrow-circle-right"></i> </a></div>
      </nav>
      <hr>
      <main class="container">
      <div class="col-sm-2">
                <a href="index_user.php" class="btn btn-info w-100 py-2 text-white"><i class="fa fa-home"></i> Home</a>
            </div>
    <div class="mt-3">
    
    </div>

    <div class="row mt-4">
        <div class="col-sm-9">
            <h3>Daftar Pesanan</h3>
            <span class="badge bg-primary text-white"><?php echo $count; ?> PRODUK</span>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row mt-3">
        <?php while($tampil = mysqli_fetch_array($ambilData)) { ?>
            <div class="col-sm-3 p-2">
                <div class="card w-100 border-0 rounded-3 shadow-sm mb-3">
                    <img src="img/<?php echo $tampil['gambar_produk']; ?>"  width="400px" class="img-fluid" alt="Responsive image">
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php echo $tampil['nama_produk']; ?>
                        </h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama Pemesan</td>
                                    <td> <?php echo $tampil['nama_pemesan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Pesanan</td>
                                    <td> <?php echo $tampil['jumlah_pesanan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td> <?php 
                                    if ($tampil['status'] == 2){
                                        echo '<span class="badge badge-success">Sudah Dikonfirmasi</span>';
                                    }else{ 
                                        echo '<span class="badge badge-danger">Belum Dikonfirmasi</span>';
                                    }
                                    ?></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        <b class="text-warning d-block mb-3" style="font-size: 15px;">
                            Total Harga : <?= "Rp. " . number_format($tampil['harga_total'], 0, ".", "."); ?>
                        </b>
                        <a href="hapus_pesanan.php?id_pesanan=<?php echo $tampil['id_pesanan'];?>" class="btn btn-info w-100 py-2 text-white">Hapus</a>
                    </div>
                </div>
            </div>

      <?php  }?>
    </div>
    
</main>
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