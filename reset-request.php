<!--
Into this file, we create a layout for login page.
-->

<?php
require_once('connection.php');


$patient_email = $_GET['email'];
if (isset($_POST['reset-request'])) {


    $reset_password = $_POST['new_password'];
    $confirm_new_password = $_POST ['confirm_new_password'];
    $password = md5($reset_password);

    $sql = ("UPDATE patient SET password='$password' WHERE email = '$patient_email'");
    if (mysqli_query($conn, $sql)) {

        //my other php code here
        function function_alert()
        {
            // Display the alert box; note the Js tags within echo, it performs the magic
            echo "<script>alert('Your message Here');</script>";
        }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .form-gap {
            padding-top: 70px;
        }

        .center {
            padding-top: 200px;

            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 5%;
            height: 5%;
        }
    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <img src="img/logo2.png" alt="Paris" class="center" width="500" height="600">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                <form class="form" method="POST">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk color-blue"></i></span>
                                            <input id="new_password" name="new_password" placeholder="New Password" class="form-control" type="password">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk color-blue"></i></span>
                                            <input id="confirm_new_password" name="confirm_new_password" placeholder="Confirm Password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="reset-request" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>