<?php
require('connectdb.php');

$update_ID      = $_POST['IDCard'];
$FName          = $_POST['FName'];
$LName          = $_POST['LName'];
$Email	        = $_POST['Email'];
$PhoneNumber    = $_POST['PhoneNumber'];
$HouseNo	    = $_POST['HouseNo'];
$District		= $_POST['District'];
$Province       = $_POST['Province'];
$PostNo         = $_POST['PostNo'];


$sql = "
	UPDATE resident
	SET FName = '$FName', 
	LName = '$LName', 
	Email = '$Email', 
	PhoneNumber = '$PhoneNumber', 
	HouseNo = '$HouseNo',
    District = '$District',
    Province = '$Province',
    PostNo = '$PostNo'
    WHERE IDCard = '$update_ID'
	"; 
	

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "<script type='text/javascript'>alert('Update Resident success');history.go(-1);</script>";
} else {
	echo "Error : Update resident". mysqli_error($conn);
	
}

//เหลือupdate roomstatus

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>