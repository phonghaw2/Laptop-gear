<?php 
require_once '../connect.php';
$description = '';
$manufacturer_id = 9;
$style_id = 4 ;
$content = file_get_contents('https://gearvn.com/collections/tai-nghe-asus');
preg_match_all('#<div class="col-sm-4 col-xs-12 padding-none col-fix20".*?>(.+?)(.+?) </span>#si',$content,$matches);
if(!empty($matches[0])){
    require_once '../connect.php';
    foreach (array_slice($matches[0],0,8) as $item ){
        preg_match('#<h2 class="product-row-name">(.+?)</h2>#', $item , $title_arr);
        $name = $title_arr[1];
        preg_match('#<span class="product-row-sale">(.+?)₫#', $item , $price_arr);
        $price = str_replace(",","",$price_arr[1]) ;  
        preg_match('#<img class="product-row-thumbnail" src="(.+?)"(.+?)>#', $item , $img_arr);
        $image = $img_arr[1] ;
        $pic = file_get_contents("http:$image");
        $my_save_dir = '../admin-vip/products/photos/';
        $file_name = $name . '.' . 'jpg';
        $complete = $my_save_dir . $file_name;
        file_put_contents($complete,$pic);

        $sql = "insert into products(name,price,image,description,manufacturer_id,style_id)
        values('$name','$price','$file_name','$description','$manufacturer_id','$style_id')";

        mysqli_query($connect,$sql);

        $pic = '';
        


        
        
        
    };
    
}   
?> 

   

      