<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
require_once('connect.php');
$q = "select UID,FName,UserType from userinfo where Username = '$username' and Password = '$password';";
$result=$mysqli->query($q);
$count = $result->num_rows;
if($count==1){
    $row = $result->fetch_array();
    $_SESSION['UID'] = $row['UID'];
    $_SESSION['FName'] = $row['FName'];
    $_SESSION['UserType'] = $row['UserType'];
    header("Location: Landing.php");
}
elseif($count != 1){
    $state = 1;
    header("Location: Login.php?state=".$state);
}
?>