<!--
Here, we write code for registration.
-->
<?php
require_once('connection.php');


$first_name = $last_name = $id_number = $practice_number = $contact_number = $address = $date_of_birth = $specialty = $doctor_fees = $email = $password = $pwd = '';

$first_name = $_POST ['first_name'];
$last_name = $_POST ['last_name'];
$id_number = $_POST ['id_number'];
$practice_number = $_POST ['practice_number'];
$contact_number = $_POST ['contact'];
$address = $_POST ['address'];
$date_of_birth = $_POST ['dob'];
$specialty = $_POST ['specialty'];
$doctor_fees = $_POST ['doctor_fees'];
$email = $_POST ['email'];
$pwd = $_POST ['password'];
$password = md5($pwd);



$sql = mysqli_query($conn, "INSERT INTO `doctor_registration`(first_name, last_name, id_number, practice_number, contact_number, address, date_of_birth, specialty, doctor_fees, email, password) VALUES ('$first_name','$last_name','$id_number', '$practice_number', '$contact_number', '$address', '$date_of_birth', '$specialty', '$doctor_fees', '$email', '$password')");
$result = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    echo "true";
} else {
    echo "<script> alert ('Account created successfully') </script>";
    header('Location: doctor_sigin.php');
}









?>