<?php 

include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);

	if ($Password == $cPassword) {
		$sql = "SELECT * FROM user WHERE username='$username'";
		$result = mysqli_query($koneksi, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (username, password)
					VALUES ('$username', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo ("<script LANGUAGE='JavaScript'>
                window.alert('Berhasil! Silahkan isi form Login');
                window.location.href='login.php';
                </script>");
				$Username = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Tidak Sesuai')</script>";
	}
}

?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aliaely's Shop | Register</title>
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
    <link rel="icon" href="img/login.svg">
</head>
<body>
    <section>
        <div class="col-1">
            <img src="img/blue.jpg">
        </div>
        <div class="col-2">
            <a class="kembali" href="index.php">Kembali</a>
            <form action="" method="POST">
                <h1>Create Your Account</h1>
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required autofocus>
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                <button name="submit" class="button">Register</button>
                <p>Sudah Memiliki Akun?<a href="login.php">Login</a></p>
            </form>
        </div>
    </section>
</body>
</html>