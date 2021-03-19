<?php
    if (isset($_POST['search_monthly'])) {
       $monthly_0 = $monthly;
       $monthly = date ('Ymd', strtotime($_POST['monthly']));
       if ($monthly == $fourteenago || $monthly == $weekly || $monthly == $twodaysago || $monthly == $yesterday || $monthly == $today) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $monthly = $monthly_0;
        }
    }
    if (isset($_POST['search_fourteenago'])) {
        $fourteenago_0 = $fourteenago;
        $fourteenago = date ('Ymd', strtotime($_POST['fourteenago']));
        if ($fourteenago == $monthly || $fourteenago == $weekly || $fourteenago == $twodaysago || $fourteenago == $yesterday || $fourteenago == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $fourteenago = $fourteenago_0;
        }
     }
     if (isset($_POST['search_weekly'])) {
        $weekly_0 = $weekly;
        $weekly = date ('Ymd', strtotime($_POST['weekly']));
        if ($weekly == $monthly || $weekly == $fourteenago || $weekly == $twodaysago || $weekly == $yesterday || $weekly == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $weekly = $weekly_0;
        }
     }
     if (isset($_POST['search_twodaysago'])) {
        $twodaysago_0 = $twodaysago;
        $twodaysago = date ('Ymd', strtotime($_POST['twodaysago']));
        if ($twodaysago == $monthly || $twodaysago == $fourteenago || $twodaysago == $weekly || $twodaysago == $yesterday || $twodaysago == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $twodaysago = $twodaysago_0;
        }
     }
     if (isset($_POST['search_yesterday'])) {
        $yesterday_0 = $yesterday;
        $yesterday = date ('Ymd', strtotime($_POST['yesterday']));
        if ($yesterday == $monthly || $yesterday == $fourteenago || $yesterday == $weekly || $yesterday == $twodaysago || $yesterday == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $yesterday = $yesterday_0;
        }
     }
     if (isset($_POST['search_today'])) {
        $today_0 = $today;
        $today = date ('Ymd', strtotime($_POST['today']));
        if ($today == $monthly || $today == $fourteenago || $today == $weekly || $today == $twodaysago || $today == $yesterday ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $today = $today_0;
        }
     }
     if (isset($_POST['hour'])) {
         $jam = trim($_POST['option_hour']);
     }

     if (isset($_POST['destroy_session'])) {
        session_destroy();

    }
?>

<p class="d-flex justify-content-center">ATTEMPT TRX / HOUR 00-<?php echo $jam?></p>
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
                    <th></th>
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
													$stid = oci_parse($conn, "SELECT
                                                    *
                                                FROM
                                                    (
                                                    SELECT
                                                        calling_date,
                                                    CASE
                                                            WHEN TRX IN 'Purchase ON' THEN 'Purchase ON'
                                                            WHEN TRX IN 'Purchase OFF' THEN 'Purchase OFF'
                                                            WHEN TRX IN 'Renewal ON' THEN 'Renewal ON'
                                                            WHEN TRX IN 'Renewal OFF' THEN 'Renewal OFF'
                                                            WHEN TRX IN 'Grace Periode' THEN 'Grace Periode'
                                                            WHEN TRX IN 'Renewal Retry' THEN 'Retry'
                                                            WHEN TRX IN 'Renewal Retry Enhance' THEN 'Enhance'
                                                            WHEN TRX IN 'Renewal Retry Dynamic' THEN 'Dynamic'
                                                            WHEN TRX IN 'Renewal Retry Extend' THEN 'Extend'
                                                        END AS TRX,
                                                        ATTEMPT
                                                    FROM
                                                        RBTRPTN_REPORT_HOURLY
                                                    WHERE
                                                        hr BETWEEN '00' AND '$jam' AND TRX NOT IN ('60','80')) pivot (sum (ATTEMPT) FOR CALLING_DATE IN ($monthly,
                                                    $fourteenago,
                                                    $weekly,
                                                    $twodaysago,
                                                    $yesterday,
                                                    $today))
                                                ORDER BY
                                                    (
                                                CASE
                                                        TRX WHEN 'Purchase OFF' THEN 1
                                                        WHEN 'Purchase ON' THEN 2
                                                        WHEN 'Renewal OFF' THEN 3
                                                        WHEN 'Renewal ON' THEN 4
                                                        WHEN 'Grace Periode' THEN 5
                                                        WHEN 'Retry' THEN 6
                                                        WHEN 'Enhance' THEN 7
                                                        WHEN 'Dynamic' THEN 8
                                                        WHEN 'Extend' THEN 9
                                                    END) ASC,
                                                    TRX ASC");
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
																				<td>" . $row[0] . "</td>
																				<td class='table-secondary'>" . number_format ($row[1]) . "</td>
																				<td>" . number_format ($row[2]) . "</td>
																				<td class='table-secondary'>" . number_format ($row[3]) . "</td>
                                                                                <td>" . number_format ($row[4]) . "</td>
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>
                                                                                <td>" . number_format ($row[6]) . "</td>";
														echo "
																			</tr>";
                                                                            $totalSum_monthly = $totalSum_monthly + $row[1];
                                                                            $totalSum_fourteenago = $totalSum_fourteenago + $row[2];
                                                                            $totalSum_weekly = $totalSum_weekly + $row[3];
                                                                            $totalSum_twodaysago = $totalSum_twodaysago + $row[4];
																			$totalSum_yesterday = $totalSum_yesterday + $row[5];
														                    $totalSum_today = $totalSum_today + $row[6];
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
        <!-- <div class="card" style="width: 100%;"> -->
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
                $nama = "chart_ATTEMPT_TRX";
                $type = "TRX";
                $title = "ATTEMPT";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center">REVENUE TRX / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th></th>
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
													$stid = oci_parse($conn, "SELECT
                                                    *
                                                FROM
                                                    (
                                                    SELECT
                                                        calling_date,
                                                    CASE
                                                            WHEN TRX IN 'Purchase ON' THEN 'Purchase ON'
                                                            WHEN TRX IN 'Purchase OFF' THEN 'Purchase OFF'
                                                            WHEN TRX IN 'Renewal ON' THEN 'Renewal ON'
                                                            WHEN TRX IN 'Renewal OFF' THEN 'Renewal OFF'
                                                            WHEN TRX IN 'Grace Periode' THEN 'Grace Periode'
                                                            WHEN TRX IN 'Renewal Retry' THEN 'Retry'
                                                            WHEN TRX IN 'Renewal Retry Enhance' THEN 'Enhance'
                                                            WHEN TRX IN 'Renewal Retry Dynamic' THEN 'Dynamic'
                                                            WHEN TRX IN 'Renewal Retry Extend' THEN 'Extend'
                                                        END AS TRX,
                                                        REVENUE
                                                    FROM
                                                        RBTRPTN_REPORT_HOURLY
                                                    WHERE
                                                        hr BETWEEN '00' AND '$jam' AND TRX NOT IN ('60','80')) pivot (sum (REVENUE) FOR CALLING_DATE IN ($monthly,
                                                    $fourteenago,
                                                    $weekly,
                                                    $twodaysago,
                                                    $yesterday,
                                                    $today))
                                                ORDER BY
                                                    (
                                                CASE
                                                        TRX WHEN 'Purchase OFF' THEN 1
                                                        WHEN 'Purchase ON' THEN 2
                                                        WHEN 'Renewal OFF' THEN 3
                                                        WHEN 'Renewal ON' THEN 4
                                                        WHEN 'Grace Periode' THEN 5
                                                        WHEN 'Retry' THEN 6
                                                        WHEN 'Enhance' THEN 7
                                                        WHEN 'Dynamic' THEN 8
                                                        WHEN 'Extend' THEN 9
                                                    END) ASC,
                                                    TRX ASC");
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
																				<td>" . $row[0] . "</td>
																				<td class='table-secondary'>" . number_format ($row[1]) . "</td>
																				<td>" . number_format ($row[2]) . "</td>
																				<td class='table-secondary'>" . number_format ($row[3]) . "</td>
                                                                                <td>" . number_format ($row[4]) . "</td>
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>
                                                                                <td>" . number_format ($row[6]) . "</td>";
														echo "
																			</tr>";
                                                                            $totalSum_monthly = $totalSum_monthly + $row[1];
                                                                            $totalSum_fourteenago = $totalSum_fourteenago + $row[2];
                                                                            $totalSum_weekly = $totalSum_weekly + $row[3];
                                                                            $totalSum_twodaysago = $totalSum_twodaysago + $row[4];
																			$totalSum_yesterday = $totalSum_yesterday + $row[5];
														                    $totalSum_today = $totalSum_today + $row[6];
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
                $nama = "chart_REVENUE_TRX";
                $type = "TRX";
                $title = "REVENUE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center">SUCCESS TRX / HOUR 00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th></th>
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
													$stid = oci_parse($conn, "SELECT
                                                    *
                                                FROM
                                                    (
                                                    SELECT
                                                        calling_date,
                                                    CASE
                                                            WHEN TRX IN 'Purchase ON' THEN 'Purchase ON'
                                                            WHEN TRX IN 'Purchase OFF' THEN 'Purchase OFF'
                                                            WHEN TRX IN 'Renewal ON' THEN 'Renewal ON'
                                                            WHEN TRX IN 'Renewal OFF' THEN 'Renewal OFF'
                                                            WHEN TRX IN 'Grace Periode' THEN 'Grace Periode'
                                                            WHEN TRX IN 'Renewal Retry' THEN 'Retry'
                                                            WHEN TRX IN 'Renewal Retry Enhance' THEN 'Enhance'
                                                            WHEN TRX IN 'Renewal Retry Dynamic' THEN 'Dynamic'
                                                            WHEN TRX IN 'Renewal Retry Extend' THEN 'Extend'
                                                        END AS TRX,
                                                        SUCCESS
                                                    FROM
                                                        RBTRPTN_REPORT_HOURLY
                                                    WHERE
                                                        hr BETWEEN '00' AND '$jam' AND TRX NOT IN ('60','80')) pivot (sum (SUCCESS) FOR CALLING_DATE IN ($monthly,
                                                    $fourteenago,
                                                    $weekly,
                                                    $twodaysago,
                                                    $yesterday,
                                                    $today))
                                                ORDER BY
                                                    (
                                                CASE
                                                        TRX WHEN 'Purchase OFF' THEN 1
                                                        WHEN 'Purchase ON' THEN 2
                                                        WHEN 'Renewal OFF' THEN 3
                                                        WHEN 'Renewal ON' THEN 4
                                                        WHEN 'Grace Periode' THEN 5
                                                        WHEN 'Retry' THEN 6
                                                        WHEN 'Enhance' THEN 7
                                                        WHEN 'Dynamic' THEN 8
                                                        WHEN 'Extend' THEN 9
                                                    END) ASC,
                                                    TRX ASC");
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
																				<td>" . $row[0] . "</td>
																				<td class='table-secondary'>" . number_format ($row[1]) . "</td>
																				<td>" . number_format ($row[2]) . "</td>
																				<td class='table-secondary'>" . number_format ($row[3]) . "</td>
                                                                                <td>" . number_format ($row[4]) . "</td>
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>
                                                                                <td>" . number_format ($row[6]) . "</td>";
														echo "
																			</tr>";
                                                                            $totalSum_monthly = $totalSum_monthly + $row[1];
                                                                            $totalSum_fourteenago = $totalSum_fourteenago + $row[2];
                                                                            $totalSum_weekly = $totalSum_weekly + $row[3];
                                                                            $totalSum_twodaysago = $totalSum_twodaysago + $row[4];
																			$totalSum_yesterday = $totalSum_yesterday + $row[5];
														                    $totalSum_today = $totalSum_today + $row[6];
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
                $nama = "chart_SUCCESS_TRX";
                $type = "TRX";
                $title = "SUCCESS";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div><br>