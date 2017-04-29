<?php
/**
 * @File  : add-pesan.php
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : lorosukmo
 * @Time  : 2017-02-17 15:58:24
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
      <h2><i class="fa fa-th-list"></i> Tambah Paket</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      <div class="panel panel-default"><?php echo ViewMessage(); ?>
        <!-- <div class="panel-heading">
          <h4 class="panel-title">Biodata < <?php //echo $row['username']; ?> ></h4>
        </div> -->
        <div class="panel-body panel-body-nopadding">
          
          <form class="form-horizontal form-bordered" method="POST" action="../action/add-paket.php"> 
            <div class="form-group">
              <label class="col-sm-3 control-label">Nama Paket</label>
              <div class="col-sm-6">
                <input type="text" placeholder="Nama Paket" class="form-control" name="namapaket" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Type</label>
              <div class="col-sm-6">
                <select id="jnsSelect" onChange="formSelect()" name="piltype" class="form-control chosen-select" data-placeholder="Pilih Paket...">
                <option>Pilih Paket</option>
                <option value="0">Unlimited</option>
                <option value="1">Time Based</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Masa Aktif</label>
              <div class="col-sm-6">
                <input id="jenis" type="text" placeholder="Unlimited" class="form-control" name="masaaktif" disabled="true" /> <span id=jem></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Upload</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" rows="5" placeholder="Upload" name="upload">
              </div>
              <div class="col-sm-2">
              Kbps
                <!-- <input type="text" class="form-control" rows="5" placeholder="Upload" name="upload"> -->
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Download</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" rows="5" placeholder="Download" name="download">
              </div>
              <div class="col-sm-2">
              Kbps
                <!-- <input type="text" class="form-control" rows="5" placeholder="Download" name="download"> -->
              </div>
            </div>  
          
          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-info" name="simpan"><i class="fa fa-save"></i> Simpan</button></form>&nbsp;
          <a class="btn btn-default" href="paket.php" name="batal"><i class="fa fa-times"></i> Kembali</a>
        </div>
       </div>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->
<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>

