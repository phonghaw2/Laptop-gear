<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../base.css">
    <title>POST</title>
   
</head>
<body>
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    <div class="main-container">
        <div class="main-title">
            <h1> ADD Manufacturers</h1>
        </div>
        <div>
            <form method="POST" action="process_insert.php">
                <label for=""> 
                    <span>Name</span> 
                    <input type="text" name="name">
                </label>
                <button>POST</button>
            </form>
        </div>
    </div>
        
</body>
</html>