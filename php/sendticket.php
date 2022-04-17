<?php
session_start();
include("../include/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;

$s = strval($_SESSION['Fname']) . strval($_SESSION['Lname']);

require_once '../dompdf/autoload.inc.php';


class Pdf extends Dompdf
{

    public function __construct()
    {
        parent::__construct();
    }
}

function passenger()
{
    $pass1 = "<h2>Railway Reservation system</h2><br><h1>Train Detail</h1><table><tr>
    <th>From</th>
    <th>To</th>
    <th>date</th>
    <th>Train type</th>
    <th>Seat Type</th>
    <th>One Passenger Fare</th>
    <th>Total Passenger</th>
    <th>Total Fare</th>
</tr>
<tr>
    <td> $_SESSION[sstation] </td>
    <td> $_SESSION[dstation] </td>
    <td> $_SESSION[datebook]  </td>
    <td> $_SESSION[tcategory]  </td>
    <td> $_SESSION[scategory]  </td>
    <td> $_SESSION[fare] </td>
    <td> $_SESSION[Tpassenger] </td>
    <td> $_SESSION[totalfare] </td>
</tr>
</table>
<h1>Passenger Detail</h1>
<table>
<tr>
    <th>Passenger Id:</th>
    <th>Email Id</th>
    <th>Gender</th>
    <th>Phone No</th>
    <th>City</th>
    <th>Seat no</th>
    
</tr>
<tr>
    <td> $_SESSION[Fname]. $_SESSION[Lname] </td>
    <td> $_SESSION[mailid] </td>
    <td> $_SESSION[gender] </td>
    <td> $_SESSION[no] </td>
    <td> $_SESSION[city] </td>
    <td> $_SESSION[seatno1] </td>
</tr>
</table>";
    if ($_SESSION['Fname3'] == '') {
        if ($_SESSION['Fname2'] == '') {
        } else {
            $pass1 .= "
                <tr>
                    <th>Passenger Id:</th>
                    <th>Email Id</th>
                    <th>Gender</th>
                    <th>Phone No</th>
                    <th>City</th>
                    <th>Seat no</th>
                    
                </tr>
                <tr>
                    <td> $_SESSION[Fname2] . $_SESSION[Lname2].</td>
                    <td> $_SESSION[mailid2] </td>
                    <td> $_SESSION[gender2] </td>
                    <td> $_SESSION[no2] </td>
                    <td> $_SESSION[city2] </td>
                    <td> $_SESSION[seatno2] </td>
                </tr>
            </table>";
        }
    } else {
        $pass1 = $pass1 . "<table><tr>
        <th>Passenger Id:</th>
        <th>Email Id</th>
        <th>Gender</th>
        <th>Phone No</th>
        <th>City</th>
        <th>Seat no</th>
        
    </tr>
    <tr>
        <td> $_SESSION[Fname2] . $_SESSION[Lname2].</td>
        <td> $_SESSION[mailid2] </td>
        <td> $_SESSION[gender2] </td>
        <td> $_SESSION[no2] </td>
        <td> $_SESSION[city2] </td>
        <td> $_SESSION[seatno2] </td>
    </tr>
</table>
<table>
            <tr>
                <th>Passenger Id:</th>
                <th>Email Id</th>
                <th>Gender</th>
                <th>Phone No</th>
                <th>City</th>
                <th>Seat no</th>
                
            </tr>
            <tr>
                <td> $_SESSION[Fname3] . $_SESSION[Lname3].</td>
                <td> $_SESSION[mailid3] </td>
                <td> $_SESSION[gender3] </td>
                <td> $_SESSION[no3] </td>
                <td> $_SESSION[city3] </td>
                <td> $_SESSION[seatno3] </td>
            </tr>
        </table>";
    }
    return $pass1;
}


$file_name = md5(rand()) . '.pdf';
$html_code = '<link rel="stylesheet" href="../css/pdf.css">';
$html_code .= passenger();
$pdf = new Pdf();
$pdf->load_html($html_code);
$pdf->render();
$file = $pdf->output();
file_put_contents($file_name, $file);



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
$mail->Password = "demoforproject99";

//Email subject
$mail->Subject = "Ticket Confirm";

//Set sender email
$mail->setFrom('proxycyberton09@gmail.com');

//Enable HTML
$mail->isHTML(true);

//Attachment

$mail->AddAttachment($file_name);
//Email body

$mail->Body = 'Please Find Customer details in attach PDF File.';

//Add recipient
$mail->addAddress($_SESSION['ticketsendmail']);

//Finally send email
if ($mail->send()) {

    echo "Ticket Sent to Mail..!";
    header('Location:home.php');
} else {
    echo "Message could not be sent. Mailer Error: "[$mail->ErrorInfo];
}
//Closing smtp connection
$mail->smtpClose();
$_SESSION['sendotpprocess'] = true;

$con->close();
?>
