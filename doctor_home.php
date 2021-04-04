<?php
   session_start();
   include_once('sidebar.php');
   require_once("connection.php");
  // $dname = $_SESSION['first'];
   $id = $_SESSION['doctor_id'];
   $first_name = $_SESSION['first_name'];
   $last_name = $_SESSION['last_name'];

   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>RedApp | Dashboard</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
     <link href="doctor_home.css" rel="stylesheet">

   </head>

   <body style="padding-top:50px;">
   <div  class="container bg-grey pt-4 pb-4">
            <div class="row">
              <h1>Appointments</h1>
              <hr>
            </div>   
            <hr>
      </div>
      <div class="container bg-grey pt-4 pb-4">
         <div class="row">
            <div class="card-columns">
               <?php
                  $sql = "SELECT fname, lname, appdate, apptime,url FROM appointmenttb WHERE doctor='$first_name' ORDER BY appdate";
                  $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                 
                  if (mysqli_num_rows($resultset)==0) {
                      echo "<p>No Appointments Yet</p>";
                  };
        
                  while ($record = mysqli_fetch_assoc($resultset)) {
                      ?>
               <div class="card-container">
                  <div class="card bg-gold">
                     <div class="card-body info">
                        <div class="title">
                           <b><?php echo $record['fname']; ?>&nbsp<?php echo $record['lname']; ?></b>
                        </div>
                        <div class="desc"><?php echo date("M jS, Y", strtotime($record['appdate'])); ?></div>
                        <div class="desc"><?php echo $record['apptime']; ?></div>
                     </div>
                     <div class="card-footer bottom">	
				 <a onclick="window.open('<?php echo $record['url']; ?>')">Start Appointment</span></a>
                     </div>
                  </div>
               </div>
               <?php
                  }?>
            </div>
         </div>
      </div>
      
      
      <div class="container bg-grey pt-4 pb-4">
            <div class="row justify-content-center">
               <div class="btn-footer">
                  <button type="button" onclick="window.location.href ='doctor_consultations.php'"class="btn btn-outline-dark">View All Appointments</button>
               </div>
            </div>   
      </div>
   </body>
   <!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</html>
