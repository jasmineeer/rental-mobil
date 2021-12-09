<?php 
include "connection.php";

$id_sewa = $_GET["id_sewa"];
$tgl_kembali = date("Y-m-d H:i:s");

$sql = "update sewa set tgl_kembali ='$tgl_kembali' where id_sewa='$id_sewa'";

if (mysqli_query($connect, $sql)) {
    header("location:list-sewa.php");
} else{
    echo mysqli_error($connect);
}
?>