$.get('/get-tourist-acommodation-for-chart', function (data) {
    Highcharts.chart('tourist_acommodation', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Biểu đồ cơ sở lưu trú'
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
                name: 'Khách sạn',
                y: data[1],
                sliced: true,
                selected: true
            }, {
                name: 'Biệt thự du lịch',
                y: data[2],
            }, {
                name: 'Căn hộ du lịch',
                y: data[3],
            }, {
                name: 'Tầu thủy lưu trú du lịch',
                y: data[4],
            }, {
                name: 'Nhà nghỉ du lịch',
                y: data[5],
            }, {
                name: 'Homestay',
                y: data[6],
            }, {
                name: 'Chưa xếp hạng',
                y: data[7],
            }]
        }]
    });
});
