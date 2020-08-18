<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['level'] == 'Admin') {
        header('location:login.php');
    } else {
        header('location:index.php');
    }
    session_unset();
    session_destroy();
}
