<p class="d-flex justify-content-center">ANTRIAN CCD</p>
<div class="row justify-content-md-center">


    <div class="col-lg-5 table-responsive w-auto text-center justify-content-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <p class="d-flex justify-content-center">CCD05</p>
            <thead class="thead-dark">
                <tr>
                    <th>TRXID_W</th>
                    <th>TRXID_U</th>
                    <th>TRXID_I</th>
                    <th>TRXID_0</th>
                    <th>TRXID_N</th>
                    <th>TRXID_O</th>
                    <th>TRXID_S</th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "select
                                                    (select count(*) from send_sms_request@rbtccd05_link
                                                    where substr(transaction_id,1,1) ='W') as id_W,
                                                    (select count(*) from send_sms_request@rbtccd05_link
                                                    where substr(transaction_id,1,1) ='U') as id_U,
                                                    (select count(*) from send_sms_request@rbtccd05_link
                                                    where substr(transaction_id,1,1) ='I') as id_I,
                                                    (select count(*) from send_sms_request@rbtccd05_link
                                                    where substr(transaction_id,1,1) ='0') as id_0,
                                                    (select count(*) from send_sms_request@rbtccd05_link
                                                    where substr(transaction_id,1,1) ='N') as id_N,
                                                    (select count(*) from send_sms_request@rbtccd05_link
                                                    where substr(transaction_id,1,1) ='O') as id_O,
                                                    (select count(*) from send_sms_request@rbtccd05_link
                                                    where substr(transaction_id,1,1) ='S') as id_S
                                                    from dual");
													oci_execute($stid);
													while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
														echo "
																			<tr>";
														echo "
																				<td>" . number_format ($row[0]) . "</td>
																				<td class='table-secondary'>" . number_format ($row[1]) . "</td>
																				<td>" . number_format ($row[2]) . "</td>
																				<td class='table-secondary'>" . number_format ($row[3]) . "</td>
                                                                                <td>" . number_format ($row[4]) . "</td>
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>
                                                                                <td>" . number_format ($row[6]) . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-5 table-responsive w-auto text-center justify-content-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
            <p class="d-flex justify-content-center">CCD06</p>
            <thead class="thead-dark">
                <tr>
                    <th>TRXID_W</th>
                    <th>TRXID_U</th>
                    <th>TRXID_I</th>
                    <th>TRXID_0</th>
                    <th>TRXID_N</th>
                    <th>TRXID_O</th>
                    <th>TRXID_S</th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "select
                                                    (select count(*) from send_sms_request@rbtccd06_link
                                                    where substr(transaction_id,1,1) ='W') as id_W,
                                                    (select count(*) from send_sms_request@rbtccd06_link
                                                    where substr(transaction_id,1,1) ='U') as id_U,
                                                    (select count(*) from send_sms_request@rbtccd06_link
                                                    where substr(transaction_id,1,1) ='I') as id_I,
                                                    (select count(*) from send_sms_request@rbtccd06_link
                                                    where substr(transaction_id,1,1) ='0') as id_0,
                                                    (select count(*) from send_sms_request@rbtccd06_link
                                                    where substr(transaction_id,1,1) ='N') as id_N,
                                                    (select count(*) from send_sms_request@rbtccd06_link
                                                    where substr(transaction_id,1,1) ='O') as id_O,
                                                    (select count(*) from send_sms_request@rbtccd06_link
                                                    where substr(transaction_id,1,1) ='S') as id_S
                                                    from dual");
													oci_execute($stid);
													while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
														echo "
																			<tr>";
														echo "
																				<td>" . number_format ($row[0]) . "</td>
																				<td class='table-secondary'>" . number_format ($row[1]) . "</td>
																				<td>" . number_format ($row[2]) . "</td>
																				<td class='table-secondary'>" . number_format ($row[3]) . "</td>
                                                                                <td>" . number_format ($row[4]) . "</td>
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>
                                                                                <td>" . number_format ($row[6]) . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

</div>