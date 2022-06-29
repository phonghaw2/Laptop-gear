<?php 
if(empty($_POST['name']) || empty($_POST['price'])) {
    
    header('location:form_insert.php?error=Please fill out the information ');
    }
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image_new = $_FILES['image_new'];
    if($image_new['size'] > 0 ){
        $folder = 'photos/';
        $file_extension = explode('.',$image_new['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;
    
        move_uploaded_file($image_new["tmp_name"], $path_file);
    } else {
        $file_name = $_POST['image_old'];

    };
    
    $description = $_POST['description'];
    $manufacturer_id = $_POST['manufacturer_id'];


   

    require '../connect.php';
    $sql = "update products set
    name = '$name',
    price = '$price',
    image = '$file_name',
    manufacturer_id = '$manufacturer_id',
    description = '$description'
    where id = '$id' ";

    mysqli_query($connect,$sql);
    mysqli_close($connect);

header('location:index.php?success=Complete');
?>