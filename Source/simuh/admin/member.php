<?php
/**
 * @file  : member.php
 * @author: sukmo < dev@ipnudiy.or.id >
 * @date  : 2017-01-24 12:17:58
 * @modif : sukmo
 * @time  : 2017-04-04 06:46:51
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='admin'){

include '../header.php'; 
$db->go("SELECT * FROM `tbl_admin` WHERE `username` = '$username'");
$row = $db->fetchArray();

//loadmember
if($conroute){$member=$conroute->getall("/ip/hotspot/user", array(".id","server","name","password"), FALSE, ".id");}

?>

<!-- Preloader -->
<?php include '../inc/pre.php'; ?>

<section>
  
  <?php include '../inc/sidebar.php'; ?>
  
  <div class="mainpanel">
    
    <?php include '../inc/nav.php'; ?> 
        
    <div class="pageheader">
      <h2><i class="fa fa-users"></i> Member</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
          <a href="add-member.php" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Member</a><br>
        <div class="panel-body"><?php end(ViewMessage()); ?>
          <div class="table-responsive">
            <table class="table table-striped" id="tblmember">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th>Aksi</th>
                 </tr>
              </thead>
              <tbody>
              <?php
                $db->go("SELECT * FROM `tbl_member` ORDER BY id_member ASC");
                $count = $db->numRows();
                $no=1;
                while ($row = $db->fetchArray()){
                  $nama  = $row['nama'];
                  $uname = $row['username'];
                  $kontak = $row['telp'];
                  $status = $row['status'];
                  if($status=='0'){
                    $inf="<span class='badge badge-danger'>Non-Aktif</span>";
                  }elseif($status=='1'){$inf="<span class='badge badge-success'>Aktif</span>";}
                ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $uname; ?></td>
                <td><?php echo $kontak; ?></td>
                <td><?php echo $inf; ?></td>
                <td><div class="btn-group"><a class="btn btn-xs <?php if($status=='1'){echo 'btn-warning';}else{echo 'btn-success';} ?>" href="v-member.php?id=<?php echo $row['id_member']; ?>&hit=<?php if($status=='1'){echo 'nonaktif';}else{echo 'aktivasi';} ?>"><i class="fa <?php if($status=='1'){echo "fa-lock";}else{echo "fa-unlock";} ?>"></i></a><a title="Lihat dan Edit" href="v-member.php?id=<?php echo $row['id_member']; ?>" type="button" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a><a title="Hapus" href="../action/del-member.php?id=<?php echo $row['id_member']; ?>&del=<?php echo $uname; ?>" type="button" class="btn btn-xs btn-danger" onclick="javascript: return confirm('Anda yakin ?')"><i class="fa fa-trash-o"></i></a></div></td>
              </tr>
              
              <?php } ?>
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

