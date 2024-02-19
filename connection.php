<?php 

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'friendlyplace';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection : failed (เชื่อมต่อฐานข้อมูล ไม่ สำเร็จ)" . mysqli_connect_error());
}

?>