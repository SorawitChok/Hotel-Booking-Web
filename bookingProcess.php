<?php
    require_once('connect.php');
    session_start();

    $hid = $_GET['hid'];
    $rid = $_GET['rid'];
    $uid = $_SESSION['UID'];
    $df = $_SESSION['datefrom'];
    $dt = $_SESSION['dateto'];

    $q = "insert into bookingandaccom(BookingDate,CheckInDate,CheckOutDate,UserID,HotelID,RoomID) 
          values (CURRENT_DATE,'$df','$dt','$uid','$hid','$rid');";
    $result=$mysqli->query($q);
    if(!$result){
        echo "INSERT failed. Error: ".$mysqli->error ;
        return false;
    }
    header("Location: dashboard.php");
?>