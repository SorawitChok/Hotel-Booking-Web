<?php
     require_once('connect.php');
     session_start();
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <title>Staff dashboard</title>
</head>
<body>
    <div class="dashboardbg">
    </div>
    <div class="historycard">
        <h1 id="dashhead">Booking Summary</h1>
        <hr>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Booking Date</th>
                    <th>Hotel</th>
                    <th>Room Type</th>
                    <th>Room Number</th>
                    <th>Customer Name</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $q = "select * from book_summary; ";
                    $result=$mysqli->query($q);
                    $count = $result->num_rows;
                    if($count==0)
                    {
                        echo '<tr>';
                            echo '<td colspan="7">No Records</td>';
                        echo '</tr>';
                    }
                    else{
                        while($row = $result->fetch_array())
                        {
                        echo '<tr>';
                            echo '<td>'.$row['BookingDate'].'</td>';
                            echo '<td>'.$row['HName'].'</td>';
                            echo '<td>'.$row['TName'].'</td>';
                            echo '<td>'.$row['RoomNum'].'</td>';
                            echo '<td>'.$row['FName'].' '.$row['LName'].'</td>';
                            echo '<td>'.$row['CheckInDate'].'</td>';
                            echo '<td>'.$row['CheckOutDate'].'</td>';
                        echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="dashsidebar">
        <img  class="userimg" src="user.jpg" alt="User image">
        <br>
        <h2 id="username">Welcome, <?php echo $_SESSION['FName']; ?></h2><br><br>
        <a class="featurebt" href="addHotel.php">Add Hotel</a><br><br>
        <a class="featurebt" href="addRoomType.php">Add Room Type</a><br><br>
        <a class="featurebt" href="addRoom.php">Add Room</a><br><br>
        <a style="text-decoration:none;" href="LogoutProcess.php" class="logoutbt">Log out</a>
    </div>
</body>
</html>