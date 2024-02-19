<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insertPayOn.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- <link rel="stylesheet" href="assets//css/style.css"> -->

    <title>Insert Pay On</title>
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
    <h1>Insert Pay On's Information</h1>
       <div class="container">
        <form action="insertDataPayOn.php" method="post" name="payOn">
            <div class="form">
                <div class="input-container ic1">
                <?php
                  // DepartmentID Query from Table
                  require('connection.php');
                  $sql = '
                  SELECT payDate 
                  FROM pay_month;
                  ';
                  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                  ?>
                    <select id="payDate" name="payDate" class="input" type="text" placeholder="RoomCode" >
                    <?php
                          while ($objResult = mysqli_fetch_array($objQuery)) {
                          ?>
                              <option value=<?php echo $objResult["payDate"]; ?>><?php echo $objResult["payDate"]; ?></option>
                          <?php
                          }
                          ?>
                      </select>
                    <div class="cut"></div>
                    <label for="payDate" class="placeholder">PayDate</label>    
                </div>

                <div class="input-container ic1">
                <?php
                  // DepartmentID Query from Table
                  require('connection.php');
                  $sql = '
                  SELECT LCode 
                  FROM make_lease
                  Where LeaseStatus = \'on\';
                  ';
                  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                  ?>
                    <select id="LCode" name="LCode" class="input" type="number" placeholder="Lease Number" >
                    <?php
                          while ($objResult = mysqli_fetch_array($objQuery)) {
                          ?>
                              <option value=<?php echo $objResult["LCode"]; ?>><?php echo $objResult["LCode"]; ?></option>
                          <?php
                          }
                          ?>
                      </select>
                    <div class="cut"></div>
                    <label for="LCode" class="placeholder">LCode</label>    
                </div>

                <div class="input-container ic1">
                    <input id="Electric" name="Electric" class="input" type="number" placeholder=" " />
                    <div class="cut"></div>
                    <label for="Electric" class="placeholder">Electric</label>
                </div>

                <div class="input-container ic1">
                    <input id="charge" name="charge" class="input" type="number" placeholder=" " />
                    <div class="cut"></div>
                    <label for="charge" class="placeholder">Charge</label>
                </div>

                <div class="input-container ic1">
                    <input id="fridgeRent" name="fridgeRent" class="input" type="number" placeholder=" " />
                    <div class="cut"></div>
                    <label for="fridgeRent" class="placeholder">FridgeRent</label>
                </div>

                <div class="input-container ic1">
                    <input id="TVRent" name="TVRent" class="input" type="number" placeholder=" " />
                    <div class="cut"></div>
                    <label for="TVRent" class="placeholder">TVRent</label>
                </div>

                <div class="input-container ic1">
                    <input id="laundry" name="laundry" class="input" type="number" placeholder=" " />
                    <div class="cut"></div>
                    <label for="laundry" class="placeholder">Laundry</label>
                </div>

            </div>
          
          <br>
          <input type="submit" class="submit" value="Insert Data">
      </form>
       </div>
       <br><br>
    </main>

    <!-- script -->
    <script src="https://kit.fontawesome.com/82d932bb2d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
</body>
</html>



