<?php
/**
 * @file 	: setting.php
 * @author 	: Sukmo <dev@ipnudiy.or.id>
 * @date 	: 2017-01-11 21:21:51
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 04:45:30
 */

require '../core/config.php'; require '../inc/auth.php';
if(isset($_POST['save'])){
	$nama = Filter($_POST['rname']);
	$rip = Filter($_POST['rip']);
	$ruser = Filter($_POST['ruser']);
	$rpass = Filter($_POST['rpass']);

	$a = $db->go("UPDATE `tbl_config` SET `router_name` = '$nama',`router_ip`= '$rip', `router_user` = '$ruser', `router_pass` = '$rpass'");
	if($a){
		Message(1, 'Konfigurasi telah disimpan');
	}else{
		Message(3, 'Konfigurasi gagal disimpan!!');
	}
}


if(isset($_POST['test'])){
	$rip = Filter($_POST['rip']);
	$ruser = Filter($_POST['ruser']);
	$rpass = Filter($_POST['rpass']);

	$conroute = RouterOS::connect($rip, $ruser, $rpass);
	if($conroute){
		Message(1, 'Sambungan sukses');
	}else{
		Message(3, 'Sambungan gagal!!');
	}
}

Redirect(base_url.'/admin/config.php');