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
//$query = "SELECT bet_type,bet_name,bet_amount,betPostedAt,user_name,status,bet_amount_value FROM user_beat u INNER JOIN users us on us.user_id = u.tbl_users_user_id WHERE user_id='$userID'";
//$stmt = $dbh->query($query);
//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//?>



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
                            <li><a href="">My Bet <sup> 0 </sup>  </a></li>
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
                            <div class="inner" style="padding-top: 10px">

                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="panel-title">Update Your Profile</div>
                                    </div>

                                    <div class="panel-body">
                                        <form  action="update.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="firstname" class="col-md-3 control-label">User Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="user_name" value="<?=$userInfo['user_name']?>">
                                                    <input type="hidden"  name="image" value="<?=$userInfo['user_image']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="email" value="<?=$userInfo['user_email']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="lastname" class="col-md-3 control-label">Phone</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="phone" value="<?=$userInfo['user_phone']?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="lastname" class="col-md-3 control-label">Present Address</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="address"><?=$userInfo['address']?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div>

                                                </div>
                                                <label for="" class="col-md-3 control-label">Image</label>
                                                <div class="col-md-9">
                                                    <img class="img-responsive" style="padding-bottom: 10px" src="images/<?=$userInfo['user_image']?>" width="100px" height="300px"/>
                                                    <input type="file" name="image">
                                                </div>
                                            </div>

                                                <div class="col-md-offset-3">
                                                    <button type="submit" name="update" class=" btn btn-info">Update Profile</button>
                                                </div>

                                        </form>
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

<?php
if (isset($_POST['update'])){

    $username = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $address = $_POST['address'];

    $img_name=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $gen_name=substr(md5(time()),0,10);
    $img_ext=explode('.',$img_name);
    echo $ext_name=end($img_ext);
    $_POST['image']=$gen_name.'.'.$ext_name;

    $imgname1 = $_POST['image'];
    $imgname2 = $userInfo['user_image'];


    if (!empty($_FILES['image']['name'])){
        move_uploaded_file($tmp_name,'images/'.$_POST['image']);
        unlink('images/'.$userInfo['user_image']);
        $query = "UPDATE `users` SET `user_name` = '$username', `user_email` = '$email', `user_phone` = '$phone', `address` = '$address', `user_image` = '$imgname1'  WHERE `users`.`user_id` = '$userID';";
        $result = $dbh->exec($query);
        header('location:request-coin.php');
    }

    else{
        $query = "UPDATE `users` SET `user_name` = '$username', `user_email` = '$email', `user_phone` = '$phone', `address` = '$address', `user_image` = '$imgname2'  WHERE `users`.`user_id` = '$userID';";
        $result = $dbh->exec($query);
        header('location:index.php');
    }

}