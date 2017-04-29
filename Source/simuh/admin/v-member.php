<?php
/**
 * @File  : profile.php
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : sukmo
 * @Time  : 2017-01-24 17:04:30
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='admin'){
$id=Filter($_GET['id']);
include '../header.php'; 
$db->go("SELECT * FROM `tbl_member` WHERE `id_member` = '$id'");
$row = $db->fetchArray();
    
    
?>

<!-- Preloader -->
<?php include '../inc/pre.php'; ?>

<section>
  
  <?php include '../inc/sidebar.php'; ?>
  
  <div class="mainpanel">
    
    <?php include '../inc/nav.php'; ?> 
<?php
switch ($_GET['hit']) {
  case 'nonaktif':
    $username=$row['username'];
    $id=$row['id_member'];
    $a=$db->go("UPDATE tbl_member AS mem INNER JOIN tbl_billing AS bill ON (mem.id_member= bill.id_user)SET mem.status='0', bill.status = '0' WHERE bill.status = '1' AND bill.id_user = '$id'");
    $conroute->set("/ip/hotspot/user", array(".id"=>"$username", "disabled"=>"yes", "limit-uptime"=>"0","profile"=>"default"));
    if($a){
      Message(2, 'Data telah dinon-aktifkan');
      
    }else{
      Message(4, 'Data gagal dinon-aktifkan!!');
    }
    Redirect(base_url.'/admin/member.php');
    break;
  case 'simpan':
    $idp=$_POST['piltype'];
    $db->go("SELECT * FROM tbl_paket WHERE id_paket = '$idp'");
    $pe=$db->fetchArray();
    $masa=$pe['masa_aktif'];
    $prof=$pe['nama_paket'];
    $newmasa=Date('Y-m-d H:i:s', strtotime("$masa days"));
    $masabaru=Date('H:i:s', strtotime("$masa days"));
    $sekar=Date('Y-m-d H:i:s');
    $username=$row['username'];
    $uptim=$masa.'d '.$masabaru; 

    if($masa!=='Unlimited'){
      if($conroute){
        $conroute->set("/ip/hotspot/user", array(".id"=>"$username", "disabled"=>"no", "limit-uptime"=>"$uptim","profile"=>"$prof"));
        $a=$db->go("INSERT INTO tbl_billing (id_user, id_paket, daftar, expire, id_admin) VALUES ('$id', '$idp', '$sekar', '$newmasa', '$ids')");
        $db->go("UPDATE tbl_member SET status='1' WHERE id_member='$id'");
      }else{Message(2, 'Mikrotik tidak menyambung!!');}
    }else{
      if($conroute){
        $conroute->set("/ip/hotspot/user", array(".id"=>"$username", "disabled"=>"no","profile"=>"$prof"));
        $a=$db->go("INSERT INTO tbl_billing (id_user, id_paket, daftar, id_admin) VALUES ('$id', '$idp', '$sekar', '$ids')");
        $db->go("UPDATE tbl_member SET status='1' WHERE id_member='$id'");
      }else{Message(2, 'Mikrotik tidak menyambung!!');}
    }

    if($a){
      Message(1, 'Data telah diaktivasi');
    }else{
      Message(4, 'Data gagal diaktivasi!!');
    }
    Redirect(base_url.'/admin/member.php');
    break;
  case 'aktivasi':
?>
    <div class="pageheader">
      <h2><i class="fa fa-user"></i> Aktivasi Member</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
        <div class="panel-body panel-body-nopadding">
          <?php viewMessage(); ?>
          <form class="form-horizontal form-bordered" method="POST" action="?id=<?php echo $id; ?>&hit=simpan"> 
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Username</label>
              <div class="col-sm-6"><input type="hidden"  value="<?php echo $row['id_member']; ?>" name="idmember">
               <input type="text" placeholder="<?php echo $row['username']; ?>" id="disabledinput" class="form-control" disabled=""/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Ambil Paket</label>
              <div class="col-sm-6">
                <select name="piltype" class="form-control chosen-select" placeholder="Pilih Paket...">
                <option>Pilih Paket...</option>
                <?php
                  $db->go("SELECT * FROM tbl_paket");
                  //$pk=$db->fetchArray();
                  while ($pk=$db->fetchArray()) {
                    $npk=$pk['nama_paket'];
                    $id=$pk['id_paket'];
                    echo '<option value="'.$id.'">'.$npk.'</option>';
                  }
                ?>
                </select>
              </div>
            </div>
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-info" name="save"><i class="fa fa-unlock"></i> Activate</button>&nbsp;
          <a href="member.php" class="btn btn-default" name=batal><i class="fa fa-times"></i> Batal</a>
        </div>
       </div></form>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->

<!-- </section> -->
<?php include '../footer.php';
    break;
  
  default:
?>        
    <div class="pageheader">
      <h2><i class="fa fa-user"></i> Lihat Member</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
        <div class="panel-body panel-body-nopadding">
          <?php viewMessage(); ?>
          <form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url.'/action/edt-member.php';?>"> 
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Username</label>
              <div class="col-sm-6"><input type="hidden"  value="<?php echo $row['id_member']; ?>" name="idmember">
               <input type="text" placeholder="<?php echo $row['username']; ?>" id="disabledinput" class="form-control" name="uname" value="<?php echo $row['username']; ?>" readonly="readonly"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" placeholder="<?php echo $row['nama']; ?>" class="form-control" value="<?php echo $row['nama']; ?>" name="nama"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Alamat</label>
              <div class="col-sm-6">
                <textarea name="alamat" class="form-control" rows="5"><?php echo $row['alamat']; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Kontak</label>
              <div class="col-sm-6">
                <input type="text" name="kontak" placeholder="<?php echo $row['telp']; ?>" class="form-control" value="<?php echo $row['telp']; ?>" />
              </div>
            </div>  
            <div class="form-group">
              <label class="col-sm-3 control-label">Password</label>
              <div class="col-sm-6">
                <input type="password" name="password" placeholder="Password" class="form-control"/>
                *) Kosongkan jika tidak merubah password
              </div>
            </div>  
          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-info" name="save"><i class="fa fa-save"></i> Simpan</button>&nbsp;
          <a href="member.php" class="btn btn-default" name=batal><i class="fa fa-times"></i> Batal</a>
        </div>
       </div></form>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->

<!-- </section> -->
<?php include '../footer.php';
break;
}
}elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  }
?>

