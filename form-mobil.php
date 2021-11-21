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
                    Form Mobil
                </h4>
            </div>

            <div class="card-body">
                <?php
                include "connection.php";
                # form edit
                if (isset($_GET["id_mobil"])) {
                    $id_mobil = $_GET["id_mobil"];
                    $sql = "select * from mobil
                    where id_mobil='$id_mobil'";

                    # eksekusi sql
                    $hasil = mysqli_query($connect, $sql);
                    # mengkonversikan data ke array
                    $mobil = mysqli_fetch_array($hasil);
                    ?>
                    
                    <form action="process-mobil.php" method="post"
                    enctype="multipart/form-data">

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

                    Biaya Sewa /Hari 
                    <input type="number" name="biaya_sewa_perhari" 
                    class="form-control mb-2" required 
                    value="<?=$mobil["biaya_sewa_perhari"]?>">

                    Gambar <br>
                    <img src="gambar/<?=$mobil["image"]?>" width="300" />
                    <input type="file" name="image" class="form-control mb-2">

                    <button type="submit" class="btn btn-info btn-block"
                    name="update_mobil">
                    Simpan
                    </button>
                    </form>
                <?php    
                } else {
                ?>
                    <!-- form untuk insert -->
                    <form action="process-mobil.php" method="post"
                    enctype="multipart/form-data">
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

                        Biaya Sewa /hari 
                        <input type="number" name="biaya_sewa_perhari" 
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