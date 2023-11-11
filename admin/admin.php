<?php 
	include '../function.php';
	$data = query("SELECT * FROM admin")[0];

	if (isset($_POST['update'])) {
		$id_admin = $_POST['id_admin'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$nomor = $_POST['nomor'];
		$email = $_POST['email'];

		//cek apakah user ganti gambar baru atau tidak
		$query = "UPDATE admin SET 
					nama_admin = '$nama',
					alamat = '$alamat',
					nomor = '$nomor',
					email = '$email'
				  WHERE id_admin = $id_admin
				";
		mysqli_query($conn, $query);
		$hasil = mysqli_affected_rows($conn);
		if ($hasil > 0) {
            echo (" <script>
                    alert('data berhasil diubah');
                    document.location.href = 'dashboard.php?page=admin';
                </script>");
        } else {
            echo (" <script>
                    alert('data gagal diubah, silakan masukan data ulang');
                </script>");
            echo($conn -> error);
        }
	}

 ?>
                <main>
                    <div class="container-fluid">

                    	<div class="row">
	                    	<div class="col-md-8">
	                    		<div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
	                                <div class="card-header ">
	                                    <strong>Edit Profile</strong>
	                                </div>
	                                <div class="card-body table-full-width table-responsive" style="margin-bottom: 35px;">
										<form action="" method="POST">
										  <!-- Grid row -->
										  <div class="form-row">
										    <!-- Default input -->
										    <div class="form-group col-md-6">
										      <label for="nama">Nama Toko</label>
										      <input type="text" class="form-control" name="nama" value="<?= $data['nama_admin'] ?>">
										    </div>
										    <!-- Default input -->
										    <div class="form-group col-md-6">
										      <label for="alamat">Alamat</label>
										      <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
										    </div>
										  </div>

										  <div class="form-row">
										    <!-- Default input -->
										    <div class="form-group col-md-6">
										      <label for="nomor">No HP</label>
										      <input type="text" class="form-control" name="nomor" value="<?= $data['nomor'] ?>">
										    </div>
										    <!-- Default input -->
										    <div class="form-group col-md-6">
										      <label for="email">Email</label>
										      <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>">
										    </div>
										  </div>
										  <!-- Grid row -->

										  <!-- Default input -->
										  
										  <div class="form-row">
										  	<div class="form-group col-md-6">
										  		<input hidden="" type="text" name="id_admin" value="<?= $data['id_admin'] ?>">
										  		<button class="btn btn-primary" type="submit" name="update">Update</button>
										  	</div>
										  </div>
										</form>
	                                </div>
	                            </div>
	                    	</div>

	                    	<div class="col-md-4">	                    		
	                    			<div class="card card-user strpied-tabled-with-hover" style="margin-top: 15px;">
                                		<div class="card-image" style="background-color: white;">
                                    		
                                		</div>
		                                <div class="card-body">

		                                    <div class="author">
		                                    	
		                                        <a href="../icon.png">
		                                            <img class="avatar border-gray" src="./icon.png" alt="...">
		                                            
		                                            
		                                        </a><hr>
		                                        <h5 class="title"><?= $data['nama_admin'] ?></h5>
		                                        <p class="description" style="margin-top: 2px;">
		                                            <i class="fas fa-map-marker-alt"></i> <?= $data['alamat'] ?>
		                                            <br><i class="fas fa-envelope"></i> <?= $data['email'] ?>
		                                            <br><i class="fas fa-phone-alt"></i> <?= $data['nomor'] ?>	
		                                        </p>
		                                        
		                                    </div>
		                                    
		                                    
		                                    <hr><br>
		                                    
		                                </div>
		                            </div>
	                            
	                    	</div>
                    	</div>
                    </div>
                </main>