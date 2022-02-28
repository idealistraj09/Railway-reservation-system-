<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/print.css">
    
    <script src="../js/time.js"></script>


    <title>RRS - payment</title>
</head>

<body onload="initClock()" style="background-color: #ffb242;">
    <?php

    session_start();
    include("../include/connection.php");
            $s = strval($_SESSION['Fname2']) . strval($_SESSION['Lname2']);
            $select_pass2 = "select * from `seat` where Date='$_SESSION[clicked]' and passsenger_id='$s' and Seat_cat_id='$_SESSION[clickes]' and Train_id='$_SESSION[clicket]';";
            if($query2 = mysqli_query($con, $select_pass2)){}else{echo mysqli_error($con);};
            $row = mysqli_fetch_array($query2);



    ?>

    <nav class="navbar">
        <div class="navbar2">
            <div class="navbar3">

                <ul class="nav nav-right">
                    <li>
                        <h1 class="logo" id="logo">Railway Reservation System </h1>
                    </li>
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
    <div class="wrapper" id="hi">
        <div class="bill">
            <div class="minibill">
                <ul><br>
                    <li><span class="lispan">Train Id: </span><span class="line">-</span><span class="ans"><?php echo $_SESSION['clicket']; ?></span></li><br>
                    <li><span class="lispan">From: </span><span class="line">-</span><span class="ans"><?php echo $_SESSION['sstation']; ?></span></li><br>
                    <li><span class="lispan">To:</span><span class="line">-</span><span class="ans"><?php echo $_SESSION['dstation']; ?></span></li><br>
                    <li><span class="lispan">Date: </span><span class="line">-</span><span class="ans"><?php echo $_SESSION['datebook']; ?></span></li><br>
                    <li><span class="lispan">Train type:</span><span class="line"> -</span><span class="ans"><?php echo $_SESSION['tcategory']; ?></span></li><br>
                    <li><span class="lispan">Seat Type:</span><span class="line"> -</span><span class="ans"><?php echo $_SESSION['scategory']; ?></span></li><br>
                    <li><span class="lispan">One Passenger Fare:</span><span class="line"> -</span><span class="ans"><?php echo $_SESSION['fare'] . "₹"; ?></span></li><br>
                    <li><span class="lispan">Total Passenger:</span><span class="line"> -</span><span class="ans"><?php echo $_SESSION['Tpassenger']; ?></span></li><br>
                    <li><span class="lispan">Total Fare:</span><span class="line"> -</span><span class="ans"><?php echo $_SESSION['totalfare'] . "₹"; ?></span></li><br>
                    
                </ul>
            </div>
        </div>
        <div class="bill2">
            <div class="minibill">
                <ul><br>
                    <li><span class="lispan">Passenger Id: </span><span class="line">-</span><span class="ans"><?php echo $_SESSION['Fname'],$_SESSION['Lname2']; ?></span></li><br>
                    <li><span class="lispan">Email: </span><span class="line">-</span><span class="ans"><?php echo $_SESSION['mailid']; ?></span></li><br>
                    <li><span class="lispan">gender:</span><span class="line">-</span><span class="ans"><?php echo $_SESSION['gender']; ?></span></li><br>
                    <li><span class="lispan">Date: </span><span class="line">-</span><span class="ans"><?php echo $_SESSION['no']; ?></span></li><br>
                    <li><span class="lispan">City:</span><span class="line"> -</span><span class="ans"><?php echo $_SESSION['city']; ?></span></li><br>
                    <li><span class="lispan">Seat no:</span><span class="line"> -</span><span class="ans"><?php echo $row['Seat_no']; ?></span></li><br>
                    
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="print">
        <a href="javascript:void(0);" onclick="printPageArea('bill')">Print</a>
    </div>
        <?php
        
        ?>
</body>

</html>