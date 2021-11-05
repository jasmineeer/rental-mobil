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
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">
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
                        $sql = "select  from mobil";
                        $hasil = mysqli_query($connect, $sql);
                        while ($mobil = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($mobil["id_mobil"])?>">
                                <?=($mobil["nama_mobil"])?>
                        </option>
                        <?php
                        }
                    ?>
                    </select>

                    

                    ID Karyawan 
                    <input type="text" name="nama_karyawan" 
                    class="form-control mb-2" readonly
                    value="<?=($_SESSION["karyawan"]["nama_karyawan"])?>">

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
                    <input type="text" name="tgl_sewa" 
                    class="form-control mb-2" readonly
                    value="<?=(date("Y-m-d H:i:s"))?>">

                    Tanggal Kembali
                    <input type="text" name="tgl_kembali" 
                    class="form-control mb-2" readonly
                    value="<?(date("Y-m-d H:i:s"))?>">

                    Total Bayar 
                </form>
            </div>
        </div>
    </div>
</body>
</html>