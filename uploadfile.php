<!DOCTYPE html>
<?php
session_start();
include_once('sidebar.php');
$dfname = $_SESSION['first_name'];
$dlname =$_SESSION['last_name'];
$con = mysqli_connect("localhost", "root", "", "registrationdb");


function gen_uuid()
{
    return sprintf(
        '%04x%04x-%04x',
       // 32 bits for "time_low"
       mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),

       // 16 bits for "time_mid"
       mt_rand(0, 0xffff),

       // 16 bits for "time_hi_and_version",
       // four most significant bits holds version number 4
       mt_rand(0, 0x0fff) | 0x4000,

       // 16 bits, 8 bits for "clk_seq_hi_res",
       // 8 bits for "clk_seq_low",
       // two most significant bits holds zero and one for variant DCE1.1
       mt_rand(0, 0x3fff) | 0x8000

       // // 48 bits for "node"
       // mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}


$pid='';
$pat_fname='';
$pat_lname='';
if (isset($_GET['pid']) && ($_GET['fname']) && isset($_GET['lname'])) {
    $pid = $_GET['pid'];
    $pat_fname = $_GET['fname'];
    $pat_lname = $_GET['lname'];
}
        
// Uploads files
if (isset($_POST['save']) && isset($_POST['pid']) && isset($_POST['fname']) && isset($_POST['lname'])) { // if save button on the form is clicked
   // name of the uploaded file
   date_default_timezone_set('Africa/Johannesburg');
    $filename = $_FILES['myfile']['name'];
    $reportname = $_POST['filename'];
    $pid = $_POST['pid'];
    $doc_id = $_SESSION['doctor_id'];
    $pat_fname = $_POST['fname'];
    $pat_lname = $_POST['lname'];
    $hospitalname = $_POST['hospname'];
    $timeStamp = date('m/d/Y h:i:s a', time());
    $dfname = $_SESSION['first_name'];
    $dlname =$_SESSION['last_name'];

    $randomName = gen_uuid().".pdf";
    $filname = $randomName;

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    //$size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['pdf'])) {
        echo "You file extension must be pdf";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO reports (report_name, patient_id,doc_id,file_name,time_stamp,hosp_name,dfname,dlname,patient_name,patient_lname) VALUES ('$reportname','$pid','$doc_id','$filename', '$timeStamp', '$hospitalname','$dfname','$dlname','$pat_fname','$pat_lname')";
            if (mysqli_query($con, $sql)) {
                echo "File uploaded Succesfully;";
            }
        } else {
            echo "Failed to upload";
        }
    }
}

?>

<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   </head>
   <style type="text/css">
      button:hover{cursor:pointer;}
      #inputbtn:hover{cursor:pointer;}
   </style>
   <body style="padding-top:50px;">
      <div class="container-fluid" style="margin-top:50px;">
                     <div class="container">
                        <div class="card">
                           <div class="card-body">
                                 <h4 style="text-align: center;">Report Upload</h4>
                                 <h5 style="text-align: center;">Patient Name: <?php echo $pat_fname ?> <?php echo $pat_lname ?></h5>
                              <br>
                              <form class="form-group" method="POST" action="uploadfile.php"  enctype='multipart/form-data'>
                                 <div class="row">
                                    <br><br>
                                    <div class="col-md-4"><label for="filname">
                                       Report Name:
                                       </label>
                                    </div>
                                    <div class="col-md-8">
                                     
                                       <input class="form-control" type="text" name="filename" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-4"><label for="filenotes">
                                       Report Notes:
                                       </label>
                                    </div>
                                    <div class="col-md-8">
                                     
                                       <input class="form-control" type="text" name="filenotes" autocomplete="off" required/>
                                    </div>
                                    <br><br>
                                    <div class="col-md-4"><label for="hospname">
                                       Hospital Name:
                                       </label>
                                    </div>
                                    <div class="col-md-8">
                                      
                                       <input class="form-control" type="text" name="hospname" autocomplete="off" required/>
                                    </div>
                                    <br><br>
                                    <div class="col-md-4"><label for="myfile">
                                       PDF File:
                                       </label>
                                    </div>
                                    <div class="col-md-8">
                                      
                                       <input class="form-control" type="file" name="myfile"required/>
                                    </div>
                                    <input type="hidden" name="fname" value="<?php echo $pat_fname?>" />
                                    <input type="hidden" name="lname" value="<?php echo $pat_lname ?>" />
                                    <input type="hidden" name="pid" value="<?php echo $pid ?>" />
                                    <br><br>
                                    <div class="col-md-8">
                                       <input type="submit" name="save" value="Add Report" class="btn btn-primary" id="inputbtn" style="center-align">
                                       <button id="btn-cancel" type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                    <div class="col-md-8"></div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <br>
                  </div>
            </div>
         </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
      <script>
      document.getElementById('btn-cancel').addEventListener('click', () => {
      history.back();
      });
</script>
   </body>
</html>

