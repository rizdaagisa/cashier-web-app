<?php 


session_start();
Include './function.php';

  if ( isset( $_SESSION['login']) ) {
      header('Location: dashboard.php?page=admin');
  }

	if (isset($_POST['login'])) {
		// var_dump($_POST);
		$username = $_POST["username"];
		$password = $_POST['password'];

		$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' ");

		if ( mysqli_num_rows($result) === 1) {

			$row = mysqli_fetch_assoc($result);

			if ($password == $row["password"]){
				// var_dump($row);
				$_SESSION['login'] = true; //set session
				header('Location: admin/dashboard.php?page=admin');
				exit;
			} 
      
	  } else{
    $error = true;
		}
	}

  // if (isset($_POST['registrasi'])) {
  //   if (registrasi($_POST) > 0) {
  //     echo "<script> 
  //         alert('user baru telah ditambahkan');
  //         </script>";
  //   } else {
  //     echo mysqli_error($conn);
  //   }
  // }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<!------ Include the above in your HEAD tag ---------->

  	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
	

<body class="main-bg">
        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                    <h3 class="text-whitesmoke">LOGIN FORM</h3>
                    <p class="text-whitesmoke"></p>
                <div class="container-content">
                    <form class="margin-t" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" required="" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" name="password">
                        </div>
                        <button type="submit" class="form-button button-l margin-b btn-warning" name="login">Sign In</button>
        
                        <!-- <a class="text-darkyellow" href="#"><small>Forgot your password?</small></a> -->
                        <!-- <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
                        <a class="text-darkyellow" href="#"><small>Sign Up</small></a> -->
                    </form>
                </div>
            </div>
</body>
	<script type="text/javascript" src="js/login.js"></script>
</html>
