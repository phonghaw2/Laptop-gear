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
    <?php 
        if(empty($_GET['id'])) {
            header('location:index.php?error=Select ID to Edit');
        }
        $id = $_GET['id'];
        require_once '../connect.php';
        $sql1 = "select * from manufacturers";
        $manufacturers= mysqli_query($connect,$sql1);


        $sql = "select * from products
        where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows === 1) {
            $each = mysqli_fetch_array($result);         
    ?>
    <div class="main-container">
        <div class="main-title">
            <h1> Edit Products</h1>
        </div> 
        <div class="form-container">
            <form method="POST" action="process_update.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $each['id']?>">
                <label for=""> 
                    <span>Name</span> 
                    <input type="text" name="name" value="<?php echo $each['name']?>">
                </label>
                <label for=""> 
                    <span>Price</span> 
                    <input type="text" name="price" value="<?php echo $each['price']?>">
                </label>
                <label for=""> 
                    <span>Change Image</span> 
                    <input type="file" name="image_new" accept="image/*" > 
                </label>
                <label for=""> 
                    <span>Image old</span> 
                    <img src="photos/<?php echo $each['image']?>" alt="image product" height="100"> 
                    <input type="hidden" name="image_old" value="<?php echo $each['image']?>">
                </label>

                <br>
                <label for=""> 
                    <span>Description</span> 
                    <textarea name="description" id="" cols="30" rows="10">
                    <?php echo $each['description']?>
                    </textarea>                  
                </label>
                <label for=""> 
                    <span>Trademark</span> 
                    <select name="manufacturer_id" id="">
                        <?php foreach ($manufacturers as $manufacturer) { ?>
                            <option value="<?php echo $manufacturer['id']?> "
                                <?php if($each['manufacturer_id'] == $manufacturer['id']) { ?>
                                    selected
                                <?php }  ?>
                            >
                                <?php echo $manufacturer['name']  ?>
                            </option>
                        <?php }  ?>
                    </select>
                </label>
                <button>update</button>
            </form>
        </div>
    </div>
    <?php }else { ?>
            <h1>Cannot find this ID</h1>
    <?php }  ?>
</body>
</html>