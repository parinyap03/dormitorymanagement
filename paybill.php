<?php
require('connectdb.php');

if (isset($_GET['billno'])) {
    $billno = $_GET['billno'];
    
    $sql = "
    UPDATE pay_on SET PayStatus = NOW()
    WHERE BillNo = " . $billno;

    $objQuery = mysqli_query($conn, $sql);

    if ($objQuery) {
        echo "<script type='text/javascript'>alert('รอการยืนยันสถานะการจ่ายเงิน');history.go(-1);</script>";
    
    } else {
        echo "\nerror2".mysqli_error($conn) ;
    }
  } else {
    // redirect the user back to the bill.php page if the billno parameter is missing
    header("Location: bill.php");
    exit();

  }

mysqli_close($conn); // ปิดฐานข้อมูล
?>


