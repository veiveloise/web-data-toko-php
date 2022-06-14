<?php 
require_once('../koneksi/config.php');


$id_trans = $_GET['id_trans'];
$sqldelete = "DELETE FROM  transaksi where id_trans ='$id_trans' ";
mysqli_query($conn, $sqldelete);

header ("location: data_transaksi.php");
?>