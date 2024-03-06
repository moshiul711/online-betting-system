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
$query = "SELECT bet_type,bet_name,bet_amount,betPostedAt,user_name,status,bet_amount_value FROM user_beat u INNER JOIN users us on us.user_id = u.tbl_users_user_id WHERE user_id='$userID'";
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Betting History </title>
    <link type="http://bethouse7.com/assets/site/image/icon" rel="icon" href="image/mahmud.ico"/>
    <link href="http://bethouse7.com/assets/site/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <link href="http://bethouse7.com/assets/site/css/my-style.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="http://bethouse7.com/assets/site/js/jquery.js"></script>
    <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <style>
        #notification p{ color: black}
    </style>
</head>

<body><div class="container-fluid">
    <div class="row">
        <div class="top-header-bg">
            <div class="col-md-2">
                <a href="http://bethouse7.com/"><img src="Picture1.png" height="95" width="70" alt=""></a>
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
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse" style="color: white">
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
                                    <div id="page-wrapper" style="padding: 10px;background-color: white;margin-top: 5px">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3><?php echo $userInfo['user_name']?>'s Bet History</h3>
                                                <table id="example" class=" table table-bordered display" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Bet Type</th>
                                                        <th>Bet On</th>
                                                        <th>Bet Amount</th>
                                                        <th>Bet at</th>
                                                        <th>Status</th>
                                                        <th>Return</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $sl = 0;
                                                    foreach ($result as $res) {
                                                        $sl++;

                                                        ?>
                                                        <tr>
                                                            <td><?php echo $sl?></td>
                                                            <td><?php echo $res['bet_type']?></td>
                                                            <td><?php echo $res['bet_name']?></td>
                                                            <td><?php echo $res['bet_amount']?></td>
                                                            <td><?php echo $res['betPostedAt']?></td>
                                                            <td><?php echo $res['status']?></td>
                                                            <td><?php echo $res['bet_amount_value']?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col-lg-12 -->
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
                            <img alt="" src="image/bet365.png" width="100"/>
                            <ul style="margin-top: 10px">
                                <li><a href="">Mobile & Tablet</a></li>
                                <li><a href="">Betting News</a></li>
                                <li><a href="">Affiliates</a></li>
                                <li><a href="">Careers</a></li>
                                <li><a href="">Extra</a></li>
                                <li><a href="">Casino</a></li>
                                <li><a href="">Games</a></li>
                            </ul>



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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</body>
</html>
