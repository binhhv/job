/*$(function () {
    var jdata = {
        "Total": {
            "y": [
            9.39,
            90.35,
            90.36,
            92.69,
            93.02,
            90.32,
            90.6,
            9.09,
            9.5,
            90.69,
            9.6,
            90.69,
            9.53,
            6.92],
                "name": "Total",
                "n": [
            962,
            969,
            999,
            233,
            235,
            968,
            999,
            963,
            989,
            293,
            986,
            293,
            989,
            908]
        },
            "Cat1": {
            "y": [
            6.38,
            6.63,
            90.3,
            9.65,
            90.25,
            8.99,
            92.39,
            99.39,
            9.28,
            99.35,
            99.36,
            93.38,
            8.69,
            8.03],
                "name": "Cat1",
                "n": [
            6,
            6,
            90,
            90,
            90,
            8,
            93,
            93,
            99,
            93,
            93,
            96,
            99,
            9]
        }
    };

    var arr = [];
$.each(jdata, function(key, val) {
    var y = val.y;
    var name = key;
    var customTooltip = val.n;
    arr.push({y: y, customTooltip: customTooltip})
})
	var arrReportRecruitment = <?php echo $arrReportRecruitment;?>;
    var seriesArr = [];
    $.each(arrReportRecruitment, function (key, data) {
        var series = {
            name: key,
            data: []
        };

        $.each(data.y, function (index, value) {
            series.data.push({
                y: value
            });
        });

        $.each(data.n, function (index, value) {
            series.data[index].n = value;
        });
        seriesArr.push(series);
    });

    var options = {
        chart: {
            renderTo: 'chart-recruitment',
            defaultSeriesType: 'line'
        },
        tooltip: {
            formatter: function () {
                return 'Y value is : ' + this.point.y + '<br>' + 'N value is : ' + this.point.n;
            }
        },
        title: {
            text: 'Monthly Rate',
            style: {
                margin: '10px 100px 0 0' // center it
            }
        },
        subtitle: {
            text: 'Source',
            style: {
                margin: '0 100px 0 0' // center it
            }
        },
        xAxis: {

            categories: ['Jan 12', 'Feb 12', 'Mar 12', 'Apr 12', 'May 12', 'Jun 12', 'Jul 12', 'Aug 12', 'Sep 12', 'Oct 12', 'Nov 12', 'Dec 12', 'Jan 13', 'Feb 13']
        },
        yAxis: {
            title: {
                text: 'Rate',
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }],
            min: 0
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            x: 0,
            title: 'Care Setting'
        },
        plotOptions: {},
        credits: {
            enabled: false
        },
        series: seriesArr
    };


    var chart = new Highcharts.Chart(options);

});*/



<script type="text/javascript">
// var chart; // global
// function requestData() {
//     $.ajax({
//         url:'<?php echo base_url()?>'+'test-get-datajson',
//         success: function(point) {
//             var series = chart.series[0],
//                 shift = series.data.length > 20; // shift if the series is
//                                                  // longer than 20

//             // add the point
//             chart.series[0].addPoint(point, true, shift);

//             // call it again after one second
//             setTimeout(requestData, 1000);
//         },
//         cache: false
//     });
// }

    $(function () {
    // Create the chart
    // $('#chart-recruitment').highcharts({
    //     chart: {
    //         type: 'column'
    //     },
    //     title: {
    //         text: 'Browser market shares. January, 2015 to May, 2015'
    //     },
    //     subtitle: {
    //         text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
    //     },
    //     xAxis: {
    //         type: 'category'
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Total percent market share'
    //         }

    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         series: {
    //             borderWidth: 0,
    //             dataLabels: {
    //                 enabled: true,
    //                 //format: '{point.y}%'
    //             }
    //         }
    //     },

    //     tooltip: {
    //         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    //         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
    //     },

    //     series: [{
    //         name: 'Brands',
    //         colorByPoint: true,
    //         data: <?php echo $arrReportRecruitment;?>
    //     }],

    // });


$(document).ready(function() {
//     chart = new Highcharts.Chart({
//         chart: {
//             renderTo: 'chart-recruitment',
//             defaultSeriesType: 'spline',
//             events: {
//                 load: requestData
//             }
//         },
//         title: {
//             text: 'Live random data'
//         },
//         xAxis: {
//             type: 'datetime',
//             tickPixelInterval: 150,
//             maxZoom: 20 * 1000
//         },
//         yAxis: {
//             minPadding: 0.2,
//             maxPadding: 0.2,
//             title: {
//                 text: 'Value',
//                 margin: 80
//             }
//         },
//         series: [{
//             name: 'Random data',
//             data: []
//         }]
//     });
// });
});
</script>
