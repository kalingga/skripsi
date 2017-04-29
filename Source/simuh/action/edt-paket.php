<?php
/**
 *
 * @author 	: Sukmo <dev@ipnudiy.or.id>
 * @date 	: 2017-01-11 21:21:51
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 06:03:28
 */

require '../core/config.php'; require '../inc/auth.php';
$namapaket=Filter($_POST['namapaket']);
$type=Filter($_POST['piltype']);
$masaaktif = Filter($_POST['masaaktif']);
$bw['0'] = Filter($_POST['upload'].'k');
$bw['1'] = Filter($_POST['download'].'k');
$band=implode("/", $bw);

if(isset($_POST['simpan'])){
	if($type=='0'){
		if($conroute){
			$conroute->set("/ip/hotspot/user/profile", array(".id"=>"$namapaket", "rate-limit"=>"$band"));
			$a = $db->go("UPDATE tbl_paket SET bandwidth='$band' WHERE nama_paket = '$namapaket'");
		}else{
			Message(2, 'Koneksi ke-server tidak tersambung');
		}
	}elseif($type=='1'){
		if($conroute){
			$conroute->set("/ip/hotspot/user/profile", array(".id"=>"$namapaket", "name"=>"$namapaket", "rate-limit"=>"$band"));
			$a = $db->go("UPDATE tbl_paket SET masa_aktif='$masaaktif', bandwidth='$band' WHERE nama_paket = '$namapaket'");
		}else{
			Message(2, 'Koneksi ke-server tidak tersambung');
		}
	}
}

if($a){
	Message(1, 'Data telah diperbarui');
}else{
	Message(4, 'Data gagal diperbarui!!');
}
Redirect(base_url.'/admin/paket.php');