<?PHP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include("../include/connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST['founame'] != "") {

    $email = mysqli_real_escape_string($con, @$_REQUEST['founame']);

    $id_search_user_mail = " SELECT * FROM `passenger` WHERE BINARY Email='$email' ";
    $query_user_mail = mysqli_query($con, $id_search_user_mail);
    $id_count_user_mail = mysqli_num_rows($query_user_mail);

    if ($id_count_user_mail) {
        $_SESSION['otpmail'] = $email;
        $_SESSION['forgatotp'] = true;
        header('Location: forgototp.php');
    } else {
?>
        <script>
            alert('Email Does Not exist');
        </script>
    <?PHP
    }
} else {
    ?>
    <script>
        alert('Enter Email');
    </script>
<?PHP
}

    if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST['founame'] != "") {
        $_SESSION['otp'] = rand(0000, 9999);

        $otp = $_SESSION['otp'];

        //Include required PHPMailer files
        require '../include/PHPMailer.php';
        require '../include/SMTP.php';
        require '../include/Exception.php';

        //Define name spaces
        //Create instance of PHPMailer
        $mail = new PHPMailer();

        //Set mailer to use smtp
        $mail->isSMTP();

        //Define smtp host
        $mail->Host = "smtp.gmail.com";

        //Enable smtp authentication
        $mail->SMTPAuth = true;

        //Set smtp encryption type (ssl/tls)
        $mail->SMTPSecure = "tls";

        //Port to connect smtp
        $mail->Port = "587";

        //Set gmail username
        $mail->Username = "proxycyberton09@gmail.com";

        //Set gmail password
        $mail->Password = "Raj@2005";
        $mail->addEmbeddedImage('otp.jpg','otp');
        //Email subject
        $mail->Subject = "PASSWORD RESET OTP ";

        //Set sender email
        $mail->setFrom('proxycyberton09@gmail.com');

        //Enable HTML
        $mail->isHTML(true);

        //Attachment
        

        //Email body
        $mail->Body = "'<h1>Dear,  <br>YOUR OTP FOR RESET PASSWORD IS  $otp</h1>'"
                      .'<img src="cid:otp">'  
                    ."\n";

        // $mail->Body = "<img src="cid:otp"><h1>Dear, " . $uname . " <br>YOUR OTP FOR RESET PASSWORD IS  $otp</p>";
        //Add recipient
        $mail->addAddress($_SESSION['otpmail']);

        //Finally send email
        if ($mail->send()) {

            echo "Email Sent..!";
        } else {
            echo "Message could not be sent. Mailer Error: "[$mail->ErrorInfo];
        }
        //Closing smtp connection
        $mail->smtpClose();
        
        $con->close();
    }



?>
<html>

<head>
    <link rel="stylesheet" href="../css/signin.css">
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
                <input type="text" placeholder="Email id" name="founame" />
                <br><br>
                <button name="sendotp">Sent OTP</button>
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