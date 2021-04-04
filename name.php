<?php
session_start();  
 $connect = mysqli_connect("localhost", "root", "", "registrationdb");  

    $doctor = $_SESSION['doctor_id'];
    $timeStamp = date('m/d/Y h:i:s a', time());

     $number = count($_POST["prop_name"]);  
     if($number > 0)  
     {  
          for($i=0; $i<$number; $i++)  
          {  
               if(trim($_POST["pid"][$i] != ''))  
               {  
                    $sql = "INSERT INTO prescription (prop_name,med_id,doc_id,time_stamp,patient_id) VALUES('".mysqli_real_escape_string($connect, $_POST["prop_name"][$i])."','".mysqli_real_escape_string($connect, $_POST["med_id"][$i])."','$doctor','$timeStamp','".mysqli_real_escape_string($connect, $_POST["pid"][$i])."')";  
                    mysqli_query($connect, $sql);  
               }  
          }  
          echo "Prescribed to patient";  
     }

 ?> 