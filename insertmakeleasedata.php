<?php
require('connectdb.php');

$RoomCode   = $_REQUEST['RoomCode'];
$IDCard     = $_REQUEST['IDCard'];
$EndDateLease    = $_REQUEST['EndDateLease'];
$Discount   = $_REQUEST['Discount'];
$Pet        = $_REQUEST['Pet'];
$Member     = $_REQUEST['Member'];



$sql = "
    INSERT INTO make_lease (RoomCode,IDCard,EndDateLease,Discount,Pet,Member)
    VALUES ('$RoomCode','$IDCard','$EndDateLease','$Discount','$Pet','$Member');
    ";

    // $sql = "
    // INSERT INTO make_lease (RoomCode,IDCard,EndDateLease,Discount,Pet)
    // VALUES ('$RoomCode','$IDCard','$EndDateLease','$Discount','$Pet');
    // ";
    $result = mysqli_query($conn,$sql);

    if($result){
        $update_room = mysqli_insert_id($conn);
        $sql = "UPDATE room SET RoomStatus = 'in' WHERE RoomCode = $RoomCode";
        mysqli_query($conn,$sql);
    } 

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
    echo "<script type='text/javascript'>alert('Insert make lease success');history.go(-1);</script>";

} else {
	echo "Error : Input".mysqli_error($conn);
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>


