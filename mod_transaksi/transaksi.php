<!-- Page Heading -->
<section>
        <h1 class="h3 mb-3 text-gray-800" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Peminjaman
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </small>
        </h1>
    </section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="mod_transaksi/crud_transaksi.php?page=tambah">
        <!-- Pilih Anggota -->
        <div class="form-group">
            <label>Nama Anggota Peminjam</label>
            <select name="nama_anggota" class="form-control">
                <option>--Pilih Salah Satu--</option>
                <?php
                    $query = mysqli_query($koneksi, "SELECT * From tb_anggota");
                    while($data=mysqli_fetch_array($query)){
                ?>
                <option value="<?= $data['nama_anggota'] ?>"><?= $data['nama_anggota'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <!-- Pilih Buku -->
        <div class="form-group">
            <label>Nama Buku</label>
            <select name="nama_buku" class="form-control" require>
                <option>--Pilih Salah Satu--</option>
                <?php
                    $query = mysqli_query($koneksi, "SELECT * From tb_buku");
                    while($data=mysqli_fetch_array($query)){
                ?>
                <option value="<?= $data['nama_buku'] ?>"><?= $data['nama_buku'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <!-- Tanggal Peminjaman -->
        <div class="form-group">
            <label>Tanggal Peminjaman</label>
            <input name="tgl_pinjam" type="date" class="form-control" require>
        </div>
        <!-- Jumlah Buku -->
        <div class="form-group">
            <label>Jumlah Buku</label>
            <input name="jumlah_buku" type="number" class="form-control" require>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
    </div>
</div>
</div>

<div class="card mt-3">
    <div class="card-header">
        <h4>Data Peminjaman</h4>
        <div class="form-group m-b-2 text-right" style="margin-top: -40px; margin-bottom: -2px;">
        <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus-square"></i> Tambah Transaksi
        </button>
        <a href="mod_transaksi/export_transaksi.php" class="btn btn-success"><i class="far fa-file-excel"></i> Export Semua Peminjaman</a>
        <a href="mod_transaksi/export_kembali.php" class="btn btn-success"><i class="far fa-file-excel"></i> Export Dikembalikan</a>
        <a href="mod_transaksi/export_belum_kembali.php" class="btn btn-success"><i class="far fa-file-excel"></i> Export Dipinjam</a>
    </div>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-striped data">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Peminjam</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Jumlah Buku</th>
            <th scope="col">Status</th>
            <th scope="col">Waktu Update</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                $query = mysqli_query($koneksi, "SELECT * From tb_transaksi");
                while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['nama_anggota'] ?></td>
                <td><?= $data['nama_buku'] ?></td>
                <td><?= $data['tgl_pinjam'] ?></td>
                <td><?= $data['jumlah_buku'] ?></td>
                <td>
                    <?php
                        if($data['status'] == 1) {
                            echo "<div class='badge badge-warning'>Dipinjam</div>";
                        }else{
                            echo "<div class='badge badge-success'>Dikembalikan</div>";
                        }
                    ?>
                </td>
                <td><?= $data['waktu_update'] ?></td>
                <td>
                    <?php
                    if($data['status'] != 2){
                    ?>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalEdit<?= $data['id_transaksi'] ?>"><i class="fas fa-sign-in-alt"></i></button>
                    <?php
                        }
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="modalEdit<?= $data['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kembalikan Buku</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="mod_transaksi/crud_transaksi.php?page=kembali&id=<?= $data['id_transaksi'] ?>">
                                    <input type="hidden" value="<?= $data['id_transaksi'] ?>" name="id_transaksi">
                                    <div class="form-group">
                                        <label>Jumlah Pengembalian</label>
                                        <input name="nama_buku" type="text" class="form-control" value="<?= $data['nama_buku'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pengembalian</label>
                                        <input name="tgl_pengembalian" type="date" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pengembalian</label>
                                        <input name="jumlah_buku" type="number" class="form-control" value="<?= $data['jumlah_buku'] ?>" require>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
                $no++;
                }
            ?>
        </tbody>
        </table>
    </div>
</div>