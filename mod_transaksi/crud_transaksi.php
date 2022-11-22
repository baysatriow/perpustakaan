<?php

include '../config/koneksi.php';

if($_GET['page'] == "tambah") {
    $nama_anggota = $_POST['nama_anggota'];
    $nama_buku = $_POST['nama_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $status = 1;
    $waktu_update = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "INSERT Into tb_transaksi VALUES ('','$nama_anggota','$nama_buku','$tgl_pinjam','','$jumlah_buku','$status','$waktu_update')");

    $query = mysqli_query($koneksi, "SELECT * From tb_buku WHERE nama_buku='$nama_buku'");
    $data = mysqli_fetch_array($query);

    $stok = $data['jumlah_buku'] - $jumlah_buku;

    mysqli_query($koneksi, "UPDATE tb_buku SET jumlah_buku='$stok', waktu_update='$waktu_update' WHERE nama_buku='$nama_buku'");

    header("location:../?page=transaksi");
}

if($_GET['page'] == "kembali") {
    $id                 = $_POST['id_transaksi'];
    $nama_buku          = $_POST['nama_buku'];
    $tgl_pengembalian   = $_POST['tgl_pengembalian'];
    $jumlah_buku        = $_POST['jumlah_buku'];
    $status = 2;
    $waktu_update       = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "UPDATE tb_transaksi SET 
    
    tgl_pengembalian    ='$tgl_pengembalian',
    status              ='$status',
    waktu_update        ='$waktu_update'
    
    WHERE id_transaksi='$id'");

    $query = mysqli_query($koneksi, "SELECT * From tb_buku WHERE nama_buku='$nama_buku'");
    $data = mysqli_fetch_array($query);

    $stok = $data['jumlah_buku'] + $jumlah_buku;

    mysqli_query($koneksi, "UPDATE tb_buku SET jumlah_buku='$stok', waktu_update='$waktu_update' WHERE nama_buku='$nama_buku'");

    header("location:../?page=transaksi");
}

?>