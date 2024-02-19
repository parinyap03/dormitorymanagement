<?php
$g = "ว่าง"; // กำหนดค่าตัวแปร $g เป็น "ว่าง"


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="selectRoom.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- <link rel="stylesheet" href="assets//css/style.css"> -->

    <title>ROOMS || ADMIN</title>
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
            <li><a href="selectRoom.php"  class="w3-bar-item w3-button w3-padding "><i class="fa-solid fa-door-open"></i>ROOMS</a></li>
            <li><a href="selectResidents.php"  class="w3-bar-item w3-button w3-padding "><i class="fa-solid fa-person-shelter"></i>RESIDENTS</a></li>
            <li><a href="selectBill.php"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-file-invoice-dollar"></i>BILLS</a></li>
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
    <h1><b>Room Status</b></h1>
       <div class="container">
       <div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1" aria-controls="status" checked>
  <label for="tab1">Status</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" aria-controls="waiting">
  <label for="tab2">Waiting</label>
  
  <!-- Tab 1 -->
  <div class="tab-panels">
    <section id="status" class="tab-panel">
       <?php
    require('connection.php');
    ?>
       <ul class="responsive-table">
        
        <li class="table-header">
          <div class="col col-1">No</div>
          <div class="col col-2">Room Number</div>
          <div class="col col-4">Status</div>
        </li>
        <?php
      $i = 1;
      $sql = '
      SELECT * 
      FROM Room;
      ';
  
      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
        while ($objResult = mysqli_fetch_array($objQuery)) {
        ?>
        <li class="table-row">
          <div class="col col-1" data-label="no"><?php echo $i; ?></div>
          <div class="col col-2" data-label="roomno"><?php echo $objResult["RoomCode"]; ?></div>
          <div class="col col-4" data-label="Status"><?php   
            if ( $objResult["RoomStatus"] == 'in') {
              $g = 'ไม่ว่าง';
            } else {
              $g = 'ว่าง';
            }
           if($g == 'ว่าง') {
             echo "<div style='color:green;'>ว่าง</div>";
            } else {
             echo "<div style = 'color:red;'>ไม่ว่าง</div>";
            }
            ?></div>
        </li>
        <?php
          $i++;
        }
        ?>
      </ul>
   
  </section>

  <!-- Tab 2 -->
    <section id="waiting" class="tab-panel">
    <ul class="responsive-table">
        
        <li class="table-header">
          <div class="col col-1">No</div>
          <div class="col col-2">Room Number</div>
          <div class="col col-4">Wait Day</div>
        </li>
    <?php
      $i = 1;
      $sql = '
      SELECT * 
      FROM Room, make_lease 
      WHERE Room.Roomcode = make_lease.RoomCode
      AND LeaseStatus = "on"
      Order By Room.RoomCode;
      ';
  
      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");

      while ($objResult = mysqli_fetch_array($objQuery)) {
      ?>
      <li class="table-row">
          <div class="col col-1" data-label="no"><?php echo $i; ?></div>
          <div class="col col-2" data-label="roomno"><?php echo $objResult["RoomCode"]; ?></div>
          <div class="col col-4" data-label="Status"><?php   
         if ($objResult["EndDateLease"] > date("Y-m-d H:i:s")) {
            // Create DateTime objects from the two dates
            $date1 = new DateTime($objResult["EndDateLease"]);
            $date2 = new DateTime('now');

            // Calculate the difference between the two dates
            $interval = $date1->diff($date2);
            
            // Calculate the number of months based on the total number of days
            $months = $interval->days / 30;
            // Calculate the number of days remaining after subtracting full months
            $months = round($months);

            $days = $interval->days % 30;

            // Calculate the difference between months and days
            $diff = $days - $months;
            echo $months . ' เดือน ' . $diff . ' วัน<br>';
          } else {
            // echo $months . ' เดือน ' . $diff . ' วัน<br>';

            }
          ?></div>
        </li>
        
      <?php
        $i++;
      }
      ?>
    </ul>
    <?php
    // mysqli_close($conn); // ปิดฐานข้อมูล 
    ?>
    </section>
    
  </div>
  
</div>

        

       
    
     


      
       </div>
       <br>
       <br>
    </main>

    <!-- script -->
    <script src="https://kit.fontawesome.com/82d932bb2d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
</body>
</html>



