<?php 
     $page = 1;
     if(isset($_GET['page'])){
         $page = $_GET['page'];
         
     }
    
    $array_number_of = mysqli_query($connect,$sql_number_of);
    $numberOf = mysqli_fetch_array($array_number_of);
    $number_of = $numberOf['count(*)'];

    $number_per_page = 7;
    $pages = ceil($number_of / $number_per_page);

    $skip = $number_per_page * ($page - 1 );
?>

