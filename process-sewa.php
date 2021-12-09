<?php
include "connection.php";
# menampung data yang dikirim dari form sewa
$id_sewa = $_POST["id_sewa"];
$id_mobil = $_POST["id_mobil"];
$id_karyawan = $_POST["id_karyawan"];
$id_pelanggan = $_POST["id_pelanggan"];
$tgl_sewa = $_POST["tgl_sewa"];
$durasi = $_POST["durasi"];
$tgl_kembali = null;

$biaya_sewa = 0;

$sql = "select * from mobil where id_mobil ='$id_mobil'";
$hasil = mysqli_query($connect, $sql);
$car = mysqli_fetch_array($hasil);
$biaya = $car["biaya_sewa_perhari"];

$biaya_sewa += $durasi * $biaya;

# perintah sql untuk insert ke tabel sewa
$sql = "insert into sewa values
('$id_sewa','$id_mobil','$id_karyawan','$id_pelanggan','$tgl_sewa','$tgl_kembali','$durasi','$biaya_sewa')";

if (mysqli_query($connect, $sql)) {
    header("location:list-sewa.php");
} else{
    echo mysqli_error($connect);
}
?>