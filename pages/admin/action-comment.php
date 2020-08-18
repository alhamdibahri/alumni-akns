<?php session_start();
include '../../config/funct.php';
if (isset($_POST['submit'])) {
    if (!$_SESSION['username']) {
        header('Location:../../login.php');
    } else {
        $tgl = date('Y-m-d');
        $desksripsi = $_POST['pesan'];
        $kodepost = $_POST['kodepost'];
        $kodeuser = $_SESSION['kodeuser'];
        if ($_SESSION['level'] == 'Admin') {
            insertdata('comment', 'tanggal_comment,deskripsi_comment,lihat,kode_post,kodeuser', '"' . $tgl . '","' . $desksripsi . '","1","' . $kodepost . '","' . $kodeuser . '"');
        } else {
            insertdata('comment', 'tanggal_comment,deskripsi_comment,lihat,kode_post,kodeuser', '"' . $tgl . '","' . $desksripsi . '","1","' . $kodepost . '","' . $kodeuser . '"');
        }

        header("Location:../../blog-single.php?category=$kodepost");
    }
}

if ($_GET['action'] == 'dell') {
    $id = $_GET['id'];
    $kode = $_GET['kode'];
    deletedata('comment', 'id="' . $id . '"');
    header("Location:../../blog-single.php?category=$kode");
}
