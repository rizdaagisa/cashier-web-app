<?php 
  include '../function.php';
  session_start();
  if (isset($_GET['kategori'])) {
    $id_product= $_GET['id_product'];
    $kategori = $_GET['kategori'];
    $product = query("SELECT harga,stock FROM barang where id_barang = $id_product")[0];
    $stock = $product['stock'];
  }
  
  

  if (isset($_SESSION['keranjang'][$id_product])) {
    if ($_SESSION['keranjang'][$id_product] < $stock) {
      $_SESSION['total'] += $product['harga'];
      $_SESSION['keranjang'][$id_product]+=1;
    }
    $_SESSION['keranjang'][$id_product] == $stock;

    if ($_SESSION['keranjang'] == 0) {
      unset($_SESSION['keranjang']);
    }


  } else {
    $_SESSION['keranjang'][$id_product] = 1;

    if (!isset($_SESSION['total'])) {
      $_SESSION['total'] = $product['harga'];
    }

    $_SESSION['total'] += $product['harga'];
  }

  echo "<script> location='dashboard.php?page=pembayaran'; </script>";
 ?>