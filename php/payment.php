<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/payment.css">
    <script src="../js/payment.js"></script>
    <link rel="stylesheet" href="../css/allinone.css">
    <script src="../js/time.js"></script>

    <title>RRS - payment</title>
</head>

<body onload="initClock()" style="background-color: #ffb242;">
    <?php

    session_start();
    include("../include/connection.php");


    if (isset($_POST['submit1'])) {

    
        $insert_pass = "INSERT INTO `passenger`(`passenger_id`,`First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`) VALUES (NULL,'$_SESSION[Fname]','$_SESSION[Lname]','$_SESSION[mailid]','$_SESSION[gender]','$_SESSION[no]','$_SESSION[bdate]','$_SESSION[city]');";
        $insert_seat = "INSERT INTO `seat`(`Seat_id`, `Seat_no`, `Date`, `Seat_availability`, `passsenger_id`, `Seat_cat_id`, `Train_id`,`user_id`) VALUES (NULL,2,'$_SESSION[clicked]','C','$_SESSION[Fname]$_SESSION[Lname]','$_SESSION[clickes]','$_SESSION[clicket]','$_SESSION[uname]')";
        $query4 = mysqli_query($con, $insert_seat);
        if ($query4) {
        } else {
            echo "ERROR: Could not able to execute $insert_seat. " . mysqli_error($con);
        }
        if ($query = mysqli_query($con, $insert_pass)) {
            
        } else {
            echo "ERROR: Could not able to execute $insert_pass. " . mysqli_error($con);
        }
        if ($_SESSION['Fname2'] != "") {
            $_SESSION['Tpassenger'] = 2;
            $insert_pass2 = "INSERT INTO `passenger`(`passenger_id`,`First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`) VALUES (NULL,'$_SESSION[Fname2]','$_SESSION[Lname2]','$_SESSION[mailid2]','$_SESSION[gender2]','$_SESSION[no2]','$_SESSION[bdate2]','$_SESSION[city2]');";
            $query2 = mysqli_query($con, $insert_pass2);
            $insert_seat2 = "INSERT INTO `seat`(`Seat_id`, `Seat_no`, `Date`, `Seat_availability`, `passsenger_id`, `Seat_cat_id`, `Train_id`,`user_id`) VALUES (NULL,2,'$_SESSION[clicked]','C','$_SESSION[Fname2]$_SESSION[Lname2]','$_SESSION[clickes]','$_SESSION[clicket]','$_SESSION[uname]')";
            if ($query5 = mysqli_query($con, $insert_seat2)) {
            } else {
                echo "ERROR: Could not able to execute $insert_seat. " . mysqli_error($con);
            }
        }
        if ($_SESSION['Fname3'] != "") {
            $_SESSION['Tpassenger'] = 3;
            $insert_pass3 = "INSERT INTO `passenger`(`passenger_id`,`First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`) VALUES (NULL,'$_SESSION[Fname3]','$_SESSION[Lname3]','$_SESSION[mailid3]','$_SESSION[gender3]','$_SESSION[no3]','$_SESSION[bdate3]','$_SESSION[city3]');";
            $query3 = mysqli_query($con, $insert_pass3);
            $insert_seat3 = "INSERT INTO `seat`(`Seat_id`, `Seat_no`, `Date`, `Seat_availability`, `passsenger_id`, `Seat_cat_id`, `Train_id`,`user_id`) VALUES (NULL,2,'$_SESSION[clicked]','C','$_SESSION[Fname3]$_SESSION[Lname3]','$_SESSION[clickes]','$_SESSION[clicket]','$_SESSION[uname]')";
            if ($query6 = mysqli_query($con, $insert_seat3)) {
            } else {
                echo "ERROR: Could not able to execute $insert_seat. " . mysqli_error($con);
            }
        }
        // $insert_pass_count = mysqli_num_rows($query);
        header('Location: success.php');

    }


    ?>

    <nav class="navbar">
        <div class="navbar2">
            <div class="navbar3">

                <ul class="nav nav-right">
                    <li>
                        <h1 class="logo" id="logo">Railway Reservation System </h1>
                    </li>
                    <li style="margin-top: 30px; margin-left: 700px; font-weight:bold;"><a href="../php/home.php" class="home">Home</a></li>
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
    <div class="wrapper">
        <center>
        <div class="train">
            TRAIN DETAILS
        </div>
        <div class="bill">
                <div class="minibill">
                    <ul><br>
                    <li><span class="lispan">Train Id: </span><span class="line">                         </span><span class="ans"><?php echo $_SESSION['clicket']; ?></span></li><br>
                    <li><span class="lispan">From: </span><span class="line">                         </span><span class="ans"><?php echo $_SESSION['sstation']; ?></span></li><br>
                    <li><span class="lispan">To:</span><span class="line">                         </span><span class="ans"><?php echo $_SESSION['dstation']; ?></span></li><br>
                    <li><span class="lispan">Date: </span><span class="line">                         </span><span class="ans"><?php echo $_SESSION['datebook']; ?></span></li><br>
                    <li><span class="lispan">Train type:</span><span class="line">                          </span><span class="ans"><?php echo $_SESSION['tcategory']; ?></span></li><br>
                    <li><span class="lispan">Seat Type:</span><span class="line">                          </span><span class="ans"><?php echo $_SESSION['scategory']; ?></span></li><br>
                    <li><span class="lispan">One Passenger Fare:</span><span class="line">                          </span><span class="ans"><?php echo $_SESSION['fare'] . "₹"; ?></span></li><br>
                    <li><span class="lispan">Total Passenger:</span><span class="line">                          </span><span class="ans"><?php echo $_SESSION['Tpassenger']; ?></span></li><br>
                    <li><span class="lispan">Total Fare:</span><span class="line">                          </span><span class="ans"><?php echo $_SESSION['totalfare'] . "₹"; ?></span></li><br>
                    
                </ul>
            </div>
        </div>
    </center>
    <center>
        <div class="entercard">
            ENTER CARD DETAILS
        </div>
        <div class="container">
            <article class="part card-details">
                <h1>
                    Credit Card Details
                </h1>
                <form method="POST" action="#" autocomplete="off" >
                    <div class="group card-number">
                        <label for="first">Card Number</label>
                        <input type="text" id="first" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;" required>
                        <input type="text" id="second" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;" required>
                        <input type="text" id="third" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;" required>
                        <input type="text" id="fourth" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;" required>
                    </div>
                    <div class="group card-name">
                        <label for="name">Name On Card</label>
                        <input type="text" id="name" class="" type="text" maxlength="20" placeholder="Name Surname" required>
                    </div>
                    <div class="group card-expiry">
                        <div class="input-item expiry">
                            <label for="expiry">Expiry Date</label>
                            <input type="text" class="month" id="expiry" placeholder="02" required>
                            <input type="text" class="year" id="" placeholder="2025" required>
                        </div>
                        <div class="input-item cvv">
                            <label for="cvv">CVV No.</label><a href="" required>?</a>
                            <input type="triple" class="cvv" maxlength="3" placeholder="&#9679;&#9679;&#9679;">
                        </div>
                    </div>
                    <div class="group submit-group">
                        <span class="arrow"></span>
                        <input type="submit" class="submit" name="submit1">
                    </div>
                </form>
            </article>
            <div class="part bg"></div>
        </div>
    </center>
    </div>
    

    <?php

    



    ?>
</body>

</html>