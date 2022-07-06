
    
<?php 

    $name_receiver = $_POST['name_r'];
    $phone_receiver = $_POST['phone_r'];
    $address_receiver = $_POST['address_r'];

    require_once '../../connect.php';
    session_start();
    $cart = $_SESSION['cart'];
    $total_price = 0;
    foreach ($cart as $each){
        $total_price += $each['price']*$each['quantity'];
    }
    
    $customer_id = $_SESSION['id'];
    $status = 0;
    

    $sql = "insert into orders(customer_id, name_receiver, phone_receiver, address_receiver,
    status, total_price)
    values ('$customer_id', '$name_receiver', '$phone_receiver', '$address_receiver',
    '$status', '$total_price')";
    mysqli_query($connect,$sql);

    $sql = "select max(id) from orders where customer_id = '$customer_id'"; //xay ra truong hop la 1 session iD dang nhap o ca 2 trinh duyet cung luc ????
    $result = mysqli_query($connect,$sql);
    $order_id = mysqli_fetch_array($result)['max(id)'];
    foreach($cart as $product_id => $each){
        $quantity = $each['quantity'];
        $sql = "insert into order_product(order_id, product_id, quantity)
        values ('$order_id', '$product_id', '$quantity')";
        mysqli_query($connect,$sql);
    };
    mysqli_close($connect);
    unset($_SESSION['cart']);
    $_SESSION['purchase_success'] = 'Successful Payment';
    header('location:../index.php');
?>

<!-- Insert = session ko hieu qua ( co han che) -->
<!-- Insert Trouble
    Solve 1 : select max(id) them dieu kien Where de chan cu' 
    Solve 2 : SQL = "select max(id) from orders" roi $id = max(id)
       Insert truc tiep Order_id = $id ;
       ( truong hop 2 hay nhieu nguoi cung insert(hay cung luc thanh toan) se co 1 hay n nguoi 
       bi loi? =>> Try catch khuc nay)


-->