<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    error_reporting(E_ALL);
    ini_set('display_errors', 'off');

    //$db_path = mysqli_connect('x.x.x.x', 'danesh_user', 'password', 'danesh_clinic_db', '3306');
    //$db_path = mysqli_connect('127.0.0.1', 'root', '', 'danesh_clinic_db', '3306');
    $db_path = mysqli_connect('localhost', 'daneshcliniccom_user', 'asd123ZXC!@#', 'daneshcliniccom_db', '3306');

    if(!$db_path) {
        require_once 'err-500';
        exit();
    }

    mysqli_set_charset($db_path, 'utf8');

    require_once 'functions.php';
    require_once 'actions.php';

    //require_once "jdf.php";



?>


