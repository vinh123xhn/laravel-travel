$.get('/get-art-for-chart', function (data) {
    Highcharts.chart('art', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Biểu đồ phân loại nghệ thuật'
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
                name: 'Chưa phân loại',
                y: data[1],
                sliced: true,
                selected: true
            }, {
                name: 'Nhã nhạc cung đinh',
                y: data[2],
            }, {
                name: 'Tuồng cung đình',
                y: data[3],
            }, {
                name: 'Múa hát cung đình',
                y: data[4],
            }, {
                name: 'Ca Huế',
                y: data[5],
            }, {
                name: 'Dân ca Huế',
                y: data[6],
            }, {
                name: 'Ca kịch Huế',
                y: data[7],
            }, {
                name: 'Dân ca, dân nhạc đồng bào các dân tộc miền núi',
                y: data[8],
            }, {
                name: 'Mỹ thuật - Nghệ thuật',
                y: data[9],
            }, {
                name: 'Kiến trúc',
                y: data[10],
            }, {
                name: 'Âm nhạc mới có sử dụng chất liệu ca Huế',
                y: data[11],
            }, {
                name: 'Khác',
                y: data[12],
            }]
        }]
    });
});
