<?php
require('connectdb.php');

$IDCard         = $_REQUEST['IDCard'];
$RoomCode       = $_REQUEST['RoomCode'];
$FName          = $_REQUEST['FName'];
$LName          = $_REQUEST['LName'];
$Email	        = $_REQUEST['Email'];
$PhoneNumber    = $_REQUEST['PhoneNumber'];
$HouseNo	    = $_REQUEST['HouseNo'];
$District		= $_REQUEST['District'];
$Province       = $_REQUEST['Province'];
$PostNo         = $_REQUEST['PostNo'];

$sql = "
	INSERT INTO resident
	VALUES ('$IDCard','$RoomCode','$FName','$LName','$Email',
    '$PhoneNumber','$HouseNo','$District', '$Province', '$PostNo');
	";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "New record Inserted successfully";
} else {
	echo "Error : Input";
}

//mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>