<!-- Page Heading -->
<section>
        <h1 class="h3 mb-3 text-gray-800" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Buku
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="mod_buku/crud_buku.php?page=tambah">
        <div class="form-group">
            <label>Nama Buku</label>
            <input name="nama_buku" type="text" class="form-control" require>
        </div>
        <div class="form-group">
            <label>Pengarang</label>
            <input name="pengarang" type="text" class="form-control" require>
        </div>
        <div class="form-group">
            <label>Penerbit</label>
            <input name="penerbit" type="text" class="form-control" require>
        </div>
        <div class="form-group">
            <label>ISBN</label>
            <input name="isbn" type="number" class="form-control" require>
        </div>
        <div class="form-group">
            <label>Jumlah Halaman</label>
            <input name="jumlah_halaman" type="number" class="form-control" require>
        </div>
        <!-- Kategori -->
        <div class="form-group">
            <label>Kategori Buku</label>
            <select name="kategori" class="form-control">
                <option>--Pilih Salah Satu--</option>
                <?php
                    $query = mysqli_query($koneksi, "SELECT * From tb_kategori");
                    while($data=mysqli_fetch_array($query)){
                ?>
                <option value="<?= $data['nama_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <!-- Lokasi -->
        <div class="form-group">
            <label>Lokasi Buku</label>
            <select name="lokasi" class="form-control">
                <option>--Pilih Salah Satu--</option>
                <?php
                    $query = mysqli_query($koneksi, "SELECT * From tb_lokasi");
                    while($data=mysqli_fetch_array($query)){
                ?>
                <option value="<?= $data['nama_lokasi'] ?>"><?= $data['nama_lokasi'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input name="tanggal_masuk" type="date" class="form-control" require>
        </div>
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
        <h4>Data Buku</h4>
        <div class="form-group m-b-2 text-right" style="margin-top: -40px; margin-bottom: -2px;">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-striped data">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama buku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
            <th scope="col">ISBN</th>
            <th scope="col">Jumlah Halaman</th>
            <th scope="col">Kategori</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Jumlah Buku</th>
            <th scope="col">Waktu Update</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                $query = mysqli_query($koneksi, "SELECT * From tb_buku");
                while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['nama_buku'] ?></td>
                <td><?= $data['pengarang'] ?></td>
                <td><?= $data['penerbit'] ?></td>
                <td><?= $data['isbn'] ?></td>
                <td><?= $data['jumlah_halaman'] ?></td>
                <td><?= $data['kategori'] ?></td>
                <td><?= $data['lokasi'] ?></td>
                <td><?= $data['tanggal_masuk'] ?></td>
                <td><?= $data['jumlah_buku'] ?></td>
                <td><?= $data['waktu_update'] ?></td>
                <td>
                    <a href="mod_buku/crud_buku.php?page=hapus&id=<?= $data['id_buku'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit<?= $data['id_buku'] ?>"><i class="fas fa-edit"></i></button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalEdit<?= $data['id_buku'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="mod_buku/crud_buku.php?page=edit&id=<?= $data['id_buku'] ?>">
                                    <input type="hidden" value="<?= $data['id_buku'] ?>" name="id_buku">
                                    <div class="form-group">
                                        <label>Nama Buku</label>
                                        <input name="nama_buku" type="text" class="form-control" value="<?= $data['nama_buku'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input name="pengarang" type="text" class="form-control" value="<?= $data['pengarang'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input name="penerbit" type="text" class="form-control" value="<?= $data['penerbit'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input name="isbn" type="number" class="form-control" value="<?= $data['isbn'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Halaman</label>
                                        <input name="jumlah_halaman" type="number" class="form-control" value="<?= $data['jumlah_halaman'] ?>" require>
                                    </div>
                                    <!-- Kategori -->
                                    <div class="form-group">
                                        <label>Kategori Buku</label>
                                        <select name="kategori" class="form-control">
                                            <option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
                                            <?php
                                                $query2 = mysqli_query($koneksi, "SELECT * From tb_kategori");
                                                while($data2=mysqli_fetch_array($query2)){
                                            ?>
                                            <option value="<?= $data2['nama_kategori'] ?>"><?= $data2['nama_kategori'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Lokasi -->
                                    <div class="form-group">
                                        <label>Lokasi Buku</label>
                                        <select name="lokasi" class="form-control">
                                            <option value="<?= $data['lokasi'] ?>"><?= $data['lokasi'] ?></option>
                                            <?php
                                                $query3 = mysqli_query($koneksi, "SELECT * From tb_lokasi");
                                                while($data3=mysqli_fetch_array($query3)){
                                            ?>
                                            <option value="<?= $data3['nama_lokasi'] ?>"><?= $data3['nama_lokasi'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input name="tanggal_masuk" type="date" class="form-control" value="<?= $data['tanggal_masuk'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Buku</label>
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