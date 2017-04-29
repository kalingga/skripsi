<?php
/**
 * @Author: sukmo < dev@ipnudiy.or.id >
 * @Date  : 2017-01-24 12:17:58
 * @Modif : lorosukmo
 * @Time  : 2017-02-17 17:08:23
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='admin'){

include '../header.php'; 


//loadmember
if($conroute){$hotspot=$conroute->getall("/ip/hotspot/user/profile", array(".id","name","rate-limit"), FALSE, ".id");}
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
        <span class="label"><span class="badge badge-danger pull-right">Admin Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="panel panel-default">
          <div class="btn-group">
            <a href="add-paket.php" class="btn btn-success"><i class="fa fa-plus"></i> Buat Paket</a>
            
          </div><br>
        <div class="panel-body"><?php ViewMessage(); ?>
          <div class="table-responsive">
            <table class="table table-striped" id="tblmember">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Nama Paket</th>
                    <th>Type Paket</th>
                    <th>Bandwidth</th>
                    <th>Aksi</th>
                 </tr>
              </thead>
              <tbody>
              <?php
                //foreach($hotspot as $hotspot=>$list){echo $list['rate-limit'];}
                $db->go("SELECT * FROM tbl_paket");
                $count = $db->numRows();
                $no=1;
                while ($rowp = $db->fetchArray()){
                  $idpaket = $rowp['id_paket'];
                  $namapaket = $rowp['nama_paket'];
                  $type = $rowp['jenis_paket'];
                  $bandwidth = $rowp['bandwidth'];
                ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $namapaket; ?></td>
                <td><?php if($type=='0'){echo 'Unlimited';}elseif($type=='1'){echo 'Limited';} ?></td>
                <td><?php echo $bandwidth; ?></td>
                <td><div class="btn-group"><a title="Edit Paket" href="v-paket.php?id=<?php echo $idpaket;?>" type="button" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a><a title="Hapus Paket" href="../action/del-paket.php?id=<?php echo $idpaket; ?>&del=<?php echo $namapaket; ?>" type="button" class="btn btn-xs btn-danger" onclick="javascript: return confirm('Anda yakin ?')"><i class="fa fa-trash-o"></i></a></div></td>
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

