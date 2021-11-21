<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Karyawan</title>
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
                    Data Karyawan Rental Mobil 
                </h4>
            </div>
            <div class="card-body">
                <form action="list-karyawan.php" method="get">
                    <input type="text" name="search_karyawan" 
                    class="form-control mb-2" placeholder="Search">
                </form>
                <ul class="list-group">
                    <?php 
                    include "connection.php";
                    if (isset($_GET["search_karyawan"])) {
                        $search_karyawan = $_GET["search_karyawan"];
                        $sql = "select * from karyawan where id_karyawan like '%$search_karyawan%' 
                        or nama_karyawan like '%$search_karyawan%'
                        or alamat_karyawan like '%$search_karyawan%' 
                        or kontak like '%$search_karyawan%'";
                    } else{
                        $sql = "select * from karyawan";
                    }

                    $hasil = mysqli_query($connect, $sql);
                    while ($karyawan = mysqli_fetch_array($hasil)) {
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5>Nama Karyawan : <?=($karyawan["nama_karyawan"])?></h5>
                                <h6>ID Karyawan : <?=($karyawan["id_karyawan"])?></h6>
                                <h6>Alamat Karyawan : <?=($karyawan["alamat_karyawan"])?></h6>
                                <h6>Kontak : <?=($karyawan["kontak"])?></h6>
                            </div>

                            <div class="col-lg-4">
                                <a href="form-karyawan.php?id_karyawan=<?=$karyawan["id_karyawan"]?>">
                                    <button class="btn btn-info btn-block mb-2">
                                        Edit Data
                                    </button>
                                </a>

                                <a href="delete-karyawan.php?id_karyawan=<?=$karyawan["id_karyawan"]?>"
                                onclick="return confirm('Apakah anda yakin?')">
                                    <button class="btn btn-danger btn-block">
                                        Hapus Data 
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
                <a href="form-karyawan.php">
                    <button class="btn btn-success">
                        Tambah Data Karyawan
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>