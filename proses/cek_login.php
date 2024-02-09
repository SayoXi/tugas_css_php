<?php 

	//Sesi
	session_start();
	
	//Koneksi
	include '../koneksi.php';
	
	// Menangkap data yang dikirim dari form
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Menyeleksi data admin dengan Username dan Password yang sesuai
	$data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	$hasil = mysqli_fetch_object($data);
	
	// Menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);
	
	if($cek > 0){
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		$_SESSION['id_user'] = $hasil->id_user;

		if ($_POST['username'] == 'admin') {
			header('Location:../admin/dashboard.php');
		}
		else {
			header("Location:../index_user.php");
		}
	} 
	
	//Jika salah akan muncul notifikasi "gagal" di URL
	else{
		header("location:../login.php?pesan=gagal");
	}
?>