<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/myacc.css">
    <script src="time.js"></script>
    <title>My Account</title>
</head>

<body>
    <?php
session_start();
include("../include/connection.php");
?>    
<nav class="navbar">
        <div class="navbar2">
            <div class="navbar3">
                <ul class="nav nav-right">
                    <li>
                        <h1 class="logo">Railway Reservation System </h1>
                    </li>
                    <div class="menubar">
                        <li><a href="../php/home.php">Home</a></li>
                        <li><a>Forgot Password</a></li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main">
        <div class="left">
            <div class="sub-main">
                <div class="photo">
                <img src="../img/avatar.jpg" height="147px" width="149px">
                <span><?php echo $_SESSION['uname']; ?></span>
                </div>
                <div class="buttons">
                    <button type="button" class="submenu-btn">Profile</button>
                    <button type="button" class="submenu-btn">Login Detail</button>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="profile">
                <div class="que">
                <span>Full Name : </span>
                <span>Birth-date :</span>
                <span>Gender :</span>
                <span>City :</span>
                <span>Address :</span>
                </div>
                <div class="ans">
                <span>Full Name </span>
                <span>Birth-date</span>
                <span>Gender</span>
                <span>City</span>
                <span>Address</span>
                </div>
            </div>
            <div class="profile2">
            <span>hi</span>
        </div>
        </div>
    </div>
</body>

</html>