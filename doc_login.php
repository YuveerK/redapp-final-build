
<?php
require_once('connection.php');

$email = $password = $pwd = '';

$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$sql = "SELECT * FROM doctor_registration WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["doctor_id"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $id_number = $row["id_number"];
        $practice_number = $row["practice_number"];
        $contact_number = $row["contact_number"];
        $address = $row["address"];
        $date_of_birth = $row["date_of_birth"];
        $specialty = $row["specialty"];
        $doctor_fees = $row["doctor_fees"];
        $email = $row["email"];
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['doctor_id'] = $id;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['contact_number'] = $contact;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['address'] = $address;
        $_SESSION['email'] = $email;
    }
    header("Location: doctor_home.php");
} else {
    header("Location: doctor_sigin.php");
}
?>