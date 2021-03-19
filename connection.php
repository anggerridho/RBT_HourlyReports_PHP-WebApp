<?php

function OpenCon(){
    $username = "RBTRPTN";
    $password = "RBTRPTN";
    $host = "192.168.10.66:1522/RBTRPTN";
    // $host = "192.168.0.7:1521/RBTRPTN";
    // $conn = oci_connect($username,$password,$host) or die("Connect failed". $conn -> error);
    $conn = oci_connect($username,$password,$host);
    if (!$conn) {
        $m = oci_error();
        echo "<div class='alert alert-warning'><span class='fa fa-exclamation-triangle'> ".$m['message']." </span></div>";
        ?>
        <img src="img/404_error.png" alt="Girl in a jacket" width="100%" height="100%"><br>
        <?php
        $conn -> close();
        exit;
     }
    return $conn;
}

function CloseCon($conn)
{
   $conn -> close();
}

?>
