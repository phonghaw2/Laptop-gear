<?php 
    require_once 'isset_token.php';
    require_once 'check-rating.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="admin-vip/products/photos/">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="base.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Customer Display</title>
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
                        <a class="sidebar-link" href="pages?style=1">
                            <img src="image/laptop.png" alt="laptop-img">        
                        </a>
                    </li>
                    <li>
                        <a class="sidebar-link" href="#">
                        <img src="image/computer.png" alt="computer-img">
                        </a>
                        <span class="tooltip">Computer</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="pages?style=4">
                            <img src="image/headphone.png" alt="headphone-img">
                        </a>
                        <span class="tooltip">Headphone</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="#">
                        <img src="image/cpu.png" alt="cpu-img">  
                        </a>
                        <span class="tooltip">CPU</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="#">
                        <img src="image/ssd.png" alt="ssd-img">
                        </a>
                        <span class="tooltip">SSD</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="pages?style=3">
                        <img src="image/keyboard.png" alt="keyboard-img">
                        </a>
                        <span class="tooltip">Keyboard</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="pages?style=2">
                        <img src="image/mouse.png" alt="mouse-img">
                        </a>
                        <span class="tooltip">Mouse</span>
                    </li>
                </ul>
            </div>
            <div class="products-section">
                <div class="product-main-container">
                    <div class="product-hd">
                        <a href="pages?style=1">
                            <button class="button-hd">Laptop</button>
                        </a>
                    </div>
                    <ul class="swiper mySwiper product-slider">
                        <?php include 'products-section/laptop.php'  ?>
                        <div class="prev">
                            <i class='bx bxs-chevron-left-circle'></i>
                        </div>
                        <div class="next">
                            <i class='bx bxs-chevron-right-circle'></i>
                        </div>
                        <div class="swiper-pagination"></div>
                    </ul>
                </div>
                <div class="product-main-container">
                    <div class="product-hd">
                    <a href="pages?style=2">
                            <button class="button-hd">Mouse</button>
                        </a>
                    </div>
                    <ul class="swiper mySwiper product-slider">
                        <?php include 'products-section/mouse.php'  ?>
                        <div class="prev">
                            <i class='bx bxs-chevron-left-circle'></i>
                        </div>
                        <div class="next">
                            <i class='bx bxs-chevron-right-circle'></i>
                        </div>
                        <div class="swiper-pagination"></div>
                    </ul>
                </div>
                <div class="product-main-container">
                    <div class="product-hd">
                        <a href="pages?style=3">
                            <button class="button-hd">Keyboard</button>
                        </a>
                    </div>
                    <ul class="swiper mySwiper product-slider">
                        <?php include 'products-section/keyboard.php'  ?>
                        <div class="prev">
                            <i class='bx bxs-chevron-left-circle'></i>
                        </div>
                        <div class="next">
                            <i class='bx bxs-chevron-right-circle'></i>
                        </div>
                        <div class="swiper-pagination"></div>
                    </ul>
                </div>
                <div class="product-main-container">
                    <div class="product-hd">
                    <a href="pages?style=4">
                            <button class="button-hd">Headphone</button>
                        </a>
                    </div>
                    <ul class="swiper mySwiper product-slider">
                        <?php include 'products-section/headphone.php'  ?>
                        <div class="prev">
                            <i class='bx bxs-chevron-left-circle'></i>
                        </div>
                        <div class="next">
                            <i class='bx bxs-chevron-right-circle'></i>
                        </div>
                        <div class="swiper-pagination"></div>
                    </ul>
                </div>
            </div>
            <div class="sub-content">   <!-- rating dung ajax + input trong form -->
                <div class="rating">
                    <i class='bx bxs-star'data-index="0"></i>
                    <i class='bx bxs-star'data-index="1"></i>
                    <i class='bx bxs-star'data-index="2"></i>
                    <i class='bx bxs-star'data-index="3"></i>
                    <i class='bx bxs-star'data-index="4"></i>             
                </div>

            </div>
        </div>       
    </div>
    <?php include 'footer.php';  ?>
    <?php mysqli_close($connect);  ?>
   
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>