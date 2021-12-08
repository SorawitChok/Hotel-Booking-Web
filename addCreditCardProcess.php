<?php
    require_once('connect.php');
    session_start();
    if(isset($_POST['sub']))
    {
        $cname = $_POST['cardname'];
        $cnum = $_POST['cardnumber'];
        $expm = $_POST['expmonth'];
        $expy = $_POST['expyear'];
        $uid = $_SESSION['UID'];
    
        $q = "insert into usercreditcard (CardNo,OwnerName,ExpMonth,ExpYear,UID)
                values ('$cnum','$cname','$expm','$expy','$uid');";
        $result=$mysqli->query($q);
        if(!$result){
            echo "INSERT failed. Error: ".$mysqli->error ;
            return false;
        }
        header("Location: dashboard.php");

    }
?>