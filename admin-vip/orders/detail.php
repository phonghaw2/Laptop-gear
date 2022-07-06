<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Order Details</title>
</head>
<body>
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    
    <div class="main-container">
        <?php include '../toast.php'?> 
        <div class="main-title">
            <h1>Order Details</h1>
        </div>
      
        <?php 
            $order_id = $_GET['id'];
            $sum = 0;
            $status = $_GET['status'];
            require_once '../connect.php';
            $sql = "select * from order_product 
            join products on order_product.product_id = products.id
            where order_id = '$order_id'";
            $result = mysqli_query($connect,$sql);
        ?>
        
        <div class="table-orders-details">
            <div class="table-heading">Product</div>
            <div class="table-heading">Price</div>
            <div class="table-heading">Quantity</div>    
            <div class="table-heading">Total</div>             
            <div class="table-heading">Check</div>   
            <div class="table-heading">Remove</div>   
        </div>       
        <?php foreach ($result as $each ) { ?>
           <div class="table-order-details-item">
                <div class="table-item-content"><?php echo $each['name'] ?></div>
                <div class="table-item-content"><?php echo number_format($each['price']) ?></div>
                <div class="table-item-content"><?php echo $each['quantity'] ?></div>
                <div class="table-item-content">
                <?php echo number_format($each['quantity']*$each['price']) ?>
                </div>
                <div class="table-item-content">
                    <a href=""></a>
                </div>
                <div class="table-item-content">
                    <a href=""></a>
                </div>    
                <?php  $sum += $each['quantity']*$each['price'] ; ?>
                
           </div>
        <?php  } ?> 
        <div>
            <h1>total bill : <?php echo number_format($sum)  ?></h1>
            <?php  if($status == 0 ){ ?>
                <a href="update_order.php?id=<?php echo $order_id ?>&status=1">Check</a> 
                <a href="update_order.php?id=<?php echo $order_id ?>&status=2">Remove</a>     
            <?php } elseif ($status == 1) {?>
                <span>CHECKED</span>
                <a href="update_order.php?id=<?php echo $order_id ?>&status=2">Remove</a>
            <?php }else { ?>
                <a href="update_order.php?id=<?php echo $order_id ?>&status=1">Check</a>
                <span>Cancelled</span
            <?php }  ?>
        </div>
    </div>  
     
</body>
</html>