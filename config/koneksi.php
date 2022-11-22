<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan";

$koneksi = mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal " . mysqli_connect_error();
}

// SETTING WAKTU
date_default_timezone_set("Asia/Jakarta");

?>