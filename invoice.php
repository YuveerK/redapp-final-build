<?php
session_start();
require_once('connection.php');
$id = $_SESSION['doctor_id'];

$dfname = $_SESSION['first_name'];
$dlname =$_SESSION['last_name'];
$address1 = $_SESSION['address'];
$email = $_SESSION['email'];
$fees='';
if (isset($_GET['fees']) && $_GET['pid']) {
    $fees = $_GET['fees'];
    $pid = $_GET['pid'];
}

$sql = "SELECT * FROM doctor_registration WHERE doctor_id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
       $contact = $row ["contact_number"];
   }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Red-App Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            <p style="color:red"><b>Red App</b></p>
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>From</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Dr. <?php echo $dfname ?> <?php echo $dlname ?></strong><br>
                  <?php echo $address1 ?> <br>
                  Phone:  0<?php echo $contact;?><br>
                  Fax: 0<?php echo $contact;?>
               </address>
            </div>
            <?php
                    $con=mysqli_connect("localhost", "root", "", "registrationdb");
                    global $con;
                    $dname = $_SESSION['first_name'];
                    $query = "select first_name,last_name,address_1,address_2,cell_phone,email from patient where patient_id='$pid';";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
               <div class="invoice-to">
               <small>To</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse"><?php echo $row['first_name']?> <?php echo $row['last_name'] ?></strong><br>
                  <?php echo $row['address_1'] ?><br>
                  <?php echo $row['address_2']?><br>
                  Phone: <?php echo $row['cell_phone']?><br>
                  Email: <?php echo $row['email']?>
               </address></p>
            </div>
               
            <?php
                    } ?>
            <!-- <div class="invoice-to">
               <small>To</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Mr Moloko</strong><br>
                  456 Jacob Street<br>
                  Polokwane, 0700<br>
                  Phone: (123) 456-7890<br>
                  Fax: (123) 456-7890
               </address></p>
            </div> -->
            <div class="invoice-date">
               <small>Invoice</small>
               <div class="date text-inverse m-t-5">August 3,2012</div>
               <div class="invoice-detail">
                  123456789<br>
                  Consultation
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>DESCRIPTION</th>
                        <th class="text-center" width="10%">RATE</th>
                        <th class="text-center" width="10%">NO OF ITEMS</th>
                        <th class="text-right" width="20%">LINE TOTAL</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Consultation</span><br>
                          
                        </td>
                        <td class="text-center">R<?php echo $fees ?></td>
                        <td class="text-center">1</td>
                        <td class="text-right">R<?php echo $fees ?></td>
                     </tr>
                    
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>SUBTOTAL</small>
                        <span class="text-inverse">R<?php echo $fees ?></span>
                     </div>
                     
                  </div>
               </div>
               <div class="invoice-price-right">
                  <small>TOTAL INC V.A.T</small> <span class="f-w-600"><?php echo $fees ?></span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <div class="invoice-note">
            * All Prices are including V.A.T<br>
            * Payment is due within 10 days<br>
            * If you have any questions concerning this invoice, contact  [Dr. <?php echo $dfname ?> <?php echo $dlname ?> , 0<?php echo $contact ?>, <?php echo $email ?>]
         </div>
         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BUSINESS
            </p>
            
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>