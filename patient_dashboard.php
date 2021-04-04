<?php
include_once('header1.php');
require_once('connection.php');
include('functions.php');

$id = $_SESSION['patient_id'];
$fname = $lname = $email = $gender = $patient_heart_rate = '';

$sql = "SELECT * FROM patient_cholesterol WHERE patient_id = $id ORDER BY cholesterol_date ASC";
$result = mysqli_query($conn, $sql);

$sql_1 = "SELECT * FROM blood_pressure WHERE patient_id = $id ORDER BY bp_date ASC";
$result_1 = mysqli_query($conn, $sql_1);

$sql_2 = "SELECT * FROM patient_blood_sugar WHERE patient_id = $id ORDER BY date ASC";
$result_2 = mysqli_query($conn, $sql_2);

$sql_3 = "SELECT * FROM patient_heart_rate WHERE patient_id = $id ORDER BY date DESC LIMIT 1";
$result_3 = mysqli_query($conn, $sql_3);

$sql_4 = "SELECT * FROM patient_blood_sugar WHERE patient_id = $id ORDER BY date DESC LIMIT 1";
$result_4 = mysqli_query($conn, $sql_4);

$sql_5 = "SELECT * FROM patient_complaints WHERE patient_id = $id ORDER BY date DESC LIMIT 1";
$result_5 = mysqli_query($conn, $sql_5);


$json = [];
$json2 = [];

$json_systolic_value = [];
$json_diastolic_value = [];
$json_bp_date = [];

$json_heart_rate_date = [];
$json_heart_rate = [];



if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $json[] = (int)$cholesterol_value;
    $json2[] = $cholesterol_date;
  }
}

if (mysqli_num_rows($result_1) > 0) {
  while ($row = mysqli_fetch_assoc($result_1)) {
    extract($row);
    $json_systolic_value[] = (int)$systolic_value;
    $json_diastolic_value[] = (int)$diastolic_value;
    $json_bp_date[] = $bp_date;
  }
}

if (mysqli_num_rows($result_2) > 0) {
  while ($row = mysqli_fetch_assoc($result_2)) {
    extract($row);
    $json_heart_rate[] = (int)$blood_sugar_value;
    $json_heart_rate_date[] = $date;
  }
}

if (mysqli_num_rows($result_3) > 0) {
  while ($row = mysqli_fetch_assoc($result_3)) {
    extract($row);
    $patient_heart_rate = (int)$heart_rate;
    $patient_heart_rate_date = $date;
  }
}

if (mysqli_num_rows($result_4) > 0) {
  while ($row = mysqli_fetch_assoc($result_4)) {
    extract($row);
    $patient_blood_sugar = (float)$blood_sugar_value;
    $date_bs = $date;
  }
}

if (mysqli_num_rows($result_5) > 0) {
  while ($row = mysqli_fetch_assoc($result_5)) {
    extract($row);
    $patient_complaint = $complaint;
    $date_complaint = $date;
  }
}


$myArr = array('1', '584', '547', '2', '147');
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Red App Dash Board</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>

<body id="page-top" onload="startTime()">





  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        </nav>





        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



          <!-- Content Row -->
          <div class="row">

            <!-- Heart Beat Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-bodys">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Heart Rate</div>

                      <?php if (mysqli_num_rows($result_4) > 0) : ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $patient_heart_rate . " " . "Bpm" . " " . "as of" . " " . $date ?></div>
                      <?php endif; ?>
                      <?php if (!mysqli_num_rows($result_4) > 0) : ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">You do not have any data to show</div>
                      <?php endif; ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-heartbeat fa-2x text-danger""></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
            <div class=" col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-bodys">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Blood Glucose</div>

                                <?php if (mysqli_num_rows($result_4) > 0) : ?>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $patient_blood_sugar . " " . "mmol/L" . " " . "as of" . " " . $date_bs ?></div>
                                <?php endif; ?>
                                <?php if (!mysqli_num_rows($result_4) > 0) : ?>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">You do not have any data to show</div>
                                <?php endif; ?>


                              </div>
                              <div class="col-auto">
                                <i class="fas fa-burn fa-2x text-danger""></i>
                    </div>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class=" col-xl-3 col-md-6 mb-4">
                                  <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-bodys">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Last Complaint</div>
                                          <?php if (mysqli_num_rows($result_5) > 0) : ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $patient_complaint . " " . "as of" . " " . $date_complaint ?></div>
                                          <?php endif; ?>
                                          <?php if (!mysqli_num_rows($result_5) > 0) : ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">You do not have any data to show</div>
                                          <?php endif; ?>
                                        </div>
                                        <div class="col-auto">
                                          <i class="fas fa-clipboard-list fa-2x text-danger"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <!-- Pending Requests Card Example -->
                              <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                  <div class="card-bodys">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Date and Time</div>

                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="txt">
                                          <script>
                                            function startTime() {
                                              var today = new Date();
                                              var h = today.getHours();
                                              var m = today.getMinutes();
                                              var s = today.getSeconds();
                                              var d = today.getDate();
                                              var month = today.getMonth() + 1;
                                              var y = today.getFullYear();

                                              m = checkTime(m);
                                              s = checkTime(s);

                                              document.getElementById('txt').innerHTML =
                                                d + "/" + month + "/" + y + "<br />" + h + ":" + m + ":" + s;
                                              var t = setTimeout(startTime, 500);
                                            }

                                            function checkTime(i) {
                                              if (i < 10) {
                                                i = "0" + i
                                              }; // add zero in front of numbers < 10
                                              return i;
                                            }
                                          </script>



                                        </div>


                                      </div>
                                      <div class="col-auto">
                                        <i class="fas fa-calendar-alt	 fa-2x text-danger"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Content Row -->

                            <div class="row">

                              <!-- Area Chart -->
                              <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                  <!-- Card Header - Dropdown -->
                                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Cholestrol</h6>
                                    <div class="dropdown no-arrow">
                                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                      </a>

                                    </div>
                                  </div>
                                  <!-- Card Body -->
                                  <div class="card-body">
                                    <div class="chart-area">
                                      <canvas id="myAreaChart"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Pie Chart -->
                              <!-- Content Column -->
                              <div class="col-lg-6 mb-4">

                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                  <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Heart Rate</h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="chart-area">
                                      <canvas id="myAreas"></canvas>
                                    </div>
                                    <script>
                                      var arr = <?php echo json_encode($myArr); ?>;


                                      // Set new default font family and font color to mimic Bootstrap's default styling
                                      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                                      Chart.defaults.global.defaultFontColor = '#858796';

                                      function number_format(number, decimals, dec_point, thousands_sep) {
                                        // *     example: number_format(1234.56, 2, ',', ' ');
                                        // *     return: '1 234,56'
                                        number = (number + '').replace(',', '').replace(' ', '');
                                        var n = !isFinite(+number) ? 0 : +number,
                                          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                                          sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                                          dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                                          s = '',
                                          toFixedFix = function(n, prec) {
                                            var k = Math.pow(10, prec);
                                            return '' + Math.round(n * k) / k;
                                          };
                                        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                                        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                                        if (s[0].length > 3) {
                                          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                                        }
                                        if ((s[1] || '').length < prec) {
                                          s[1] = s[1] || '';
                                          s[1] += new Array(prec - s[1].length + 1).join('0');
                                        }
                                        return s.join(dec);
                                      }

                                      // Area Chart Example
                                      var marks = [89, 2, 3, 54, 5, 6];
                                      var ctx = document.getElementById("myAreas");
                                      var myLineChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                          labels: <?php echo json_encode($json_heart_rate_date); ?>,
                                          datasets: [{
                                              label: "Systolic BP",
                                              lineTension: 0.3,
                                              backgroundColor: "rgba(11,156,49,0.2)",
                                              borderColor: "rgba(11,156,49,0.6)",
                                              pointRadius: 3,
                                              pointBackgroundColor: "rgba(11,156,49,0.6)",
                                              pointBorderColor: "rgba(11,156,49,0.6)",
                                              pointHoverRadius: 3,
                                              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                              pointHitRadius: 10,
                                              pointBorderWidth: 2,
                                              data: <?php echo json_encode($json_heart_rate); ?>,
                                            },



                                          ],
                                        },
                                        options: {
                                          maintainAspectRatio: false,
                                          layout: {
                                            padding: {
                                              left: 10,
                                              right: 25,
                                              top: 25,
                                              bottom: 0
                                            }
                                          },
                                          scales: {
                                            xAxes: [{
                                              time: {
                                                unit: 'date'
                                              },
                                              gridLines: {
                                                display: false,
                                                drawBorder: false
                                              },
                                              ticks: {
                                                maxTicksLimit: 7
                                              }
                                            }],
                                            yAxes: [{
                                              ticks: {
                                                maxTicksLimit: 5,
                                                padding: 10,
                                                // Include a dollar sign in the ticks
                                                callback: function(value, index, values) {
                                                  return number_format(value) + " " + 'mmol/L';
                                                }
                                              },
                                              gridLines: {
                                                color: "rgb(234, 236, 244)",
                                                zeroLineColor: "rgb(234, 236, 244)",
                                                drawBorder: false,
                                                borderDash: [2],
                                                zeroLineBorderDash: [2]
                                              }
                                            }],
                                          },
                                          legend: {
                                            display: false
                                          },
                                          tooltips: {
                                            backgroundColor: "rgb(255,255,255)",
                                            bodyFontColor: "#858796",
                                            titleMarginBottom: 10,
                                            titleFontColor: '#6e707e',
                                            titleFontSize: 14,
                                            borderColor: '#dddfeb',
                                            borderWidth: 1,
                                            xPadding: 15,
                                            yPadding: 15,
                                            displayColors: false,
                                            intersect: false,
                                            mode: 'index',
                                            caretPadding: 10,
                                            callbacks: {
                                              label: function(tooltipItem, chart) {
                                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                                              }
                                            }
                                          }
                                        }
                                      });
                                    </script>
                                  </div>
                                </div>


                              </div>
                            </div>

                            <!-- Content Row -->
                            <div class="row">

                              <!-- Content Column -->
                              <div class="col-lg-6 mb-4">

                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                  <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Blood Pressure</h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="chart-area">
                                      <canvas id="myArea"></canvas>
                                    </div>
                                    <script>
                                      var arr = <?php echo json_encode($myArr); ?>;


                                      // Set new default font family and font color to mimic Bootstrap's default styling
                                      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                                      Chart.defaults.global.defaultFontColor = '#858796';

                                      function number_format(number, decimals, dec_point, thousands_sep) {
                                        // *     example: number_format(1234.56, 2, ',', ' ');
                                        // *     return: '1 234,56'
                                        number = (number + '').replace(',', '').replace(' ', '');
                                        var n = !isFinite(+number) ? 0 : +number,
                                          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                                          sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                                          dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                                          s = '',
                                          toFixedFix = function(n, prec) {
                                            var k = Math.pow(10, prec);
                                            return '' + Math.round(n * k) / k;
                                          };
                                        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                                        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                                        if (s[0].length > 3) {
                                          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                                        }
                                        if ((s[1] || '').length < prec) {
                                          s[1] = s[1] || '';
                                          s[1] += new Array(prec - s[1].length + 1).join('0');
                                        }
                                        return s.join(dec);
                                      }

                                      // Area Chart Example
                                      var marks = [89, 2, 3, 54, 5, 6];
                                      var ctx = document.getElementById("myArea");
                                      var myLineChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                          labels: <?php echo json_encode($json_bp_date); ?>,
                                          datasets: [{
                                              label: "Systolic BP",
                                              lineTension: 0.3,
                                              backgroundColor: "rgba(255, 255, 255, 0.05)",
                                              borderColor: "rgba(255, 0, 0, 1)",
                                              pointRadius: 3,
                                              pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                              pointBorderColor: "rgba(78, 115, 223, 1)",
                                              pointHoverRadius: 3,
                                              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                              pointHitRadius: 10,
                                              pointBorderWidth: 2,
                                              data: <?php echo json_encode($json_systolic_value); ?>,
                                            }, {
                                              label: 'Diastolic BP',
                                              lineTension: 0.3,
                                              backgroundColor: "rgba(78, 120, 223, 0.05)",
                                              borderColor: "rgba(78, 115, 223, 1)",
                                              pointRadius: 3,
                                              pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                              pointBorderColor: "rgba(78, 115, 223, 1)",
                                              pointHoverRadius: 3,
                                              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                              pointHitRadius: 10,
                                              pointBorderWidth: 2,
                                              data: <?php echo json_encode($json_diastolic_value); ?>,
                                              type: 'line'

                                            }



                                          ],
                                        },
                                        options: {
                                          maintainAspectRatio: false,
                                          layout: {
                                            padding: {
                                              left: 10,
                                              right: 25,
                                              top: 25,
                                              bottom: 0
                                            }
                                          },
                                          scales: {
                                            xAxes: [{
                                              time: {
                                                unit: 'date'
                                              },
                                              gridLines: {
                                                display: false,
                                                drawBorder: false
                                              },
                                              ticks: {
                                                maxTicksLimit: 7
                                              }
                                            }],
                                            yAxes: [{
                                              ticks: {
                                                maxTicksLimit: 5,
                                                padding: 10,
                                                // Include a dollar sign in the ticks
                                                callback: function(value, index, values) {
                                                  return 'mg/dL' + number_format(value);
                                                }
                                              },
                                              gridLines: {
                                                color: "rgb(234, 236, 244)",
                                                zeroLineColor: "rgb(234, 236, 244)",
                                                drawBorder: false,
                                                borderDash: [2],
                                                zeroLineBorderDash: [2]
                                              }
                                            }],
                                          },
                                          legend: {
                                            display: false
                                          },
                                          tooltips: {
                                            backgroundColor: "rgb(255,255,255)",
                                            bodyFontColor: "#858796",
                                            titleMarginBottom: 10,
                                            titleFontColor: '#6e707e',
                                            titleFontSize: 14,
                                            borderColor: '#dddfeb',
                                            borderWidth: 1,
                                            xPadding: 15,
                                            yPadding: 15,
                                            displayColors: false,
                                            intersect: false,
                                            mode: 'index',
                                            caretPadding: 10,
                                            callbacks: {
                                              label: function(tooltipItem, chart) {
                                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                                              }
                                            }
                                          }
                                        }
                                      });
                                    </script>
                                  </div>
                                </div>


                              </div>

                              <div class="col-lg-6 mb-4">

                                <!-- Consultations -->
                                <div class="card shadow mb-4">
                                  <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> Upcoming Consultations</h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="text-center">
                                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                                    </div>
                                    <table style="width:100%">
                                      <?php


                                      ?>
                                      <tr>
                                        <th>Doctor</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Contact</th>


                                      </tr>
                                      <?php
                                      $con = mysqli_connect("localhost", "root", "", "registrationdb");
                                      global $con;

                                      $query = "select * from appointmenttb where pid='$id' AND doctorStatus = '1' limit 5 ;";
                                      $result = mysqli_query($con, $query);
                                      while ($row = mysqli_fetch_array($result)) {
                                      ?>
                                        <tr>

                                          <td><?php echo $row['doctor']; ?> </td>
                                          <td><?php echo $row['appdate']; ?></td>
                                          <td><?php echo $row['apptime']; ?> </td>
                                          <td><?php echo $row['contact']; ?> </td>


                                        </tr></a>
                                      <?php } ?>

                                    </table>
                                  </div>
                                </div>



                              </div>
                              <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->

                            <!-- Footer -->


                            <footer class="sticky-footer bg-white">
                              <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                </div>
                              </div>
                            </footer>
                            <!-- End of Footer -->

                          </div>
                          <!-- End of Content Wrapper -->

                        </div>
                        <!-- End of Page Wrapper -->

                        <!-- Scroll to Top Button-->
                        <a class="scroll-to-top rounded" href="#page-top">
                          <i class="fas fa-angle-up"></i>
                        </a>


                        <!-- Bootstrap core JavaScript-->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Core plugin JavaScript-->
                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                        <!-- Custom scripts for all pages-->
                        <script src="js/sb-admin-2.min.js"></script>

                        <!-- Page level plugins -->
                        <script src="vendor/chart.js/Chart.min.js"></script>

                        <!-- Page level custom scripts -->
                        <script>
                          var arr = <?php echo json_encode($myArr); ?>;


                          // Set new default font family and font color to mimic Bootstrap's default styling
                          Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                          Chart.defaults.global.defaultFontColor = '#858796';

                          function number_format(number, decimals, dec_point, thousands_sep) {
                            // *     example: number_format(1234.56, 2, ',', ' ');
                            // *     return: '1 234,56'
                            number = (number + '').replace(',', '').replace(' ', '');
                            var n = !isFinite(+number) ? 0 : +number,
                              prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                              sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                              dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                              s = '',
                              toFixedFix = function(n, prec) {
                                var k = Math.pow(10, prec);
                                return '' + Math.round(n * k) / k;
                              };
                            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                            if (s[0].length > 3) {
                              s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                            }
                            if ((s[1] || '').length < prec) {
                              s[1] = s[1] || '';
                              s[1] += new Array(prec - s[1].length + 1).join('0');
                            }
                            return s.join(dec);
                          }

                          // Area Chart Example
                          var marks = [89, 2, 3, 54, 5, 6];
                          var ctx = document.getElementById("myAreaChart");
                          var myLineChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                              labels: <?php echo json_encode($json2); ?>,
                              datasets: [{
                                label: "mg/dL",
                                lineTension: 0.3,
                                backgroundColor: "rgba(244, 247, 118, 1)",
                                borderColor: "rgba(247, 202, 24, 1)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgba(247, 202, 24, 1)",
                                pointBorderColor: "rgba(247, 202, 24, 1)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: <?php echo json_encode($json); ?>,
                              }, ],
                            },
                            options: {
                              maintainAspectRatio: false,
                              layout: {
                                padding: {
                                  left: 10,
                                  right: 25,
                                  top: 25,
                                  bottom: 0
                                }
                              },
                              scales: {
                                xAxes: [{
                                  time: {
                                    unit: 'date'
                                  },
                                  gridLines: {
                                    display: false,
                                    drawBorder: false
                                  },
                                  ticks: {
                                    maxTicksLimit: 7
                                  }
                                }],
                                yAxes: [{
                                  ticks: {
                                    maxTicksLimit: 5,
                                    padding: 10,
                                    // Include a dollar sign in the ticks
                                    callback: function(value, index, values) {
                                      return 'mg/dL' + number_format(value);
                                    }
                                  },
                                  gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                  }
                                }],
                              },
                              legend: {
                                display: false
                              },
                              tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                titleMarginBottom: 10,
                                titleFontColor: '#6e707e',
                                titleFontSize: 14,
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                intersect: false,
                                mode: 'index',
                                caretPadding: 10,
                                callbacks: {
                                  label: function(tooltipItem, chart) {
                                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                    return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                                  }
                                }
                              }
                            }
                          });
                        </script>
                        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>