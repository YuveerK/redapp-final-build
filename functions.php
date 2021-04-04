<?php
$con=mysqli_connect("localhost","root","","registrationdb");

function display_specs() {
  global $con;
  $query="select distinct(specialty) from doctor_registration";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result))
  {
    $spec=$row['specialty'];
    echo '<option data-value="'.$spec.'">'.$spec.'</option>';
  }
}


function guidv4($data)
{
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


function display_docs()
{

}

?>