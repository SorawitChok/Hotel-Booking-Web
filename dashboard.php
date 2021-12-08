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
    <title>My dashboard</title>
</head>
<body>
    <div class="dashboardbg">
    </div>
    <div class="historycard">
        <h1 id="dashhead">Manage Booking</h1>
        <hr>
        <table class="styled-table" >
            <thead>
                <tr>
                    <th>Booking Date</th>
                    <th>Hotel</th>
                    <th>Room Number</th>
                    <th>Price</th>
                    <th>Payment</th>
                    <th>Edit</th>
                    <th>Cancel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $uid = $_SESSION['UID'];
                $q = 'call get_book_history('.$uid.');';
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
                        $price = $row['Price'];
                    echo '<tr>';
                        echo '<td>'.$row['BookingDate'].'</td>';
                        echo '<td>'.$row['HName'].'</td>';
                        echo '<td>'.$row['RoomNum'].'</td>';
                        echo '<td>'.$row['Price'].'</td>';
                        echo '<td><a href="paymentMethod.php?price='.$price.'&bid='.$row['BookingID'].'" class="payment"><i class="far fa-credit-card" style="font-size: 15px; color: white;"></i></a></td>';
                        echo '<td><a href="editBooking.php?bid='.$row['BookingID'].'&hname='.$row['HName'].'" class="edit"><i class="far fa-edit" style="font-size: 15px; color: white;"></i></a></td>';
                        echo '<td><a href="delbooking.php?bid='.$row['BookingID'].'" class="cancel"><i class="far fa-trash-alt" style="font-size: 15px; color: white;"></i></a></td>';
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
        <a class="featurebt" href="searchHotel.php">Book Now</a><br><br>
        <a class="featurebt" href="addCreditCard.php">Add Credit Card</a><br><br>
        <a class="logoutbt" style="text-decoration:none;" href="LogoutProcess.php">Log out</a>
    </div>
</body>
</html>