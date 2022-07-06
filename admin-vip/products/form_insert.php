<?php require '../check_admin.php' ?>
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
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    <div class="main-container">
        <div class="main-title">
            <h1> ADD Products</h1>
        </div>
        <?php require '../connect.php';
            $sql = "select * from manufacturers";
            $result= mysqli_query($connect,$sql);
        ?>
        <div class="form-container">
            <form method="POST" action="process_insert.php" enctype="multipart/form-data">
                <label for=""> 
                    <span>Name</span> 
                    <input type="text" name="name">
                </label>
                <label for=""> 
                    <span>Price</span> 
                    <input type="text" name="price">
                </label>
                <label for=""> 
                    <span>Image</span> 
                    <input type="file" name="image" accept="image/*"> 
                </label>
                <br>
                <label for=""> 
                    <span>Description</span> 
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                    
                </label>
                <label for=""> 
                    <span>Trademark</span> 
                    <select name="manufacturer_id" id="">
                        <?php foreach ($result as $each) { ?>
                            <option value="<?php echo $each['id']?> ">
                                <?php echo $each['name']  ?>
                            </option>
                        <?php }  ?>
                    </select>
                </label>
                <button>POST</button>
            </form>
        </div>
    </div>
    <?php  mysqli_close($connect); ?> 
</body>
</html>