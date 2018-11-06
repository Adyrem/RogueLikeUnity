<?php

/*
 * This is the main site for the project
 * It includes the nav, the links to stylesheets and anything else that has to be avaliable on every site
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
<html>
<head>
    <title>BeerDebt</title>

    <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_topnav
    For Burger Menu-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">
    <script>
        function logout() {
            if (confirm("Ausloggen?")) {
                window.location.href = "index.php?status=logout";
            }
        }

        function burger() {
            var x = document.getElementById("myTopnav");
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