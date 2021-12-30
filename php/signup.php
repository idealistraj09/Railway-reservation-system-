<html>

<head>
    <link rel="stylesheet" href="signin.css">
    <script src="signin.js"></script>
    <title>sign up page</title>
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
                <input type="text" placeholder="first name" name="fname" required />
                <input type="text" placeholder="last name" name="lname" required />
                <input type="email" placeholder="Email" name="email" required />

                <div class="gender1">
                <input type="radio" id="huey" name="gender" value="male" checked>
                <label for="huey">Male</label>
                <input type="radio" id="dewey" name="gender" value="female">
                <label for="dewey">Female</label>
                <input type="radio" id="louie" name="gender" value="Other">
                <label for="louie">Other</label>
                </div>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign up</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <input type="text" placeholder="9339657290." max="11" name="no" required />
                    <input type="date" name="date1" required />
                    <input type="text" placeholder="city" name="city" required />
                    <input type="text" placeholder="state" name="state" required />
                    <input type="text" placeholder="Local address" name="ladd" required />
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