<?php
   $type = "ATTEMPT";
    // hour
    
    if (isset($_POST['hour'])) {
        $jam = trim($_POST['option_hour']);
        $type = trim($_POST['one_type']);
        
    }
     if (isset($_POST['destroy_session'])) {
        session_destroy();

    }
    
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
?>

<p class="d-flex justify-content-center"><?php echo $type; ?> HOST RENEWAL / HOUR 00-<?php echo $jam?></p>

<form class="form-inline" method="post">
    <div class="form-group mb-2 mr-sm-2"> <label for="option_hour">HOUR : </label></div>
    <div class="form-group mb-2 mr-sm-2">
        <select class="custom-select form-control-sm" name="option_hour" required>
            <?php
                            $query_0 = "SELECT distinct HR FROM RBTRPTN_REPORT_HOURLY order by HR";
                            $stid_0 = oci_parse($conn, $query_0);
                            oci_execute($stid_0);  
                            while ($row = oci_fetch_object($stid_0)) { 
                                if (empty($_POST['option_hour'])) { ?>
            <option value="<?php echo $row->HR; ?>" <?php if($jam == $row->HR){echo "selected";}?>>
                <?php echo $row->HR; ?></option>
            <?php } else { ?>
            <option value="<?php echo $row->HR; ?>" <?php if($_POST['option_hour'] == $row->HR){echo "selected";}?>>
                <?php echo $row->HR; ?></option>
            <?php  }
                         }?>
        </select>
    </div>
    <div class="form-group mb-2 mr-sm-2"><label for="`">Type : </label></div>
    <div class="form-group mb-2 mr-sm-2">
        <select class="custom-select form-control-sm" name="one_type">
            <option value="ATTEMPT" <?php if($type == "ATTEMPT"){echo "selected";}?>>ATTEMPT</option>
            <option value="REVENUE" <?php if($type == "REVENUE"){echo "selected";}?>>REVENUE</option>
            <option value="SUCCESS" <?php if($type == "SUCCESS"){echo "selected";}?>>SUCCESS</option>
        </select>
    </div>
    <div class="form-group mb-2 mr-sm-2">
        <button class="btn-sm fas fa-check" type="submit" name="hour">
        </button>
    </div>
    <div class="form-group mb-2 mr-sm-2">
        <button class="btn-sm fas fa-undo" type="submit" name="destroy_session">
        </button>
    </div>
</form>

<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th>PAS12 (64)</th>
                    <th>PAS13 (65)</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php   
                        // $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry Extend') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
                        $totalSum_host1 = 0;            
                        $totalSum_host2 = 0;                     
                                
                        $Q1 = "SELECT * FROM (
                            SELECT
                                HR,
                                HOST_ID,
                                $type
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                 CALLING_DATE = '$today'
                                AND HR BETWEEN '00' AND '$jam'
                                AND TRX IN ('Renewal ON','Renewal OFF'))
                            PIVOT (SUM($type) FOR HOST_ID IN (64,65,66,67,97,98)) ORDER BY HR";
                        $stid = oci_parse($conn, $Q1);
						oci_execute($stid);
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
                            echo "
                                <td>" . $row[0] . "</td>
                                <td class='table-secondary'>". number_format($row[1]) . "</td>
                                <td>" . number_format($row[2]) . "</td>";
							echo "
												</tr>";
                            $totalSum_host1 = $totalSum_host1 + $row[1];
                            $totalSum_host2 = $totalSum_host2 + $row[2];
                            $totalSum_host3 = $totalSum_host3 + $row[3];
                            $totalSum_host4 = $totalSum_host4 + $row[4];
                            $totalSum_host5 = $totalSum_host5 + $row[5];
                            $totalSum_host6 = $totalSum_host6 + $row[6];
						}
					?>
            </tbody>
            <tfoot class="table-dark">
                <th>Total</th>
                <th><?php echo number_format($totalSum_host1);?></th>
                <th><?php echo number_format($totalSum_host2);?></th>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Grafik</h5>
                    <hr>
                </center>
                 
                <?php
                $nama = "chart_".$type."_HOST RENEWAL";
                $type_cart = "HOST RENEWAL";
                $title = $type;
                $server1 = "PAS12";
                $server2 = "PAS13";
                $charts->diagram_garis_hour_dua_server($conn,$Q1,$jam,$nama,$type_cart,$title,$server1,$server2); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center"><?php echo $type;?> HOST PURCHASE / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th>PAS12 (64)</th>
                    <th>PAS13 (65)</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php       
						// $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Purchase ON','Purchase OFF') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
                        $totalSum_host1 = 0;            
                        $totalSum_host2 = 0;            
                        $totalSum_host3 = 0;            
                        $totalSum_host4 = 0;            
                        $totalSum_host5 = 0;            
                        $totalSum_host6 = 0; 
                        $Q1 = "SELECT * FROM (
                            SELECT
                                HR,
                                HOST_ID,
                                $type
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                 CALLING_DATE = '$today'
                                AND HR BETWEEN '00' AND '$jam'
                                AND TRX IN ('Purchase ON','Purchase OFF'))
                            PIVOT (SUM($type) FOR HOST_ID IN (64,65,66,67,97,98)) ORDER BY HR";
                        $stid = oci_parse($conn, $Q1);
						oci_execute($stid);
                        
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
                            echo "
                                <td>" . $row[0] . "</td>
                                <td class='table-secondary'>". number_format($row[1]) . "</td>
                                <td>" . number_format($row[2]) . "</td>";
							echo "
												</tr>";
                                                $totalSum_host1 = $totalSum_host1 + $row[1];
                                                $totalSum_host2 = $totalSum_host2 + $row[2];
                                                $totalSum_host3 = $totalSum_host3 + $row[3];
                                                $totalSum_host4 = $totalSum_host4 + $row[4];
                                                $totalSum_host5 = $totalSum_host5 + $row[5];
                                                $totalSum_host6 = $totalSum_host6 + $row[6];
                                            }
                                        ?>
            </tbody>
            <tfoot class="table-dark">
                <th>Total</th>
                <th><?php echo number_format($totalSum_host1);?></th>
                <th><?php echo number_format($totalSum_host2);?></th>
                
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Grafik</h5>
                    <hr>
                </center>
                 
                 
                <?php
                $nama = "chart_".$type."_HOST PURCHASE";
                $type_cart = "HOST PURCHASE";
                $title = $type;
                $server1 = "PAS12";
                $server2 = "PAS13";
                $charts->diagram_garis_hour_dua_server($conn,$Q1,$jam,$nama,$type_cart,$title,$server1,$server2); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center"><?php echo $type;?> HOST GP / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th>PAS12 (64)</th>
                    <th>PAS13 (65)</th>
                    <th>SLM04 (66)</th>
                    <th>SLM05 (67)</th>
                    <th>SLM06 (97)</th>
                    <th>SLM07 (98)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                       
							// $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                            // HR BETWEEN '00' AND '$jam' AND trx in ('Grace Periode') GROUP BY CALLING_DATE,RESULT)
                            // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
						$totalSum_host1 = 0;            
                        $totalSum_host2 = 0;            
                        $totalSum_host3 = 0;            
                        $totalSum_host4 = 0;            
                        $totalSum_host5 = 0;            
                        $totalSum_host6 = 0; 
                        $Q1 = "SELECT * FROM (
                            SELECT
                                HR,
                                HOST_ID,
                                $type
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                 CALLING_DATE = '$today'
                                AND HR BETWEEN '00' AND '$jam'
                                AND TRX IN ('Grace Periode'))
                            PIVOT (SUM($type) FOR HOST_ID IN (64,65,66,67,97,98)) ORDER BY HR";
                        $stid = oci_parse($conn, $Q1);
						oci_execute($stid);
                        
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
                            echo "
                                <td>" . $row[0] . "</td>
                                <td class='table-secondary'>". number_format($row[1]) . "</td>
                                <td>" . number_format($row[2]) . "</td>
                                <td class='table-secondary'>". number_format($row[3]) . "</td>
                                <td>" . number_format($row[4]) . "</td>
                                <td class='table-secondary'>". number_format($row[5]) . "</td>
                                <td>" . number_format($row[6]) . "</td>";
							echo "
												</tr>";
                                                $totalSum_host1 = $totalSum_host1 + $row[1];
                                                $totalSum_host2 = $totalSum_host2 + $row[2];
                                                $totalSum_host3 = $totalSum_host3 + $row[3];
                                                $totalSum_host4 = $totalSum_host4 + $row[4];
                                                $totalSum_host5 = $totalSum_host5 + $row[5];
                                                $totalSum_host6 = $totalSum_host6 + $row[6];
                                            }
                                        ?>
            </tbody>
            <tfoot class="table-dark">
                <th>Total</th>
                <th><?php echo number_format($totalSum_host1);?></th>
                <th><?php echo number_format($totalSum_host2);?></th>
                <th><?php echo number_format($totalSum_host3);?></th>
                <th><?php echo number_format($totalSum_host4);?></th>
                <th><?php echo number_format($totalSum_host5);?></th>
                <th><?php echo number_format($totalSum_host6);?></th>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Grafik</h5>
                    <hr>
                </center>
                 
                <?php
                $nama = "chart_".$type."_HOST GP";
                $type_cart = "HOST GP";
                $title = $type;
                $charts->diagram_garis_hour_enam_server($conn,$Q1,$jam,$nama,$type_cart,$title); 
                ?>
                </p>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center"><?php echo $type;?> HOST RETRY / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th>PAS12 (64)</th>
                    <th>PAS13 (65)</th>
                    <th>SLM04 (66)</th>
                    <th>SLM05 (67)</th>
                    <th>SLM06 (97)</th>
                    <th>SLM07 (98)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                       
		                // $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
		                $totalSum_host1 = 0;            
                        $totalSum_host2 = 0;            
                        $totalSum_host3 = 0;            
                        $totalSum_host4 = 0;            
                        $totalSum_host5 = 0;            
                        $totalSum_host6 = 0; 
                        $Q1 = "SELECT * FROM (
                            SELECT
                                HR,
                                HOST_ID,
                                $type
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                 CALLING_DATE = '$today'
                                AND HR BETWEEN '00' AND '$jam'
                                AND TRX IN ('Renewal Retry'))
                            PIVOT (SUM($type) FOR HOST_ID IN (64,65,66,67,97,98)) ORDER BY HR";
                        $stid = oci_parse($conn, $Q1);
						oci_execute($stid);
                        
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
                            echo "
                                <td>" . $row[0] . "</td>
                                <td class='table-secondary'>". number_format($row[1]) . "</td>
                                <td>" . number_format($row[2]) . "</td>
                                <td class='table-secondary'>". number_format($row[3]) . "</td>
                                <td>" . number_format($row[4]) . "</td>
                                <td class='table-secondary'>". number_format($row[5]) . "</td>
                                <td>" . number_format($row[6]) . "</td>";
							echo "
												</tr>";
                                                $totalSum_host1 = $totalSum_host1 + $row[1];
                                                $totalSum_host2 = $totalSum_host2 + $row[2];
                                                $totalSum_host3 = $totalSum_host3 + $row[3];
                                                $totalSum_host4 = $totalSum_host4 + $row[4];
                                                $totalSum_host5 = $totalSum_host5 + $row[5];
                                                $totalSum_host6 = $totalSum_host6 + $row[6];
                                            }
                                        ?>
            </tbody>
            <tfoot class="table-dark">
                <th>Total</th>
                <th><?php echo number_format($totalSum_host1);?></th>
                <th><?php echo number_format($totalSum_host2);?></th>
                <th><?php echo number_format($totalSum_host3);?></th>
                <th><?php echo number_format($totalSum_host4);?></th>
                <th><?php echo number_format($totalSum_host5);?></th>
                <th><?php echo number_format($totalSum_host6);?></th>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Grafik</h5>
                    <hr>
                </center>
                 
                <?php
                $nama = "chart_".$type."_HOST RETRY";
                $type_cart = "HOST RETRY";
                $title = $type;
                $charts->diagram_garis_hour_enam_server($conn,$Q1,$jam,$nama,$type_cart,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center"><?php echo $type;?> HOST ENHANCE / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th>PAS12 (64)</th>
                    <th>PAS13 (65)</th>
                    <th>SLM04 (66)</th>
                    <th>SLM05 (67)</th>
                    <th>SLM06 (97)</th>
                    <th>SLM07 (98)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   
					// $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                    // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry Enhance') GROUP BY CALLING_DATE,RESULT)
                    // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
					$totalSum_host1 = 0;            
                        $totalSum_host2 = 0;            
                        $totalSum_host3 = 0;            
                        $totalSum_host4 = 0;            
                        $totalSum_host5 = 0;            
                        $totalSum_host6 = 0; 
                        $Q1 = "SELECT * FROM (
                            SELECT
                                HR,
                                HOST_ID,
                                $type
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                 CALLING_DATE = '$today'
                                AND HR BETWEEN '00' AND '$jam'
                                AND TRX IN ('Renewal Retry Enhance'))
                            PIVOT (SUM($type) FOR HOST_ID IN (64,65,66,67,97,98)) ORDER BY HR";
                        $stid = oci_parse($conn, $Q1);
						oci_execute($stid);
                        
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
                            echo "
                                <td>" . $row[0] . "</td>
                                <td class='table-secondary'>". number_format($row[1]) . "</td>
                                <td>" . number_format($row[2]) . "</td>
                                <td class='table-secondary'>". number_format($row[3]) . "</td>
                                <td>" . number_format($row[4]) . "</td>
                                <td class='table-secondary'>". number_format($row[5]) . "</td>
                                <td>" . number_format($row[6]) . "</td>";
							echo "
												</tr>";
                                                $totalSum_host1 = $totalSum_host1 + $row[1];
                                                $totalSum_host2 = $totalSum_host2 + $row[2];
                                                $totalSum_host3 = $totalSum_host3 + $row[3];
                                                $totalSum_host4 = $totalSum_host4 + $row[4];
                                                $totalSum_host5 = $totalSum_host5 + $row[5];
                                                $totalSum_host6 = $totalSum_host6 + $row[6];
                                            }
                                        ?>
            </tbody>
            <tfoot class="table-dark">
                <th>Total</th>
                <th><?php echo number_format($totalSum_host1);?></th>
                <th><?php echo number_format($totalSum_host2);?></th>
                <th><?php echo number_format($totalSum_host3);?></th>
                <th><?php echo number_format($totalSum_host4);?></th>
                <th><?php echo number_format($totalSum_host5);?></th>
                <th><?php echo number_format($totalSum_host6);?></th>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Grafik</h5>
                    <hr>
                </center>
                 
                <?php
                $nama = "chart_".$type."_HOST ENHANCE";
                $type_cart = "HOST ENHANCE";
                $title = $type;
                $charts->diagram_garis_hour_enam_server($conn,$Q1,$jam,$nama,$type_cart,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center"><?php echo $type;?> HOST DYNAMIC / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th>PAS12 (64)</th>
                    <th>PAS13 (65)</th>
                    <th>SLM04 (66)</th>
                    <th>SLM05 (67)</th>
                    <th>SLM06 (97)</th>
                    <th>SLM07 (98)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        
                        // $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry Dynamic') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
						$totalSum_host1 = 0;            
                        $totalSum_host2 = 0;            
                        $totalSum_host3 = 0;            
                        $totalSum_host4 = 0;            
                        $totalSum_host5 = 0;            
                        $totalSum_host6 = 0; 
                        $Q1 = "SELECT * FROM (
                            SELECT
                                HR,
                                HOST_ID,
                                $type
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                 CALLING_DATE = '$today'
                                AND HR BETWEEN '00' AND '$jam'
                                AND TRX IN ('Renewal Retry Dynamic'))
                            PIVOT (SUM($type) FOR HOST_ID IN (64,65,66,67,97,98)) ORDER BY HR";
                        $stid = oci_parse($conn, $Q1);
						oci_execute($stid);
                        
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
                            echo "
                                <td>" . $row[0] . "</td>
                                <td class='table-secondary'>". number_format($row[1]) . "</td>
                                <td>" . number_format($row[2]) . "</td>
                                <td class='table-secondary'>". number_format($row[3]) . "</td>
                                <td>" . number_format($row[4]) . "</td>
                                <td class='table-secondary'>". number_format($row[5]) . "</td>
                                <td>" . number_format($row[6]) . "</td>";
							echo "
												</tr>";
                                                $totalSum_host1 = $totalSum_host1 + $row[1];
                                                $totalSum_host2 = $totalSum_host2 + $row[2];
                                                $totalSum_host3 = $totalSum_host3 + $row[3];
                                                $totalSum_host4 = $totalSum_host4 + $row[4];
                                                $totalSum_host5 = $totalSum_host5 + $row[5];
                                                $totalSum_host6 = $totalSum_host6 + $row[6];
                                            }
                                        ?>
            </tbody>
            <tfoot class="table-dark">
                <th>Total</th>
                <th><?php echo number_format($totalSum_host1);?></th>
                <th><?php echo number_format($totalSum_host2);?></th>
                <th><?php echo number_format($totalSum_host3);?></th>
                <th><?php echo number_format($totalSum_host4);?></th>
                <th><?php echo number_format($totalSum_host5);?></th>
                <th><?php echo number_format($totalSum_host6);?></th>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Grafik</h5>
                    <hr>
                </center>
                 
                <?php
                $nama = "chart_".$type."_HOST DYNAMIC";
                $type_cart = "HOST DYNAMIC";
                $title = $type;
                $charts->diagram_garis_hour_enam_server($conn,$Q1,$jam,$nama,$type_cart,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center"><?php echo $type;?> HOST EXTEND / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th>PAS12 (64)</th>
                    <th>PAS13 (65)</th>
                    <th>SLM04 (66)</th>
                    <th>SLM05 (67)</th>
                    <th>SLM06 (97)</th>
                    <th>SLM07 (98)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        
                        // $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry Extend') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
						$totalSum_host1 = 0;            
                        $totalSum_host2 = 0;            
                        $totalSum_host3 = 0;            
                        $totalSum_host4 = 0;            
                        $totalSum_host5 = 0;            
                        $totalSum_host6 = 0; 
                        $Q1 = "SELECT * FROM (
                            SELECT
                                HR,
                                HOST_ID,
                                $type
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                 CALLING_DATE = '$today'
                                AND HR BETWEEN '00' AND '$jam'
                                AND TRX IN ('Renewal Retry Extend'))
                            PIVOT (SUM($type) FOR HOST_ID IN (64,65,66,67,97,98)) ORDER BY HR";
                        $stid = oci_parse($conn, $Q1);
						oci_execute($stid);
                        
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
                            echo "
                                <td>" . $row[0] . "</td>
                                <td class='table-secondary'>". number_format($row[1]) . "</td>
                                <td>" . number_format($row[2]) . "</td>
                                <td class='table-secondary'>". number_format($row[3]) . "</td>
                                <td>" . number_format($row[4]) . "</td>
                                <td class='table-secondary'>". number_format($row[5]) . "</td>
                                <td>" . number_format($row[6]) . "</td>";
							echo "
												</tr>";
                                                $totalSum_host1 = $totalSum_host1 + $row[1];
                                                $totalSum_host2 = $totalSum_host2 + $row[2];
                                                $totalSum_host3 = $totalSum_host3 + $row[3];
                                                $totalSum_host4 = $totalSum_host4 + $row[4];
                                                $totalSum_host5 = $totalSum_host5 + $row[5];
                                                $totalSum_host6 = $totalSum_host6 + $row[6];
                                            }
                                        ?>
            </tbody>
            <tfoot class="table-dark">
                <th>Total</th>
                <th><?php echo number_format($totalSum_host1);?></th>
                <th><?php echo number_format($totalSum_host2);?></th>
                <th><?php echo number_format($totalSum_host3);?></th>
                <th><?php echo number_format($totalSum_host4);?></th>
                <th><?php echo number_format($totalSum_host5);?></th>
                <th><?php echo number_format($totalSum_host6);?></th>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Grafik</h5>
                    <hr>
                </center>
               
                <?php
                $nama = "chart_".$type."_HOST EXTEND";
                $type_cart = "HOST EXTEND";
                $title = $type;
                $charts->diagram_garis_hour_enam_server($conn,$Q1,$jam,$nama,$type_cart,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center"><?php echo $type;?> HOST PLAN / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th>SLM05 (67)</th>
                    <th>SLM06 (97)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        
                        // $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry Extend') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
						$totalSum_host1 = 0;            
                        $totalSum_host2 = 0;
                        $Q1 = "SELECT * FROM (
                            SELECT
                                HR,
                                HOST_ID,
                                $type
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                 CALLING_DATE = '$today'
                                AND HR BETWEEN '00' AND '$jam'
                                AND TRX IN ('60','80'))
                            PIVOT (SUM($type) FOR HOST_ID IN (66,67)) ORDER BY HR";
                        $stid = oci_parse($conn, $Q1);
						oci_execute($stid);
                        
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
                            echo "
                                <td>" . $row[0] . "</td>
                                <td class='table-secondary'>". number_format($row[1]) . "</td>
                                <td>" . number_format($row[2]) . "</td>";
							echo "
												</tr>";
                                                $totalSum_host1 = $totalSum_host1 + $row[1];
                                                $totalSum_host2 = $totalSum_host2 + $row[2];
                                            }
                                        ?>
            </tbody>
            <tfoot class="table-dark">
                <th>Total</th>
                <th><?php echo number_format($totalSum_host1);?></th>
                <th><?php echo number_format($totalSum_host2);?></th>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Grafik</h5>
                    <hr>
                </center>
                 
                <?php
                $nama = "chart_".$type."_HOST PLAN";
                $type_cart = "HOST PLAN";
                $title = $type;
                $server1 = "SLM05";
                $server2 = "SLM06";
                $charts->diagram_garis_hour_dua_server($conn,$Q1,$jam,$nama,$type_cart,$title,$server1,$server2); 
                ?>
            </div>
        </div>
    </div>
</div>
<br>