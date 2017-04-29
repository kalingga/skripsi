<?php
/**
 * @file  : mon.php
 * @author: sukmo <dev@ipnudiy.or.id>
 * @date  : 2017-04-02 07:22:33
 * @modify: lorosukmo
 * @time  : 2017-04-05 05:34:42
 */
require '../core/config.php';require '../inc/auth.php';

switch ($_GET['hit']) {

  case 'cpesan':
    $st=$db->go("SELECT * FROM `tbl_pesan` WHERE `status` = '1' AND `id_receiver` = '$ids'");
        if(!$db->numRows()==0){ $temp=array("jmlpsn"=>$db->numRows());echo json_encode($temp);}
    break;

  case 'jam':
  	$jam = array('jam' => indoDate(datetime(), 'H:i:s'));
	echo json_encode($jam);
	break;
  case 'tgl':
  	$jam = array('tgl' => indoDate(datetime(), 'l, j F Y'));
	echo json_encode($jam);
	break;
  case 'jamu':
  	$jam = array('jamu' => indoDate(datetime(), 'H'));
	echo json_encode($jam);
  	break;
  case 'metu':
  	$jam = array('metu' => indoDate(datetime(), 'i'));
	echo json_encode($jam);
  	break;
  case 'detu':
  	$jam = array('detu' => indoDate(datetime(), 's'));
	echo json_encode($jam);
  	break;
  default:
    echo "Arni Juliawati";
    break;
}