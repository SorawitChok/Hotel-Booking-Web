<?php
    require_once('connect.php');
    if(isset($_POST['sub']))
    {
        $cin = $_POST['checkin'];
        $cout = $_POST['checkout'];
        $bid = $_POST['bid'];
        

        
        $q = "update bookingandaccom set CheckInDate = '".$cin."' ,CheckOutDate = '".$cout."' where BookingID = '".$bid."';";
        $result=$mysqli->query($q);
        if(!$result){
            echo "INSERT failed. Error: ".$mysqli->error ;
            return false;
        }
        header("Location: dashboard.php");



    }


?>