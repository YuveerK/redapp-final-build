<!--
Here, we write code for registration.
-->
<?php
require_once('connection.php');
//$fname = $lname = $gender = $email = $password = $pwd = '';

$title = $initials = $first_name = $last_name = $address_1 = $address_2 = $medical_aid_name = $medical_aid_number = $id_number = $employer = $work_phone = $home_phone = $cell_phone = $referred_by = $gender = $email = $password = $pwd = '';



$title = $_POST ['title'];
$initals = $_POST ['initials'];
$first_name = $_POST ['first_name'];
$last_name = $_POST ['last_name'];
$address_1 = $_POST ['address_1'];
$address_2 = $_POST ['address_2'];
$medical_aid_name = $_POST ['medical_aid_name'];
$medical_aid_number = $_POST ['medical_aid_number'];
$id_number = $_POST ['id_number'];
$employer = $_POST ['employer'];
$work_phone = $_POST ['work_phone'];
$home_phone = $_POST ['home_phone'];
$cell_phone = $_POST ['cell_phone'];
$referred_by = $_POST ['referred_by'];
$gender = $_POST ['gender'];
$email = $_POST ['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$date_of_birth = $_POST ['the_date'];


$sql = mysqli_query($conn, "INSERT INTO patient (title, initials, first_name, last_name, address_1, address_2, medical_aid_name, medical_aid_number, id_number, employer, work_phone, home_phone, cell_phone, referred_by, gender, email, password, date_of_birth) VALUES ('$title', '$initals', '$first_name', '$last_name', '$address_1', '$address_2', '$medical_aid_name', '$medical_aid_number', '$id_number', '$employer', '$work_phone', '$home_phone', '$cell_phone', '$referred_by', '$gender', '$email', '$password', '$date_of_birth')");
$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
		echo "false";
} else {
	echo "true";
	header('Location: index.html');
}









?>