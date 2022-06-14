 <?php 
// koneksi database
require_once('../koneksi/config.php');
/*$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
 var_dump($id_barang, $nama_barang, $harga, $stok); die(); */
 
// menangkap data yang di kirim dari form

$id_pelanggan = $_POST['id_pelanggan'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];


mysqli_query($conn,"update pelanggan set nama ='$nama', alamat = '$alamat', telp = '$telp' where id_pelanggan = '$id_pelanggan'");

header("location:data_pelanggan.php?Data Berhasil di edit");

?>
