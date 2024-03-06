<?php
session_start();
if ($_SESSION['user'] == null) {
    header('location:../auth/login.php');
}
?>

<?php
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$userID = $_SESSION['uid'];
$query = "SELECT * FROM `users` WHERE user_id='$userID'";
$stmt = $dbh->query($query);
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
$userInfo['user_id'];
?>


<?php

$query = "SELECT * FROM `user_beat` WHERE tbl_users_user_id ='$userID'";
$stmt = $dbh->query($query);
$query_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_bet = count($query_result);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Profile </title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="css/my-style.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="js/jquery.js"></script>

    <style>
        #notification p{ color: black}
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="top-header-bg">
            <div class="col-md-2">
                <a href=""><img src="images/Picture1.png" height="95" width="70" alt=""></a>
            </div>
            <div class="col-md-10">
                <nav class="navbar navbar-default c-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="../index.php">Sports </a></li>
                            <li><a href="http://bethouse7.com/profile/pending_bet">My Bet <sup> <?=$total_bet?> </sup>  </a></li>
                            <li><a href="#"> <?php echo $userInfo['user_amount'];?> BDT</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="container-fluid">
            <div class="row">
                <div class="main-content">
                    <div class="row">

                        <div class="col-md-2">
                            <div class="left-content">
                                <div class="sidebar-nav">
                                    <ul>
                                        <li><a href="../index.php">Home</a></li>
                                        <li><a href="index.php">Profile</a></li>
                                        <li><a href="betHistory.php">Bet History</a></li>
                                        <li><a href="edit_profile.php">Edit Profile</a></li>
                                        <li><a href="http://bethouse7.com/profile/change_password">Change Password</a></li>
                                        <li><a href="request-coin.php">Balance Request</a></li>
                                        <li><a href="request-withdraw.php">Withdraw Request</a></li>
                                        <li><a href="../auth/logout.php">Logout</a></li>
                                    </ul>
                                </div>

                                <div class="div-streem">
                                    <div class="bs-heading text-center">
                                        <h4>Loged by</h4>
                                    </div>
                                    <div class="body">
                                        <div class="log-bg">
                                            <div class="lolin-image">
                                                <img class="img-circle" src="images/<?=$userInfo['user_image']?>" alt="testimonials images" width="65" height="65">
                                            </div>
                                            <div class="name">
                                                <br/>
                                                <table>
                                                    <tr>
                                                        <td style="font-weight: 600; font-size: 16px"><?php echo $userInfo['user_name'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" font-size: 12px"><?php echo $userInfo['user_phone'];?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="inner">
                                <div class="live">
                                    <div class="live-heading"><h5>Profile</h5></div>
                                    <div class="div-streem">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="left-img">
                                                    <div class="p-image">
                                                        <img class="img-responsive" src="images/<?=$userInfo['user_image']?>" width="100%" height="3002px"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="info">
                                                    <table style="font-size: 16px; color:#ddd;" class="">
                                                        <tr>
                                                            <td colspan="2">
                                                                <h3 style="margin-top: 0px;"><?php echo $userInfo['user_name'];?></h3>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 5px"><i class="fa fa-mobile-phone"></i> &nbsp</td>
                                                            <td><?php echo $userInfo['user_phone'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 5px"><i class="fa fa-envelope"></i> &nbsp</td>
                                                            <td> <?php echo $userInfo['user_email'];?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 5px"><i class="fa fa-money"></i> &nbsp</td>
                                                            <td><?php echo $userInfo['user_amount'];?> BDT</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="heading">
                                                    <div class="bs-heading-2 margin-top-10">
                                                        <h5>Other Info</h5>
                                                    </div>
                                                </div>
                                                <diV class="info-body margin-top-10">
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th><i class="fa fa-address-card"></i> &nbsp Present Address </th>
                                                            <td> <?php echo $userInfo['address'];?> </td>
                                                        </tr>
                                                    </table>
                                                </diV>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid c-container-fluid">
            <div class="row">

                <div class="bottom-footer">
                    <div class="container">
                        <div class="logo text-center">

                            <p class="text-center">© 2018. All rights reserved.</p>

                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i> </a></li>
                                <li><a href=""><i class="fa fa-twitter"></i> </a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i> </a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/menu-script.js"></script>
        <script type="text/javascript" src="js/modal.js"></script>
    </div>

</div>

</body>
</html>
