<?php


echo $getUrl = $_GET['id'];

?>



<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Betting</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#header" class="">Home</a></li>
                <li><a href="#services">Contact</a></li>
                <li><a href="#pricing">Instruction</a></li>
                <li><a href="#team">About Us</a></li>
            </ul>
        </div>
    </div>
</div>


<div id="page-wrapper" style="padding-top: 70px">
    <div class="container-fluid">
        <div class="row">
<!--            <div class="col-md-6" style="background-color: #1b6d85">-->
<!--                --><?php
//                include_once 'crawl/simple_html_dom.php';
//
//                $url = "http://www.palmbeachcodeschool.com/news/";
//                $html = file_get_html($url);
//
//                foreach ($html->find('.uabb-blog-post-content') as $div){
//                    var_dump($div);
//                }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
////                global $crawled_urls, $found_urls;
////                $str = file_get_html('http://www.cricbuzz.com/cricket-series/');
////                foreach($str->find("a") as $li){
////                    //echo "lin";
////                    //$url=perfect_url($li->href,$u);
////                    $url = $li->href;
////                    $enurl=urlencode($url);
////                    if($url!='' && substr($url,0,4)!="mail" && substr($url,0,4)!="java" && array_key_exists($enurl,$found_urls)==0){
////                        //echo "cehck 2";
////                        $found_urls[$enurl]=1;
////                        echo "<li><a target='_blank' href='".$url."'>".$url."</a></li>";
////                    }
////                }
//                ?>
<!---->
<!--            </div>-->

            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Game Add Form
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-2">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Bet Category</label>
                                        <input type="radio" class="form-control" name="category"value="cricket"> Cricket
                                        <input type="radio" name="category"value="football"> Football
                                    </div>
                                    <div class="form-group">
                                        <label>League/Series Name</label>
                                        <input name="league_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Team-1</label>
                                        <input name="team1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Team-1 Picture</label>
                                        <input type="file" name="picture1" class="form-control">
                                    </div>
                                    <div class="form-group ">
                                        <label>Team-2</label>
                                        <input name="team2" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Team-2 Picture</label>
                                        <input type="file" name="picture2" class="form-control">
                                    </div>

                                    <div class="form-group ">
                                        <label>Team-1 Ratio</label>
                                        <input name="team1_ratio" class="form-control">
                                    </div>
                                    <div class="form-group ">
                                        <label>Team-2 Ratio</label>
                                        <input name="team2_ratio" class="form-control">
                                    </div>

                                    <div class="form-group ">
                                        <label>Player Ratio</label>
                                        <input name="player_ratio" class="form-control">
                                    </div>

                                    <div class="form-group ">
                                        <label>Toss Ratio</label>
                                        <input name="toss_ratio" class="form-control">
                                    </div>

                                    <div class="form-group ">
                                        <label>Match Will Start at</label>
                                        <input type="datetime-local" name="start_time" class="form-control">
                                    </div>
                                    <div class="form-group ">
                                        <label>Match Will End at</label>
                                        <input type="datetime-local" name="end_time" class="form-control">
                                    </div>

                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
</div>


</body>
</html>

<?php

if (isset($_POST['submit'])){

    $tmp_name1 = $_FILES['picture1']['tmp_name'];
    $img_name1 = $_FILES['picture1']['name'];
    move_uploaded_file($tmp_name1,'images/'.$img_name1);

    $tmp_name2 = $_FILES['picture2']['tmp_name'];
    $img_name2 = $_FILES['picture2']['name'];
    move_uploaded_file($tmp_name2,'images/'.$img_name2);

    $category = $_POST['category'];
    $league_name = $_POST['league_name'];
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $team1_ratio = $_POST['team1_ratio'];
    $team2_ratio = $_POST['team2_ratio'];
    $player_ratio = $_POST['player_ratio'];
    $toss_ratio = $_POST['toss_ratio'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];


    $dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
    $query = "INSERT INTO `bet_post` (`bet_id`, `bet_category`, `bet_team1`, `bet_team2`, `bet_name`, `bet_start_time`, `bet_end_time`, `team1_ratio`, `team2_ratio`, `toss_ratio`, `tbl_admin_admin_id`, `player_ratio`, `picture1`, `picture2`) VALUES (NULL, '$category', '$team1', '$team2', '$league_name', '$start_time', '$end_time', '$team1_ratio', '$team2_ratio', '$toss_ratio', '1', '$player_ratio', '$img_name1', '$img_name2');";
    $result = $dbh->exec($query);
    if ($result){
        echo "success";
    }
    else{
        echo "fgdfgds";
    }
}
