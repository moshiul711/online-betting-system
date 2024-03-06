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
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3>Game Add</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <form action="" method="post" enctype="multipart/form-data" id="add_name">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dynamic_field">
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Bet Category</label>
                                            <select class="form-control" name="category">
                                                <option value="">Select Category</option>
                                                <option value="football" selected>Football</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>League/Series Name</label>
                                            <input name="league_name" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Team 1 name</label>
                                            <input name="team1" class="form-control">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Team 2 name</label>
                                            <input name="team2" class="form-control">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Team-1 Picture</label>
                                            <input type="file" name="picture1" class="form-control">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Team-2 Picture</label>
                                            <input type="file" name="picture2" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Match Winner Ratio</h3>
                                            <div class="form-group">
                                                <label>Team-1 Ratio</label>
                                                <input name="team1_ratio" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Team-2 Ratio</label>
                                                <input name="team2_ratio" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <h3>Draw Winner Ratio</h3>
                                            <label>Draw Ratio</label>
                                            <input name="toss_ratio" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Base Price</h3>
                                            <label>Base Price</label>
                                            <input name="base_price" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <input name="player_ratio" type="hidden" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <h3>Match Time</h3>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Match Will Start at</label>
                                                <input type="datetime-local" name="start_time" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Match Will End at</label>
                                                <input type="datetime-local" name="end_time" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="player[]" placeholder="Add Player name">
                                    </div>
                                </td>

                            </tr>
                        </table>

                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'layouts/footer.php';
?>
<?php

if (isset($_POST['submit'])) {
    $player_name = implode(',', $_POST['player']);

    $tmp_name1 = $_FILES['picture1']['tmp_name'];
    $img_name1 = $_FILES['picture1']['name'];
    move_uploaded_file($tmp_name1, 'images/' . $img_name1);

    $tmp_name2 = $_FILES['picture2']['tmp_name'];
    $img_name2 = $_FILES['picture2']['name'];
    move_uploaded_file($tmp_name2, 'images/' . $img_name2);

    $category = $_POST['category'];
    $league_name = $_POST['league_name'];
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $team1_ratio = $_POST['team1_ratio'];
    $team2_ratio = $_POST['team2_ratio'];
    $player_ratio = $_POST['player_ratio'];
    $toss_ratio = $_POST['toss_ratio'];
    $base_price = $_POST['base_price'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];


    $admin_id = $_SESSION['admin_id'];

    $dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
    $query = "INSERT INTO `bet_post` (`bet_id`, `bet_category`, `bet_team1`, `bet_team2`, `bet_name`,`base_price`, `bet_start_time`, `bet_end_time`, `team1_ratio`, `team2_ratio`, `toss_ratio`, `tbl_admin_admin_id`,`player_name`, `player_ratio`, `picture1`, `picture2`) VALUES (NULL, '$category', '$team1', '$team2', '$league_name','$base_price', '$start_time', '$end_time', '$team1_ratio', '$team2_ratio', '$toss_ratio', '$admin_id','$player_name', '$player_ratio', '$img_name1', '$img_name2');";
    $result = $dbh->exec($query);
    if ($result) {
        echo "Game added Successfully !!";
    } else {
        echo "Failed to Upload Game";
    }

}

?>
















































































