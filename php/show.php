<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/train.css">
   <link rel="stylesheet" href="../css/allinone.css">
   <script src="../js/time.js"></script>
   <script src="../js/scroll.js"></script>
   <title>RRS - Trains</title>
</head>

<body onload="initClock()">
   <?php

   session_start();
   include("../include/connection.php");
   $sstation = $_SESSION['sstation'];
   $dstation = $_SESSION['dstation'];
   $flag99 = 0;
   $rand=rand();
   $_SESSION['rand']=$rand;



   ?>

   <nav class="navbar">
      <div class="navbar2">
         <div class="navbar3">
            <h1 class="logo" id="logo">Railway Reservation System </h1>
            <span style="margin-left: 10px; font-size: 18px;">Trains</span>
            <ul class="nav nav-right">
               <li><span id="welcome"></span></li>
               <li><a href="../php/home.php">Home</a></li>
               <li class="menu__group">
                  <div class="datetime">
                     <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                     </div>
                     <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                     </div>
                  </div>
                  </p>
               </li>
            </ul>
         </div>
      </div>

   </nav>
   
   <div class="main">

      <div class="maintrain">
         <ul class="ultrains">

            <?php
            $ac = 20;
            $nac = 20;
            if(isset($_POST['express']) ){
               $train_search = "SELECT * FROM `train` WHERE Tour_id=(select Tour_id from `tour` where Source_station_id='$sstation' and Destination_station_id='$dstation') and Date='$_SESSION[datebook]' and Train_cat_id='TC1';";
           }else if(isset($_POST['local'])){
            $train_search = "SELECT * FROM `train` WHERE Tour_id=(select Tour_id from `tour` where Source_station_id='$sstation' and Destination_station_id='$dstation') and Date='$_SESSION[datebook]' and Train_cat_id='TC2';";
           }else{
            $train_search = "SELECT * FROM `train` WHERE Tour_id=(select Tour_id from `tour` where Source_station_id='$sstation' and Destination_station_id='$dstation') and Date='$_SESSION[datebook]';";
           
           }
            
            $query = mysqli_query($con, $train_search);
            $train_count = mysqli_num_rows($query);
            if($train_count==0){
               echo "<h1>No Train Found</he >";
            }
            $row1 = mysqli_fetch_assoc($query);
            $train1_search = "SELECT Train_id FROM `train` WHERE Tour_id=(select Tour_id from `tour` where Source_station_id='$sstation' and Destination_station_id='$dstation');";
            
            $query1 = mysqli_query($con, $train1_search);
            $traind_search = "SELECT `Date` FROM `train` WHERE Tour_id=(select Tour_id from `tour` where Source_station_id='$sstation' and Destination_station_id='$dstation');";
            $queryd = mysqli_query($con, $traind_search);
            $trainc_search = "SELECT `Train_cat_id` FROM `train` WHERE Tour_id=(select Tour_id from `tour` where Source_station_id='$sstation' and Destination_station_id='$dstation');";
            $querytc = mysqli_query($con, $trainc_search);
            
            $i = -1;
            $j = 10;
            if($train_count){
               echo "<h3 style='width:100%; margin-left:800px;background-color:#ff4b2b; padding:10px; border-radius:10px'>Total "."$train_count"." Train Avaiable</h3>";
            }
            while ($row1) {
               
               $i = $i + 1;
               $j = $j + 1;
               $seat_limit = 20;
               $s =   date("h.i A", strtotime($row1['Arrival_time']));
               $d =   date("h.i A", strtotime($row1['Departure_time']));

               echo "<li class='trains'>";
               echo "<br>";
               echo "<span class='tname' style='font-size:22px; id='tname''>" . $row1['Train_name'] . "</span>";
               
               echo "<span class='traintime'>" . $s . " (" . $sstation . ")</span><span class='design'>--------------------</span>";
               echo "<span class='traindtime'>" . $d . " (" . $dstation . ")</span><br>";
               
               echo "";


               $aseat_search = "SELECT * FROM `seat` WHERE Train_id='$row1[Train_id]' and Seat_cat_id='SC1' and Seat_availability='C';";
               $query_aseat = mysqli_query($con, $aseat_search);
               $aseat_count = mysqli_num_rows($query_aseat);
               $nseat_search = "SELECT * FROM `seat` WHERE Train_id='$row1[Train_id]' and Seat_cat_id='SC2' and Seat_availability='C' ;";
               $query_nseat = mysqli_query($con, $nseat_search);
               $nseat_count = mysqli_num_rows($query_nseat);
               $fareAC_search = "SELECT * FROM `fare` WHERE Tour_id='$row1[Tour_id]' and  Seat_cat_id='SC1';";
               if($query_fareAC = mysqli_query($con, $fareAC_search)){}else{echo mysqli_error($con);};
               // $fare_count = mysqli_num_rows($query_fare);
               $fareA = mysqli_fetch_assoc($query_fareAC);
               $fareNAC_search = "SELECT * FROM `fare` WHERE Tour_id='$row1[Tour_id]' and  Seat_cat_id='SC2';";
               if($query_fareNAC = mysqli_query($con, $fareNAC_search)){}else{echo mysqli_error($con);};
               // $fare_count = mysqli_num_rows($query_fare);
               $fareN = mysqli_fetch_assoc($query_fareNAC);


               $aseat_ava = 20;
               $nseat_ava = 20;
               if ($aseat_count >= 0) {
                  $aseat_ava = 20 - $aseat_count;
                  if ($aseat_count > 19) {
                     
                     echo "<form method='POST' action='#'><button class='acbutton1' id='hi' disabled> <h3>NO AC Seat Available</h3> </button><br>";
                     ?>
                     <script>document.getElementById("hi").disabled = true;</script>
                     <?php
                  }
                  else if($aseat_count <= 19 ){
                     $aseat_ava = 20 - $aseat_count;
                     $acfare=$fareA['Fare'];
                        if($row1['Train_cat_id']=="TC1"){
                           $acfare= $acfare + 100;
                        }
                        
                        echo "<form method='POST' action='#'><button class='acbutton1' name=$i > <h3>AC Seat ".$acfare."₹</h3> " . " $aseat_ava   " . " AC Seat Available</button><br>";
                     
                  
                  }
               }
               if ($nseat_count >= 0) {
                  $nseat_ava = 20 - $nseat_count;
                  if ($nseat_count > 19) {
                     
                     echo "<button  class='acbutton'  name='hi1' disabled>  <h3>NO NON-AC Seat Available</h3></button><br></form>";
                  }else if($nseat_count <= 19){
                     $nseat_ava = 20 - $nseat_count;
                     
                        $nacfare = $fareN['Fare'];
                        if($row1['Train_cat_id']=="TC1"){
                           $nacfare= $nacfare + 100;
                        }
                        echo "<button  class='acbutton'  name=$j>  <h3>NON-AC Seat ".$nacfare."₹</h3>" . " $nseat_ava  " . " NON-AC Seat Available</button><br></form>";
                     
                  
                  }
               }
               if($row1['Train_cat_id']=="TC1"){
                  echo "<h3><span class='express'>EXPRESS</span></h3>";
               }
               else if($row1['Train_cat_id']=="TC2"){
                  echo "<h3><span class='express'>GENRAL</span></h3>";
               }
               

               
               

               echo "</li>";
               if (isset($_POST[$i])) {
                  
                  for ($r = 0; $r <= $i; $r++) {
                     $row = mysqli_fetch_row($query1);
                     $rowd = mysqli_fetch_row($queryd);
                     $traincat = mysqli_fetch_row($querytc);
                     
                  }
                  
                  $_SESSION['clickes'] = "SC1";
                  $_SESSION['clicket'] = $row[0];
                  $_SESSION['clicked'] = $rowd[0];
                  $_SESSION['clicketc'] = $traincat[0];
                  $query1 = mysqli_query($con, $train1_search);
                  $queryd = mysqli_query($con, $traind_search);
                  $querytc = mysqli_query($con, $trainc_search);
                  
                  if (isset($_SESSION['logged_as_user'])) {
                     ?>
                     
                     <script>location.href = "getuserdata.php";</script>
                  <?php
                  } else {
                    ?>
                    <script>
                      alert('You need to Sign in First');
                    </script>
                     <script>location.href = "signin.php";</script>
                <?php
                  }
                  
               }
               if (isset($_POST[$j])) {
                  for ($r = 0; $r <= $j-11; $r++) {
                     $row = mysqli_fetch_row($query1);
                     $rowd = mysqli_fetch_row($queryd);
                     $traincat = mysqli_fetch_row($querytc);
                  }
                  
                  $_SESSION['clickes'] = "SC2";
                  $_SESSION['clicket'] = $row[0];
                  $_SESSION['clicked'] = $rowd[0];
                  $_SESSION['clicketc'] = $traincat[0];
                  $query1 = mysqli_query($con, $train1_search);
                  $queryd = mysqli_query($con, $traind_search);
                  $querytc = mysqli_query($con, $trainc_search);
                  if (isset($_SESSION['logged_as_user'])) {
                     ?>
                     
                     <script>location.href = "getuserdata.php";</script>
                  <?php
                  } else {
                    ?>
                    <script>
                      alert('You need to Sign in First');
                    </script>
                     <script>location.href = "signin.php";</script>
                <?php
                  }
                  
               }
               $row1 = mysqli_fetch_assoc($query);
            }
            
?>

         </ul>
      </div>
   </div>


</body>

</html>