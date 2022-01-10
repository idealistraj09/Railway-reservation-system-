<html>
<!-- PHP START -->

<?php

session_start();
include("../include/connection.php");
$msg = " ";
$msg1 = "";
$msg2 = "";
$flag = "done";
if (isset($_POST['uname'])) {

    $uname = mysqli_real_escape_string($con, @$_REQUEST['uname']);
    $pass = mysqli_real_escape_string($con, @$_REQUEST['pass']);
    $fname = mysqli_real_escape_string($con, @$_REQUEST['fname']);
    $lname = mysqli_real_escape_string($con, @$_REQUEST['lname']);
    $email = mysqli_real_escape_string($con, @$_REQUEST['email']);
    $drone = mysqli_real_escape_string($con, @$_REQUEST['gender']);
    $no = mysqli_real_escape_string($con, @$_REQUEST['no']);
    $date1 = date('y-m-d', strtotime($_POST['date1']));
    $city = mysqli_real_escape_string($con, @$_REQUEST['city']);
    $state = mysqli_real_escape_string($con, @$_REQUEST['state']);
    $ladd = mysqli_real_escape_string($con, @$_REQUEST['ladd']);
    $repass = mysqli_real_escape_string($con, @$_REQUEST['repass']);

    $id_search = "SELECT * FROM `passenger` WHERE BINARY Admin_id='$uname'  ";
    $query = mysqli_query($con, $id_search);
    $id_count = mysqli_num_rows($query);
    $id_uname = mysqli_fetch_assoc($query);
    if ($id_count > 0) {

        $msg = "Username is Not Available";
    }
    $id_search = "SELECT * FROM `passenger` WHERE BINARY Mobile_No='$no'  ";
    $query = mysqli_query($con, $id_search);
    $id_count = mysqli_num_rows($query);
    $id_uname = mysqli_fetch_assoc($query);
    if ($id_count > 0) {

        $msg1 = "you are Already Member ";
    }
    if ($repass == $pass) {
        $s = "INSERT INTO passenger(Admin_id, PasswordT, First_Name, Last_Name, Email, Gender, Mobile_No, Date_of_birth, City, StateT, Local_address) VALUES ('$uname','$pass','$fname','$lname','$email','$drone','$no','$date1','$city','$state','$ladd' );";


        if (mysqli_query($con, $s)) {
            $_SESSION['logged'] = true;

            echo
            "<script>
            alert('Sign up successfully');
        </script>";
            header('Location: signin.php');
        } else {
            echo "ERROR: Could not able to execute $s. " . mysqli_error($con);
        }
    }
    else{
        $msg2 = "Both Password are not matched!!!";
    }





    $con->close();
}

?>

<!-- PHP END -->

<head>
    <link rel="stylesheet" href="../css/signin.css">
    <script src="../js/signin.js"></script>

    <title>sign up</title>
</head>

<body>
    <h1>Join us</h1><br>
    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h2>Sign </h2>
                <br>
                <input type="text" placeholder="Username" name="uname" id="username" required />
                <span style="color: red;"> <?php echo $msg; ?> </span>



                <input type="password" placeholder="Password" name="pass" required />
                <input type="password" placeholder="Re-Enter Password" name="repass" required />
                <span style="color: red;"> <?php echo $msg2; ?> </span>
                <input type="text" placeholder="First name" name="fname" required />
                <input type="text" placeholder="Last name" name="lname" required />
                <input type="email" placeholder="Email" name="email" required />
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
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                </div>


                <div class="overlay-panel overlay-right">

                    <h2 id="up">Up</h2>




                    <input type="tel" pattern="[0-9]{10}" placeholder="Phone Number" maxlength="10" name="no" required />
                    <span style="color: white;"> <?php echo $msg1; ?> </span>
                    <input type="date" name="date1" required />
                    <input type="text" placeholder="City" name="city" required />
                    <input type="text" placeholder="State" name="state" required />

                    <!--For Entering Address:-->
                    <textarea rows="4" cols="43" name="ladd" placeholder="Address"></textarea>

                    <button class="ghost" id="signUp">Sign Up</button>
                    <a href="signin.php"><span style="font-size: 15px;">Already have a member ? Click Here!!</span></a>
                </div>
            </div>
        </div>
        </form>
    </div>

</body>

</html>