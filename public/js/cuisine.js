$.get('/get-cuisine-for-chart', function (data) {
    Highcharts.chart('cuisine', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Biểu đồ phân loại ẩm thực'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Món ăn',
                y: data[1],
                sliced: true,
                selected: true
            }, {
                name: 'Thức uống',
                y: data[2],
            }]
        }]
    });
});
