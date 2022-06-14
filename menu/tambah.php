<?php
require_once('../koneksi/config.php');
$trans      = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN pelanggan INNER JOIN barang");
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

    <title>Dashboard</title>
    </head>
    <body>
        <br>
         <a href="data.php" type="button" class="btn btn-primary m-3">Lihat Semua Data</a>
         <h5 class="card-header" style="text-align: center!important;">Tambah Data</h5>
            <div class="card-body d-flex justify-content-center ">
            <div class="w-50 border p-3 mt-3">
			<!-- form -->
			<form action=" " method="POST">
				<div class="mb-3">
				   <label for="exampleInputPassword1" class="form-label"> Nota</label>
				   <input type="text" class="form-control" id="nota" name="nota">
				</div>
				<div class="mb-3">
			             <label for="exampleInputPassword1" class="form-label">Pelanggan</label>
			             <select class="form-select" id="pelanggan" aria-label="Floating label select example" name="id_pelanggan" onkeyup="pelanggan()">
			                <option selected>---------Pilih-----------</option>
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
			  <!--   </div>
			    <div class="mb-3">
						   <label for="exampleInputPassword1" class="form-label">Nama Pelanggan</label>
						   <input type="text" class="form-control" id="nama" name="nama" disabled>
			    </div>
				<div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label">Alamat </label>
					    <input type="text" class="form-control" id="alamat" name="alamat" disabled>
				</div>
				<div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label">Telepon</label>
					    <input type="text" class="form-control" id="telp" name="telp" disabled>
			    </div> -->
				 <div class="mb-3">
			             <label for="exampleInputPassword1" class="form-label">Barang</label>
			             <select class="form-select" id="barang" aria-label="Floating label select example" name="id_barang" onkeyup="barang()">
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
			  <!--    <div class="mb-3">
						   <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
						   <input type="text" class="form-control" id="exampleInputPassword1" name="nama_barang" disabled>
			    </div>
				<div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label">Harga</label>
					    <input type="text" class="form-control" id="exampleInputPassword1" name="harga" disabled>
				</div>
				<div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label">Stok</label>
					    <input type="text" class="form-control" id="exampleInputPassword1" name="stok" disabled>
			    </div> -->
				 <div class="mb-3">
			             <label for="exampleInputPassword1" class="form-label">Transaksi</label>
			             <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_trans">
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
			   <!--  <div class="mb-3">
				  <label for="exampleInputPassword1" class="form-label">Tanggal</label>
				  <input type="text" class="form-control" id="exampleInputPassword1" name="tanggal" disabled>
				</div> -->
				 <div class="mb-3">
				  <label for="exampleInputPassword1" class="form-label">Total</label>
				  <input type="text" class="form-control" id="exampleInputPassword1" name="total" >
				</div>
					<button class="btn btn-primary" name="tambah">Simpan Data</button>
			</form>
			</div>
			 </div>
			</div>
			</div>
			</div>



<?php

if(isset($_POST['tambah'])){

$nota = $_POST['nota'];
$id_barang = $_POST['id_barang'];
$id_pelanggan = $_POST['id_pelanggan'];
$id_trans = $_POST['id_trans'];
$total = $_POST['total'];
    $sql = "INSERT INTO detail VALUES ('$nota','$id_pelanggan', 'null', 'null', 'null', '$id_barang', 'null', 'null', 'null', '$total', '$id_trans', 'null', 'null')";
     mysqli_query($conn, $sql);

 echo "<script>alert('Data Berhasil di Tambahkan');history.go(-2);</script>";

/* var_dump($nota, $id_barang, $id_pelanggan, $id_trans, $total); die();*/
} else {

}

?>

</body>
</html>