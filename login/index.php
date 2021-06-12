<?php 
require_once("../app/config.php");
require_once("../app/Magic.php");

session_start();
$magic = new Magic();
// echo password_hash("123", PASSWORD_DEFAULT);
// $zaw->login("thezaww", "123");
if ( isset($_POST['submit']) ) {
	$magic->login($_POST['username'], $_POST['password']);
}

if ( isset($_SESSION['username']) ) {
	header('Location: ../dashboard');
}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>AkuLirik - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<!-- form -->
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4"><a href="../">AkuLirik</a></h3>
						<form action="" method="POST" class="login-form">
		      		<div class="form-group">
		      			<input id="username" type="text" name="username" class="form-control rounded-left" placeholder="Username">
		      		</div>
	            <div class="form-group d-flex">
	              <input id="password" type="password" name="password" class="form-control rounded-left" placeholder="Password">
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<!-- remember me -->
	            	<!-- <div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div> -->

								<!-- forgot pw -->
								<!-- <div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div> -->
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">
		function validasi() {
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;		
			if (username != "" && password!="") {
				return true;
			}else{
				alert('Username dan Password harus di isi !');
				return false;
			}
		}
	</script>
	</body>
</html>

