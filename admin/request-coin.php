<?php
session_start();
if ($_SESSION['admin'] == null) {
    header('location:auth/login.php');
}
?>

<?php
include_once 'layouts/header.php';
?>


<div id="page-wrapper" style="padding-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Deposit Request
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-offset-2">
                            <form role="form" action="" method="post">
                                <div class="form-group">
                                    <label>Transaction Account number:</label>
                                    <input type="text" class="form-control" name="tran_number" placeholder="Account Number">
                                </div>
                                <div class="form-group">
                                    <label>Transaction Amount:</label>
                                    <input type="text" class="form-control" name="tran_amount" placeholder="Transaction amount">
                                </div>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" name="request" class="btn btn-primary">Request</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

<?php
include_once 'layouts/footer.php';
?>

<?php
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$adminID = $_SESSION['admin_id'];
if (isset($_POST['request'])){
    $accountNumber = $_POST['tran_number'];
    $transactionAmount = $_POST['tran_amount'];
    $query = "INSERT INTO `admin_transaction` (`admin_transaction_type`, `admin_transaction_amount`, `admin_transaction_number`, `tbl_admin_admin_id`, `tbl_coin_value_coin_value_id`) VALUES ( 'i', '$transactionAmount', '$accountNumber', '$adminID', '1');";
    $result = $dbh->exec($query);
}
?>

