<?php 
	include '../function.php';
	
	if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 
	
	$id_pelanggan = $_GET['id_pelanggan'];
	$product = query("SELECT * FROM product inner join keranjang on product.id_product = keranjang.id_product where id_pelanggan = $id_pelanggan");

	
	// $product= query("SELECT * from keranjang WHERE id_pelanggan = $id_pelanggan");
	$data_pelanggan = query("SELECT * FROM pelanggan where id_pelanggan =  $id_pelanggan")[0];
	
 ?>
<div class="container">
	<main>
		<div class="row">

		    <div class="col-lg-8">
			    <div class="card wish-list mb-3">
			        <div class="card-body">

			          <h5 class="mb-4" ><strong>Daftar belanjaan</strong></h5>

			          <?php $jumlah = 0; $total= 0;  ?>
			          <!-- BATAS AWAL BARANG -->
			          	<?php foreach ($product as $products) { 
			          		$id_product = $products['id_product'];
			          		$gambar_product = query("SELECT *  FROM product where id_product =  $id_product")[0];
			          		$jumlah += $products['banyak_product'];

			          		?>
			          	
			          
				           <div class="row mb-4">
				              <div class="col-md-5 col-lg-3 col-xl-3">
				                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
				                  <img class="img-fluid w-100"
				                    src="../img/<?= $gambar_product['gambar'] ?>" alt="Sample">
				                  <a href="#!">
				                    
				                  </a>
				                </div>
				              </div>
				              <div class="col-md-7 col-lg-9 col-xl-9">
				                <div>
				                  <div class="d-flex justify-content-between">
				                    <div>
				                      <h5><?= $products['nama_product'] ?></h5>
				                      <p class="mb-2 text-muted text-uppercase small">Kategori <?= $products['kategori'] ?></p>
				                      <p class="mb-2 text-muted text-uppercase small">Berat <?= $products['berat'] ?> /kg</p>
				                      <p class="mb-2 text-muted text-uppercase small">Stock <?= $products['stock'] ?></p>
				                    </div>
				                    <form action="" method="post">
				                      <div>
				                          <!-- <h6 style="margin-left: 10px; margin-right: 10px;">Banyak Barang </h6>
				                          <h5 style="margin-left: 10px; margin-right: 10px; text-align: center;"> <?= $products['banyak_product']; ?> </h5> -->
				                          
				                        
				                      </div>
				                    </form>
				                  </div>
				                  <div class="d-flex justify-content-end align-items-right" >
				                    
				                      
				                      <span style="color: grey; margin-right: 20px;"><?= $products['banyak_product'] ?> x <?= number_format($products['harga']) ?></span>
				                    
				                  </div>
				                  <hr>

				                  <div class="d-flex justify-content-end align-items-right" >
				                    <p class="mb-0">
				                      <div class="row">
				                        <div class="col-xs-8">
				                          
				                        </div>
				                      </div>
				                      <span></span>
				                      <span>Jumlah : <strongs style="color: red; margin-right: 20px;"> Rp.<?= number_format($products['banyak_product']*$products['harga'] ) ?></strong></span>
				                    </p>
				                  </div>

				                </div>
				              </div>
				           </div>
				           <hr class="mb-4">
			          <!-- BATAS AKHIR baranng -->
			          	<?php $total+= $products['banyak_product']*$products['harga'] ?>
			      		<?php  } ?>
			        </div>
			    </div>
		    </div>

	    	<div class="col-lg-4">
		    	<div class="row-lg-4">
		    		
		    		<div class="card mb-3">
				        <div class="card-body">

				          <h5 class="mb-3" style="text-align: center;"><strong>Detail Pembeli</strong></h5><hr>

				          <ul class="list-group list-group-flush">
				            <li class=" d-flex justify-content-between align-items-center border-0 px-0 pb-0" style="color: red;">
				              Nama   :
				              <span style="color: black;"><?= $data_pelanggan['nama']; ?></span>
				            </li>
				            <li class="d-flex justify-content-between align-items-center border-0 px-0" style="color: red;">
				              alamat :
				              <span style="color: black;"><?= $data_pelanggan['alamat']; ?></span>
				            </li>
				             </li>
				            <li class="d-flex justify-content-between align-items-center border-0 px-0" style="color: red;">
				              No HP	 :
				              <span style="color: black;"><?= $data_pelanggan['nomor']; ?></span>
				            </li>

				            <li class="d-flex justify-content-between align-items-center border-0" style="color: red;">
				              Email :
				              <span style="color: black;"><?= $data_pelanggan['email']; ?></span>
				            </li>

				            
				            	<table class="table table-hover table-striped">
				            		<thead>
				            			<th>Kecamatan</th>
				            			<th>Kelurahan</th>
				            			<th>Kota</th>
				            		</thead>
				            		<tbody>
				            			<td><?= $data_pelanggan['kecamatan']; ?></td>
				            			<td><?= $data_pelanggan['kelurahan']; ?></td>
				            			<td><?= $data_pelanggan['kota']; ?></td>
				            		</tbody>
				            	</table>
				            
				            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
				              <div>
				                Tanggal Pembelian
				              </div>
				              
				              <span><strong style="color: blue"><?= $data_pelanggan['waktu']; ?></strong></span>
				            </li>
				          </ul>

				          <!-- <button type="button" class="btn btn-primary btn-block waves-effect waves-light">go to checkout</button> -->
				    	</div>
		    		</div>

			    	<div class="card mb-3">
				        <div class="card-body">

				          <h5 class="mb-3"><strong>Total Pembelian</strong></h5><hr>

				          <ul class="list-group list-group-flush">
				            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
				              Jumlah harga
				              <span><?= number_format($total)  ?></span>
				            </li>
				            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
				              Ongkir
				              <span><?= number_format($data_pelanggan['ongkir']); ?></span>
				            </li>
				            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
				              <div>
				                <strong>Harga Total :</strong>
				                
				              </div>
				              
				              <span><strong>Rp.<?= number_format($total+$data_pelanggan['ongkir']); ?></strong></span>
				            </li>
				          </ul>

				          <a href="dashboard.php?page=order" type="button" class="btn btn-primary btn-block " style="background-color: blue; color: white;">kembali</a>
				    	</div>
			    	</div>
		    	</div>
		    </div>

		</div>
	</main>
</div>