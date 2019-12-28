$.get('/get-tourists-for-chart', function (data) {
    Highcharts.chart('tourist', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Số lượng khách du lịch trong 10 năm gần đây'
        },
        subtitle: {
            text: 'Đơn vị: người'
        },
        xAxis: {
            categories: data['year'],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Đơn vị: (người)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} người</b></td></tr>',
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
            name: 'Khách du lịch nội địa ',
            data: data[1]
        },{
            name: 'Khách du lịch quốc tế',
            data: data[2]
        }]
    });
})
