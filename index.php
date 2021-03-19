<?php
    session_start();
    $page = $_SERVER['PHP_SELF'];
    $sec = "1800";
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="
						<?php echo $sec?>;URL='
						<?php echo $page?>'">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reporting RiBeT</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
    <style>
    table.table-sm {
        font-size: 10px;
    }

    th,
    td {
        padding: 0px;
    }

    .block {
        width: 50%;
        font-size: 10px;
    }
    </style>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</head>

<body id="page-top" class="bg-white">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navbar-brand-icon navbar-brand-text">
                            <a class="navbar-brand nav-item" href="index.php?home">
                                <i class="fas fa-home"></i>
                            </a>
                        </div>
                        
                    </div>
                </nav> -->

                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->
                
                    <a class="navbar-brand " href="index.php?home"><i class="fas fa-home"></i></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    REPORT-HOURLY
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index.php?trx">TRX</a>
                                    <a class="dropdown-item" href="index.php?renewal">RENEWAL</a>
                                    <a class="dropdown-item" href="index.php?purchase">PURCHASE</a>
                                    <a class="dropdown-item" href="index.php?graceperiode">GRACE-PERIODE</a>
                                    <a class="dropdown-item" href="index.php?retry">RETRY</a>
                                    <a class="dropdown-item" href="index.php?enhance">ENHANCE</a>
                                    <a class="dropdown-item" href="index.php?dynamic">DYNAMIC</a>
                                    <a class="dropdown-item" href="index.php?extend">EXTEND</a>
                                    <a class="dropdown-item" href="index.php?host_id">HOST ID</a>
                                    <hr>
                                    <a class="dropdown-item" href="index.php?errorcode_cde">ERROR-CODE-CDE</a>
                                    <a class="dropdown-item" href="index.php?errorcode">ERROR-CODE</a>
                                    <a class="dropdown-item" href="index.php?cdrnsprecomendation">CDR-NSP-RECO</a>
                                    <a class="dropdown-item" href="zabbix.php">ZABBIX</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link " href="index.php?shisa" id="navbarDropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    CEK-RENEW
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link " href="index.php?smsbc" id="navbarDropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    SMSBC
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    CHANNEL
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index.php?channel">ALL CHANNEL</a>
                                    <a class="dropdown-item" href="index.php?one_channel">ONE CHANNEL</a>

                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
<br>
                <div class="container-fluid">
                    <!-- <pre>
                    <?php print_r($_SESSION)?>
                </pre> -->
                    <?php
                    include 'class/utils.php';
					if (isset($_GET['channel'])){
                        include 'channel.php';
					} else if (isset($_GET['errorcode'])){
                        include 'ercoderenewal.php';
					} else if (isset($_GET['cdrnsprecomendation'])){
                        include 'broadcastreco.php';
					} else if (isset($_GET['timespan'])){
                        include 'timespan.php';
					} else if (isset($_GET['extend'])){
						include 'extend.php';
					} else if (isset($_GET['dynamic'])){
						include 'dynamic.php';
					} else if (isset($_GET['enhance'])){
						include 'enhance.php';
					} else if (isset($_GET['retry'])){
						include 'retry.php';
					} else if (isset($_GET['graceperiode'])){
						include 'graceperiode.php';
					} else if (isset($_GET['purchase'])){
						include 'purchase.php';
					} else if (isset($_GET['renewal'])){
                        include 'renewal.php';
                    } else if (isset($_GET['trx'])){
                        include 'trx.php';
                    } else if (isset($_GET['smsbc'])){
                        include 'smsbc.php';
                    } else if (isset($_GET['shisa'])){
                        include 'shisa.php';
                    } else if (isset($_GET['timespan'])){
                        include 'timespan.php';
					}elseif (isset($_GET['one_channel'])) {
                        include 'channel_one_per_hour.php';
                    } elseif (isset($_GET['errorcode_cde'])) {
                        include 'ercode_CDE_502.php';
                    }elseif (isset($_GET['host_id'])) {
                        include 'hostId.php';
                    }else {
                        include 'home.php';
                    }
                    
                    // errorcode_cde
					?>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; System Engineer 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>