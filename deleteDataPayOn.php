<?php
require('connectdb.php');

$BillNo = $_POST["BillNo"];
// $newlastPayDate = $_POST["lastPayDate"];

// DELETE FROM `pay_month` WHERE payDate = 2023-04-01;
$sql = "
	DELETE FROM pay_on
	WHERE BillNo = '$BillNo'
	"; 
	

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "<script type='text/javascript'>alert('Delete Pay On Success');history.go(-1);</script>";

} else {
	echo "Error : Delete Pay On". mysqli_error($conn);
	
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>