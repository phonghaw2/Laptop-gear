<?php  

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require_once '../admin-vip/connect.php';
    $sql = "select count(*) from customers where email = '$email'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_fetch_array($result)['count(*)'];

    if($number_rows == 1) {
        header('location:signup.php?error=Email already used');
        exit;
    }

    $sql = "insert into customers(fullname,email,password)
    value ('$fullname','$email','$password')";
    mysqli_query($connect,$sql);


    $sql = "select id from customers where email = '$email'";
    $result = mysqli_query($connect,$sql);
    $id = mysqli_fetch_array($result)['id'];
    session_start();
    $_SESSION['fullname'] = $fullname;
    $_SESSION['id'] = $id;


    mysqli_close($connect);

?>