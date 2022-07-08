<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="../img/logo.jpg" enctype="multipart/form-data">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    
    <div class="main-container">
        <?php include '../toast.php'?> 
        <div class="main-title">
            <h1>Products Manage</h1>
        </div>
        <div>
            <a href="form_insert.php">Add products</a>
        </div>
        
        <?php 
            require_once '../connect.php';
            $search = '';
            $style = 1;
            if(isset($_GET['search'])){
                 $search = $_GET['search'];
        
            }
            if(isset($_GET['style'])){
                 $style = $_GET['style'];
        
            }
            $sql_number_of = "select count(*) from products where 
            products.name like '%$search%' and style_id = $style";

            require '../pagination.php';
            
            $sql = "select products.*,manufacturers.name as manufacturer_name  from products
            join manufacturers on products.manufacturer_id = manufacturers.id
            where 
            products.name like '%$search%' and style_id = $style limit $number_per_page offset $skip";
            $result = mysqli_query($connect,$sql);
        ?>
        <div class="search-bar">
            <form >
                <input type="search" name="search" id="search" value="<?php echo $search ?>">
                <label for="search"><i class="fas fa-search"></i></label>        
            </form> 
            <div class="filter">
                <a href="">
                    <label for="filter"><i class='bx bxs-filter-alt' ></i>Filter</label>
                </a>
                <div class="filter-item">
                    <ul>
                        <li>
                            <a href="?style=1">
                            <span class="title"><i class='bx bx-laptop' ></i>Laptop</span>
                            </a>
                        </li>
                        <li>
                            <a href="?style=4">
                            <span class="title"><i class='bx bx-headphone' ></i>Headphone</span>
                            </a>
                        </li>
                        <li>
                            <a href="?style=3">
                            <span class="title"><i class='bx bxs-keyboard' ></i>Keyboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="?style=2">
                            <span class="title"><i class='bx bx-mouse-alt' ></i>Mouse</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="table-product">
            <div class="table-heading">ID</div>
            <div class="table-heading">Name</div>
            <div class="table-heading">Price</div>    
            <div class="table-heading">Image</div>                  
            <div class="table-heading">Trademark</div>    
            <div class="table-heading">Edit</div>    
            <div class="table-heading">Remove</div>    
        </div>       
        <?php foreach ($result as $each ) { ?>
           <div class="table-product-item">
                <div class="table-item-content"><?php echo $each['id'] ?></div>
                <div class="table-item-content"><?php echo $each['name'] ?></div>
                <div class="table-item-content"><?php echo $each['price'] ?></div>
                <div class="table-item-content">
                    <img height="60px" src="photos/<?php echo $each['image'] ?>" alt="Image product"> 
                </div>
                <div class="table-item-content"><?php echo $each['manufacturer_name'] ?></div>
                <div class="table-item-content"> 
                    <a href="form_update.php?id=<?php echo $each['id'] ?>"><ion-icon name="create"></ion-icon></a>
                </div>
                <div class="table-item-content">
                    <a href="delete.php?id=<?php echo $each['id'] ?>"><ion-icon name="remove-circle"></ion-icon></a>
                </div>
           </div>
        <?php  } ?>   
        <div class="pagination">
            <ul class="pagination-list">
                <li class="pagination-item">
                    <a href="#"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                <?php for($i = 1 ; $i <= $pages; $i++) { ?>
                    <li class="pagination-item">
                        <a href="?page=<?php echo $i ?>&search=<?php echo $search?>&style=<?php echo $style?>">
                            <?php echo $i  ?>
                         </a>
                    </li>     
                 <?php }  ?>
                <li class="pagination-item">
                    <a href=""><i class="fa-solid fa-angle-right"></i></a>
                </li>
            </ul>
            
        </div>    
    </div>  
     
</body>
</html>