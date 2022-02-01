<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/train.css">
   <script src="../js/time.js"></script>
   <script src="../js/scroll.js"></script>
   <title>RRS - Trains</title>
</head>

<body>
   <?php

   session_start();
   include("../include/connection.php");
   $sstation = $_SESSION['sstation'];
   $dstation = $_SESSION['dstation'];





   ?>

   <nav class="navbar">
      <div class="navbar2">
         <div class="navbar3">
            <h1 class="logo">Railway Reservation System </h1>
            <span style="margin-left: 10px; font-size: 18px;">Trains</span>
            <ul class="nav nav-right">
               <li><span id="welcome"></span></li>
               <li class="menu__group"><a href="../php/signin.php" class="menu__link r-link text-underlined">SignIn</a></li>
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
   <div class="container">

      <aside class="container_top">
         <ul>
            <li><span class="titlefilter">Quick Filters</span></li>
            <li><input type="checkbox"><span>AC</span></li>
            <li><input type="checkbox"><span>Available</span></li>
            <li><input type="checkbox"><span>Between 12PM to 12AM</span></li>
            <li><input type="checkbox"><span>Between 12AM to 12PM</span></li>
         </ul>
      </aside>
      <div class="container_middel">
         <ul>
            <li><span class="titlefilter">Train Types</span></li>
            <li><input type="checkbox"><span>Special Trains -
                  SP</span></li>
            <li><input type="checkbox"><span>Rajdhani -
                  R</span></li>
            <li><input type="checkbox"><span>Special Tatkal Trains -
                  ST</span></li>
            <li><input type="checkbox"><span>Others -
                  O</span></li>
         </ul>
      </div>

      <aside class="container_buttom">
         <ul>
            <li><span class="titlefilter">Journey Class Filters</span></li>
            <li><input type="checkbox"><span>1st Class AC -1A</span></li>
            <li><input type="checkbox"><span>2 Tier AC -2A</span></li>
            <li><input type="checkbox"><span>Sleeper -
                  SL</span></li>
            <li><input type="checkbox"><span>Seater</span></li>
         </ul>
      </aside>
   </div>
   <div class="main">
      <div id="thumb-wrap">
         <ul>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
            <li>
               <button>25 jan,tue</button>
            </li>
         </ul>
      </div>
      <div class="maintrain">
         <ul class="ultrains">

            <?php
            $train_search = "SELECT * FROM `train` WHERE Tour_id=(select Tour_id from `tour` where Source_station_id='$sstation' and Destination_station_id='$dstation');";
            $query = mysqli_query($con, $train_search);

            $train_count = mysqli_num_rows($query);
            $row1 = mysqli_fetch_assoc($query);
            while ($row1) {
               
               
               $d=date('D', strtotime($row1['Date']));
               echo "<li class='trains'>";
               echo "<h2 class='trainname'>" . $row1['Train_name'] . "</h2><span class='traindate'>" . $row1['Date'] .",  ".$d ."</span><br><br>";
               echo "<span class='traintime'>" . $row1['Arrival_time'] . "</span>"."<span class='design'>|--------------------------|</span>";
               echo "<span class='traindtime'>" . $row1['Departure_time'] . "</span><br>";
               echo "";
               echo "</li>";



               $row1 = mysqli_fetch_assoc($query);
            }
            ?>
         </ul>
      </div>
   </div>

</body>

</html>