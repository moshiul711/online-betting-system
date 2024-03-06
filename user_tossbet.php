
<?php
include_once 'layouts/header.php';
?>



<?php
session_start();
if ($_SESSION['user'] == null) {
    header('location:auth/login.php');
}
?>



<?php
$id = $_GET['id'];
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$query = "SELECT * FROM `bet_post` WHERE bet_id='$id'";
$stmt = $dbh->query($query);
$cricket = $stmt->fetch(PDO::FETCH_ASSOC);
$team1 = $cricket['bet_team1'];
$team2 = $cricket['bet_team2'];
echo $toss_ratio = $cricket['toss_ratio'];

?>

<?php
$userid = $_SESSION['uid'];
$query = "SELECT * FROM `users` WHERE `user_id`='$userid'";
$stmt = $dbh->query($query);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$user_amount = $user['user_amount']
?>

<?php
$adminID = $_GET['adminID'];
$query = "SELECT * FROM `admin` WHERE `admin_id`='$adminID'";
$stmt = $dbh->query($query);
$adminInfo = $stmt->fetch(PDO::FETCH_ASSOC);
$adminBalance = $adminInfo['admin_amount'];
?>


<div class="row">
    <div class="col-sm-6 col-md-offset-3" style="margin-top: 40px;">
        <img src="admin/images/download.jpg" width="85%" height="140px" alt="">
    </div>
</div>

<div class="row">
    <h3 class="text-center"><?= $cricket['bet_name'] ?></h3>
    <div class="col-md-7 col-md-offset-1">
        <form action="" method="get">
            <table class="table table-bordered" id="dynamic_field">
                <h3>To Win the Toss</h3>
                <tr>
                    <td align="center">
                        <a href="user_tossbet.php?id=<?= $id ?>&&name=<?= $cricket['bet_team1'] ?>&&adminID=<?=$adminID?> ">
                            <?= $cricket['bet_team1'] ?>
                            <br>
                            <img src="admin/images/<?= $cricket['picture1'] ?>" height="157px" width="300px" alt="">
                        </a>
                    </td>
                    <td align="center">
                        <a href="user_tossbet.php?id=<?= $id ?> && name=<?= $cricket['bet_team2'] ?>&&adminID=<?=$adminID?>">
                            <?= $cricket['bet_team2'] ?>
                            <br>
                            <img src="admin/images/<?= $cricket['picture2'] ?>" height="157px" width="300px" alt="">
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-md-3" style="background-color: whitesmoke;margin-top: 55px">
        <form action="" method="post">
            <table style="margin-top: 5px">
                <tr>
                    <td>
                        <b><?= $cricket['bet_name'] ?></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="form-control" placeholder="Select Your Favourite team" name="beat_name" value="<?php
                        if (!empty($_GET['name'])){
                            echo $_GET['name'];
                        }
                        else{
                            echo "";
                        }
                        ?>" readonly>
                        <input type="hidden" class="form-control" name="bet_id" value="<?php echo $_GET['id']; ?>">
                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['uid']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php


                        if (isset($_POST['btn'])){
                            $bet_name = $_POST['beat_name'];
                            $bet_amount = $_POST['bet_amount'];
                            $bet_amount_value = $bet_amount*$toss_ratio;
                            $user_id = $_POST['user_id'];
                            $bet_id = $_POST['bet_id'];
                            if ( $bet_amount>$user_amount){
                                //$_SESSION['chk']="You Don't Have right amount";
                                echo "You Don't Have right amount";
                            }
                            elseif ($bet_amount <=0){
                                //$_SESSION['zero']="Zero & Negative value not allowed";
                                echo "Zero & Negative value not allowed";
                            }
                            else{
                                $query = "INSERT INTO `user_beat` (`userbet_id`, `bet_type`, `bet_name`, `bet_amount`, `bet_amount_value`,`status`,`admin_admin_id`, `tbl_users_user_id`, `tbl_betPost_bet_id`) VALUES (NULL, 'toss', '$bet_name', '$bet_amount', '$bet_amount_value','pending', '$adminID','$user_id', '$bet_id');";
                                $result = $dbh->exec($query);


                                if ($result){
                                    $rest_amount = $user_amount-$bet_amount;
                                    $query = "UPDATE `users` SET `user_amount` = '$rest_amount' WHERE `users`.`user_id` = '$user_id'";
                                    $res = $dbh->exec($query);
                                    //$_SESSION['suc']="Your bet placed successfully";
                                    echo "Your bet placed successfully";
                                    $profit = $bet_amount_value - $bet_amount;
                                    $admin_rest_balance = $adminBalance - $profit;
                                    $query = "UPDATE `admin` SET `admin_amount` = '$admin_rest_balance' WHERE `admin`.`admin_id` = '$adminID'";
                                    $adminBalanceUpdate = $dbh->exec($query);
                                }
                            }
                        }
                        ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <div class=" col-md-12 input-group" style="padding-top: 5px">
                            <input class="txtBox form-control" type="number" id="amount" placeholder="Enter beat amount"   name="bet_amount">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            <output id="res"></output>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="btn" class="btn btn-success">Place Bet</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include_once 'layouts/footer.php';
?>



