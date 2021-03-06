<?php

/**
 * Version 1.0
 * Created by Adrian Aeschlimann on 18.09.2018
 *
 * Version 1.1
 * Edited by Adrian Aeschlimann on 13.11.2018
 */

/**
 * This is the main site for the project
 * It includes the nav, the links to stylesheets and anything else that has to be avaliable on every site like the constants file
 *
 * The real main content gets included below the nav
 *
 * If needed it would be trivial to also add a footer
 */
session_start();
include "GLOBALS.php";
//logout function
if (isset($_GET['status']) && $_GET['status'] == "logout") {
    session_destroy();
    header("Location: index.php");
}
//standard site if no site is set
if (!isset($_SESSION['site'])) {
    $_SESSION['site'] = "home";
}
//get site from url "index.php?site=site"
if (isset($_GET['site']))
    $_SESSION['site'] = $_GET['site'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BeerDebt</title>

    <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_topnav
    For Burger Menu-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">
    <script>
        function logout() {
            if (confirm("Log out?")) {
                window.location.href = "index.php?status=logout";
            }
        }

        function burger() {
            let x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

</head>

<body>

<div class="topnav" id="myTopnav">
    <a href="./index.php?site=home" class="active">Home</a>
    <a href="./index.php?site=UserList">Users</a>
    <a onclick="logout()">Logout</a>
    <a class="icon" onclick="burger()">
        <i class="fa fa-bars"></i>
    </a>
</div>

<?php

//the content gets included here

//only get access to other sites if you're logged in
if (isset($_SESSION['loggedIn'])) {
    include $_SESSION['site'] . ".php";
} else {
    include "login.php";
}

?>


</body>

</html>