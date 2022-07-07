<?php 
    require_once '../isset_token.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../admin-vip/products/photos/">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../base.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Laptop</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <span class="web-icon"></span>
                <a class="web-name" href="../index.php">Laptop&Gear</a>               
                <div class="search-wrapper">
                    <input class="search-input" type="search" placeholder="Search">
                    <ion-icon name="search"></ion-icon>
                </div>
            </div>
            <div class="header-right">
                <button class="mode-switch"></button>
                <div class="header-gap-auth  popper-hd">
                    <a class="cart-btn btn-icon-large header-btn" href="cart/">
                        <i class='bx bx-cart-alt' ></i>
                    </a>
                    
                </div>
                <?php if(isset($_SESSION['id'])){  ?>
                    <div class="header-gap-auth header-btn">
                        <a href="join/logout.php">
                        <span>Log out</span>
                        </a>
                        
                    </div>
                <?php } else { ?>
                <div class="header-gap-auth  ">
                    <a class="btn-icon-large header-btn" href="join/login.php">
                    <span>Login</span>
                    </a>
                    
                </div>
                <div class="header-gap-auth ">
                    <a class="btn-icon-large header-btn" href="join/signup.php">
                    <span>Sign up</span>
                    </a>
                    
                </div>
                <?php  }  ?>
            </div>
        </div>
        <div class="body-content">
            <div class="sidebar">
                <ul>
                    <li>
                        <span class="tooltip">Laptop</span>
                        <a class="sidebar-link" href="?style=1">
                            <img src="../image/laptop.png" alt="laptop-img">        
                        </a>
                    </li>
                    <li>
                        <a class="sidebar-link" href="#">
                        <img src="../image/computer.png" alt="computer-img">
                        </a>
                        <span class="tooltip">Computer</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="?style=4">
                            <img src="../image/headphone.png" alt="headphone-img">
                        </a>
                        <span class="tooltip">Headphone</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="#">
                        <img src="../image/cpu.png" alt="cpu-img">  
                        </a>
                        <span class="tooltip">CPU</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="#">
                        <img src="../image/ssd.png" alt="ssd-img">
                        </a>
                        <span class="tooltip">SSD</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="?style=3">
                        <img src="../image/keyboard.png" alt="keyboard-img">
                        </a>
                        <span class="tooltip">Keyboard</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="?style=2">
                        <img src="../image/mouse.png" alt="mouse-img">
                        </a>
                        <span class="tooltip">Mouse</span>
                    </li>
                </ul>
            </div>
            <div class="products-section">
                <?php 
                    $style = $_GET['style'];
                    require_once '../connect.php';
                    $sql = "SELECT manufacturers.id,manufacturers.name FROM products
                    join manufacturers on products.manufacturer_id = manufacturers.id 
                    WHERE style_id = '$style' GROUP BY manufacturer_id;";  //them dieu kien where de ra limit 9
                    $result = mysqli_query($connect,$sql);
                ?>
                <?php foreach ($result as $each) { ?>
                    <div class="product-main-container">
                        <div class="product-hd">
                            <a href="pages/laptop.php">
                                <button class="button-hd"><?php echo $each['name']?></button>
                            </a>
                        </div>
                        <ul class="swiper mySwiper product-slider">
                            <div class="swiper-wrapper">
                            <?php 
                                $id = $each['id'];
                                $sql = "select * from products where manufacturer_id = $id and style_id = '$style'" ;
                                $products = mysqli_query($connect,$sql);    
                            ?>   
                            <?php foreach ($products as $product) { ?>
                                
                                <li class="swiper-slide slide">
                                    <div class="">
                                    <a href="../product.php?id=<?php echo $product['id'] ?>">
                                        <div class="image-wrapper">
                                            <img src="../admin-vip/products/photos/<?php echo $product['image'] ?>" alt="">
                                        </div>
                                        <div class="product-info">
                                            <h4><?php echo $product['name'] ?></h4>
                                            <p><?php echo number_format($product['price']) ?></p>
                                        </div>
                                    </a>
                                    </div>
                                </li>

                            <?php }  ?>
                            </div>
                            <div class="prev">
                                <i class='bx bxs-chevron-left-circle'></i>
                            </div>
                            <div class="next">
                                <i class='bx bxs-chevron-right-circle'></i>
                            </div>
                            <div class="swiper-pagination"></div>
                        </ul>
                    </div>
                <?php }  ?>
            </div>
            
        </div>       
    </div>
    <?php include '../footer.php';  ?>
    <?php mysqli_close($connect);  ?>
    
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            slidesPerGroup: 4,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,    
            },
            navigation: {
            nextEl: ".next",
            prevEl: ".prev",
            // nextEl: ".next",
            // prevEl: "prev",
            },
        });
    </script>
    
</body>

</html>