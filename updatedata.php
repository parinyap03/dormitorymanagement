<?php
require('connectdb.php');

$update_ID      = $_REQUEST['IDCard'];
$IDCard         = $update_ID;
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
	UPDATE resident
	SET IDCard = '" . $IDCard . "',  
	RoomCode = '" . $RoomCode . "', 
	FName = '" . $FName . "', 
	LName = '" . $LName . "', 
	Email = '" . $Email . "', 
	PhoneNumber = '" . $PhoneNumber . "', 
	HouseNo = '" . $HouseNo . "',
    District = '" . $District . "',
    Province = '" . $Province . "',
    PostNo = '" . $PostNo . "',
    WHERE IDCard = " . $IDCard . " ; ";
	

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "Record " . $update_ID . " was Updated.";
} else {
	echo "Error : Update";
}
mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>