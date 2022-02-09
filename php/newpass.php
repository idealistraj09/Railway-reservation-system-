<?PHP



include("../include/connection.php");
session_start();
if(isset($_SESSION['newpass'])!=true)
{
    header('Location: home.php');
}
$pass = mysqli_real_escape_string($con, @$_REQUEST['pass']);
$repass = mysqli_real_escape_string($con, @$_REQUEST['repass']);
$otpmail = $_SESSION['otpmail'];
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST['pass'] != "") {
    if ($repass == $pass) {

        if($_SESSION['usermail'])
        {
            $s = "UPDATE `user` SET `PasswordT`= '$pass' WHERE Email = '$otpmail'";
        }elseif($_SESSION['adminmail'])
        {
            $s = "UPDATE `admin` SET `PasswordT`= '$pass' WHERE Email = '$otpmail'";
        }

        	if (mysqli_query($con, $s)) {
                $_SESSION['newpass'] = false;
                header('Location: signin.php');
			} else {
				echo "ERROR: Could not able to execute $s. " . mysqli_error($con);
			}
    }
    else{
        ?>
        <script>
            alert('Bote Password Are Not Match !!');
        </script>
    <?PHP
    }
}else{
    ?>
        <script>
            alert('Enter New Password');
        </script>
    <?PHP
}


?>

<html>

<head>
    <link rel="stylesheet" href="../css/signin.css">
    <script src="../js/time.js"></script>
    <title>RESET PASSWORD</title>
</head>

<body>
    <h2>Update Password</h2>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h1>New Password</h1>
                <br><br>
                <input type="password" placeholder="Password" name="pass" minlength="8" required />
                <input type="password" placeholder="Re-Enter Password" name="repass" minlength="8" required />
                <br><br>
                <button name="sendotp">Update Password</button>
                <br>

                <a href="../php/home.php"><img src="../img/homebt.png" height="40px" width="40px"></a>Home
            </form>
        </div>
        <div>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <form action="signup.php">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>