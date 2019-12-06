$.get('/get-crafts-for-chart', function (data) {
    Highcharts.chart('crafts', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Biểu đồ phân loại nghề thủ công'
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
                name: 'Chưa xác định',
                y: data[1],
                sliced: true,
                selected: true
            }, {
                name: 'Sơ chế và chế biến nông lâm, thủy hải sản, thực phẩm',
                y: data[2],
            }, {
                name: 'Sản xuất hàng thủ công mỹ nghệ',
                y: data[3],
            }, {
                name: 'Sản xuất cơ khí nhỏ, đúc kim loại, sản xuất đồ ngũ kim, dụng cụ và công cụ phục vụ sản xuất và tiêu dùng',
                y: data[4],
            }, {
                name: 'Khác',
                y: data[5],
            }]
        }]
    });
});
