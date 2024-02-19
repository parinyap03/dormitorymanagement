<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insertMakelease.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- <link rel="stylesheet" href="assets//css/style.css"> -->

    <title>Insert Make Lease</title>
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
        <h1>Insert Make Lease's Information</h1>
       <div class="container">
        

        <form action="insertmakeleasedata.php" method="post" name="Makelease">
            <div class="form">
                
                <div class="input-container ic1">
                <?php
                      require('connectdb.php');
                      $sql = '
                      SELECT RoomCode 
                      FROM room
                      WHERE RoomStatus = \'out\';
                          ';
                      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                  ?>
                    <select id="RoomCode" name="RoomCode" class="input" type="text" placeholder="RoomCode" >
                    <?php
                      while ($objResult = mysqli_fetch_array($objQuery)) {
                      ?>
                          <option value=<?php echo $objResult["RoomCode"]; ?>><?php echo $objResult["RoomCode"]; ?></option>
                      <?php
                      }
                      ?>
                      </select>
                    <div class="cut"></div>
                    <label for="RoomCode" class="placeholder">RoomCode</label>    
                </div>

                <div class="input-container ic1">
                <?php
                      require('connectdb.php');
                      $sql = '
                          SELECT IDCard 
                          FROM resident;
                          ';
                      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                  ?>
                    <select id="IDCard" name="IDCard" class="input" type="text" placeholder="IDCard" >
                    <?php
                      while ($objResult = mysqli_fetch_array($objQuery)) {
                      ?>
                          <option value=<?php echo $objResult["IDCard"]; ?>><?php echo $objResult["IDCard"]; ?></option>
                      <?php
                      }
                      ?>
                      </select>
                    <div class="cut"></div>
                    <label for="IDCard" class="placeholder">IDCard</label>    
                </div>

                <div class="input-container ic1">
                    <input id="EndDateLease" name="EndDateLease" class="input" type="date" placeholder="End Date" />
                    <div class="cut"></div>
                    <label for="EndDateLease" class="placeholder">End Date</label>
                </div>

                <div class="input-container ic1">
                    <input id="Discount" name="Discount" class="input" type="number" placeholder=" " />
                    <div class="cut"></div>
                    <label for="Discount"  class="placeholder">Discount</label>
                </div>

                <div class="input-container ic1">
                    <input id="Pet" name="Pet" class="input" type="text" placeholder=" " />
                    <div class="cut"></div>
                    <label for="Pet" class="placeholder">Pet</label>
                </div>

                <div class="input-container ic1">
                    <input id="Member" name="Member" class="input" type="number" placeholder=" " />
                    <div class="cut"></div>
                    <label for="Member" class="placeholder">Member</label>
                </div>

            </div>
          
  
          <br>
          <input type="submit" class="submit"  value="Insert Data">
          <!-- <a href="admin_page.php" class="btn btn-primary" role="button" data-bs-toggle="button">Back</a> -->
      </form>
       </div>
    </main>

    <!-- script -->
    <script src="https://kit.fontawesome.com/82d932bb2d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
</body>
</html>


