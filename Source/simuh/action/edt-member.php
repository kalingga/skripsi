<?php
/**
 *
 * @author 	: Sukmo <dev@ipnudiy.or.id>
 * @date 	: 2017-01-11 21:21:51
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 06:03:28
 */

require '../core/config.php'; require '../inc/auth.php';
$id=Filter($_POST['idmember']);
$idm=Filter($_POST['uname']);
$nama = Filter($_POST['nama']);
$alamat = Filter($_POST['alamat']);
$kontak = Filter($_POST['kontak']);
$password = Filter($_POST['password']);

if(isset($_POST['save'])){
	if(empty($_POST['password'])){
		$a = $db->go("UPDATE `tbl_member` SET `nama` = '$nama', `alamat` = '$alamat', `telp` = '$kontak' WHERE `id_member` = '$id'");
	}else{
		if($conroute){
	  		$conroute->set("/ip/hotspot/user", array(".id"=>"$idm", "password"=>"$password"));
			$a = $db->go("UPDATE `tbl_member` SET `password`= '$password', `nama` = '$nama', `alamat` = '$alamat', `telp` = '$kontak' WHERE `id_member` = '$id'");
		}
	}
}

if($a){
	Message(1, 'Data telah diupdate');
}else{
	Message(4, 'Data gagal diupdate!!');
}
Redirect(base_url.'/admin/member.php');

