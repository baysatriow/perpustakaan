<!DOCTYPE html>
<html>
<head>
	<title>Export Semua Data Transaksi</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Semua Transaksi Perpustakaan.xls");
	?>
 
	<center>
		<h4>Laporan Semua Data Transaksi Perpustakaan</h4>
	</center>
 
	<table border="1">
		<tr>
            <th>Nomor</th>
            <th>ID Transaksi</th>
            <th>Nama Anggota Peminjam</th>
            <th>Nama Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Jumlah Pinjaman Buku</th>
            <th>Status Pinjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Waktu Update</th>
        </tr>
        <?php
        include '../config/koneksi.php';
        $no=1;
        $query = mysqli_query($koneksi, "SELECT * From tb_transaksi");
        while($data=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['id_transaksi'] ?></td>
            <td><?= $data['nama_anggota'] ?></td>
            <td><?= $data['nama_buku'] ?></td>
            <td><?= $data['tgl_pinjam'] ?></td>
            <td><?= $data['jumlah_buku'] ?></td>
            <td>
                <?php
                    if($data['status'] == 1){
                        echo "Dipinjam";
                    }else{
                        echo "Dikembalikan";
                    }
                ?>
            </td>
            <td>
                <?php
                    if($data['status'] != 1){
                        echo $data['tgl_pengembalian'];
                    }
                ?>
            </td>
            <td><?= $data['waktu_update'] ?></td>
        </tr>
        <?php
            $no++;
        }
        ?>
	</table>
</body>
</html>