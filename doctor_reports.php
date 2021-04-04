<!DOCTYPE html>
<?php
session_start();
include('filesLogic.php');
require_once "sidebar.php";
require_once "connect-db.php";
$con=mysqli_connect("localhost", "root", "", "registrationdb");
$doctor = $_SESSION['first_name'];
$doc_id = $_SESSION['doctor_id'];

if (isset($_REQUEST['del_id'])) {
    // select image from db to delete
$id=$_REQUEST['del_id'];	//get delete_id and store in $id variable

$select_stmt= $db->prepare('SELECT * FROM reports WHERE id =:id');	//sql select query
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
    unlink("reports/".$row['file_name']); //unlink function permanently remove your file
    //delete an orignal record from db
    $delete_stmt = $db->prepare('DELETE FROM reports WHERE id =:id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    if ($delete_stmt->execute()) {
        echo "<script>alert('Deleted');</script>";
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
              <h1>Patient Reports</h1>
              <hr>
            </div>   
            <hr>
      </div>
      
  <div class="container bg-grey container-lg">
  <div class="row">
        <div class="table">
              <table class="table tabled-borded table-hover" id="myTable">
              <caption>List of Patient Reports</caption>
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Report Name</th>
                    <th scope="col">Time Stamp</th>
                    <th scope="col">Hospital Name</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $con=mysqli_connect("localhost", "root", "", "registrationdb");
                    global $con;
                    $dname = $_SESSION['first_name'];
                    $query = "select * from reports where doc_id='$doc_id';";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                      <tr>
                      <td><?php echo $row['patient_name']; ?></td>
                        <td><?php echo $row['patient_lname']; ?></td>
                        <td><?php echo $row['report_name']; ?></td>
                        <td><?php echo $row['time_stamp']; ?></td>
                        <td><?php echo $row['hosp_name']; ?></td>
                        <td><a href="doctor_reports.php?file_id=<?php echo $row['id'] ?>"><button class="btn btn-outline-success">View</button></a></td>
                        <td>  
                            <?php if (($row['dfname'] !=$doctor)) : ?>
                            <button class="btn btn-danger"disabled>Delete</button>
                            <?php else : ?>
                            <a href="?del_id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete this report ?')">
                            <button class="btn btn-outline-danger">Delete</button>
                          </a>
                            <?php endif; ?>  
                        </td>
                      </tr>
                    <?php
                    } ?>
                </tbody>
              </table>

            </div>
        <br>
      </div>
      </div>
      <div class="container bg-grey pt-4 pb-4">
            <div class="row justify-content-center">
               <div class="btn-footer">
                  <button type="button" onclick="window.location.href ='patientlist.php'"class="btn btn-outline-dark">Add New Report</button>
               </div>
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
</html>