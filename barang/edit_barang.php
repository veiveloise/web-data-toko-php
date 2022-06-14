<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Barang</title>
  </head>
<body>
    <br/>
    
    <a href="data_barang.php" type="button" class="btn btn-primary m-3">Lihat Semua Data</a>
 
    <br/>
 
    <?php
    require_once('../koneksi/config.php');
    $id_barang = $_GET['id_barang'];
    $data = mysqli_query($conn,"select * from barang where id_barang ='$id_barang'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <h5 class="card-header" style="text-align: center!important;">Edit Data Barang</h5>
    <div class="card-body d-flex justify-content-center ">
    <div class="w-50 border p-3 mt-3">

         <!-- form -->
    <form action="edit.php" method="POST">
        <div class="modal-body">                       
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">ID Barang</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="id_barang" value="<?php echo $d['id_barang'];?>">
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="nama_barang" value="<?php echo $d['nama_barang'];?>">
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Harga </label>
         <input type="text" class="form-control" id="exampleInputPassword1" name="harga" value="<?php echo $d['harga'];?>">
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Stok</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="stok" value="<?php echo $d['stok'];?>">
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

