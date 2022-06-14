<?php 
require_once('../koneksi/config.php');


$id_pelanggan = $_GET['id_pelanggan'];
$sqldelete = "DELETE FROM  pelanggan where id_pelanggan ='$id_pelanggan' ";
mysqli_query($conn, $sqldelete);

header ("location: data_pelanggan.php");
?>