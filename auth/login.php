<?php
session_start();
if($_SESSION['user']!=null){
    header("location:../index.php");
}

$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');

if (isset($_POST['submit'])){
    $email = $_POST['user'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `users` WHERE `user_email` = '$email' AND `user_password` = '$password'";
    $stmt = $dbh->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $a = $result['user_id'];
    $b = $result['user_name'];

    if ($result)
    {
        session_start();
        $_SESSION['user']= $email;
        $_SESSION['uid']=$a;
        echo $_SESSION['username1']=$b;
        header("location:../index.php");
    }else{
      echo "Check Email or password";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/front/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

<div id="loginbox" style="margin-top:150px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign In</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px">
            </div>
        </div>

        <div style="padding-top:30px" class="panel-body">

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

            <form id="loginform" class="form-horizontal" role="form" method="post" action="">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="user" placeholder="username or email">
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                </div>


<!--                <div class="input-group">-->
<!--                    <div class="checkbox">-->
<!--                        <label>-->
<!--                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->


                <div style="margin-top:10px" class="form-group">
                    <div class="col-sm-12 controls">
                        <button type="submit" name="submit" class="btn btn-success form-control">Login</button>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                            Don't have an account!
                            <a href="registration.php">
                                Sign Up Here
                            </a>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
</body>
</html>
