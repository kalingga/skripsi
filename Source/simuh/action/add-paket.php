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
	$db->go("SELECT `nama_paket` FROM `tbl_paket` WHERE `nama_paket` = '$namapaket'");
	$cep=$db->fetchArray();
	if($cep['nama_paket']!==NULL){
			//Message(3, 'Maaf, Nama paket sudah ada dan tidak boleh sama.');
			Redirect(base_url.'/admin/add-paket.php');
	
	}elseif($cep['nama_paket']==NULL){
		if($type=='0'){
			if(empty($namapaket) || empty($bw['0']) || empty($bw['1'])){
				Message(2, 'Form ada yang kosong');
			}else{
				if($conroute){
					$conroute->add("/ip/hotspot/user/profile", array("name"=>"$namapaket", "rate-limit"=>"$band"));
					$a = $db->go("INSERT INTO tbl_paket (nama_paket, jenis_paket, bandwidth, masa_aktif) VALUES ('$namapaket','$type','$band', 'Unlimited')");
				}else{
					Message(2, 'Koneksi ke-server tidak tersambung');
				}
			}
		}elseif($type=='1'){
			if(empty($namapaket) || empty($masaaktif) || empty($bw['0']) || empty($bw['1'])){
				Message(2, 'Form ada yang kosong');
			}else{
				if($conroute){
					$conroute->add("/ip/hotspot/user/profile", array("name"=>"$namapaket", "rate-limit"=>"$band"));
					$a = $db->go("INSERT INTO tbl_paket (nama_paket, jenis_paket, bandwidth, masa_aktif) VALUES ('$namapaket','$type','$band','$masaaktif')");
				}else{
					Message(2, 'Koneksi ke-server tidak tersambung');
				}
			}
		}
	}
	
}

if($a){
	Message(1, 'Data telah ditambah');
}else{
	Message(4, 'Data gagal ditambah!!');
}
Redirect(base_url.'/admin/add-paket.php');