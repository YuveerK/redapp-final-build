<?php
$con = mysqli_connect("localhost", "root", "", "registrationdb");

//fetch_cart.php

session_start();
$doctor = $_SESSION['first_name'];
$doc_id = $_SESSION['doctor_id'];
$patient_id = $_SESSION['patient_id'];
$total_price = 0;
$total_item = 0;
$today = date("Y-m-d H:i:s"); 
$output = '
<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
  <tr>  
            <th width="40%">Product Name</th>  
            <th width="10%">Manufacturer</th>  
            <th width="20%">Action</th>  
              
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $output .= '
  <tr>
   <td>'.$values["product_name"].'</td>
   <td>'.$values["product_price"].'</td>
   <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
  </tr>
  ';
  //$total_item = $total_item + 1;
 }
 $output .= '
 <tr>  
        <td colspan="3" align="right">Total</td>  
        <td>
            <form method="POST" action="fetch_cart.php">
                <input type="submit" name="submit" value="Prescribe">
            </form>
        </td>  
</tr>
 ';

 
 if(isset($_POST['submit']))
{		
    foreach($_SESSION["shopping_cart"] as $keys => $values) {
        
    $med_id = $values['product_id'];
    $prop_name = $values['product_name'];

    $insert = mysqli_query($con,"INSERT INTO `prescription`(`doc_id`, `patient_id`, `time_stamp`, `med_id`, `prop_name`) VALUES ('$doc_id','$patient_id', '$today', '$med_id', '$prop_name')");

    if(!$insert)
    {
        echo "Unsuccessful";
    }
    else
    {
        header("Location: doctor-patient-prescription.php?pid=$patient_id");
    }
    }

}

 
}
else
{
 $output .= '
    <tr>
     <td colspan="5" align="center">
      Your Cart is Empty!
     </td>
    </tr>
    ';
}
$output .= '</table></div>';

echo $output;
//echo '<pre>';
//print_r($_SESSION["shopping_cart"]);
//echo '</pre>';


?>