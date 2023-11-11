<?php 
	session_start();
  	include '../function.php';
  	if (isset($_GET['action'])) {
  		$id_product= $_GET['id_product'];
	  	$product = query("SELECT * FROM barang where id_barang= $id_product")[0];
	  	$stock = $product['stock'];
	  	// $jumlah = $_GET['jumlah'];
  	}

	if ($_GET['action'] == "hapus") {
		// $_SESSION['total'] -= ($product['harga']*$jumlah);
		unset($_SESSION['keranjang'][$id_product]);
	}
	
 	if ($_GET['action'] == 'tambah') {
    	if ($_SESSION['keranjang'][$id_product] < $stock) {
      		$_SESSION['keranjang'][$id_product]+=1;
      		$_SESSION['total'] += $product['harga'];
    	}
    	$_SESSION['keranjang'][$id_product] == $stock;
  	} 

  	if ($_GET['action'] == 'kurang') {
    	$_SESSION['keranjang'][$id_product] -= 1;
    	$_SESSION['total'] -= $product['harga'];
  	}

  	if ($_SESSION['keranjang'][$id_product] < 1) {
  		unset($_SESSION['keranjang'][$id_product]);
  	}

  	echo "<script> location='dashboard.php?page=pembayaran'; </script>";
 ?>