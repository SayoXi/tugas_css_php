<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "css_php";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn){
        die("Gagal terhubung dengan datasabe" .mysql_connect_error());
    }

?>