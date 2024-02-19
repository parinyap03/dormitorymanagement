<?php
require('connectdb.php');

$BillNo           = $_POST['BillNo'];
$LCode            = $_POST['LCode'];
$payDate          = $_POST['payDate'];
// $Water	          = $_POST['Water'];
$Electric    	  = $_POST['Electric'];
// $Total	    	  = $_POST['Total'];
// $PayStatus		  = $_POST['PayStatus'];
$charge           = $_POST['charge'];
$fridgeRent       = $_POST['fridgeRent'];
$TVRent           = $_POST['TVRent'];
$laundry          = $_POST['laundry'];
           


// get member
$sql2 = " SELECT member From make_lease WHERE LCode = '". $LCode ."';
";
        
$objQuery2 = mysqli_query($conn, $sql2);
$objResult2 = mysqli_fetch_array($objQuery2);


if ($objResult2["member"] == 1){
    $objResult2["Water"] = 150;
    // echo $Water = 150;
}elseif ($objResult2["member"] == 2){
    $objResult2["Water"] = 250;
    // echo $Water = 150;
}else{
    echo "error1".mysqli_error($conn) ;
}

$Water = $objResult2["Water"];
$Electric = intval($Electric);
$charge = intval($charge);
$fridgeRent = intval($fridgeRent);
$TVRent = intval($TVRent);
$laundry = intval($laundry);

$Total = $Water+$Electric+$charge+$fridgeRent+$TVRent+$laundry;
// echo $Total;
// echo $water;
$sql = " UPDATE INTO `pay_on` 
SET payDate = '$payDate',
LCode = $LCode,
Water = $Water,
Electric = $Electric,
Total = $Total,
charge = $charge,
FirdgeRent = $fridgeRent,
TVRent = $TVRent,
Laundry = $laundry
WHERE billno = $BillNo ;
";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
    echo "<script type='text/javascript'>alert('update Pay On success');history.go(-1);</script>";

} else {
	echo "\nerror2".mysqli_error($conn) ;
}

mysqli_close($conn); // ปิดฐานข้อมูล
// echo "<br><br>";
// echo "--- END ---";
?>
