<?php

include '../config/koneksi.php';

if($_GET['page'] == "tambah") {
    $nama_kategori = $_POST['nama_kategori'];
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "INSERT Into tb_kategori VALUES ('','$nama_kategori','$waktu_update')");

    header("location:../?page=kategori");
}

if($_GET['page'] == "hapus") {
    $id = $_GET['id'];

    mysqli_query($koneksi,"DELETE From tb_kategori WHERE id_kategori='$id'");

    header("location:../?page=kategori");
}

if($_GET['page'] == "edit") {
    $id           = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "UPDATE tb_kategori SET nama_kategori='$nama_kategori', waktu_update='$waktu_update' WHERE id_kategori='$id'");    

    header("location:../?page=kategori");
}

?>