<?php
    


    require '../function.php';
    // $dist = "SELECT distinct Name FROM table";
    // $products = query("SELECT * FROM pelanggan");
    $datas = query("SELECT * FROM transaction
    JOIN pelanggan 
    ON transaction.id_pelanggan = pelanggan.id_pelanggan");
    // $pelanggan2 = $pelanggan['id_pelanggan'];
    // $productss = query("SELECT * FROM keranjang inner join pelanggan on keranjang.id_pelanggan = pelanggan.id_pelanggan where keranjang.id_pelanggan = $pelanggan2 ");

    // $products= query("SELECT distinct keranjang.nama from keranjang, pelanggan where keranjang.id_pelanggan = pelanggan.id_pelanggan");

    if(isset($_SESSION['logout'])){ 
        $_SESSION =[];
        session_unset();
        session_destroy();
        header("Location : index.php");
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
                                                <th>Alamat</th>
                                                <th>Nomor HP</th>
                                                <th>Email</th>
                                                <th>tanggal</th>
                                                <th></th>
                                                <th></th>
                                        </thead>
                                        <tbody>
                                           <?php $i=1; ?>
                                           <?php foreach ($datas as $data) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['nama_pelanggan']; ?></td>
                                                <td><?= $data['alamat']; ?></td>
                                                <td><?= $data['nomor']; ?></td>
                                                <td><?= $data['email']; ?></td>
                                                <td><?= $data['tanggal']; ?></td>
                                                
                                                <td style="text-align: center;">
                                                <form method="post" action="nota.php">
                                                    <input type="text" hidden="" name="nama_pelanggan" value="<?= $data['nama_pelanggan']?>">
                                                    <input type="text" hidden="" name="nomor" value="<?= $data['nomor']?>">
                                                    <input type="text" hidden="" name="email" value="<?= $data['email']?>">
                                                    <input type="text" hidden="" name="alamat" value="<?= $data['alamat']?>">
                                                    <a href="detail_nota.php?id_invoice=<?= $data['id_transaction'] ?>&id_pelanggan=<?= $data['id_pelanggan'] ?>" name="detail" class="btn btn-success btn-sm ">Detail</a>
                                                </form>
                                                </td>
                                                <td><a href="hapus.php?id_pelanggan=<?= $data['id_transaction']; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>