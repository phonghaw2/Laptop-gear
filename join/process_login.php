<?php  
 
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require_once '../connect.php';
    $sql = "select * from customers 
    where email = '$email' and password = '$password'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_num_rows($result);

    if($number_rows == 1) {
        session_start();
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $_SESSION['fullname'] = $each['fullname'];
        $_SESSION['id'] = $id;
        $token = uniqid('user_', true) . time();
        $sql = "update customers
        set
        token = '$token' where id = '$id'";
        mysqli_query($connect,$sql);
        setcookie('remember', $token, time() + 86400*30);
        header('location:../user.php');
        exit;
    }
    session_start();
    $_SESSION['error'] = 'Login False';
    header('location:login.php?error=Login False');


    mysqli_close($connect);

?>