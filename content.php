<?php
    (isset($_GET['page'])) ? $page = $_GET['page'] : $page = '';
    if ($page == '') {
        include "home.php";
    } elseif ($page == 'user') {
        include "mod_user/user.php";
    } elseif ($page == 'anggota') {
        include "mod_anggota/anggota.php";
    } elseif ($page == 'kategori') {
        include "mod_kategori/kategori.php";
    } elseif ($page == 'lokasi') {
        include "mod_lokasi/lokasi.php";
    } elseif ($page == 'buku') {
        include "mod_buku/buku.php";
    } elseif ($page == 'transaksi') {
        include "mod_transaksi/transaksi.php";
    } 
?>