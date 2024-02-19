<?php
require('connectdb.php');

// $BillNo           = $_REQUEST['BillNo'];
$LCode            = $_REQUEST['LCode'];
$payDate          = $_REQUEST['payDate'];
// $Water	          = $_REQUEST['Water'];
$Electric    	  = $_REQUEST['Electric'];
// $Total	    	  = $_REQUEST['Total'];
// $PayStatus		  = $_REQUEST['PayStatus'];
$charge           = $_REQUEST['charge'];
$fridgeRent       = $_REQUEST['fridgeRent'];
$TVRent           = $_REQUEST['TVRent'];
$laundry          = $_REQUEST['laundry'];
           


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

//get price
$sql3 = " SELECT price, discount From room, type,make_lease
WHERE LCode = $LCode AND
make_lease.RoomCode = room.RoomCode AND
type.TypeCode = room.TypeCode;
";
$objQuery3 = mysqli_query($conn, $sql3);
$objResult3 = mysqli_fetch_array($objQuery3);

$price =  $objResult3["price"];
$discount =  $objResult3["discount"];

$Water = $objResult2["Water"];
$Electric = intval($Electric);
$charge = intval($charge);
$fridgeRent = intval($fridgeRent);
$TVRent = intval($TVRent);
$laundry = intval($laundry);

$Total = $price-$discount+$Water+$Electric+$charge+$fridgeRent+$TVRent+$laundry;
// echo $Total;
// echo $water;
$sql = " INSERT INTO `pay_on` (`BillNo`, `payDate`, `LCode`, `Water`, `Electric`, `Total`, `PayStatus`, `charge`, `fridgeRent`, `TVRent`, `laundry`) 
VALUES (NULL, '$payDate' , $LCode, $Water, $Electric , $Total, '', $charge  , $fridgeRent , $TVRent, $laundry);";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
    echo "<script type='text/javascript'>alert('Insert Bill success');history.go(-1);</script>";

} else {
	echo "\nerror2".mysqli_error($conn) ;
}

mysqli_close($conn); // ปิดฐานข้อมูล
// echo "<br><br>";
// echo "--- END ---";
?>
