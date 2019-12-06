$.get('/get-festival-for-chart', function (data) {
    Highcharts.chart('festival', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Biều đồ phân loại lễ hội'
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
                name: 'Dân gian',
                y: data[1],
                sliced: true,
                selected: true
            }, {
                name: 'Cung đình',
                y: data[2],
            }, {
                name: 'Lịch sử, cách mạng',
                y: data[3],
            }, {
                name: 'Tôn giáo, tín ngưởng',
                y: data[4],
            }, {
                name: 'Văn hóa, thể thao, du lịch (lễ hội mới)',
                y: data[5],
            }, {
                name: 'Khác',
                y: data[6],
            }]
        }]
    });
});
