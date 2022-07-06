<?php 
    require_once 'connect.php';
$sql = "select * from products
    where id % 2 = 0 and style_id = 3 limit 12";  //them dieu kien where de ra limit 9
$result = mysqli_query($connect,$sql);
?>
<div class="swiper-wrapper">
    <?php foreach ($result as $each) { ?>
        
            <li class="swiper-slide slide">
                <div class="">
                <a href="product.php?id=<?php echo $each['id'] ?>">
                    <div class="image-wrapper">
                        <img src="admin-vip/products/photos/<?php echo $each['image'] ?>" alt="">
                    </div>
                    <div class="product-info">
                        <h4><?php echo $each['name'] ?></h4>
                        <p><?php echo number_format($each['price']) ?></p>
                    </div>
                </a>
                </div>

            </li>

    <?php }  ?>
    
</div>