<?php 
	include '../function.php';

	if (isset($_POST['submit'])) {

		if (tambah($_POST) > 0) {
            echo (" <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'dashboard.php?page=product';
                </script>");
        } else {
            echo (" <script>
                    alert('data gagal ditambahkan silakan masukan data ulang');
                </script>");
            echo($conn -> error);
        }
	}

	if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 

 ?>

                <main>
                    <div class="container-fluid">
                    	<h4>Input Product</h4>

                    	<form action="" method="post" enctype="multipart/form-data">
	                    	<div class="row">
		                    	<div class="col-md-7">
		                    		<div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
		                                <div class="card-header ">
		                                    
		                                </div>
		                                <div class="card-body table-full-width table-responsive">
											  <!-- Grid row -->
											  <div class="form-row">
											    <!-- Default input -->
											    <div class="form-group col-md-6">
											      <label for="nama">Nama</label>
											      <input type="text" class="form-control" name="nama">
											    </div>
											    <!-- Default input -->
											    <div class="form-group col-md-6">
											      <label for="kondisi">stock</label>
											      <input type="text" class="form-control" name="stock">
											    </div>
											  </div>
											  <!-- Grid row -->

											  <!-- Default input -->
											  <div class="form-group">
											    <label for="description">Description</label>
	                                    			<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:160px "></textarea>
											  </div>
		                                </div>
		                            </div>
		                    	</div>

		                    	<div class="col-md-5">
		                    		<div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
		                                <div class="card-header ">
		                                    
		                                </div>
		                                <div class="card-body table-full-width table-responsive">
											  <div class="form-row">
											    <div class="form-group col-md-6">
											      <label for="inputEmail4">Kategori</label>
											      <input type="text" class="form-control" name="kategori">
											    </div>
											    <div class="form-group col-md-6">
											      <label for="berat">Berat</label>
											      <input type="text" class="form-control" name="berat">
											    </div>
											  </div>

											  <div class="form-row">
											    	<label for="harga">Harga</label>
											        <input type="text" class="form-control" name="harga">
											  </div>

											  <div class="form-row">
											    <div class="form-group ">
				                                    <label for="gambar">Upload Foto Produk</label><br>
				                                    <input type="file" name="gambar" class="form-control" required="">
				                                </div>
											  </div>

											  <div class="form-row col-md-6">
											    <div class="form-group">
				                                    <button type="submit" name="submit" class="btn btn-primary btn-md form-control">Tambah</button>
				                                </div>
											  </div>
											  
		                                </div>
		                            </div>
		                    	</div>
	                    	</div>
                    	</form>
                    </div>
                </main>