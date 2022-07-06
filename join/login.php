<?php 
    session_start();
    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];
        require_once '../admin-vip/connect.php';
        $sql = "select * from customers
        where token = '$token' limit 1";
        $result = mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 1 ){
            $each = mysqli_fetch_array($result);
            $_SESSION['id'] = $each['id'];
            $_SESSION['fullname'] = $each['fullname'];
        };
       
    }
    if(isset($_SESSION['id'])){
        header('location:../');
        exit;
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
    <link rel="stylesheet" href="auth.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Log in</title>
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
                    <a class="cart-btn btn-icon-large header-btn" href="../cart/">
                        <i class='bx bx-cart-alt' ></i>
                    </a>
                    
                </div>
                <div class="header-gap-auth header-btn">
                    <a href="">
                    <span>Login</span>
                    </a>
                    
                </div>
                <div class="header-gap-auth header-btn">
                    <a href="signup.php">
                    <span>Sign up</span>
                    </a>
                    
                </div>
            </div>
        </div>
        <div class="body-auth">
            <div class="sign-up-container">
                <form method="POST" action="process_login.php">
                    <h1>Welcome !</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class='bx bxl-facebook' ></i></a>
                        <a href="#" class="social"><i class='bx bxl-google-plus' ></i></a>
                        <a href="#" class="social"><i class='bx bxl-linkedin' ></i></i></a>
                    </div>
                    <span>or use your account</span>
                    <?php if(isset($_SESSION['error'])) { ?>
                        <div class="alert-error">
                            <div>
                            There was a problem logging in. Check your email and password or create an account.
                            </div>
                            <?php  unset($_SESSION['error']); ?>
                        </div>
                    <?php }  ?>   
                    <input type="email" name="email" placeholder="Email" autocomplete="False"/>
                    <input type="password" name="password" placeholder="Password" />
                    <span> 
                        <a href="">Forgot your password?</a>
                    </span>
                    <button>Sign in</button>
		        </form>
            </div>
        </div>
        <?php include '../footer.php';  ?>
    </div>
    
</body>
</html>