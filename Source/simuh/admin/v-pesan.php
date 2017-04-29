<?php
/**
 * @File  : v-pesan.php
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : lorosukmo
 * @Time  : 2017-02-17 17:18:27
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='admin'){

include '../header.php'; 

$idp=Filter($_GET['id']);
$db->go("UPDATE `tbl_pesan` SET status='0' WHERE id_pesan='$idp'");

$db->go("SELECT tbl_pesan.*, tbl_member.username, tbl_member.nama FROM tbl_pesan JOIN tbl_member ON tbl_pesan.id_sender = tbl_member.id_member WHERE id_pesan = '$idp' AND tbl_pesan.id_receiver='$ids'");
$psn=$db->fetchArray();


?>


<!-- Preloader -->
<?php include '../inc/pre.php'; ?>

<section>
  
  <?php include '../inc/sidebar.php'; ?>
  
  <div class="mainpanel">
    
    <?php include '../inc/nav.php'; ?> 
        
    <div class="pageheader">
      <h2><i class="fa fa-envelope"></i> Lihat Pesan</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      <div class="btn-group">
            <a href="add-pesan.php" class="btn btn-success"><i class="fa fa-plus"></i> Buat Pesan</a>
            <a href="pesan.php" class="btn btn-info"><i class="fa fa-inbox"></i> Pesan Masuk</a>
            <a href="out-pesan.php" class="btn btn-warning"><i class="fa fa-sign-out"></i> Pesan Keluar</a>
          </div><br>
      <div class="panel panel-default"><?php echo ViewMessage(); ?>
        <!-- <div class="panel-heading">
          <h4 class="panel-title">Biodata < <?php //echo $row['username']; ?> ></h4>
        </div> -->
        <div class="panel-body panel-body-nopadding">
          <form action="" method="POST">
          <?php
            $idp=$psn['id_pesan'];
            $dari = $psn['id_sender'];
            $sub = $psn['subject'];
            $bls = $_POST['balasan'];
            if(isset($_POST['balas']) && !empty($bls)){$db->go("INSERT INTO tbl_pesan (id_sender, id_receiver, subject, pesan, kat) VALUES ('$ids','$dari','$sub','$bls','B')"); Message(1, 'Balasan dikirim');Redirect(base_url.'/admin/v-pesan.php?id='.$idp);}elseif(isset($_POST['balas']) && empty($bls)){Message(4, 'Balasan gagal/kosong!!!');Redirect(base_url.'/admin/v-pesan.php?id='.$idp);}
          ?>
          <div class="form-horizontal form-bordered"> 
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Dari</label>
              <div class="col-sm-6">
               <strong><?php echo $psn['nama']; ?></strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="disabledinput">Subyek</label>
              <div class="col-sm-6">
               <strong><?php if($psn['kat']=='B'){echo "<span class='label label-warning'>Re:</span> ".$psn['subject'];}else{echo $psn['subject'];} ?></strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Pesan</label>
              <div class="col-sm-6">
                <?php echo $psn['pesan']; ?>
              </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label">Balas</label>
              <div class="col-sm-6">
                <textarea class="form-control" name="balasan" placeholder="Balas disini..."></textarea>
              </div>
            </div>
          </div>
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-info" name="balas"><i class="fa fa-mail-reply"></i> Balas</button>&nbsp;</form>
          <a class="btn btn-default" href="pesan.php" name="batal"><i class="fa fa-times"></i> Back</a>
        </div>
       </div>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->
<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>

