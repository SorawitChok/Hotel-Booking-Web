<?php
    require_once('connect.php');
    if(isset($_POST['sub']))
    {
        $rtype = $_POST['rtype'];
        $maxguest = $_POST['maxguest'];
        $rprice = $_POST['rprice'];
        $numbed = $_POST['numbed'];
        $numbreak = $_POST['numbreakfast'];
        $AC = $_POST['AC'];
        $Wifi = $_POST['wifi'];
        $TV = $_POST['TV'];
        $smoking = $_POST['smoking'];

    
        $q = "insert into roomtype (TName,MaxGuest,Price,FreeWifi,AC,TV,NumBreakfast,NumBed,SmokingAllow)
                values ('$rtype','$maxguest','$rprice','$Wifi','$AC','$TV','$numbreak','$numbed','$smoking');";
        $result=$mysqli->query($q);
        if(!$result){
            echo "INSERT failed. Error: ".$mysqli->error ;
            return false;
        }
        header("Location: addRoomType.php");

    }
?>
