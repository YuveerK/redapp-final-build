<!DOCTYPE html>
<?php
session_start();
//include('func1.php');
include_once('sidebar.php');
$con = mysqli_connect("localhost", "root", "", "registrationdb");
$doctor = $_SESSION['first_name'];
if (isset($_GET['cancel'])) {
  $query = mysqli_query($con, "update appointmenttb set doctorStatus='0' where ID = '" . $_GET['ID'] . "'");
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
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

</head>
<style type="text/css">
  button:hover {
    cursor: pointer;
  }

  #inputbtn:hover {
    cursor: pointer;
  }

  table tbody td:hover {
    cursor: pointer;
}
</style>

<body>
  <div class="containter-fluid">
    <h3 style="margin-left: 17%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Patients </h3>
    <div style="margin-left: 72%; padding-bottom: 20px;">
      <input type="text" id="myInput" placeholder="Search By Patient Name" aria-label="Search" name="pname">
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="table-responsive py-5">
          <table class="table table-bordered table-hover " id="myTable">
            <caption>List of Patients</caption>
            <thead class="thead-dark">
              <tr>
                <th scope="col">Patient ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $con = mysqli_connect("localhost", "root", "", "registrationdb");
              global $con;
              $first_name = $_SESSION['first_name'];
              $query = "select DISTINCT pid,ID,fname,lname,gender,email,contact from appointmenttb where doctor='$first_name';";
              $result = mysqli_query($con, $query);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo $row['pid']; ?></td>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['lname']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['contact']; ?></td>

                </tr></a>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <br>
      </div>
    </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>
<script>
  function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;

    for (var i = 0; i < rows.length; i++) {
      var firstCol = rows[i].cells[2].textContent.toUpperCase();
      var secondCol = rows[i].cells[3].textContent.toUpperCase();
      if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }

  document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>
<script>
    var td;
    var xhttp = new XMLHttpRequest();;

    var ident = td;
    $(document).ready(function() {

      $('#myTable tbody').on('click', 'tr', function() {

        //get row contents into an array
        var tableData = $(this).children("td").map(function() {
          return $(this).text();
        }).get();
        td = tableData[0];

        var selection = confirm("Would you like to view patient: " + " " + td);

        if (selection == true) {
          
          var var1 = td
          window.location = "doctor_view_patient.php?value=" + var1;
        }





      });
    });
  </script>

</html>