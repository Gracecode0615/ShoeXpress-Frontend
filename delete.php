<?php
include 'config.php';
$id = mysqli_real_escape_string($con, $_GET['id']);
$sql = "DELETE FROM `user` WHERE (`id` = '$id')";
$query = mysqli_query($con, $sql);
if($query){
    session_destroy();
    $_SESSION['user_name']= $sql;
    header('location:admin.php');
}
?>