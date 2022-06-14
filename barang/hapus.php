<?php 

require_once('../koneksi/config.php');

$id_barang = $_GET['id_barang'];
$sqldelete = "DELETE FROM  barang where id_barang ='$id_barang' ";
mysqli_query($conn, $sqldelete);

header ("location: data_barang.php");
?>