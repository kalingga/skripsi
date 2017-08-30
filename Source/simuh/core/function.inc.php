<?php
/**
 * @file 	: function.inc.php
 * @author 	: M. Supian (PrivCode)
 * @email 	: privcode@gmail.com
 * @date 	: 2017-01-09 20:46:52
 * @modified: Sukmo
 * @time 	: 2017-01-16 16:54:50
 */


function indoDate($timestamp = '', $date_format = 'l, j F Y | H:i') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Aha',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Ahad',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date}";
    return $date;
}

function formatBytes($bytes, $dec = 2){
    $size   = array(' B', ' kB', ' MB', ' GB', ' TB', ' PB', ' EB', ' ZB', ' YB');
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

function Status($data){
	if($data=='1'){
		$data="Aktif";
	}else{
		$data="Non-Aktif";
	}
}

function classAktif($requestUri){
    $current_file_name = basename($_SERVER['PHP_SELF']);

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

function Filter($data){
	$block = array('"',"'",';');
	return Sqli(trim(str_replace($block, '', $data)));
}

function Sqli($data){
	global $setting;
	$block = array('concat', 'union', 'base64_decode', 'group_concat', 'tables', 'public_html', '../', 'column', 'cmd', 'cookie', 'from', 'where','exec','shell','wget','axel','curl','truncate','/**/' , '0x3a', 'null', 'bun','s@bun', '%', 'char', 'or%', 'insert', "'='", "'or'");
	$b    = count($block);
	$url  = strtolower($_SERVER['REQUEST_URI']);
	$url2 = strtolower($_SERVER['QUERY_STRING']);
	for ($i=0; $i< $b; $i++) { 
		if(stristr($data, $block[$i]) || stripos($data, $block[$i]) || stristr($url, $block[$i]) || stripos($url, $block[$i]) || stristr($url2, $block[$i]) || stripos($url2, $block[$i])){
			Redirect(base_url.'/noob.html');
			exit();
		} else {
			return $data;
		}
	}
}

function Redirect($url = '/'){
	header('location:'.$url);
}

function DateTime(){
    return Date('H:i:s d M Y', time());
}

function Message($no,$msg = ''){
	if($no == 1){
		$type = 'success';
	} else if($no == 2){
		$type = 'info';
	} else if($no == 3){
		$type = 'warning';
	} else if($no == 4){
		$type = 'danger';
	}
    $_SESSION[$type]['Message'] = !isset($_SESSION[$type]['Message']) ? $msg : $msg.'<br/>'.$_SESSION[$type]['Message'];
}

function ViewMessage(){
	if(isset($_SESSION['success']['Message'])) {
		$type = 'success';
	} else if(isset($_SESSION['info']['Message'])) {
		$type = 'info';
	} else if(isset($_SESSION['warning']['Message'])) {
		$type = 'warning';
	} else if(isset($_SESSION['danger']['Message'])) {
		$type = 'danger';
	}

    if(isset($type)){
    	$msg = trim($_SESSION[$type]['Message']);
    	unset($_SESSION[$type]['Message']);
    	echo'<div class="alert alert-block alert-'.$type.' fade in">
    		 <button data-dismiss="alert" class="close close-sm" type="button">
         	 <i class="fa fa-times"></i>
         	 </button>'.$msg.'</div>';
    }
}

