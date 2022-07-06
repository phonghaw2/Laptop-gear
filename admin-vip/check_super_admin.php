<?php 
session_start();

if(empty($_SESSION['level'])){
    $_SESSION['error'] = "hehe ";
    header('location:../');
}
?>