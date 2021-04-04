<?php
    include('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In | Register</title>
	<!-- <link href="bootstrap.css" rel="stylesheet"> -->
    <!-- Latest compiled and minified CSS -->
     <!-- Favicon  -->
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link href="doctor_sign.css" rel="stylesheet">
	<!-- <script type="text/javascript" src="dob_form.js"></script> -->
</head>

<body>
	
	<div class="parent-element-center" >
		<div class="element-center">
			
			<div class="login-box">
            <div class="brand">
						<img src="img/logo2.png" alt="Red App Logo">
            </div>
            <h2> Red App Doctor Portal</h2>
			<form class="form-signin" id="loginform" method="POST" action="doc_login.php">
					<input type="text" id="email-focus" name="email" class="form-control" placeholder="E-Mail" required autofocus>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
			</form>
			</div>
			<div class="reg-box">
            <div class="brand">
						<img src="img/logo2.png" alt="bootstrap 4 login page">
            </div>
			<h2> Red App Doctor Portal</h2>
			<!-- Register Form !-->
				<form id="registerform" class="form" method="POST" action="doc_reg.php" role="form" name="registerform">
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<input class="form-control" id="first_name" name="first_name" placeholder="First Name" type="text" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control"  id="last_name" name="last_name" placeholder="Last Name" type="text" 
							required />
						</div>
					</div>
					<input class="form-control" id="id_number" name="id_number" placeholder="ID Number" type="number" 
                    required />
                    <input class="form-control" id = "practice_number" name="practice_number" placeholder="Practice Number" type="text" 
					required />
					<input class="form-control" id = "contact" name="contact" placeholder="Contact Number" type="tel" 
					required />
					<input class="form-control" id = "address" name="address" placeholder="Address" type="text" 
					required />
					<div class="row">
						<div class="col-xs-6 col-md-6">
						<label for="dob">Date Of Birth:</label>
						</div>
						<div class="col-xs-6 col-md-6">	
						<input id="dob" class="form-control" type="date" name="dob">
						</div>
					</div>

					<input class="form-control" id = "specialty" name="specialty" placeholder="Specialty" type="text" 
					required />

					<input class="form-control" id = "doctor_fees" name="doctor_fees" placeholder="Doctor Fees" type="text" 
					required />

					<input class="form-control" id = "email" name="email" placeholder="Your Email" type="email" 
                    required />

                    <input class="form-control" id = "password" name="password" placeholder="New Password (min. 6 characters)" 
					type="password" required/>
					

                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
				</form>
            </div>
        
			<button class="btn btn-lg btn-primary btn-block" onClick="return false;" form="registerform"
			type="submit" name="register" id="regBtn">Sign up</button>
			<div class="element-center" style="text-align:center;margin-top:25px;">
				Already have an account? <a href="#" id="sign_in">Sign in</a>
			</div>

			<div class="element-center" style="text-align:center;margin-top:25px;">
				<a href="doctor_forgot_password.php" id="sign_in">Forgot Your Password?</a>
			</div>
			
		</div>
		
	</div>
	<canvas id="canvs" class="background" style="position:absolute;"></canvas>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- <script src="bootstrap.js"></script> -->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="auth.js"></script>
	<script sc="dob_form.js"></script>
	<!--Particles Js -->
	<script src="https://www.jsdelivr.com/package/npm/particles.js"></script>

</body>