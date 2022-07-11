
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../img/logo.jpg" enctype="multipart/form-data">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    
    <div class="Nav-container">
        <?php include '../menu.php'?>
    </div>
    <div class="main-container"> 
        <div class="main-title">
            <h1>Admin display</h1>
        </div>
        <div class="analytics">
            <div >
                <button class="btn-get-day" data-day='7'>7 Days</button>
                <button class="btn-get-day" data-day='30'>30 Days</button>
                <button class="btn-get-month" data-month='12'>Month</button>
            </div>
            <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
                Chart showing data loaded dynamically. The individual data points can
                be clicked to display more information.
            </p>
            </figure>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
<script src="../main.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    $(document).ready(function () {
        $('.btn-get-day').click(function() { 
            let day = $(this).data('day');
            $.ajax({
                type: "GET",
                url: "revenue_day.php",
                data: {day},
                dataType: "json",
                success: function (response) {
                    const arrX = Object.keys(response);
                    const arrY = Object.values(response);
                    Highcharts.chart('container', {

                        title: {
                            text: 'Revenue Statistics '
                        },

                        subtitle: {
                            text: 'Source: Knowhere'
                        },

                        yAxis: {
                            title: {
                                text: 'Values (VND)'
                            }
                        },

                        xAxis: {
                            categories: arrX

                        },

                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },

                        plotOptions: {
                            series: {
                                label: {
                                 connectorAllowed: false
                                }
                            }   
                        },

                        series: [{
                            name: 'Day',
                            data: arrY
                        
                        }],

                        responsive: {
                            rules: [{
                                condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                            }]
                        }

                    });
                                        
                }
            });
        });
        $('.btn-get-month').click(function() { 
            $.ajax({
                type: "GET",
                url: "revenue_month.php",
                data: {},
                dataType: "json",
                success: function (response) {
                    const arrX = Object.keys(response);
                    const arrY = Object.values(response);
                    Highcharts.chart('container', {

                        title: {
                            text: 'Revenue Statistics (Month) '
                        },

                        subtitle: {
                            text: 'Source: Knowhere'
                        },

                        yAxis: {
                            title: {
                                text: 'Values (VND)'
                            }
                        },

                        xAxis: {
                            categories: arrX

                        },

                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },

                        plotOptions: {
                            series: {
                                label: {
                                 connectorAllowed: false
                                }
                            }   
                        },

                        series: [{
                            name: 'Month',
                            data: arrY
                        
                        }],

                        responsive: {
                            rules: [{
                                condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                            }]
                        }

                    });
                                        
                }
            });
        });     
    });
    
</script>
</body>
</html>