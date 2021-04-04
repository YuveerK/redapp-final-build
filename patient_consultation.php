<!DOCTYPE html>
<?php
include_once('header1.php');
include('functions.php');
$con = mysqli_connect("localhost", "root", "", "registrationdb");

$pid = $_SESSION['patient_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$fname = $_SESSION['username'];
$gender = $_SESSION['gender'];
$lname = $_SESSION['lastname'];
$contact = $_SESSION['contact'];

if (isset($_POST['app-submit'])) {
   $pid = $_SESSION['patient_id'];
   $username = $_SESSION['username'];
   $email = $_SESSION['email'];
   $fname = $_SESSION['username'];
   $lname = $_SESSION['lastname'];
   $gender = $_SESSION['gender'];
   $contact = $contact = $_SESSION['contact'];
   $doctor = $_POST['doctor'];
   $email =  $email = $_SESSION['email'];
   $docFees = $_POST['docFees'];

   $appdate = $_POST['appdate'];
   $apptime = $_POST['apptime'];
   $cur_date = date("Y-m-d");
   date_default_timezone_set('Africa/Harare');
   $cur_time = date("H:i:s");
   $apptime1 = strtotime($apptime);
   $appdate1 = strtotime($appdate);

   if (date("Y-m-d", $appdate1) >= $cur_date) {
      if ((date("Y-m-d", $appdate1) == $cur_date and date("H:i:s", $apptime1) > $cur_time) or date("Y-m-d", $appdate1) > $cur_date) {
         $check_query = mysqli_query($con, "select apptime from appointmenttb where doctor='$doctor' and appdate='$appdate' and apptime='$apptime'");

         if (mysqli_num_rows($check_query) == 0) {
            $a = guidv4(openssl_random_pseudo_bytes(16));
            $b = "https://meet.jit.si/";
            $url = $b . $a;

            $query = mysqli_query($con, "insert into appointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,apptime,userStatus,doctorStatus,url) values($pid,'$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$apptime','1','1','$url')");

            if ($query) {

               echo "<script>alert('Your appointment successfully booked');</script>";
            } else {
               echo "<script>alert('Unable to process your request. Please try again!');</script>";
            }
         } else {
            echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
         }
      } else {
         echo "<script>alert('Select a time or date in the future!');</script>";
      }
   } else {
      echo "<script>alert('Select a time or date in the future!');</script>";
   }
}

if (isset($_GET['cancel'])) {
   $query = mysqli_query($con, "update appointmenttb set userStatus='0' where ID = '" . $_GET['ID'] . "'");
   if ($query) {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
   }
}

function get_specs()
{
   $con = mysqli_connect("localhost", "root", "", "registrationdb");
   $query = mysqli_query($con, "select first_name,specialty from doctor_registration");
   $docarray = array();
   while ($row = mysqli_fetch_assoc($query)) {
      $docarray[] = $row;
   }
   return json_encode($docarray);
}

?>

<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

</head>
<style type="text/css">
   button:hover {
      cursor: pointer;
   }

   .list-group-item[aria-expanded="true"] {
      background-color: #F14E4A !important;
      border-color: #F14E4A;
   }

   #inputbtn:hover {
      cursor: pointer;
   }
</style>

<body>
   <div class="container-fluid" style="margin-top:50px;">
      <h3 style="margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $username ?> <?php echo $lname ?>
      </h3>
      <div class="row justify-content-center">
         <div class="col-md-4" style="max-width:25%; margin-top: 3%">
            <div class="list-group" id="list-tab" role="tablist">
               <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Book Appointment</a>
               <a class="list-group-item list-group-item-action" href="#app-hist" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
            </div>
            <br>
         </div>
         <div class="col-md-8" style="margin-top: 3%;">
            <div class="tab-content" id="nav-tabContent" style="width: 950px;">
               <div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
                  <div class="container-fluid container-fullw bg-white">
                     <div class="row">
                        <div class="col-sm-4" style="left: 5%">
                           <div class="panel panel-white no-radius text-center">
                              <div class="panel-body">
                                 <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                 <h4 class="StepTitle" style="margin-top: 5%;"> Book My Appointment</h4>
                                 <script>
                                    function clickDiv(id) {
                                       document.querySelector(id).click();
                                    }
                                 </script>
                                 <p class="links cl-effect-1">
                                    <a href="#list-home" onclick="clickDiv('#list-home-list')">
                                       Book Appointment
                                    </a>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4" style="left: 10%">
                           <div class="panel panel-white no-radius text-center">
                              <div class="panel-body">
                                 <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                                 <h4 class="StepTitle" style="margin-top: 5%;">
                                    My Appointments</h2>
                                    <p class="cl-effect-1">
                                       <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                                          View Appointment History
                                       </a>
                                    </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                  <div class="container-fluid">
                     <div class="card">
                        <div class="card-body">
                           <center>
                              <h4>Create an appointment</h4>
                           </center>
                           <br>
                           <form class="form-group" method="post" action="patient_consultation.php">
                              <div class="row">
                                 <!-- <?php
                                       $con = mysqli_connect("localhost", "root", "", "registrationdb");
                                       $query = mysqli_query($con, "select first_name,specialty from doctor_registration");
                                       $docarray = array();
                                       while ($row = mysqli_fetch_assoc($query)) {
                                          $docarray[] = $row;
                                       }
                                       echo json_encode($docarray);

                                       ?> -->
                                 <div class="col-md-4">
                                    <label for="spec">Specialization:</label>
                                 </div>
                                 <div class="col-md-8">
                                    <select name="spec" class="form-control" id="spec">
                                       <option value="" disabled selected>Select Specialization</option>
                                       <?php
                                       display_specs();
                                       ?>
                                    </select>
                                 </div>
                                 <br><br>
                                 <script>
                                    document.getElementById('spec').onchange = function foo() {
                                       let spec = this.value;
                                       console.log(spec)
                                       let docs = [...document.getElementById('doctor').options];
                                       docs.forEach((el, ind, arr) => {
                                          arr[ind].setAttribute("style", "");
                                          if (el.getAttribute("data-spec") != spec) {
                                             arr[ind].setAttribute("style", "display: none");
                                          }
                                       });
                                    };
                                 </script>
                                 <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                                 <div class="col-md-8">
                                    <select name="doctor" class="form-control" id="doctor" required="required">
                                       <option value="" disabled selected>Select Doctor</option>
                                       <?php 
                                       global $con;
                                       $query = "select * from doctor_registration";
                                       $result = mysqli_query($con, $query);
                                       while ($row = mysqli_fetch_array($result)) {
                                          $username = $row['first_name'];
                                          $price = $row['doctor_fees'];
                                          $spec = $row['specialty'];
                                          echo '<option value="' . $username . '" data-value="' . $price . '" data-spec="' . $spec . '">' . $username . '</option>';
                                       } ?>
                                    </select>
                                 </div>
                                 <br /><br />
                                 <script>
                                    document.getElementById('doctor').onchange = function updateFees(e) {
                                       var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-value');
                                       document.getElementById('docFees').value = selection;
                                    };
                                 </script>
                                 <div class="col-md-4"><label for="consultancyfees">
                                       Consultancy Fees
                                    </label>
                                 </div>
                                 <div class="col-md-8">
                                    <!-- <div id="docFees">Select a doctor</div> -->
                                    <input class="form-control" type="text" name="docFees" id="docFees" readonly="readonly" />
                                 </div>
                                 <br><br>
                                 <div class="col-md-4"><label>Appointment Date</label></div>
                                 <div class="col-md-8"><input type="date" class="form-control datepicker" name="appdate"></div>
                                 <br><br>
                                 <div class="col-md-4"><label>Appointment Time</label></div>
                                 <div class="col-md-8">
                                    <!-- <input type="time" class="form-control" name="apptime"> -->
                                    <select name="apptime" class="form-control" id="apptime" required="required">
                                       <option value="" disabled selected>Select Time</option>
                                       <option value="08:00:00">8:00 AM</option>
                                       <option value="10:00:00">10:00 AM</option>
                                       <option value="12:00:00">12:00 PM</option>
                                       <option value="14:00:00">2:00 PM</option>
                                       <option value="16:00:00">4:00 PM</option>
                                    </select>
                                 </div>
                                 <br><br>
                                 <div class="col-md-4">
                                    <input type="submit" name="app-submit" value="Book" class="btn btn-primary" id="inputbtn">
                                 </div>
                                 <div class="col-md-8"></div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <br>
               </div>
               <div class="tab-pane fade" id="app-hist" role="tabpanel" aria-labelledby="list-pat-list">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th scope="col">Doctor Name</th>
                           <th scope="col">Consultancy Fees</th>
                           <th scope="col">Appointment Date</th>
                           <th scope="col">Appointment Time</th>
                           <th scope="col">Current Status</th>
                           <th scope="col">Join Meeting</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "registrationdb");
                        global $con;

                        $query = "select ID,doctor,docFees,appdate,apptime,userStatus,doctorStatus,url from appointmenttb where fname ='$fname' and lname='$lname';";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {

                           #$fname = $row['fname'];
                           #$lname = $row['lname'];
                           #$email = $row['email'];
                           #$contact = $row['contact'];
                        ?>
                           <tr>
                              <td><?php echo $row['doctor']; ?></td>
                              <td><?php echo $row['docFees']; ?></td>
                              <td><?php echo $row['appdate']; ?></td>
                              <td><?php echo $row['apptime']; ?></td>
                              <td>
                                 <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                    echo "Active";
                                 }
                                 if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                    echo "Cancelled by You";
                                 }

                                 if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                    echo "Cancelled by Doctor";
                                 }
                                 ?>
                              </td>
                              <td>
                                 <!-- Add logic to check if apppointment has been canceled to disable the link !-->
                                 <?php if (($row['userStatus'] == 0) || ($row['doctorStatus'] == 0)) : ?>
                                    <button class="btn btn-primary" disabled>Join</button>
                                 <?php else : ?>
                                    <a href="<?php echo $row['url']; ?>" target="_blank" rel="noopener noreferrer"><button class="btn btn-primary">Join</button></a>
                                 <?php endif; ?>
                              </td>
                              <td>
                                 <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
                                    <a href="consultation.php?ID=<?php echo $row['ID'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                                 <?php } else {
                                    echo "Cancelled";
                                 } ?>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  <br>
               </div>
               <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
               <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
            </div>
         </div>
      </div>
   </div>
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>