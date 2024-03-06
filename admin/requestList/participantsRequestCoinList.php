<?php
session_start();
if ($_SESSION['admin'] == null) {
    header('location:auth/login.php');
}
?>

<?php


$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');

$query = "SELECT * FROM `user_transaction` WHERE transaction_type = 'i'";
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);
?>

<?php
include_once '../layouts/header.php';
?>


<div id="page-wrapper" style="padding-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Participants Request Coin
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th class="text-center">Participants Name</th>
                            <th class="text-center">Transaction Number</th>
                            <th class="text-center">Transaction Amount</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($result as $res) {
                                ?>
                                <tr class="odd gradeX">
                                    <td class="text-center"><?php echo $res['participants_name']?></td>
                                    <td class="text-center"><?php echo $res['transaction_account']?></td>
                                    <td class="text-center"><?php echo $res['transaction_amount']?></td>
                                    <td class="text-center">
                                        <a href="accept/updatePCoinRequest.php?id=<?=$res['transaction_id']?>" class="btn btn-success">Accept</a> |
                                        <a href="" class="btn btn-danger">Reject</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>








<?php
include_once '../layouts/footer.php';
?>
