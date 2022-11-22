<?php

include '../config/koneksi.php';

if($_GET['page'] == "tambah") {
    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $isbn = $_POST['isbn'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "INSERT Into tb_buku VALUES ('','$nama_buku','$pengarang','$penerbit','$isbn','$jumlah_halaman','$kategori','$lokasi','$tanggal_masuk','$jumlah_buku','$waktu_update')");

    header("location:../?page=buku");
}

if($_GET['page'] == "hapus") {
    $id = $_GET['id'];

    mysqli_query($koneksi,"DELETE From tb_buku WHERE id_buku='$id'");

    header("location:../?page=buku");
}

if($_GET['page'] == "edit") {
    $id           = $_POST['id_buku'];
    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $isbn = $_POST['isbn'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "UPDATE tb_buku SET 
    
    nama_buku='$nama_buku',
    pengarang='$pengarang',
    penerbit='$penerbit',
    isbn='$isbn',
    jumlah_halaman='$jumlah_halaman',
    kategori='$kategori',
    lokasi='$lokasi',
    tanggal_masuk='$tanggal_masuk',
    jumlah_buku='$jumlah_buku',
    waktu_update='$waktu_update' 
    
    WHERE id_buku='$id'");    

    header("location:../?page=buku");
}

?>