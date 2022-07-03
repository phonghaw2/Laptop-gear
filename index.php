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
                    <a class="cart-btn btn-icon-large header-btn" href="">
                        <i class='bx bx-cart-alt' ></i>
                    </a>
                    
                </div>
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
            </div>
        </div>
        <div class="body-content">
            <div class="sidebar">
                <ul>
                    <li>
                        <span class="tooltip">Laptop</span>
                        <a class="sidebar-link" href="#">
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
                        <a class="sidebar-link" href="#">
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
                        <a class="sidebar-link" href="#">
                        <img src="image/keyboard.png" alt="keyboard-img">
                        </a>
                        <span class="tooltip">Keyboard</span>
                    </li>
                    <li>
                        <a class="sidebar-link" href="">
                        <img src="image/mouse.png" alt="mouse-img">
                        </a>
                        <span class="tooltip">Mouse</span>
                    </li>
                </ul>
            </div>
            <div class="products-section">
                <div class="product-laptop-container">
                    <div class="product-hd">
                        <div class="product-title">Laptop</div>
 
                    </div>
                    <ul class="swiper mySwiper product-slider">
                        <?php include 'products-section/laptop.php'  ?>
                        <!-- <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div> -->
                        <div class="prev">
                            <i class='bx bxs-chevron-left-circle'></i>
                        </div>
                        <div class="next">
                            <i class='bx bxs-chevron-right-circle'></i>
                        </div>
                        <div class="swiper-pagination"></div>
                    </ul>
                </div>
                <div class="product-mouse-container">
                    <div class="product-hd">
                        <div class="product-title">Mouse</div>
 
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
            </div>
            <div class="sub-content"></div>
        </div>       
    </div>
    <?php include 'footer.php';  ?>
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