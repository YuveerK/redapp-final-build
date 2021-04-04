<?php

  $dfname = $_SESSION['first_name'];
  $dlname =$_SESSION['last_name'];

?>
<!doctype html>
<html lang="en">
  <!-- Favicon  -->
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
<head>

</head>

<style>
 /* The side navigation menu */
 .sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background: #A8B4C5;
  background: linear-gradient(170deg,#EDF0F3 0%, #A8B4C5 250%);
  border-top-right-radius: 25px;
  border-bottom-right-radius: 25px;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  border-radius: 10px 10px 10px 10px;
  text-decoration: none;
  font-size: 25px;
  color: #000;
  display: block;
  transition: 0.3s;
}



/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #FF9999;
}



/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#ham-menu{
  padding-top: 30px;
  padding-left: 30px;
}
/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
  padding: 20px;
}

ion-icon {
    font-size: 50px;
  }

.nav-items{
  padding-top: 20px;
}
@import url('https://fonts.googleapis.com/css?family=Orbitron');

body {
  background-color: #121212;
}

#clock {
  font-family: 'Orbitron', sans-serif;
  color: #000;
  font-size: 30px;
  text-align: center;
  padding-top: 40px;
  padding-bottom: 40px;
  border-top: 10px solid rgba(0,0,0,0);
} 

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
} 
</style>
<body>
<div id="mySidenav" class="sidenav">

<div class="img bg-wrap text-center py-4">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url('');"></div>
	  				<h3>Dr <?php echo $dfname ?> <?php echo $dlname ?>  </h3>
</div>
</div>
<div id="clock"></div>
<h6 style="text-align: center;font-size: 31px;font-weight: 600;"><span id="current_month">May</span> <span id="current_day">5</span>, <span id="current_year">2014</span></h6>
  <div class="nav-items">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="doctor_home.php"><span class="fa fa-home mr-3"></span>Home</a>
          </li>
          <li>
              <a href="doctor_patients.php"><span class="fa fa-users mr-3"></span>My Patients</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-video-camera mr-3"></span>Calls</a>
          </li>
          <li>
            <a href="doctor_reports.php"><span class="fa fa-file-pdf-o mr-3"></span>Reports</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-bar-chart mr-3"></span>Statistics</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cog mr-3 mr-3"></span>Settings</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-credit-card mr-3"></span>Billing</a>
          </li>
          <li>
            <a href="doctor_sigin.php"><span class="fa fa-sign-out mr-3"></span>Sign Out</a>
          </li>
        </ul>
  </div>
</div>

<!-- Use any element to open the sidenav -->
<div id="ham-menu">
<span onclick="openNav()"><ion-icon name="menu-sharp"></ion-icon></span> 
<ion-icon id="go-back" name="arrow-back-outline"></ion-icon>
</div>

<!-- <button  onclick="openNav()">Open<button> -->

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
</body>
<script>
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
} 

function currentTime() {
  var date = new Date(); /* creating object of Date class */
  var day = date.getDay();
  var hour = date.getHours();
  var min = date.getMinutes();
  var sec = date.getSeconds();
  hour = updateTime(hour);
  min = updateTime(min);
  sec = updateTime(sec);
  document.getElementById("clock").innerText = hour + ":" + min + ":" + sec; /* adding time to the div */
    var t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */
}

function updateTime(k) {
  if (k < 10) {
    return "0" + k;
  }
  else {
    return k;
  }
}

document.getElementById('go-back').addEventListener('click', () => {
  history.back();
});

currentTime(); /* calling currentTime() function to initiate the process */

function currentDay(){
  var d = new Date,
  month = new Array;
  month[0] = "January", month[1] = "February", month[2] = "March", month[3] = "April", month[4] = "May", month[5] = "June", month[6] = "July", month[7] = "August", month[8] = "September", month[9] = "October", month[10] = "November", month[11] = "December";
  var month_name = month[d.getMonth()],
	day_of_month = d.getDate(),
	current_year = d.getFullYear(),
	dayOfMonthElement = document.getElementById("current_day"),
	currentMonthElement = document.getElementById("current_month"),
	currentYearElement = document.getElementById("current_year");
! function () {
	currentMonthElement.innerHTML = month_name, dayOfMonthElement.innerHTML = day_of_month, currentYearElement.innerHTML = current_year
}();
}

currentDay();
</script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</html>