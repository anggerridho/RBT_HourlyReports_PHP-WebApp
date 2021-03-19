<div class="row justify-content-md-center">
    <div class="col-lg-11 table-responsive w-auto text-center justify-content-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
        <p class="d-flex justify-content-center">SMS RECOMENDATION</p>
        <thead class="thead-dark">
                <tr>
                    <th>HOUR</th>
                    <th><?php echo date('Ymd', strtotime('-7 days'));?></th>
                    <th><?php echo date('Ymd', strtotime('-6 days'));?></th>
                    <th><?php echo date('Ymd', strtotime('-5 days'));?></th>
                    <th><?php echo date('Ymd', strtotime('-4 days'));?></th>
                    <th><?php echo date('Ymd', strtotime('-3 days'));?></th>
                    <th><?php echo date('Ymd', strtotime('-2 days'));?></th>
                    <th><?php echo date('Ymd', strtotime('-1 days'));?></th>
                    <th><?php echo date('Ymd', strtotime('0 days'));?></th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "select * FROM V_RECO_REVENUE_HORLY");
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
                                                                                <td>" . $row[8] . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

</div>