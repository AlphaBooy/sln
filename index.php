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