<?php
session_start();
if ($_SESSION['admin'] == null) {
    header('location:auth/login.php');
}
?>

<?php
include_once 'layouts/header.php';
?>


<?php

$admin_id = $_SESSION['admin_id'];
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');

$query = "SELECT * FROM `bet_post` WHERE tbl_admin_admin_id='$admin_id'";
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$i = 0;
foreach ($result as $res){
    $i++;
}
?>

<?php
$query = "SELECT * FROM `admin` WHERE admin_id='$admin_id'";
$stmt = $dbh->query($query);
$adminInfo = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
$query = "SELECT * FROM `user_beat` WHERE status ='Lose' AND admin_admin_id='$admin_id'";
$stmt = $dbh->query($query);
$adminEarning = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<?php
$income = 0;
foreach ($adminEarning as $earning){
    $earning['bet_amount'];
    $income = $income + $earning['bet_amount'];
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row text-center">

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $adminInfo['admin_amount']?></div>
                            <div>Balance</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $i?></div>
                            <div>Total Bet</div>
                        </div>
                    </div>
                </div>
                <a href="admin/all_bet.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-dollar fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $income?></div>
                            <div>Total Earning</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>


<?php
include_once 'layouts/footer.php';
?>
