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
    <title>Add Room</title>
</head>
<body>
    <h2 style="font-weight: 400;">Add Room</h2>      
    <div class="row">
        <div class="col-50">
            <div class="container">
                <form action="addRoomProcess.php" method="post" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col-50" style="font-weight: 200;">
                          <h3 style="font-weight: 200;">Room Information</h3>
                          <label for="hotel">Hotel Name</label>
                          <?php
                          $q = "select HotelID, HName from hotel;";
                          $result = $mysqli->query($q);
                          echo '<select name="hotel" id="hotel">';
                          while($row = $result->fetch_array())
                          {
                            echo '<option value="'.$row['HotelID'].'">'.$row['HName'].'</option>';
                          }
                          echo '</select>';
                          ?>
                          <label for="roomtype">Room Type</label>
                          <?php 
                            $qrt = 'select TypeID, TName from RoomType;';
                            $result2 = $mysqli -> query($qrt);
                            echo '<select name="roomtype" id="roomtype">';
                            while($row2 = $result2->fetch_array())
                            {
                                echo '<option value="'.$row2['TypeID'].'">'.$row2['TName'].'</option>';
                            }
                            echo '</select>';
                          ?>
                          
                          <label for="rnum">Room Number</label>
                          <input type="text" id="rnum" name="rnum" placeholder="e.g. 100">
                          <label >Add Room Picture</label>
                          <input type="file" name="file[]">
                        <div class="row">
                            <div class="col-50">
                                <input type="submit" value="Add more Room" name='sub' class="btn">
                            </div>
                            <div class="col-50">
                                <a href="dashboardStaff.php">
                                    <input type="button" value="Next &#8250;&#8250;" class="btn">
                                </a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>