<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="form-group"> 
<form name="add_name" id="add_name">   
<div class="table-responsive" id="test">
	<table class="table table-bordered table-striped">
		<tr>  
		<th width="0%"></th>  
		<th width="30%">Med Id</th>  
            <th width="40%">Medication Name</th>  
            <th width="10%">Manufacter Name</th>  
			<th width="10%">Unit</th>  
            <th width="5%">Action</th>  
        </tr>

';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
		<tr>
			<td><input type="hidden" id="pid" name=pid[] readonly="readonly" class="form-control" value='.$values['patient_id'].'></td>
			<td><input type="text" id="prop_name" name=med_id[] readonly="readonly" class="form-control" value='.$values['product_id'].'></td>
            <td><input type="text" id="prop_name" name=prop_name[] readonly="readonly" class="form-control" value='.$values['product_name'].'></td>
            <td><input type="text" id="manName" name=manufacturer[]  readonly="readonly" value='.$values['product_quantity'].'></td>
			<td><input type="text" id="prop_name" name=unit[] readonly="readonly" class="form-control" value='.$values['product_price'].'></td>
            <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
        </tr>
       
		';
		$total_price = 200;
		$total_item = $total_item + 1;
	}
}
else
{
	$output .= '
    <tr>
    	<td colspan="5" align="center">
    		Your Prescription List is Empty!
    	</td>
    </tr>
    ';
}

$output .= '
</table>
</form>
</div>
';

$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'$' . number_format($total_price, 2),
	'total_item'		=>	$total_item
);	

echo json_encode($data);

?>