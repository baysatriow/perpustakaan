<!-- Page Heading -->
<section>
        <h1 class="h3 mb-3 text-gray-800" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Administrator
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="mod_user/crud_user.php?page=tambah">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama User</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama User">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama User">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
        <h4>Data Administrator</h4>
        <div class="form-group m-b-2 text-right" style="margin-top: -40px; margin-bottom: -2px;">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                $query = mysqli_query($koneksi, "SELECT * From user");
                while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['username'] ?></td>
                <td>
                    <a href="mod_user/crud_user.php?page=hapus&id=<?= $data['id_user'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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