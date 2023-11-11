<?php 
	session_start();

	if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 

	
	// $_SESSION['login'] = false;
	unset($_SESSION['login']);
	echo (" <script>
                    alert('Anda sudah logout');
                    document.location.href = '../index.php';
                </script>");
	exit;
 ?>