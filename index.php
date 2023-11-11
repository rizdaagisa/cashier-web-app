<?php 
// session_start();
// session_destroy();
// if ($_SERVER['PHP_SELF'] == "/percetakan/index.php"){
// 	if (isset($_SESSION['login'])) {
// 		include 'admin/admin.php';
// 	} else {
// 		include 'login.php';	
// 	}
		
// }

if (isset($_SESSION['login'])) {
	include 'admin/admin.php';
} else {
	include 'login.php';	
}
?>