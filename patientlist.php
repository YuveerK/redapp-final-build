<!DOCTYPE html>
<?php

session_start();
include_once('sidebar.php');
$con=mysqli_connect("localhost", "root", "", "registrationdb");
$doctor = $_SESSION['first_name'];
$doc_id = $_SESSION['doctor_id'];
if (isset($_GET['cancel'])) {
    $query=mysqli_query($con, "update appointmenttb set doctorStatus='0' where ID = '".$_GET['ID']."'");
    if ($query) {
        echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
}
?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

     
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
<body style="padding-top:50px;">
   <div  class="container bg-grey pt-4 pb-4">
            <div class="row">
              <h1>Patient List</h1>
              <hr>
            </div>   
            <hr>
      </div>
      <div class="container bg-grey pt-4 pb-4">
         <div class="row">
        <div class="table-responsive">
              <table class="table tabled-bordedtable-hover" id="myTable">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Add Report</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $con=mysqli_connect("localhost", "root", "", "registrationdb");
                    global $con;
                    $dname = $_SESSION['first_name'];
                    $query = "SELECT DISTINCT `pid`, `fname`, `lname`, `gender`,`email`,`contact` FROM `appointmenttb` WHERE `doctor`='$doctor'";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                      <tr>
                      <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td> 
                        <td><?php echo $row['gender']; ?></td>    
                        <td><?php echo $row['email']; ?></td>   
                        <td><?php echo $row['contact']; ?></td>                  
                      <td>
                        <a href="upload_report.php?pid=<?php echo $row['pid']?>&fname=<?php echo $row['fname']?>&lname=<?php echo $row['lname']?>"
                        tooltip-placement="top" tooltip="Remove" title="Add New Report">
                        <button class="btn btn-outline-primary">Add</button></a></td>
                      </tr></a>
                    <?php
                    } ?>
                </tbody>
              </table>

   <div  class="container bg-grey pt-4 pb-4">
            <div class="row">
              <button id="btn-back" class="btn btn-outline-dark">Go Back</button>
            </div>      
      </div>
            </div>
        <br>
      </div>
      </div>
   </div>
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  	  	<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  	  	<script type="text/javascript">
  	  		$(document).ready( function () {
			    $('#myTable').DataTable();
			} );
  	  	</script>
    </script>
  </body>
  <script>
      document.getElementById('btn-back').addEventListener('click', () => {
      history.back();
      });
</script>
</html>