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

include '../header.php'; 
$db->go("SELECT * FROM `tbl_admin` WHERE `username` = '$username'");
$row = $db->fetchArray();

?>


<!-- Preloader -->
<?php include '../inc/pre.php'; ?>

<section>
  
  <?php include '../inc/sidebar.php'; ?>
  
  <div class="mainpanel">
    
    <?php include '../inc/nav.php'; ?> 
        
    <div class="pageheader">
      <h2><i class="fa fa-user"></i> Profile</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
        <div class="panel-body panel-body-nopadding">
          <?php viewMessage(); ?>
          <form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url.'/action/profile.php';?>"> 
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Username</label>
              <div class="col-sm-6">
               <input type="text" placeholder="<?php echo $row['username']; ?>" id="disabledinput" class="form-control" disabled="" />
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
          <button class="btn btn-default" name=batal><i class="fa fa-times"></i> Batal</button>
        </div>
       </div></form>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->
<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>

