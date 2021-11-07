<?php
session_start();

function get($name) {
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

$action = get('action');

if($action == 'index' || empty($action)) {
    header("Location: controller/home.php");
}

if ($action == 'register') {
    header("Location: controller/register.php");
}
if ($action == 'login') {
    header("Location: controller/login.php");
}
if ($action == 'profile') {
    header("Location: controller/profile.php");
}
if ($action == 'logout') {
    session_destroy();
    header("Location: index.php");
}
if ($action == 'admin') {
	header("Location: controller/addNft.php");
}
