<?php
session_start();
if (!isset($_SESSION['site'])) {
    $_SESSION['site'] = "home";
}
if (isset($_GET['site']))
    $_SESSION['site'] = $_GET['site'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>BeerDebt</title>

    <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_topnav
    For Burger Menu-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">

</head>

<body>

<div class="topnav" id="myTopnav">
    <a href="./index.php" class="active">Home</a>
    <a href="#users">Users</a>
    <a class="icon" onclick="burger()">
        <i class="fa fa-bars"></i>
    </a>
</div>

<?php

if (isset($_SESSION['loggedIn'])) {
    include $_SESSION['site'] . ".php";
} else {
    include "login.php";
    $_SESSION['site'] = "login";
}

?>


</body>

</html>