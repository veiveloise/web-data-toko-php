<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Pelanggan</title>
  </head>
<body>
    <br/>
    
    <a href="data_barang.php" type="button" class="btn btn-primary m-3">Lihat Semua Data</a>
 
    <br/>
 
    <?php
    require_once('../koneksi/config.php');
    $id_pelanggan = $_GET['id_pelanggan'];
    $data = mysqli_query($conn,"select * from pelanggan where id_pelanggan ='$id_pelanggan'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <h5 class="card-header" style="text-align: center!important;">Edit Data Pelanggan</h5>
    <div class="card-body d-flex justify-content-center ">
    <div class="w-50 border p-3 mt-3">

         <!-- form -->
    <form action="edit.php" method="POST">
        <div class="modal-body">                       
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">ID Pelanggan</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="id_pelanggan" value="<?php echo $d['id_pelanggan'];?>">
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Nama</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="nama" value="<?php echo $d['nama'];?>">
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Alamat</label>
         <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" value="<?php echo $d['alamat'];?>">
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Telepon</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="telp" value="<?php echo $d['telp'];?>">
          </div>

              <input class="btn btn-success mt-3" type="submit" name="ubahBarang" value="Edit" >
                                                                    
          </div>
          </div>
          </form>
      </div>
      </div>
    <?php } ?>
</body>
</html>

