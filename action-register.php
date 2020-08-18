<?php include 'config/funct.php';
include_once 'phpMailer/src/PHPMailer.php';
include_once 'phpMailer/src/SMTP.php';
include 'config/connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	if(isset($_POST['submit']))
	{
		$nama = str_replace($_POST['nama'],ucwords($_POST['nama']),$_POST['nama']);
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conPassword = $_POST['conPassword'];
		$email = $_POST['email'];
		$kode	= md5(uniqid(rand()));
		$numUsername = hitungcount('login','username','username="'. $username .'"');
		$numEmail = hitungcount('login','email','email="'. $email .'"');;
		$error = array();
		if($nama == '')
		{
			$error['nama'] = "* nama lengkap kosong!";
		}
		elseif($username == '')
		{
			$error['username'] = "* username kosong!";	
		}
		elseif ($numUsername >= 1)
		{
			$error['numUsername'] = "Username sudah ada yang menggunakan !";
		}
		elseif($password == '')
		{
			$error['password'] = "* password kosong!";	
		}
		elseif(strlen($password) < 8 )
		{
			$error['lengthPassword'] = "password minimal 8 karakter";
		}
		elseif($conPassword == '')
		{
			$error['conPassword'] = "* konfirmasi password Kosong!";
		}
		elseif($email == '')
		{
			$error['email'] = "* email kosong!";
		}
		elseif($numEmail >= 1)
		{
			$error['numEmail'] = "Email <b>". $email ."</b> sudah terdaftar";
		}
		elseif($password != $conPassword)
		{
			$error['salah'] = "password & konfirmasi password tidak sama!";
		}
		else
		{
			$urutuser = penomoranOtomatis("login","kodeuser","USR-");
			$urutalumni = penomoranOtomatis("data_alumni","kode_alumni","ALM-");
			$level = 'User';
			insertdata('login','kodeuser,username,password,level,email,token,isaktif','"'. $urutuser .'","'.$username.'","'. $password .'","'.$level.'","'. $email .'","'. $kode .'","0"');
			insertdata('data_alumni','kode_alumni,nama_lengkap,kodeuser','"'. $urutalumni .'","' . $nama . '","' . $urutuser . '"');
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
					$mail->addAddress($email);
				
					// Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'Aktifasi Akun';
					$mail->Body    = '
					<p>Hallo '.$username.'</p>
					<p>Klik link berikut untuk mengaktifkan akun anda : </p>
					<p><a href="http://localhost/Alumniakns/login.php?token='.$kode.'">klik disini</a></p>
					';
					$mail->send();
					echo "<script>window.location.assign('login.php?daftar=berhasil')</script>";
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
