<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
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
            <!-- card header -->
            <div class="card-header bg-white">
                <h4 class="text-black">
                    Data Pelanggan Rental Mobil
                </h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <ul class="list-group">
                    <!-- kotak pencarian data pelanggan -->
                    <form action="list-pelanggan.php" method="get">
                        <input type="text" name="search" class="form-control mb-2"
                        placeholder="Search">
                    </form>
                    <ul class="list-group">
                        <?php
                        include("connection.php");
                        if (isset($_GET["search"])) {
                            # saat load halaman ini, akan mengecek apa ada data dengan method GET yang bernama "search"
                            $search = $_GET["search"];
                            $sql = "select * from pelanggan 
                            where id_pelanggan like '%$search%'
                            or nama_pelanggan like '%$search%'
                            or alamat_pelanggan like '%$search%'
                            or kontak like '%$search%'";

                            // echo $sql;
                        } else{
                            $sql = "select * from pelanggan";
                        }
                        ?>
                        <?php
                        include("connection.php");

                        // eksekusi perintah sql
                        // $sql = "select * from pelanggan";
                        $query = mysqli_query($connect, $sql);
                        while ($pelanggan = mysqli_fetch_array($query)) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <!-- bagian data anggota -->
                                    <div class="col-lg-8 col-md-10">
                                        <h5>Nama Pelanggan : <?php echo $pelanggan["nama_pelanggan"];?></h5>
                                        <h6>ID Pelanggan : <?php echo $pelanggan["id_pelanggan"]?></h6>
                                        <h6>Alamat Pelanggan : <?php echo $pelanggan["alamat_pelanggan"]?></h6>
                                        <h6>Kontak : <?php echo $pelanggan["kontak"]?></h6>
                                    </div>

                                    <!-- bagian tombol edit dan menghapus -->
                                    <div class="col-lg-4 col-md-2">
                                        <a href="form-pelanggan.php?id_pelanggan=<?php echo $pelanggan["id_pelanggan"];?>">
                                            <button class="btn btn-info btn-block mb-2">
                                                Edit Data
                                            </button>
                                        </a>

                                        <a href="delete.php?id_pelanggan=<?php echo $pelanggan["id_pelanggan"];?>"
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
                </ul>
            </div>
            <div class="card-footer">
                <a href="form-pelanggan.php">
                    <button class="btn btn-success">
                        Tambah Pelanggan
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>