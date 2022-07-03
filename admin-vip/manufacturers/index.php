<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    <div class="main-container">
        <div>
            <?php include '../toast.php'?> 
        </div>
        <div class="main-title">
            <h1>Manufacturers Manage</h1>
        </div>
        <div>
            <a href="form_insert.php">Add manufacturer</a>
        </div>
        
        <?php 
            require_once '../connect.php';
            // $sql = 'select * from manufacturers';
            $sql = " select manufacturers.id,manufacturers.name, count(*) FROM `manufacturers` 
            JOIN products ON manufacturers.id = products.manufacturer_id GROUP by manufacturers.id";
            
            $result = mysqli_query($connect,$sql);
        ?>
        <div class="table">
            <div class="table-heading">ID</div>
            <div class="table-heading">Name</div>
            <div class="table-heading">The number of products</div>    
            <div class="table-heading">Edit</div>    
            <div class="table-heading">Remove</div>    
        </div>       
        <?php foreach ($result as $each ) { ?>
           <div class="table-item">
                <div class="table-item-content"><?php echo $each['id'] ?></div>
                <div class="table-item-content"><?php echo $each['name'] ?></div>
                <div class="table-item-content"><?php echo $each['count(*)'] ?></div>
                <div class="table-item-content"> 
                    <a href="form_update.php?id=<?php echo $each['id'] ?>"><ion-icon name="create"></ion-icon></a>
                </div>
                <div class="table-item-content">
                    <a href="delete.php?id=<?php echo $each['id'] ?>"><ion-icon name="remove-circle"></ion-icon></a>
                </div>
           </div>
        <?php  } ?>       
    </div>   
    <?php include '../toast.php'?>
</body>
</html>