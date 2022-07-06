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
    <title>Document</title>
</head>
<body>
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    
    <div class="main-container">
        <?php include '../toast.php'?> 
        <div class="main-title">
            <h1>Orders Management</h1>
        </div>
        <div>
            <a href="form_insert.php">Add products</a>
        </div>
        
        <?php 
            require_once '../connect.php';
            $sql = "select orders.*,customers.fullname,customers.phone_number,customers.address from orders join customers
            on customers.id = orders.customer_id";
            $result = mysqli_query($connect,$sql);

        ?>
        
        <div class="table-orders">
            <div class="table-heading">ID</div>
            <div class="table-heading">Date</div>
            <div class="table-heading">Cus.Info</div>    
            <div class="table-heading">Rec.Info</div>          
            <div class="table-heading">Status</div>    
            <div class="table-heading">Values</div>   
            <div class="table-heading">Details</div>   
        </div>       
        <?php foreach ($result as $each ) { ?>
           <div class="table-order-item">
                <div class="table-item-content"><?php echo $each['id'] ?></div>
                <div class="table-item-content"><?php echo $each['created_at'] ?></div>
                <div class="table-item-content">
                    <p><?php echo $each['fullname']  ?></p>
                    <p><?php echo $each['phone_number']  ?></p>
                    <p><?php echo $each['address']  ?></p>
                </div>
                <div class="table-item-content">
                    <p><?php echo $each['name_receiver']  ?></p>
                    <p><?php echo $each['phone_receiver']  ?></p>
                    <p><?php echo $each['address_receiver']  ?></p>
                </div>
                <div class="table-item-content">
                    <?php switch ($each['status']){
                        case '0':
                            echo "New";break;
                        case '1':
                            echo "Checked";break;
                        case '2':
                            echo "Cancelled";break;
                    };
                    ?>
                </div> 
                <div class="table-item-content"><?php echo number_format($each['total_price']) ?></div>
                <div class="table-item-content">
                    <a href="detail.php?id=<?php echo $each['id'] ?>&status=<?php echo $each['status'] ?>"><ion-icon name="reader-outline"></ion-icon></a>
                </div>
           </div>
        <?php  } ?>   
        <!-- <div class="pagination">
            <ul class="pagination-list">
                <li class="pagination-item">
                    <a href="#"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                <?php for($i = 1 ; $i <= $pages; $i++) { ?>
                    <li class="pagination-item">
                        <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
                            <?php echo $i  ?>
                         </a>
                    </li>     
                 <?php }  ?>
                <li class="pagination-item">
                    <a href=""><i class="fa-solid fa-angle-right"></i></a>
                </li>
            </ul>
            
        </div>     -->
    </div>  
     
</body>
</html>