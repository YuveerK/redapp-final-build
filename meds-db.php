<?php

//fetch_item.php

include('database_connection.php');

$query = "SELECT DISTINCT medication_id,prop_name,active_ingredients,unit,nappi_code FROM meds WHERE prop_name !='' ORDER BY medication_id DESC Limit 10";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive" >
        <table id="myTable" class="table table-bordered table-striped">
        <thead class="thead-dark">
			<tr>  
				<th width="40%">Medication Name</th>  
				<th width="10%">Man. Name</th>  
                <th width="20%">Unit</th>  
				<th width="15%">Add To List</th>    
            </tr>
        </thead>
	';;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td><input type="text" readonly="readonly" name="quantity" id="quantity' . $row["medication_id"] .'" class="form-control" value='.$row['prop_name'].' /></td>
			<td><input readonly="readonly" name="hidden_name" id="name'.$row["medication_id"].'" value="'.$row["active_ingredients"].'" /></td>
            <td><input readonly="readonly" name="hidden_price" id="price'.$row["medication_id"].'" value="'.$row["unit"].'"/></td>
			<td><input type="button" name="add_to_cart" id="'.$row["medication_id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to List" /></td>
		</tr>
		';
	}
	echo $output;
}


?>