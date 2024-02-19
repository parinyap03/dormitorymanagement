<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="deletePay_month.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- <link rel="stylesheet" href="assets//css/style.css"> -->

    <!-- <script>
        function calculateLastPayDate() {
            // Get the pay date from the form
            var payDate = new Date(document.forms["PayMonth"]["payDate"].value);
            // Add 4 days to the pay date to get the last pay date
            var lastPayDate = new Date(payDate.getTime() + (4 * 24 * 60 * 60 * 1000));

            // Convert the last pay date to a string in yyyy-mm-dd format
            var lastPayDateString = lastPayDate.toISOString().substring(0, 10);

            // Set the value of the newDate span to the last pay date
            document.getElementById("newDate").innerHTML = "<input type='date' name='lastPayDate' value='" + lastPayDateString + "'/>";
        }
    </script> -->

    <title>Delete Pay On</title>
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
    
    <h1>Delete Pay Month's Information</h1>
       <div class="container">
       
        <form action="deleteDataPayOn.php" method="post" name="DeletePayOn">
          <table >
              <tr><?php
    require('connection.php');

    $sql = '
    SELECT * 
    FROM pay_on, resident, make_lease
    WHERE pay_on.LCode = make_lease.LCode AND
    make_lease.IDCard = resident.IDCard;
    ';

    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    ?>
                  <td class="pay">Pay Date :</td>
                  <td><select name="BillNo">
                          <?php
                          while ($objResult = mysqli_fetch_array($objQuery)) {
                          ?>
                              <option value=<?php echo $objResult["BillNo"]; ?>><?php echo $objResult["BillNo"]," ",$objResult["payDate"]," ",$objResult["FName"]," ",$objResult["LName"];; ?></option>
                          <?php
                          }
                          ?>
                      </select>
                      
                  </td>
              </tr>
              
          </table>
  
          <br>
          <input type="submit" class="submit" value="Delete Data">
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



<!-- <a class="btn btn-primary" href="insertResident" role="button">Insert Residents</a>
        <a class="btn btn-primary" href="updateResident" role="button">Update Residents</a> 
        <a class="btn btn-primary" href="insertPay_month" role="button">Insert Pay Month</a>
        <a class="btn btn-primary" href="updatePay_month" role="button">Update Pay Month</a>
        <a class="btn btn-primary" href="deletePay_month" role="button">Delete Pay Month</a><br/> <br />
        <a class="btn btn-primary" href="#" role="button">Insert Make Lease</a>
        <a class="btn btn-primary" href="#" role="button">Update Make Lease</a>
        <a class="btn btn-primary" href="#" role="button">Delete Make Lease</a>
        <a class="btn btn-primary" href="#" role="button">Insert PayOn Lease</a><br/> <br />
        <a class="btn btn-primary" href="#" role="button">Update PayOn Lease</a>
        <a class="btn btn-primary" href="#" role="button">Delete PayOn Lease</a> -->