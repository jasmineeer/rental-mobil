<?php 
# session = tempat penyimpanan data di sisi server yang dapat diakses secara global pada halaman web yang membutuhkan
session_start();
include './connection.php';

# mengecek apakah ada data yang sama dengan data yang ditampung
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    # mengambil data dari tabel karyawan
    $sql = "select * from karyawan where username='$username' and password='$password'";
    # digunakan untuk mengirim perintah query
    $hasil = mysqli_query($connect, $sql);

    # mengecek hasil query
    # mysqli_num_rows merupakan jumlah baris
    if (mysqli_num_rows($hasil) > 0) {
        $karyawan = mysqli_fetch_array($hasil);
        # session berfungsi untuk menampung data karyawan yang berupa username dan password 
        $_SESSION["karyawan"] = $karyawan;
        # jika berhasil menampung data karyawan, maka akan di direct ke halaman list-karyawan
        header("location:list-karyawan.php");
    } else{
        # jika gagal, maka akan kembali ke halaman login
        header("location:login.php");
    }
}
?>