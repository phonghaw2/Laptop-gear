<?php  
    function current_url(){
        $url      = "http://" . $_SERVER['HTTP_HOST'];
        
        return $url;
    }
    
    $email = $_POST['email'];
    require_once '../mail.php';
    require_once '../connect.php';
    $sql = "select * from customers where email = '$email'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) === 1 ) {
        $each =  mysqli_fetch_array($result);
        $customer_id = $each['id'];
        $name = $each['fullname'];
        $token = $token = uniqid('user_', true) . time();
        $sql_check = "select * from forgot_password where customer_id = '$customer_id'";
        $c_result = mysqli_query($connect,$sql_check);
        if(mysqli_num_rows( $c_result) < 3) {
            $sql = "insert into forgot_password(customer_id, token)
            values ('$customer_id','$token')";
            mysqli_query($connect,$sql);

            $link = current_url() . '/change_new_password.php?token='.$token ;
            $title = 'Change your Password';
            $content = "Click <a href='$link'>here</a>";
            sendmail($email,$name,$title,$content);
        };
        
    }
    

?>
