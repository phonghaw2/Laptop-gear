<?php require '../check_super_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../base.css">
    <title>POST</title>
    
        
</head>
<body>
        <?php 
            if(empty($_GET['id'])) {
                header('location:index.php?error=Select ID to Edit');
            }
            $id = $_GET['id'];
            require '../menu.php';
            require_once '../connect.php';
            $sql = "select * from manufacturers
            where id = '$id'";
            $result = mysqli_query($connect,$sql);
            $number_rows = mysqli_num_rows($result);
            if($number_rows === 1) {
                $each = mysqli_fetch_array($result);
            
            
           
        ?>
        
  <form method="POST" action="process_update.php">
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
        <label for=""> 
            <span>Name</span> 
            <input type="text" name="name" value="<?php echo $each['name'] ?>">
        </label>
        <label for=""> 
            <span>ADDRESS</span> 
            <textarea name="address" id="" cols="30" rows="10">
            <?php echo $each['address'] ?>
            </textarea>
        </label>
        <label for=""> 
            <span>Phone</span> 
            <input type="text" name="phone" value="<?php echo $each['phone'] ?>">
        </label>
        <label for=""> 
            <span>IMAGE</span> 
            <input type="text" name="image" value="<?php echo $each['image'] ?>">
        </label>
        <button>EDIT</button>
    </form>
    <?php }else { ?>
            <h1>Cannot find this ID</h1>
    <?php }  ?>
</body>
</html>