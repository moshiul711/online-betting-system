<?php
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$query = "SELECT * FROM `bet_post` WHERE bet_category='cricket' ORDER BY `bet_id` DESC";
$stmt = $dbh->query($query);
$cricket = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$query = "SELECT * FROM `bet_post` WHERE bet_category='football' ORDER BY `bet_id` DESC";
$stmt = $dbh->query($query);
$football = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!--    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800" rel="stylesheet">-->
    <!--icofonts css-->
    <link rel="stylesheet" href="assets/css/icofont.css">
    <!--bootstrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--owlcarousel css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--YTPlayer css-->
    <link rel="stylesheet" href="assets/css/jquery.mb.YTPlayer.min.css">
    <!--magnific popup css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--main css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/front/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body >


<div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">Betting</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" class="">Home</a></li>
                    <li><a href="#services">Contact</a></li>
                    <li><a href="#pricing">Instruction</a></li>
                    <li><a href="#team">About Us</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-8">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" name="user">
                        <input type="password" name="password">
                        <button class="btn btn-sm btn-success" type="submit" name="submit">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');

if (isset($_POST['submit'])){
    $email = $_POST['user'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `users` WHERE `user_email` = '$email' AND `user_password` = '$password'";
    $stmt = $dbh->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $a = $result['user_id'];

    if ($result)
    {
        session_start();
        $_SESSION['user']= $email;
        $_SESSION['uid']=$a;
        header("location:users/index.php");
    }else{
        echo "Check Email or password";
    }
}
?>


<section class="work_area section_pdd" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section_title text_center heading_padd">
                    <h2>Upcoming Game</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <ul class="work_filter">
                <li class="filter" data-filter="all">all</li>
                <li class="filter" data-filter=".cricket">Cricket</li>
                <li class="filter" data-filter=".football">Football</li>
            </ul>
        </div>
        <div class="portfolio_items">
            <div class="row">
                <?php
                foreach ($cricket as $cric){
                    $admin = $cric['tbl_admin_admin_id'];
                ?>
                <div class="col-md-12 col-sm-12 mix cricket" class="row" style="padding-left: 20px;padding-top:0px">
                    <span class="fa fa-clock-o">&nbsp;&nbsp;&nbsp;&nbsp;<?=$cric['bet_start_time']?></span>
                    <h3 class="text-center" style="padding-bottom: 20px"><?=$cric['bet_name'];?></h3>
                    <div class="col-md-4 design">
                        <a href="user_matchbet.php?id=<?=$cric['bet_id']?>&adminID=<?=$admin?>">
                            <img src="admin/images/<?=$cric['picture1'];?>" alt="">
                            <p class="text-center">To win Match(<?=$cric['bet_team1']?> vs <?=$cric['bet_team2']?>) </p>
                        </a>
                    </div>
                    <div class="col-md-4 design">
                        <a href="user_tossbet.php?id=<?=$cric['bet_id'];?>&adminID=<?=$admin?>">
                            <img src="admin/images/toss.jpg" alt="">
                            <p class="text-center">To win Toss</p>
                        </a>
                    </div>
                    <div class="col-md-4 design">
                        <a href="user_playerbet.php?id=<?=$cric['bet_id'];?>&adminID=<?=$admin?>">
                            <img src="admin/images/cricketPlayer.jpg" alt="">
                            <p class="text-center">Man of the match</p>
                        </a>
                    </div>

                </div>
                <?php
                }
                ?>
            </div>
            <div class="row">
                <?php
                foreach ($football as $foot){
                    $admin = $foot['tbl_admin_admin_id'];
                ?>
                <div class="col-md-12 col-sm-12 mix football" class="row" style="padding-left: 20px;padding-top:0px">
                    <span class="fa fa-clock-o">&nbsp;&nbsp;&nbsp;&nbsp;<?=$foot['bet_start_time']?></span>
                    <h3 class="text-center" style="padding-bottom: 20px"><?=$foot['bet_name'];?></h3>
                    <div class="col-md-6 design">
                        <a href="user_matchbet.php?id=<?=$foot['bet_id']?>&adminID=<?=$admin?>">
                            <img src="admin/images/<?=$foot['picture1'];?>" alt="">
                            <p class="text-center">To win Match(<?=$foot['bet_team1']?> vs <?=$foot['bet_team2']?>) </p>
                        </a>
                    </div>
                    <div class="col-md-6 design">
                        <a href="user_drawbet.php?id=<?=$foot['bet_id'];?>&adminID=<?=$admin?>">
                            <img src="admin/images/<?=$foot['picture2'];?>" alt="">
                            <p class="text-center">To win Draw</p>
                        </a>
                    </div>

                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/jquery-1.12.4.min.js"></script>
<!--bootstrap js-->
<script src="assets/js/bootstrap.min.js"></script>
<!--counter js-->
<script src="assets/js/jquery.counterup.min.js"></script>
<!--waypoint js-->
<script src="assets/js/waypoint.js"></script>
<!--parallax js-->
<script src="assets/js/jquery.parallax-1.1.3.js"></script>
<!--owlcarousel js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--mixitup js-->
<script src="assets/js/mixitup.min.js"></script>
<!--YTPlayer js-->
<script src="assets/js/jquery.mb.YTPlayer.js"></script>
<!--typed js-->
<script src="assets/js/typed.min.js"></script>
<!--magnific popup js-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--custom js-->
<script src="assets/js/main.js"></script>

<script>
    var modal = document.getElementById('modal-wrapper');
    window.onclick = function(event){
        if (event.target ==modal) {
            modal.style.display="none";
        }
    }
</script>
</body>
</html>





