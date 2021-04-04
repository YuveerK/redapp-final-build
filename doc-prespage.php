<?php
session_start();
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

	<style>
		.container {
			display: flex;
			flex-direction: column;
		}
	
	</style>
</head>

<body>
	<div class="container">

		<div class="table1">
			<h2>Simple Pagination Example using Datatables Js Library</h2>
			<table class="table table-fluid" id="myTable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Manufacturer</th>
						<th>Unit</th>
						<th>Prescribe</th>
						<th style="display:none">Password</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$conn = mysqli_connect("localhost", "root", "", "registrationdb");
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					$sql = "SELECT * FROM meds";
					$result = $conn->query($sql);
					$output = '';
					if ($result->num_rows > 0) {
						// output data of each row
						while ($row = $result->fetch_assoc()) {
							$output .= '
									<tr>
										<td>' . $row["prop_name"] . '</td>
										<td>' . $row["applicant_name"] . '</td>
										<td>' . $row["unit"] . '</td>
										<td style="display:none"> <input type = "hidden" id="name' . $row['medication_id'] . '" value="' . $row['prop_name'] . '">  </input> </td>
										<td> <button data-id = ' . $row['medication_id'] . '> Prescribe </button> </td>
									</tr>
						';
						}
						echo $output;
						echo "</table>";
					} else {
						echo "0 results";
					}
					$conn->close();
					?>
				</tbody>
			</table>

		</div>


		<div class="table2" id = "displayCheckout">
			

		</div>
	</div>

</body>

</html>





<script>
	$(document).ready(function() {
		$('button').click(function() {
			id = $(this).data('id');
			name = $('#name' + id).val();
			console.log(id);
			console.log(name);
			$.ajax ({
				url: 'cart.php',
				method:'POST',
				dataType: 'json',
				data: {
					cart_id: id,
					cart_name: name,
					action:'add'
				},
				success: function(data) {
					$('#displayCheckout').html(data)
				}
			}).fail(function (xhr, textStatus, errorThrown){
				alert(xhr.responseText)
			}) 
		})
	})
</script>

<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>