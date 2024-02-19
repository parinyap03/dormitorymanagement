<?php

session_start();

if (!$_SESSION['IDCard']) {
  header("Location: index.php");
} else {

  include('connection.php');

  $IDCard     = $_SESSION['IDCard'];
  $RoomCode   = $_SESSION['RoomCode'];

  $sql = "
  SELECT billno ,pay_on.paydate, room.roomcode, FName, LName, water, electric,  
  price, discount, TVrent,  fridgeRent, laundry, charge,
  (water+electric+price+charge+TVrent+laundry+fridgeRent-discount) total
from pay_on, resident, type, room, make_lease
    where room.typeCode = type.typeCode AND
  make_lease.LCode = pay_on.LCode AND
  make_lease.IDCard = resident.IDCard AND
  room.roomcode = make_lease.roomcode AND
  make_lease.IDCard = " . $IDCard . "  
  AND make_lease.RoomCode =  " . $RoomCode . " 
  GROUP BY pay_on.paydate, billno, water, electric, charge, room.roomcode, 
  price, Fname, Lname, TVrent,  fridgeRent, laundry;";

  $result = mysqli_query($conn, $sql);
  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");

  if (mysqli_num_rows($result) >= 1){
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $last_row = end($rows);

        // $_SESSION['IDCard'] = $last_row['IDCard'];/
        // $_SESSION['RoomCode'] = $last_row['RoomCode'];
        $_SESSION['billno'] = $last_row['billno'];
        $billno = $_SESSION['billno'];

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bill.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- <link rel="stylesheet" href="assets//css/style.css"> -->

    <title>BILL</title>
</head>
<body>
    <nav class="menu" tabindex="0">
        <div class="smartphone-menu-trigger"></div>
      <header class="avatar">
        <a href="home.php" class="fp-name">
            <i class="fa-regular fa-building"></i>
            <h2>FRIENDLY PLACE</h2>
        </a>
      </header>
        <ul>
            <li><a href="profile.php"  class="w3-bar-item w3-button w3-padding "><i class="fa fa-user "></i>PROFILE</a></li>
            <li><a href="bill.php"  class="w3-bar-item w3-button w3-padding "><i class="fa fa-file-invoice-dollar"></i>BILL</a></li>
            <li><a href="contract.php"  class="w3-bar-item w3-button w3-padding"><i class="fa-solid fa-file-contract"></i>CONTRACT</a></li>
            <li><a href="logout.php"  class="w3-bar-item w3-button w3-padding"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a></li>
      </ul>
      <div class="w3-panel w3-large">
        <a href="https://www.facebook.com/people/%E0%B9%80%E0%B8%9F%E0%B8%A3%E0%B8%99%E0%B8%A5%E0%B8%B5%E0%B9%88-%E0%B9%80%E0%B8%9E%E0%B8%A5%E0%B8%AA/100046361187187/?ref=py_c"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
        <a href="https://line.me/ti/p/4gLIhz9_z4#~"><i class="fa-brands fa-line"></i></a>
        <a href="tel:0846019070"><i class="fa-solid fa-phone"></i></a>

      </div>
    </nav>
    
    <!-- /* home main*/ -->
    
    <main>

        <!-- /* infor */ -->
    <div class="information">
        <H1><b>Bill</b></H1>
        <div class="container">
            <?php
      require('connection.php');

      $sql = "
      SELECT billno ,pay_on.paydate, pay_on.payStatus, room.roomcode, FName, LName, water, electric,  
    price, discount, TVrent,  fridgeRent, laundry, charge, total
    from pay_on, resident, type, room, make_lease
  where room.typeCode = type.typeCode AND
  make_lease.LCode = pay_on.LCode AND
  make_lease.IDCard = resident.IDCard AND
  room.roomcode = make_lease.roomcode AND
  billno = $billno
  GROUP BY pay_on.paydate, billno, water, electric, charge, room.roomcode, 
  price, Fname, Lname, TVrent,  fridgeRent, laundry;
      ";

      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
      ?>

      <?php
        $i = 1;
        while ($objResult = mysqli_fetch_array($objQuery)) {
        ?>
            <div class="row">
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <address>
                                <strong>หอพัก เฟรนลี่ เพลส</strong>
                                <br>
                                18/129 หมู่ 14 ถ.มิตรภาพ
                                <br>
                                ต.ในเมือง อ.เมือง จ.ขอนแก่น 40000
                                <br>
                                <abbr title="Phone">Tel:</abbr> 084-601-9070
                            </address>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                <em>Date:<?php echo $objResult["paydate"]; ?></em>
                            </p>
                            <p>
                                <em>Receipt #: <?php echo $objResult["billno"]; ?></em>
                            </p>
                            <p>Room:<?php echo $objResult["roomcode"]; ?> </p>
                            <p><?php echo $objResult["FName"]," ",$objResult["LName"]; ?></p>
                        </div>
                    </div>
                    <form method="POST" action="paybill.php?billno=<?php echo $billno; ?>">
                    <div class="row">
                        <div class="text-center">
                            <h1>Receipt</h1>
                        </div>
                        </span>
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                    <th class="text-center"></th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-9"><em>ค่าเช่าห้อง</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["price"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><em>ส่วนลด</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["discount"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><em>ค่าน้ำ</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["water"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><em>ค่าไฟ</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["electric"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><em>ค่าเช่าทีวี</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["TVrent"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><em>ค่าเช่าตู้เย็น</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["fridgeRent"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><em>ค่าซักรีด</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["laundry"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><em>ค่าปรับ</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["charge"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><em>จ่ายเงินวันที่</em></h4></td>
                                    <td class="col-md-1" style="text-align: center">  </td>
                                    <td class="col-md-1 text-center"></td>
                                    <td class="col-md-1 text-center"><?php echo $objResult["payStatus"]; ?></td>
                                </tr>
                                  <tr>
                                      <td>   </td>
                                      <td>   </td>
                                      <td class="text-right">
                                      <p>
                                          <strong>Total: </strong>
                                      </p>
                                      </td>
                                      <td class="text-center">
                                      <p>
                                          <strong><?php echo $objResult["total"]; ?></strong>
                                      </p>
                                      <?php
                                      $i++;
                                    }
                                    ?>
                                      </td>
                                  </tr>
                                <!-- <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                    <td class="text-center text-danger"><h4><strong><?php echo $objResult["total"]; ?></strong></h4></td>
                                </tr> -->
                            </tbody>
                        </table>
                        
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Pay Now">
                               <span class="glyphicon glyphicon-chevron-right"></span>
                        </input></td>
                    </form>
                    </div>

                    <?php
      mysqli_close($conn); // ปิดฐานข้อมูล 
      ?>
                </div>
            </div> 

       
        </div>
        
    </main>

    <!-- script -->
    <script src="https://kit.fontawesome.com/82d932bb2d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
</body>
</html>
<?php } ?>