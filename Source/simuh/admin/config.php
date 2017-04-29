<?php
/**
 * @File  : config.php
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : sukmo
 * @Time  : 2017-01-31 11:18:33
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
      <h2><i class="fa fa-cogs"></i> Konfigurasi</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
        <!-- <div class="panel-heading">
          <h4 class="panel-title">Konfigurasi Router</h4>
        </div> -->
        <div class="panel-body panel-body-nopadding">
          <?php
            $db->go("SELECT * FROM tbl_config");
            $conf=$db->fetchArray(); ViewMessage();
           ?>
          <form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url.'/action/setting.php';?>"> 
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Nama Router</label>
              <div class="col-sm-6">
               <input type="text" name="rname" value="<?php echo $conf['router_name']; ?>" id="disabledinput" class="form-control"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">IP Router</label>
              <div class="col-sm-6">
                <input type="text" name="rip" placeholder="" class="form-control" value="<?php echo $conf['router_ip']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Username Router</label>
              <div class="col-sm-6">
                <input type="text" placeholder="Username" name="ruser" class="form-control" value="<?php echo $conf['router_user']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Password Router</label>
              <div class="col-sm-6">
                <input type="password" placeholder="Password" name="rpass" class="form-control"/>
              </div>
            </div>
            
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-info" name="save" id="save"><i class="fa fa-save"></i> Simpan</button>&nbsp;
          <button class="btn btn-default" name="test" id="test"><i class="fa fa-exchange"></i> Test</button>
        </div></form>
       </div>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->

<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>

