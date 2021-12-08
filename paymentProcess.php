<?php
    require_once('connect.php');
    if(isset($_POST['sub']))
    {
        $cname = $_POST['cardname'] ?? '';
        $cnum = $_POST['cardnumber'] ?? '';
        $expm = $_POST['expmonth'] ?? '';
        $expy = $_POST['expyear'] ?? '';
        $price = $_POST['price'];
        $bid = $_POST['bid'];

        $q0 = 'select * from bookingandaccom where BookingID ="'.$bid.'";';
        $result0 = $mysqli->query($q0);
        $row0 = $result0->fetch_array();
        $indate = date_create($row0['CheckInDate']);
        $outdate = date_create($row0['CheckOutDate']);
        $tmp = date_diff($outdate,$indate);
        $totaldate = $tmp->format('%a');
        $tax = $price * 0.07;
        $sub = $price * $totaldate;
        $ser = $sub * 0.1;
        $totalp = $sub + $ser + $tax;
        $q1 = "insert into payment(PaymentDate,TotalDayStay,SubTotalPrice,ServiceFee,Tax,TotalPrice) 
            values (CURRENT_DATE(),'$totaldate','$sub','$ser','$tax','$totalp');";
        $result1=$mysqli->query($q1);
        if(!$result1){
            echo "INSERT failed. Error: ".$mysqli->error ;
            return false;
        }
        $q2 = "select PaymentID from payment order by PaymentID Desc limit 1;";
        $result2=$mysqli->query($q2);
        $row2 = $result2->fetch_array();
        $q4 = "set foreign_key_checks = 0;";
        $result4=$mysqli->query($q4);
        $q3 = "update bookingandaccom set PaymentID = ".$row2['PaymentID']." ,CardNo = '".$cnum."' where BookingID = '".$bid."';";
        $result3=$mysqli->query($q3);
        $q5 = "set foreign_key_checks = 1;";
        $result5=$mysqli->query($q5);
        if(!$result3){
            echo "INSERT failed. Error: ".$mysqli->error ;
            return false;
        }
        header("Location: dashboard.php");



    }


?>