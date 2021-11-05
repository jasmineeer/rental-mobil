<?php
include "connection.php";
if (isset($_POST["simpan_karyawan"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id_karyawan = $_POST["id_karyawan"];
    $nama_karyawan = $_POST["nama_karyawan"];
    $alamat_karyawan = $_POST["alamat_karyawan"];
    $kontak = $_POST["kontak"];

    $sql = "insert into karyawan values ('$id_karyawan',
    '$nama_karyawan','$alamat_karyawan','$kontak','$username','$password')";

    if (mysqli_query($connect, $sql)) {
        header("location:list-karyawan.php");
    } else{
        echo mysqli_error($connect);
    }
} 

elseif (isset($_POST["update_karyawan"])) {
    $id_karyawan = $_POST["id_karyawan"];
    $nama_karyawan = $_POST["nama_karyawan"];
    $alamat_karyawan = $_POST["alamat_karyawan"];
    $kontak = $_POST["kontak"];
    $username = $_POST["username"];

    if (empty($_POST["password"])) {
        $sql = "update karyawan set id_karyawan='$id_karyawan',
        nama_karyawan='$nama_karyawan', alamat_karyawan='$alamat_karyawan, 
        kontak='$kontak', username='$username' 
        where id_karyawan='$id_karyawan'";
    } else{
        $password = $_POST["password"];
        $sql = "update karyawan set id_karyawan='$id_karyawan',
        nama_karyawan='$nama_karyawan', alamat_karyawan='$alamat_karyawan,
        kontak='$kontak', username='$username', 
        password='$password' where id_karyawan='$id_karyawan'";
    }

    if (mysqli_query($connect, $sql)) {
        header("location:list-karyawan.php");
    } else{
        echo mysqli_error($connect);
    }

    $sql = "delete from karyawan where id_karyawan='$id_karyawan'";
    if (mysqli_query($connect, $sql)) {
        header("location:list-karyawan.php");
    } else{
        mysqli_error($connect);
    }
}
?>