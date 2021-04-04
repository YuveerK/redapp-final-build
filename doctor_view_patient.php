<!--
Into this file, we write a code for display user information.
-->

<?php
session_start();
include_once('sidebar.php');
require_once('connection.php');

//Patient Details
$id = $_GET['value'];
$_SESSION['value'] = $id;
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

//Doctor Details
$doc_id = $_SESSION['doctor_id'];
$doc_fname = $doc_lname = $doc_email = '';
$sql = "SELECT * FROM doctor_registration WHERE doctor_id='$doc_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $doc_fname = $row["first_name"];
        $doc_lname = $row["last_name"];
        $doc_email = $row["email"];
    }
}

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `meds` WHERE CONCAT(`medication_id`, `prop_name`, `applicant_name`, `nappi_code`) LIKE '%" . $valueToSearch . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `meds`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "registrationdb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

if (isset($_POST['save'])) {
    $id = $_SESSION['value'];
    $chol_value = $_POST['patient_cholesterol_value'];
    $the_date = $_POST['the_date'];

    $data = mysqli_query($conn, "INSERT INTO patient_cholesterol (patient_id, cholesterol_value, cholesterol_date) VALUES ('$id', '$chol_value', '$the_date')");
}

if (isset($_POST['save_bp'])) {


    $sys_val = $_POST['patient_systolic_bp'];
    $the_date = $_POST['the_date'];
    $dias_val = $_POST['patient_diastolic_bp'];


    $sql = ("INSERT INTO blood_pressure (patient_id, systolic_value, diastolic_value, bp_date) VALUES ('$id', '$sys_val', '$dias_val', '$the_date')");
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

if (isset($_POST['save_heart_rate'])) {


    $heart_rate = $_POST['patient_heart_rate'];
    $the_date = $_POST['the_date'];


    $sql = ("INSERT INTO patient_heart_rate (patient_id, heart_rate, date) VALUES ('$id', '$heart_rate', '$the_date')");
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

if (isset($_POST['save_blood_sugar'])) {


    $blood_sugar = $_POST['patient_blood_sugar'];
    $the_date = $_POST['the_date'];


    $sql = ("INSERT INTO patient_blood_sugar (patient_id, blood_sugar_value, date) VALUES ('$id', '$blood_sugar', '$the_date')");
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

if (isset($_POST['save_complaint'])) {


    $complaint = $_POST['patient_complaint'];
    $the_date = $_POST['the_date'];


    $sql = ("INSERT INTO patient_complaints (patient_id, complaint, date) VALUES ('$id', '$complaint', '$the_date')");
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

if (isset($_POST['submit'])) {


    $Name = $_POST['Name'];
    $Gender = $_POST['Gender'];
    $Email = $_POST['Email'];
    $Age = $_POST['Age'];
    $Phone = $_POST['Phone'];
    $stDate = $_POST['startDate'];
    $enDate = $_POST['endDate'];
    $Diagnosis = $_POST['Diagnosis'];
    $MedicalAdvice = $_POST['MedicalAdvice'];




    $sql = "INSERT INTO sicknote (patient_id,pfname,plname,dfname,dlname,address,Gender, Email,Age, Phone,StartDate,EndDate,Diagnosis,MedicalAdvice) 
    VALUES ('$id','$fname','$lname','$doc_fname','$doc_lname','$address_1','$Gender','$Email','$Age','$Phone','$stDate','$enDate','$Diagnosis','$MedicalAdvice')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "it worked bro";
    } else {
        echo "Error :" . $sql;
    }


    $sql = ("INSERT INTO doctor_signature (patient_id, doctor_id) VALUES ('$id', '$doc_id')");
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Settings Page - Red App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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

        .center {
            padding-top: 0px;
            padding-bottom: 50px;

            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 5%;
            height: 5%;
        }
    </style>

    <!-- script using JQuery to keep page on current tab by storing it on local storage when page is refreshed -->
    <script>
        $(document).ready(function() {
            $('a[data-toggle="list"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#mytab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>

</head>

<body>

<img src="img/logo2.png" alt="Paris" class="center" width="500" height="600">

    <div class="container p-0">

        <div class="d-flex justify-content-around">
            <h1 class="h3 mb-3"> Patient: <?php echo $fname . " " . $lname ?></h1>
            <h1 class="h3 mb-3"> Doctor: <?php echo $doc_fname . " " . $doc_lname ?></h1>

        </div>

        <div class="row">


            <div class="col-md-5 col-xl-4" id="mytab">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Settings</h5>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">

                        
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#patient_details" role="tab">
                            Blood Pressure
                        </a>

                        <a class="list-group-item list-group-item-action " data-toggle="list" href="#heart_rate" role="tab">
                            Heart Rate
                        </a>

                        <a class="list-group-item list-group-item-action " data-toggle="list" href="#blood_sugar" role="tab">
                            Blood Sugar
                        </a>

                        <a class="list-group-item list-group-item-action " data-toggle="list" href="#complaint" role="tab">
                            Complaints
                        </a>

                        <a class="list-group-item list-group-item-action " data-toggle="list" href="#account" role="tab">
                            Cholesterol
                        </a>

                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#sick_note" role="tab">
                            Prescibe Sicknote
                        </a>

                        
                    </div>
                </div>
            </div>



            <div class="col-md-7 col-xl-8">

                <div class="tab-content">


                   

                    <div class="tab-pane fade" id="patient_details" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Enter Systolic Blood Pressure</h5>
                                <div style="height:200px;overflow:auto;">

                                    <table style="width:100%">
                                        <?php


                                        ?>
                                        <tr>
                                            <th>Date</th>
                                            <th>Systolic</th>
                                            <th>Diastolic</th>

                                        </tr>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "registrationdb");
                                        global $con;

                                        $query = "select  bp_date, systolic_value, diastolic_value from blood_pressure where patient_id='$id' ORDER BY bp_date DESC ;";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>

                                                <td><?php echo $row['bp_date']; ?> </td>
                                                <td><?php echo $row['systolic_value']; ?>mg/dl</td>
                                                <td><?php echo $row['diastolic_value']; ?>mg/dl</td>




                                            </tr></a>
                                        <?php } ?>

                                    </table>
                                </div>


                                <form method="POST">
                                    <label for="w3review">Enter Systolic Blood Pressure Value</label>
                                    <div class="form-group">
                                        <textarea id="patient_systolic_bp" name="patient_systolic_bp" rows="1" cols="50" style="border:solid 1px black;"></textarea>
                                    </div>

                                    <label for="w3review">Enter Diastolic Blood Pressure Value</label>
                                    <div class="form-group">
                                        <textarea id="patient_diastolic_bp" name="patient_diastolic_bp" rows="1" cols="50" style="border:solid 1px black;"></textarea>
                                    </div>

                                    <label for="the_date"><b>Date</b></label>
                                    <div class="form-group">
                                        <input type="date" placeholder="Please select a date" name="the_date" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="save_bp">Add Blood Pressure</button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="heart_rate" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Patient's Heart Rate</h5>
                                <div style="height:200px;overflow:auto;">

                                    <table style="width:100%">
                                        <?php


                                        ?>
                                        <tr>
                                            <th>Date</th>
                                            <th>Heart Rate</th>

                                        </tr>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "registrationdb");
                                        global $con;

                                        $query = "select  date, heart_rate from patient_heart_rate where patient_id='$id' ORDER BY date DESC ;";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>

                                                <td><?php echo $row['date']; ?> </td>
                                                <td><?php echo $row['heart_rate']; ?>bpm</td>




                                            </tr></a>
                                        <?php } ?>

                                    </table>
                                </div>


                                <form method="POST">
                                    <label for="w3review">Enter Patient's Heart Rate</label>
                                    <div class="form-group">
                                        <textarea id="patient_heart_rate" name="patient_heart_rate" rows="1" cols="50" style="border:solid 1px black;"></textarea>
                                    </div>


                                    <label for="the_date"><b>Date</b></label>
                                    <div class="form-group">
                                        <input type="date" placeholder="Please select a date" name="the_date" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="save_heart_rate">Add Heart Rate</button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="blood_sugar" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Patient's Blood Sugar</h5>
                                <div style="height:200px;overflow:auto;">

                                    <table style="width:100%">
                                        <?php


                                        ?>
                                        <tr>
                                            <th>Date</th>
                                            <th>Blood Sugar</th>

                                        </tr>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "registrationdb");
                                        global $con;

                                        $query = "select  date, blood_sugar_value from patient_blood_sugar where patient_id='$id' ORDER BY date DESC ;";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>

                                                <td><?php echo $row['date']; ?> </td>
                                                <td><?php echo $row['blood_sugar_value']; ?>mmol/L</td>




                                            </tr></a>
                                        <?php } ?>

                                    </table>
                                </div>


                                <form method="POST">
                                    <label for="w3review">Enter Patient's Blood Sugar</label>
                                    <div class="form-group">
                                        <textarea id="patient_blood_sugar" name="patient_blood_sugar" rows="1" cols="50" style="border:solid 1px black;"></textarea>
                                    </div>


                                    <label for="the_date"><b>Date</b></label>
                                    <div class="form-group">
                                        <input type="date" placeholder="Please select a date" name="the_date" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="save_blood_sugar">Add Blood Sugar</button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="complaint" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Patient's Complaints</h5>
                                <div style="height:200px;overflow:auto;">

                                    <table style="width:100%">
                                        <?php


                                        ?>
                                        <tr>
                                            <th>Date</th>
                                            <th>Complaint</th>

                                        </tr>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "registrationdb");
                                        global $con;

                                        $query = "select  date, complaint from patient_complaints where patient_id='$id' ORDER BY date DESC ;";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>

                                                <td><?php echo $row['date']; ?> </td>
                                                <td><?php echo $row['complaint']; ?></td>




                                            </tr></a>
                                        <?php } ?>

                                    </table>
                                </div>


                                <form method="POST">
                                    <label for="w3review">Enter Patient's complaint</label>
                                    <div class="form-group">
                                        <textarea id="patient_complaint" name="patient_complaint" rows="10" cols="80" style="border:solid 1px black;"></textarea>
                                    </div>


                                    <label for="the_date"><b>Date</b></label>
                                    <div class="form-group">
                                        <input type="date" placeholder="Please select a date" name="the_date" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="save_complaint">Add complaint</button>
                                </form>

                            </div>
                        </div>
                    </div>







                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Patient's Cholesterol</h5>
                            </div>


                            <div class="card-body">
                                <div style="height:200px;overflow:auto;">

                                    <table id="mytable" style="width:100%">
                                        <?php


                                        ?>
                                        <tr>
                                            <th>Date</th>
                                            <th>Cholesterol Value</th>
                                        </tr>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "registrationdb");
                                        global $con;
                                        $dname = "Amit";
                                        $query = "select  cholesterol_date, cholesterol_value from patient_cholesterol where patient_id='$id' ORDER BY cholesterol_date DESC ;";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>

                                                <td><?php echo $row['cholesterol_date']; ?> </td>
                                                <td><?php echo $row['cholesterol_value']; ?>mg/dl</td>



                                            </tr></a>
                                        <?php } ?>

                                    </table>
                                </div>
                                </br>
                                </br>
                                <form method="POST">
                                    <label for="w3review">Enter Cholesterol Value</label>
                                    <div class="form-group">
                                        <textarea id="patient_cholesterol_value" id="patient_cholesterol_value" name="patient_cholesterol_value" rows="1" cols="50"></textarea>
                                    </div>
                                    </br>
                                    <label for="the_date"><b>Date</b></label>
                                    <div class="form-group">
                                        <input type="date" placeholder="Please select a date" id="the_date" name="the_date" required> </div>
                                    <button type="submit" class="btn btn-primary" name="save">Add Cholesterol</button>
                                </form>
                                <p class="result"></p>

                                <!-- <script>
                                    var xhttp;

                                    $("form").submit(function(e) {
                                        e.preventDefault();

                                        $.post(
                                            'doctor_add_cholesterol.php', {
                                                patient_cholesterol_value: $("#patient_cholesterol_value").val(),
                                                the_date: $("#the_date").val()
                                            },
                                            function(data) {
                                                alert("Successfully entered cholesterol");
                                                xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                        document.getElementById("txtHint").innerHTML = this.responseText;
                                                    }
                                                };
                                                xhttp.open("GET", "doctor_view_patient.php", true);
                                                xhttp.send();



                                            }

                                        );



                                    });
                                </script> -->

                            </div>
                        </div>
                    </div>



                    <div class="tab-pane fade" id="sick_note" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h1>SickNote</h1>

                                <form method="POST">

                                    <label for="Name">Name:</label><br>
                                    <div class="form-group">
                                        <input class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Name" formControlName="name" type="text" autocomplete="off" value="" name="Name" placeholder="" maxlength="15" rows="1" />
                                        <!-- <textarea id="Na" name="Name" rows="1" cols="50"> </textarea> -->
                                    </div>

                                    <label for="Ged">Gender:</label><br>
                                    <div class="form-group">
                                        <input class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Gender" formControlName="name" type="text" autocomplete="off" value="" name="Gender" placeholder="" maxlength="15" rows="1" />
                                        <!-- <textarea id="Ge" name="Gender" rows="1" cols="50"> </textarea> -->
                                    </div>

                                    <label for="Ema">Email:</label><br>
                                    <div class="form-group">
                                        <input class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Email" formControlName="name" type="text" autocomplete="off" value="" name="Email" placeholder="" />
                                        <!-- <textarea id="Em" name="Email" rows="1" cols="50"> </textarea> -->
                                    </div>


                                    <label for="Age">Age:</label><br>
                                    <div class="form-group">
                                        <input class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57));" id="Age" formControlName="name" type="text" autocomplete="off" value="" name="Age" placeholder="" maxlength="3">
                                        <!-- <textarea id="Ag" name="Age" rows="1" cols="50"> </textarea> -->
                                    </div>


                                    <label for="Phone">Phone:</label><br>
                                    <div class="form-group">
                                        <input class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57));" id="Phone" formControlName="name" type="text" autocomplete="off" value="" name="Phone" placeholder="" maxlength="10">
                                        <!-- <textarea id="Ph" name="Phone" rows="1" cols="50"> </textarea> -->
                                    </div>


                                    <label for="stDate">Start Date:</label><br>
                                    <div class="sDate"><input type="date" class="form-control datepicker" name="startDate"></div><br><br>


                                    <label for="enDate">End Date:</label><br>
                                    <div class="eDate"><input type="date" class="form-control datepicker" name="endDate"></div><br><br>

                                    <label for="Diagnosis">Diagnosis</label>
                                    <div class="form-group">
                                        <!-- <textarea class="form-control" rows="4" cols="50" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Diagnosis" formControlName="name" type="text" autocomplete="off" value="" name="Diagnosis" placeholder= ""  maxlength="60" required></textarea> -->
                                        <textarea class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Diagnosis" formControlName="name" type="text" autocomplete="off" value="" name="Diagnosis" placeholder="" rows="50" cols="50" /></textarea>
                                        <!-- <textarea id="Diag" name="Diagnosis" rows="4" cols="50"> </textarea> -->
                                    </div>


                                    <label for="MedicalAdvice">Medical Advice</label>
                                    <div class="form-group">
                                        <!-- <textarea class="form-control" rows="4" cols="50" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58||||event.charCode == 44|| (event.charCode >= 48 && event.charCode <= 57));" id="MedicalAdvice" formControlName="name" type="text" autocomplete="off" value="" name="MedicalAdvice" placeholder= ""  maxlength="60" required></textarea> -->
                                        <textarea class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="MedicalAdvice" formControlName="name" type="text" autocomplete="off" value="" name="MedicalAdvice" placeholder="" maxlength="60" rows="" cols="50" /></textarea>
                                        <!-- <textarea id="Med" name="MedicalAdvice" rows="4" cols="50"> </textarea> -->
                                    </div>

                                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Save changes</button>
                                </form>

                                <!-- Jquery Core Js -->
                                <script src="js/jquery.min.js"></script>

                                <!-- Bootstrap Core Js -->
                                <script src="js/bootstrap.min.js"></script>

                                <!-- Bootstrap Select Js -->
                                <script src="js/bootstrap-select.js"></script>

                                <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                                <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

                                <link href="./css/jquery.signaturepad.css" rel="stylesheet">
                                <script src="./js/numeric-1.2.6.min.js"></script>
                                <script src="./js/bezier.js"></script>
                                <script src="./js/jquery.signaturepad.js"></script>

                                <script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
                                <script src="./js/json2.min.js"></script>



                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </div>

    </div>

    <script>
        var table = document.getElementsByTagName("table")[0];
        var tbody = table.getElementsByTagName("tbody")[0];

        tbody.onclick = function(e) {
            e = e || window.event;
            var data = [];
            var target = e.srcElement || e.target;
            while (target && target.nodeName !== "TR") {
                target = target.parentNode;
            }
            if (target) {
                var cells = target.getElementsByTagName("td");
                for (var i = 0; i < cells.length; i++) {
                    data.push(cells[i].innerHTML);
                }
            }
            var trnode = document.createElement("tr");

            for (var i = 0; i < data.length; i++) {
                var tdnode = document.createElement("td");
                var textnode = document.createTextNode(data[i]);
                tdnode.appendChild(textnode);
                trnode.appendChild(tdnode);
            }

            document.getElementById("myNewTableBody").appendChild(trnode);
            alert(data);
        };
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>