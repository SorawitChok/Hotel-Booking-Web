<?php
    require_once('connect.php');
    if(isset($_POST['hname']))
    {
        $hname = $_POST['hname'];
        $hstar = $_POST['hstar'];
        $htel = $_POST['htel'];
        $hcountry = $_POST['hcountry'];
        $hprov = $_POST['hprov'];
        $hdist = $_POST['hdist'];
        $hstreet = $_POST['hstreet'];
        $hpropnum = $_POST['hpropnum'];
        $hpostcode = $_POST['hpostcode'];

    
        $q = "insert into hotel (HName,HStar,Tel,Country,Province,District,Street,PropNum,PostCode)
                values ('$hname','$hstar','$htel','$hcountry','$hprov','$hdist','$hstreet','$hpropnum','$hpostcode');";
        $result=$mysqli->query($q);
        if(!$result){
            echo "INSERT failed. Error: ".$mysqli->error ;
            return false;
        }
        header("Location: addRoomType.php");

    }
?>