<?php
    if(isset($_POST['sub']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $tel = $_POST['tel'];
        $username = $_POST['username'];
        $usertype = $_POST['usertype'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $dob = $_POST['DOB'];
  
        require_once('connect.php');
        if($password == $cpassword)
        {
            $q = "insert into userinfo (FName,LName,Username,Password,Tel,UserType,DOB)
                  values ('$fname','$lname','$username','$password','$tel','$usertype','$dob');";
            $result=$mysqli->query($q);
            if(!$result){
                echo "INSERT failed. Error: ".$mysqli->error ;
                return false;
            }
            header("Location: Login.php");
        }
        else
        {
            $state = 1;
            header("Location: Register.php?state=".$state);
        }
    }
    
?>