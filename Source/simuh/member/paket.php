<?php
/**
 * @file  : paket.php
 * @author  : sukmo wijoyo
 * @email   : dev@ipnudiy.or.id
 * @date  : 2017-01-09 20:46:52
 * @modified: sukmo wijoyo
 * @time  : 2017-04-15 02:05:29
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='member'){

include '../header.php'; 
$db->go("SELECT * FROM `vpkt` WHERE `id_user` = '$ids' AND status='1'");
$row = $db->fetchArray();
$bw=$row['bandwidth'];
$bwt=explode("/", $bw);

?>
 

<!-- Preloader -->
<?php include '../inc/pre.php'; ?>

<section>
  
  <?php include '../inc/sidebar.php'; ?>
  
  <div class="mainpanel">
    
    <?php include '../inc/nav.php'; ?> 
        
    <div class="pageheader">
      <h2><i class="fa fa-th-list"></i> Paket</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-success pull-right">Member Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">Paket yang sedang anda gunakan:</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
          
          <form class="form-horizontal form-bordered"> 
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Paket</label>
              <div class="col-sm-6">
               <input type="text" placeholder="<?php echo $row['nama_paket']; ?>" id="disabledinput" class="form-control" readonly="readonly" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"><h4>Bandwidth:</h4></label>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Upload</label>
              <div class="col-sm-6">
                <input type="text" placeholder="<?php echo $bwt[0]; ?>" class="form-control" readonly="readonly" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Download</label>
              <div class="col-sm-6">
                <input type="text" placeholder="<?php echo $bwt[1]; ?>" class="form-control" readonly="readonly" />
              </div>
            </div>  
          </form>
          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <!-- <a href="paket.php" class="btn btn-default"><i class="fa fa-times"></i> Kembali</a> -->
        </div>
       </div>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->

<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>

