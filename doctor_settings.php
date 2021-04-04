<?php
session_start();
require_once('connection.php');
include_once('sidebar.php');

$id = $_SESSION['doctor_id'];
$fname = $lname = $practice_number = $contact = '';
$sql = "SELECT * FROM doctor_registration WHERE doctor_id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row["first_name"];
        $lname = $row["last_name"];
        $practice_number = $row["practice_number"];
        $contact = $row["contact_number"];
        $specialty = $row ["specialty"];
    }
}

if (isset($_POST['save_changes'])) {
  $new_password = $_POST ['new_password'];
  $verify_password = $_POST ['verify_password'];
  $password = md5($verify_password);

  $sql = mysqli_query($conn, "UPDATE doctor_registration SET password='$password' WHERE doctor_id = '$id'");
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
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Setting Page - Doctor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    margin-top:20px;
    background:#f8f8f8
}
    </style>
</head>
<body>
<h1><?php echo $fname; ?></h1>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 200px;"        
    </div>
    </div>
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"> <?php echo $fname . " " . $lname ?></h4>
                    <p class="mb-0">M.B.B.S</p>
                   

                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary"><?php echo $specialty ?></span>
                  
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name"  value="<?php echo $fname . " " . $lname ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Practice Number </label>
                              <input class="form-control" type="text" name="username"  value="<?php echo $specialty?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Contact Number</label>
                              <input class="form-control" type="text" placeholder="<?php echo $contact?>">
                            </div>
                          </div>
                        </div>
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
                    
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>