<?php
//index.php
session_start();
include_once('sidebar.php');
$con = mysqli_connect("localhost", "root", "", "registrationdb");
$doctor = $_SESSION['first_name'];
$doc_id = $_SESSION['doctor_id'];
$patient_id = $_GET['pid'];
$_SESSION['patient_id'] = $patient_id;
$theID = $_SESSION ['patient_id'];

print_r($theID);
?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP Ajax Shopping Cart by using Bootstrap Popover</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <style>
        .popover {
            width: 100%;
            max-width: 800px;
        }
    </style>
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center"><a href="#">Patient Prescription</a></h3>
        <br />

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">Cart Details</div>
                    <div class="col-md-6" align="right">
                        <button type="button" name="clear_cart" id="clear_cart" class="btn btn-warning btn-xs">Clear</button>
                    </div>
                </div>
            </div>
            <div class="panel-body" id="shopping_cart">

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">Product List</div>
                    <div class="col-md-6" align="right">
                        <button type="button" name="add_to_cart" id="add_to_cart" class="btn btn-success btn-xs">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="panel-body" id="display_item">
                <div class="container">

                    <div class="table1">
                        <h2>List of Medications</h2>
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
                                <td><label><input type="checkbox" class="select_product" data-product_id="' . $row["medication_id"] . '" data-product_name="' . $row["prop_name"] . '" data-product_price="' . $row["applicant_name"] . '" value="">' . $row["prop_name"] . '</label>
                                </td>
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


                    <div class="table2" id="displayCheckout">


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {


        load_cart_data();



        function load_cart_data() {
            $.ajax({
                url: "fetch_cart.php",
                method: "POST",
                success: function(data) {
                    $('#shopping_cart').html(data);
                }
            });
        }

        $(document).on('click', '.select_product', function() {
            var product_id = $(this).data('product_id');
            if ($(this).prop('checked') == true) {
                $('#product_' + product_id).css('background-color', '#f1f1f1');
                $('#product_' + product_id).css('border-color', '#333');
            } else {
                $('#product_' + product_id).css('background-color', 'transparent');
                $('#product_' + product_id).css('border-color', '#ccc');
            }
        });

        $('#add_to_cart').click(function() {
            var product_id = [];
            var product_name = [];
            var product_price = [];
            var action = "add";
            $('.select_product').each(function() {
                if ($(this).prop('checked') == true) {
                    product_id.push($(this).data('product_id'));
                    product_name.push($(this).data('product_name'));
                    product_price.push($(this).data('product_price'));
                }
            });

            if (product_id.length > 0) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        action: action
                    },
                    success: function(data) {
                        $('.select_product').each(function() {
                            if ($(this).prop('checked') == true) {
                                $(this).attr('checked', false);
                                var temp_product_id = $(this).data('product_id');
                                $('#product_' + temp_product_id).css('background-color', 'transparent');
                                $('#product_' + temp_product_id).css('border-color', '#ccc');
                            }
                        });

                        load_cart_data();
                        alert("Item has been Added into Cart");
                    }
                });
            } else {
                alert('Select atleast one item');
            }

        });

        $(document).on('click', '.delete', function() {
            var product_id = $(this).attr("id");
            var action = 'remove';
            if (confirm("Are you sure you want to remove this product?")) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        action: action
                    },
                    success: function() {
                        load_cart_data();
                        alert("Item has been removed from Cart");
                    }
                })
            } else {
                return false;
            }
        });

        $(document).on('click', '#clear_cart', function() {
            var action = 'empty';
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function() {
                    load_cart_data();
                    alert("Your Cart has been clear");
                }
            });
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>