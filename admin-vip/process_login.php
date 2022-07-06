<?php 

$name = $_POST['name'];
$password = $_POST['password'];

require_once 'connect.php';
$sql = "select * from admin where name = '$name' and password = '$password'";
$result= mysqli_query($connect,$sql);
if(mysqli_num_rows($result) == 1 ){
    $each = mysqli_fetch_array($result);
    session_start();
    $_SESSION['name'] = $each['name'];
    $_SESSION['id'] = $each['id'];
    $_SESSION['level'] = $each['level'];
    
    header('location:root/');
    exit;
}else {
    header('location:index.php');
}
header('location:index.php');
?>