<?php


session_start();
$dbh = new PDO('mysql:host=localhost;dbname=bet', 'root', '');
$userID = $_SESSION['uid'];
$query = "SELECT * FROM `users` WHERE user_id='$userID'";
$stmt = $dbh->query($query);
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
$userInfo['user_id'];

if (isset($_POST['update'])){



    $username = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $address = $_POST['address'];







    if (!empty($_FILES['image']['name'])){
        $img_name=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $gen_name=substr(md5(time()),0,10);
        $img_ext=explode('.',$img_name);
        echo $ext_name=end($img_ext);
        $_POST['image']=$gen_name.'.'.$ext_name;
        move_uploaded_file($tmp_name,'images/'.$_POST['image']);
        unlink('images/'.$userInfo['user_image']);

    }

    $query = "UPDATE `users` SET `user_name` = '$username', `user_email` = '$email', `user_phone` = '$phone', `address` = '$address', `user_image` = '".$_POST['image']."'  WHERE `users`.`user_id` = '$userID';";
    $result = $dbh->exec($query);
    if ($result){
        header('location:index.php');
    }

}