<?php
require('connectdb.php');

$IDCard         = $_REQUEST['IDCard'];
$FName          = $_REQUEST['FName'];
$LName          = $_REQUEST['LName'];
$Email	        = $_REQUEST['Email'];
$PhoneNumber    = $_REQUEST['PhoneNumber'];
$HouseNo	    = $_REQUEST['HouseNo'];
$District		= $_REQUEST['District'];
$Province       = $_REQUEST['Province'];
$PostNo         = $_REQUEST['PostNo'];



$sql = "
	INSERT INTO resident VALUES ('$IDCard','$FName','$LName','$Email','$PhoneNumber','$HouseNo','$District', '$Province', '$PostNo');
	
	";


$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "<script type='text/javascript'>alert('Insert Resident success');history.go(-1);</script>";
} else {
	echo "Error : insert resident". mysqli_error($conn);
}





mysqli_close($conn); // ปิดฐานข้อมูล
// echo "<br><br>";
// echo "--- END ---";
?>