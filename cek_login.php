<?php
session_start();

include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * From user WHERE username='$username'");

$cek = mysqli_num_rows($data);

$fetch = mysqli_fetch_array($data);

if ($cek > 0) {
    if (password_verify($password, $fetch['password'])){
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $fetch['nama'];
        $_SESSION['status'] = "login";
        header("location:index.php");
    }else{
        header("location:login.php?pesan=gagal");
    }
}else{
    header("location:login.php?pesan=gagal");
}
?>