<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form method="post" action="" enctype="multipart/form-data">
					<span class="login100-form-title p-b-33">
						Create Account As A Patient
						 <?php 
include "library/Insertclass.php";

 $ic = new Insertclass();
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $sendcmd = $ic->customersenddata($_POST,$_FILES);
    }?>

					</span>

					<div class="wrap-input100 " >
						<input class="input100" type="text" name="customer_name" placeholder="Enter Your Name">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div><br>
						<div class="wrap-input100">
						<input class="input100" type="number" name="customer_phone" placeholder="Enter Your Mobile Number">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div><br>
					
				<div class="wrap-input100">
						<input class="input100" type="text" name="customer_address" placeholder="Enter Your Address">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
				</div><br>
				<div class="wrap-input100 ">
						<input class="input100" type="text" name="customer_blood" placeholder="Enter your Blood Group">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
				</div><br>

					<div class="wrap-input100 ">
						<input class="input100" type="date" name="customer_birth" >
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div><br>
				
					<div class="wrap-input100 " >
						<input class="input100" type="email" name="customer_email" placeholder="Enter Your Email Address">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div><br>
						<div class="wrap-input100 ">
							<input class="input100" type="text" name="customer_password" placeholder="Enter Password">
							<span class="focus-input100-1"></span>
							<span class="focus-input100-2"></span>
					</div><br>
					<div class="wrap-input100 ">
						<input style="    margin-top: 20px;
    margin-bottom: -17px;" class="input100" type="file" name="image" >
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div><br>
					<div class="wrap-input100">
						<select style="padding: 20px;" class="input100 validate-input" name="customer_gender">
							<option class="input100" value="Male">Male</option>
							<option class="input100" value="Female">Female</option>

						</select>
					</div>




					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Create Account
						</button>
					</div>

			<!-- 		<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Username / Password?
						</a>
					</div> -->

					<div class="text-center m-t-20">
						<span class="txt1">
							Already have an account?
						</span>

						<a href="login.php" class="txt2 hov1">
							Log In
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>