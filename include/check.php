<?php  
//check.php  
session_start();
include("../include/connection.php"); 
if(isset($_POST["uname"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["uname"]);
 $query = "SELECT * FROM passenger WHERE Admin_id = '".$username."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}
?>