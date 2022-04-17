<?php
session_start();

// $_SESSION['user']['ten_tai_khoan']='longnh';
// $_SESSION['user']['ho_ten']='long';
// $_SESSION['user']['so_dien_thoai']='0123456789';
// $_SESSION['user']['anh']='0.jpg';
// $_SESSION['user']['ma_tai_khoan']=4;
// $_SESSION['user']['vai_tro']='admin';

require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/utils.php';
require_once './commons/route.php'; // bắt buộc ở sau file autoload

// $url mong muốn của người gửi request
$url = isset($_GET['url']) ? $_GET['url'] : "/";

definedRoute($url);
?>
