<?php 
    require_once '../connect.php' ;
    $in = $_GET['day'];  
    $sql = "SELECT DATE_FORMAT(created_at,'%e-%m') as dayy,sum(quantity) as 'total' ,
	style.name as 'name' , style.id as 'style_id'
    FROM orders 
    JOIN order_product on orders.id = order_product.order_id
    JOIN products on  products.id = order_product.product_id
    join style on products.style_id = style.id
    where DATE(created_at) >= CURDATE() - INTERVAL $in day
    GROUP BY style.id,DATE_FORMAT(created_at,'%e-%m')";
    $result = mysqli_query($connect,$sql);
    
    $month = date("m");
    $today = date('d');
    if($today < $in) { 
        $get_day = $in - $today;
        $prevmonth = date("m",strtotime("-1 month"));
        $prevmonth_day = date("Y-m-d",strtotime("-1 month"));
        $day_of_prevmonth = (new DateTime($prevmonth_day)) -> format('t');
        $started_day = $day_of_prevmonth - $get_day ; 
        $started_date_on_month = 1;
    } else {
        $started_date_on_month = $today - $in;
    }
    $style_arr = [];
    foreach($result as $each) {
        $id = $each['style_id'];
        if(empty($style_arr[$id])){
            $style_arr[$id] = [
                'name' => $each['name'],
                'y' => (int)$each['total'],
                'drilldown' => (int)$each['style_id'],
            ];
        } else {
            $style_arr[$id]['y'] += (int)$each['total'];
        }
    }
    $style_arr2 = [];
    foreach($style_arr as $id => $each){
        $style_arr2[$id] = [
           'name' => $each['name'],
           'id' => $id,
        ];
        $style_arr2[$id]['data'] = [];
        if($today < $in) {
            for($i = $started_day; $i <= $day_of_prevmonth; $i ++){
                $key = $i . '-' . $prevmonth;
                $style_arr2[$id]['data'][$key] = [
                    $key,
                    0
                ];
            }
        }
            for($i = $started_date_on_month; $i <= $today; $i ++){
                $key = $i . '-' . $month;
                $style_arr2[$id]['data'][$key] = [
                    $key,
                    0
                ];
            }
        
    }
    foreach($result as $each){
        $id = $each['style_id'];
        $key = $each['dayy'];
        $style_arr2[$id]['data'][$key] = [
            $key,
            (int)$each['total']
        ];
    }
$object = [$style_arr,$style_arr2];
echo json_encode($object);

    ?>