<?php
/**
 * @file  : add-member.php
 * @author: lorosukmo <dev@ipnudiy.or.id>
 * @date  : 2017-01-24 12:15:30
 * @modify: lorosukmo
 * @time  : 2017-04-03 21:10:35
 */

require '../core/config.php'; require '../inc/auth.php';
$username=Filter($_POST['username']);
$password=Filter($_POST['password']);
$nama = Filter($_POST['nama']);
$alamat = Filter($_POST['alamat']);
$kontak = Filter($_POST['kontak']);

if(isset($_POST['save'])){
	if($db->go("SELECT `username` FROM `tbl_member` WHERE `username` = '$username'")){
		Message(3,'Username sudah ada');
		Redirect(base_url.'/admin/add-member.php');
	}
	if(empty($username) || empty($password) || empty($nama) || empty($alamat) || empty($kontak)){
		Message(2, 'Form ada yang kosong');
	}else{
		if($conroute){
			$conroute->add("/ip/hotspot/user", array("name"=>"$username", "password"=>"$password", "disabled"=>"yes"));
			$a = $db->go("INSERT INTO tbl_member (username, password, nama, alamat, telp) VALUES ('$username','$password','$nama','$alamat','$kontak')");
		}else{
			Message(2, 'Koneksi ke-server tidak tersambung');
		}
		
	}
}

if($a){
	Message(1, 'Data telah ditambah');
}else{
	Message(4, 'Data gagal ditambah!!');
}
Redirect(base_url.'/admin/add-member.php');