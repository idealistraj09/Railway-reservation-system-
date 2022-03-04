<?PHP



include("../include/connection.php");
session_start();

$otp = $_SESSION['otp'];
if (isset($_POST['sendotp'])) {

    $urno = mysqli_real_escape_string($con, @$_REQUEST['otppass']);

    

    if ($urno == $otp) {
        $_SESSION['forgatotp'] = false;
        $_SESSION['newpass'] = true;
        header('Location: newpass.php');
    } else {
    ?>
        <script>
            alert('Wrong OTP !!!');
        </script>
    <?php
    }
}

?>

<html>

<head>
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="stylesheet" href="../css/allinone.css">
    <script src="../js/time.js"></script>
    <title>Forgot password</title>
</head>

<body>
    <h2>Recover Your Account</h2>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h1>Account Recovery</h1>
                <br><br>
                <input type="number" pattern="[0-9]{10}" placeholder="OTP" name="otppass" />

                <br><br>
                <button name="sendotp">Submit OTP</button>
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