<?php 
	session_start();
	
	if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 
	
	include '../function.php';
	$id_pelanggan = $_GET['id_pelanggan'];

	if (update_product($id_pelanggan) < 0) {
		echo (" <script>
			alert('data gagal dikonfirmasi');
			document.location.href = 'dashboard.php?page=transaksi';
		</script>");
	}

	if ( transaksi($_GET['id_pelanggan']) > 0 ) {
	echo (" <script>
				alert('Transaksi telah berhasil');
				document.location.href = 'dashboard.php?page=transaksi';
			</script>");
} else {
	echo (" <script>
			alert('data gagal dikonfirmasi');
			document.location.href = 'dashboard.php?page=transaksi';
		</script>");
	}
 ?>