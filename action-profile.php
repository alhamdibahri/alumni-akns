<?php session_start();
include 'config/funct.php';
if (isset($_POST['submitAkun'])) {
    $kodeuser = $_POST['kodeuser'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $file = $_FILES['file']['name'];
    $extension = end(explode(".", $file));
    $extension_diperbolehkan = array("jpg", "jpeg", "png");
    if ($file == '') {
        updatedata('login', 'username="' . $username . '",password="' . $password . '",email="' . $email . '"', 'kodeuser="' . $kodeuser . '"');
        header('Location:profile.php');
    } else {
        if (in_array($extension, $extension_diperbolehkan)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], 'pages/admin/upload/' . $file)) {
                updatedata('login', 'username="' . $username . '",password="' . $password . '",email="' . $email . '",gambar="' . $file . '"', 'kodeuser = "' . $kodeuser . '"');
                header('Location:profile.php');
            }
        }
    }
}

if (isset($_POST['submitData'])) {
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $jk = $_POST['jk'];
    $hp = $_POST['hp'];
    $thn_angkatan = $_POST['thn_angkatan'];
    $tgl_lulus = $_POST['tgl_lulus'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    updatedata('data_alumni', 'nama_lengkap="' . $nama . '",tanggal_lahir="' . $tgl_lahir . '",tempat_lahir="' . $tmp_lahir . '",jenis_kelamin="' . $jk . '",no_hp="' . $hp . '",alamat="' . $alamat . '",tahun_angkatan="' . $thn_angkatan . '",tahun_lulusan="' . $tgl_lulus .  '",jurusan="' . $jurusan . '"', 'kodeuser="' . $_SESSION['kodeuser'] . '"');

    header('Location:profile.php');
}
