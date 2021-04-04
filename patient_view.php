<!--
Into this file, we write a code for display user information.
-->

<?php
// include_once('header1.php');
require_once('connection.php');

// $id = $_GET['value'];
// $fname = $lname = $email = $gender = '';
// $sql = "SELECT * FROM patient WHERE patient_id='$id'";
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $fname = $row["first_name"];
//         $lname = $row["last_name"];
//         $email = $row["email"];
//         $gender = $row["gender"];
//         $address_1 = $row["address_1"];
//         $address_2 = $row["address_2"];
//     }
// }

if (isset($_POST['save'])) {


    $chol_value = $_POST['patient_cholesterol_value'];
    
    $stmt = $conn->prepare("INSERT INTO patient_cholesterol (patient_id, cholesterol_value) VALUES (?, ?)"); // prepared statement to protect against sql injection
    $stmt->bind_param('ii', $id,$chol_value);
    $stmt->execute();
    // $result = $stmt->get_result();
    // $user = $result->fetch_assoc();
    
    // $sql = ("INSERT INTO patient_cholesterol (patient_id, cholesterol_value) VALUES ('$id', '$chol_value')");
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



if (isset($_POST['submit'])) 
{


    $Name = $_POST['Name'];
    $Gender = $_POST['Gender'];
    $Email = $_POST['Email'];
    $Age = $_POST['Age'];
    $Phone = $_POST['Phone'];
    $stDate = $_POST['startDate'];
    $enDate = $_POST['endDate'];
    $Diagnosis = $_POST['Diagnosis'];   
    $MedicalAdvice = $_POST['MedicalAdvice'];
    $pid = "1";
    $pfname = "Kudzai";
    $plname ="Mabika";
    $dfname = "Mazizi";
    $dlname = "Njokweni";
    $address = "Road Address";
    


    $sql = "INSERT INTO sicknote (patient_id,pfname,plname,dlname,dfname,address,Gender, Email,Age, Phone,StartDate,EndDate,Diagnosis,MedicalAdvice) 
    VALUES ('$pid','$pfname','$plname','$dlname','$dfname','$address','$Gender','$Email','$Age','$Phone','$stDate','$enDate','$Diagnosis','$MedicalAdvice')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
	echo "it worked bro";
    } else {
	echo "Error :" . $sql;

    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Settings Page - Red App</title>
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

<body style="padding-top:150px;">


    <div class="container p-0">


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

                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#sicknote" role="tab">
                            Sicknote
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
                                <form method="POST">

                                    <label for="w3review">Enter Cholesterol Value</label>
                                    <div class="form-group">
                                    <textArea rows = "1" cols="50" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)|| event.charCode == 46);" id="patient_cholesterol_value" formControlName="name" type="text" autocomplete="off" value="" name= "patient_cholesterol_value" placeholder="Cholesterol value"  maxlength="10" required/></textArea>
                                        <!-- <textarea id="patient_cholesterol_value" name="patient_cholesterol_value" rows="1" cols="50"></textarea> -->
                                    </div>

                                    <button type="submit" class="btn btn-primary" name = "save">Add Cholesterol</button>

                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Password</h5>

                                <form>
                                    <div class="form-group">
                                        <label for="inputPasswordCurrent">Current password</label>
                                        <input type="password" class="form-control" id="inputPasswordCurrent">
                                        <small><a href="#">Forgot your password?</a></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew">New password</label>
                                        <input type="password" class="form-control" id="inputPasswordNew">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew2">Verify password</label>
                                        <input type="password" class="form-control" id="inputPasswordNew2">
                                    </div>
                                    <button type="submit" class="btn btn-primary" >Save changes</button>
                                </form>

                            </div>
                        </div>
                    </div>
<!-- sicknote -->
                    <div class="tab-pane fade" id="sicknote" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                            <h1>SickNote</h1>

<form method="POST">

<label for="Name">Name:</label><br>
    <div class="form-group">
    <input class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Name" formControlName="name" type="text" autocomplete="off" value="" name="Name" placeholder=""  maxlength="15" rows = "1" required/>
        <!-- <textarea id="Na" name="Name" rows="1" cols="50"> </textarea> -->
    </div>

    <label for="Ged">Gender:</label><br>
    <div class="form-group">
    <input class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Gender" formControlName="name" type="text" autocomplete="off" value="" name="Gender" placeholder=""  maxlength="15" rows = "1" required/>
        <!-- <textarea id="Ge" name="Gender" rows="1" cols="50"> </textarea> -->
    </div>

    <label for="Ema">Email:</label><br>
    <div class="form-group">
    <input class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Email" formControlName="name" type="text" autocomplete="off" value="" name="Email" placeholder=""  required />
        <!-- <textarea id="Em" name="Email" rows="1" cols="50"> </textarea> -->
    </div>


    <label for="Age">Age:</label><br>
    <div class="form-group">
    <input class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57));" id="Age" formControlName="name" type="text" autocomplete="off" value="" name="Age" placeholder=""  maxlength="3">
        <!-- <textarea id="Ag" name="Age" rows="1" cols="50"> </textarea> -->
    </div>


    <label for="Phone">Phone:</label><br>
    <div class="form-group">
    <input class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57));" id="Phone" formControlName="name" type="text" autocomplete="off" value="" name="Phone" placeholder= ""  maxlength="10" required>
        <!-- <textarea id="Ph" name="Phone" rows="1" cols="50"> </textarea> -->
    </div>

    
    <label for="stDate">Start Date:</label><br> 
    <div class="sDate"><input type="date" class="form-control datepicker" name="startDate"></div><br><br>
    

    <label for="enDate">End Date:</label><br>
    <div class="eDate"><input type="date" class="form-control datepicker" name="endDate"></div><br><br>

    <label for="Diagnosis">Diagnosis</label>
    <div class="form-group">
    <!-- <textarea class="form-control" rows="4" cols="50" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Diagnosis" formControlName="name" type="text" autocomplete="off" value="" name="Diagnosis" placeholder= ""  maxlength="60" required></textarea> -->
    <textarea class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="Diagnosis" formControlName="name" type="text" autocomplete="off" value="" name="Diagnosis" placeholder=""  maxlength="60" rows = "4" cols = "50" required/></textarea>   
    <!-- <textarea id="Diag" name="Diagnosis" rows="4" cols="50"> </textarea> -->
    </div>


    <label for="MedicalAdvice">Medical Advice</label>
    <div class="form-group">
    <!-- <textarea class="form-control" rows="4" cols="50" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58||||event.charCode == 44|| (event.charCode >= 48 && event.charCode <= 57));" id="MedicalAdvice" formControlName="name" type="text" autocomplete="off" value="" name="MedicalAdvice" placeholder= ""  maxlength="60" required></textarea> -->
    <textarea class="form-control" onkeypress="return ((event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 46 ||event.charCode == 32 ||event.charCode == 58|| (event.charCode >= 48 && event.charCode <= 57));" id="MedicalAdvice" formControlName="name" type="text" autocomplete="off" value="" name="MedicalAdvice" placeholder=""  maxlength="60" rows = "4" cols = "50" required/></textarea>    
    <!-- <textarea id="Med" name="MedicalAdvice" rows="4" cols="50"> </textarea> -->
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
</form>

</div>
</div>                            

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