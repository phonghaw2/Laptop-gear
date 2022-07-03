<?php 
session_start();
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../admin-vip/products/photos/">   
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Product Info</title>
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
                <div class="header-gap-auth header-btn">
                    <a href="join/login.php">
                    <span>Login</span>
                    </a>
                    
                </div>
                <div class="header-gap-auth header-btn">
                    <a href="join/signup.php">
                    <span>Sign up</span>
                    </a>
                    
                </div>
            </div>
        </div>
        <div class="body-content">
            <div class="sidebar">
                <ul>
                    <li>
                        <span class="tooltip">Laptop</span>
                        <a class="sidebar-link" href="#">
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
                        <a class="sidebar-link" href="#">
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
                        <a class="sidebar-link" href="#">
                        <img src="../image/keyboard.png" alt="keyboard-img">
                        </a>
                        <span class="tooltip">Keyboard</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="">
                        <img src="../image/mouse.png" alt="mouse-img">
                        </a>
                        <span class="tooltip">Mouse</span>
                    </li>
                </ul>
            </div>
            <div class="products-section">
                <div class="cart-container">
                    <div class="cart-hd">
                        <i class='bx bx-cart' ></i>
                        <h2> CART </h2>
                    </div>
                    <?php foreach ($cart as $id => $each) { ?>
                        <div class="cart-item">
                            <div class="div-cart-item">
                                <div class="product-card-img">
                                    <a href="../product.php?id=<?php echo $id?>">
                                        <img src="../admin-vip/products/photos/<?php echo $each['image']  ?>" alt="product-img">
                                    </a>
                                    
                                </div>
                                <div class="product-card-info">
                                    <div > 
                                        <span class="sc-product-title"><?php echo $each['name'] ?></span> 
                                    </div>
                                    <div>
                                        <span class="sc-product-availability a-size-small">In Stock</span>
                                    </div>
                                    <div>
                                        <span class="a-size-small">
                                            <span>Style: </span>
                                            <span>---truyen cai style vao</span>
                                        </span>
                                    </div>
                                    <div class="sc-action-link">
                                        <div class="change-quantity">
                                            <a href="update-quantity.php?id=<?php echo $id?>&type=decre"><i class='bx bx-minus' ></i></a>
                                            <span><?php echo $each['quantity']  ?></span>
                                            <a href="update-quantity.php?id=<?php echo $id?>&type=incre"><i class='bx bx-plus'></i></a>
                                        </div>
                                        <div class="action-link">
                                            <a href="delete-cart-item.php?id=<?php echo $id?>">
                                                <span>Delete</span>
                                            </a>     
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="price-of-card"></div>
                        </div>
                    <?php }  ?>
                </div>
            </div> 
            <div class="sub-content">
                <div class="cart-subtotal">
                    <h2 class="cart-subtotal-hd">Order Summary</h2>
                    <hr class="price-summary__hr" aria-hidden="true">
                    <div class="price-summary">
                        <div class="price-summary-line">
                            <span class="price-summary-line_title">Original Price</span>
                            <span class="price-summary-line__content"> <!-- Echo sum- price day --></span>
                        </div>
                        <div class="price-summary-line">
                            <span class="price-summary-line_title">Savings</span>
                            <span class="price-summary-line__content">NOPE</span>
                        </div>
                        <div class="price-summary-line">
                            <span class="price-summary-line_title">Store Pickup</span>
                            <span class="price-summary-line__content">FREE</span>
                        </div>
                        <hr class="price-summary__hr" aria-hidden="true">
                        <div class="below-line">
                            <span>Total</span>
                            <div> <!-- echo sum-price --></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php include '../footer.php';  ?>
</body>
</html>