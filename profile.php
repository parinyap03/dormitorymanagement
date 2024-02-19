<?php

session_start();

if (!$_SESSION['IDCard']) {
  header("Location: index.php");
} else {

  include('connection.php');

  $IDCard     = $_SESSION['IDCard'];
  $RoomCode       = $_SESSION['RoomCode'];

  $sql = "
	SELECT * FROM make_lease, resident
  WHERE make_lease.IDCard = resident.IDCard
  AND resident.IDCard = " . $IDCard . " 
  AND make_lease.RoomCode = " . $RoomCode . " ; ";

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- <link rel="stylesheet" href="assets//css/style.css"> -->

    <title>PROFILE</title>
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
    
    
    
    <main>
      <h1><b>Profile</b></h1>
      <?php
            $i = 1;
            while ($objResult = mysqli_fetch_array($objQuery)) {
            ?>
      <div class="container">  
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <!-- <div class="row"> -->
              <!-- <div class="col-sm-3">
                <h6 class="mb-0">No.</h6>
              </div> -->
              <!-- <div class="col-sm-9 text-secondary">
                
              </div> -->
            <!-- </div> -->
            <!-- <hr> -->
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">ID card</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["IDCard"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Room</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["RoomCode"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">First Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["FName"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Last Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["LName"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["Email"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone Number</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["PhoneNumber"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">House Number</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["HouseNo"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">District</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["District"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Province</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["Province"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Postal Number</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $objResult["PostNo"]; ?>
              </div>
            </div>
            <hr>
            <?php
              $i++;
            }
            ?>
          </div>
        </div>
        </div>
        </div>  

       
          </table>
          <br><br>
    </main>

    <!-- script -->
    <script src="https://kit.fontawesome.com/82d932bb2d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
</body>
</html>

<?php } ?>