<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="base.css">
    <title>Document</title>
</head>
<body>
    <div class="sign-up-container">
        <form method="POST" action="process_login.php">
            <h1>Welcome !</h1>
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert-error">
                    <div>
                    ban lam gi co quyen ma vao day.
                    </div>
                    <?php  unset($_SESSION['error']); ?>
                </div>
            <?php }  ?>    
            <input type="text" name="name" placeholder="username" autocomplete="False"/>
            <input type="password" name="password" placeholder="Password" />
            <span> 
                <a href="#">Forgot your password? Just kill yourself</a>
            </span>
            <button>Sign in</button>
		</form>
     </div>
</body>
</html>