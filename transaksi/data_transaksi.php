<?php 
require_once('../koneksi/config.php');
session_start();
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Transaksi</title>
  </head>
  <body>

<!--   	navigasi -->
		   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  		<div class="container-fluid">
				    <a class="navbar-brand" href="../menu/data.php">Dashboard</a>
				    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				      <span class="navbar-toggler-icon"></span>
				    </button>
		    	<div class="collapse navbar-collapse" id="navbarNav">
				      <ul class="navbar-nav">
				        <li class="nav-item">
				          <a class="nav-link active" aria-current="page" href="../pelanggan/data_pelanggan.php">Pelanggan</a>
				        </li>
				        <li class="nav-item">
			            <a class="nav-link active" aria-current="page" href="#">Transaksi</a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link active" aria-current="page" href="../barang/data_barang.php">Barang</a>
			          </li>
				      </ul>
		   		 </div>
		 		 </div>
			</nav>
<!-- tabel  -->
			<div class="container">
			<div class="card mt-5">
			  <h5 class="card-header">Tabel Data Transaksi</h5>
			  <div class="card-body">
							    <table class="table table-striped table-hover ">
							  <thead>
							    <tr>
							    	<th scope="col">No </th>
							      <th scope="col">ID Transaksi</th>
							      <th scope="col">ID Pelanggan</th>
							      <th scope="col">Tanggal</th>
							      <th scope="col">Total</th>
							      <th scope="col">Aksi</th>
							      <th scope="col">Detail</th>
							    </tr>
							  </thead>
							  <?php
					       require_once('../koneksi/config.php');
					        $no = 1;
					        $query = mysqli_query($conn, 'SELECT * FROM transaksi');
					        while ($data = mysqli_fetch_array($query)) {
					        	?>
								  <tbody>
								     <tr>
			                <td><?php echo $no++ ?></td>
			                <td><?php echo $data['id_trans'] ?></td>
			                <td><?php echo $data['id_pelanggan'] ?></td>
			                <td><?php echo $data['tanggal'] ?></td>
			                <td><?php echo $data['total'] ?></td>
								      <td>
									 <a href="edit_transaksi.php?id_trans=<?=$data['id_trans']?>" type="button" class="btn btn-success btn-md">Edit</a>

									 <a href="hapus.php?id_trans=<?=$data['id_trans']?>" type="button" class="btn btn-success btn-md">Hapus</a>
								      </td>
								      <td>
								      	<a href="detail.php?id_trans=<?=$data['id_trans']?>" type="button" class="btn btn-primary">DETAIL</a>
								      </td>
								    </tr>
								  </tbody>
											<?php } ?>
									</table> 
			
         </div>
			  </div>
			  <div>
							            <a class="btn btn-primary m-3" href="form_tambah.php" role="button">Tambahkan Data</a>
			</div>
			</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
  </body>
  </html>