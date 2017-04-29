<?php
/**
 *
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : lorosukmo
 * @Time  : 2017-02-17 16:46:48
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='member'){

include '../header.php'; 

//loadmember

?>
 

<!-- Preloader -->
<?php include '../inc/pre.php'; ?>

<section>
  
  <?php include '../inc/sidebar.php'; ?>
  
  <div class="mainpanel">
    
    <?php include '../inc/nav.php'; ?> 
        
    <div class="pageheader">
      <h2><i class="fa fa-envelope"></i> Pesan</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-success pull-right">Member Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
          <div class="btn-group">
            <a href="add-pesan.php" class="btn btn-success"><i class="fa fa-plus"></i> Buat Pesan</a>
            <a href="pesan.php" class="btn btn-info"><i class="fa fa-inbox"></i> Pesan Masuk</a>
            <a href="out-pesan.php" class="btn btn-warning"><i class="fa fa-sign-out"></i> Pesan Keluar</a>
          </div><br>
        <div class="panel-body"><?php ViewMessage(); ?>
          <div class="table-responsive">
            <table class="table table-striped" id="tblmember">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Dari</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                 </tr>
              </thead>
              <tbody>
              <?php
                $db->go("SELECT tbl_pesan.*, tbl_admin.username, tbl_admin.nama FROM tbl_pesan JOIN tbl_admin ON tbl_pesan.id_sender = tbl_admin.id_admin WHERE tbl_pesan.id_receiver = '$ids' ORDER BY tbl_pesan.time_pesan DESC");

                $count = $db->numRows();
                $no=1;
                while ($rowp = $db->fetchArray()){
                  $sender  = ucfirst($rowp['nama']);
                  $receiver = $rowp['id_receiver'];
                  $subject = $rowp['subject'];
                  $kat = $rowp['kat'];
                  $pesan = $rowp['pesan'];
                  $time = $rowp['time_pesan'];
                  $status = $rowp['status'];
                  if($status=='0'){
                    $inf="<span class='badge badge-info'>Read</span>";
                  }else{$inf="<span class='badge badge-success'>Unread</span>";}
                ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $sender; ?></td>
                <td><strong><?php if($kat=='B'){echo "<span class='label label-warning'>Balasan</span> ".$subject;}else{echo $subject;} ?></strong></td>
                <td><?php echo $inf; ?></td>
                <td><?php echo indoDate($time); ?></td>
                <td><div class="btn-group"><a title="Lihat Pesan" href="v-pesan.php?id=<?php echo $rowp['id_pesan'];?>" type="button" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a><a title="Hapus Pesan" href="../action/del-pesan.php?id=<?php echo $rowp['id_pesan']; ?>" type="button" class="btn btn-xs btn-danger" onclick="javascript: return confirm('Anda yakin ?')"><i class="fa fa-trash-o"></i></a></div></td>
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

