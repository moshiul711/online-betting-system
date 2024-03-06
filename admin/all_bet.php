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
?>



<div id="page-wrapper" style="padding-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registered User's Information
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th class="text-center">League/Series</th>
                            <th class="text-center">Game Type</th>
                            <th class="text-center">Team-1</th>
                            <th class="text-center">Team-2</th>
                            <th class="text-center">Started at</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($result as $res) {

                            ?>
                            <tr class="odd gradeX">
                                <td class="text-center"><?php echo $res['bet_name']?></td>
                                <td class="text-center"><?php echo $res['bet_category']?></td>
                                <td class="text-center"><?php echo $res['bet_team1']?></td>
                                <td class="text-center"><?php echo $res['bet_team2']?></td>
                                <td class="text-center"><?php echo $res['bet_start_time']?></td>
                                <td class="text-center">
                                    <ul class="list-unstyled">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-edit fa-fw"></i> <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-user">
                                                <li>
                                                    <a href="#">View Details</a>
                                                </li>
                                                <li>
                                                    <a href="admin/auth/logout.php">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="admin/result-publish.php?betID=<?=$res['bet_id']?>">Result Publish</a>
                                                </li>
                                            </ul>
                                            <!-- /.dropdown-user -->
                                        </li>
                                    </ul>
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
include_once 'layouts/footer.php';
?>
