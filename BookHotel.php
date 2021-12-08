<?php
     require_once('connect.php');
     session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href = "styleform.css">
    <title>Book hotel</title>
</head>
<body>
    <h2 style="font-weight: 400;">Book Hotel Room</h2>
    <div class="row">
        <div class="col-50">
            <div class="container">
                <?php
                $hid = $_GET['hid'];
                $qh = "select HName from hotel where HotelID =".$hid.";";
                $result = $mysqli->query($qh);
                $row = $result->fetch_array();
                echo '<h3 style="font-weight: 200;">'.$row['HName'].'</h3>';
                ?>
                <div class="row">
                    <div class="col-50">
                        <?php
                            echo '<img src="./static/room_'.$_GET['hid'].'_'.$_GET['rtid'].'_'.$_GET['rid'].'.jpg" width="400" height="250">';
                        ?>
                    </div>
                    <div class="col-50">
                        <h3 style="font-weight: 200; color: rgb(1, 165, 165);">Information</h3>
                        <?php
                            $rid = $_GET['rid'];
                            $rtid =$_GET['rtid'];
                            $qr = "select RoomNum from room where RoomID =".$rid.";";
                            $resultr = $mysqli->query($qr);
                            $rowr = $resultr->fetch_array();
                            $qt = "select TName, NumBed, MaxGuest, SmokingAllow, FreeWifi, AC, TV, NumBreakfast  from roomtype where TypeID =".$rtid.";";
                            $resultt = $mysqli->query($qt);
                            $rowt = $resultt->fetch_array();
                            echo '<p>Room Type: '.$rowt['TName'].'</p>';
                            echo '<p>Room Number: '.$rowr['RoomNum'].'</p>';
                            echo '<p>Number of Bed: '.$rowt['NumBed'].'</p>';
                            echo '<p>Number of guest: '.$rowt['MaxGuest'].'</p>';
                            if($rowt['SmokingAllow']==0)
                            {
                                echo '<p>Smoking: Not allow</p>';
                            }
                            else
                            {
                                echo '<p>Smoking: Allow</p>';
                            }
                            echo '<hr>';
                            echo '<h3 style="font-weight: 200; color: rgb(1, 165, 165);">Benefit</h3>';
                            if($rowt['FreeWifi']==1)
                            {
                                echo '<p>Free Wifi: Yes</p>';
                            }
                            else
                            {
                                echo '<p>Free Wifi: No</p>';
                            }
                            if($rowt['TV']==1)
                            {
                                echo '<p>TV: Yes</p>';
                            }
                            else
                            {
                                echo '<p>TV: No</p>';
                            }
                            if($rowt['AC']==1)
                            {
                                echo '<p>AC: Yes</p>';
                            }
                            else
                            {
                                echo '<p>AC: No</p>';
                            }
                            echo '<p>Breakfast: '.$rowt['NumBreakfast'].'</p>';
                            echo '<a href="bookingProcess.php?hid='.$hid.'&rid='.$rid.'"  style="text-decoration:none;" ><button class="btn">Book now</button></a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>