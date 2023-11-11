<?php 
    
    session_start();
    if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
    } 
    
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard - SB Admin</title>

        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <?php 
        	if ($_GET['page'] == "admin") {
                echo '<link href="../assets/bootstrap/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />';
            } if ($_GET['page'] == "order-detail") {
                echo '<link href="../assets/bootstrap/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />';
            }
         ?>
        
        

        <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">
		<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/svg-with-js.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/svg-with-js.css">
        
    	<style type="text/css">
    		label {
    			color: black !important;
    		}
    		input {
  				solid #000;
                border:1px solid grey !important;
  			}  textarea {
                border:1px solid grey !important;
            } .card{
                border:1px solid grey !important;
            } hr {
                border:1px solid grey !important;
            }
            .sb-sidenav-dark .sb-sidenav-menu .nav-link.active .sb-nav-link-icon {
              color: #ffc107 !important;
            } td {
              text-align: center;
              vertical-align: middle;
            }
            th {
              text-align: center;
              vertical-align: middle;
            }
  			
    	</style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-warning">
            <a class="navbar-brand text-dark" href="">Admin Panel</a>
         

            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </div>

            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a href="logout.php" role="button" name="logout" class="text-dark"><i class="fas fa-sign-out-alt"></i>Logout</a>  
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
	                            <a class="nav-link" href="dashboard.php?page=admin">
	                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
	                                Profile
	                            </a>

                            <div class="sb-sidenav-menu-heading">Input</div>
                                <a class="nav-link" href="dashboard.php?page=pembayaran">
                                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                    Pembayaran
                                </a>
	                            <a class="nav-link" href="dashboard.php?page=cetak">
	                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
	                                Cetak
	                            </a>

                            
                            <div class="sb-sidenav-menu-heading">Data Tables</div>
                            	<a class="nav-link" href="dashboard.php?page=product">
	                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
	                                Product
	                            </a>
	                            <a class="nav-link" href="dashboard.php?page=daftar_cetak">
	                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
	                                Daftar Cetak
	                            </a>
                                <a class="nav-link" href="dashboard.php?page=transaksi">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Transaksi Selesai
                                </a>
                        	</div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Toko Adli
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" style="margin-top: 15px;">
                <?php 

                	if (isset($_GET['page'])) {
                		if ($_GET['page'] == "admin") {
                			include 'admin.php';
                		}elseif ($_GET['page'] == "pembayaran") {
                            include 'pembayaran.php';
                        }elseif ($_GET['page'] == "cetak") {
                			include 'cetak.php';
                		} elseif ($_GET['page'] == "product") {
                			include 'product.php';
                		} elseif ($_GET['page'] == "daftar_cetak") {
                			include 'daftar_cetak.php';
                        } elseif ($_GET['page'] == "order-detail") {
                            include 'order-detail.php';
                        } elseif ($_GET['page'] == "transaksi") {
                            include 'transaksi.php';
                		} elseif ($_GET['page'] == "ubah") {
                            include 'ubah.php';
                        }
                	} else {
                		include 'admin.php';
                	} 

                 ?>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</html>
