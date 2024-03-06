<?php
session_start();
if ($_SESSION['user'] == null) {
    header('location:../auth/login.php');
}
?>

<?php

var_dump($_SESSION);

$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
echo $userID = $_SESSION['uid'];
echo $name = $_SESSION['username1'];
$query = "SELECT * FROM `users` WHERE user_id='$userID'";
$stmt = $dbh->query($query);
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
$userInfo['user_id'];

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Deposit Request </title>
    <link type="http://bethouse7.com/assets/site/image/icon" rel="icon" href="image/mahmud.ico"/>
    <link href="http://bethouse7.com/assets/site/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <link href="http://bethouse7.com/assets/site/css/my-style.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="http://bethouse7.com/assets/site/js/jquery.js"></script>

    <style>
        #notification p{ color: black}
    </style>
</head>

<body><div class="container-fluid">
    <div class="row">
        <div class="top-header-bg">
            <div class="col-md-2">
                <a href=""><img src="images/Picture1.png" height="95" width="70" alt=""></a>
            </div>
            <div class="col-md-10">

                <nav class="navbar navbar-default c-default">

                    <!-- Brand and toggle get grouped for better mobile display -->
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
                            <li><a href="#">Sports </a></li>
                            <li><a href="http://bethouse7.com/profile/pending_bet">My Bet <sup> 0 </sup>  </a></li>
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
                                        <li><a href="http://bethouse7.com/profile/edit_profile">Edit Profile</a></li>
                                        <li><a href="http://bethouse7.com/profile/change_password">Change Password</a></li>
                                        <li><a href="request-coin.php">Balance Request</a></li>
                                        <li><a href="request-withdraw.php">Withdraw Request</a></li>
                                        <li><a href="../auth/logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="inner">
                                <div class="live">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="heading">
                                                <div class="live-heading">
                                                    <h3 style="color: antiquewhite">Balance Request</h3>
                                                </div>
                                            </div>
                                            <diV class="info-body margin-top-10">
                                                <p class="text-center" style="color: white">You Will receive your payment within 24 hours.</p>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label style="color: #ddd;" class="control-label col-sm-3" >Request Amount</label>
                                                        <div class="col-sm-9">
                                                            <input  type="text" class="form-control c-form-control" name="amount" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="color: #ddd;" class="control-label col-sm-3" >Transaction Number</label>
                                                        <div class="col-sm-9">
                                                            <input  type="text" class="form-control c-form-control" name="tnx_number">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: #ddd;" class="control-label col-sm-3" ></label>
                                                        <div class="col-sm-9">
                                                            <button  type="submit" class="btn btn-primary c-primary" name="submit" value="Submit" style="margin-bottom: 20px">Update <i class="fa fa-arrow-right"></i></button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <?php

                                                if (isset($_POST['submit'])){

                                                    $requestAmount = $_POST['amount'];
                                                    $transactionNumber = $_POST['tnx_number'];

                                                    $query = "INSERT INTO `user_transaction` ( `participants_name`,`transaction_type`, `transaction_amount`, `transaction_account`, `tbl_coin_value_coin_value_id`, `tbl_users_user_id`) VALUES ( '$name','i', '$requestAmount', '$transactionNumber', '1', '$userID');";
                                                    $result = $dbh->exec($query);
                                                    if ($result){
                                                        echo "Request Submitted Successfully";
                                                    }
                                                    else
                                                        echo "Error!!!";
                                                }

                                                ?>

                                            </diV>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="container-fluid c-container-fluid">
            <div class="row">

                <div class="bottom-footer">
                    <div class="container">
                        <div class="logo text-center">




                            <!--<p class="text-center">© 2001-2017 bet365. All rights reserved.</p>-->

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

        <script type="text/javascript" src="http://bethouse7.com/assets/site/js/bootstrap.js"></script>
        <script type="text/javascript" src="http://bethouse7.com/assets/site/js/menu-script.js"></script>

    </div>
</div>

</body>
</html>


