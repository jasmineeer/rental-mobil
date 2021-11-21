<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
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
            <div class="card-header bg-info">
                <h4 class="text-white">
                    Data Karyawan
                </h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_karyawan"])) {
                    include "connection.php";

                    $id_karyawan = $_GET["id_karyawan"];
                    $sql = "select * from karyawan where id_karyawan='$id_karyawan'";
                    $hasil = mysqli_query($connect, $sql);
                    $karyawan = mysqli_fetch_array($hasil);
                ?>

                <form action="process-karyawan.php" method="post">

                    Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required
                    value="<?=($karyawan["username"])?>">

                    Password
                    <input type="password" name="password" 
                    class="form-control mb-2" required>

                    ID Karyawan 
                    <input type="text" name="id_karyawan" 
                    class="form-control mb-2" required
                    value="<?=($karyawan["id_karyawan"])?>">

                    Nama Karyawan 
                    <input type="text" name="nama_karyawan" 
                    class="form-control mb-2" required
                    value="<?=($karyawan["nama_karyawan"])?>">

                    Alamat Karyawan 
                    <input type="text" name="alamat_karyawan" 
                    class="form-control mb-2" required
                    value="<?=($karyawan["alamat_karyawan"])?>">

                    Kontak 
                    <input type="text" name="kontak" 
                    class="form-control mb-2" required
                    value="<?=($karyawan["kontak"])?>">

                    <button type="submit" class="btn btn-success btn-block"
                    name="update_karyawan">
                        Simpan 
                    </button>
                </form>
                <?php 
                } else{
                ?>
                
                    <form action="process-karyawan.php" method="post">

                        ID Karyawan 
                        <input type="text" name="id_karyawan"
                        class="form-control mb-2" required>

                        Nama Karyawan 
                        <input type="text" name="nama_karyawan"
                        class="form-control mb-2" required>

                        Alamat Karyawan 
                        <input type="text" name="alamat_karyawan"
                        class="form-control mb-2" required>

                        Kontak  
                        <input type="text" name="kontak"
                        class="form-control mb-2" required>

                        Username  
                        <input type="text" name="username"
                        class="form-control mb-2" required>

                        Password 
                        <input type="password" name="password"
                        class="form-control mb-2" required>

                        <button type="submit" class="btn btn-success btn-block"
                        name="simpan_karyawan">
                            Simpan 
                        </button>
                    </form>
                    <?php 
                }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>