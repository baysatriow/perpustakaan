<?php

include '../config/koneksi.php';

if($_GET['page'] == "tambah") {
    $nama_lokasi = $_POST['nama_lokasi'];
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "INSERT Into tb_lokasi VALUES ('','$nama_lokasi','$waktu_update')");

    header("location:../?page=lokasi");
}

if($_GET['page'] == "hapus") {
    $id = $_GET['id'];

    mysqli_query($koneksi,"DELETE From tb_lokasi WHERE id_lokasi='$id'");

    header("location:../?page=lokasi");
}

if($_GET['page'] == "edit") {
    $id           = $_POST['id_lokasi'];
    $nama_lokasi = $_POST['nama_lokasi'];
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "UPDATE tb_lokasi SET nama_lokasi='$nama_lokasi', waktu_update='$waktu_update' WHERE id_lokasi='$id'");    

    header("location:../?page=lokasi");
}

?>