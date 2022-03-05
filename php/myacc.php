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
    
    $show_detail = "select * from user where user_id='$_SESSION[uname]'";
    if ($q = mysqli_query($con, $show_detail)) {
       
    } else {
        echo "ERROR: Could not able to execute $show_detail. " . mysqli_error($con);
    }
    $row = mysqli_fetch_assoc($q);
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
                        <li class='menu__group'><a href='../include/logout.php' class='menu'>Log Out</a></li>
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
                    <img src="../img/avatar.jpg" height="147px" width="149px"><br>
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
                    <h2 style="margin-left: 100px;">Personal Details</h2>
                    <span>Full Name : </span>
                    <span>Birth-date :</span>
                    <span>Gender :</span>
                    <span>City :</span>
                    <span>Address :</span>
                </div>
                <div class="ans" style="margin-top: 45px;">
                    <span><?php echo $row['First_Name']; ?> </span>
                    <span><?php echo $row['Date_of_birth']; ?></span>
                    <span><?php echo $row['Gender']; ?></span>
                    <span><?php echo $row['City']; ?></span>
                    <span><?php echo $row['Local_address']; ?></span>
                </div>
            </div>
            <div class="profile2">
                <div class="que">
                    <h2 style="margin-left: 100px;">Personal Details</h2>
                    <span>Email : </span>
                    <span>Moile-no :</span>
                    <span>Password :</span>
                    
                </div>
                <div class="ans" >
                    <span><?php echo $row['Email']; ?> </span>
                    <span><?php echo $row['Mobile_No']; ?></span>
                    <a href="../php/forgot.php">Change Password</button></a>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>