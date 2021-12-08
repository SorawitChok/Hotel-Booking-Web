<?php 
    require_once('connect.php'); 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="prefetch" href="background_img.jpg">
    <link rel="prefetch" href="fuji.jpg">
    <link rel="prefetch" href="nami.jpg">
    <link rel="prefetch" href="shirakawa.jpg">
    <link rel="prefetch" href="bali.jpg">
    <link rel="stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div id="dummy" hidden>
        
    </div>
    <div class="hero">
        <div class="navbar">
            <img src="mountain.png" class="logo">
            <?php
                if(isset($_SESSION["UID"])){
                    if($_SESSION['UserType']==1)
                    {
                        echo "<a class='gotodash' href='dashboard.php'><p>Welcome, ".$_SESSION["FName"]."</p></a>";
                        echo '<a class="out" style="position:absolute;text-decoration:none;right:100px;" href="LogoutProcess.php">Log out</a>';
                    }
                    else
                    {
                        echo "<a class='gotodash' href='dashboardStaff.php'><p>Welcome, ".$_SESSION["FName"]."</p></a>";
                        echo '<a class="out" style="position:absolute;text-decoration:none;right:100px;" href="LogoutProcess.php">Log out</a>';
                    }
                    
                }
                else{
                    echo '<a href="Register.php" class="button" style="text-decoration:none;">Sign Up</a>';
                    echo '<a href="Login.php"  style="position:absolute;transform: translateX(1150px);text-decoration:none;" class="button">Sign In</a>';
                }                        
            ?>
        </div>
        <div class="content">
            <small>Welcome to our</small>
            <h1 class="nothead"> World class <br>travel platform </h1>
            <a style="text-decoration:none;" class="button" href='searchHotel.php'>Explore more</a>
        </div>
        <div class="sidebar">
            <img src="menu.png" class="menu">
            <div class="social">
                <img src="fb.png" class="menu">
                <img src="ig.png" class="menu">
                <img src="tw.png" class="menu">
            </div>
            <div class="useful">
                <img src="share.png" class="menu">
                <img src="info.png" class="menu">
            </div>
        </div>
    </div>
</body>
</html>