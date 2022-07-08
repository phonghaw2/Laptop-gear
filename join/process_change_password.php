<?php 

$token = $_POST['token'];
$new_password = $_POST['new_password'];

require_once '../connect.php';

$sql = "select customer_id from forgot_password where token = '$token'";
$result= mysqli_query($connect,$sql);
if(mysqli_num_rows($result) === 0){
    header('location:../index.php');
    exit;
}
$id = mysqli_fetch_array($result)['customer_id'];
$sql = "update customers set
password = '$new_password'
where id = '$id'";
mysqli_query($connect,$sql);


// xoa cac customer_id co datediff > 3 tai forgot_password 
//(hosting : su dung cronjob de xoa )

header('location:login.php');


?>