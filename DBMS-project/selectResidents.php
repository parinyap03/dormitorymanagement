<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="selectResidents.css">
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
  <!-- <link rel="stylesheet" href="assets//css/style.css"> -->

  <title>RESIDENTS || ADMIN</title>
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
    <h1><b>Resident Information</b></h1>
    <div class="container">
      <?php
      require('connection.php');

      $sql = '
    SELECT * 
    FROM make_lease, resident
    WHERE make_lease.IDCard = resident.IDCard
    Order by LCode;
    ';

      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
      ?>
      <table class="responsive-table">
        <tr class="table-header">
          <td class="col col-1">Lease No</td>
          <td class="col col-2">ID Card</td>
          <td class="col col-3">Room</td>
          <td class="col col-4">First Name</td>
          <td class="col col-5">Last Name</td>
          <td class="col col-6">Email</td>
          <td class="col col-7">Phone Number</td>
          <td class="col col-8">House Number</td>
          <td class="col col-9">District</td>
          <td class="col col-0">Province</td>
          <td class="col col-11">Postal Number</td>
          <td class="col col-12">Status</td>
          <td class="col col-13">End date lease</td>
        </tr>
        <?php
        $i = 1;
        while ($objResult = mysqli_fetch_array($objQuery)) {
        ?>
          <tr class="table-row">
            <td class="col col-1 trow" data-label="LCode"><?php echo $objResult["LCode"]; ?></td>
            <td class="col col-2 trow" data-label="IDCard"><?php echo $objResult["IDCard"]; ?></td>
            <td class="col col-3 trow" data-label="RoomCode"><?php echo $objResult["RoomCode"]; ?></td>
            <td class="col col-4 trow" data-label="FName"><?php echo $objResult["FName"]; ?></td>
            <td class="col col-5 trow" data-label="LName"><?php echo $objResult["LName"]; ?></td>
            <td class="col col-6 trow" data-label="Email"><?php echo $objResult["Email"]; ?></td>
            <td class="col col-7 trow" data-label="PhoneNumber"><?php echo $objResult["PhoneNumber"]; ?></td>
            <td class="col col-8 trow" data-label="HouseNo"><?php echo $objResult["HouseNo"]; ?></td>
            <td class="col col-9 trow" data-label="District"><?php echo $objResult["District"]; ?></td>
            <td class="col col-10 trow" data-label="Province"><?php echo $objResult["Province"]; ?></td>
            <td class="col col-11 trow" data-label="Post No"><?php echo $objResult["PostNo"]; ?></td>
            <td class="col col-12 trow" data-label="LeaseStatus"><?php echo $objResult["LeaseStatus"]; ?></td>
            <td class="col col-13 trow" data-label="EndDateLease"><?php echo $objResult["EndDateLease"]; ?></td>
          </tr>
        <?php
          $i++;
        }
        ?>
        <!-- </ul> -->
        <?php
        mysqli_close($conn); // ปิดฐานข้อมูล 
        ?>
      </table>

  </main>
</body>
<!-- script -->
<script src="https://kit.fontawesome.com/82d932bb2d.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</html>