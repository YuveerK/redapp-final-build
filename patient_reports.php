<?php
//include('not_loggedin.php');
include_once('header1.php');
include('filesLogic.php');
include('loginCheck.php');

$pid = $_SESSION['patient_id'];
$fname = $_SESSION['username'];
$lname = $_SESSION['lastname'];
?>
<!DOCTYPE html>
<html>
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="container-fluid" style="margin-top:50px;">
      <h3 style = "margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $fname?> <?php echo $lname?> 
         </h3>
      <div class="row justify-content-center">
      <div class="col-sm-6 mx-auto">
          <!-- Query db to get the username to retrieve the code !-->
         <table class="table table-hover">
            <thead>
               <th>Report Name</th>
               <th>Time Stamp</th>
               <th>Hospital Name</th>
               <th>Doctor First Name</th>
               <th>Doctor LastName</th>
               <th></th>
            </thead>
            <tbody>
            <?php
            $con=mysqli_connect("localhost", "root", "", "registrationdb");
            global $con;

               $query = "select id,report_name,time_stamp,hosp_name,dfname,dlname from reports where patient_id='$pid';";
               $result = mysqli_query($con, $query);
               while ($row = mysqli_fetch_array($result)){
            ?>
               <tr>
                  <td><?php echo $row['report_name']; ?></td>
                  <td><?php echo $row['time_stamp']; ?></td>
                  <td><?php echo $row['hosp_name']; ?></td>
                  <td><?php echo $row['dfname']; ?></td>
                  <td><?php echo $row['dlname']; ?></td>
                  <td><a href="patient_reports.php?file_id=<?php echo $row['id'] ?>"><button class="btn btn-primary">View</button></a></td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </body>
</html>
