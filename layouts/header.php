<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">Betting</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" class="">Home</a></li>
                <li><a href="#services">Contact</a></li>
                <li><a href="#pricing">Instruction</a></li>
                <li><a href="#team">About Us</a></li>
                <?php
                if(!isset($_SESSION)) {
                    session_start();
                    if ($_SESSION['user'] == null) {
                        echo '<li><a href="../auth/login.php">Login</a></li>';
                    } else {
                        echo '<li><a href="users/index.php">Account</a></li>';
                        echo '<li><a href="auth/logout.php">Logout</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>