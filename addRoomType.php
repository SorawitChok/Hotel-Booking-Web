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
    <title>Add Room Type</title>
</head>
<body>
    <h2 style="font-weight: 400;">Add Room Type</h2>      
    <div class="row">
        <div class="col-50">
            <div class="container">
                <form action="addRoomTypeProcess.php" method="post">
                    <div class="row">
                        <div class="col-50" style="font-weight: 200;">
                          <h3 style="font-weight: 200;">Room Type Information</h3>
                          <label for="rtype">Room Type</label>
                          <input type="text" id="rtype" name="rtype" placeholder="Room Type Name">
                          <div class="row">
                              <div class="col-50">
                                  <label for="maxguest">Max Guest</label>
                                  <input type="text" id="maxguest" name="maxguest" placeholder="3">
                              </div>
                            <div class="col-50">
                              <label for="rprice">Price</label>
                              <input type="text" id="rprice" name="rprice" placeholder="2500">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-50">
                                <label for="numbed">Number of Bed</label>
                                <input type="text" id="numbed" name="numbed" placeholder="3">
                            </div>
                          <div class="col-50">
                            <label for="numbreakfast">Number of Breakfast</label>
                            <input type="text" id="numbreakfast" name="numbreakfast" placeholder="3">
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="AC">Air Conditioning</label>
                                <select name="AC" id="AC">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                          <div class="col-50">
                            <label for="wifi">Wifi</label>
                            <select name="wifi" id="wifi">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="TV">Television</label>
                                <select name="TV" id="TV">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                          <div class="col-50">
                            <label for="smoking">Allow Smoking</label>
                            <select name="smoking" id="smoking">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <input name="sub" type="submit" value="Add more Type" class="btn">
                            </div>
                            <div class="col-50">
                                <a href="addRoom.php">
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