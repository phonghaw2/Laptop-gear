<?php 
session_start();
$id = $_GET['id'];
$type = addslashes($_GET['type']);




if($type == 'decre'){
    if($_SESSION['cart'][$id]['quantity'] > 1){
        $_SESSION['cart'][$id]['quantity']--;
    } else {
        $_SESSION['cart'][$id]['quantity'];
        // unset($_SESSION['cart'][$id]);

    }
} else {
    $_SESSION['cart'][$id]['quantity']++;
}


?>