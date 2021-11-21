<?php
include("connection.php");
if (isset($_POST["simpan_pelanggan"])) {
    // menampung data pelanggan dari user
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    // perintah insert data ke tabel pelanggan
    $sql = "insert into pelanggan values
    ('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$kontak')";

    // direct ke halamat list pelanggan
    mysqli_query($connect, $sql);
    header("location:list-pelanggan.php");
}

if (isset($_POST["edit_pelanggan"])) {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    $sql = "update pelanggan set id_pelanggan='$id_pelanggan',
    nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan',
    kontak='$kontak' where id_pelanggan ='$id_pelanggan'";

    mysqli_query($connect, $sql);

    header("location:list-pelanggan.php");
        }


        
?>