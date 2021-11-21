<?php 
session_start();
include './connection.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from karyawan where username='$username' and password='$password'";
    $hasil = mysqli_query($connect, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $karyawan = mysqli_fetch_array($hasil);
        $_SESSION["karyawan"] = $karyawan;
        header("location:list-karyawan.php");
    } else{
        header("location:login.php");
    }
}
?>