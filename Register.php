<?php 
    require_once('connect.php');
    $state = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Registration</title>
</head>
<body>
    
    <div class="LoginBack">
        <div class="RegisCard">
            <form action="registrationProcess.php" method="post">
                <h1>Sign Up</h1><br>
                <input name="fname" class="curvebox" type="text" placeholder="Firstname">
                <input name="lname" class="curvebox" type="text" placeholder="Lastname"><br><br>
                <input name="tel" class="curvebox" type="text" placeholder="Tel."><br><br>
                <input name="username" class="curvebox" type="text" placeholder="Username"><br><br>
                <input name="password" class="curvebox" type="password" placeholder="Password">
                <input name="cpassword" class="curvebox" type="password" placeholder="Password Confirmation"><br><br>
                <input name="usertype" type="radio" name="type" id="cus" value=1 class="rbutton"><label for="cus" style="margin-right: 5px;">Customer</label><input value=0 type="radio" name="usertype" name="type" id="staff" class="rbutton"><label for="staff">Hotel Staff</label><br><br>
                <label for="dob">Date of Birth: </label><input name="DOB" class="curvebox" type="date"><br><br>
                <input type="submit" class="buttonWB" value="Sign up" name="sub">
                <?php 
                    if($_GET)
                    {
                        $state = $_GET['state'];
                        if($state == 1)
                        {
                            echo "<p style='color:red;'>password and password confirmation not match</p>";
                        }
                    }
                ?>
                <a class="RtoS" href="Login.php"><span>&#8249;</span></a>
            </form>
        </div>
    </div>
</body>
</html>