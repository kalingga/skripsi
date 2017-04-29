<?php
/**
 * @file 	: logout.php
 * @author 	: Sukmo <dev@ipnudiy.or.id>
 * @date 	: 2017-01-12 03:24:21
 * @modified: Sukmo
 * @time 	: 2017-01-12 04:08:32
 */
require '../core/config.php'; require '../inc/auth.php';
session_destroy();
Redirect(base_url.'/login.php');