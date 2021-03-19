<?php
class Quer{
    public function show_data($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today,$jam,$trx,$penting){
        include 'connection.php';
        $conn = OpenCon();
        $query = "SELECT * FROM (SELECT hr,calling_date,$trx FROM RBTRPTN_REPORT_HOURLY WHERE hr BETWEEN '00' AND '$jam' AND trx IN ('$penting'))
        pivot (sum ($trx) FOR CALLING_DATE IN ($monthly,$fourteenago,$weekly,$twodaysago,$yesterday,$today)) ORDER BY hr"
        $stid = oci_parse($conn, $query);
        oci_execute($stid);
        if (oci_num_rows($query)>0) {
            # code...
            while ($row = oci_fetch_array($stid, OCI_BOTH)) {
                $data[]= $row;
                // echo "
                //                     <tr>";
            // echo "
            //                         <td>" . $row[0] . "</td>
            //                         <td>" . number_format ($row[1]) . "</td>
            //                         <td>" . number_format ($row[2]) . "</td>
            //                         <td>" . number_format ($row[3]) . "</td>
            //                         <td>" . number_format ($row[4]) . "</td>
            //                         <td>" . number_format ($row[5]) . "</td>
            //                         <td>" . number_format ($row[6]) . "</td>";
            // echo "
            //                     </tr>";
            }
            return $data
        }
    }
}
?>