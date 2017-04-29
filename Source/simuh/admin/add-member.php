<?php
/**
 * @File  : add-member.php
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : sukmo
 * @Time  : 2017-02-05 02:00:27
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
      <h2><i class="fa fa-users"></i> Tambah Member</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default"><?php end(ViewMessage()); ?>
        <!-- <div class="panel-heading">
          <h4 class="panel-title">Biodata < <?php //echo $row['username']; ?> ></h4>
        </div> -->
        <div class="panel-body panel-body-nopadding">
          
          <form class="form-horizontal form-bordered" method="POST" action="../action/add-member.php"> 
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Username</label>
              <div class="col-sm-6">
               <input type="text" placeholder="Username" class="form-control" name="username" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Password</label>
              <div class="col-sm-6">
               <input type="password" placeholder="Password" class="form-control" name="password" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" placeholder="Nama" class="form-control" name="nama" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Alamat</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="5" placeholder="Alamat" name="alamat"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Kontak</label>
              <div class="col-sm-6">
                <input type="text" placeholder="Kontak" class="form-control"  name="kontak" />
              </div>
            </div>  
          
          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-info" name="save"><i class="fa fa-save"></i> Simpan</button></form>&nbsp;
          <a class="btn btn-default" href="/admin/member.php" return false;" name="batal"><i class="fa fa-times"></i> Cancel</a>
        </div>
       </div>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->
<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>

