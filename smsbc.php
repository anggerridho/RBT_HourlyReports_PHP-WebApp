<p class="d-flex justify-content-center">SMS BROADCAST</p>
<div class="row justify-content-md-center">
    <div class="col-lg-11 table-responsive w-auto text-center justify-content-center">
        <table class="table table-bordered table-light table-hover table-striped">
        <thead class="thead-dark">
                <tr>
                    <th>SMSBC_ID</th>
                    <th>ALIAS</th>
                    <th>CREATE_DATE</th>
                    <th>START_DATE</th>
                    <th>SET_HOUR</th>
                    <th>ACTUAL</th>
                    <th>TITLE</th>
                    <th>STATUS</th>
                    <th>LINE</th>
                    <th>TARGET</th>
                    <th>FINISH_TIME</th>
                    <th>PROGRESS(%)</th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "SELECT
                                                    SMS_BROADCAST_ID,
                                                    ALIAS,
                                                    to_char(to_date(CREATED_DATE, 'yyyymmddhh24miss'), 'yyyymmdd'),
                                                    to_char(to_date(START_BROADCAST, 'yyyymmddhh24miss'), 'yyyymmdd'),
                                                    to_char(to_date(START_BROADCAST, 'yyyymmddhh24miss'), 'hh24:mi'),
                                                    to_char(to_date(ACTUAL_START, 'yyyymmddhh24miss'), 'hh24:mi'),
                                                    TITLE,
                                                CASE
                                                        WHEN STATUS = '3' THEN 'DONE'
                                                        WHEN STATUS = 'P' THEN 'PROCESSING'
                                                        WHEN STATUS = '2' THEN 'WAITING'
                                                        WHEN STATUS = '4' THEN 'CANCELED'
                                                        ELSE Status
                                                    END,
                                                    LAST_LINE,
                                                    TOTAL_COUNT,
                                                    to_char(to_date(FINISHED_DATE, 'yyyymmddhh24miss'), 'yyyymmdd hh24:mi') c11,
                                                    ROUND((LAST_LINE / TOTAL_COUNT)* 100, 2)
                                                FROM
                                                    SMS_BROADCAST_FILE@db1c_link
                                                WHERE
                                                    SUBSTR(START_BROADCAST , 1, 8) BETWEEN TO_CHAR(SYSDATE-1, 'YYYYMMDD') AND TO_CHAR(SYSDATE + 1, 'YYYYMMDD')
                                                ORDER BY
                                                CASE
                                                        WHEN STATUS = '3' THEN 'DONE'
                                                        WHEN STATUS = 'P' THEN 'PROCESSING'
                                                        WHEN STATUS = '2' THEN 'WAITING'
                                                        WHEN STATUS = '4' THEN 'CANCELED'
                                                        ELSE Status
                                                    END ASC,
                                                    SUBSTR(START_BROADCAST, 1, 8) ASC,
                                                    SUBSTR(START_BROADCAST, 9, 4) ASC,
                                                    SUBSTR(ACTUAL_START, 9, 4) ASC");
													oci_execute($stid);
													while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
														echo "
																			<tr>";
														echo "
																				<td>" . $row[0] . "</td>
																				<td>" . $row[1] . "</td>
																				<td>" . $row[2] . "</td>
																				<td>" . $row[3] . "</td>
                                                                                <td>" . $row[4] . "</td>
                                                                                <td>" . $row[5] . "</td>
                                                                                <td>" . $row[6] . "</td>
                                                                                <td>" . $row[7] . "</td>
                                                                                <td>" . number_format ($row[8]) . "</td>
                                                                                <td>" . number_format ($row[9]) . "</td>
                                                                                <td>" . $row[10] . "</td>
                                                                                <td>" . $row[11] . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

</div>