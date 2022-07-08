<?php 
session_start();
$token = $_GET['token'];
require_once '../connect.php';
$sql = "select customer_id from forgot_password where token= '$token'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) === 0 ) {
    header('location:../index.php');
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
    <title>New password</title>
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
                    <a href="login.php">
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
                <form method="POST" action="process_change_password.php">
                    <h1>Welcome !</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class='bx bxl-facebook' ></i></a>
                        <a href="#" class="social"><i class='bx bxl-google-plus' ></i></a>
                        <a href="#" class="social"><i class='bx bxl-linkedin' ></i></i></a>
                    </div>
                    
                    <span>Are u sure about that  (≧ ◡ ≦) </span>
                    <input type="hidden" name="token" value="<?php echo $token ?>">
                    <input type="text" name="new_password" placeholder="new password" autocomplete="False"/> 
                    <input type="text" name="new_password2" placeholder="confirm a new password" autocomplete="False"/> 

                    <button>Change</button>2
		        </form>
            </div>
        </div>
        <?php include '../footer.php';  ?>
    </div>
    
</body>
</html>