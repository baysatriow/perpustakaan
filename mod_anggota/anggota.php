<!-- Page Heading -->
<section>
        <h1 class="h3 mb-3 text-gray-800" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Anggota
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="mod_anggota/crud_anggota.php?page=tambah">
        <div class="form-group">
            <label>Nama Anggota</label>
            <input name="nama_anggota" type="text" class="form-control" require>
        </div>
        <div class="form-group">
            <label>NIS</label>
            <input name="nis" type="text" class="form-control" require>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control" require>
                <option>--Pilih--</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control" require>
                <option>--Pilih--</option>
                <option value="X RPL 1">X RPL 1</option>
                <option value="X RPL 2">X RPL 2</option>
                <option value="X TKJ 1">X TKJ 1</option>
                <option value="X TKJ 2">X TKJ 2</option>
                <option value="X TKJ 3">X TKJ 3</option>
            </select>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="5" require></textarea>
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
        <h4>Data Anggota</h4>
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
            <th scope="col">Nama Anggota</th>
            <th scope="col">NIS</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Kelas</th>
            <th scope="col">Alamat</th>
            <th scope="col">Waktu Update</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                $query = mysqli_query($koneksi, "SELECT * From tb_anggota");
                while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['nama_anggota'] ?></td>
                <td><?= $data['nis'] ?></td>
                <td><?= $data['jk'] ?></td>
                <td><?= $data['kelas'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['waktu_update'] ?></td>
                <td>
                    <a href="mod_anggota/crud_anggota.php?page=hapus&id=<?= $data['id_anggota'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit<?= $data['id_anggota'] ?>"><i class="fas fa-edit"></i></button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalEdit<?= $data['id_anggota'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="mod_anggota/crud_anggota.php?page=edit&id=<?= $data['id_anggota'] ?>">
                                    <input type="hidden" value="<?= $data['id_anggota'] ?>" name="id_anggota">
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <input name="nama_anggota" type="text" class="form-control" value="<?= $data['nama_anggota'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input name="nis" type="text" class="form-control" value="<?= $data['nis'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jk" class="form-control" require>
                                            <option value="<?= $data['jk'] ?>"><?= $data['jk'] ?></option>
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select name="kelas" class="form-control" require>
                                            <option value="<?= $data['kelas'] ?>"><?= $data['kelas'] ?></option>
                                            <option value="X RPL 1">X RPL 1</option>
                                            <option value="X RPL 2">X RPL 2</option>
                                            <option value="X TKJ 1">X TKJ 1</option>
                                            <option value="X TKJ 2">X TKJ 2</option>
                                            <option value="X TKJ 3">X TKJ 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" cols="30" rows="5" require><?= $data['alamat'] ?></textarea>
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