<?php
    

    require '../function.php';
    // $dist = "SELECT distinct Name FROM table";
    $products = query("SELECT * FROM cetak");
    // $pelanggan2 = $pelanggan['id_pelanggan'];
    // $productss = query("SELECT * FROM keranjang inner join pelanggan on keranjang.id_pelanggan = pelanggan.id_pelanggan where keranjang.id_pelanggan = $pelanggan2 ");

    // $products= query("SELECT distinct keranjang.nama from keranjang, pelanggan where keranjang.id_pelanggan = pelanggan.id_pelanggan");

    if(isset($_SESSION['logout'])){ 
        $_SESSION =[];
        session_unset();
        session_destroy();
        header("Location : ../index.php");
        exit;
    }

    if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 

    

    if ( isset ($_POST["cari"])) {
        $product = cari($_POST["keyword"]);
    }

 ?>


                <main>
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
                                <div class="card-header ">
                                    <h4>Table Order</h4>
                                    
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Kategori</th>
                                                <th>jumlah</th>
                                                <th>harga</th>
                                                <th>ambil</th>
                                                <th></th>
                                        </thead>
                                        <tbody>
                                           <?php if (count($products) >0){ ?>
                                            <?php $i= 1 ?>
                                           <?php foreach ($products as $data) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['nama_pelanggan']; ?></td>
                                                <td><?= $data['kategori']; ?></td>
                                                <td><?= $data['jumlah']; ?></td>
                                                <td><?= $data['harga']; ?></td>
                                                <td><?= $data['tanggal_ambil'] ?></td>
                                                <td style="text-align: center;">
                                                    <!-- <a href="dashboard.php?page=order-detail&id_pelanggan="  class="btn btn-warning btn-sm">Detail</a>

                                                    <a href="confirm.php?id_pelanggan=" class="btn btn-success btn-sm">Confirm</a>
                                                 -->
                                                    <a href="hapus.php?id_cetak=<?= $data['id_cetak']?>"  class="btn btn-danger btn-sm ">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                           <?php } else {?>
                                            <tr>
                                                <td colspan="7" class="alert alert-danger">Daftar Cetak Kosong</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>