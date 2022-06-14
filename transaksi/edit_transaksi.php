<?php
require_once('../koneksi/config.php');
$id         = $_GET['id_trans'];
$trans      = mysqli_query($conn, "select * from transaksi where id_trans ='$id'");
$d       = mysqli_fetch_array($trans);
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

    <title>Data Transaksi</title>
    </head>
    <body>

        <br>
         <a href="data_transaksi.php" type="button" class="btn btn-primary m-3">Lihat Semua Data</a>

         <h5 class="card-header" style="text-align: center!important;">Edit Data Transaksi</h5>
            <div class="card-body d-flex justify-content-center ">
            <div class="w-50 border p-3 mt-3">

        <form action=" " method="POST">
        <div class="modal-body">                       
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">ID Transaksi</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="id_trans" value="<?php echo $d['id_trans'];?>">
         </div>
         <div class="mb-3">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_pelanggan">
            <option selected="pilih">
                <?php
                   $query = mysqli_query($conn, 'SELECT * FROM pelanggan');                                
                
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
           <label for="exampleInputPassword1" class="form-label">Tanggal</label>
         <input type="text" class="form-control" id="exampleInputPassword1" name="tanggal" value="<?php echo $d['tanggal'];?>">
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Total</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="total" value="<?php echo $d['total'];?>">
          </div>

              <input class="btn btn-success mt-3" type="submit" name="edit">
                                                                    
          </div>
          </div>
          </form>
      </div>
      </div>

<?php

if(isset($_POST['edit'])){
// koneksi database

$id_trans = $_POST['id_trans'];
$id_pelanggan = $_POST['id_pelanggan'];
$tanggal = $_POST['tanggal'];
$total = $_POST['total'];


mysqli_query($conn,"update transaksi set id_pelanggan ='$id_pelanggan', tanggal = '$tanggal', total = '$total' where id_trans = '$id_trans'");


header("location:data_transaksi.php?Data Berhasil di edit");
/* var_dump($id_trans, $id_pelanggan, $tanggal, $total); die();*/
} else {

}

?>
</body>
</html>
