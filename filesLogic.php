<?php
// connect to the database
//$conn = mysqli_connect("localhost","id15128274_admin","Zim+Harare_2020","id15128274_redapp");
require_once "connect-db.php";
$conn = mysqli_connect("localhost", "root", "", "registrationdb");


// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    date_default_timezone_set('Africa/Johannesburg');
    $filename = $_FILES['myfile']['name'];
    $reportname = $_POST['filename'];
    $pid = $_POST['pid'];
    $pat_fname = $_POST['patient_fname'];
    $pat_lname = $_POST['patient_lname'];
    $hospitalname = $_POST['hospname'];
    $timeStamp = date('m/d/Y h:i:s a', time());
    $docName = "Mazizi";
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
            $sql = "INSERT INTO `reports` (report_name, patient_id,file_name,time_stamp,hosp_name,doc_name,patient_name,patient_lname) VALUES ('$reportname','$pid','$filename', '$timeStamp', '$hospitalname', '$docName','$pat_fname','$pat_lname')";
            echo  $sql;
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM reports WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'reports/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('reports/' . $file['file_name']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();
        
        @readfile('reports/' . $file['file_name']);
        exit;
    }

}


// Downloads files
if (isset($_GET['template_id'])) {
    $id = $_GET['template_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM file_templates WHERE ID=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'templates/' . $file['template_file'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('templates/' . $file['template_file']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();
        
        @readfile('templates/' . $file['template_file']);
        exit;
    }

}

if(isset($_REQUEST['delete_id']))
{
// select image from db to delete
$id=$_REQUEST['delete_id'];	//get delete_id and store in $id variable

$select_stmt= $db->prepare('SELECT * FROM patient_history WHERE id =:id');	//sql select query
$select_stmt->bindParam(':id',$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
unlink("patient-history/".$row['file_name']); //unlink function permanently remove your file
//delete an orignal record from db
$delete_stmt = $db->prepare('DELETE FROM patient_history WHERE id =:id');
$delete_stmt->bindParam(':id',$id);
$delete_stmt->execute();

      if($delete_stmt->execute())
      {
        echo "<script>alert('Deleted');</script>";
        
      }
}

// Downloads patient history files
if (isset($_GET['file'])) {
    $id = $_GET['file'];

    // fetch file to download from database
    $sql = "SELECT * FROM patient_history WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'patient-history/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('patient-history/' . $file['file_name']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();
        
        @readfile('patient-history/' . $file['file_name']);
        exit;
    }

}