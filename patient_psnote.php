<?php
ob_start(); 
include_once('header1.php');
$pid = $_SESSION['patient_id'];
$pfname = $_SESSION['username'];
$plname = $_SESSION['lastname'];
$documentId = '';

if(isset($_GET["generate_snote"])){
    require_once("TCPDF/tcpdf.php");
    $obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
    $obj_pdf -> SetCreator(PDF_CREATOR);
    $obj_pdf -> SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $obj_pdf -> SetHeaderData('/img/logo2.png', 128, 'Red App'.' 001', 'Red App', array(0,64,255), array(0,64,128));
    $obj_pdf -> setFooterData(array(0,64,0), array(0,64,128));
    $obj_pdf -> SetTitle('Sick Note For '. $pfname . " ".$plname);
    $obj_pdf -> SetHeaderData('','','Sick Note', '');
    $obj_pdf -> SetHeaderFont(Array('timesbi','','20'));
    $obj_pdf -> SetFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $obj_pdf -> SetDefaultMonospacedFont('timesbi');
    $obj_pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf -> SetMargins(PDF_MARGIN_LEFT,'20',PDF_MARGIN_RIGHT);
    $obj_pdf -> SetPrintHeader(false);
    $obj_pdf -> SetPrintFooter(false);
    $obj_pdf -> SetAutoPageBreak(TRUE, 10);
    $obj_pdf -> SetFont('timesbi','',12);
    $obj_pdf -> AddPage();
  

    echo $documentId;
    $content = '';
  
    $content .= '

    ';

    $content .= generate_snote();
    $obj_pdf -> writeHTML($content);
    ob_end_clean();
    $obj_pdf -> Output("sicknote.pdf",'I');
    
  }


function generate_snote(){
    $con=mysqli_connect("localhost","root","","registrationdb");
    $pid = $_SESSION['patient_id'];
    $output='';
    $query=mysqli_query($con,"select patient_id,id,pfname,plname,dfname,dlname,address,StartDate,EndDate,Diagnosis,MedicalAdvice from sicknote where ID = '".$_GET['ID']."'");
    while($row = mysqli_fetch_array($query)){
      $output .= '
        
      <style>
      h1 {
          color: navy;
          font-family: times;
          font-size: 24pt;
          text-decoration: underline;
      }
      p.first {
          color: #003300;
          font-family: helvetica;
          font-size: 12pt;
      }
      p.first span {
          color: #006600;
          font-style: italic;
      }
      p#second {
          color: rgb(00,63,127);
          font-family: times;
          font-size: 12pt;
          text-align: justify;
      }
      p#second > span {
          background-color: #FFFFAA;
      }
      .brand{
        position: relative;
        padding-bottom: 10px;
        }
      table.first {
          color: #003300;
          font-family: helvetica;
          font-size: 8pt;
          border-left: 3px solid red;
          border-right: 3px solid #FF00FF;
          border-top: 3px solid green;
          border-bottom: 3px solid blue;
          background-color: #ccffcc;
      }
      td {
          border: 2px solid blue;
          background-color: #ffffee;
      }
      td.second {
          border: 2px dashed green;
      }
      div.test {
          color: #CC0000;
          background-color: #FFFF66;
          font-family: helvetica;
          font-size: 10pt;
          border-style: solid solid solid solid;
          border-width: 2px 2px 2px 2px;
          border-color: green #FF00FF blue red;
          text-align: center;
      }
      .lowercase {
          text-transform: lowercase;
      }
      .uppercase {
          text-transform: uppercase;
      }
      .capitalize {
          text-transform: capitalize;
      }
  </style>
  <h2 class="title" style="text-align:center"> Medical Certificate</h2>
  <img src="images/logo.png" alt="">

  
  <hr>
  <h6 class="title" style="text-align:center;">Dr. '.$row["dfname"].' '.$row["dlname"].'</h6>
  <h6 class="title" style="text-align:center;">Address Line 1</h6>
  <h6 class="title" style="text-align:center;">Address Line 2</h6>
  <hr>
  
   <label style="text-align:right"> Date: </label> '.$row["StartDate"].' <br/><br/>

    <h4 class="title" style="text-align:left;"> <u>To Whom It May Concern. </h4>
      <p>THIS IS TO CERTIFY ' .$row["pfname"].' '.$row["plname"].' of &nbsp;  ' .$row["address"].'. &nbsp; Was examined and treated by Dr. '.$row["dfname"].' '.$row["dlname"].' of Red App Hospital  on '.$row["StartDate"].', with the diagnosis:<br></br><strong>'.$row["Diagnosis"].'.</strong>
      <br></br>And would need medical attention until '.$row["EndDate"].'.
      </p>
      <label> Attending Doctor : </label>'.$row["dfname"].' '.$row["dlname"].';<br></br>
      <br></br><label> Doctor Signature : </label>
      ';
    }
    
    return $output;
  }

?>

<!DOCTYPE html>
<html>
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
      <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
   </head>
   <style>

   </style>
   <body style="padding-top:150px;" >
   <div class="container-fluid" style="margin-top:50px;">
      <h3 style = "margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $pfname?> <?php echo $plname?> 
         </h3>
      <div class="row justify-content-center">
      <div class="col-md-8">
          <!-- Query db to get the username to retrieve the code !-->
         <table id="tableMain" class="table table-bordered table-striped table-hover" >
            <thead>
               <th>Doctor Last Name</th>
               <th>Doctor First Name</th>
               <th>Start Date</th>
               <th>End Date</th>
               
               <th></th>
            </thead>
            <tbody>
            <?php
            $con=mysqli_connect("localhost", "root", "", "registrationdb");
            global $con;

               $query = "select ID,pfname,plname,dfname,dlname,startDate,endDate from sicknote where patient_id='$pid';";
               $result = mysqli_query($con, $query);
               while ($row = mysqli_fetch_array($result)){
            ?>
               <tr>
                  <td><?php echo $row['dfname']; ?></td>
                  <td><?php echo $row['dlname']; ?></td>
                  <td><?php echo $row['startDate']; ?></td>
                  <td><?php echo $row['endDate']; ?></td>
                  <?php $documentId = $row['ID']; ?>
                  <td>
                  <form method="GET">
                              <a  href="psnote.php?ID=<?php echo $row['ID']?>">
                              <input type ="hidden" name="ID" value="<?php echo $row['ID']?>"/>
                              <input type = "submit"  name ="generate_snote" class = "btn btn-primary" value="View"/>
                              </a>
                              </td>
                </form>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  	  	<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  	  	<script type="text/javascript">
  	  		$(document).ready( function () {
			    $('#tableMain').DataTable();
			} );
  	  	</script>
   </body>
</html>
