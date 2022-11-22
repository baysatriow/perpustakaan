<!-- Page Heading -->
    <section>
        <h1 class="h3 mb-3 text-gray-800" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Dashboard
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

    <!-- Welcome Heading -->
    <?php
        date_default_timezone_set('Asia/Jakarta');
        $jam = date("H:i");

        // atur salam dengan IF
        if ($jam > '05:30' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam > '15:00' && $jam < '21:00') {
            $salam = 'Sore';
        } else {
            $salam = 'Malam';
        }
        ?>
    <div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db;">
            Selamat <?= $salam; ?>, Selamat Datang <?= $_SESSION['nama']; ?> di Administrator E-Library.
        </div>

<!-- Widget -->
<div class="row">

    <!-- Card Jumlah Total Buku Perpustakaan -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
        <a class="text-decoration-none" href="?page=buku">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Buku Perpustakaan</div>
                        <?php
                            $query = mysqli_query($koneksi, "SELECT count(*) AS jumlah From tb_buku");
                            $data = mysqli_fetch_array($query);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <!-- Card Jumlah Anggota -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <a class="text-decoration-none" href="?page=anggota">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Anggota</div>
                        <?php
                            $query = mysqli_query($koneksi, "SELECT count(*) AS jumlah From tb_anggota");
                            $data = mysqli_fetch_array($query);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <!-- Card Jumlah Peminjaman Buku -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <a class="text-decoration-none" href="?page=transaksi">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Peminjaman Buku</div>
                        <?php
                            $query = mysqli_query($koneksi, "SELECT count(*) AS jumlah From tb_transaksi");
                            $data = mysqli_fetch_array($query);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['jumlah'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
    <img src="img/logo-library1.png" width="250px" height="250px" style="display: block; margin-left: auto; margin-right: auto; margin-top: 30px; margin-bottom: 20px;">

<p class="text-center">Alamat : Jl.Gadingrejo, Gadingrejo, Kab.Pringsewu | Email : bayusatriowid@gmail.com | Nomor Telpon : 081377754080</p>

    </div>


</div>