<?php 
    class Charts{
        public function diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title){ ?>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['AVERAGE', '<?php echo $title;?>'],
                        ['<?php echo date('m/d',strtotime($monthly)) ?>', <?php echo $totalSum_monthly;?>],
                        ['<?php echo date('m/d',strtotime($weekly)) ?>', <?php echo $totalSum_weekly;?>],
                        ['<?php echo date('m/d',strtotime($fourteenago)) ?>', <?php echo $totalSum_fourteenago;?>],
                        ['<?php echo date('m/d',strtotime($twodaysago)) ?>', <?php echo $totalSum_twodaysago;?>],
                        ['<?php echo date('m/d',strtotime($yesterday)) ?>', <?php echo $totalSum_yesterday;?>],
                        ['<?php echo date('m/d',strtotime($today)) ?>', <?php echo $totalSum_today; ?>]
                    ])

                    var options = {
                        title: '<?php echo $title."-".$type; ?> / HOUR 00-<?php echo $jam;?>',
                        pointSize: 5,
                        legend: {position: 'top', maxLines: 3},
                        hAxis: {
                            title: '<?php echo $title;?>',
                            titleTextStyle: {
                                color: '#333'
                            }
                        },
                        vAxis: {
                            minValue: 0
                        }
                    };
                    var chart = new google.visualization.AreaChart(document.getElementById('<?php echo $nama;?>'));
                    chart.draw(data, options);
                }
            </script>
            <div id="<?php echo $nama; ?>" style="width: 100%; height: 245px;"></div>
        <?php }

        public function diagram_garis_hour_dua_server($conn,$Q1,$jam,$nama,$type,$title,$server1,$server2){ ?>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                                ['HOUR', '<?php echo $server1;?>', '<?php echo $server2;?>'],
                                <?php
                                $stid1 = oci_parse($conn, $Q1);
                                oci_execute($stid1); 
                                while (($row = oci_fetch_array($stid1, OCI_BOTH)) != false) {
                                    $data0 = $row[0];
                                    $data1 = $row[1];
                                    $data2 = $row[2];
                                    
                                    if($row[1] == 0 || $row[1] == "null"){$data1=0;}
                                    if($row[2] == 0 || $row[2] == "null"){$data2=0;}
                                    echo "['".$data0."',".$data1.",".$data2."],";
                                }?>
                            
                            ])

                    var options = {
                        title: '<?php echo $title."-".$type; ?> / HOUR 00-<?php echo $jam;?>',
                        pointSize: 5,
                        legend: {position: 'top', maxLines: 3},
                        hAxis: {
                            title: '<?php echo $title;?>',
                            titleTextStyle: {
                                color: '#333'
                            }
                        },
                        vAxis: {
                            minValue: 0
                        }
                    };
                    var chart = new google.visualization.AreaChart(document.getElementById('<?php echo $nama;?>'));
                    chart.draw(data, options);
                }
            </script>
            <div id="<?php echo $nama; ?>" style="width: 100%; height: 245px;"></div>
        <?php }

        public function diagram_garis_hour_enam_server($conn,$Q1,$jam,$nama,$type,$title){ ?>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                                ['HOUR', 'PAS12', 'PAS13','SLM04','SLM05','SLM06','SLM07'],
                                <?php
                                $stid1 = oci_parse($conn, $Q1);
                                oci_execute($stid1); 
                                while (($row = oci_fetch_array($stid1, OCI_BOTH)) != false) {
                                    $data0 = $row[0];
                                    $data1 = $row[1];
                                    $data2 = $row[2];
                                    $data3 = $row[3];
                                    $data4 = $row[4];
                                    $data5 = $row[5];
                                    $data6 = $row[6];

                                    if($row[1] == 0 || $row[1] == "null"){$data1=0;}
                                    if($row[2] == 0 || $row[2] == "null"){$data2=0;}
                                    if($row[3] == 0 || $row[3] == "null"){$data3=0;}
                                    if($row[4] == 0 || $row[4] == "null"){$data4=0;}
                                    if($row[5] == 0 || $row[5] == "null"){$data5=0;}
                                    if($row[6] == 0 || $row[6] == "null"){$data6=0;}
                                    echo "['".$data0."',".$data1.",".$data2.",".$data3.",".$data4.",".$data5.",".$data6."],";
                                }?>
                            
                            ])

                    var options = {
                        title: '<?php echo $title."-".$type; ?> / HOUR 00-<?php echo $jam;?>',
                        pointSize: 5,
                       
                        legend: {position: 'top', maxLines: 3},
                        hAxis: {
                            title: '<?php echo $title;?>',
                            titleTextStyle: {
                                color: '#333'
                            }
                        },
                        vAxis: {
                            minValue: 0
                        }
                    };
                    var chart = new google.visualization.AreaChart(document.getElementById('<?php echo $nama;?>'));
                    chart.draw(data, options);
                }
            </script>
            <div id="<?php echo $nama; ?>" style="width: 100%; height: 245px;"></div>
        <?php }

    }
?>