<?php 

require '../function.php';
session_start();
if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 

if (!isset($_GET['id_cetak'])) {
	$id = $_GET["id_pelanggan"];
	
	if ( hapus($id,"nota") > 0 ) {
		echo (" <script>
					alert('data berhasil dihapus');
					document.location.href = 'dashboard.php?page=transaksi';
				</script>");
	} else {
		echo (" <script>
				alert('data gagal dihapus');
				document.location.href = 'dashboard.php?page=transaksi';
			</script>");
		}
} else {
	$id = $_GET["id_cetak"];
	if (hapus($id,"cetak") > 0) {
	echo (" <script>
					alert('data berhasil dihapus');
					document.location.href = 'dashboard.php?page=daftar_cetak';
				</script>");
	}
	
}



?>