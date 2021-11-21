<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-md bg-info navbar-dark mb-2">
            <!-- Brand -->
            <a class="navbar-brand" href="#">Rental Mobil</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-mobil.php">Data Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-karyawan.php">Data Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-pelanggan.php">Data Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-sewa.php">Data Sewa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-sewa.php">Form Sewa</a>
                    </li>
                </ul>
            </div>
        </nav>
    <div class="container">
        <div class="card">
            <div class="card-header bg-white">
                <h4 class="text-black">
                    Daftar Mobil
                </h4>
            </div>

            <div class="card-body">
                <form action="list-mobil.php" method ="get">
                    <input type="text" name="cari" class="form-control mb-2"
                    placeholder="Masukkan Keyword Pencarian" />
                </form>

                <ul class="list-group">
                    <?php
                    include "connection.php";
                    if (isset($_GET["cari"])) {
                        $cari = $_GET["cari"];
                        $sql = "select * from mobil 
                        where merk like '%$cari%' 
                        or jenis like '%$cari%' 
                        or warna like '%$cari%'
                        or tahun_pembuatan like '%$cari%'
                        or biaya_sewa_perhari like '%$cari%'";
                    }else {
                        $sql = "select * from mobil";
                    }
                    # eksekusi SQL
                    $hasil = mysqli_query($connect, $sql);
                    while ($mobil = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- untuk gambar -->
                                    <img src="gambar/<?=$mobil["image"]?>" width="300">
                                </div>
                                <div class="col-lg-6">
                                    <!-- untuk deskripsi mobil -->
                                    <h3><?=$mobil["merk"]?></h3>
                                    <h6>ID Mobil : <?=$mobil["id_mobil"]?></h6>
                                    <h6>Jenis : <?=$mobil["jenis"]?></h6>
                                    <h6>Warna : <?=$mobil["warna"]?></h6>
                                    <h6>Tahun Pembuatan : <?=$mobil["tahun_pembuatan"]?></h6>
                                    <h6>Harga Sewa : Rp <?=(number_format($mobil["biaya_sewa_perhari"],2))?> /hari</h6>
                                </div>
                                <div class="col-lg-2">
                                    <a href="form-mobil.php?id_mobil=<?=$mobil["id_mobil"]?>">
                                        <button class="btn btn-info btn-block">
                                         Edit
                                         </button>
                                    </a>

                                    <div class="card-footer">
                                      <a href="process-mobil.php?id_mobil=<?=$mobil["id_mobil"]?>"
                                         onclick="return confirm('Are you sure?')">
                                    </div>
                                        <button class="btn btn-danger btn-block">
                                          Hapus
                                        </button>
                                      </a>
                                    
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-mobil.php"> 
                    <button class="btn btn-success">
                        Tambah Data Mobil
                    </button>
                </a>
            </div>

        </div>
    </div>
</body>
</html>