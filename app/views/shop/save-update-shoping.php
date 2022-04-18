<?php
    require ("../../../commons/helpers.php");
    session_start();

    $ma_ca=$_GET['ma_ca'];
    $action = $_GET['action'];
    if ($action == 'delete'){
        unset($_SESSION['shoping'][$ma_ca]);
    }
    if ($action == 'up'){
        $_SESSION['shoping'][$ma_ca]['so_luong']++;
    }
    if ($action == 'down'){
        $_SESSION['shoping'][$ma_ca]['so_luong']--;
    }
    header('location:'.BASE_URL.'gio-hang');
?>