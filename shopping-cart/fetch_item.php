<?php

//fetch_item.php

include('database_connection.php');

$query = "SELECT * FROM tbl_product ORDER BY id DESC";

$statement = $connect->prepare($query);

if ($statement->execute()) {
	$result = $statement->fetchAll();
	$output = '';
	foreach ($result as $row) {
		$output .= '
		<div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
            	<img src="images/' . $row["image"] . '" class="img-responsive" /><br />
            	<h4 class="text-info">' . $row["name"] . '</h4>
            	<h4 class="text-danger">$ ' . $row["price"] . '</h4>
            	<input type="text" name="quantity" id="quantity' . $row["id"] . '" class="form-control" value="1" />
            	<input type="hidden" name="hidden_name" id="name' . $row["id"] . '" value="' . $row["name"] . '" />
            	<input type="hidden" name="hidden_price" id="price' . $row["id"] . '" value="' . $row["price"] . '" />
            	<input type="button" name="add_to_cart" id="' . $row["id"] . '" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
		';
	}
	echo $output;
}


?>


<?php

//fetch_item.php

include('database_connection.php');
$query = "SELECT * FROM meds";
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Tables</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>
	<div class="container">
		<h2>Simple Pagination Example using Datatables Js Library</h2>
		<table class="table table-fluid" id="myTable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Password</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Id</th>
					<th>Username</th>
					<th>Password</th>
				</tr>
				<?php
				$conn = mysqli_connect("localhost", "root", "", "company");
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT id, username, password FROM login";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while ($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>"
							. $row["password"] . "</td></tr>";
					}
					echo "</table>";
				} else {
					echo "0 results";
				}
				$conn->close();
				?>
			</tbody>
		</table>
	</div>

	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
</body>

</html>