<?php 
    require_once '../connect.php' ;
    
    $in = $_GET['day'];
    $sql = "SELECT DATE_FORMAT(created_at,'%e-%m') as dayy,sum(total_price) as 'revenue' 
    FROM orders 
    where DATE(created_at) >= CURDATE() - INTERVAL $in day
    GROUP BY DATE_FORMAT(created_at,'%e-%m')";
    $result = mysqli_query($connect,$sql);
    $DayRevenue_arr = [];
    $month = date("m");
    $today = date('d');
    if($today < $in) { 
        $get_day = $in - $today;
        $prevmonth = date("m",strtotime("-1 month"));
        $prevmonth_day = date("Y-m-d",strtotime("-1 month"));
        $day_of_prevmonth = (new DateTime($prevmonth_day)) -> format('t');
        $started_day = $day_of_prevmonth - $get_day ; 
        for($i = $started_day; $i <= $day_of_prevmonth; $i ++){
            $key = $i . '-' . $prevmonth;
            $DayRevenue_arr[$key] = 0;
        }
        $started_date_on_month = 1;
    } else {
        $started_date_on_month = $today - $in;
    }
    
    
    for($i = $started_date_on_month; $i <= $today; $i ++){
        $key = $i . '-' . $month;
        $DayRevenue_arr[$key] = 0;
    }
    foreach($result as $each){
        $DayRevenue_arr[$each['dayy']] = (float)$each['revenue'];
    }
echo json_encode($DayRevenue_arr);

    ?>