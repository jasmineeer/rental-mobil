<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-danger">
                <h4 class="text-white">
                    Form Mobil
                </h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_mobil"])) {
                    $isbn = $_GET["id_mobil"];
                    $sql = "select * from mobil
                    where id_mobil='$id_mobil'";

                    include "connection.php";
                    $hasil = mysqli_query($connect, $sql);
                    $mobil = mysqli_fetch_array($hasil);
                    ?>
                    
                    <form action="process-mobil.php" method="post">

                    ID Mobil
                    <input type="number" name="id_mobil" 
                    class="form-control mb-2" required 
                    value="<?=$mobil["id_mobil"]?>">

                    Nomor Mobil
                    <input type="number" name="nomor_mobil" 
                    class="form-control mb-2" required 
                    value="<?=$mobil["nomor_mobil"]?>">

                    Merk
                    <input type="text" name="merk" 
                    class="form-control mb-2" required 
                    value="<?=$mobil["merk"]?>">

                    Jenis
                    <input type="text" name="jenis" 
                    class="form-control mb-2" required 
                    value="<?=$mobil["jenis"]?>">

                    Warna
                    <input type="text" name="warna" 
                    class="form-control mb-2" required 
                    value="<?=$mobil["warna"]?>">

                    Tahun Pembuatan
                    <input type="number" name="tahun_pembuatan" 
                    class="form-control mb-2" required 
                    value="<?=$mobil["tahun_pembuatan"]?>">

                    Gambar <br>
                    <img src="image/<?=$mobil["image"]?>" width="300" />
                    <input type="file" name="image" class="form-control mb-2">

                    <button type="submit" class="btn btn-info btn-block"
                    name="update_mobil">
                    Simpan
                    </button>
                    </form>
                <?php    
                } else {
                ?>
                    <form action="process-mobil.php" method="post">
                        ID Mobil 
                        <input type="number" name="id_mobil" 
                        class="form-control mb-2" required>

                        Nomor Mobil 
                        <input type="number" name="nomor_mobil" 
                        class="form-control mb-2" required>

                        Merk
                        <input type="text" name="merk" 
                        class="form-control mb-2" required>

                        Jenis
                        <input type="text" name="jenis" 
                        class="form-control mb-2" required>

                        Warna
                        <input type="text" name="warna" 
                        class="form-control mb-2" required>

                        Tahun Pembuatan
                        <input type="number" name="tahun_pembuatan" 
                        class="form-control mb-2" required>

                        Gambar 
                        <input type="file" name="image" 
                        class="form-control mb-2" required>

                        <button type="submit" class="btn btn-info btn-block"
                        name="simpan_mobil">
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