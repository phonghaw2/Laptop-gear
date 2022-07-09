<?php 
    require_once 'isset_token.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="admin-vip/products/photos/">   
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Product Info</title>
</head>
<body>
        <?php 
            $id = $_GET['id'];
            require_once 'connect.php'  ;
            $sql = "select * from products where id = '$id'"  ;
            $result = mysqli_query($connect,$sql);
            $each = mysqli_fetch_array($result);                    
        ?>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <span class="web-icon"></span>
                <a class="web-name" href="index.php">Laptop&Gear</a>               
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
                <div class="product-container">             <!-- flex: row , chia 50:50 --> 
                    <div class="product-img">
                        <img src="admin-vip/products/photos/<?php echo $each['image'] ?>" alt="product-img">
                    </div>
                    
                    <div class="product-content">               <!-- flex: column  -->
                        <div class="product-heading">    
                            <h2>  <?php echo $each['name']  ?>  </h2>
                        </div>
                        <div class="price-tag">
                            <p> <i class='bx bx-purchase-tag-alt' ></i> <?php echo $each['price'] ?> VND</p>
                        </div>
                        <div>
                            <p> <i class='bx bx-check'></i> Genuine 12-month warranty. </p>
                            <p> <i class='bx bx-check'></i> Support innovation for 7 days.</p>
                            <p> <i class='bx bx-check'></i> Windows built-in copyright. </p>
                        </div>
                        <div class="product-information">
                            <p>
                                Don't have money ( ͡ᵔ ͜ʖ ͡ᵔ ), click <a style="color:#428bca" href="https://www.google.com/search?q=c%C3%A1ch+ki%E1%BA%BFm+ti%E1%BB%81n+nhanh+nh%E1%BA%A5t&oq=cach+kiem+tien+nhanh&aqs=edge.2.69i57j0i512l2j0i22i30l6.5035j0j1&sourceid=chrome&ie=UTF-8" target="_blank"> here </a>
                            </p>
                            <div class="allowAdd2cart">
                                <a href="cart/add2cart.php?id=<?php echo $each['id'] ?>">
                                    <span> Add to cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--  -->
            </div>
            <div class="sub-content"></div>
        </div>
    </div>
    <?php include 'footer.php';  ?>
    <?php mysqli_close($connect)  ?>
</body>
</html>