<?php
	$id = $_GET['bid'];
	require_once('connect.php');
	if (isset($id)) {
		$q="DELETE FROM bookingandaccom where BookingID=$id;";
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   header("Location: dashboard.php");
	}

?>
