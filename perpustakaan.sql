-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2022 pada 21.31
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `nis` int(10) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_anggota`, `nis`, `jk`, `kelas`, `alamat`, `waktu_update`) VALUES
(4, 'Wahyu Rahmat Hidayat', 13100303, 'Laki - Laki', 'X TKJ 2', 'Pandansari Selatan', '2022-11-20 10:36:35'),
(5, 'Andin', 23293829, 'Perempuan', 'X TKJ 1', 'Sukoarjo', '2022-11-20 14:45:35'),
(6, 'Yoliza Fitricya', 0, 'Perempuan', 'X RPL 1', 'SMK Telkom Lampung', '2022-11-21 02:50:08'),
(7, 'Aryonif Pandu Yudhayana', 600053434, 'Laki - Laki', 'X TKJ 3', 'Krandegan', '2022-11-22 17:42:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `isbn` int(50) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `nama_buku`, `pengarang`, `penerbit`, `isbn`, `jumlah_halaman`, `kategori`, `lokasi`, `tanggal_masuk`, `jumlah_buku`, `waktu_update`) VALUES
(2, 'Sejarah Indonesia', 'Khafidh Febriansyah', 'Erlangga', 2147483647, 120, 'Sosial', 'Rak 4', '2022-11-20', 45, '2022-11-22 19:48:08'),
(3, 'Membuat Website Dinamis', 'Anto Subagio', 'Andi', 2147483647, 150, 'Komputer', 'Rak 1', '2022-11-14', 20, '2022-11-20 14:20:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `waktu_update`) VALUES
(1, 'Komputer', '2022-11-20 11:30:29'),
(2, 'Sosial', '2022-11-20 11:30:26'),
(4, 'Budaya', '2022-11-20 11:30:47'),
(5, 'Pertanian', '2022-11-22 17:17:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(150) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `nama_lokasi`, `waktu_update`) VALUES
(2, 'Rak 1', '2022-11-20 11:42:08'),
(5, 'Rak 2', '2022-11-20 11:42:27'),
(6, 'Rak 3', '2022-11-20 11:42:31'),
(7, 'Rak 4', '2022-11-20 11:42:34'),
(8, 'Rak 5', '2022-11-20 11:42:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `jumlah_buku` int(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nama_anggota`, `nama_buku`, `tgl_pinjam`, `tgl_pengembalian`, `jumlah_buku`, `status`, `waktu_update`) VALUES
(7, 'Reihan Firmansyah haha Huhu', 'Sejarah Indonesia', '2022-11-13', '2022-11-20', 2, '2', '2022-11-20 14:16:57'),
(8, 'Wahyu Rahmat Hidayat', 'Membuat Website Dinamis', '2022-11-06', '2022-11-20', 3, '2', '2022-11-20 14:20:07'),
(9, 'Reihan Firmansyah haha Huhu', 'Sejarah Indonesia', '2022-11-15', '0000-00-00', 12, '2', '2022-11-22 16:02:04'),
(10, 'Reihan Firmansyah haha Huhu', 'Sejarah Indonesia', '2022-11-22', '0000-00-00', 2, '2', '2022-11-22 13:21:14'),
(11, 'Aryonif Pandu Yudhayana', 'Sejarah Indonesia', '2022-11-23', '0000-00-00', 10, '2', '2022-11-22 17:43:13'),
(12, 'Andin', 'Sejarah Indonesia', '2022-11-23', '0000-00-00', 2, '2', '2022-11-22 17:44:52'),
(13, 'Wahyu Rahmat Hidayat', 'Sejarah Indonesia', '2022-11-23', '2022-11-23', 1, '2', '2022-11-22 17:45:20'),
(14, 'Wahyu Rahmat Hidayat', 'Sejarah Indonesia', '2022-11-23', '0000-00-00', 2, '1', '2022-11-22 19:48:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(5, 'Bayu Satrio Wibowo', 'bayu', '$2y$10$Kriwsd6myrj6LHfZ.j2PXujE.vjodKtdAlpZI7r4LaRWR8.w0TNGS'),
(9, 'Benidiktus', 'benik', '$2y$10$t/QH61sxv/.eR8wE64VfHeiOojJhay.rsOvs5ZJ1cJRGy7Ksyp1gW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
