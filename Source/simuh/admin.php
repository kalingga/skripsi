<?php
/**
 * @file 	: admin.php
 * @author 	: Sukmo <dev@ipnudiy.or.id>
 * @date 	: 2017-01-12 02:17:48
 * @modified: Sukmo
 * @time 	: 2017-01-12 02:34:27
 */
require 'core/config.php';
if(empty($_SESSION['username'] || empty($token))) {
    Redirect(base_url.'/info.php');
}
echo "Selamat ".$_SESSION['username'];

?>
