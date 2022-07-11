<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../img/logo.jpg" enctype="multipart/form-data">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    
    <div class="main-container"> 
        <div class="main-title">
            <h1>analytics</h1>
        </div>
        <div class="main-content">
        <div class="asset-category">
            <div class="category">
                <div class="asset">
                    <a href="chart2.php">
                        <div class="asset-logo"><i class='bx bxs-coin'></i></div>
                    </a>                       
                </div>
                <div class="asset-name">Revenue</div>
            </div>
            <div class="category">
                <div class="asset">
                    <a href="chart_product.php">
                        <div class="asset-logo"><i class='bx bx-unite'></i></div>
                    </a>    
                </div>
                <div class="asset-name">Product</div>
            </div>  
        </div>   
    </div>  
     
</body>
</html>