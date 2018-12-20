<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Number of late Rate Payments</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>


    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }</style>
    <script src="assets/js/utils.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
</head>

<body>
<div id="container" style="width: 80%;" align="center">
    <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
         class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand"
             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
        </div>
        <div class="chartjs-size-monitor-shrink"
             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
        </div>
    </div>
    <canvas id="canvas" style="display: block; width: 1415px; height: 707px;" width="1415" height="707"
            class="chartjs-render-monitor"></canvas>
</div>


<script>


    async function getmyData(checkCondition) {
        let url = 'http://localhost/vinesi/VickyRevised/invoice/getInvoiceAmountOfMonth';
        // read our JSON
        let response = await fetch(url);
        let out = await response.json();
        if (checkCondition == 1) {
            labels = out.map(a => a.invoiceleaseid);
            return labels;
        } else {
            datac = out.map(b => b.suminvoiceamount);
            return datac;
        }
    }


    var barChartData = {
        labels: getmyData(1),
        datasets: [{
            label: 'Dataset 1',
            backgroundColor: Chart.helpers.color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: getmyData(0),
        }]

    };

    window.onload = function () {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Revenue by lease this month'
                },
            }
        });

    };


</script>

</body>
</html>