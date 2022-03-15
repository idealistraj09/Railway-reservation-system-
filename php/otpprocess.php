<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$uname = $_SESSION['username'];

if(isset($_SESSION['sendotpprocess'])!=true)
{
	header('Location: signup.php');
}
?>

<html>
<body>
	<link href="../css/otp.css" type="text/css" rel="stylesheet" />
	<link href="../css/signin.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/allinone.css">
	<div class="err"></div>
	<div class="success"></div>
	<div class="back">
		<div class="center">
			<form id="#mobile-number-verification" action="#" method="post"  style="background-color:#66fa8b; width:100%;">
				<div class="mobile-row">
					<label>OTP is sent to your Email ID</label>
				</div>
				<div class="mobile-row">
					<input type="number" pattern="[0-9]{10}" id="mobileOtp" class="mobile-input" placeholder="Enter the OTP" name="otp">
				</div>
				<div class="mobile-row">
					<button id="verify" class="btnVerify" name="otpbt">Submit OTP</button>
					<button id="resend" class="btnVerify" name="resend">Resend OTP</button>
				</div>
			</form>
		</div>
	</div>
	<?php

	include("../include/connection.php");
	if(isset($_POST['resend'])) {
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
            $mail->Subject = "OTP VERIFICATION";

            //Set sender email
            $mail->setFrom('proxycyberton09@gmail.com');

            //Enable HTML
            $mail->isHTML(true);

            //Attachment
			$mail->AddAttachment('otp.jpg');

            //Email body
            $mail->Body = '<h1>Dear, ' . $uname . ' <br>YOUR OTP TO VERIFY E-MAIL IS  '.$otp.'</p>'
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
            header('Location: otpprocess.php');
            $con->close();
	}
	$otp = $_SESSION['otp'];
	if (isset($_POST['otpbt'])) {

		$urno = mysqli_real_escape_string($con, @$_REQUEST['otp']);

		$uname = $_SESSION['username'];
		$pass = $_SESSION['password'];
		$fname =   $_SESSION['Fname'];
		$lname =  $_SESSION['Lname'];
		$email =   $_SESSION['mailid'];
		$drone = $_SESSION['gender'];
		$no =   $_SESSION['no'];
		$date1 =   $_SESSION['bdate'];
		$city =   $_SESSION['city'];
		$state =  $_SESSION['state'];
		$ladd =   $_SESSION['ladd'];
		$repass = $_SESSION['repass'];

		if ($urno == $otp) {
			$s = "INSERT INTO user(user_id, PasswordT, First_Name, Last_Name, Email, Gender, Mobile_No, Date_of_birth, City, StateT, Local_address) VALUES ('$uname','$pass','$fname','$lname','$email','$drone','$no','$date1','$city','$state','$ladd' );";
			if (mysqli_query($con, $s)) {
			} else {
				echo "ERROR: Could not able to execute $s. " . mysqli_error($con);
			}
			$_SESSION['sendotpprocess'] = false;
	?>
			<script>
				let text = "Email Id Verified Successfuly";
				let isExecuted = alert(text);
				location.href = "signin.php";
			</script>
		<?php

		} else {
		?>
			<script>
				alert('Wrong OTP Entered!!!');
			</script>
	<?php
		}
	}

	?>
</body>
</html>