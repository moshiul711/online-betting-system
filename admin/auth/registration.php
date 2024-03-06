<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>


<!--<div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">-->
<!--    <div class="container">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a href="#" class="navbar-brand">Betting</a>-->
<!--        </div>-->
<!--        <div class="collapse navbar-collapse">-->
<!--            <ul class="nav navbar-nav navbar-right">-->
<!--                <li><a href="#header" class="">Home</a></li>-->
<!--                <li><a href="#services">Contact</a></li>-->
<!--                <li><a href="#pricing">Instruction</a></li>-->
<!--                <li><a href="#team">About Us</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div>-->
<!--            <!--            <marquee>-->-->
<!--            <!--                <h6>You Can Payment it on BKASH</h6>-->-->
<!--            <!--            </marquee>-->-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



<div id="signupbox" style="margin-top:150px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Admin Sign Up</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php">Sign
                    In</a></div>
        </div>
        <div class="panel-body">
            <form id="signupform" action="store.php" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="admin_name" placeholder="Enter your Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-3 control-label">Phone</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone" placeholder="Contact Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-signup" type="submit" name="submit" class="btn btn-info form-control">
                            Sign Up
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>