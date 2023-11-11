<?php 


session_start();
Include '../function.php';

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
				header('Location: dashboard.php?page=admin');
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
    <link rel="stylesheet" href="css/login.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
	

<body>
  <a href="../index.php" style="margin-left: 30px"><< Kembali</a>
    <div class="container">

        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                   <form action="" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="username" name="username"  class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <br>
                           <div class="col-md-12 text-center ">
                              <button type="submit" name="login" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button><br>
                             <?php if(isset($error)) : ?>
                                <h5 style="color: red; font-style: italic; font-size: 15px;"> Username atau password salah </h5>
                              <?php endif; ?>
                           </div>
                           <!-- <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">atau</span>
                              </div>
                           </div>
 -->                           
                           <!-- <div class="form-group">
                              <p class="text-center">Belum mempunyai akun? <a href="#" id="signup">Daftar disini!</a></p>
                           </div> -->
                        </form>
                 
				</div>
			</div>
			  <div id="second">
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 >Daftar</h1>
                           </div>
                        </div>
                        <form action="#" name="registration">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Nama</label>
                              <input type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="col-md-12 text-center mb-3">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Daftar!</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <p class="text-center"><a href="" id="signin">Sudah punya akun? login disini!</a></p>
                              </div>
                           </div>
                            </div>
                        </form>
                     </div>
			</div>
		</div>
      </div>   
         
</body>
	<script type="text/javascript" src="js/login.js"></script>
</html>
