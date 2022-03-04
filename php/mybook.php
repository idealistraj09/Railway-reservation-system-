<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booking</title>
    <link rel="stylesheet" href="../css/myacc.css">
</head>

<body>
    <?php
    session_start();
    include("../include/connection.php");

    $show_detail = "select * from seat where user_id='$_SESSION[uname]'";
    if ($q = mysqli_query($con, $show_detail)) {
        $count = mysqli_num_rows($q);
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
            <h3 style="margin-left: 5%;">Total Ticket Booked: <?php echo $count; ?></h3>
            <div class="booked">
                <ul class="ultrains">
                    <?php
                        $book = "select * from seat where user_id='$_SESSION[uname]'";
                        if($query = mysqli_query($con, $book)){}else{echo mysqli_error($con);}
                        $train_count = mysqli_num_rows($query);
                        $row1 = mysqli_fetch_assoc($query);
                    while($row1)
                    {
                        echo "<li>";
                        $book2 = "select * from train where Train_id='$row1[Train_id]'";
                        if($query2 = mysqli_query($con, $book2)){}else{echo mysqli_error($con);}
                        $train_count = mysqli_num_rows($query2);
                        $row2 = mysqli_fetch_assoc($query2);
                        $book3 = "select * from train_category where train_cat_id='$row2[Train_cat_id]'";
                        if($query3 = mysqli_query($con, $book3)){}else{echo mysqli_error($con);}
                        $train_count = mysqli_num_rows($query3);
                        $row3 = mysqli_fetch_assoc($query3);
                        $book4 = "select * from tour where tour_id='$row2[Tour_id]'";
                        if($query4 = mysqli_query($con, $book4)){}else{echo mysqli_error($con);}
                        $train_count = mysqli_num_rows($query4);
                        $row4 = mysqli_fetch_assoc($query4);
                        echo "<span> "." $row2[Arrival_time] "." </span>";
                        echo "<span> "." $row2[Departure_time] "." </span>";
                        echo "<span> "." $row3[train_type] "." </span>";
                        echo "<span> "." $row2[Train_name] "." </span>";
                        echo "<span> "." $row1[passsenger_id] "." </span>";
                        echo "<span> "." $row4[Source_station_id] "." </span>";
                        echo "<span> "." $row4[Destination_station_id] "." </span>";
                        echo "<span> "." $row1[Seat_no] "." </span>";
                        echo "<span> "." $row1[Date] "." </span>";
                        echo "</li>";
                        $row1 = mysqli_fetch_assoc($query);
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>