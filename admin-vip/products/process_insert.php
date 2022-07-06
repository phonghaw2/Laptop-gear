<?php require '../check_admin.php';
if(empty($_POST['name']) || empty($_POST['price'])) {
    
    header('location:form_insert.php?error=Please fill out the information ');
    }
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $description = $_POST['description'];
    $manufacturer_id = $_POST['manufacturer_id'];


    $folder = 'photos/';
    $file_extension = explode('.',$image['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;

    move_uploaded_file($image["tmp_name"], $path_file);

    require '../connect.php';
    $sql = "insert into products(name,price,image,description,manufacturer_id)
    values('$name','$price','$file_name','$description','$manufacturer_id')";

    mysqli_query($connect,$sql);
    mysqli_close($connect);

header('location:index.php?success=Complete');
?>