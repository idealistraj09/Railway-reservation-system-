<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booking</title>
    <link rel="stylesheet" href="../css/myacc.css">
    <link rel="stylesheet" href="../css/allinone.css">
</head>

<body>
    <?php
    ini_set('session.gc_maxlifetime', 360000);
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
                        <li class='menu__group'><a href='../include/logout.php' class='menu'>Log Out</a></li>
                        <li><a href="../php/forgot.php">Forgot Password</a></li>
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
                <h3 style="margin-left: 19%;">Total Ticket Booked: <?php echo $count; ?></h3>
                </div>
            </div>
        </div>
        <div class="right">
            
            <div class="booked">
                <ul class="ultrains">
                    
                    <?php
                        $book = "select * from seat where user_id='$_SESSION[uname]'";
                        if($query = mysqli_query($con, $book)){}else{echo mysqli_error($con);}
                        $train_count = mysqli_num_rows($query);
                        $row1 = mysqli_fetch_assoc($query);
                        if($train_count > 0){
                            echo "<h3>Ticket You Booked earlier....</h3>";
                        }
                        else{
                            echo "<h3>No Ticket Booked yet </h3>";
                        }
                    while($row1)
                    {
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
                        echo "<li class='show'>";
                        echo "<h3 style='margin-top:1%;'> "." $row2[Train_name] "." </h3>";
                        echo " "." $row3[train_type] "." <br>";
                        echo "<span style='margin-bottom:10px;'> Passsenger Name :"." $row1[passsenger_id] "." </span><br>";
                        echo "<span style='float:left;'> From :"." $row4[Source_station_id] "." </span>";
                        echo "<span style='float:right;'> To :"." $row4[Destination_station_id] "." </span><br>";
                        echo "<span style='float:left;'> Arrival-Time :"." $row2[Arrival_time] "." </span><br>";
                        echo "<span style='float:right;'> Departure-Time :"." $row2[Departure_time] "." </span><br>";
                        echo "<span style='float:left;'> Date :"." $row1[Date] "." </span><br>";
                        echo "<span  style='float:right;' class='date1'> SeatNo :"." $row1[Seat_no] "." </span><br>";
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