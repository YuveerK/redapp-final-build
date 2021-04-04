<!--
this is second header file which is visible after login.
-->

<?php
session_start();

?>

<!--
this is header file which is visible in registration and login page.
-->
<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedApp</title>
      <!-- Favicon  -->
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="nav.css">
</head>

<body style = "padding-top: 75px">
<style >
    .bg-primary {
      background: rgb(241,78,74);
      background: linear-gradient(219deg, rgba(241,78,74,1) 33%, rgba(252,159,157,1) 80%); 
    }
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #342ac1;
        border-color: #007bff;
    }
    .text-primary {
        color: #342ac1!important;
    }

    .navbar-inverse .navbar-brand:hover {
      color: #FFCC00;
    }
    .navbar .navbar-collapse {
    text-align: center;
  }

    .navbar-brand{
      color: #000 !important;
    }

    nav .navbar-nav li a{
      color: #000 !important;
      font-size: 16px !important;
  }

    .btn-primary{
    background-color: #3c50c1;
    border-color: #3c50c1;
    }
  </style>
<!-- 3 - contained in center example -->
<nav class="navbar navbar-expand-sm navbar-light bg-primary  fixed-top" data-toggle="affix">
    <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
    <a class="navbar-brand" href="patient_dashboard.php"><img src="img/logo2.png" style="height:50px;" alt="" srcset=""></img>Home Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample" aria-controls="navbarsExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarsExample">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="patient_reports.php">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patient_consultation.php">Consultations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patient_psnote.php">Sick Note</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patient_profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
<script src="https://use.fontawesome.com/ec93d3cc7b.js"></script>
</html>