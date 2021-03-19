<?php
    // mounthly
    if (isset( $_SESSION['mounthly'])) {
        $monthly = $_SESSION['mounthly'];
    }else {
        if (isset($_POST['search_monthly'])) {
           $monthly_0 = $monthly;
           $monthly = date ('Ymd', strtotime($_POST['monthly']));
           $_SESSION['mounthly'] = $monthly;
           if ($monthly == $fourteenago || $monthly == $weekly || $monthly == $twodaysago || $monthly == $yesterday || $monthly == $today) {
                echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
                $monthly = $monthly_0;
            }
        }
    }
    // fourteenago
    if (isset($_SESSION['fourteenago'])) {
        $fourteenago = $_SESSION['fourteenago'];
    }else {
        if (isset($_POST['search_fourteenago'])) {
            $fourteenago_0 = $fourteenago;
            $fourteenago = date ('Ymd', strtotime($_POST['fourteenago']));
            $_SESSION['fourteenago'] = $fourteenago;
            if ($fourteenago == $monthly || $fourteenago == $weekly || $fourteenago == $twodaysago || $fourteenago == $yesterday || $fourteenago == $today ) {
                echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
                $fourteenago = $fourteenago_0;
            }
        }
     }
     //weekly
     if (isset( $_SESSION['weekly'])) {
        $weekly = $_SESSION['weekly'];
    }else {
        if (isset($_POST['search_weekly'])) {
            $weekly_0 = $weekly;
            $weekly = date ('Ymd', strtotime($_POST['weekly']));
            $_SESSION['weekly'] = $weekly;
            if ($weekly == $monthly || $weekly == $fourteenago || $weekly == $twodaysago || $weekly == $yesterday || $weekly == $today ) {
                echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
                $weekly = $weekly_0;
            }
        }
     }
     // twodaysago
     if (isset($_SESSION['twodaysago'])) {
        $twodaysago=$_SESSION['twodaysago'];
    }else { 
        if (isset($_POST['search_twodaysago'])) {
            $twodaysago_0 = $twodaysago;
            $twodaysago = date ('Ymd', strtotime($_POST['twodaysago']));
            $_SESSION['twodaysago'] = $twodaysago;
            if ($twodaysago == $monthly || $twodaysago == $fourteenago || $twodaysago == $weekly || $twodaysago == $yesterday || $twodaysago == $today ) {
                echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
                $twodaysago = $twodaysago_0;
            }
        }
     }
     //yseterday
     if (isset($_SESSION['yesterday'])) {
         $yesterday =$_SESSION['yesterday'];
     } else {
         if (isset($_POST['search_yesterday'])) {
             $yesterday_0 = $yesterday;
             $yesterday = date ('Ymd', strtotime($_POST['yesterday']));
             $_SESSION['yesterday'] = $yesterday;
             if ($yesterday == $monthly || $yesterday == $fourteenago || $yesterday == $weekly || $yesterday == $twodaysago || $yesterday == $today ) {
                 echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
                 $yesterday = $yesterday_0;
                }
            }
        }
     // today
     if (isset($_SESSION['today'])) {
         $today = $_SESSION['today'];
     }else {
         if (isset($_POST['search_today'])) {
             $today_0 = $today;
             $today = date ('Ymd', strtotime($_POST['today']));
             $_SESSION['today'] = $today;
             if ($today == $monthly || $today == $fourteenago || $today == $weekly || $today == $twodaysago || $today == $yesterday ) {
                 echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
                 $today = $today_0;
                }
            }
        }
    // hour
    
    if (isset($_POST['hour'])) {
        $jam = trim($_POST['option_hour']);
    }
     if (isset($_POST['destroy_session'])) {
        session_destroy();

    }
    
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
?>

<p class="d-flex justify-content-center">ERROR CODE CDE 502 RENEWAL / HOUR 00-<?php echo $jam?></p>
<table>
    <tr>
        <td>Hour</td>
        <td>:</td>
        <td>
            <form class="form-inline" method="post">
                <div class="form-group mb-2 mr-sm-2"></div>
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
                        <option value="<?php echo $row->HR; ?>"
                            <?php if($_POST['option_hour'] == $row->HR){echo "selected";}?>>
                            <?php echo $row->HR; ?></option>
                        <?php  }
                         }?>
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
        </td>
    </tr>
</table>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>CODE</th>
                    <th>
                        <div class="btn-group btn-group-sm dropright " role="group">
                            <button class="btn btn-secondary btn-group-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="monthly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_monthly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $monthly; 
                                echo date ('Y/m/d', strtotime($monthly)); ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="fourteenago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fourteenago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fourteenago; 
                                echo date ('Y/m/d', strtotime($fourteenago));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="weekly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_weekly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $weekly; 
                                echo date ('Y/m/d', strtotime($weekly));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="twodaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_twodaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $twodaysago; 
                                echo date ('Y/m/d', strtotime($twodaysago));
                                ?>
                    </th>
                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="yesterday"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_yesterday">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $yesterday; 
                                echo date ('Y/m/d', strtotime($yesterday));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="today"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_today">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $today; 
                                echo date ('Y/m/d', strtotime($today));
                                ?>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                        $Q1 = "SELECT * FROM ( SELECT CALLING_DATE, CHARGE_RESULT_CODE,
                                CASE
                                    WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                                    WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                                    WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                                    WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                                    WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                                    WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                                    WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                                    WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                                    WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                                    WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                                    WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                                    WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                                    WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                                    WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                                END AS MEANOFCODE,
                                SUM(SUCCESS + FAIL) AS COUNT
                            FROM
                                RBTRPTN_REPORT_HOURLY
                            WHERE
                                HR BETWEEN '00' AND '$jam'
                                AND trx IN ('Renewal ON','Renewal OFF')
                                AND CHARGE_RESULT_CODE NOT IN ('AS',
                                'SP')
                            GROUP BY
                                CALLING_DATE,
                                CHARGE_RESULT_CODE,
                            CASE
                                    WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                                    WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                                    WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                                    WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                                    WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                                    WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                                    WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                                    WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                                    WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                                    WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                                    WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                                    WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                                    WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                                    WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                                END) PIVOT (SUM(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today))
                            ORDER BY CHARGE_RESULT_CODE";
                        $stid = oci_parse($conn, $Q1);
						// $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal ON','Renewal OFF') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
						oci_execute($stid);
                        $totalSum_monthly = 0;
                        $totalSum_fourteenago = 0;
                        $totalSum_weekly = 0;
                        $totalSum_twodaysago = 0;
						$totalSum_yesterday = 0;
						$totalSum_today = 0;
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
								<tr>";
							echo "
                                <td><a href='#Renewal' data-toggle='tooltip' title='".$row[1]."'><div id='Renewal'>" . $row[0] . "</div></a></td>
                                <td class='table-secondary'>" . number_format ($row[2]) . "</td>
                                <td>" . number_format ($row[3]) . "</td>
                                <td class='table-secondary'>" . number_format ($row[4]) . "</td>
                                <td>" . number_format ($row[5]) . "</td>
                                <td class='table-secondary'>" . number_format ($row[6]) . "</td>
                                <td>" . number_format ($row[7]) . "</td>";
							echo "
							    </tr>";
                                $totalSum_monthly = $totalSum_monthly + $row[2];
                                $totalSum_fourteenago = $totalSum_fourteenago + $row[3];
                                $totalSum_weekly = $totalSum_weekly + $row[4];
                                $totalSum_twodaysago = $totalSum_twodaysago + $row[5];
							    $totalSum_yesterday = $totalSum_yesterday + $row[6];
							    $totalSum_today = $totalSum_today + $row[7];
						}
					?>
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <th>Total</th>
                    <th>
                        <?php echo number_format ($totalSum_monthly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fourteenago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_weekly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_twodaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_yesterday);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_today);
                                            ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Compare</h5>
                    <hr>
                </center>
                <p class="card-text">
                <table>
                    <tr>
                        <td><?php echo $today."-". $monthly; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_monthly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fourteenago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_fourteenago);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $weekly; ?></td>
                        <td>:</td>
                        <td> <?php echo number_format ($totalSum_today - $totalSum_weekly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $twodaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_twodaysago); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $yesterday; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_yesterday); ?></td>
                    </tr>
                </table>
                </p>
                <hr>
                <?php 
                $nama = "chart_ERROR_CODE_502_RENEWAL_0";
                $type = "RENEWAL";
                $title = "ERROR_CODE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center">ERROR CODE CDE 502 PURCHASE / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>CODE</th>
                    <th>
                        <div class="btn-group btn-group-sm dropright " role="group">
                            <button class="btn btn-secondary btn-group-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="monthly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_monthly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $monthly; 
                                echo date ('Y/m/d', strtotime($monthly)); ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="fourteenago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fourteenago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fourteenago; 
                                echo date ('Y/m/d', strtotime($fourteenago));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="weekly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_weekly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $weekly; 
                                echo date ('Y/m/d', strtotime($weekly));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="twodaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_twodaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $twodaysago; 
                                echo date ('Y/m/d', strtotime($twodaysago));
                                ?>
                    </th>
                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="yesterday"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_yesterday">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $yesterday; 
                                echo date ('Y/m/d', strtotime($yesterday));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="today"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_today">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $today; 
                                echo date ('Y/m/d', strtotime($today));
                                ?>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                            $Q1 = "SELECT * FROM ( SELECT CALLING_DATE, CHARGE_RESULT_CODE,
                               CASE
                                   WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                                   WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                                   WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                                   WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                                   WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                                   WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                                   WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                                   WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                                   WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                                   WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                                   WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                                   WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                                   WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                                   WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                               END AS MEANOFCODE,
                               SUM(SUCCESS + FAIL) AS COUNT
                           FROM
                               RBTRPTN_REPORT_HOURLY
                           WHERE
                               HR BETWEEN '00' AND '$jam'
                               AND trx IN ('Purchase ON','Purchase OFF')
                               AND CHARGE_RESULT_CODE NOT IN ('AS',
                               'SP')
                           GROUP BY
                               CALLING_DATE,
                               CHARGE_RESULT_CODE,
                           CASE
                                   WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                                   WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                                   WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                                   WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                                   WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                                   WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                                   WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                                   WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                                   WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                                   WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                                   WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                                   WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                                   WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                                   WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                               END) PIVOT (SUM(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today))
                           ORDER BY CHARGE_RESULT_CODE";
                       $stid = oci_parse($conn, $Q1);
						// $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Purchase ON','Purchase OFF') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
						oci_execute($stid);
                        $totalSum_monthly = 0;
                        $totalSum_fourteenago = 0;
                        $totalSum_weekly = 0;
                        $totalSum_twodaysago = 0;
						$totalSum_yesterday = 0;
						$totalSum_today = 0;
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
								<tr>";
							echo "
                                <td><a href='#purchase' data-toggle='tooltip' title='".$row[1]."'><div id='purchase'>" . $row[0] . "</div></a></td>
                                <td class='table-secondary'>" . number_format ($row[2]) . "</td>
                                <td>" . number_format ($row[3]) . "</td>
                                <td class='table-secondary'>" . number_format ($row[4]) . "</td>
                                <td>" . number_format ($row[5]) . "</td>
                                <td class='table-secondary'>" . number_format ($row[6]) . "</td>
                                <td>" . number_format ($row[7]) . "</td>";
							echo "
								</tr>";
                                $totalSum_monthly = $totalSum_monthly + $row[2];
                                $totalSum_fourteenago = $totalSum_fourteenago + $row[3];
                                $totalSum_weekly = $totalSum_weekly + $row[4];
                                $totalSum_twodaysago = $totalSum_twodaysago + $row[5];
								$totalSum_yesterday = $totalSum_yesterday + $row[6];
							    $totalSum_today = $totalSum_today + $row[7];
						}
					?>
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <th>Total</th>
                    <th>
                        <?php echo number_format ($totalSum_monthly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fourteenago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_weekly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_twodaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_yesterday);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_today);
                                            ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Compare</h5>
                    <hr>
                </center>
                <p class="card-text">
                <p class="card-text">
                <table>
                    <tr>
                        <td><?php echo $today."-". $monthly; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_monthly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fourteenago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_fourteenago);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $weekly; ?></td>
                        <td>:</td>
                        <td> <?php echo number_format ($totalSum_today - $totalSum_weekly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $twodaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_twodaysago); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $yesterday; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_yesterday); ?></td>
                    </tr>
                </table>
                </p>
                </p>
                <hr>
                <?php 
                $nama = "chart_ERROR_CODE_502_PURCHASE";
                $type = "PURCHASE";
                $title = "ERROR_CODE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center">ERROR CODE CDE 502 GP / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>CODE</th>
                    <th>
                        <div class="btn-group btn-group-sm dropright " role="group">
                            <button class="btn btn-secondary btn-group-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="monthly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_monthly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $monthly; 
                                echo date ('Y/m/d', strtotime($monthly)); ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="fourteenago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fourteenago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fourteenago; 
                                echo date ('Y/m/d', strtotime($fourteenago));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="weekly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_weekly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $weekly; 
                                echo date ('Y/m/d', strtotime($weekly));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="twodaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_twodaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $twodaysago; 
                                echo date ('Y/m/d', strtotime($twodaysago));
                                ?>
                    </th>
                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="yesterday"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_yesterday">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $yesterday; 
                                echo date ('Y/m/d', strtotime($yesterday));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="today"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_today">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $today; 
                                echo date ('Y/m/d', strtotime($today));
                                ?>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                        $Q1 = "SELECT * FROM ( SELECT CALLING_DATE, CHARGE_RESULT_CODE,
                        CASE
                            WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                            WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                            WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                            WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                            WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                            WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                            WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                            WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                            WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                            WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                            WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                            WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                            WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                            WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                        END AS MEANOFCODE,
                        SUM(SUCCESS + FAIL) AS COUNT
                    FROM
                        RBTRPTN_REPORT_HOURLY
                    WHERE
                        HR BETWEEN '00' AND '$jam'
                        AND trx IN ('Grace Periode')
                        AND CHARGE_RESULT_CODE NOT IN ('AS',
                        'SP')
                    GROUP BY
                        CALLING_DATE,
                        CHARGE_RESULT_CODE,
                    CASE
                            WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                            WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                            WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                            WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                            WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                            WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                            WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                            WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                            WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                            WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                            WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                            WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                            WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                            WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                        END) PIVOT (SUM(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today))
                    ORDER BY CHARGE_RESULT_CODE";
                $stid = oci_parse($conn, $Q1);
							// $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                            // HR BETWEEN '00' AND '$jam' AND trx in ('Grace Periode') GROUP BY CALLING_DATE,RESULT)
                            // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
							oci_execute($stid);
                            $totalSum_monthly = 0;
                            $totalSum_fourteenago = 0;
                            $totalSum_weekly = 0;
                            $totalSum_twodaysago = 0;
							$totalSum_yesterday = 0;
							$totalSum_today = 0;
							while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
								echo "
									<tr>";
								echo "
                                    <td><a href='#Grace_Periode' data-toggle='tooltip' title='".$row[1]."'><div id='Grace_Periode'>" . $row[0] . "</div></a></td>
                                    <td class='table-secondary'>" . number_format ($row[2]) . "</td>
                                    <td>" . number_format ($row[3]) . "</td>
                                    <td class='table-secondary'>" . number_format ($row[4]) . "</td>
                                    <td>" . number_format ($row[5]) . "</td>
                                    <td class='table-secondary'>" . number_format ($row[6]) . "</td>
                                    <td>" . number_format ($row[7]) . "</td>";
								echo "
									</tr>";
                                    $totalSum_monthly = $totalSum_monthly + $row[2];
                                    $totalSum_fourteenago = $totalSum_fourteenago + $row[3];
                                    $totalSum_weekly = $totalSum_weekly + $row[4];
                                    $totalSum_twodaysago = $totalSum_twodaysago + $row[5];
                                    $totalSum_yesterday = $totalSum_yesterday + $row[6];
                                    $totalSum_today = $totalSum_today + $row[7];
							}
						?>
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <th>Total</th>
                    <th>
                        <?php echo number_format ($totalSum_monthly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fourteenago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_weekly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_twodaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_yesterday);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_today);
                                            ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Compare</h5>
                    <hr>
                </center>
                <p class="card-text">
                <p class="card-text">
                <table>
                    <tr>
                        <td><?php echo $today."-". $monthly; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_monthly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fourteenago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_fourteenago);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $weekly; ?></td>
                        <td>:</td>
                        <td> <?php echo number_format ($totalSum_today - $totalSum_weekly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $twodaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_twodaysago); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $yesterday; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_yesterday); ?></td>
                    </tr>
                </table>
                </p>
                </p>
                <hr>
                <?php 
                $nama = "chart_ERROR_CODE_502_GRACEPERIOD";
                $type = "GRACEPERIOD";
                $title = "ERROR_CODE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center">ERROR CODE CDE 502 RETRY / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>CODE</th>
                    <th>
                        <div class="btn-group btn-group-sm dropright " role="group">
                            <button class="btn btn-secondary btn-group-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="monthly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_monthly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $monthly; 
                                echo date ('Y/m/d', strtotime($monthly)); ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="fourteenago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fourteenago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fourteenago; 
                                echo date ('Y/m/d', strtotime($fourteenago));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="weekly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_weekly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $weekly; 
                                echo date ('Y/m/d', strtotime($weekly));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="twodaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_twodaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $twodaysago; 
                                echo date ('Y/m/d', strtotime($twodaysago));
                                ?>
                    </th>
                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="yesterday"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_yesterday">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $yesterday; 
                                echo date ('Y/m/d', strtotime($yesterday));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="today"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_today">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $today; 
                                echo date ('Y/m/d', strtotime($today));
                                ?>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                        $Q1 = "SELECT * FROM ( SELECT CALLING_DATE, CHARGE_RESULT_CODE,
                        CASE
                            WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                            WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                            WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                            WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                            WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                            WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                            WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                            WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                            WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                            WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                            WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                            WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                            WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                            WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                        END AS MEANOFCODE,
                        SUM(SUCCESS + FAIL) AS COUNT
                    FROM
                        RBTRPTN_REPORT_HOURLY
                    WHERE
                        HR BETWEEN '00' AND '$jam'
                        AND trx IN ('Renewal Retry')
                        AND CHARGE_RESULT_CODE NOT IN ('AS',
                        'SP')
                    GROUP BY
                        CALLING_DATE,
                        CHARGE_RESULT_CODE,
                    CASE
                            WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                            WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                            WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                            WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                            WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                            WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                            WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                            WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                            WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                            WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                            WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                            WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                            WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                            WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                        END) PIVOT (SUM(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today))
                    ORDER BY CHARGE_RESULT_CODE";
                $stid = oci_parse($conn, $Q1);
		                // $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
		                oci_execute($stid);
                        $totalSum_monthly = 0;
                        $totalSum_fourteenago = 0;
                        $totalSum_weekly = 0;
                        $totalSum_twodaysago = 0;
						$totalSum_yesterday = 0;
						$totalSum_today = 0;
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
								<tr>";
							echo "
                                <td><a href='#Renewal_Retry' data-toggle='tooltip' title='".$row[1]."'><div id='Renewal_Retry'>" . $row[0] . "</div></a></td>
                                <td class='table-secondary'>" . number_format ($row[2]) . "</td>
                                <td>" . number_format ($row[3]) . "</td>
                                <td class='table-secondary'>" . number_format ($row[4]) . "</td>
                                <td>" . number_format ($row[5]) . "</td>
                                <td class='table-secondary'>" . number_format ($row[6]) . "</td>
                                <td>" . number_format ($row[7]) . "</td>";
							echo "
								</tr>";
                                $totalSum_monthly = $totalSum_monthly + $row[2];
                                $totalSum_fourteenago = $totalSum_fourteenago + $row[3];
                                $totalSum_weekly = $totalSum_weekly + $row[4];
                                $totalSum_twodaysago = $totalSum_twodaysago + $row[5];
								$totalSum_yesterday = $totalSum_yesterday + $row[6];
							    $totalSum_today = $totalSum_today + $row[7];
							}
					?>
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <th>Total</th>
                    <th>
                        <?php echo number_format ($totalSum_monthly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fourteenago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_weekly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_twodaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_yesterday);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_today);
                                            ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Compare</h5>
                    <hr>
                </center>
                <p class="card-text">
                <p class="card-text">
                <table>
                    <tr>
                        <td><?php echo $today."-". $monthly; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_monthly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fourteenago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_fourteenago);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $weekly; ?></td>
                        <td>:</td>
                        <td> <?php echo number_format ($totalSum_today - $totalSum_weekly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $twodaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_twodaysago); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $yesterday; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_yesterday); ?></td>
                    </tr>
                </table>
                </p>
                </p>
                <hr>
                <?php 
                $nama = "chart_ERROR_CODE_502_RETRY_0";
                $type = "RETRY";
                $title = "ERROR_CODE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center">ERROR CODE CDE 502 ENHANCE / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>CODE</th>
                    <th>
                        <div class="btn-group btn-group-sm dropright " role="group">
                            <button class="btn btn-secondary btn-group-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="monthly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_monthly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $monthly; 
                                echo date ('Y/m/d', strtotime($monthly)); ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="fourteenago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fourteenago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fourteenago; 
                                echo date ('Y/m/d', strtotime($fourteenago));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="weekly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_weekly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $weekly; 
                                echo date ('Y/m/d', strtotime($weekly));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="twodaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_twodaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $twodaysago; 
                                echo date ('Y/m/d', strtotime($twodaysago));
                                ?>
                    </th>
                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="yesterday"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_yesterday">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $yesterday; 
                                echo date ('Y/m/d', strtotime($yesterday));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="today"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_today">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $today; 
                                echo date ('Y/m/d', strtotime($today));
                                ?>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $Q1 = "SELECT * FROM ( SELECT CALLING_DATE, CHARGE_RESULT_CODE,
                    CASE
                        WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                        WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                        WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                        WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                        WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                        WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                        WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                        WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                        WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                        WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                        WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                        WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                        WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                        WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                    END AS MEANOFCODE,
                    SUM(SUCCESS + FAIL) AS COUNT
                FROM
                    RBTRPTN_REPORT_HOURLY
                WHERE
                    HR BETWEEN '00' AND '$jam'
                    AND trx IN ('Renewal Retry Enhance')
                    AND CHARGE_RESULT_CODE NOT IN ('AS',
                    'SP')
                GROUP BY
                    CALLING_DATE,
                    CHARGE_RESULT_CODE,
                CASE
                        WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                        WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                        WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                        WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                        WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                        WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                        WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                        WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                        WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                        WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                        WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                        WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                        WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                        WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                    END) PIVOT (SUM(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today))
                ORDER BY CHARGE_RESULT_CODE";
            $stid = oci_parse($conn, $Q1);
					// $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                    // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry Enhance') GROUP BY CALLING_DATE,RESULT)
                    // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
					oci_execute($stid);
                    $totalSum_monthly = 0;
                    $totalSum_fourteenago = 0;
                    $totalSum_weekly = 0;
                    $totalSum_twodaysago = 0;
					$totalSum_yesterday = 0;
					$totalSum_today = 0;
					while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
						echo "
							<tr>";
						echo "
                            <td><a href='#Renewal_Retry_Enhance' data-toggle='tooltip' title='".$row[1]."'><div id='Renewal_Retry_Enhance'>" . $row[0] . "</div></a></td>
                            <td class='table-secondary'>" . number_format ($row[2]) . "</td>
                            <td>" . number_format ($row[3]) . "</td>
                            <td class='table-secondary'>" . number_format ($row[4]) . "</td>
                            <td>" . number_format ($row[5]) . "</td>
                            <td class='table-secondary'>" . number_format ($row[6]) . "</td>
                            <td>" . number_format ($row[7]) . "</td>";
						echo "
						    </tr>";
                                $totalSum_monthly = $totalSum_monthly + $row[2];
                                $totalSum_fourteenago = $totalSum_fourteenago + $row[3];
                                $totalSum_weekly = $totalSum_weekly + $row[4];
                                $totalSum_twodaysago = $totalSum_twodaysago + $row[5];
								$totalSum_yesterday = $totalSum_yesterday + $row[6];
							    $totalSum_today = $totalSum_today + $row[7];
					}
				?>
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <th>Total</th>
                    <th>
                        <?php echo number_format ($totalSum_monthly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fourteenago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_weekly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_twodaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_yesterday);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_today);
                                            ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Compare</h5>
                    <hr>
                </center>
                <p class="card-text">
                <p class="card-text">
                <table>
                    <tr>
                        <td><?php echo $today."-". $monthly; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_monthly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fourteenago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_fourteenago);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $weekly; ?></td>
                        <td>:</td>
                        <td> <?php echo number_format ($totalSum_today - $totalSum_weekly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $twodaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_twodaysago); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $yesterday; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_yesterday); ?></td>
                    </tr>
                </table>
                </p>
                </p>
                <hr>
                <?php 
                $nama = "chart_ERROR_CODE_502_ENHANCE_0";
                $type = "ENHANCE";
                $title = "ERROR_CODE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center">ERROR CODE CDE 502 DYNAMIC / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>CODE</th>
                    <th>
                        <div class="btn-group btn-group-sm dropright " role="group">
                            <button class="btn btn-secondary btn-group-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="monthly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_monthly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $monthly; 
                                echo date ('Y/m/d', strtotime($monthly)); ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="fourteenago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fourteenago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fourteenago; 
                                echo date ('Y/m/d', strtotime($fourteenago));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="weekly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_weekly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $weekly; 
                                echo date ('Y/m/d', strtotime($weekly));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="twodaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_twodaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $twodaysago; 
                                echo date ('Y/m/d', strtotime($twodaysago));
                                ?>
                    </th>
                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="yesterday"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_yesterday">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $yesterday; 
                                echo date ('Y/m/d', strtotime($yesterday));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="today"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_today">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $today; 
                                echo date ('Y/m/d', strtotime($today));
                                ?>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                        $Q1 = "SELECT * FROM ( SELECT CALLING_DATE, CHARGE_RESULT_CODE,
                        CASE
                            WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                            WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                            WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                            WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                            WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                            WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                            WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                            WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                            WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                            WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                            WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                            WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                            WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                            WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                        END AS MEANOFCODE,
                        SUM(SUCCESS + FAIL) AS COUNT
                    FROM
                        RBTRPTN_REPORT_HOURLY
                    WHERE
                        HR BETWEEN '00' AND '$jam'
                        AND trx IN ('Renewal Retry Dynamic')
                        AND CHARGE_RESULT_CODE NOT IN ('AS',
                        'SP')
                    GROUP BY
                        CALLING_DATE,
                        CHARGE_RESULT_CODE,
                    CASE
                            WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                            WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                            WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                            WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                            WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                            WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                            WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                            WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                            WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                            WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                            WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                            WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                            WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                            WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                        END) PIVOT (SUM(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today))
                    ORDER BY CHARGE_RESULT_CODE";
                $stid = oci_parse($conn, $Q1);
                        // $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry Dynamic') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
						oci_execute($stid);
                        $totalSum_monthly = 0;
                        $totalSum_fourteenago = 0;
                        $totalSum_weekly = 0;
                        $totalSum_twodaysago = 0;
						$totalSum_yesterday = 0;
						$totalSum_today = 0;
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
							echo "
                            <td><a href='#Renewal_Retry_Dynamic' data-toggle='tooltip' title='".$row[1]."'><div id='Renewal_Retry_Dynamic'>" . $row[0] . "</div></a></td>
                            <td class='table-secondary'>" . number_format ($row[2]) . "</td>
                            <td>" . number_format ($row[3]) . "</td>
                            <td class='table-secondary'>" . number_format ($row[4]) . "</td>
                            <td>" . number_format ($row[5]) . "</td>
                            <td class='table-secondary'>" . number_format ($row[6]) . "</td>
                            <td>" . number_format ($row[7]) . "</td>";
							echo "
												</tr>";
                                $totalSum_monthly = $totalSum_monthly + $row[2];
                                $totalSum_fourteenago = $totalSum_fourteenago + $row[3];
                                $totalSum_weekly = $totalSum_weekly + $row[4];
                                $totalSum_twodaysago = $totalSum_twodaysago + $row[5];
								$totalSum_yesterday = $totalSum_yesterday + $row[6];
							    $totalSum_today = $totalSum_today + $row[7];
						}
					?>
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <th>Total</th>
                    <th>
                        <?php echo number_format ($totalSum_monthly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fourteenago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_weekly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_twodaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_yesterday);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_today);
                                            ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Compare</h5>
                    <hr>
                </center>
                <p class="card-text">
                <p class="card-text">
                <table>
                    <tr>
                        <td><?php echo $today."-". $monthly; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_monthly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fourteenago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_fourteenago);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $weekly; ?></td>
                        <td>:</td>
                        <td> <?php echo number_format ($totalSum_today - $totalSum_weekly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $twodaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_twodaysago); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $yesterday; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_yesterday); ?></td>
                    </tr>
                </table>
                </p>
                </p>
                <hr>
                <?php 
                $nama = "chart_ERROR_CODE_502_DYNAMIC_0";
                $type = "DYNAMIC";
                $title = "ERROR_CODE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center">ERROR CODE CDE 502 EXTEND / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>CODE</th>
                    <th>
                        <div class="btn-group btn-group-sm dropright " role="group">
                            <button class="btn btn-secondary btn-group-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="monthly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_monthly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $monthly; 
                                echo date ('Y/m/d', strtotime($monthly)); ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="fourteenago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fourteenago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fourteenago; 
                                echo date ('Y/m/d', strtotime($fourteenago));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="weekly"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_weekly">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $weekly; 
                                echo date ('Y/m/d', strtotime($weekly));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="twodaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_twodaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $twodaysago; 
                                echo date ('Y/m/d', strtotime($twodaysago));
                                ?>
                    </th>
                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="yesterday"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_yesterday">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $yesterday; 
                                echo date ('Y/m/d', strtotime($yesterday));
                                ?>
                    </th>

                    <th>
                        <div class="btn-group dropright">
                            <button class="btn btn-secondary btn-sm" type="button">
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="form-inline" method="post">
                                    <div class="form-group mb-2 mr-sm-2"></div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <input type="date" class="form-control form-control-sm" id="" name="today"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_today">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $today; 
                                echo date ('Y/m/d', strtotime($today));
                                ?>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                        $Q1 = "SELECT * FROM ( SELECT CALLING_DATE, CHARGE_RESULT_CODE,
                        CASE
                            WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                            WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                            WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                            WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                            WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                            WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                            WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                            WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                            WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                            WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                            WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                            WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                            WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                            WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                        END AS MEANOFCODE,
                        SUM(SUCCESS + FAIL) AS COUNT
                    FROM
                        RBTRPTN_REPORT_HOURLY
                    WHERE
                        HR BETWEEN '00' AND '$jam'
                        AND trx IN ('Renewal Retry Extend')
                        AND CHARGE_RESULT_CODE NOT IN ('AS',
                        'SP')
                    GROUP BY
                        CALLING_DATE,
                        CHARGE_RESULT_CODE,
                    CASE
                            WHEN CHARGE_RESULT_CODE = '101' THEN 'INVALID_ACCESS'
                            WHEN CHARGE_RESULT_CODE = '105' THEN 'PARSING_XML_ERROR'
                            WHEN CHARGE_RESULT_CODE = '108' THEN 'ERROR_WHEN_FETCHING_DATA_FROM_TRANSACTION_HISTORY_DB'
                            WHEN CHARGE_RESULT_CODE = '112' THEN 'RATING_GROUP_IS_NOT_FOUND_FOR_THE_GIVEN_APPS_ID'
                            WHEN CHARGE_RESULT_CODE = '113' THEN 'IN_CONFIGURATION_FAIL'
                            WHEN CHARGE_RESULT_CODE = '115' THEN 'TRAFFIC/LOAD_LIMITATION_REACHEAD'
                            WHEN CHARGE_RESULT_CODE = '117' THEN 'IN_TIME_OUT'
                            WHEN CHARGE_RESULT_CODE = '17' THEN 'ERROR_DURING_FETCHING_SUBS_STATUS'
                            WHEN CHARGE_RESULT_CODE = '2' THEN 'SUCCESS'
                            WHEN CHARGE_RESULT_CODE = '20' THEN 'INVALID_TRANSACTION_ID'
                            WHEN CHARGE_RESULT_CODE = '3:21' THEN 'INSUFFICIENT_CREDIT'
                            WHEN CHARGE_RESULT_CODE = '3:27' THEN 'SUBSCRIBER_LOCKED'
                            WHEN CHARGE_RESULT_CODE = '3:47' THEN 'NO_TARRIF_INDEX_WAS_FOUND_ON_INGW_OR_IN'
                            WHEN CHARGE_RESULT_CODE = '65' THEN 'RENEWAL_USER_CHARGE_OFF'
                        END) PIVOT (SUM(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today))
                    ORDER BY CHARGE_RESULT_CODE";
                $stid = oci_parse($conn, $Q1);
                        // $stid = oci_parse($conn, "SELECT * FROM (SELECT CALLING_DATE,RESULT,SUM(SUCCESS+FAIL) AS COUNT FROM RBTRPTN_REPORT_HOURLY WHERE
                        // HR BETWEEN '00' AND '$jam' AND trx in ('Renewal Retry Extend') GROUP BY CALLING_DATE,RESULT)
                        // pivot (sum(COUNT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY RESULT");
						oci_execute($stid);
                        $totalSum_monthly = 0;
                        $totalSum_fourteenago = 0;
                        $totalSum_weekly = 0;
                        $totalSum_twodaysago = 0;
						$totalSum_yesterday = 0;
						$totalSum_today = 0;
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "
												<tr>";
							echo "
													<td><a href='#extend' data-toggle='tooltip' title='".$row[1]."'><div id='extend'>" . $row[0] . "</div></a></td>
													<td class='table-secondary'>" . number_format ($row[2]) . "</td>
													<td>" . number_format ($row[3]) . "</td>
													<td class='table-secondary'>" . number_format ($row[4]) . "</td>
                                                    <td>" . number_format ($row[5]) . "</td>
                                                    <td class='table-secondary'>" . number_format ($row[6]) . "</td>
                                                    <td>" . number_format ($row[7]) . "</td>";
							echo "
												</tr>";
                                $totalSum_monthly = $totalSum_monthly + $row[2];
                                $totalSum_fourteenago = $totalSum_fourteenago + $row[3];
                                $totalSum_weekly = $totalSum_weekly + $row[4];
                                $totalSum_twodaysago = $totalSum_twodaysago + $row[5];
								$totalSum_yesterday = $totalSum_yesterday + $row[6];
							    $totalSum_today = $totalSum_today + $row[7];
						}
					?>
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <th>Total</th>
                    <th>
                        <?php echo number_format ($totalSum_monthly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fourteenago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_weekly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_twodaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_yesterday);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_today);
                                            ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Compare</h5>
                    <hr>
                </center>
                <p class="card-text">
                <p class="card-text">
                <table>
                    <tr>
                        <td><?php echo $today."-". $monthly; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_monthly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fourteenago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_fourteenago);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $weekly; ?></td>
                        <td>:</td>
                        <td> <?php echo number_format ($totalSum_today - $totalSum_weekly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $twodaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_twodaysago); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $yesterday; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_yesterday); ?></td>
                    </tr>
                </table>
                </p>
                </p>
                <hr>
                <?php 
                $nama = "chart_ERROR_CODE_502_EXTEND_0";
                $type = "EXTEND";
                $title = "ERROR_CODE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>

<br>