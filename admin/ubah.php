<?php 


include '../function.php';

$id_product = $_GET["id_barang"];

$product = query("SELECT * FROM barang WHERE id_barang = $id_product")[0];




if (isset($_POST["submit"])) {
    
        if (ubah($_POST) > 0) {
            echo (" <script>
                    alert('data berhasil diubah');
                    document.location.href = 'dashboard.php?page=product';
                </script>");
        } else {
            echo (" <script>
                    alert('data gagal diubah, silakan masukan data ulang');
                </script>");
            echo($conn -> error);
        }

    }
if (isset($_POST['close'])) {
  
}
 ?>

 <main>
    
                <div class="modala fades" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="" method="post">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.location.href = 'dashboard.php?page=product';">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="nama" class="col-form-label">Nama Barang</label>
                              <input type="text" name="nama" class="form-control" id="nama" value="<?= $product['nama_barang'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="stock" class="col-form-label">Stock</label>
                              <input type="text" name="stock" class="form-control" id="stock" value="<?= $product['stock'] ?>">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="harga" class="col-form-label">Harga</label>
                              <input type="text" name="harga" class="form-control" id="harga" value="<?= $product['harga'] ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input type="text" name="id_barang" hidden="" value="<?= $product['id_barang'] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close" onclick="document.location.href = 'dashboard.php?page=product';">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                </main>
