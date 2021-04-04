<!--
Into this file, we create a layout for registration page.
-->
<?php
include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <form action="registration_code.php" method="POST" style="border:1px solid #ccc">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label class="radio-inline"><input type="radio" name="title" value="Mr">Mr</label>
      <label class="radio-inline"><input type="radio" name="title" value="Mrs">Mrs</label>
      <label class="radio-inline"><input type="radio" name="title" value="Miss">Miss</label>


      <br>
      <br>

      <label for="initials"><b>Initials</b></label>
      <input type="text" placeholder="Enter initials" name="initials" required>

      <label for="firstname"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="firstname" required>

      <br>

      <label for="lastname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lastname" required>

      <br>

      <label for="address_1"><b>Address</b></label>
      <input type="text" placeholder="Enter Address Line 1" name="address_1" required>

      <br>

      <label for="address_2"><b>Address Line 2</b></label>
      <input type="text" placeholder="Enter Address Line 2" name="address_2" required>

      <br>

      <label for="medical_aid_name"><b>Medical Aid Name</b></label>
      <input type="text" placeholder="Enter Medical Aid Name" name="medical_aid_name" required>

      <br>

      <label for="medical_aid_number"><b>Medical Aid Number</b></label>
      <input type="text" placeholder="Enter Medical Aid Number" name="medical_aid_number" required>

      <br>

      <label for="id_number"><b>ID Number</b></label>
      <input type="text" placeholder="Enter ID Number" name="id_number" required>

      <br>

      <label for="employer"><b>Employer</b></label>
      <input type="text" placeholder="Enter name of employer" name="employer" required>

      <br>

      <label for="work_phone"><b>Work Phone Number</b></label>
      <input type="text" placeholder="Enter work phone number" name="work_phone" required>

      <br>

      <label for="home_phone"><b>Home Phone Number</b></label>
      <input type="text" placeholder="Enter home phone number" name="home_phone" required>

      <br>

      <label for="cell_phone"><b>Cell Number</b></label>
      <input type="text" placeholder="Enter cell number" name="cell_phone" required>

      <br>

      <label for="referred_by"><b>Referred By</b></label>
      <input type="text" placeholder="Enter a reference" name="referred_by" required>

      <br>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <br>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <br>

      <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>

      <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
      <br>
      <br>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</body>

</html>