<?php require '../check_super_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <title>Document</title>
</head>
<body>
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    <div class="main-container"> 
        <div class="main-title">
            <h1>Analytics</h1>
        </div>      
        <div class="dashboard-container">
            <div class="date-export">
                <form action="analytics.php" method="get">
                    <div class="date-period">
                        <span>Khung thời gian</span>
                        <div class="datepick popover">
                            <div class="popover-ref">
                                <div class="date-input">
                                    <div class="label">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>thời gian báo cáo</span>
                                    </div>
                                    <span>Tới 19h:00 hôm nay</span>
                                </div>
                            </div>
                            <div class="date-picker">
                                <div class="date-picker-content">
                                    <select name="date_picker" id="">
                                        <option value="1">hôm qua</option>
                                        <option value="2">trong 7 ngày qua</option>
                                        <option value="3">trong 30 ngày qua</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-type-container">
                        <div class="order-type">
                            <span>loai don hang</span>
                            <select name="order-type" id="">
                                <option value="0">new</option>
                                <option value="1">checked</option>
                                <option value="2">cancelled</option>
                            </select>
                        </div>
                    </div>
                    <button>submit</button>
                </form>
            </div>
        </div>
    </div>   
</body>
</html>