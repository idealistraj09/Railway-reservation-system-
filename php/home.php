<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/home_css.css">
  <link rel="text/js" href="../js/time.js">
</head>
<body>
  <!-- navbar -->
  <nav class="navbar">
    <div class="navbar2">
      <h1 class="logo">Simple Navbar</h1>
      <ul class="nav nav-right">
        <li><a href="#">SignIn</a></li>
        <li><a href="#">SignUp</a></li>
        <li><a href="#">About Us</a></li>
      </ul>
    </div><!--/.container-->
  </nav><!--/.navbar-->
  <div class="container">
    <form action="show.php" method="POST">
      <h1>Book Ticket</h1>
      <input type="text" placeholder="Source" name="source" id="s"> <br>
      <Button><img src="../img/ex.png" alt="exchange" height="30px" width="30px"></Button> <br>   
      <input type="text" placeholder="Destination" name="destination" id="d"><br>
      <input type="date" name="date">
      <select name="seat" id="" require>
        <option value="">--Select--</option>
        <option value="acseat">AC seat</option>
        <option value="nonac">Non AC</option>
        <option value="sleeper">Sleeper</option>
        <option value="seater">Seater</option>
      </select><br>
      <input type="submit" name="search" value="search">
    </form>
  </div><!--/.container-->

</body>
</html>