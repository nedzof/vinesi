<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Number of late Rate Payments</title>
    <script async="" src="assets/js/analytics.js"></script>
    <script src="assets/js/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/curl/0.8.9/curl/curl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/curl/0.8.9/curl-for-jQuery/curl.js"></script>

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
    var chartdata = [{"suminvoiceamount": 2333, "invoiceleaseid": 26}, {
        "suminvoiceamount": 2333,
        "invoiceleaseid": 27
    }, {"suminvoiceamount": 2333.00, "invoiceleaseid": 28}, {
        "suminvoiceamount": 20333.00,
        "invoiceleaseid": 29
    }, {"suminvoiceamount": 17333.00, "invoiceleaseid": 30}, {
        "suminvoiceamount": 11333.00,
        "invoiceleaseid": 31
    }, {"suminvoiceamount": 2333.00, "invoiceleaseid": 32}, {
        "suminvoiceamount": 2333.00,
        "invoiceleaseid": 33
    }, {"suminvoiceamount": 2333.00, "invoiceleaseid": 34}, {"suminvoiceamount": 2333.00, "invoiceleaseid": 35}];

    /*$get_data = callAPI('GET', 'http://localhost/vinesi/VickyRevised/invoice/getInvoiceAmountOfMonth', false);
    $response = json_decode($get_data, true);
    $errors = $response['response']['errors'];
    $data = $response['response']['data'][0];*/

    let labels = chartdata.map(e => e.invoiceleaseid);
    let data = chartdata.map(f => f.suminvoiceamount);

    var color = Chart.helpers.color;
    var barChartData = {
        labels: labels,
        datasets: [{
            label: 'Dataset 1',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: data

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
                    text: 'Revenue by tenant this month'
                }
            }
        });

    };

    function callAPI($method, $url, $data) {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }

</script>

</body>
</html>