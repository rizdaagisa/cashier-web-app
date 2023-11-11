<?php 
$body ='<!DOCTYPE html>
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
    <div class="container border border-primary" style="margin-top: 75px; margin-bottom: 75px;">
            <div class="row" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-left" style="margin-left: 15px;">
                                                    <i class="fas fa-store"> </i>'; $body .= $data['nama_admin'] .= '<i class="fas fa-map-marker-alt" style="margin-left: 15px;"> </i>'; $body .= $data['alamat'] .=
                        '</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-right" style="margin-right: 15px;">                        
                            <i class="fas fa-envelope"> </i>'; $body .= $data['email'];  $body .= '
                            <i class="fas fa-phone-alt" style="margin-left: 10px;"></i>'; $body .= $data['nomor'];
                        $body .= '</p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="invoice-title" style="text-align: center;">
                        <div class="row">
                            <div class="col-xs-12 text-right">';
                                $timezone = "Asia/Jakarta";
                                date_default_timezone_set($timezone);
                                $today = date("d-m-Y");
                                $body.='<strong>Tanggal:</strong> '; $body .= $today;
                            $body .= '</div>
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
                                <strong>Nama Pelanggan:</strong>'; $body .= $_POST['nama_pelanggan'];
                            $body .= '</address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Nomor HP:</strong>'; $body .= $_POST['nomor'];
                    $body.='</address>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Alamat:</strong>'; $body.=$_POST['alamat'];
                    $body.='</address>
                        </div>
                        
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Email:</strong>'; $body .= $_POST['email']; 
                            $body .='</address>
                        </div>
                    </div>
                </div>
            </div>';
    $body.='<table class="table" style="border: none;">
                <col style="width:10%">
                <thead>
                    <tr>
                        <td class="thick-line" style="border-bottom: 2px solid;"><strong>No</strong></td>
                        <td class="thick-line"><strong>Nama Barang</strong></td>
                        <td class="text-center thick-line"><strong>Harga</strong></td>
                        <td class="text-center thick-line"><strong>Jumlah</strong></td>
                        <td class="text-right thick-line"><strong>Total</strong></td>
                    </tr>
                </thead>
                <tbody>';
                    $i = 0; $harga_total = 0;
                    foreach ($_SESSION['keranjang'] as $id_product_keranjang => $jumlah) {
                    $products = query("SELECT * FROM barang where id_barang = $id_product_keranjang")[0];
                    $total = $products['harga']*$jumlah;
                    $harga_total += $total; 
                    $_SESSION['total'] += $total;
                    $i++;
         $body .= '<tr>
                        <td class="no-line">'; $body .= $i; $body .='</td>
                        <td class="no-line">'; $body .= $products['nama_barang']; $body.='</td>
                        <td class="text-center no-line">'; $body .= number_format($products['harga']); '</td>
                        <td class="text-center no-line">'; $body .= $jumlah ; $body .= '</td>
                        <td class="text-right no-line">'; $body .=  number_format($total); $body .='</td>
                    </tr>';
                    }
                    if (count($_SESSION['keranjang']) < 3){
                    $body .= '<tr>
                        <td class="no-line" colspan="5"></td>
                    </tr>
                    <tr>
                        <td class="no-line" colspan="5"></td>
                    </tr>
                    <tr>
                        <td class="no-line" colspan="5"></td>
                    </tr>';
                    }
                    $body .='<tr>
                        <td class="no-line text-right" colspan="5">+</td>
                    </tr>
                    <tr>
                        <td class="no-line thick-line" colspan="3">
                        </td>
                        
                        <td class="no-line thick-line text-center" style="border-bottom: 1px solid"><strong>Total Belanja :</strong></td>
                        <td class="no-line thick-line text-right" style="border-bottom: 1px solid">Rp.'; $body .=number_format($harga_total); $body.='</td>
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
</html>';

// require_once __DIR__ . '/vendor/autoload.php';
// // Create an instance of the class:
// $mpdf = new \Mpdf\Mpdf();
// // Write some HTML code:
// $mpdf->WriteHTML($body);

// // Output a PDF file directly to the browser
// $mpdf->Output('demo.pdf','D');
require 'vendor/autoload.php';
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($body);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('rizdaa.pdf');
?>