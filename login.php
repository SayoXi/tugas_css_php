<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aliaely's Shop | Login</title>
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="icon" href="img/login.svg">
</head>
<body>

    <section>
        <div class="col-1">
            <img src="img/blue.jpg">
        </div>
        <div class="col-2">
            <a class="kembali" href="index.php">Kembali</a>
            <form action="proses/cek_login.php" method="POST">
                <h1>Welcome</h1>
                <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo "<p id='alert'>Login gagal!</p>";
                        }else if($_GET['pesan'] == "logout"){
                            echo "<p id='alert'>Anda telah berhasil logout</p>";
                        }else if($_GET['pesan'] == "belum_login"){
                            echo "<p id='alert'>Anda harus login untuk mengakses halaman admin</p>";
                        }
                    }
                ?>
                <input type="text" name="username" placeholder="username" autofocus>
                <input type="password" name="password" placeholder="password">
                <button class="button" type="submit" role="button">Login</button>
                <p>Belum Memiliki Akun?<a href="register.php">Register</a></p>
            </form>
        </div>
    </section>
</body>
</html>