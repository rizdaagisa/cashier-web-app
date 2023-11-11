<?php 

require '../function.php';
session_start();
if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 

$id = $_GET["id_pelanggan"];
	
if ( hapus_pelanggan($id) > 0 ) {
	echo (" <script>
				alert('data berhasil dihapus');
				document.location.href = 'dashboard.php?page=order';
			</script>");
} else {
	echo (" <script>
			alert('data gagal dihapus');
			document.location.href = 'dashboard.php?page=order';
		</script>");
	}



?>