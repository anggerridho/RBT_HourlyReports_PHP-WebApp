<!-- <?php
	$username = "RBTRPTN";
    $password = "RBTRPTN";
    $host = "192.168.0.32:1522/RBTRPTN";
    $conn = oci_connect($username,$password,$host) or die('Connection Failed!');
    date_default_timezone_set('Asia/Jakarta');
	$today = date('Ymd', strtotime('0 days'));
	$yesterday = date('Ymd', strtotime('-1 days'));
	$weekly = date('Ymd', strtotime('-7 days'));
    $monthly = date('Ymd', strtotime('-30 days'));
    $jam = date("H", strtotime('-1 hour'));
    $page = $_SERVER['PHP_SELF'];
    $sec = "50000";
?> -->
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Sales', 'Expenses'],
            ['2004', 1000, 400],
            ['2005', 1170, 460],
            ['2006', 660, 1120],
            ['2007', 1030, 540]
        ]);

        var options = {
            title: 'Company Performance',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    <!-- <?php
		$stid = oci_parse($conn, "SELECT * FROM (SELECT calling_date,channel,attempt FROM RBTRPTN_REPORT_HOURLY WHERE hr BETWEEN '00' AND '$jam')
					pivot (sum (ATTEMPT) FOR CALLING_DATE IN ($today)) ORDER BY CHANNEL");
		oci_execute($stid);
		$totalSum_monthly = 0;
		$totalSum_weekly = 0;
		$totalSum_yesterday = 0;
		$totalSum_today = 0;
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
		echo "['".$row[0]."'],[".number_format ($row[1])."],<br>" ;
		
		$totalSum_monthly = $totalSum_monthly + $row[1];
		$totalSum_weekly = $totalSum_weekly + $row[2];
		$totalSum_yesterday = $totalSum_yesterday + $row[3];
		$totalSum_today = $totalSum_today + $row[4];																	

		}
	?> -->
</body>

</html>