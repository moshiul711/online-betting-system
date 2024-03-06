<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>
<body style="background-color: wheat">
<div class="container-fluid">
    <div class="row">
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
    </div>


    <div class="row" style="margin-top: 50px">

        <h3 class="text-center">Transaction Page</h3>

        <form action="">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group" id="1">
                    <label class="text-center" for="">What do you want to do?</label>
                    <input type="radio" id="withdraw"  name="transaction" value="withdraw">Withdraw
                    <input type="radio" id="deposit" name="transaction" value="deposit">Deposit
                </div>
                <div class="form-group" id="new">

                </div>
                <div class="form-group">
                    <button type="submit" class=" form-control btn btn-success">Submit</button>
                </div>
            </div>
        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>

            $(document).ready(function () {

                $('#withdraw').click(function () {
                   $('#new').append('<input type="text" class="form-control" name="user_id" placeholder="enter your user id">\n' +
                       '                    <input type="text" class="form-control" name="amount" placeholder="enter your amount">');
                });
                $('#deposit').click(function () {
                   $('#new').append('<input type="text" class="form-control" name="user_id" placeholder="enter  user id">\n' +
                       '                    <input type="text" class="form-control" name="amount" placeholder="enter amount">');
                });

            });

        </script>
</body>
</html>

