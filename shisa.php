<div class="row justify-content-md-center">

    <div class="col-lg-5 table-responsive w-auto text-center justify-content-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
        <p class="d-flex justify-content-center">SISA GRACEPERIODE</p>
            <thead class="thead-dark">
                <tr>
                    <th>SLM04</th>
                    <th>SLM05</th>
                    <th>SLM06</th>
                    <th>SLM07</th>
                    <th>PAS12</th>
                    <th>PAS13</th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "select
                                                    (select count(*)  from RENEWAL_GRACEPERIOD_0@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as GP0,
                                                    (select count(*)  from RENEWAL_GRACEPERIOD_1@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as GP1,
                                                    (select count(*)  from RENEWAL_GRACEPERIOD_2@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as GP2,
                                                    (Select Count(*)  from RENEWAL_GRACEPERIOD_3@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as GP3,
                                                    (Select Count(*)  from RENEWAL_GRACEPERIOD_4@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as GP4,
                                                    (Select Count(*)  from RENEWAL_GRACEPERIOD_5@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as GP5
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
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-5 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
        <p class="d-flex justify-content-center">SISA RETRY</p>
            <thead class="thead-dark">
                <tr>
                    <th>SLM04</th>
                    <th>SLM05</th>
                    <th>SLM06</th>
                    <th>SLM07</th>
                    <th>PAS12</th>
                    <th>PAS13</th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "select
                                                    (select count(*)  from RENEWAL_RETRY_CHARGING_0@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry0,
                                                    (select count(*)  from RENEWAL_RETRY_CHARGING_1@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry1,
                                                    (select count(*)  from RENEWAL_RETRY_CHARGING_2@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry2,
                                                    (Select Count(*)  from RENEWAL_RETRY_CHARGING_3@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry3,
                                                    (Select Count(*)  from RENEWAL_RETRY_CHARGING_4@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry4,
                                                    (Select Count(*)  from RENEWAL_RETRY_CHARGING_5@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry5
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
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-5 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
        <p class="d-flex justify-content-center">SISA ENHANCE</p>
            <thead class="thead-dark">
                <tr>
                    <th>SLM04</th>
                    <th>SLM05</th>
                    <th>SLM06</th>
                    <th>SLM07</th>
                    <th>PAS12</th>
                    <th>PAS13</th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "select
                                                    (select count(*)  from RENEWAL_RETRY_CHARGING_ENH_0@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry_ENH_0,
                                                    (select count(*)  from RENEWAL_RETRY_CHARGING_ENH_1@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry_ENH_1,
                                                    (select count(*)  from RENEWAL_RETRY_CHARGING_ENH_2@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry_ENH_2,
                                                    (Select Count(*)  from RENEWAL_RETRY_CHARGING_ENH_3@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry_ENH_3,
                                                    (Select Count(*)  from RENEWAL_RETRY_CHARGING_ENH_4@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry_ENH_4,
                                                    (Select Count(*)  from RENEWAL_RETRY_CHARGING_ENH_5@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as Retry_ENH_5
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
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-5 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
        <p class="d-flex justify-content-center">SISA DYNAMIC</p>
            <thead class="thead-dark">
                <tr>
                    <th>SLM04</th>
                    <th>SLM05</th>
                    <th>SLM06</th>
                    <th>SLM07</th>
                    <th>PAS12</th>
                    <th>PAS13</th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "select
                                                    (select count(*)  from RENEWAL_RETRY_DYNAMIC_0_0@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as DY0,
                                                    (select count(*)  from RENEWAL_RETRY_DYNAMIC_0_1@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as DY1,
                                                    (select count(*)  from RENEWAL_RETRY_DYNAMIC_0_2@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as DY2,
                                                    (Select Count(*)  from RENEWAL_RETRY_DYNAMIC_0_3@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as DY3,
                                                    (Select Count(*)  from RENEWAL_RETRY_DYNAMIC_0_4@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as DY4,
                                                    (Select Count(*)  from RENEWAL_RETRY_DYNAMIC_0_5@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as DY5
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
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-5 table-responsive w-auto text-center">
        <table class="table table-bordered table-light table-sm table-hover table-striped">
        <p class="d-flex justify-content-center">SISA EXTEND</p>
            <thead class="thead-dark">
                <tr>
                    <th>SLM04</th>
                    <th>SLM05</th>
                    <th>SLM06</th>
                    <th>SLM07</th>
                    <th>PAS12</th>
                    <th>PAS13</th>
                </tr>
            </thead>
            <tbody>
                <?php
													$stid = oci_parse($conn, "select
                                                    (select count(*)  from RENEWAL_RETRY_EXTEND_0@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as EX0,
                                                    (select count(*)  from RENEWAL_RETRY_EXTEND_1@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as EX1,
                                                    (select count(*)  from RENEWAL_RETRY_EXTEND_2@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as EX2,
                                                    (Select Count(*)  from RENEWAL_RETRY_EXTEND_3@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as EX3,
                                                    (Select Count(*)  from RENEWAL_RETRY_EXTEND_4@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as EX4,
                                                    (Select Count(*)  from RENEWAL_RETRY_EXTEND_5@db1c_link
                                                    where TO_DATE(substr(NEXT_RATING_DATE,1,8), 'YYYYMMDD')+ DELAYED_DAYS <=
                                                    to_date(to_char(sysdate,'yyyymmdd'),'yyyymmdd')) as EX5
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
                                                                                <td class='table-secondary'>" . number_format ($row[5]) . "</td>";
														echo "
																			</tr>";
													}
												?>
            </tbody>
        </table>
    </div>

</div>

<?php
echo "<hr>";
include_once("ccdqueue.php");
echo "<hr>";
include_once("timespan.php");
?><br>