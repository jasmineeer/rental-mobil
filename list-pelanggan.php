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
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Data Pelanggan Rental Mobil
                </h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <form action="list-pelanggan.php" method="get">
                        <input type="text" name="search" class="form-control mb-2"
                        placeholder="Search">
                    </form>
                    <ul class="list-group">
                        <?php
                        include("connection.php");
                        if (isset($_GET["search"])) {
                            $search = $_GET["search"];
                            $sql = "select * from pelanggan 
                            where id_pelanggan like '%$search%'
                            or nama_pelanggan like '%$search%'
                            or alamat_pelanggan like '%$search%'
                            or kontak like '%$search%'";
                        } else{
                            $sql = "select  from pelanggan";
                        }
                        ?>
                        <?php
                        include("connection.php");
                        $sql = "select * from pelanggan";
                        $query = mysqli_query($connect, $sql);
                        while ($pelanggan = mysqli_fetch_array($query)) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-8 col-md-10">
                                        <h5>Nama Pelanggan : <?php echo $pelanggan["nama_pelanggan"];?></h5>
                                        <h6>ID Pelanggan : <?php echo $anggota["id_pelanggan"]?></h6>
                                        <h6>Alamat Pelanggan : <?php echo $pelanggan["alamat_pelanggan"]?></h6>
                                        <h6>Kontak : <?php echo $anggota["kontak"]?></h6>
                                    </div>

                                    <div class="col-lg-4 col-md-2">
                                        <a href="form-pelanggan.php?id_pelanggan=<?php echo $pelanggan["id_pelanggan"];?>">
                                            <button class="btn btn-info btn-block mb-2">
                                                Edit Data
                                            </button>
                                        </a>

                                        <a href="delete.php?id_pelanggan<?=$pelanggan["id_pelanggan"]?>"
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