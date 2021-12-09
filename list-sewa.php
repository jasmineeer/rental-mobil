<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Penyewaan</title>
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
        <div class="card-header bg-white">
            <h4 class="text-black">
                Data Penyewaan Mobil 
            </h4>
        </div>

        <div class="card-body">
            <ul class="list-group">
                <?php
                include "connection.php";
                $sql = "select sewa.*, 
                pelanggan.*,karyawan.*,sewa.id_sewa,
                sewa.tgl_sewa,sewa.tgl_kembali,sewa.total_bayar
                from
                sewa inner join pelanggan
                on pelanggan.id_pelanggan=sewa.id_pelanggan
                inner join karyawan
                on sewa.id_karyawan=karyawan.id_karyawan
                order by tgl_sewa desc";

                $hasil = mysqli_query($connect, $sql);
                while ($sewa = mysqli_fetch_array($hasil)) {
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">ID Sewa</small>
                                <h5><?=($sewa["id_sewa"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Penyewa</small>
                                <h5><?=($sewa["nama_pelanggan"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Karyawan</small>
                                <h5><?=($sewa["nama_karyawan"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Tanggal Sewa</small>
                                <h5><?=($sewa["tgl_sewa"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Tanggal Kembali</small>
                                <h5><?=($sewa["tgl_kembali"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Durasi Sewa</small>
                                <h5><?=($sewa["durasi"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Mobil yang Disewa</small>
                            <?php 
                            $id_sewa = $sewa["id_sewa"];
                            $sql = "select * from sewa
                            inner join mobil
                            on sewa.id_mobil=mobil.id_mobil
                            where id_sewa='$id_sewa'";

                            $hasil_mobil = mysqli_query($connect, $sql);
                            while ($mobil = mysqli_fetch_array($hasil_mobil)) {
                            ?>
                                <h5><?=($mobil["merk"])?> <?=($mobil["jenis"])?></h5>
                                <?php 
                            }    
                            ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                    <h6>
                                        <div class="badge badge-info">
                                        Total Bayar : Rp <?=(number_format($sewa["total_bayar"],2))?>
                                        </div>
                                    </h6>  
                                    
                                    <h6>
                                        Status :
                                        <?php if ($sewa["tgl_kembali"] == "0000-00-00 00:00:00") {?>
                                            <div class="badge badge-danger mb-2">
                                                Masih Disewa 
                                            </div>
                                            <br>
                                            <a href="process-kembali.php?id_sewa=<?=($sewa["id_sewa"])?>"
                                            onclick="return confirm('Kamu yakin ingin kembali?')">
                                            <button class="btn btn-sm btn-success">
                                                Kembalikan
                                            </button>
                                            </a>
                                        <?php } else {?>
                                            <div class="badge badge-success">
                                                Sudah Kembalikan
                                            </div>
                                            
                                    </h6>

                                    <?php 
                                    } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php 
                    } 
                    ?>
            </ul>
        </div>
    </div>
</body>
</html>