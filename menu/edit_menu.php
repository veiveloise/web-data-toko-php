<?php
require_once('../koneksi/config.php');
$nota         = $_GET['nota'];
$trans      = mysqli_query($conn, "select * from detail where nota ='$nota'");
$d          = mysqli_fetch_array($trans);
// membuat data jurusan menjadi dinamis dalam bentuk array
/*$sql        = mysqli_query($conn, "select * from pelanggan'");
$pelanggan  = mysqli_fetch_array($sql);
*/
?>
<!DOCTYPE html>
<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard</title>
    </head>
    <body>

        <br>
         <a href="data.php" type="button" class="btn btn-primary m-3">Lihat Semua Data</a>

         <h5 class="card-header" style="text-align: center!important;">Edit Data Transaksi</h5>
            <div class="card-body d-flex justify-content-center ">
            <div class="w-50 border p-3 mt-3">

        <form action=" " method="POST">                     
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Nota</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="nota" value="<?php echo $d['nota'];?>">
         </div>
         <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pelanggan</label>
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_pelanggan">
            <option selected="pilih">
                <option selected>---------Pilih-----------</option>
                <?php
                   $query = mysqli_query($conn, "SELECT * FROM pelanggan ");                                
                
                   $result = array(); 
                while ($data = mysqli_fetch_array($query)) {
                $result[] = $data; //result dijadikan array 
                }                
                //selanjutnya result array di foreach
                foreach ($result as $value){                                
                ?>    
                <option value="<?php echo $d['id_pelanggan'];?>"><?php echo $value['nama'];?></option>
               <?php
                  }
                 ?>
                 </select>
          </div>
          <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Barang</label>
                <select class="form-select" id="barang" aria-label="Floating label select example" name="id_barang">
                   <option selected>---------Pilih-----------</option>
                   <?php
                      $query = mysqli_query($conn, 'SELECT * FROM barang');                                
                            
                      $result = array(); 
                   while ($data = mysqli_fetch_array($query)) {
                   $result[] = $data; //result dijadikan array 
                   }                
                            //selanjutnya result array di foreach
                   foreach ($result as $value){                                
                   ?>    
                   <option value="<?php echo $d['id_barang'];?>"><?php echo $value['nama_barang'];?></option>
                    <?php
                       }
                     ?>
                </select>
         </div>
         <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Transaksi</label>
                <select class="form-select" id="barang" aria-label="Floating label select example" name="id_trans">
                   <option selected>---------Pilih-----------</option>
                   <?php
                      $query = mysqli_query($conn, 'SELECT * FROM transaksi');                                
                            
                      $result = array(); 
                   while ($data = mysqli_fetch_array($query)) {
                   $result[] = $data; //result dijadikan array 
                   }                
                            //selanjutnya result array di foreach
                   foreach ($result as $value){                                
                   ?>    
                   <option value="<?php echo $d['id_trans'];?>"><?php echo $value['id_trans'];?></option>
                    <?php
                       }
                     ?>
                </select>
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Total</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="total" value="<?php echo $d['total'];?>">
          </div>

              <input class="btn btn-success mt-3" type="submit" name="edit" value="Edit">
                                                                    
          </div>
          </form>
      </div>
      </div>

<?php

if(isset($_POST['edit'])){
// koneksi database
$nota = $_POST['nota'];
$id_trans = $_POST['id_trans'];
$id_pelanggan = $_POST['id_pelanggan'];
$id_barang = $_POST['id_barang'];
$total = $_POST['total'];


mysqli_query($conn,"update detail set  id_pelanggan = '$id_pelanggan', id_barang = '$id_barang', id_trans = '$id_trans', total = '$total' where nota = '$nota'");


header("location:data.php?Data Berhasil di edit");
/* var_dump($nota, $id_trans, $id_pelanggan, $id_barang, $total); die();*/
} else {

}

?>
</body>
</html>
