<html>

<head>
    <link rel="stylesheet" href="../css/signin.css">
    <script src="../js/signin.js"></script>
    <title>sign up</title>
</head>

<body>
    <h2>Join us</h2>
    <div class="container" id="container">
        
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h1>Sign Up</h1>
                <span>or use your account</span>
                <input type="text" placeholder="Username" name="uname" required />
                <input type="password" placeholder="Password" name="pass" required />
                <input type="password" placeholder="Re-Enter Password" name="repass" required />
                <input type="text" placeholder="First name" name="fname" required />
                <input type="text" placeholder="Last name" name="lname" required />
                <input type="email" placeholder="Email" name="email" required />
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us, please login.</p>
                    <button class="ghost" id="signIn">Sign up</button>
                </div>
                <div class="overlay-panel overlay-right">
                    Select your Gender. <!--Custom Label-->
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

                    <input type="tel" pattern="[0-9]{10}" placeholder="Phone Number" maxlength="10" name="no" required />
                    <input type="date" name="date1" required />
                    <input type="text" placeholder="City" name="city" required />
                    <input type="text" placeholder="State" name="state" required />

                    <!--For Entering Address:-->
                    <textarea rows="4" cols="38" name="ladd" placeholder="Address"></textarea>

                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
        </form>
    </div>

</body>
<?php
if (isset($_POST['uname'])) {
    $link = mysqli_connect("localhost", "raj1", "Raj@2005");
    $db = mysqli_select_db($link, "project");

    $uname = mysqli_real_escape_string($link, @$_REQUEST['uname']);
    $pass = mysqli_real_escape_string($link, @$_REQUEST['pass']);
    $fname = mysqli_real_escape_string($link, @$_REQUEST['fname']);
    $lname = mysqli_real_escape_string($link, @$_REQUEST['lname']);
    $email = mysqli_real_escape_string($link, @$_REQUEST['email']);
    $drone = mysqli_real_escape_string($link, @$_REQUEST['gender']);
    $no = mysqli_real_escape_string($link, @$_REQUEST['no']);
    $date1 = date('y-m-d', strtotime($_POST['date1']));
    $city = mysqli_real_escape_string($link, @$_REQUEST['city']);
    $state = mysqli_real_escape_string($link, @$_REQUEST['state']);
    $ladd = mysqli_real_escape_string($link, @$_REQUEST['ladd']);

    $s = "INSERT INTO passenger(Admin_id, PasswordT, First_Name, Last_Name, Email, Gender, Mobile_No, Date_of_birth, City, StateT, Local_address) VALUES ('$uname','$pass','$fname','$lname','$email','$drone','$no','$date1','$city','$state','$ladd' );";


    if (mysqli_query($link, $s)) {
        echo "  ";
    } else {
        echo "ERROR: Could not able to execute $s. " . mysqli_error($link);
    }

    $link->close();
}

?>

</html>