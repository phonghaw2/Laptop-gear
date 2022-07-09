<?php 

// $date_picker =  $_POST['date_picker'];
// $order_type =  $_POST['order_type'];
// // so luong don hang
// $sql = "select count(*) from orders where created_at //kem dieu kien";
require_once '../connect.php';
// thong ke san phan ban chay nhat'
$sql = "SELECT products.name,products.id,ifnull(SUM(quantity),0) as quantity_order
FROM products 
LEFT JOIN order_product on order_product.product_id = products.id 
LEFT JOIN orders on orders.id = order_product.order_id
WHERE orders.status = 1 or orders.id is null
GROUP BY products.id 
ORDER BY order_product.quantity DESC";
$result = mysqli_query($connect,$sql);
$each   = mysqli_fetch_all($result);

echo json_encode($each);

// tong doanhthu
$sql = "select sum(total_price) from orders where status = 1";

// thong ke user order ( them dieu kien status = ? de xac minh )
// khach hang tiem nang
$sql = "select customers.fullname,ifnull(sum(total_price),0) as total_paid from customers left join orders on customers.id = orders.customer_id GROUP by customers.id;";




?>