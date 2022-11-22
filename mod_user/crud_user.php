<?php

include '../config/koneksi.php';

if($_GET['page'] == "tambah") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT Into user VALUES ('','$nama','$username','$password')");

    header("location:../?page=user");
}

if($_GET['page'] == "hapus") {
    $id = $_GET['id'];

    mysqli_query($koneksi,"DELETE From user WHERE id_user='$id'");

    header("location:../?page=user");
}

?>