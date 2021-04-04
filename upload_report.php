<?php
session_start();
require_once "connect-db.php";
require "sidebar.php";
$doctor = $_SESSION['first_name'];
$doc_id = $_SESSION['doctor_id'];
$dlname =$_SESSION['last_name'];
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

if (isset($_REQUEST['btn_insert'])) {
    try {
        $reportName	= $_REQUEST['report_name'];
        $hospName	= $_REQUEST['hosp_name'];
        $patFname	= $_REQUEST['fname'];
        $patLname	= $_REQUEST['lname'];
        $timeStamp = date('m/d/Y h:i:s a', time());
        $patPid	= $_REQUEST['pid'];
        $report_file	= $_FILES["txt_file"]["name"];
        $type		= $_FILES["txt_file"]["type"];
        $size		= $_FILES["txt_file"]["size"];
        $temp		= $_FILES["txt_file"]["tmp_name"];

        $randomName = gen_uuid().".pdf";
        $report_file = $randomName;
        
        
        $path="reports/".$report_file; //temporary folder path
        
        if (empty($reportName)) {
            $errorMsg="Please Enter Name";
        } elseif (empty($report_file)) {
            $errorMsg="Please Select Document";
        } elseif ($type=="application/pdf" || $type=='application/msword' || $type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document') { //check file extension
            if (!file_exists($path)) { //check file not exist in your upload folder path
                if ($size < 100000000) { //check file size 100MB
                    move_uploaded_file($temp, "reports/" .$report_file); //move upload file temperory directory
                } else {
                    $errorMsg="Your File To large Please Upload 100MB Size"; //error message file size not large than 5MB
                }
            } else {
                $errorMsg="A Version of that file has been uploaded...Change file name and upload again"; //error message file not exists your upload folder path
            }
        } else {
            $errorMsg="Upload PDF , MsWord File Formarts....CHECK FILE EXTENSION"; //error message file extension
        }
        
        if (!isset($errorMsg)) {
            $insert_stmt=$db->prepare('INSERT INTO reports (report_name, patient_id,doc_id,file_name,time_stamp,hosp_name,dfname,dlname,patient_name,patient_lname) 
            VALUES(:reportname,:pid,:docid,:file_name,:time_stamp,:hosp_name,:dfname,:dlname,:pat_fname,:pat_lname)'); //sql insert query
            $insert_stmt->bindParam(':reportname', $reportName);
            $insert_stmt->bindParam(':pid', $patPid);	  //bind all parameter
            $insert_stmt->bindParam(':docid', $doc_id);
            $insert_stmt->bindParam(':file_name', $report_file);
            $insert_stmt->bindParam(':time_stamp', $timeStamp);
            $insert_stmt->bindParam(':hosp_name', $hospName);
            $insert_stmt->bindParam(':dfname', $dfname);
            $insert_stmt->bindParam(':dlname', $dlname);
            $insert_stmt->bindParam(':pat_fname', $pat_fname);
            $insert_stmt->bindParam(':pat_lname', $pat_lname);
        
            if ($insert_stmt->execute()) {
                $insertMsg="File Upload Successfully........"; //execute query success message
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
</head>

	<body style="padding-top:50px;">
	<div class="container-fluid" style="margin-top:50px;">
                     <div class="container">
                        <div class="card">
                           <div class="card-body">
						   <?php
                                if (isset($errorMsg)) {
                                    ?>
											<div class="alert alert-danger">
												<strong>WRONG ! <?php echo $errorMsg; ?></strong>
											</div>
											<?php
                                }
                                        if (isset($insertMsg)) {
                                            ?>
											<div class="alert alert-success">
												<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
											</div>
										<?php
                                        }
                                ?>  
                              <br>
                              <h4 style="text-align: center;">Report Upload</h4>
                                 <h5 style="text-align: center;">Patient Name: <?php echo $pat_fname ?> <?php echo $pat_lname ?></h5>
                              <br>
                              <form class="form-group" method="POST" enctype='multipart/form-data'>
                                 <div class="row">
                                    <br><br>
                                    <div class="col-md-4"><label for="filenotes">
                                       Report Name:
                                       </label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" type="text" name="report_name" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-4"><label for="filenotes">
                                       Hospital Name:
                                       </label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" type="text" name="hosp_name" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-4"><label for="myfile">
                                       PDF File:
                                       </label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" type="file" name="txt_file" required/>
                                    </div>
                                    <input type="hidden" name="fname" value="<?php echo $pat_fname?>" />
                                    <input type="hidden" name="lname" value="<?php echo $pat_lname ?>" />
                                    <input type="hidden" name="pid" value="<?php echo $pid ?>" />
                                    <br><br>
                                    <div class="col-md-8">
                                       <input type="submit" name="btn_insert" value="Add Report" class="btn btn-primary" id="inputbtn" style="center-align">
                                       <button id="btn-back" class="btn btn-danger">Cancel</button>
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
   <script>
      document.getElementById('btn-back').addEventListener('click', () => {
      history.back();
      });
</script>								
	</body>