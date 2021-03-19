<?php
     if (isset($_POST['search_weekly'])) {
        $weekly_0 = $weekly;
        $weekly = date ('Ymd', strtotime($_POST['weekly']));
        if ($weekly == $monthly || $weekly == $fourteenago || $weekly == $twodaysago || $weekly == $yesterday || $weekly == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $weekly = $weekly_0;
        }
     }
     if (isset($_POST['search_sixdaysago'])) {
        $sixdaysago_0 = $sixdaysago;
        $sixdaysago = date ('Ymd', strtotime($_POST['sixdaysago']));
        if ($sixdaysago == $weekly || $sixdaysago == $fivedaysago || $sixdaysago == $fourdaysago || $sixdaysago == $twodaysago || $sixdaysago == $yesterday || $sixdaysago == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $sixdaysago = $sixdaysago_0;
        }
     }
     if (isset($_POST['search_fivedaysago'])) {
        $fivedaysago_0 = $fivedaysago;
        $fivedaysago = date ('Ymd', strtotime($_POST['fivedaysago']));
        if ($fivedaysago == $weekly || $fivedaysago == $sixdaysago || $fivedaysago == $fourdaysago || $fivedaysago == $twodaysago || $fivedaysago == $yesterday || $fivedaysago == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $fivedaysago = $fivedaysago_0;
        }
     }
     if (isset($_POST['search_fourdaysago'])) {
        $fourdaysago_0 = $fourdaysago;
        $fourdaysago = date ('Ymd', strtotime($_POST['fourdaysago']));
        if ($fourdaysago == $weekly || $fourdaysago == $sixdaysago || $fourdaysago == $fivedaysago || $fourdaysago == $twodaysago || $fourdaysago == $yesterday || $fourdaysago == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $fourdaysago = $fourdaysago_0;
        }
     }
     if (isset($_POST['search_twodaysago'])) {
        $twodaysago_0 = $twodaysago;
        $twodaysago = date ('Ymd', strtotime($_POST['twodaysago']));
        if ($twodaysago == $weekly || $twodaysago == $sixdaysago || $twodaysago == $fivedaysago || $twodaysago == $fourdaysago || $twodaysago == $yesterday || $twodaysago == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $twodaysago = $twodaysago_0;
        }
     }
     if (isset($_POST['search_yesterday'])) {
        $yesterday_0 = $yesterday;
        $yesterday = date ('Ymd', strtotime($_POST['yesterday']));
        if ($yesterday == $weekly || $yesterday == $sixdaysago || $yesterday == $fivedaysago || $yesterday == $fourdaysago || $yesterday == $twodaysago || $yesterday == $today ) {
            echo "<div class='alert alert-danger'><span class='fa fa-exclamation-triangle'> Data yang di inputkan tidak boleh sama dengan data yang lainya</span></div>";
            $yesterday = $yesterday_0;
        }
     }
     if (isset($_POST['search_today'])) {
        $today_0 = $today;
        $today = date ('Ymd', strtotime($_POST['today']));
        if ($today == $weekly || $today == $sixdaysago || $today == $fivedaysago || $today == $fourdaysago || $today == $twodaysago || $today == $yesterday ) {
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

<p class="d-flex justify-content-center">BROADCAST RECO / HOUR 00-<?php echo $jam?></p>
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
                            $query_0 = "SELECT distinct HR FROM RBTRPTN_REPORT_RECO order by HR";
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
                                echo date ('Y/m/d', strtotime($weekly)); ?>
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
                                        <input type="date" class="form-control form-control-sm" id="" name="sixdaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_sixdaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $sixdaysago; 
                                echo date ('Y/m/d', strtotime($sixdaysago));
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
                                        <input type="date" class="form-control form-control-sm" id="" name="fivedaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fivedaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fivedaysago; 
                                echo date ('Y/m/d', strtotime($fivedaysago));
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
                                        <input type="date" class="form-control form-control-sm" id="" name="fourdaysago"
                                            required>
                                    </div>
                                    <div class="form-group mb-2 mr-sm-2">
                                        <button class="btn-sm fa fa-search" type="submit" name="search_fourdaysago">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                                // echo $fourdaysago; 
                                echo date ('Y/m/d', strtotime($fourdaysago));
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
                                                        HR,
                                                        BCRECO
                                                    FROM
                                                        RBTRPTN_REPORT_RECO
                                                    WHERE
                                                        HR BETWEEN '00' AND '$jam') pivot (sum(BCRECO) FOR CALLING_DATE IN ($weekly,
                                                    $sixdaysago,
                                                    $fivedaysago,
                                                    $fourdaysago,
                                                    $twodaysago,
                                                    $yesterday,
                                                    $today))
                                                ORDER BY
                                                    HR");
													oci_execute($stid);
                                                    $totalSum_weekly = 0;
                                                    $totalSum_sixdaysago = 0;
                                                    $totalSum_fivedaysago = 0;
                                                    $totalSum_fourdaysago = 0;
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
                                                        <td>" . number_format ($row[6]) . "</td>
                                                        <td class='table-secondary'>" . number_format ($row[7]) . "</td>";
														echo "
																			</tr>";
                                                                            $totalSum_weekly = $totalSum_weekly + $row[1];
                                                                            $totalSum_sixdaysago = $totalSum_sixdaysago + $row[2];
                                                                            $totalSum_fivedaysago = $totalSum_fivedaysago + $row[3];
                                                                            $totalSum_fourdaysago = $totalSum_fourdaysago + $row[4];
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
                        <?php echo number_format ($totalSum_weekly);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_sixdaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fivedaysago);
                                            ?>
                    </th>
                    <th>
                        <?php echo number_format ($totalSum_fourdaysago);
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
                        <td><?php echo $today."-". $weekly; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_weekly); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $sixdaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_sixdaysago);?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fivedaysago; ?></td>
                        <td>:</td>
                        <td> <?php echo number_format ($totalSum_today - $totalSum_fivedaysago); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $today."-". $fourdaysago; ?></td>
                        <td>:</td>
                        <td><?php echo number_format ($totalSum_today - $totalSum_fourdaysago); ?></td>
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
                $nama = "BROADCAST_RECO";
                $type = "TIMESPAN";
                $title = "AVERAGE";
                $charts->diagram_garis($totalSum_weekly,$totalSum_sixdaysago,$totalSum_fivedaysago,$totalSum_fourdaysago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$weekly,$sixdaysago,$fivedaysago,$fourdaysago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<br>