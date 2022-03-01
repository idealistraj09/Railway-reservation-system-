<html>
<!-- PHP START -->

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
include("../include/connection.php");
$msg = " ";
$msg1 = "";
$msg2 = "";
$msg3 = "";
$flag = "done";

if (isset($_POST['click'])) {

    $_SESSION['username'] = $uname = mysqli_real_escape_string($con, @$_REQUEST['uname']);
    $_SESSION['password'] = $pass = mysqli_real_escape_string($con, @$_REQUEST['pass']);
    $_SESSION['Fname'] = $fname = mysqli_real_escape_string($con, @$_REQUEST['fname']);
    $_SESSION['Lname'] = $lname = mysqli_real_escape_string($con, @$_REQUEST['lname']);
    $_SESSION['mailid'] = $email = mysqli_real_escape_string($con, @$_REQUEST['email']);
    $_SESSION['gender'] = $drone = mysqli_real_escape_string($con, @$_REQUEST['gender']);
    $_SESSION['no'] = $no = mysqli_real_escape_string($con, @$_REQUEST['no']);
    $_SESSION['bdate'] = $date1 = date('y-m-d', strtotime($_POST['date12']));
    $_SESSION['city'] = $city = mysqli_real_escape_string($con, @$_REQUEST['city']);
    $_SESSION['state'] = $state = mysqli_real_escape_string($con, @$_REQUEST['state']);
    $_SESSION['ladd'] = $ladd = mysqli_real_escape_string($con, @$_REQUEST['ladd']);
    $_SESSION['repass'] = $repass = mysqli_real_escape_string($con, @$_REQUEST['repass']);



    $id_search = "SELECT * FROM `user` WHERE BINARY user_id='$uname'  ";
    $query = mysqli_query($con, $id_search);
    $id_count = mysqli_num_rows($query);
    $id_searchAdmin = " SELECT * FROM `admin` WHERE BINARY admin_id='$uname' ";
    $query_Admin = mysqli_query($con, $id_searchAdmin);
    $id_count_Admin = mysqli_num_rows($query_Admin);

    $id_search_Admin_no = " SELECT * FROM `admin` WHERE BINARY Mobile_No='$no' ";
    $query_Admin_no = mysqli_query($con, $id_search_Admin_no);
    $id_count_Admin_no = mysqli_num_rows($query_Admin_no);
    $id_search_user_no = " SELECT * FROM `user` WHERE BINARY Mobile_No='$no' ";
    $query_user_no = mysqli_query($con, $id_search_user_no);
    $id_count_user_no = mysqli_num_rows($query_user_no);

    $id_search_Admin_mail = " SELECT * FROM `admin` WHERE BINARY Email='$email' ";
    $query_Admin_mail = mysqli_query($con, $id_search_Admin_mail);
    $id_count_Admin_mail = mysqli_num_rows($query_Admin_mail);
    $id_search_user_mail = " SELECT * FROM `user` WHERE BINARY Email='$email' ";
    $query_user_mail = mysqli_query($con, $id_search_user_mail);
    $id_count_user_mail = mysqli_num_rows($query_user_mail);

    if ($id_count > 0  || $id_count_Admin > 0) {
        $msg = "Username is Not Available";
    } elseif ($id_count_Admin_no > 0 || $id_count_user_no > 0) {
        $msg1 = "You are already part of Community. Sign In Now!";
    }elseif($id_count_user_mail > 0 || $id_count_Admin_mail){
        $msg3 = "Email id is already in use";
    } elseif ($repass == $pass) {
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
            $mail->Password = "RajPopat@2004";

            //Email subject
            $mail->Subject = "OTP VARIFICATION";

            //Set sender email
            $mail->setFrom('proxycyberton09@gmail.com');

            //Enable HTML
            $mail->isHTML(true);

            //Attachment

            //Email body
            $mail->Body = '<h1>Dear, ' . $uname . ' <br>YOUR OTP FOR RESET PASSWORD IS  '.$otp.'</p>'
								.'<img src="cid:otp">';

            //Add recipient
            $mail->addAddress($_SESSION['mailid']);

            //Finally send email
            if ($mail->send()) {

                echo "Email Sent..!";
            } else {
                echo "Message could not be sent. Mailer Error: "[$mail->ErrorInfo];
            }
            //Closing smtp connection
            $mail->smtpClose();
            $_SESSION['sendotpprocess'] = true;
            header('Location: otpprocess.php');
            $con->close();
        }
     else {
        $msg2 = "Both Password are not matched!!!";
    }
}
?>

<!-- PHP END -->

<head>
    <link rel="stylesheet" href="../css/signin.css">
    
    <script src="../js/time.js"></script>

    <title>sign up</title>
</head>

<body onload="date()">
    <h1>Join us</h1><br>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h2>Sign </h2>
                <br>
                <input type="text" placeholder="Username" name="uname" id="username" required />
                <span style="color: red;"> <?php echo $msg; ?> </span>
                <input type="password" placeholder="Password" name="pass" minlength="8" required />
                <input type="password" placeholder="Re-Enter Password" name="repass" minlength="8" required />
                <span style="color: red;"> <?php echo $msg2; ?> </span>
                <input type="text" placeholder="First name" name="fname" required />
                <input type="text" placeholder="Last name" name="lname" required />
                <input type="email" placeholder="Email" name="email" required />
                <span style="color: red;"> <?php echo $msg3; ?> </span>

                <span style="margin: 8px;"> Select your Gender. <!--Custom Label--> </span>
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
                    <input type="tel" pattern="[0-9]{10}" placeholder="Phone Number" maxlength="10" name="no" id="mobile" required />
                    
                    <span>Date of Birth</span>

                    <input type="date" id="dateid" name="date12" value="" min="1950-01-01" required />
                    <input type="text" placeholder="City" name="city" required onkeydown="upperCaseF(this)"/>
                    <input type="text" placeholder="State" name="state" required onkeydown="upperCaseF(this)"/>

                    <!--For Entering Address:-->
                    <textarea resize=none placeholder="Address" name="ladd" required onkeydown="upperCaseF(this)"></textarea>
                    
                    <span style="color: white;"> <?php echo $msg1; ?> </span>

                    <button class="ghost" id="signUp" name="click">Sign Up</button>

                    <a class="labelsignin" href="signin.php"><span style="font-size: 15px;">Already a member? Sign In here!</span></a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>