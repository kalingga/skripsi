<?php
/**
 * @file 	: auth.php
 * @author 	: Sukmo
 * @email 	: dev@ipnudiy.or.id
 * @date 	: 2017-01-09 23:09:13
 * @modified: Sukmo
 * @time 	: 2017-01-12 03:42:14
 */

//router connect
$db->go("SELECT * FROM `tbl_config`");
$rmik = $db->fetchArray();
$conroute=RouterOS::connect($rmik['router_ip'], $rmik['router_user'], $rmik['router_pass']);

$username = $_SESSION['username'];
$level = $_SESSION['level'];
if ($_SESSION['level']=='admin') {
  $db->go("SELECT * FROM `tbl_admin` WHERE `username` = '$username'");
  $row = $db->fetchArray();
  $ids=$row['id_admin'];
  $fullname=$row['nama'];
}elseif($_SESSION['level']=='member'){
  $db->go("SELECT * FROM `tbl_member` WHERE `username` = '$username'");
  $row = $db->fetchArray();
  $ids=$row['id_member'];
  $fullname=$row['nama'];
}
if(empty($username) && empty($level)) {
    Redirect(base_url.'/login.php'); }
// }elseif(!empty($username) && !empty($level)) {
//     Redirect(base_url.'/index.php');
// }