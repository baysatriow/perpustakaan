<?php

include '../config/koneksi.php';

if($_GET['page'] == "tambah") {
    $nama_anggota = $_POST['nama_anggota'];
    $nis          = $_POST['nis'];
    $jk           = $_POST['jk'];
    $kelas        = $_POST['kelas'];
    $alamat       = $_POST['alamat'];
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "INSERT Into tb_anggota VALUES ('','$nama_anggota','$nis','$jk','$kelas','$alamat','$waktu_update')");

    header("location:../?page=anggota");
}

if($_GET['page'] == "hapus") {
    $id = $_GET['id'];

    mysqli_query($koneksi,"DELETE From tb_anggota WHERE id_anggota='$id'");

    header("location:../?page=anggota");
}

if($_GET['page'] == "edit") {
    $id           = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $nis          = $_POST['nis'];
    $jk           = $_POST['jk'];
    $kelas        = $_POST['kelas'];
    $alamat       = $_POST['alamat'];
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "UPDATE tb_anggota SET nama_anggota='$nama_anggota', nis='$nis', jk='$jk', kelas='$kelas', alamat='$alamat', waktu_update='$waktu_update' WHERE id_anggota='$id'");    

    header("location:../?page=anggota");
}

?>