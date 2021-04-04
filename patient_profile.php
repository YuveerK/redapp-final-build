<?php
include_once('header1.php');
require_once('connection.php');

$id = $_SESSION['patient_id'];
$fname = $lname = $email = $gender = '';
$sql = "SELECT * FROM patient WHERE patient_id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row["first_name"];
        $lname = $row["last_name"];
        $email = $row["email"];
        $gender = $row["gender"];
        $address_1 = $row["address_1"];
        $address_2 = $row["address_2"];
    }
}

if (isset($_POST['save'])) {


    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $address_1 = $_POST['address_1'];
    $address_2 = $_POST['address_2'];

    $sql = ("UPDATE patient SET first_name='$fname', last_name = '$lname', email = '$email', address_1 = '$address_1', address_2 = '$address_2' WHERE patient_id = '$id'");
    if (mysqli_query($conn, $sql)) {
        
          //my other php code here
          function function_alert()
            {
                // Display the alert box; note the Js tags within echo, it performs the magic
                echo "<script>alert('Your message Here');</script>";
            }
    } else  {
                echo "Error updating record: " . mysqli_error($conn);
            }
}

if (isset($_POST['save_changes'])) {
    $new_password = $_POST ['new_password'];
    $verify_password = $_POST ['verify_password'];
    $password = md5($verify_password);

    $sql = mysqli_query($conn, "UPDATE patient SET password='$password' WHERE patient_id = '$id'");
    $result = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql)) {
        echo "false";
    } else {
        echo "true";
    }
}

    

    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {

            background: #ffffff;
        }

        .card {
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e5e9f2;
            border-radius: .2rem;
        }

        .card-header:first-child {
            border-radius: calc(.2rem - 1px) calc(.2rem - 1px) 0 0;
        }

        .list-group-item[aria-expanded="true"]{
         background-color: #F14E4A !important;
         border-color: #F14E4A;
      }
        .card-header {
            border-bottom-width: 1px;
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            color: inherit;
            background-color: #fff;
            border-bottom: 1px solid #f2e5e5;
        }
    </style>
</head>

<body style="padding-top:150px;" >


    <div class="container p-0">

        <h1 class="h3 mb-3"> Profile Settings</h1>

        <div class="row">
            <div class="col-md-5 col-xl-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Settings</h5>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                            Account
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                            Password
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-xl-8">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">

                        <div class="card">
                            <div class="card-header">
                                <div class="card-actions float-right">
                                    <div class="dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Private info</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="inputUsername">Username</label>
                                                <input type="text" class="form-control" id="inputUsername" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputUsername">Biography</label>
                                                <textarea rows="2" class="form-control" id="inputBio" placeholder="Tell something about yourself"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img alt="Profile Image" src="https://abload.de/img/profiletemprbj21.png" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                                <div class="mt-2">
                                                    <button class="btn btn-primary">Upload</button>
                                                </div>
                                                <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="card-actions float-right">
                                    <div class="dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Private info</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">

                                    <label for="w3review">First Name</label>
                                    <div class="form-group">

                                        <textarea id="first_name" name="first_name" rows="1" cols="50"><?php echo strval($fname) ?> </textarea>
                                    </div>
                                    <label for="w3review">Last Name </label>
                                    <div class="form-group">

                                        <textarea id="last_name" name="last_name" rows="1" cols="50"><?php echo strval($lname) ?> </textarea>
                                    </div>

                                    <label for="w3review">Email</label>
                                    <div class="form-group">

                                        <textarea id="address_1" name="email" rows="1" cols="50"><?php echo strval($email) ?> </textarea>
                                    </div>
                                    <label for="w3review">Address 1</label>
                                    <div class="form-group">

                                        <textarea id="address_1" name="address_1" rows="4" cols="50"><?php echo strval($address_1) ?> </textarea>
                                    </div>
                                    <label for="w3review">Address 2</label>
                                    <div class="form-group">

                                        <textarea id="address_2" name="address_2" rows="4" cols="50"><?php echo strval($address_2) ?> </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="save">Save changes</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Password</h5>

                                <form method="POST">
        
                                    <div class="form-group">
                                        <label for="inputPasswordNew">New password</label>
                                        <input type="password" id = "new_password" name = "new_password" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew2">Verify password</label>
                                        <input type="password" class="form-control" id="verify_password" name = "verify_password">
                                    </div>
                                    <button name = "save_changes" type="submit" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>