<?php
    if(isset($_GET['id_trans'])){
        $id_trans = $_GET['id_trans'];
    }
    else {
        die ("Error. No Kode Selected!");    
    }
    require_once('../koneksi/config.php');
    $query   = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan AND transaksi.id_trans = '$id_trans' ");
    $result   = mysqli_fetch_array($query) or die();

?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Detail</title>
    <style type="text/css">
        * {
            border: none!important;
        }
    </style>
</head>
<body >
    <div class="container">
    <div class="card mt-5">
    <h2 align="center">Detail Data</h2>
    </br>
    <p><i>Note: Dibawah ini adalah detail informasi pembayaran berdasarkan ID Transaksi</i> <b><?php echo $id_trans?></b></p>
    <table border="0" cellpadding="4">
         <tr>
            <td>ID Transaksi</td>
            <td>: <?php echo $result['id_trans']?></td>
        </tr>
        <tr>
            <td>ID Pelanggan</td>
            <td>: <?php echo $result['id_pelanggan']?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $result['nama']?></td>
        </tr>
         <tr>
            <td>Tanggal</td>
            <td>: <?php echo $result['tanggal']?></td>
        </tr>
         <tr>
            <td>Total</td>
            <td>: <?php echo $result['total']?></td>
        </tr>

        <tr height="40">
            <td>
                <br><br>
             <a href="data_transaksi.php" type="button" class="btn btn-primary">KEMBALI</a>
            </td>

            <td> 

            </td>
        </tr>
    </table>
    </div>
    </div>
</body>
</html>