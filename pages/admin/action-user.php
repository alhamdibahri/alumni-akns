<?php session_start();
include '../../config/funct.php';
include_once '../../phpMailer/src/PHPMailer.php';
include_once '../../phpMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_POST['req'] == 'add') {
	$kodeuser = trim($_POST['kodeuser']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$level = trim($_POST['level']);
	$email = trim($_POST['email']);
	$kode	= md5(uniqid(rand()));
	$numUsername = hitungcount('login', 'username', 'username="' . $username . '"');
	$numEmail = hitungcount('login', 'email', 'email="' . $email . '"');
	$file = $_FILES['file']['name'];
	$extension = end(explode(".", $file));
	$extension_diperbolehkan = array("jpg", "jpeg", "png");
	$data = array();
	$data['signal'] = "gagal";
	if ($_SESSION['kode'] != $kodeuser) {
		$data['msg']['kodeuser'] = "* Kode user tidak dapat di ubah!!";
	} elseif ($username == '') {
		$data['msg']['username'] = "* username tidak boleh kosong!!";
	} elseif ($numUsername >= 1) {
		$data['msg']['username'] = "* username sudah ada yang menggunakan!!";
	} elseif ($password == '') {
		$data['msg']['password'] = "* password tidak boleh kosong!!";
	} elseif (strlen($password) < 8) {
		$data['msg']['password'] = "* password minimal 8 karakter!!";
	} elseif ($level == "") {
		$data['msg']['level'] = "* harap pilih level!!";
	} elseif ($email == "") {
		$data['msg']['email'] = "* email tidak boleh kosong!!";
	} elseif ($numEmail >= 1) {
		$data['msg']['email'] = "* email sudah ada yang menggunakan!!";
	} else {
		if (in_array($extension, $extension_diperbolehkan)) {
			if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $file)) {
				$data['signal'] = "ok";
				if ($level == "Admin") {
					insertdata('login', 'kodeuser,username,password,level,email,gambar,token,isaktif', '"' . $kodeuser . '","' . $username . '","' . $password . '","' . $level . '","' . $email . '","' . $file . '","-","1"');
				} else {
					$urutalumni = penomoranOtomatis("data_alumni", "kode_alumni", "ALM-");
					insertdata('login', 'kodeuser,username,password,level,email,gambar,token,isaktif', '"' . $kodeuser . '","' . $username . '","' . $password . '","' . $level . '","' . $email . '","' . $file . '","' . $kode . '","0"');
					insertdata('data_alumni', 'kode_alumni,kodeuser', '"' . $urutalumni . '","' . $kodeuser . '"');
					$mail = new PHPMailer(true);
					try {
						//Server settings                                       
						$mail->isSMTP();
						$mail->Host       = 'smtp.gmail.com';
						$mail->SMTPAuth   = true;
						$mail->Username   = 'iyabisa42@gmail.com';
						$mail->Password   = 'ferdi.2000';
						$mail->SMTPSecure = 'tls';
						$mail->Port       = 587;

						//Recipients
						$mail->setFrom('alhamdiferdiawanbahri@gmail.com', 'Akademi Komunitas Negeri Sumenep');
						$mail->addAddress($email);

						// Content
						$mail->isHTML(true);
						$mail->Subject = 'Aktifasi Password';
						$mail->Body    = '
					<p>Hallo ' . $username . '</p>
					<p>Klik link berikut untuk mengaktifkan akun anda : </p>
					<p><a href="http://localhost/Alumniakns/login.php?token=' . $kode . '">klik disini</a></p>
					';
						if (!$mail->send()) {
							$data['signal'] = "gagal";
						} else {
							$data['signal'] = "ok";
						}
					} catch (Exception $e) {
						echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
					}
				}
			}
		} else {
			$data['msg']['file'] = "* ektensi gambar tidak di perbolehkan";
		}
	}

	echo json_encode($data);
} elseif (isset($_POST['req']) == 'edit') {
	$kodeuser = trim($_POST['kodeuser']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$level = trim($_POST['level']);
	$email = trim($_POST['email']);
	$file = $_FILES['file']['name'];
	$extension = end(explode(".", $file));
	$extension_diperbolehkan = array("jpg", "jpeg", "png");

	$data = array();
	$data['signal'] = "gagal";
	if ($username == '') {
		$data['msg']['username'] = "* username tidak boleh kosong!!";
	} elseif ($password == '') {
		$data['msg']['password'] = "* password tidak boleh kosong!!";
	} elseif (strlen($password) < 8) {
		$data['msg']['password'] = "* password minimal 8 karakter!!";
	} elseif ($level == "") {
		$data['msg']['level'] = "* harap pilih level!!";
	} elseif ($email == "") {
		$data['msg']['email'] = "* email tidak boleh kosong!!";
	} else {
		if ($file == '') {
			$data['signal'] = "ok";
			updatedata('login', 'username="' . $username . '",password="' . $password . '",level="' .  $level . '",email="' . $email . '"', 'kodeuser="' . $kodeuser . '"');
		} else {
			if (in_array($extension, $extension_diperbolehkan)) {
				if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $file)) {
					$data['signal'] = "ok";
					updatedata('login', 'username="' . $username . '",password="' . $password . '",level="' .  $level . '",email="' . $email . '",gambar="' . $file . '"', 'kodeuser="' . $kodeuser . '"');
				}
			} else {
				$data['msg']['file'] = "* ektensi gambar tidak di perbolehkan";
			}
		}
	}
	echo json_encode($data);
}
if (isset($_GET['action']) == 'dell') {
	$kodeuser = $_GET['kodeuser'];
	$numkodeuser = hitungcount('data_alumni', 'kodeuser', 'kodeuser="' . $kodeuser . '"');
	if ($numkodeuser == 1) {
		header('location:page-user.php?error=kode');
	} else {
		deletedata('login', 'kodeuser="' . $kodeuser . '"');
		header('location:page-user.php');
	}
}
