<?php  
 
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require_once '../admin-vip/connect.php';
    $sql = "select * from customers 
    where email = '$email' and password = '$password'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_num_rows($result);

    if($number_rows == 1) {
        session_start();
        $each = mysqli_fetch_array($result);
        $_SESSION['fullname'] = $each['fullname'];
        $_SESSION['id'] = $each['id'];

        header('location:user.php');
        exit;
    }

    header('location:login.php?error=Login False');


    mysqli_close($connect);

?>