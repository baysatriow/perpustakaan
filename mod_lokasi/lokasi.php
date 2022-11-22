
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
Tambah Data
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Lokasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="mod_lokasi/crud_lokasi.php?page=tambah">
        <div class="form-group">
            <label>Nama Lokasi</label>
            <input name="nama_lokasi" type="text" class="form-control" require>
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
        <h4>Data Lokasi</h4>
    </div>
    <div class="card-body">
    <table class="table table-striped data">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Lokasi</th>
            <th scope="col">Waktu Update</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                $query = mysqli_query($koneksi, "SELECT * From tb_lokasi");
                while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['nama_lokasi'] ?></td>
                <td><?= $data['waktu_update'] ?></td>
                <td>
                    <a href="mod_lokasi/crud_lokasi.php?page=hapus&id=<?= $data['id_lokasi'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit<?= $data['id_lokasi'] ?>"><i class="fas fa-edit"></i></button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalEdit<?= $data['id_lokasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Lokasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="mod_lokasi/crud_lokasi.php?page=edit&id=<?= $data['id_lokasi'] ?>">
                                    <input type="hidden" value="<?= $data['id_lokasi'] ?>" name="id_lokasi">
                                    <div class="form-group">
                                        <label>Nama Lokasi</label>
                                        <input name="nama_lokasi" type="text" class="form-control" value="<?= $data['nama_lokasi'] ?>" require>
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