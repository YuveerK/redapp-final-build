<!--
Here, we write code for login.
-->
<?php

require_once('connection.php');

$email = $password = $pwd = '';

$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$sql = "SELECT * FROM patient WHERE Email='$email' AND Password='$password'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row["patient_id"];
		$email = $row["email"];
		$userName = $row["first_name"];
		$lastName = $row["last_name"];
		$gender = $row["gender"];
		$contact = $row["cell_phone"];
		$address_1 = $row ["address_1"];
		$address_2 = $row ["address_2"];

		session_start();
		$_SESSION['login'] = true;
		$_SESSION['patient_id'] = $id;
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $userName;
		$_SESSION['lastname'] = $lastName;
		$_SESSION['gender'] = $gender;
		$_SESSION['contact'] = $contact;
		$_SESSION['address_1'] = $address_1;
		$_SESSION['address_2'] = $address_2;

	}
	header("Location: patient_dashboard.php");
} else {
	echo "Invalid email or password";
}
?>