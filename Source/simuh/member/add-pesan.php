<?php
/**
 * @File  : add-pesan.php
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : lorosukmo
 * @Time  : 2017-02-17 15:58:24
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='member'){

include '../header.php'; 
$db->go("SELECT * FROM `tbl_member` WHERE `username` = '$username'");
$row = $db->fetchArray();

?>
 

<!-- Preloader -->
<?php include '../inc/pre.php'; ?>

<section>
  
  <?php include '../inc/sidebar.php'; ?>
  
  <div class="mainpanel">
    
    <?php include '../inc/nav.php'; ?> 
        
    <div class="pageheader">
      <h2><i class="fa fa-envelope"></i> Kirim Pesan</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      <div class="panel panel-default"><?php if(ViewMessage()){echo ViewMessage();end;} ?>
        <!-- <div class="panel-heading">
          <h4 class="panel-title">Biodata < <?php //echo $row['username']; ?> ></h4>
        </div> -->
        <div class="panel-body panel-body-nopadding">
          
          <form class="form-horizontal form-bordered" method="POST" action="../action/krm-pesan.php"> 
            <div class="form-group">
              <label class="col-sm-3 control-label">Ke</label>
              <div class="col-sm-6">
                <select name="pilmember" class="form-control chosen-select" data-placeholder="Pilih User...">
                <option value=""></option>
                <?php 
                  $db->go("SELECT id_admin, username FROM `tbl_admin` ORDER BY username ASC");
                  $count = $db->numRows();
                  $no=1;
                  while ($rowm = $db->fetchArray()){
                    $id=$rowm['id_admin'];
                    $uname=$rowm['username'];
                ?>
                  <option value="<?php echo $id; ?>"><?php echo $uname; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Subyek</label>
              <div class="col-sm-6">
                <input type="text" placeholder="Subyek" class="form-control" name="subyek" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Pesan</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="5" placeholder="Pesan" name="pesan"></textarea>
              </div>
            </div> 
          
          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-info" name="kirim"><i class="fa fa-save"></i> Kirim</button></form>&nbsp;
          <a class="btn btn-default" href="pesan.php" name="batal"><i class="fa fa-times"></i> Cancel</a>
        </div>
       </div>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->
<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>

