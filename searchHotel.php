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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href = "style.css">
    <title>Book now</title>
</head>
<body>
    <div class="SearchBack">
        <div class="SearchCard">
            <form action="searchHotel.php" method='post'>
                <h1 style="color: #ffa51d;">Vacation?</h1><br>
                <div class="labelcon">
                    <div>
                        <label for="search">Destination</label><br>
                        <input class="curvebox long" name="dest" type="text" placeholder="eg. Bangkok, Thailand">
                    </div>
                    <div>
                        <label for="datefrom">From</label><br>
                        <input class="curvebox"  name="datefrom" type="date" >
                    </div>
                    <div>
                        <label for="dateto">To</label><br>
                        <input class="curvebox" name="dateto" type="date" >
                    </div>
                    <div>
                        <label for="dateto">Number of guests</label><br>
                        <input class="curvebox"  name="numguest" type="text" placeholder="eg. 2" >
                    </div>
                    <div>
                        <br>
                        <input type="submit" class="buttonWB" name='search'>
                    </div>
                </div>
            </form>
        </div>
        <br><br><br><br><br><br><br><br>
        <div style="color: #777;background-color:white;text-align:center;padding:50px 20px;text-align: justify;">
            <p style="text-align:center;">Hotel List</p>
            <?php 
                if(isset($_POST['search']))
                {
                    $_SESSION['datefrom'] = $_POST['datefrom'];
                    $_SESSION['dateto'] = $_POST['dateto'];
                    $_SESSION['numguest'] = $_POST['numguest'];
                    $dest = $_POST['dest'];
                    $from = $_POST['datefrom'];
                    $to = $_POST['dateto'];
                    $num = $_POST['numguest'];
                    $q1 = "call get_room_list('".$dest."','".$from."','".$to."','".$num."');";
                    $result1=$mysqli->query($q1);
                    while($row1 = $result1->fetch_array())
                    {
                        echo '<div class="hotelcard">';
                            echo '<div class="row">';
                                echo '<div class="col-25">';
                                    echo '<img src="./static/room_'.$row1['HotelID'].'_'.$row1['TypeID'].'_'.$row1['RoomID'].'.jpg" width="150px" height="150px" style="object-fit: cover;" >';
                                echo '</div>';
                                echo '<div class="col-60">';
                                    echo '<div>';
                                        echo '<h3>'.$row1['HName'].'</h3>';
                                        echo '<P>Room Type: '.$row1['TName'].'</P>';
                                        echo '<p>Room Number: '.$row1['RoomNum'].'</p>';
                                        echo '<p>Price: '.number_format($row1['Price']).' baht</p>';
                                        echo '<div class="row">';
                                            echo '<div class="col-50">';
                                                echo '<p>Location: '.$row1['Province'].', '.$row1['Country'].'</p>';
                                            echo '</div>';
                                            echo '<div class="col-25">';
                                                echo'<a href="BookHotel.php?hid='.$row1['HotelID'].'&rid='.$row1['RoomID'].'&rtid='.$row1['TypeID'].'" class="buttonWB" style="text-decoration:none;">Book now!</a>';
                                            echo'</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';

                    }

                }
                else
                {
                    $q = 'SELECT h.HotelID, r.RoomID, rt.TypeID, h.HName, r.RoomNum, rt.TName, rt.Price, h.Country, h.Province 
                          FROM hotel h, room r, roomtype rt 
                          WHERE r.TypeID = rt.TypeID
                          AND r.HotelID = h.HotelID
                          ORDER BY rt.Price DESC LIMIT 5;';
                    $result=$mysqli->query($q);
                    while($row = $result->fetch_array())
                    {
                        echo '<div class="hotelcard">';
                            echo '<div class="row">';
                                echo '<div class="col-25">';
                                    echo '<img src="./static/room_'.$row['HotelID'].'_'.$row['TypeID'].'_'.$row['RoomID'].'.jpg" width="150px" height="150px" style="object-fit: cover;" >';
                                echo '</div>';
                                echo '<div class="col-60">';
                                    echo '<div>';
                                        echo '<h3>'.$row['HName'].'</h3>';
                                        echo '<P>Room Type: '.$row['TName'].'</P>';
                                        echo '<p>Room Number: '.$row['RoomNum'].'</p>';
                                        echo '<p>Price: '.number_format($row['Price']).' baht</p>';
                                        echo '<div class="row">';
                                            echo '<div class="col-50">';
                                                echo '<p>Location: '.$row['Province'].', '.$row['Country'].'</p>';
                                            echo '</div>';
                                            echo '<div class="col-25">';
                                                echo'<a href="BookHotel.php?hid='.$row['HotelID'].'&rid='.$row['RoomID'].'&rtid='.$row['TypeID'].'" class="buttonWB" style="text-decoration:none;">Book now!</a>';
                                            echo'</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';

                    }

                }
            ?>
</body>
</html>