<?php
include("connection.php");
if (isset($_POST["simpan_pelanggan"])) {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    $sql = "insert into pelanggan values
    ('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$kontak')";

    mysqli_query($connect, $sql);
    header("location:list-pelanggan.php");
}

if (isset($_POST["edit_pelanggan"])) {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    $sql = "update pelanggat set id_pelanggan='$id_pelanggan',
    nama_pelanggan='$nama_pelanggan', alamat='$alamat_pelanggan',
    kontak='$kontak' where id_pelanggan ='$id_pelanggan'";

    mysqli_query($connect, $sql);
    header("location:list-pelanggan.php");
}

$sql = "delete from pelanggan where id_pelanggan='$id_pelanggan'";
    if (mysqli_query($connect, $sql)) {
        header("location:list-pelanggan.php");
    } else{
        mysqli_error($connect);
    }
?>