<?php 
    require_once '../connect.php' ;
            $sql = "SELECT DATE_FORMAT(created_at,'%M') as getmonth,sum(total_price) as 'revenue' 
            FROM orders 
            GROUP BY DATE_FORMAT(created_at,'%M')";
            $result = mysqli_query($connect,$sql);
            $MonthRevenue_arr = []; 
            $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'); 
            for($i = 0; $i < 12; $i ++){  
                $key = $month[$i] ;
                $MonthRevenue_arr[$key] = 0;
            }
            foreach($result as $each){
                $MonthRevenue_arr[$each['getmonth']] = (float)$each['revenue'];
            }
        echo json_encode($MonthRevenue_arr);
    

    

    ?>