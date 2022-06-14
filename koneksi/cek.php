<?php 
session_start();
include "config.php";

$username = $_POST['user'];
$password = $_POST['pass'];

//cek data
$sql = "SELECT * FROM login WHERE username='$username' ";
$qry = mysqli_query($conn,$sql);
$usr = mysqli_fetch_array($qry);

if( 
 md5($username) == md5($usr['username'])
 AND
 md5($password) == md5($usr['password'])
  )
{
 $pesan = "Login berhasil, Selamat Datang ";

} else {
 $pesan = "Login gagal, username atau password anda salah!";
}

?>
<script>
 alert('<?php echo $pesan;?>');
 location='../menu/data.php';
</script>

