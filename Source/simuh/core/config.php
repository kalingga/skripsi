<?php
/**
 * @file 	: config.php
 * @author 	: sukmo wijoyo
 * @email 	: dev@ipnudiy.or.id
 * @date 	: 2017-01-09 20:46:52
 * @modified: Sukmo
 * @time 	: 2017-01-12 02:14:42
 */

error_reporting(0);
session_start();
ob_start();
date_default_timezone_set("Asia/Jakarta");
// Open loader
require 'loader.php';
// Open Connection
define('db_host', 'localhost'); // hostname
define('db_user', 'root'); // mysql username
define('db_pass', 'toor'); // mysql password
define('db_name', 'db_simuh'); // mysql database
// Settings
define('base_url', 'http://simuh.sukmo.dev'); // Base URL
define('app_name', 'SiMUH');
define('app_tagline', 'Sistem Manajemen User Hotspot');
define('app_desc', 'Sistem Manajemen User Hotspot Pondok Pesantren Al-Luqmaniyyah - Yogyakarta');
// Do not edit this code
$db = new config(db_host,db_user,db_pass,db_name); // Connection
if(!$db) {
    die('There is something were wrong :( ');
}
