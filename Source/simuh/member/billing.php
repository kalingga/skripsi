<?php
/**
 * @File  : billing.php
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : sukmo
 * @Time  : 2017-01-31 10:01:47
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
      <h2><i class="fa fa-clock-o"></i> Billing</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-success pull-right">Member Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
        <div class="panel-heading">
        <center><strong>Riwayat Paket Anda</strong></center>
        </div>
        <div class="panel-body"><?php ViewMessage(); ?>
          <div class="table-responsive">
            <table class="table table-striped" id="tblmember">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Paket</th>
                    <th>Expired</th>
                    <th>Status</th>
                    <th>Aksi</th>
                 </tr>
              </thead>
              <tbody>
              <?php
                $db->go("SELECT tbl_billing.*, tbl_member.username, tbl_paket.nama_paket FROM tbl_paket, tbl_billing JOIN tbl_member ON tbl_billing.id_user = tbl_member.id_member WHERE tbl_billing.id_paket=tbl_paket.`id_paket` AND tbl_billing.id_user = '$ids' ORDER BY tbl_billing.daftar DESC");

                $count = $db->numRows();
                $no=1;
                while ($rowp = $db->fetchArray()){
                  $member  = $rowp['username'];
                  $paket = $rowp['nama_paket'];
                  $expire = $rowp['expire'];
                  $status = $rowp['status'];
                  if($status=='1'){
                    $inf="<span class='badge badge-info'>Aktif</span>";
                  }else{$inf="<span class='badge badge-warning'>non-Aktif</span>";}
                ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $member; ?></td>
                <td><?php echo $paket; ?></td>
                <td><?php if($expire==''){echo 'Unlimited';}else{echo indoDate($expire,'l, j F Y H:i:s');} ?></td>
                <td><?php echo $inf; ?></td>
                <td><div class="btn-group"><a title="Lihat detail" href="v-billing.php?id=<?php echo $rowp['id_billing'];?>" type="button" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a></div></td>
              </tr><?php } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          
        </div>
       </div>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->


<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>

