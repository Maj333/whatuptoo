<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>WhatUpTo</title>
    <link rel="stylesheet" title="base" href="css\jquery-ui.min.css" type="text/css"/>
    <link rel="stylesheet" title="base" href="css\jquery-ui.theme.css" type="text/css"/>
    <script type="text/javascript" src="js\jquery.js"></script>
    <script type="text/javascript" src="js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="js\profile.js"></script>
</head>
<body>
<?php
include_once("./engine/user.php");

session_start();

if (isset($_SESSION['username'])) { // checking if user is logged in
    if (isset($_GET['action'])) { // checking if any action
        $action = $_GET['action'];
    } else {
        $action = 'main'; // main == dashboard
    }
    switch ($action) { // for logged users
        case 'main':
            include_once("./pages/main.php");
            break;
        case 'logout':
            include_once("./engine/logout.php");
            break;
        default:
            include_once("./pages/main.php");
            break;
    }
} else {
    if (isset($_GET['action'])) { // checking if any action
        $action = $_GET['action'];
    } else {
        $action = 'login';
    }

    switch ($action) { // for non-logged
        case 'login':
            include_once("./pages/login_form.html");
            break;
        case 'register':
            include_once('./pages/register_form.html');
            break;
        default:
            include_once("./pages/login_form.html");
            break;
    }

}
?>
</body>
</html>