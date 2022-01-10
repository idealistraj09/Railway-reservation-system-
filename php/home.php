<!DOCTYPE html>
<html lang="en">

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
      <h1 class="logo">Railway Reservation System</h1>
        <ul class="nav nav-right">
          <li class="menu__group"><a href="../php/signin.php" class="menu__link r-link text-underlined">Login</a></li>
          <li class="menu__group"><a href="../php/signup.php" class="menu__link r-link text-underlined">Register</a></li>
          <li class="menu__group"><a href="#0" class="menu__link r-link text-underlined">About Us</a></li>
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
      <h1>Book Ticket</h1>
      <input type="text" placeholder="Source" name="source" id="c"> <br>
      <button onclick="swap()" type="button"><img src="../img/ex.png" height="30px" width="30px" /></button><br>
      <input type="text" placeholder="Destination" name="destination" id="d"><br>
      <input type="date" name="date">
      <select name="seat" id="" require>
        <option value="">--Select--</option>
        <option value="acseat">AC seat</option>
        <option value="nonac">Non AC</option>
        <option value="sleeper">Sleeper</option>
        <option value="seater">Seater</option>
      </select><br>
      <input type="submit" name="search" value="Search" formAction="show.php">
    </form>
  </div>
  <!--/.container-->
</body>
</html>