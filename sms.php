<?php
include 'class/utils.php';

$no = $_GET['no'];
$ms = $_GET['ms'];

$DEST_NUMBER = explode(" ", $no);

foreach ($DEST_NUMBER as $PENERIMA) {

$query = "insert into send_sms_request@rbtccd06_link(sms_mt_msg_id,transaction_id, priority, status, send_date, 
seg_id, seg_tot, seg_num, msg_type, source_addr,dest_addr, rgt_dlv_flg, msg, callback_num) 
select send_sms_request_seq.nextval@rbtccd06_link,null, 9, 0, TO_CHAR(SYSDATE,'YYYYMMDDHH24MISS'), 0, 0, 0, 0, '1212059',
'$PENERIMA', 1, '$ms', '1212' from dual";

$stid = oci_parse($conn, $query);
oci_execute($stid);

}
