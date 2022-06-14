 <?php 
// koneksi database
require_once('../koneksi/config.php');
/*$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
 var_dump($id_barang, $nama_barang, $harga, $stok); die(); */
 
// menangkap data yang di kirim dari form

$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];


mysqli_query($conn,"update barang set nama_barang ='$nama_barang', harga = '$harga', stok = '$stok' where id_barang = '$id_barang'");

header("location:data_barang.php?Data Berhasil di edit");

?>
