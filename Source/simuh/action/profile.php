<?php
/**
 *
 * @author 	: Sukmo <dev@ipnudiy.or.id>
 * @date 	: 2017-01-11 21:21:51
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 06:03:28
 */

require '../core/config.php'; require '../inc/auth.php';
$username=$_SESSION['username'];
$nama = Filter($_POST['nama']);
$alamat = Filter($_POST['alamat']);
$kontak = Filter($_POST['kontak']);

if($_SESSION['level']=='admin')
{
	if(isset($_POST['save'])){
		$password = Filter(md5($_POST['password']));
		if(empty($_POST['password'])){
		$a = $db->go("UPDATE `tbl_admin` SET `nama` = '$nama', `alamat` = '$alamat', `telp` = '$kontak' WHERE `username` = '$username'");
		}else{
			$a = $db->go("UPDATE `tbl_admin` SET `password`= '$password', `nama` = '$nama', `alamat` = '$alamat', `telp` = '$kontak' WHERE `username` = '$username'");
		}
	}
	if($a){
		Message(1, 'Data telah diperbarui');
	}else{
		Message(4, 'Data gagal diperbarui!!');
	}
	Redirect(base_url.'/admin/profile.php');
}
elseif($_SESSION['level']=='member')
{
	if(isset($_POST['save'])){
		$password = Filter($_POST['password']);
		if(empty($_POST['password'])){
		$a = $db->go("UPDATE `tbl_member` SET `nama` = '$nama', `alamat` = '$alamat', `telp` = '$kontak' WHERE `username` = '$username'");
		}else{
			if($conroute){
	  			$conroute->set("/ip/hotspot/user", array(".id"=>"$username", "password"=>"$password"));
				$a = $db->go("UPDATE `tbl_member` SET `password`= '$password', `nama` = '$nama', `alamat` = '$alamat', `telp` = '$kontak' WHERE `username` = '$username'");
			}
		}
	}
	if($a){
		Message(1, 'Data telah diperbarui');
	}else{
		Message(4, 'Data gagal diperbarui!!');
	}
	Redirect(base_url.'/member/profile.php');
}






