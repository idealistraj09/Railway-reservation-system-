<!DOCTYPE html>
<html lang="en">
<?php
$msg = "";
$msg1 = "";
session_start();
include("../include/connection.php");
if (isset($_SESSION['logged_as_user'])) {
  $msg = "Welcome " . $_SESSION['uname'];
} elseif (isset($_SESSION['logged_as_admin'])) {
  $msg = "Welcome " . $_SESSION['Admin_name'];
  $msg1 = "Admin Panel";
}

?>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="../css/home_css.css">
  <script src="../js/time.js"></script>
</head>

<body onload="initClock()">
  <!-- navbar -->
  <nav class="navbar">
    <div class="navbar2">
      <div class="navbar3">
        <h1 class="logo">Railway Reservation System </h1>

        <ul class="nav nav-right">
          <?php
          if (isset($_SESSION['logged_as_user'])) {
            echo "<li>
            <div class='dropdown'>
                <button class='dropbtn'>$msg</button>
                <div class='dropdown-content'>
                <a href='../php/myacc.php'>My Profile</a>
                    <a href='../php/mybook.php'>My Booking</a>
                </div>
            </div>
        </li>";
            echo "<li class='menu__group'><a href='../include/logout.php' class='menu'>Log Out</a></li>";
          } else {
            echo "<li class='menu__group'><a href='../php/signin.php' class='menu'>Sign In</a></li>";
            echo "<li class='menu__group'><a href='../php/signup.php' class='menu'>Sign Up</a></li>";
          }
          ?>


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
    <!--/.container-->
  </nav>
  <!--/.navbar-->
  <div class="container">
    <form action="#" method="POST">
      <h1>Search Train</h1>
      <select name="source" id="c" required> <br>
        <option selected disabled value="">--Source Station--</option>
        <?php
        $des_search = "select DISTINCT(Source_station_id) from tour;";
        if ($query_des = mysqli_query($con, $des_search)) {
        } else {
          echo mysqli_error($con);
        };
        $des = mysqli_fetch_assoc($query_des);
        while ($des) {
          echo "<option>" . "$des[Source_station_id]" . "</option>";
          $des = mysqli_fetch_assoc($query_des);
        }

        ?>
      </select>
      <button onclick="swap()" type="button"><img src="../img/ex.png" height="30px" width="30px" /></button><br>
      <select name="destination" id="d" required>
        <option selected disabled value="">--Destination Station--</option>
        <?php
        $des_search = "select DISTINCT(Destination_station_id) from tour;";
        if ($query_des = mysqli_query($con, $des_search)) {
        } else {
          echo mysqli_error($con);
        };
        $des = mysqli_fetch_assoc($query_des);
        while ($des) {
          echo "<option>" . "$des[Destination_station_id]" . "</option>";
          $des = mysqli_fetch_assoc($query_des);
        }

        ?>


      </select><br>
      <input type="date" name="date" id="datefield" required>
      <br>
      <input type="submit" name="search" value="Search">
    </form>
  </div>
  <!--/.container-->
  <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
      dd = '0' + dd;
    }

    if (mm < 10) {
      mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datefield").setAttribute("min", today);
  </script>
</body>
<?php

if (isset($_POST['search'])) {
  

    if ($_REQUEST['source'] == $_REQUEST['destination']) {
?>
      <script>
        alert('SOURCE AND DESTINATION STATION IS SAME SELECT DIFFRENT TO CONTINUE')
      </script>
    <?php
    } else {
      $_SESSION['sstation'] = mysqli_real_escape_string($con, @$_REQUEST['source']);
      $_SESSION['dstation'] = mysqli_real_escape_string($con, @$_REQUEST['destination']);
      $_SESSION['datebook'] = mysqli_real_escape_string($con, @$_REQUEST['date']);
      header('Location: show.php');
    }
  
}


?>

</html>