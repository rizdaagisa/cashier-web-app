<?php

require '../function.php';

$product = query("SELECT * FROM barang");
if(isset($_SESSION['logout'])){
$_SESSION =[];
session_unset();
session_destroy();
header("Location : index.php");
exit;
}
$aa= 0;
$bb= 0;
$cc= 0;
function updates($a,$b,$c){
    global $aa,$bb,$cc;
    $aa = $a;
    $bb = $b;
    $cc = $c;
}
?>
<script type="text/javascript">
    function updates(){

    }
</script>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
                    <div class="card-header ">
                        <h4>Table Product</h4>
                        
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <col style="width:10%">
                            <col style="width:35%">
                            <col style="width:10%">
                            <col style="width:20%">
                            <col style="width:15%">
                            <col style="width:15%">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>stock</th>
                                <th>Harga</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                

                                 ?>
                                <?php foreach ($product as $data) : ?>
                                <?php $nama= $data['nama_barang']; ?>
                                <tr>
                                    
                                    <td><?= $i ?></td>
                                    <td><?= $data['nama_barang'] ?></td>
                                    <td><?= $data['stock'] ?></td>
                                    <td><?= $data['harga'] ?></td>
                                    <td>
                                        <a class="btn btn-success btn-md" href="dashboard.php?id_barang=<?= $data['id_barang'] ?>&page=ubah">Update</a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="hapus.php?id_product=<?= $data['id_barang'] ?>"  class="btn btn-danger ">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
