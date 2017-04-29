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

if($_SESSION['level']=='admin'){
	if(isset($_GET['id'])){
		$a = $db->go("DELETE FROM tbl_pesan WHERE `id_pesan` = '$id' AND `id_receiver` = '$ids'");
	}

	if($a){
		Message(1, 'Data telah dihapus');
	}else{
		Message(4, 'Data gagal dihapus!!');
	}
	Redirect(base_url.'/admin/pesan.php');
}elseif($_SESSION['level']=='member'){
	if(isset($_GET['id'])){
		$a = $db->go("DELETE FROM tbl_pesan WHERE `id_pesan` = '$id' AND `id_receiver` = '$ids'");
	}

	if($a){
		Message(1, 'Data telah dihapus');
	}else{
		Message(4, 'Data gagal dihapus!!');
	}
	Redirect(base_url.'/member/pesan.php');
}