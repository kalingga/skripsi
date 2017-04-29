<?php

require '../core/config.php';
if($_POST['level']=='member'){
	$uname  = Filter($_POST['username']);
	$db->go("SELECT `username`, `password` FROM `tbl_member` WHERE `username` = '$uname'");
	$row = $db->fetchArray();

	$passwd = $_POST['password'];

	if($db->numRows() == 0) {
		Message(2, 'Akun belum terdaftar');
	} else if($row['password'] != $passwd) {
		Message(4, 'Password salah');
	} else {
		$username = $row['username'];
		$level = $_SESSION['level'] = 'member';
		$a = $_SESSION['username'] = $username;
		if($a && $level){
			Redirect(base_url.'/index.php');
			exit();
		} else {
			Message(3, 'Tolong hubungi admin');
		}
	}
}
elseif($_POST['level']=='admin'){
	$uname  = Filter($_POST['username']);
	$db->go("SELECT `username`, `password` FROM `tbl_admin` WHERE `username` = '$uname'");
	$row = $db->fetchArray();

	$passwd = md5($_POST['password']);

	if($db->numRows() == 0) {
		Message(2, 'Akun belum terdaftar');
	} else if($row['password'] != $passwd) {
		Message(4, 'Password salah');
	} else {
		$username = $row['username'];
		$level = $_SESSION['level'] = 'admin';
		$a = $_SESSION['username'] = $username;
		if($a && $level){
			Redirect(base_url.'/index.php');
			exit();
		} else {
			Message(3, 'Tolong hubungi admin');
		}
	}
}
Redirect(base_url.'/login.php');