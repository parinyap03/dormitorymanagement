<?php
require('connectdb.php');

$payDate = $_POST["payDate"];
$lastPayDate = $_POST["lastPayDate"];

$sql = "INSERT INTO pay_month (payDate, lastPayDate) VALUES ('$payDate', '$lastPayDate')";



$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "<script type='text/javascript'>alert('Insert paymonth paydate success');history.go(-1);</script>";
} else {
	echo "Error : insert pay_month". mysqli_error($conn);
}

mysqli_close($conn); // ปิดฐานข้อมูล
// echo "<br><br>";
// echo "--- END ---";
?>