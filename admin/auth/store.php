<?php
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$adminame = $_POST['admin_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$query = "INSERT INTO `admin` ( `admin_name`, `admin_email`, `admin_phone`, `admin_amount`, `type`, `admin_password`) VALUES ('$adminame', '$email', '$phone', '0', 'user', '$password')";
$result = $dbh->exec($query);


if ($result){
    header('location:login.php');
}
