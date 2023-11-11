<?php 
	
	if (isset($_POST['data_pelanggan'])) {
		echo (" <script>
					alert('Silakan Cetak Nota');
					document.location.href = 'nota.php';
				</script>");
	}
 ?>

<div class="modal fade" id="data_pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Input Data Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="nama_pelanggan" class="col-form-label">Nama Pelanggan</label>
							<input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="alamat" class="col-form-label">Alamat</label>
							<input type="text" name="alamat" class="form-control" id="alamat">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="nomor" class="col-form-label">No HP</label>
							<input type="number" name="nomor" class="form-control" id="nomor">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="email" class="col-form-label">Email</label>
							<input type="text" name="email" class="form-control" id="email">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success" name="data_pelanggan">Print Nota</button>
			</div>
		</div>
	</div>
</div>