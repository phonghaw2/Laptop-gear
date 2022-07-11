<?php 
 require_once '../../isset_token.php';
if(empty($_SESSION['cart'])){
    header('location:../');
    exit;
} else {
    $cart = $_SESSION['cart'];
    $sum = 0;
};

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
} else {
    header('location:../../join/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="../../main.css">
    
    <link rel="stylesheet" href="../../base.css">
    <link rel="stylesheet" href="../../footer.css">
    <link rel="stylesheet" href="../../admin-vip/products/photos/">   
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Product Info</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <span class="web-icon"></span>
                <a class="web-name" href="../index.php">Laptop&Gear</a>               
            </div>
            <div class="header-right">
                <button class="mode-switch"></button>
                <div class="header-gap-auth  popper-hd">
                    <a class="cart-btn btn-icon-large header-btn" href="../">
                        <i class='bx bx-cart-alt' ></i>
                    </a>
                    
                </div>
                <div class="header-gap-auth header-btn">
                    <a href="../index.php">
                    <span>CANCEL</span>
                    </a>    
                </div>
            </div>
        </div>
        <div class="body-content">
            <div class="checkout-section">
                <div class="cart-container">
                    <div class="cart-hd">
                        <i class='bx bx-money-withdraw'></i>
                        <h2> Proceed to checkout </h2>
                    </div>
                    <div class="sign-up-container">
                        <form method="POST" action="process_checkout.php">
                            <h1>Shipping and payment</h1>
                            
                            <input type="text" name="name_r" placeholder="Full Name" value="<?php echo $_SESSION['fullname'] ?>"/>
                            <input type="text" name="phone_r" placeholder="Phone"/>
                            <input type="text" name="address_r" placeholder="Address"/>
                            <button class="allowAdd2cart">
                                <span>Purchase</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="sub-checkout">
                <div class="cart-subtotal">
                    <?php foreach ($cart as $id => $each) { ?> 
                        <div class="cart-subtotal-item">
                            <div class="product-thumbnail">
                                <div class="product-thumbnail-wrapper">
                                    <img class="product-thumbnail-image" src="../../admin-vip/products/photos/<?php echo $each['image']  ?>" alt="">
                                    <span class="product-thumbnail-quantity" aria-hidden="true">
                                        <?php echo $each['quantity']  ?>
                                    </span>
                                </div>
                            </div>
                            <div class="product-name">
                                <p><?php echo $each['name'] ?></p>
                            </div>
                            <div class="product-price">
                                <?php echo number_format($each['price']*$each['quantity']) ?>
                            </div>
                        </div>
                        <?php $sum += ($each['price'])*$each['quantity']  ?>
                    <?php }  ?>
                </div>
                <div class="below-line">
                    <span>Total</span>
                    <span> <?php echo number_format($sum)?></span>
                </div>
                
            </div>
        </div>
        
    </div>
    <?php include '../../footer.php';  ?>
</body>
</html>