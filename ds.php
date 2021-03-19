  <?php
	$username = "SYSTEM";
	$password = "eluondb";
	$host = "192.168.0.9/eluondb1";
    $conn = oci_connect($username,$password,$host) or die('Connection Failed!');
    date_default_timezone_set('Asia/Jakarta');
	$today = date('Ymd', strtotime('0 days'));
	$yesterday = date('Ymd', strtotime('-1 days'));
	$weekly = date('Ymd', strtotime('-7 days'));
    $monthly = date('Ymd', strtotime('-30 days'));
    $jam = date("H", strtotime('-1 hour'));
    $page = $_SERVER['PHP_SELF'];
    $sec = "50000";
    $arr_data1 = array();
    $arr_data2 = array();
    $arr_data3 = array();
    $totalSum_today = 0;
    ?>
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
              ['Hour', 'REVENUE', 'ATTEMPT', 'SUCCESS'],
              <?php 
                    $query3 = "SELECT HR, SUM(REVENUE) as SUMREV, SUM(ATTEMPT) as SUMAT, SUM(SUCCESS) as SUSEC FROM REPORTING r2 WHERE trx IN ('Renewal ON','Renewal OFF') AND CALLING_DATE = '$today' AND HR BETWEEN '00' AND '23' GROUP BY HR ORDER BY HR";
                    $stid = oci_parse($conn, $query3);
                    oci_execute($stid); 
                    while ($row1 = oci_fetch_object($stid)) {
                        echo "['".$row1->HR."',".$row1->SUMREV.",".$row1->SUMAT.",".$row1->SUSEC."],";
                    }?>

          ]);

          var options = {
              title: 'RENEWAL / HOUR 00-21',
              curveType: 'function',
              legend: {
                  position: 'top'
              }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
      }
      </script>
  </head>

  <body>
      <div id="curve_chart" style="width: 900px; height: 500px"></div>

  </body>

  </html>