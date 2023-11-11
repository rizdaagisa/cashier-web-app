<?php 

	session_start();
	
	unset($_SESSION['keranjang']);
	unset($_SESSION['total']);
	echo "<script> location='dashboard.php?page=pembayaran'; </script>";

 ?>