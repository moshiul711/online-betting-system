<?php
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Predict Yourself</title>

    <base href="http://localhost/previous/bet/">

    <link href="assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="assets/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <link href="assets/admin/vendor/" rel="stylesheet">

    <link href="assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="assets/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/ajax.js"></script>

    <link href="assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Betting</span></a>
        </div>
        <!-- /.navbar-header -->

        <ul class=" nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="admin/auth/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="admin/index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Add Betting Game<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/add-cricket.php">Cricket</a>
                            </li>
                            <li>
                                <a href="admin/add-football.php">Football</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <?php
                    if ($_SESSION['type'] =='admin') {
                        ?>

                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Transaction Request<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Bet Creator Request <sup>0</sup><span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Request Coin</a>
                                        </li>
                                        <li>
                                            <a href="#">Request Withdraw</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Participants Request <sup>0</sup><span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <?php
                    }
                    ?>

                    <li>
                        <a href="admin/all_bet.php"><i class="fa fa-table fa-fw"></i>Bet History</a>
                    </li>
                    <li>
                        <a href="admin/users.php"><i class="fa fa-user fa-fw"></i> All User</a>
                    </li>
                    <?php
                     if ($_SESSION['type'] =='user') {
                         ?>
                         <li>
                             <a href="#"><i class="glyphicon glyphicon-transfer"></i> Transaction<span
                                         class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                 <li>
                                     <a href="admin/request-withdraw.php">Withdraw Request</a>
                                 </li>
                                 <li>
                                     <a href="admin/request-coin.php">Coin Request</a>
                                 </li>
                             </ul>
                         </li>
                         <?php
                     }
                    ?>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

