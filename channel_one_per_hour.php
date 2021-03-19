<?php
    $one_channel = "DTMF";
    $trx = "Purchase ON','Purchase OFF";
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
        $one_channel = trim($_POST['one_channel']);
        $trx = trim($_POST['one_trx']);

    }
    
    // judul
    if ($trx == "Purchase ON','Purchase OFF") {
        $trx_0 = "PURCHASE";
    }elseif ($trx == "Renewal ON','Renewal OFF") {
        $trx_0 = "RENEWAL";
    }else {
        $trx_0="";
    }

     if (isset($_POST['destroy_session'])) {
        session_destroy();

    }

    // echo $trx;
   
?>
<!-- <a class="btn btn-secondary btn-sm " href="#ATTEMPT_RENEWAL"> ATTEMPT </a>
<a class="btn btn-secondary btn-sm" href="#REVENUE_RENEWAL"> REVENUE </a> <a class="btn btn-secondary btn-sm"
    href="#SUCCESS_RENEWAL"> SUCCESS </a> <a class="btn btn-secondary btn-sm" href="#ERROR_CODE_RENEWAL"> ERROR_CODE
</a> -->
<p class="d-flex justify-content-center" id="ATTEMPT_ONE_CHANNEL">ATTEMPT
    <?php echo strtoupper($one_channel)."_".$trx_0;?> / HOUR
    00-<?php echo $jam?></p>
<form class="form-inline " method="post">
    <div class="form-group mb-2 mr-sm-2"> <label for="option_hour">HOUR</label></div>
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
    <div class="form-group mb-2 mr-sm-2"><label for="">CHANNEL</label></div>
    <div class="form-group mb-2 mr-sm-2">
        <select class="custom-select form-control-sm" name="one_channel">
            <?php
                                $query_0 = "SELECT DISTINCT CHANNEL FROM RBTRPTN_REPORT_HOURLY ORDER BY CHANNEL";
                                $stid_0 = oci_parse($conn, $query_0);
                                oci_execute($stid_0);  
                                while ($row = oci_fetch_object($stid_0)) { 
                                    if (empty($_POST['one_channel'])) { ?>
            <option value="<?php echo $row->CHANNEL; ?>" <?php if($one_channel == $row->CHANNEL){echo "selected";}?>>
                <?php echo $row->CHANNEL; ?></option>
            <?php } else { ?>
            <option value="<?php echo $row->CHANNEL; ?>"
                <?php if($_POST['one_channel'] == $row->CHANNEL){echo "selected";}?>> <?php echo $row->CHANNEL; ?>
            </option>
            <?php  }
                                }?>
        </select>
    </div>
    <div class="form-group mb-2 mr-sm-2"><label for="`">TRX</label></div>
    <div class="form-group mb-2 mr-sm-2">
        <select class="custom-select form-control-sm" name="one_trx">
            <!-- 'Renewal ON','Renewal OFF','Purchase ON','Purchase OFF' -->
            <option value="Purchase ON','Purchase OFF"
                <?php if($trx == "Purchase ON','Purchase OFF"){echo "selected";}?>>PURCHASE</option>
            <option value="Renewal ON','Renewal OFF" <?php if($trx == "Renewal ON','Renewal OFF"){echo "selected";}?>>
                RENEWAL</option>
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
                        $totalSum_monthly = 0;
                        $totalSum_fourteenago = 0;
                        $totalSum_weekly = 0;
                        $totalSum_twodaysago = 0;
                        $totalSum_yesterday = 0;
                        $totalSum_today = 0;
                        $Q1 = "SELECT * FROM (SELECT calling_date, hr, attempt FROM RBTRPTN_REPORT_HOURLY WHERE hr BETWEEN '00' AND '$jam' AND trx IN ('$trx') 
                        AND CHANNEL = '$one_channel') PIVOT (SUM(ATTEMPT) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY hr";
                        $stid = oci_parse($conn,$Q1);
						oci_execute($stid);
						while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
							echo "<tr>";
							echo "
									<td><a href='#' data-toggle='tooltip' title='horray!'>" . $row[0] . "</a></td>
									<td class='table-secondary'>" . number_format ($row[1]) . "</td>
									<td>" . number_format ($row[2]) . "</td>
									<td class='table-secondary'>" . number_format ($row[3]) . "</td>
                                    <td>" . number_format ($row[4]) . "</td>
                                    <td class='table-secondary'>" . number_format ($row[5]) . "</td>
                                    <td>" . number_format ($row[6]) . "</td>";

							echo "</tr>";
                                    $totalSum_monthly = $totalSum_monthly + $row[1];
                                    $totalSum_fourteenago = $totalSum_fourteenago + $row[2];
                                    $totalSum_weekly = $totalSum_weekly + $row[3];
                                    $totalSum_twodaysago = $totalSum_twodaysago + $row[4];
									$totalSum_yesterday = $totalSum_yesterday + $row[5];
							        $totalSum_today = $totalSum_today + $row[6];
						}
					?>
            </tbody>
            <script>
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();   
                    });
            </script>
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
                $nama = "chart_ATTEMPT_".$one_channel;
                $type = strtoupper($one_channel)."_".$trx_0." ";
                $title = "ATTEMPT";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center" id="REVENUE_ONE_CHANNEL">REVENUE
    <?php echo strtoupper($one_channel)."_".$trx_0;?> / HOUR
    00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
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
													$Q1 = "SELECT * FROM (SELECT calling_date, hr, REVENUE FROM RBTRPTN_REPORT_HOURLY WHERE hr BETWEEN '00' AND '$jam' AND trx IN ('$trx') 
                                                    AND CHANNEL = '$one_channel') PIVOT (SUM(REVENUE) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY hr";
                                                    $stid = oci_parse($conn,$Q1);

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
                $nama = "chart_REVENUE_".$one_channel;
                $type = strtoupper($one_channel)."_".$trx_0." ";
                $title = "REVENUE";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>

<p class="d-flex justify-content-center" id="SUCCESS_ONE_CHANNEL">SUCCESS
    <?php echo strtoupper($one_channel)."_".$trx_0;?> / HOUR
    00-<?php echo $jam?></p>
<div class="row justify-content-md-right">
    <div class="col-lg-9 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
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
						$Q1 = "SELECT * FROM (SELECT calling_date, hr, SUCCESS FROM RBTRPTN_REPORT_HOURLY WHERE hr BETWEEN '00' AND '$jam' AND trx IN ('$trx') 
                        AND CHANNEL = '$one_channel') PIVOT (SUM(SUCCESS) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY hr";
                        $stid = oci_parse($conn,$Q1);
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
                $nama = "chart_SUCCESS_".$one_channel;
                $type = strtoupper($one_channel)."_".$trx_0." ";
                $title = "SUCCESS";
                $charts->diagram_garis($totalSum_monthly,$totalSum_weekly,$totalSum_fourteenago,$totalSum_twodaysago,$totalSum_yesterday,$totalSum_today,$monthly,$weekly,$fourteenago,$twodaysago,$yesterday,$today,$jam,$nama,$type,$title); 
                ?>
            </div>
        </div>
    </div>
</div>
<hr>