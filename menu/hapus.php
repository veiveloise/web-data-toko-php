<?php 
require_once('../koneksi/config.php');


$nota = $_GET['nota'];
$sqldelete = "DELETE FROM  detail where nota ='$nota' ";
mysqli_query($conn, $sqldelete);

header ("location: data.php");
?>