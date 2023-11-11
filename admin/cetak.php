<?php 
	include '../function.php';

	if (isset($_POST['submit'])) {

		if (tambah_cetak($_POST) > 0) {
            echo (" <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'dashboard.php?page=daftar_cetak';
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
		                                    <h5>Data Pelanggan</h5>
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
											      <label for="alamat">Alamat</label>
											      <input type="text" class="form-control" name="alamat">
											    </div>
											  </div>
											  <div class="form-row">
											    <!-- Default input -->
											    <div class="form-group col-md-6">
											      <label for="nomor">Nomor HP</label>
											      <input type="text" class="form-control" name="nomor">
											    </div>
											    <!-- Default input -->
											    <div class="form-group col-md-6">
											      <label for="email">Email</label>
											      <input type="text" class="form-control" name="email">
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
		                                    <h5>Data Cetak</h5>
		                                </div>
		                                <div class="card-body table-full-width" style="height: 420px">
											  <div class="form-row">
											    <div class="form-group col-md-6">
											      <label for="inputEmail4">Kategori</label>
											      <select name=kategori class="form-control" style="border-color: grey">
											      	<option value="" disabled selected style="background-color: lightgrey">Select</option>
												  	<option value="Sticker">Sticker</option>
												  	<option value="Spanduk">Spanduk</option>
												  	<option value="Nota">Nota</option>
												  	<option value="Kartu Nama">Kartu Nama</option>
												  	<option value="Undangan">Undangan</option>
												  </select>
											    </div>
											    <div class="form-group col-md-6">
											      <label for="jumlah">Jumlah</label>
											      <input type="text" class="form-control" name="jumlah">
											    </div>
											  </div>

											  <div class="form-group">
											    	<label for="harga">Harga</label>
											        <input type="text" class="form-control" name="harga">
											  </div>
											  <?php
												  $timezone = "Asia/Jakarta";
												  date_default_timezone_set($timezone);
												  $today = date("Y-m-d");
											  ?>
											  <div class="form-group">
											    	<label for="buat">Tanggal Buat</label>
											        <input type="date" value="<?php echo $today ?>" class="form-control" name="buat">
											  </div>

											  <div class="form-group">
											    	<label for="ambil">Tanggal Ambil</label>
											        <input type="date" class="form-control" name="ambil">
											  </div>

											    <div class="form-group">
				                                    <button type="submit" name="submit" class="btn btn-primary btn-sm form-control">Tambah</button>
				                                </div>
											  
		                                </div>
		                            </div>
		                    	</div>
	                    	</div>
                    	</form>
                    </div>
                </main>