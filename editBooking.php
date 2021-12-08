<?php 
    require_once('connect.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleform.css">
    <title>Edit booking</title>
</head>
<body>
    <h2 style="font-weight: 400;">Edit Booking</h2>      
    <div class="row">
        <div class="col-50">
            <div class="container">
                <form action="updateBookingProcess.php" method="post">
                    <div class="row">
                        <div class="col-50" style="font-weight: 200;">
                          <h3 style="font-weight: 200;">Edit Booking</h3>
                          <label for="hotel">Hotel Name</label>
                          <?php
                            $q = "select * from bookingandaccom where BookingID = ".$_GET['bid'].";";
                            $result = $mysqli->query($q);
                            $row = $result->fetch_array();
                            $q1 = "select RoomNum, TypeID from room where RoomID = ".$row['RoomID'].";";
                            $result1 = $mysqli->query($q1);
                            $row1 = $result1->fetch_array();
                            $q2 = "select TName from roomtype where TypeID = ".$row1['TypeID'].";";
                            $result2 = $mysqli->query($q2);
                            $row2 = $result2->fetch_array();
                            echo '<input type="text" id="hname" name="hname" placeholder="e.g. 100" value="'.$_GET['hname'].'" disabled>';
                            echo '<label for="roomtype">Room Type</label>';
                            echo '<input type="text" id="rtype" name="rtype" placeholder="e.g. 100" value="'.$row2['TName'].'" disabled>';
                            echo '<label for="rnum">Room Number</label>';
                            echo '<input type="text" id="rnum" name="rnum" placeholder="e.g. 100" value="'.$row1['RoomNum'].'" disabled>';
                            echo '<div class="row">';
                            echo '<div class="col-50">';
                            echo '<label for="checkin">Check In Date</label>';
                            echo'<input type="date" value="'.$row['CheckInDate'].'" name="checkin" >';
                            echo'</div>';
                            echo'<div class="col-50">';
                            echo'<div>';
                            echo'<label for="checkout">Check Out Date</label>';
                            echo'<input type="date" value="'.$row['CheckOutDate'].'" name="checkout" >';
                            echo'</div>';
                            echo'</div>';
                            echo'</div>';
                            echo'<input type="hidden" value="'.$_GET['bid'].'" name="bid">'
                          ?>
                        <input type="submit" value="Update" class="btn" name="sub">
                </form>
            </div>
        </div>
    </div>  
</body>
</html>