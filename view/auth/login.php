<?php
session_start();
if (isset($_POST['submit']))
{
    if ($_POST['user']=='admin' && $_POST['password']=='123')
    {
        $_SESSION['user']= '';
        header('location:index.php');
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Betting</title>
    <link rel="stylesheet" href="../../assets/front/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/front/font-awesome.css">
    <link rel="stylesheet" href="../../assets/front/style.css">

    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon"/>
    <!--goolge fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800" rel="stylesheet">
    <!--icofonts css-->
    <link rel="stylesheet" href="../../assets/css/icofont.css">
    <!--bootstrap css-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!--owlcarousel css-->
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <!--YTPlayer css-->
    <link rel="stylesheet" href="../../assets/css/jquery.mb.YTPlayer.min.css">
    <!--magnific popup css-->
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <!--main css-->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!--Responsive css-->
    <link rel="stylesheet" href="../../assets/css/responsive.css">


    <style>
        *{
            margin: 0px;padding: 0px;font-family: Arial;
        }
        input[type=text],input[type=password]{
            width: 90%;
            padding: 12px 20px;
            margin: 8px 25px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 15px;
        }
        .lg-btn{
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 26px;
            border: none;
            cursor: pointer;
            width: 90%;
            font-size: 20px;
        }
        .fff{
            width: 250px;
            height: 80px;
        }

        .img{
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }
        .avatar{
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }
        .modal{
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content{
            background-color: #fefefe;
            margin: 4% auto 15% auto;
            border:1px solid #888;
            width: 40%;
            padding-bottom: 30px;
        }
        .close{
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }
        .close:hover,.close:focus{
            color: red;
            cursor: pointer;
        }
        .animate{
            animation: zoom 0.6s
        }
        @keyframes zoom{
            from{transform: scale(0)}
            to{transform: scale(1)}
        }
    </style>

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
            <div class="navbar-brand">
                <a href="#"><strong>Betting</strong></a>
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="a" style="color: red;font-weight: bold">Home</a></li>
                <li><a href="c" style="color: red;font-weight: bold">About</a></li>
                <li><a href="b" style="color: red;font-weight: bold">Instruction</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="padding-top: 8px">
                <div id="modal-log" class="modal">
                    <form class="modal-content animate form-group" method="post" action="auth/login.php">
                        <div class="img">
                            <span onclick="document.getElementById('modal-log').style.display='none'" class="close" title="Close Popup">&times;</span>
                            <img src="1.png" alt="Avatar" class="avatar">
                            <h1 style="text-align: center;">User Registration</h1>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Username" name="user">
                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                            <button class="lg-btn btn btn-success" type="submit" name="submit">Login</button>
                            <input type="checkbox" style="margin:25px 27px;"> Remember me
                            <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
                        </div>
                    </form>
                </div>
                <div id="modal-reg" class="modal">
                    <form class="modal-content animate form-group">
                        <div class="img">
                            <span onclick="document.getElementById('modal-reg').style.display='none'" class="close" title="Close Popup">&times;</span>
                            <h1 style="text-align: center;">User Registration</h1>
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Enter Username" name="user">
                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone">
                            <button class="lg-btn btn btn-success" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class=" form-group row" style="margin-top: 250px; margin-left: 250px;">
        <button onclick="document.getElementById('modal-log').style.display='block'" style="margin: 20px" class=" fff btn btn-success btn-lg">Login</button>
        <button onclick="document.getElementById('modal-reg').style.display='block'" class="fff btn btn-primary btn-lg">Registration</button>
    </div>
</div>

</body>
</html>
