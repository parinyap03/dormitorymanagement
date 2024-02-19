<?php
require('connectdb.php');

$LCode      = $_POST['LCode'];
// $LCode      = $_REQUEST['LCode'];

$sql2 = "
    Update room,make_lease 
    SET RoomStatus = 'out'
    WHERE make_lease.RoomCode = room.RoomCode
    AND make_lease.LCode= $LCode;
	"; 
$objQuery = mysqli_query($conn, $sql2);
if ($objQuery) {
    // echo "<script type='text/javascript'>alert('update room status = 'out' success');history.go(-1);</script>";
} else {
	echo "Error : Update". mysqli_error($conn);
}

$sql = "
Update make_lease
SET LeaseStatus = 'off'
WHERE make_lease.LCode= $LCode;
	"; 
$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    echo "<script type='text/javascript'>alert('update success');history.go(-1);</script>";

} else {
	echo "Error : Update". mysqli_error($conn);
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>