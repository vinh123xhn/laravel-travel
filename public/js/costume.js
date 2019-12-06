$.get('/get-costume-for-chart', function (data) {
    Highcharts.chart('costume', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Biểu đồ phân loại trang phục'
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
                name: 'Trang phục thường ngày',
                y: data[1],
                sliced: true,
                selected: true
            }, {
                name: 'Trang phục cung đình',
                y: data[2],
            }, {
                name: 'Khác',
                y: data[3],
            }]
        }]
    });
});
