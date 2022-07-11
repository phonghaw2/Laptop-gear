
    $(document).ready(function () {
        $('.btn-get-day').click(function() { 
            let day = $(this).data('day');
            $.ajax({
                type: "GET",
                url: "product_statistics.php",
                data: {day},
                dataType: "json",
                success: function (response) {
                    const Style_arr = Object.values(response[0]);
                    const arrDetail = [];
                    Object.values(response[1]).forEach((each) => {
                        each.data = Object.values(each.data);
                        arrDetail.push(each);
                    })
// Create the chart
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            align: 'left',
                            text: 'Products statistics'
                        },
                        accessibility: {
                            announceNewData: {
                                enabled: true
                            }
                        },
                        xAxis: {
                            type: 'category'
                        },
                        yAxis: {
                            title: {
                                text: 'Quantity'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:f}'
                                }
                            }
                        },
                
                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>total : {point.y:f}</b> <br/>'
                        },
                
                        series: [
                            {
                              name: "Product",
                              colorByPoint: true,
                              data: Style_arr
                            }
                        ]
                        ,
                        drilldown: {
                            breadcrumbs: {
                                position: {
                                    align: 'right'
                                }
                            },
                            series: arrDetail,
                        }
                });
            }
        });
    });
          
});