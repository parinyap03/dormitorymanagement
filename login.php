<?php 

    session_start();

    if (isset($_POST['uname'])) {

        include('connection.php');

        $username = $_POST['uname'];
        $password = $_POST['psw'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM make_lease WHERE RoomCode = '$username' AND IDCard = '$password' ";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['IDCard'] = $row['IDCard'];
            $_SESSION['RoomCode'] = $row['RoomCode'];
            $_SESSION['Level'] = $row['Level'];
            $_SESSION['LeaseStatus'] = $row['LeaseStatus'];

            if ($_SESSION['Level'] == 'm' && $_SESSION['LeaseStatus'] == 'on' ) {
                header("Location: home.php");
            }
            if ($_SESSION['Level'] == 'm' && $_SESSION['LeaseStatus'] == 'off' ) {
                echo "<script type='text/javascript'>alert('คุณหมดอายุสัญญาแล้ว');history.go(-1);</script>";
            }
        }elseif ($username == 'root' && $password == '123'){
            header("Location: admin_page.php");
        }elseif (mysqli_num_rows($result) > 1){
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $last_row = end($rows);

            $_SESSION['IDCard'] = $last_row['IDCard'];
            $_SESSION['RoomCode'] = $last_row['RoomCode'];
            $_SESSION['Level'] = $last_row['Level'];
            $_SESSION['LeaseStatus'] = $last_row['LeaseStatus'];
            if ($_SESSION['Level'] == 'm' && $_SESSION['LeaseStatus'] == 'on' ) {
                header("Location: home.php");
            }
            if ($_SESSION['Level'] == 'm' && $_SESSION['LeaseStatus'] == 'off' ) {
                echo "<script type='text/javascript'>alert('คุณหมดอายุสัญญาแล้ว');history.go(-1);</script>";
            }

        } else {
            echo "<script type='text/javascript'>alert('user หรือ password ไม่ถูกต้อง');history.go(-1);</script>";
        }

    } else {
        header("Location: index.php");
    }

?>