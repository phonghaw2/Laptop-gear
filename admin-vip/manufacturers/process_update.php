<?php 
if(empty($_POST['id']) ) {
    
    header('location:form_update.php?error=select ID to Edit ');
    }
    $id = $_POST['id'];
if(empty($_POST['name'])  || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])) {
    
    header("location:form_update.php?id=$id&error=Please fill out the information ");
    exit;
    }


    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];

    require '../connect.php';
    $sql = "update manufacturers
    set
    name = $name,
    address = $address,
    phone = $phone,
    image = $image
    where
    id = $id
    ";

    mysqli_query($connect,$sql);
    mysqli_close($connect);

header('location:index.php?success=Edit Complete');
?>