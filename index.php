<?php
session_start();
require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/utils.php';
require_once './commons/route.php'; // bắt buộc ở sau file autoload

// $url mong muốn của người gửi request
$url = isset($_GET['url']) ? $_GET['url'] : "/";

definedRoute($url);


// di ẻ
?>