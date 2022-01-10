<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../css/home_css.css">
  <link rel="text/js" href="../js/time.js">
</head>

<body onload="initClock()">
  <!-- navbar -->
  <nav class="navbar">
    <div class="navbar2">
      
      <div class="navbar3">
        <ul class="nav nav-right">
          <li></li>
          <li><a href="#">SignIn</a></li>
          <li><a href="#">SignUp</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#0">Login</a></li>
          <li><a href="#0">Register</a></li>
          <li><a href="#0">About Us</a></li>
          <li>
            <div class="datetime">
              <div class="date">
                <span id="dayname">Day</span>
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
      <h1>Book Ticket</h1>
      <input type="text" placeholder="Source" name="source" id="s"> <br>
      <Button><img src="../img/ex.png" alt="exchange" height="30px" width="30px" onclick="swap();"></Button><br>
      <input type="text" placeholder="Destination" name="destination" id="d"><br>
      <input type="date" name="date">
      <select name="seat" id="" require>
      </select><br>
      <input type="submit" name="search" value="search">
    </form>
  </div>
  <!--/.container-->
</body>

</html>