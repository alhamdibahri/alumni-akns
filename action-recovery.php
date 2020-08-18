<?php
include_once 'phpMailer/src/PHPMailer.php';
include_once 'phpMailer/src/SMTP.php';
include 'config/connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$email = $_POST['email'];
$query = mysqli_query($connect,"SELECT * FROM login WHERE email = '".$email."'");
$row = mysqli_fetch_array($query);
if ($row)
{
	$password = $row['password'];
    $username = $row['username'];
    $email = $row['email'];

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'iyabisa42@gmail.com';                  // SMTP username
        $mail->Password   = 'ferdi.2000';                           // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('alhamdiferdiawanbahri@gmail.com', 'Akademi Komunitas Negeri Sumenep');
        //$mail->addAddress('alhamdiferdiawanbahri@gmail.com', 'AKNS');     // Add a recipient
        $mail->addAddress($email);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Lupa Password';
        $mail->Body    = '
        <p>Hallo '.$username.'</p>
        <p>Ini adalah pesan lupa password untuk mendapatkan akses masuk ke dalam website alumni Akademi komunitas negeri sumenep</p>
        <h4>User Detail</h4>
        <table border="1">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>password</th>
            </tr>
            <tr>
                <td>'.$username.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
            </tr>
        </table>
        <p>silahkan login kembali dengan password di atas</p>
        ';
    
        $mail->send();
        echo "<script>window.location.assign('login.php?success=berhasil')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else
{
	header('Location:password-recovery.php?error=notfound');
}
?>