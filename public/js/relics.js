$.get('/get-relics-for-chart', function (data) {
    Highcharts.chart('relics', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Số lượng di tích được được công nhận trong 10 năm gần đây'
        },
        subtitle: {
            text: 'Đơn vị: di tích'
        },
        xAxis: {
            categories: data['year'],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Đơn vị: (di tích)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} di tích</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Công nhận',
            data: data['relics']
        }]
    });
})
