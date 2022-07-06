<?php require '../check_super_admin.php' ;
    if(empty($_GET['id']) ) {
    
        header('location:form_update.php?error=select ID to remove ');
        }
        $id = $_GET['id'];
   
    require_once '../connect.php';
    $sql = "delete from manufacturers
    where id = '$id'";
    mysqli_query($connect,$sql);

    mysqli_close($connect);
    header('location:index.php?success=Remove Complete');
?>