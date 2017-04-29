<?php
/**
 *
 * @author 	: Sukmo <dev@ipnudiy.or.id>
 * @date 	: 2017-01-11 21:21:51
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 06:03:28
 */

require '../core/config.php'; require '../inc/auth.php';
$id=Filter($_GET['id']);
$idm=Filter($_GET['del']);
if($_SESSION['level']=='admin'){
if(isset($_GET['id']) && isset($_GET['del'])){
	if($conroute){
	  $conroute->remove("/ip/hotspot/user/profile", array(".id"=>"$idm"));
	  $a = $db->go("DELETE FROM tbl_paket WHERE `id_paket` = '$id'");
	}
}

if($a){
	Message(1, 'Data telah dihapus');
}else{
	Message(4, 'Data gagal dihapus!!');
}
Redirect(base_url.'/admin/paket.php');
}