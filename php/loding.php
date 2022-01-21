<!DOCTYPE html>
<html>
<?php
session_start();
include("../include/connection.php");
$otp = $_SESSION['otp'];
$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$fname =   $_SESSION['Fname'];
$lname =  $_SESSION['Lname'];
$email =   $_SESSION['mailid'];
$drone = $_SESSION['gender'];
$no =   $_SESSION['no'];
$date1 =   $_SESSION['bdate'];
$city =   $_SESSION['city'];
$state =  $_SESSION['state'];
$ladd =   $_SESSION['ladd'];
$repass = $_SESSION['repass'];
$userotp = $_SESSION['userotp'];

if ($otp == ) {

   $s = "INSERT INTO passenger(passenger_id, PasswordT, First_Name, Last_Name, Email, Gender, Mobile_No, Date_of_birth, City, StateT, Local_address) VALUES ('$uname','$pass','$fname','$lname','$email','$drone','$no','$date1','$city','$state','$ladd' );";

   if (mysqli_query($con, $s)) {
?>
      <script>
         alert('record inserted');
      </script>
   <?php
   } else {
      echo "ERROR: Could not able to execute $s. " . mysqli_error($con);
   }

   ?>
   <script>
      alert('email varified');
   </script>
<?php
} else {
?>
   <script>
      alert('otp wronge !!!');
   </script>
<?php
}



?>

<body>

</body>

</html>