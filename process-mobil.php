<?php
include "connection.php";
if (isset($_POST["simpan_mobil"])) {
    $id_mobil = $_POST["id_mobil"];
    $nomor_mobil = $_POST["nomor_mobil"];
    $merk = $_POST["merk"];
    $jenis = $_POST["jenis"];
    $warna = $_POST["warna"];
    $tahun_pembuatan = $_POST["tahun_pembuatan"];

    $fileName = $_FILES["image"]["name"]; // file name
    $extension = pathinfo($_FILES["image"]["name"]);
    $ext = $extension["extension"];

    $image = time()."-".$fileName;

    $folderName = "image/$image";
    if (move_uploaded_file($_FILES["image"]["tmp_name"],$folderName)) {
        $sql = "insert into mobil values
        ('$id_mobil','$nomor_mobil','$merk','$jenis','$warna',
        '$tahun_pembuatan','$image')";

        mysqli_query($connect, $sql);
        echo "Tambah data mobil berhasil!";

        header("location:list-mobil.php");
    } else {
        echo "Tambah data mobil gagal!";
    }
}
elseif (isset($_POST["update_mobil"])) {
    $id_mobil = $_POST["id_mobil"];
    $nomor_mobil = $_POST["nomor_mobil"];
    $merk = $_POST["merk"];
    $jenis = $_POST["jenis"];
    $warna = $_POST["warna"];
    $tahun_pembuatan = $_POST["tahun_pembuatan"];

    if (!empty($_FILES["image"]["name"])) {
        $sql = "select * frpm mobil where id_mobil='$id_mobil'";
        $hasil = mysqli_query($connect, $sql);
        $mobil = mysqli_fetch_array($hasil);
        $oldFileName = $buku["image"];

        $path = "image/$oldFileName";

        if (file_exists($path)) {
            unlink($path);
        }

        $image = time()."-".$_FILES["image"]["name"];
        $folder = "image/$image";

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder)) {
            $sql = "update mobil set nomor_mobil='$nomor_mobil',
            merk='$merk', jenis='$jenis', warna='$warna', 
            tahun_pembuatan='$tahun_pembuatan', image='$image'
            where id_mobil='$id_mobil'";

            if (mysqli_query($connect, $sql)) {
                header("location:list-mobil.php");
            } else {
                echo mysqli_error($connect);
            }
        }
    }

    else {
        $sql = "update mobil set nomor_mobil='$nomor_mobil',
        merk='$merk', jenis='$jenis', warna='$warna', 
        tahun_pembuatan='$tahun_pembuatan', image='$image'
        where id_mobil='$id_mobil'";

        if (mysqli_query($connect, $sql)) {
            header("location:list-mobil.php");
        } else {
            echo mysqli_error($connect);
        }
    }
}

elseif (isset($_GET["id_mobil"])) {
    $id_mobil = $_GET["id_mobil"];
    $sql = "select * from mobil where id_mobil='$id_mobil'";
    $hasil = mysqli_query($connect, $sql);
    $mobil = mysqli_fetch_array($hasil);

    $oldFileName = $mobil["image"];
    $path = "image/$oldFileName";

    if (file_exists($path)) {
        unlink($path);
    }

    $sql = "delete from mobil where id_mobil='$id_mobil'";
    if (mysqli_query($connect, $sql)) {
        header("location:list-mobil.php");
    } else{
        mysqli_error($connect);
    }

}
?>