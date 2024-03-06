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
$betID = $_GET['betID'];
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$query = "SELECT * FROM `bet_post` WHERE bet_id='$betID'";
$stmt = $dbh->query($query);
$betInfo = $stmt->fetch(PDO::FETCH_ASSOC);

$player_name = explode(',',$betInfo['player_name']);
?>
<div id="page-wrapper" style="padding-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Result Publication
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-offset-2">
                            <form role="form" action="" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>League/Series Name:</label>
                                        <?php echo $betInfo['bet_name']?>
                                    </div>
                                    <div class="form-group">
                                        <label>Match Winner</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="matchWinner" id="optionsRadiosInline1" value="<?=$betInfo['bet_team1']?>"><?=$betInfo['bet_team1']?>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="matchWinner" id="optionsRadiosInline2" value="<?=$betInfo['bet_team2']?>"><?=$betInfo['bet_team2']?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Toss Winner</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="tossWinner" id="optionsRadiosInline1" value="<?=$betInfo['bet_team1']?>" ><?=$betInfo['bet_team1']?>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="tossWinner" id="optionsRadiosInline2" value="<?=$betInfo['bet_team2']?>"><?=$betInfo['bet_team2']?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Man of the match winner</label>
                                        <select name="playerWinner" class="form-control" id="">
                                            <option value="">Select one...</option>
                                            <?php
                                            for ($i=0;$i<count($player_name);$i++) {
                                                ?>
                                                <option value="<?= $player_name[$i] ?>"><?= $player_name[$i] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Draw Winner</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="drawWinner" id="optionsRadiosInline1" value="<?=$betInfo['bet_team1']?>"><?=$betInfo['bet_team1']?>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="drawWinner" id="optionsRadiosInline2" value="<?=$betInfo['bet_team2']?>"><?=$betInfo['bet_team2']?>
                                        </label>
                                    </div>
                                </div>
                                <div style="padding-top: 200px;padding-left: 15px">
                                    <input type="hidden" name="bet_id" value="<?=$betID?>">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Publish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'layouts/footer.php';
?>



<?php

if (isset($_POST['submit'])) {

    if (isset($_POST['matchWinner'])) {

        $matchwinner = $_POST['matchWinner'];
        $betID = $_POST['bet_id'];
        $query = "SELECT * FROM `user_beat` WHERE tbl_betPost_bet_id='$betID' AND bet_type='match'";
        $stmt = $dbh->query($query);
        $bet_info = $stmt->fetchAll();


        foreach ($bet_info as $userInfo) {

            if ($matchwinner == $userInfo['bet_name']) {

                $balance = $userInfo['bet_amount_value'];
                $user_id = $userInfo['tbl_users_user_id'];
                $query = "SELECT * FROM `users` where user_id = '$user_id'";
                $stmt = $dbh->query($query);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);


                $winAmount = $balance + $result['user_amount'];


                $query = "UPDATE users, user_beat SET users.`user_amount`='$winAmount',user_beat.status='Win' WHERE users.user_id='$user_id' AND user_beat.tbl_users_user_id='$user_id' AND user_beat.tbl_betPost_bet_id='$betID' AND user_beat.bet_name='$matchwinner' AND user_beat.bet_type='match'";
                $res = $dbh->exec($query);
                echo '<pre>';
                print_r($res);
                echo '</pre>';


            } else {
                $betAmount = $userInfo['bet_amount'];
                $adminID = $_SESSION['admin_id'];
                $query = "SELECT * FROM `admin` where admin_id = '$adminID'";
                $stmt = $dbh->query($query);
                $adminInfo = $stmt->fetch();
                $adminBalance = $adminInfo['admin_amount'];
                $adminGetReturn = $betAmount + $adminBalance;

                $query = "UPDATE admin,user_beat SET admin.`admin_amount` = '$adminGetReturn.',user_beat.status='Lose' WHERE `admin`.`admin_id` = '$adminID' AND user_beat.tbl_betPost_bet_id='$betID' AND user_beat.bet_type='match' AND user_beat.bet_name !='$matchwinner'";
                $result = $dbh->exec($query);

            }
        }
    }

    if (isset($_POST['tossWinner'])) {

        $tosswinner = $_POST['tossWinner'];
        $betID = $_POST['bet_id'];
        $query = "SELECT * FROM `user_beat` WHERE tbl_betPost_bet_id='$betID' AND bet_type='toss'";
        $stmt = $dbh->query($query);
        $bet_info = $stmt->fetchAll();


        foreach ($bet_info as $userInfo) {

            if ($tosswinner == $userInfo['bet_name']) {

                $balance = $userInfo['bet_amount_value'];
                $user_id = $userInfo['tbl_users_user_id'];
                $query = "SELECT * FROM `users` where user_id = '$user_id'";
                $stmt = $dbh->query($query);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);


                $winAmount = $balance + $result['user_amount'];


                $query = "UPDATE users, user_beat SET users.`user_amount`='$winAmount',user_beat.status='Win' WHERE users.user_id='$user_id' AND user_beat.tbl_users_user_id='$user_id' AND user_beat.tbl_betPost_bet_id='$betID' AND user_beat.bet_name='$tosswinner' AND user_beat.bet_type='toss'";
                $res = $dbh->exec($query);
                echo '<pre>';
                print_r($res);
                echo '</pre>';


            } else {
                $betAmount = $userInfo['bet_amount'];
                $adminID = $_SESSION['admin_id'];
                $query = "SELECT * FROM `admin` where admin_id = '$adminID'";
                $stmt = $dbh->query($query);
                $adminInfo = $stmt->fetch();
                $adminBalance = $adminInfo['admin_amount'];
                $adminGetReturn = $betAmount + $adminBalance;

                $query = "UPDATE admin,user_beat SET admin.`admin_amount` = '$adminGetReturn.',user_beat.status='Lose' WHERE `admin`.`admin_id` = '$adminID' AND user_beat.tbl_betPost_bet_id='$betID' AND user_beat.bet_type='toss' AND user_beat.bet_name !='$tosswinner'";
                $result = $dbh->exec($query);

            }
        }
    }

    if (isset($_POST['playerWinner'])) {

        $playerwinner = $_POST['playerWinner'];
        $betID = $_POST['bet_id'];
        $query = "SELECT * FROM `user_beat` WHERE tbl_betPost_bet_id='$betID' AND bet_type='player'";
        $stmt = $dbh->query($query);
        $bet_info = $stmt->fetchAll();


        foreach ($bet_info as $userInfo) {

            if ($playerwinner == $userInfo['bet_name']) {

                $balance = $userInfo['bet_amount_value'];
                $user_id = $userInfo['tbl_users_user_id'];
                $query = "SELECT * FROM `users` where user_id = '$user_id'";
                $stmt = $dbh->query($query);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);


                $winAmount = $balance + $result['user_amount'];


                $query = "UPDATE users, user_beat SET users.`user_amount`='$winAmount',user_beat.status='Win' WHERE users.user_id='$user_id' AND user_beat.tbl_users_user_id='$user_id' AND user_beat.tbl_betPost_bet_id='$betID' AND user_beat.bet_name='$playerwinner' AND user_beat.bet_type='player'";
                $res = $dbh->exec($query);

            } else {
                $betAmount = $userInfo['bet_amount'];
                $adminID = $_SESSION['admin_id'];
                $query = "SELECT * FROM `admin` where admin_id = '$adminID'";
                $stmt = $dbh->query($query);
                $adminInfo = $stmt->fetch();
                $adminBalance = $adminInfo['admin_amount'];
                $adminGetReturn = $betAmount + $adminBalance;

                $query = "UPDATE admin,user_beat SET admin.`admin_amount` = '$adminGetReturn.',user_beat.status='Lose' WHERE `admin`.`admin_id` = '$adminID' AND user_beat.tbl_betPost_bet_id='$betID' AND user_beat.bet_type='player' AND user_beat.bet_name !='$playerwinner'";
                $result = $dbh->exec($query);

            }
        }
    }

    if (isset($_POST['drawWinner'])) {

        $drawwinner = $_POST['drawWinner'];
        $betID = $_POST['bet_id'];
        $query = "SELECT * FROM `user_beat` WHERE tbl_betPost_bet_id='$betID' AND bet_type='draw'";
        $stmt = $dbh->query($query);
        $bet_info = $stmt->fetchAll();


        foreach ($bet_info as $userInfo) {

            if ($drawwinner == $userInfo['bet_name']) {

                $balance = $userInfo['bet_amount_value'];
                $user_id = $userInfo['tbl_users_user_id'];
                $query = "SELECT * FROM `users` where user_id = '$user_id'";
                $stmt = $dbh->query($query);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);


                $winAmount = $balance + $result['user_amount'];


                $query = "UPDATE users, user_beat SET users.`user_amount`='$winAmount',user_beat.status='Win' WHERE users.user_id='$user_id' AND user_beat.tbl_users_user_id='$user_id' AND user_beat.tbl_betPost_bet_id='$betID' AND user_beat.bet_name='$drawwinner' AND user_beat.bet_type='draw'";
                $res = $dbh->exec($query);

            } else {
                $betAmount = $userInfo['bet_amount'];
                $adminID = $_SESSION['admin_id'];
                $query = "SELECT * FROM `admin` where admin_id = '$adminID'";
                $stmt = $dbh->query($query);
                $adminInfo = $stmt->fetch();
                $adminBalance = $adminInfo['admin_amount'];
                $adminGetReturn = $betAmount + $adminBalance;

                $query = "UPDATE admin,user_beat SET admin.`admin_amount` = '$adminGetReturn.',user_beat.status='Lose' WHERE `admin`.`admin_id` = '$adminID' AND user_beat.tbl_betPost_bet_id='$betID' AND user_beat.bet_type='draw' AND user_beat.bet_name !='$drawwinner'";
                $result = $dbh->exec($query);

            }
        }
    }
}


?>

