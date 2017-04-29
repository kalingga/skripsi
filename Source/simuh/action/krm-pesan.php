<?php
/**
 *
 * @author 	: Sukmo <dev@ipnudiy.or.id>
 * @date 	: 2017-01-11 21:21:51
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 06:03:28
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='admin'){
	$db->go("SELECT * FROM `tbl_admin` WHERE `username` = '$username'");
	$row = $db->fetchArray();

	$id=$row['id_admin'];
	$pilmember=Filter($_POST['pilmember']);
	$subyek = Filter($_POST['subyek']);
	$pesan = Filter($_POST['pesan']);

	if(isset($_POST['kirim'])){
		if(empty($pilmember) || empty($subyek) || empty($pesan)){
			Message(2, 'Form ada yang kosong');
		}else{
			$a = $db->go("INSERT INTO tbl_pesan (id_sender, id_receiver, subject, pesan) VALUES ('$id','$pilmember','$subyek','$pesan')");
		}
	}

	if($a){
		Message(1, 'Pesan telah dikirim');
	}else{
		Message(4, 'Pesan gagal dikirim!!');
	}
	Redirect(base_url.'/admin/add-pesan.php');
}elseif($_SESSION['level']=='member'){
	$db->go("SELECT * FROM `tbl_member` WHERE `username` = '$username'");
	$row = $db->fetchArray();

	$id=$row['id_member'];
	$pilmember=Filter($_POST['pilmember']);
	$subyek = Filter($_POST['subyek']);
	$pesan = Filter($_POST['pesan']);

	if(isset($_POST['kirim'])){
		if(empty($pilmember) || empty($subyek) || empty($pesan)){
			Message(2, 'Form ada yang kosong');
		}else{
			$a = $db->go("INSERT INTO tbl_pesan (id_sender, id_receiver, subject, pesan) VALUES ('$id','$pilmember','$subyek','$pesan')");
		}
	}

	if($a){
		Message(1, 'Pesan telah dikirim');
	}else{
		Message(4, 'Pesan gagal dikirim!!');
	}
	Redirect(base_url.'/member/add-pesan.php');
}