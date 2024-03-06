<?php
session_start();
if ($_SESSION['admin'] == null) {
    header('location:auth/login.php');
}
?>

<?php
include_once '../layouts/header.php';
?>










<?php
include_once '../layouts/footer.php';
?>
