<?php 
include "connection.php";
// menampung data 
$id_sewa = $_POST["id_sewa"];
$id_mobil = $_POST["id_mobil"];
$id_karyawan = $_POST["id_karyawan"];
$id_pelanggan = $_POST["id_pelanggan"];
$tgl_sewa = $_POST["tgl_sewa"];
$tgl_kembali = null;
$mobil = $_POST["id_mobil"];
print_r($mobil);

// $sql = "select * from sewa
// inner join mobil
// on sewa.id_mobil=mobil.id_mobil
// where id_sewa='$id_sewa'";

// $hasil_data = mysqli_query($connect, $sql);
// $mobil = mysqli_fetch_array($hasil_data);
// $biaya_sewa_perhari = $mobil["biaya_sewa_perhari"];
// $pinjam = mysqli_fetch_array($hasil_data);
// $tgl_kembali = date_create(date("Y-m-d H:i:s"));
// $tgl_sewa = date_create($sewa["tgl_sewa"]);

// $selisih = date_diff($tgl_kembali, $tgl_sewa);
// $selisih_hari = $selisih->format("%a");

$total_bayar = 0;
$sql = "select * from mobil where id_mobil='".$id_mobil."'";
    $hasil = mysqli_query($connect, $sql);
    $car = mysqli_fetch_array($hasil);
    $biaya = $car["biaya_sewa_perhari"];
    // $total = $biaya * $selisih_hari;

// perintah untuk insert ke table pinjam
$sql = "insert into sewa values
('$id_sewa','$id_mobil','$id_karyawan','$id_pelanggan',
'$tgl_sewa','$tgl_kembali','$biaya',null)";

if (mysqli_query($connect, $sql)) {

    header("location:list-sewa.php");

} else{
    echo mysqli_error($connect);
}
?>