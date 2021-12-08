<?php
    require_once('connect.php');
    if(isset($_POST['sub']))
    {
        $hid = $_POST['hotel'];
        $rtid = $_POST['roomtype'];
        $rnum = $_POST['rnum'];

        $countfiles = count($_FILES['file']['name']);

        $q = "insert into room (RoomNum,HotelID,TypeID)
                values ('$rnum','$hid','$rtid');";
        $result=$mysqli->query($q);
        if(!$result){
            echo "INSERT failed. Error: ".$mysqli->error ;
            return false;
        }

        $q2 = "select RoomID from room where RoomNum = '".$rnum."' and HotelID = '".$hid."' and TypeID = '".$rtid."';";
        $result2=$mysqli->query($q2);
        $row = $result2->fetch_array();

        // Looping all files
        for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['file']['name'][$i];

            $temp = explode(".", $_FILES["file"]["name"][$i]);
            $newfilename = 'room_'.$hid.'_'.$rtid.'_'.$row['RoomID'].'.'.end($temp);
            
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'][$i],'static/'.$newfilename);
        
        }
   
        
        header("Location: addRoom.php");

    }
?>
