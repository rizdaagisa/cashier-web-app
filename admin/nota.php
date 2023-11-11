<?php
session_start();
Include '../function.php';
$data = query("SELECT * from admin")[0];

if (isset($_POST['back'])) {
    unset($_SESSION['keranjang']);
    unset($_SESSION['total']);
    echo("<script>
    document.location.href = 'dashboard.php?page=pembayaran';
    </script>");
} else {
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">
        <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/svg-with-js.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/svg-with-js.css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style type="text/css">
        
        table {
        border: none;
        }
        .table > thead > tr {
        border-bottom: 2px solid;
        border-top: 2px solid;
        }
        .invoice-title h2, .invoice-title h3 {
        display: inline-block;
        }
        .table > tbody > tr > .no-line {
        border-top: none;
        }
        
        .table > tbody > tr > .thick-line {
        border-top: 2px solid;
        }
        .container {
        border-width:1px;
        border-style:solid;
        border-color: lightgrey;
        }
        </style>
    </head>
    <body>
        
        <div style="margin-top: -50px; margin-left: 20px; position: absolute;">
            <form action="" method="post">
                <button name="back" type="submit" value="back"><<< KEMBALI</button>
            </form>
        </div>
        <div class="container border border-primary" style="margin-top: 75px; margin-bottom: 75px;">
            <div class="row" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-left" style="margin-left: 15px;">
                            <i class="fas fa-store"> </i> <?= $data['nama_admin'] ?>
                            <i class="fas fa-map-marker-alt" style="margin-left: 15px;"> </i> <?= $data['alamat'] ?>
                        </p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-right" style="margin-right: 15px;">
                            
                            <i class="fas fa-envelope"> </i>   <?= $data['email'] ?>
                            <i class="fas fa-phone-alt" style="margin-left: 10px;"></i> <?= $data['nomor'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="invoice-title" style="text-align: center;">
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <?php
                                $timezone = "Asia/Jakarta";
                                date_default_timezone_set($timezone);
                                $today = date("d-m-Y");
                                ?>
                                <strong>Tanggal:</strong> <?= $today ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <strong><h2><u>INVOICE</u></h2></strong>
                            </div>
                        </div>
                        
                    </div><br>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Nama Pelanggan:</strong> <?= $_POST['nama_pelanggan'] ?>
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Nomor HP:</strong> <?= $_POST['nomor'] ?>
                            </address>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Alamat:</strong> <?= $_POST['alamat'] ?>
                            </address>
                        </div>
                        
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Email:</strong> <?= $_POST['email'] ?>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table" style="border: none">
                <col style="width:10%">
                <col style="width:35%">
                <col style="width:10%">
                <col style="width:15%">
                <col style="width:25%">
                <thead>
                    <tr>
                        <td class="thick-line" style="border-bottom: 2px solid;"><strong>No</strong></td>
                        <td class="thick-line"><strong>Nama Barang</strong></td>
                        <td class="text-center thick-line"><strong>Harga</strong></td>
                        <td class="text-center thick-line"><strong>Jumlah</strong></td>
                        <td class="text-right thick-line"><strong>Total</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $harga_total = 0;
                    $jumlah_total = 0;
                    pelanggan($_POST);
                    $id_pelanggan = query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC LIMIT 1;")[0];
                    
                    ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_product_keranjang => $jumlah) :?>
                    <!-- ======================================== -->
                    <?php
                    
                    $products = query("SELECT * FROM barang where id_barang = $id_product_keranjang")[0];
                    // $harga_total = $_SESSION['total'];
                    $nama_barang = $products["nama_barang"];
                    $harga = $products["harga"];
                    $total = $products['harga']*$jumlah;
                    $harga_total += $total;
                    $jumlah_total += $jumlah;
                    $_SESSION['total'] += $total;
                    $i++;
                    // =========================================================
                    $id_pelanggans = $id_pelanggan['id_pelanggan'];
                    $id_barang = $products['id_barang'];
                    $query = "INSERT INTO nota VALUES('','$id_pelanggans','$id_barang', '$nama_barang', '$harga','$jumlah')";
                    mysqli_query($conn, $query);
                    // ============================================================
                    ?>
                    <tr>
                        <td class="no-line"><?= $i; ?></td>
                        <td class="no-line"><?= $products['nama_barang'] ?></td>
                        <td class="text-center no-line"><?= number_format($products['harga']) ?></td>
                        <td class="text-center no-line"><?= $jumlah ?></td>
                        <td class="text-right no-line"><?= number_format($total) ?></td>
                    </tr>
                    <!-- ========================================================================== -->
                    <?php endforeach;
                    update_product($id_pelanggans);
                    ?>
                    <?php if ($jumlah_total < 3): ?>
                    <tr>
                        <td class="no-line" colspan="5"></td>
                    </tr>
                    <tr>
                        <td class="no-line" colspan="5"></td>
                    </tr>
                    <tr>
                        <td class="no-line" colspan="5"></td>
                    </tr>
                    <?php endif ?>
                    <tr>
                        <td class="no-line text-right" colspan="5">+</td>
                    </tr>
                    <tr>
                        <td class="no-line thick-line" colspan="3"></td>
                        <td class="no-line thick-line text-center" style="border-bottom: 1px solid"><strong>Total Belanja :</strong></td>
                        <td class="no-line thick-line text-right" style="border-bottom: 1px solid">Rp. <?= number_format($harga_total) ?></td>
                    </tr>
                </tbody>
            </table><br>
            <div class="row" style="margin-bottom: 100px; margin-top: 50px;">
                <div class="col-xs-6 text-center">
                    <strong>Yang Menerima,</strong>
                </div>
                <div class="col-xs-6 text-center">
                    <strong>Hormat Kami,</strong>
                </div>
            </div>
            <div class="row" style="margin-bottom: 100px;">
                <div class="col-xs-6 text-center">
                    <strong>_________________</strong>
                </div>
                <div class="col-xs-6 text-center">
                    <strong>_________________</strong>
                </div>
            </div>
        </div>
    </body>
</html>
<?php

} ?>