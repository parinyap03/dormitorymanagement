<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="selectBill.css">
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
  <!-- <link rel="stylesheet" href="assets//css/style.css"> -->

  <title>BILLS || ADMIN</title>
</head>

<body>
  <nav class="menu" tabindex="0">
    <div class="smartphone-menu-trigger"></div>
    <header class="avatar">
      <a href="admin_page.php" class="fp-name">
        <i class="fa-regular fa-building"></i>
        <h2>FRIENDLY PLACE</h2>
      </a>
    </header>
    <ul>
      <li><a href="selectRoom.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-user "></i>ROOMS</a></li>
      <li><a href="selectResidents.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-file-invoice-dollar"></i>RESIDENTS</a></li>
      <li><a href="selectBill.php" class="w3-bar-item w3-button w3-padding"><i class="fa-solid fa-file-contract"></i>BILLS</a></li>
      <li><a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a></li>
    </ul>
    <div class="w3-panel w3-large">
      <a href="https://www.facebook.com/people/%E0%B9%80%E0%B8%9F%E0%B8%A3%E0%B8%99%E0%B8%A5%E0%B8%B5%E0%B9%88-%E0%B9%80%E0%B8%9E%E0%B8%A5%E0%B8%AA/100046361187187/?ref=py_c"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
      <a href="https://line.me/ti/p/4gLIhz9_z4#~"><i class="fa-brands fa-line"></i></a>
      <a href="tel:0846019070"><i class="fa-solid fa-phone"></i></a>

    </div>
  </nav>

  <main>
    <h1><b>Bills Information</b></h1>
    <div class="container">
    <?php
        require('connection.php');

        $sql = '
        SELECT billno , make_lease.roomcode, pay_on.paydate, pay_on.payStatus, pay_on.LCode,
		FName, LName, water, electric,  
        price, discount, TVrent,  fridgeRent, laundry, charge,total
        from pay_on, resident, type, room, make_lease
        where pay_on.LCode = make_lease.LCode AND
        make_lease.IDcard = resident.IDcard AND
        make_lease.RoomCode	= room.RoomCode AND
        room.TypeCode = type.TypeCode
        ORDER BY billno;
         ';

         $sql2 = '
         select payDate from pay_month;
         ';
 

        $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
        $objQuery2 = mysqli_query($conn, $sql2) or die("Error Query [" . $sql2 . "]");
        ?>

        <!-- <select name="paydate">
          <?php
          while ($objResult2 = mysqli_fetch_array($objQuery2)) {
          ?>
              <option value=<?php echo $objResult2["PayDate"]; ?>><?php echo $objResult2["PayDate"]; ?></option>
          <?php
          }
          ?>
      </select> -->
      <!-- <button type="submit">search</button> -->

      <table >
        <div class="tr-head">
            <tr class="head tr-row">
              <th width="50">
                  <div align="center">No</div>
              </th>
              <th width="50">
                  <div align="center">billno</div>
              </th>
              <th width="50">
                  <div align="center">pay date</div>
              </th>
              <th width="50">
                  <div align="center">pay status</div>
              </th>
              <th width="100">
                  <div align="center">Room</div>
              </th>
              <th width="100">
                  <div align="center">First Name</div>
              </th>
              <th width="100">
                  <div align="center">Last Name</div>
              </th>
              <th width="100">
                  <div align="center">price</div>
              </th>
              <th width="100">
                  <div align="center">discount</div>
              </th>
              <th width="100">
                  <div align="center">water</div>
              </th>
              <th width="100">
                  <div align="center">electric</div>
              </th>
              <th width="100">
                  <div align="center">TVrent</div>
              </th>
              <th width="100">
                  <div align="center">fridgeRent</div>
              </th>
              <th width="100">
                  <div align="center">laundry</div>
              </th>
              <th width="100">
                  <div align="center">charge</div>
              </th>
              <th width="100">
                  <div align="center">total</div>
              </th>

          </tr>
        
        </div>
          
          <?php
          $i = 1;
          while ($objResult = mysqli_fetch_array($objQuery)) {
          ?>
          <div class="tr-row">
              <tr>
                  <td>
                      <div align="center"><?php echo $i; ?></div>
                  </td>
                  <td><?php echo $objResult["billno"]; ?></td>
                  <td><?php echo $objResult["paydate"]; ?></td>
                  <td><?php echo $objResult["payStatus"]; ?></td>
                  <td><?php echo $objResult["roomcode"]; ?></td>
                  <td><?php echo $objResult["FName"]; ?></td>
                  <td><?php echo $objResult["LName"]; ?></td>
                  <td><?php echo $objResult["price"]; ?></td>
                  <td><?php echo $objResult["discount"]; ?></td>
                  <td><?php echo $objResult["water"]; ?></td>
                  <td><?php echo $objResult["electric"]; ?></td>
                  <td><?php echo $objResult["TVrent"]; ?></td>
                  <td><?php echo $objResult["fridgeRent"]; ?></td>
                  <td><?php echo $objResult["laundry"]; ?></td>
                  <td><?php echo $objResult["charge"]; ?></td>
                  <td><?php echo $objResult["total"]; ?></td>
              </tr>
              
          <?php
              $i++;
          }
          ?></div>
      </table>
      <?php
      mysqli_close($conn); // ปิดฐานข้อมูล 
      ?>
      <br>
      <br>
  </main>
</body>
<!-- script -->
<script src="https://kit.fontawesome.com/82d932bb2d.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</html>