<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home_css.css">
    <link rel="stylesheet" href="../css/getdata.css">
    <script src="../js/scroll.js"></script>
    <title>RRS - ADD passenger</title>
</head>

<body onload="initClock()">
    <?php
    
    session_start();
    include("../include/connection.php");
    $_SESSION['Tpassenger'] = 1;
    
    if (isset($_POST['click1'])) {
       
        $_SESSION['Fname'] = $fname = mysqli_real_escape_string($con, @$_REQUEST['fname']);
        $_SESSION['Lname'] = $lname = mysqli_real_escape_string($con, @$_REQUEST['lname']);
        $_SESSION['mailid'] = $email = mysqli_real_escape_string($con, @$_REQUEST['email']);
        $_SESSION['gender'] = $drone = mysqli_real_escape_string($con, @$_REQUEST['gender']);
        $_SESSION['no'] = $no = mysqli_real_escape_string($con, @$_REQUEST['no']);
        $_SESSION['bdate'] = $date1 = date('y-m-d', strtotime($_POST['date12']));
        $_SESSION['city'] = $city = mysqli_real_escape_string($con, @$_REQUEST['city']);

        $_SESSION['Fname2'] = $fname2 = mysqli_real_escape_string($con, @$_REQUEST['fname2']);
        $_SESSION['Lname2'] = $lname2 = mysqli_real_escape_string($con, @$_REQUEST['lname2']);
        $_SESSION['mailid2'] = $email2 = mysqli_real_escape_string($con, @$_REQUEST['email2']);
        $_SESSION['gender2'] = $drone2 = mysqli_real_escape_string($con, @$_REQUEST['gender2']);
        $_SESSION['no2'] = $no2 = mysqli_real_escape_string($con, @$_REQUEST['no2']);
        $_SESSION['bdate2'] = $date12 = date('y-m-d', strtotime($_POST['date122']));
        $_SESSION['city2'] = $city2 = mysqli_real_escape_string($con, @$_REQUEST['city2']);

        $_SESSION['Fname3'] = $fname3 = mysqli_real_escape_string($con, @$_REQUEST['fname3']);
        $_SESSION['Lname3'] = $lname3 = mysqli_real_escape_string($con, @$_REQUEST['lname3']);
        $_SESSION['mailid3'] = $email3 = mysqli_real_escape_string($con, @$_REQUEST['email3']);
        $_SESSION['gender3'] = $drone3 = mysqli_real_escape_string($con, @$_REQUEST['gender3']);
        $_SESSION['no3'] = $no3 = mysqli_real_escape_string($con, @$_REQUEST['no3']);
        $_SESSION['bdate3'] = $date13 = date('y-m-d', strtotime($_POST['date123']));
        $_SESSION['city3'] = $city3 = mysqli_real_escape_string($con, @$_REQUEST['city3']);

        $fortrain = "select * from train_category where train_cat_id='$_SESSION[clicketc]';";
        $q = mysqli_query($con,$fortrain);
        $r = mysqli_fetch_array($q);
        $_SESSION['tcategory'] = $r['train_type'];

        $forseat = "select * from seat_category where seat_cat_id='$_SESSION[clickes]';";
        $q1 = mysqli_query($con,$forseat);
        $r1 = mysqli_fetch_array($q1);
        $_SESSION['scategory'] = $r1['seat_type'];
        
        $fare_pass = "select Fare from `fare` where Seat_cat_id='$_SESSION[clickes]'and Train_cat_id='$_SESSION[clicketc]' AND Tour_id=(select Tour_id from train where Train_id='$_SESSION[clicket]') ;";
        if ($query6 = mysqli_query($con, $fare_pass)) {
        } else {
            echo mysqli_error($con);
        };
        $farerow = mysqli_fetch_array($query6);
        $_SESSION['fare'] = $farerow['Fare'];
        if ($fname2 != "") {
            $_SESSION['Tpassenger'] = 2;
            
        }
        if ($fname3 != "") {
            $_SESSION['Tpassenger'] = 3;
            
        }
            $_SESSION['totalfare']  = (int)$_SESSION['fare'] * (int)$_SESSION['Tpassenger'];
        header('Location: payment.php');
    }

    
    ?>
    
    <nav class="navbar">
        <div class="navbar2">
            <div class="navbar3">
                <h1 class="logo" id="logo">Railway Reservation System </h1>
                <span style="margin-left: 10px; font-size: 18px;">Trains</span>
                <ul class="nav nav-right">
                    <li><span id="welcome"></span></li>
                    <li class="menu__group"><a href="../php/signin.php" class="menu__link r-link text-underlined">SignIn</a></li>
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
    <div class="main1">
        <div class="getdata">
            <form action="#" method="POST">
                <div class="upper">
                    <div class="part1" id="part1">
                        <input type="text" placeholder="First name" name="fname" required />
                        <input type="text" placeholder="Last name" name="lname" required />
                        <input type="email" placeholder="Email" name="email" required /><br>
                        <span> Select your Gender.</span><br>
                        <div class="gender1" required>
                            <label for="m" class="radio">
                                <input type="radio" id="m" name="gender" value="male" required>Male
                            </label>
                            <label for="f">
                                <input type="radio" id="f" name="gender" value="female">Female
                            </label>
                            <label for="o">
                                <input type="radio" id="o" name="gender" value="Other">Other
                            </label>
                        </div>
                        <input type="tel"  placeholder="Phone Number" maxlength="10" name="no" id="mobile" required /> <br>
                        <span>Date of Birth</span><br>
                        <input type="date" id="dateid" name="date12" value="" min="1950-01-01" required />
                        <input type="text" placeholder="City" name="city" required onkeydown="upperCaseF(this)" />
                        <button type="button" id="add1" name="addpass" onclick="addfirst();">Add passenger</button>
                    </div>
                    <div class="part2" id="part2">
                        <input type="text" placeholder="First name" id="fname2" name="fname2"   />
                        <input type="text" placeholder="Last name" id="lname2" name="lname2"    />
                        <input type="email" placeholder="Email" id="email2" name="email2"    /><br>
                        <span> Select your Gender. </span><br>
                        <div class="gender1"  >
                            <label for="m" id="radio2" class="radio" >
                                <input type="radio" id="m" name="gender2" value="male"  >Male
                            </label>
                            <label for="f">
                                <input type="radio" id="f" name="gender2" value="female">Female
                            </label>
                            <label for="o">
                                <input type="radio" id="o" name="gender2" value="Other">Other
                            </label>
                        </div>
                        <input type="tel"  placeholder="Phone Number" maxlength="10" name="no2" id="mobile2"    /><br>
                        <span>Date of Birth</span><br>
                        <input type="date" id="dateid2" name="date122" value="" min="1950-01-01"    />
                        <input type="text" placeholder="City" name="city2" id="city2"   onkeydown="upperCaseF(this)"  />
                        <button type="button" id="signUp1" name="hidepass1" onclick="hide2();">REMOVE</button>
                        <button type="button" id="add2" name="addpass1"  onclick="addsecond();">Add passenger</button>
                    </div>
                    <div class='part3' id='part3'>
                        <input type='text' placeholder='First name' id="fname3" name='fname3'    />
                        <input type='text' placeholder='Last name' id="lname3" name='lname3'    />
                        <input type='email' placeholder='Email' id="email3" name='email3'    /><br>
                        <span> Select your Gender. </span><br>
                        <div class='gender1'  >
                            <label for='m' class='radio' id="radio3" >
                                <input type='radio' id='m' name='gender3' value='male'  >Male
                            </label>
                            <label for='f'>
                                <input type='radio' id='f' name='gender3' value='female'>Female
                            </label>
                            <label for='o'>
                                <input type='radio' id='o' name='gender3' value='Other'>Other
                            </label>
                        </div>
                        <input type='tel'  placeholder='Phone Number'  maxlength='10' name='no3' id='mobile3'    /><br>
                        <span>Date of Birth</span><br>
                        <input type='date' id='dateid3' name='date123' value=''  min='1950-01-01'    />
                        <input type='text' placeholder='City' name='city3' id="city3"   onkeydown='upperCaseF(this)'  />
                        <button type='button' id='signUp12' name='hidepass23'  onclick='hide3();'>REMOVE</button>
                        <button type='button' id='add3' name='addpass33'  onclick='addth();'>Add passenger</button>
                    </div>
                    

                </div>
                <div class="lower">
                    <div class="button1">
                        
                        <button id="signUp3" name="click1">SUBMIT</button>
                        
                    </div>
                </div>

            </form>



        </div>
    </div>

    <?php


    


    ?>
</body>

</html>