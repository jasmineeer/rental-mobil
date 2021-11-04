<?php
include './connection.php';

$id = $_GET['id_pelanggan'];
$sql = "delete from pelanggan where id_pelanggan = '".$id_pelanggan."'";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location : list-pelanggan.php");
} else{
    printf('Gagal Menghapus'.mysqli_error($connect));
    exit();
}
?>