<?php session_start();
include '../../config/funct.php';
if ($_POST['req'] == 'add') {
	$kodepost = $_POST['kodepost'];
	$tgl = explode('/', $_POST['tgl_post']);
	$tgl_post = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
	$type_post = $_POST['type_post'];
	$judul = $_POST['judul'];
	$deskripsi = $_POST['deskripsi'];
	$file = $_FILES['file']['name'];
	$txtfile = $_POST['txtfile'];
	$extension = end(explode(".", $file));
	$extension_diperbolehkan = array("jpg", "jpeg", "png");
	$data = array();
	if ($kodepost != $_SESSION['kodepost']) {
		$data['msg']['kodepost'] = "* kode post tidak dapat diubah";
	} elseif ($kodepost == '') {
		$data['msg']['kodepost'] = "* kode post tidak boleh kosong";
	} elseif ($type_post == '') {
		$data['msg']['type_post'] = "* tipe post tidak boleh kosong";
	} elseif ($judul == '') {
		$data['msg']['judul_post'] = "* judul post tidak boleh kosong";
	} elseif ($deskripsi == '') {
		$data['msg']['deskripsi'] = "* deskripsi tidak boleh kosong";
	} elseif ($file == '') {
		$data['msg']['file'] = "* harap upload gambar";
	} else {
		if (in_array($extension, $extension_diperbolehkan)) {
			if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $file)) {
				$data['signal'] = "ok";
				insertdata('post', 'kode_post,tanggal_post,judul,deskripsi,gambar,kodeuser,id_type', '"' . $kodepost . '","' . $tgl_post . '","' . $judul . '","' . $deskripsi . '","' . $file . '","' . $_SESSION['kodeuser'] . '","' . $type_post . '"');
			}
		} else {
			$data['msg']['file'] = "* ektensi gambar tidak di perbolehkan";
		}
	}
	echo json_encode($data);
} elseif (isset($_POST['req']) == 'edit') {
	$kodepost = $_POST['kodepost'];
	$tgl = explode('/', $_POST['tgl_post']);
	$tgl_post = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
	$type_post = $_POST['type_post'];
	$judul = $_POST['judul'];
	$deskripsi = $_POST['deskripsi'];
	$file = $_FILES['file']['name'];
	$txtfile = $_POST['txtfile'];
	$ukuran = $_FILES['file']['size'];
	$data = array();
	$extension = end(explode(".", $file));
	$extension_diperbolehkan = array("jpg", "jpeg", "png");
	if ($kodepost == '') {
		$data['msg']['kodepost'] = "* kode post tidak boleh kosong";
	} elseif ($type_post == '') {
		$data['msg']['type_post'] = "* tipe post tidak boleh kosong";
	} elseif ($judul == '') {
		$data['msg']['judul_post'] = "* judul post tidak boleh kosong";
	} elseif ($deskripsi == '') {
		$data['msg']['deskripsi'] = "* deskripsi tidak boleh kosong";
	} else {
		if ($file == '') {
			$data['signal'] = "ok";
			updatedata('post', 'tanggal_post="' . $tgl_post . '",judul="' . $judul . '",deskripsi="' . $deskripsi . '",kodeuser="' . $_SESSION['kodeuser'] . '",id_type="' . $type_post . '"', 'kode_post="' . $kodepost . '"');
		} else {
			if (in_array($extension, $extension_diperbolehkan)) {
				if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $file)) {
					$data['signal'] = "ok";
					updatedata('post', 'tanggal_post="' . $tgl_post . '",judul="' . $judul . '",deskripsi="' . $deskripsi . '",gambar="' . $file . '",kodeuser="' . $_SESSION['kodeuser'] . '",id_type="' . $type_post . '"', 'kode_post="' . $kodepost . '"');
				}
			} else {
				$data['msg']['file'] = "* ektensi gambar tidak di perbolehkan";
			}
		}
	}
	echo json_encode($data);
}
if (isset($_GET['req']) == 'dell') {
	$kodepost = $_GET['kodepost'];
	deletedata('post', 'kode_post="' . $kodepost . '"');
	header('location:page-post.php');
}
