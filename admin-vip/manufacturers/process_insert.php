<?php 
if(empty($_POST['name']) ) {
    
    header('location:form_insert.php?error=Please fill out the information ');
    }
    $name = $_POST['name'];
    

    require '../connect.php';
    $sql = "insert into manufacturers(name)
    values('$name')";

    mysqli_query($connect,$sql);
    mysqli_close($connect);

header('location:index.php?success=Complete');
?>