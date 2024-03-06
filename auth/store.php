<?php
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$username = $_POST['user_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$address = $_POST['address'];


$tmp_name=$_FILES["image"]["tmp_name"];
$img_name=$_FILES['image']['name'];
move_uploaded_file($tmp_name,'../users/images/'.$img_name);

$query = "INSERT INTO `users` (`user_name`, `user_email`, `user_phone`, `user_image`, `address`, `user_amount`, `user_password`) VALUES ( '$username', '$email', '$phone', '$img_name', '$address', '0', '$password');";
$result = $dbh->exec($query);


if ($result){
    header('location:login.php');
}
