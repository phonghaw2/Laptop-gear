<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="auth.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Sign up</title>
</head>
<body>
    
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
                <form method="POST" action="process_signup.php">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class='bx bxl-facebook' ></i></a>
                        <a href="#" class="social"><i class='bx bxl-google-plus' ></i></a>
                        <a href="#" class="social"><i class='bx bxl-linkedin' ></i></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <?php if(isset($_GET['error'])) { ?>
                        <div class="alert-error">
                            <div>
                            There was a problem sign up . Check your email and password .
                            </div>
                        </div>
                    <?php }  ?> 
                    <input type="text" name="fullname" placeholder="Fullname" />
                    <input type="email" name="email" placeholder="Email" />
                    <input type="password" name="password" placeholder="Password" />
                    <button>Sign Up</button>
		        </form>
            </div>
        </div>
        <div class="footer">
            <div class="footer-info">
                <h2 class="footer-info-title">ABOUT</h2>
                <p class="footer-info-content">Laptop&Gear is for outsiders. We are a premium, hand-curated store to shop for the best gear. Find your proven favorites, as well as new athlete-founded and designer-driven brands that are hard to find anywhere else. </p>
            </div>
            
            <div class="footer-content">
                <h1>Laptop & Gear</h1>
                <p>--my 1st pet-project--</p>
            </div>
            <div class="footer-social">
                <img src="../image/97195144_p0.jpg" alt="">
                <div class="footer-link">
                    <ul>
                        <li>
                            <a href="">
                                <i class='bx bxs-phone'></i>
                                <span>0974990455</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class='bx bxl-facebook' ></i>
                                <span>fb.com/phonghaw2</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class='bx bxl-github' ></i>
                                <span>github.com/phong25t25t</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                            <i class='bx bxl-linkedin' ></i>
                                <span>@phonghaw2</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>