<head>
	<title>Red App</title>
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
	<link href="register.css" rel="stylesheet">
	<script type="text/javascript" src="dob_form.js"></script>
</head>
<body>
	<div class="parent-element-center">
		<div class="element-center">
			<div class="login-box">
			<div class="brand">
						<img src="img/logo2.png" alt="Red App Logo">
            </div>
            <h2> Patient Sign In</h2>
				<form class="form-signin" id="loginform" method="POST" action="patient_login_code.php">
					<input type="text" id="email-focus" name="email" class="form-control" placeholder="E-Mail" required autofocus>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</form>
			</div>
			<div class="reg-box">
				<form id="registerform" class="form" method="POST" action="patient_registration_code.php" role="form" name="registerform">
				<div class="brand">
						<img src="img/logo2.png" alt="Red App Logo">
            	</div>
            	<h2> Patient Register Account</h2>
					<div class="row">
					<div class="col-xs-6 col-md-6">
							<input class="form-control" id="title" name="title" placeholder="Title" type="text" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control" id="initials" name="initials" placeholder="Initials" type="text" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control" id="first_name" name="first_name" placeholder="First Name" type="text" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control" id="last_name" name="last_name" placeholder="Last Name" type="text" 
							required />
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<input class="form-control" id="address_1" name="address_1" placeholder="Address 1" type="text" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control" id = "address_2" name="address_2" placeholder="Address 2" type="text" 
							required />
						</div>
					</div>
					<input class="form-control" id = "medical_aid_name" name="medical_aid_name" placeholder="Medical Aid Name" type="text" 
					required />

					<input class="form-control" id = "medical_aid_number" name="medical_aid_number" placeholder="Medical Aid Number" type="text" 
					required />
					<input class="form-control" id = "id_number" name="id_number" placeholder="ID Number" type="text" 
					required />
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<input class="form-control"  id = "employer" name="employer" placeholder="Employer" type="text" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control" id = "home_phone" name="home_phone" placeholder="Home Phone Number" type="tel" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control" id = "work_phone" name="work_phone" placeholder="Work Phone Number" type="tel" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control"  id = "cell_phone" name="cell_phone" placeholder="Cell Phone Number" type="tel" 
							required />
						</div>
						<div class="col-xs-6 col-md-6">
							<input class="form-control"  id = "referred_by" name="referred_by" placeholder="Reffered By" type="text" 
							required />
						</div>
					</div>
					<input class="form-control" id = "email" name="email" placeholder="Your Email" type="email" autocomplete="off"
					required />
					<input class="form-control" id = "password" name="password" placeholder="New Password (min. 6 characters)" 
					type="password" required />

					<label for="the_date"><b>Date of Birth</b></label>
                                    <div class="form-group">
                                        <input type="date" placeholder="Please select a date" name="the_date" required>
                                    </div>
					<label class="radio-inline">
						<input type="radio" name="gender" id="inlineCheckbox1" value="Male" class="rb" 
						required />
						Male
					</label>
					<label class="radio-inline">
						<input type="radio" name="gender" id="inlineCheckbox2" value="Female" class="rb" 
						required />
						Female
					</label>
                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
				</form>
			</div>
			<button class="btn btn-lg btn-primary btn-block" onClick="return false;" form="registerform"
			type="submit" name="register" id="regBtn">Sign up</button>
			<div class="element-center" style="text-align:center;margin-top:25px;">
				Already have an account? <a href="#" id="sign_in">Sign in</a>
			</div>

			<div class="element-center" style="text-align:center;margin-top:25px;">
				 <a href="patient_forgot_password.php" id="sign_in">Forgot Your Password?</a>
			</div>
		</div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- <script src="bootstrap.js"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="auth.js"></script>
	<script sc="dob_form.js"></script>
</body>