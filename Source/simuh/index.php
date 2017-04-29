<?php

/**
 * @file 	: index.php
 * @author 	: sukmo wijoyo
 * @email 	: dev@ipnudiy.or.id
 * @date 	: 2017-01-09 20:46:52
 * @modified: Sukmo
 * @time 	: 2017-01-12 04:27:36
 */
require 'core/config.php'; require 'inc/auth.php';

if($level=='admin'){
	Redirect(base_url.'/admin/index.php');
}elseif($level=='member'){
	Redirect(base_url.'/member/index.php');
}else {
	Redirect(base_url.'/login.php');
}

 //kaki
?>