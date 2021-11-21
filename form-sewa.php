<?php 
session_start();
if (isset($_SESSION["karyawan"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sewa Mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark mb-2">
            <!-- Brand -->
            <a class="navbar-brand" href="list-mobil.php">Home</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>

        </nav> 
    <div class="container">
        <div class="card">
            <div class="card-header bg-white">
            
                <h4 class="text-black">
                    Form Penyewaan Mobil
                </h4>
            </div>

            <div class="card-body">
                <form action="process-sewa.php" method="post">
                
                    ID Sewa 
                    <input type="text" name="id_sewa"
                    class="form-control mb-2" required>

                    ID Mobil 
                    <select name="id_mobil" class="form-control mb-2"
                    required>
                    <?php 
                        include "connection.php";
                        $sql = "select * from mobil";
                        $hasil = mysqli_query($connect, $sql);
                        while ($mobil = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($mobil["id_mobil"])?>">
                                <?=($mobil["id_mobil"])?>
                        </option>
                        <?php
                        }
                    ?>
                    </select>

                    ID Karyawan 
                    <select name="id_karyawan" class="form-control mb-2"
                    required>
                        <?php 
                        include "connection.php";
                        $sql = "select * from karyawan";
                        $hasil = mysqli_query($connect, $sql);
                        while ($karyawan = mysqli_fetch_array($hasil)) {
                            ?>
                            <option value="<?=($karyawan["id_karyawan"])?>">
                                <?=($karyawan["id_karyawan"])?>
                            </option>
                        <?php 
                        }
                        ?>
                    </select>

                    ID Pelanggan
                    <select name="id_pelanggan" class="form-control mb-2"
                    required>
                        <?php 
                        include "connection.php";
                        $sql = "select * from pelanggan";
                        $hasil = mysqli_query($connect, $sql);
                        while ($pelanggan = mysqli_fetch_array($hasil)) {
                            ?>
                            <option value="<?=($pelanggan["id_pelanggan"])?>">
                                <?=($pelanggan["id_pelanggan"])?>
                            </option>
                        <?php 
                        }
                        ?>
                    </select>
                    
                    <?php 
                    date_default_timezone_set('Asia/Jakarta');
                    ?>
                    
                    Tanggal Sewa 
                    <input type="date" name="tgl_sewa" 
                    class="form-control mb-2" required>

                    Tanggal Kembali
                    <input type="date" name="tgl_kembali" 
                    class="form-control mb-2" required>

                    <button type="submit" class="btn btn-success btn-block ">
                        Sewa
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>