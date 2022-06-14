<?php
require_once('../koneksi/config.php');
$trans      = mysqli_query($conn, "select * from pelanggan");
$d       = mysqli_fetch_array($trans);

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
         <h5 class="card-header" style="text-align: center!important;">Tambah Data Transaksi</h5>
            <div class="card-body d-flex justify-content-center ">
            <div class="w-50 border p-3 mt-3">

        <form action=" " method="POST">
        <div class="modal-body">                       
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">ID Transaksi</label>
           <input type="text" class="form-control" id="exampleInputPassword1" name="id_trans">
         </div>
        <div class="mb-3">
             <label for="exampleInputPassword1" class="form-label">Pelanggan</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_pelanggan">
                <option selected>Pilih</option>
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
         <input type="text" class="form-control" id="exampleInputPassword1" name="tanggal" placeholder ="Tahun-Bulan-Tanggal">
         </div>
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Total</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="total">
          </div>

              <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah" >
                                                                    
          </div>
          </div>
          </form>
      </div>
      </div>

<?php

if(isset($_POST['tambah'])){
    $sql1 = "insert into transaksi values ('{$_POST['id_trans']}','{$_POST['id_pelanggan']}','{$_POST['tanggal']}','{$_POST['total']}')";

     mysqli_query($conn, $sql1);
    
  
header ("location: data_transaksi.php");

/*$id_trans = $_POST['id_trans'];
$id_pelanggan = $_POST['id_pelanggan'];
$tanggal = $_POST['tanggal'];
$total = $_POST['total'];
 var_dump($id_trans, $id_pelanggan, $tanggal, $total); die();*/
} else {

}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
