<?php
    include 'connection.php';
    require_once 'class/Charts.php';
    $charts= new Charts();
    $conn = OpenCon();
    
    //session 
    $_SESSION['mounthly'];
    $_SESSION['fourteenago'];
    $_SESSION['weekly'];
    $_SESSION['sixdaysago'];
    $_SESSION['fivedaysago'];
    $_SESSION['fourdaysago'];
    $_SESSION['twodaysago'];
    $_SESSION['yesterday'];
    $_SESSION['today'];
    $_SESSION['hour'];

    date_default_timezone_set('Asia/Jakarta');
    
    $jam = date("H", strtotime('-1 hour'));
    $jam1 = date("H", strtotime('0 hour'));
    // if (!($jam == 00)) {
    if ($jam1 == 00) {
        $today = date('Ymd', strtotime('-1 days'));
        $yesterday = date('Ymd', strtotime('-2 days'));
        $twodaysago = date('Ymd', strtotime('-3 days'));
        $fourdaysago = date('Ymd', strtotime('-4 days'));
        $fivedaysago = date('Ymd', strtotime('-5 days'));
        $sixdaysago = date('Ymd', strtotime('-6 days'));
        $weekly = date('Ymd', strtotime('-8 days'));
        $fourteenago = date('Ymd', strtotime('-15 days'));
        $monthly = date('Ymd', strtotime('-31 days'));
    } else {
        $today = date('Ymd', strtotime('0 days'));
        $yesterday = date('Ymd', strtotime('-1 days'));
        $twodaysago = date('Ymd', strtotime('-2 days'));
        $fourdaysago = date('Ymd', strtotime('-3 days'));
        $fivedaysago = date('Ymd', strtotime('-4 days'));
        $sixdaysago = date('Ymd', strtotime('-5 days'));
        $weekly = date('Ymd', strtotime('-7 days'));
        $fourteenago = date('Ymd', strtotime('-14 days'));
        $monthly = date('Ymd', strtotime('-30 days'));
    }
    
?>