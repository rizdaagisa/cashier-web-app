<?php
	include '../function.php';
	if (isset($_POST['submit'])) {
		if (tambah($_POST) > 0) {
echo (" <script>
alert('data berhasil ditambahkan');
document.location.href = 'dashboard.php?page=pembayaran';
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
if (!isset($_SESSION['keranjang']) || !isset($_SESSION['total'])) {
unset($_SESSION['keranjang']);
unset($_SESSION['total']);
}
?>

<main>
	<div class="container-fluid" style="padding-left: 25px">
		<h4>Pembayaran</h4>
		<form action="" method="post">
			<div class="row">
				<div class="col-md-5">
					<div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
						<div class="card-header ">
							<h5>List Barang</h5>
							
						</div>
						<div class="card-body table-full-width table-responsive">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Barang</button>
							<!-- Modal -->
							<form action="" method="post">
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Input Data Barang Baru</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label for="nama" class="col-form-label">Nama Barang</label>
															<input type="text" name="nama" class="form-control" id="nama">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="stock" class="col-form-label">Stock</label>
															<input type="text" name="stock" class="form-control" id="stock">
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="harga" class="col-form-label">Harga</label>
															<input type="text" name="harga" class="form-control" id="harga">
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
											</div>
										</div>
									</div>
								</div>
								<!-- <input type="text" placeholder="Cari barang" name="cari">
								<button class="btn-primary" type="submit" name="cari"><i class="fas fa-search"></i></button> -->
							</form>
							<br>
							<table class="table table-hover table-striped"><br>
								<colgroup>
								<col span="1" style="width: 5%;">
								<col span="1" style="width: 25%;">
								<col span="1" style="width: 1%;">
								<col span="1" style="width: 10%;">
								<col span="1" style="width: 30%;">
								</colgroup>
								<thead>
									<th>No</th>
									<th>Nama</th>
									<th>stock</th>
									<th>Harga</th>
									<th></th>
								</thead>
								<tbody>
									
									
									<?php $products = query("SELECT * from barang") ?>
									<?php if (isset($_POST['cari'])) {
										$products = cari($_POST['cari']);
									} ?>
									<?php $i=1; foreach ($products as $product) : ?>
									<tr>
										<td><?= $i; ?></td>
										<td><?= $product['nama_barang'] ?></td>
										<td><?= $product['stock'] ?></td>
										<td><?= $product['harga'] ?></td>
										<td>
											<form>
												
												<a href="tambah_keranjang.php?id_product=<?= $product['id_barang'] ?>&kategori=perbuah"  class="btn btn-info btn-sm"><i class="fas fa-plus" style="font-size: 10px"></i> tambah</a>
												
											</form>
										</td>
									</tr>
									<?php $i++; endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
						<div class="card-header ">
							<h5>Daftar Belanjaan</h5>
						</div>
						<div class="card-body table-full-width table-responsive">
							<div class="row">
								<div class="col-sm-1half" style="width: 13%;">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#data_pelanggan"><i class="fas fa-receipt"></i> Bayar</button>
									<form action="nota.php" method="post">
										<?php include './print.php'; ?>
									</form>
								</div>
								<div class="col-sm-2half" style="margin-left: -10px; width: 16%;">
									<a href="delete_all.php" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete All</a>
								</div>
								
								<div class="col-sm-3" style="width: 20%;">
									<B>Total barang: </B><?php if (isset($_SESSION['keranjang']) && isset($_SESSION['keranjang'])) {
										echo(count($_SESSION['keranjang']));
									} else {
										echo 0;
									} ?>
								</div>
			                                	<div class="col-sm-4half">
			                                			<b>Total Belanjaan: </b><?php if (isset($_SESSION['keranjang']) && $_SESSION['total'] != 0 ) {
									                       echo "Rp ". number_format($_SESSION['total']);
									                   	} else {
									                         echo 0 ;
									                    } ?>
			                                	</div>
								
							</div>
							
							<br>
							<table class="table">
								<colgroup>
								<col span="1" style="width: 10%;">
								<col span="1" style="width: 20%;">
								<col span="1" style="width: 15%;">
								<col span="1" style="width: 10%;">
								<col span="1" style="width: 10%;">
								<col span="1" style="width: 10%;">
								</colgroup>
								<thead>
									<th>No</th>
									<th>Nama</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Total</th>
									<th></th>
									<th style="margin-left: 0px"></th>
								</thead>
								<tbody>
									<?php if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0) { ?>
									<?php $i=0;
									$_SESSION['total'] = 0;
									?>
									<?php foreach ($_SESSION['keranjang'] as $id_product_keranjang => $jumlah) :?>
									
									<?php $products = query("SELECT * FROM barang where id_barang = $id_product_keranjang")[0];
										$total = $products['harga']*$jumlah;
										$_SESSION['total'] += $total;
									$i++ ?>
									<tr>
										
										<td><?= $i; ?></td>
										<td><?= $products['nama_barang'] ?></td>
										<td><?= $jumlah ?></td>
										<td><?= $products['harga'] ?></td>
										<td><?= $total ?></td>
										<td></td>
										<td>
											<a href="update.php?id_product=<?= $products['id_barang']?>&action=tambah"  class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
											<a href="update.php?id_product=<?= $products['id_barang']?>&action=kurang"  class="btn btn-warning btn-sm"><i class="fas fa-minus"></i></a>
											<a href="update.php?id_product=<?= $products['id_barang']?>&action=hapus&jumlah=<?= $jumlah ?>"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
									
									<?php endforeach;  ?>
									<?php } else { ?>
									<tr style="margin-top: 10px;">
										<td colspan="10" style="margin-top: 10px;" class="alert alert-danger">Tidak Ada Daftar Belanjaan</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</main>