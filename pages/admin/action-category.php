<?php session_start();
include '../../config/funct.php';
if ($_POST['req'] == 'add') {
    $id_category = $_POST['id_category'];
    $nama_category = $_POST['nama_category'];
    if ($id_category != $_SESSION['id_type']) {
        header('Location:page-form-category.php?req=add&id=kosong');
    } elseif ($nama_category == '') {
        header('Location:page-form-category.php?req=add&nama=kosong');
    } else {
        insertdata('post_type', 'id_type,type_post', '"' . $id_category . '","' . $nama_category . '"');
        header('Location:page-category.php');
    }
} elseif (isset($_POST['req']) == 'edit') {
    $id_category = $_POST['id_category'];
    $nama_category = $_POST['nama_category'];
    if ($nama_category == '') {
        header("Location:page-form-category.php?req=edit&id_type=$_POST[id_category]&nama=kosong");
    } else {
        updatedata('post_type', 'type_post="' . $nama_category . '"', 'id_type="' . $id_category . '"');
        header('Location:page-category.php');
    }
}
if (isset($_GET['action']) == 'dell') {
    $id_type = $_GET['id_type'];
    deletedata('post_type', 'id_type="' . $id_type . '"');
    header('Location:page-category.php');
}
