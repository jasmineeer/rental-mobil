<?php
include "connection.php";
$id_sewa = $_GET["id_sewa"];
date_default_timezone_set('Asia/Jakarta');
$tgl_kembali = date_create(date("Y-m-d H:i:s"));
$tgl_kembali_fix = date("Y-m-d H:i:s");

$sql = "select * from sewa
inner join mobil
on sewa.id_mobil=mobil.id_mobil
where id_sewa='$id_sewa'";
$tgl_sewa = date_create($sewa["tgl_sewa"]);
$hasil = mysqli_query($connect, $sql);
$pinjam = mysqli_fetch_array($hasil);

# menghitung selisih antara dua tanggal
$selisih = date_diff($tgl_kembali, $tgl_sewa);
# mengkonversi hasil selisih kedalam format jumlah hari
$selisih_hari = $selisih->format("%a");

if ($selisih_hari > 0) {
    $total_bayar = $selisih_hari * $biaya_sewa_perhari;
}
else{
    $total_bayar = 0;
}

$sql = "insert into pengembalian values
('',$id_sewa','$tgl_kembali_fix','$total_bayar')";

if (mysqli_query($connect, $sql)) {
    header("location:list-sewa.php");
} else{
    echo mysqli_error($connect);
}
?>
