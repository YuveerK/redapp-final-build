<?php
$dfname = $_SESSION['first_name'];
$dlname =$_SESSION['last_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Red App</title>
    <!-- using online links -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sidebar-themes.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
</head>

<body>
    <div class="page-wrapper default-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-lg btn-dark" href="#">
            <i class="fas fa-bars"></i> Menu
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                <div class="sidebar-item sidebar-brand">
                    <a href="#">Red App</a>
                    <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                    Close
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="img/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Dr <?php echo $dfname;?>
                            <strong><?php echo $dlname;?></strong>
                        </span>
                        <span class="user-role">Doctor</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Menu</span>
                        </li>
                        <li class="sidebar">
                            <a href="doctor_home.php">
                                 <i class="fas fa-home"></i>
                                <span class="menu-text">Home</span>
                              
                            </a>

                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                            <i class="fas fa-file-medical-alt"></i>
                                <span class="menu-text">Reports</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="doctor_reports.php">Patient Reports

                                        </a>
                                    </li>
                                    <li>
                                        <a href="patientlist.php">Add New Report

                                        </a>
                                    </li>
                                    <li>
                                        <a href="doc_templates.php">Document Templates

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                            <i class="fas fa-users"></i>
                                <span class="menu-text">Patients</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="doctor_appointments.php">View All Appointments</a>
                                    </li>
                                    <li>
                                        <a href="doctor_patients.php">Patient List</a>
                                    </li>
                                    <li>
                                        <a href="doc_pathist.php">Patient History</a>
                                    </li>
                                    <li>
                                        <a href="patient-presc.php">Prescription</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                            <i class="far fa-credit-card"></i>
                                <span class="menu-text">Billing</span>
                                
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="appointment-list.php">Generate Invoice</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="sidebar">
                            <a href="templates/Operational_Manual_Red_App_Doctor.pdf" download>
                            <i class="fas fa-hands-helping"></i>
                            
                                <span class="menu-text">Help</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="doctor_settings.php">
                            <i class="fas fa-cogs"></i>
                                <span class="menu-text">Settings</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="doctor_sigin.php">
                            <i class="fas fa-sign-out-alt"></i>
                                <span class="menu-text">Logout</span>
                            </a>
                        </li>
                </div>
                <!-- sidebar-menu  -->
            </div>
        </nav>
    </div>
    <!-- page-wrapper -->

    <!-- using online scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script src="js/sidebar.js"></script>
</body>

</html>