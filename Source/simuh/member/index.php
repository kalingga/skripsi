<?php
/**
 * @file  : index.php
 * @author  : sukmo wijoyo
 * @email   : dev@ipnudiy.or.id
 * @date  : 2017-01-09 20:46:52
 * @modified: sukmo wijoyo
 * @time  : 2017-03-29 12:56:00
 */

require '../core/config.php'; require '../inc/auth.php';
if($_SESSION['level']=='member'){

include '../header.php'; 

//router connect
$db->go("SELECT * FROM `tbl_config`");
$rmik = $db->fetchArray();
// $API = new routeros_api();
// if($API->connect($rmik['router_ip'],$rmik['router_user'],$rmik['router_pass'])){
//   $status="UP";
//   $API->disconnect();
// }else{
//   $status="DOWN";
//   $API->disconnect();
// }
$conroute = RouterOS::connect($rmik['router_ip'], $rmik['router_user'], $rmik['router_pass']);

//user
$db->go("SELECT * FROM `tbl_member` WHERE `username` = '$username'");
$row = $db->fetchArray();

//hitung pesan
$db->go("SELECT * FROM `tbl_pesan` WHERE `status` = '1' AND `id_receiver` = '$ids'");
$hmail=$db->numRows();

//status router
if($conroute){$info=$conroute->getall("/system/resource", FALSE, FALSE, FALSE);}
?>

 

<!-- Preloader -->
<?php include '../inc/pre.php'; ?>

<section>
<?php include '../inc/sidebar.php'; ?>  
  <div class="mainpanel">
    <?php include '../inc/nav.php'; ?>  
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
      <div class="breadcrumb-wrapper">
        <span class="label"><span class="badge badge-success pull-right">Member Area</span></span>
      </div>
    </div>
    
    <div class="contentpanel">

      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="panel panel-default widget-photoday">
            <div class="panel-body">
              <h3>Selamat Datang, <?php echo $row['nama']; ?></h3>
            </div>
          </div>
        </div>
      </div>  
      <div class="row">
        
        <div class="col-sm-6 col-md-4">
          <div class="panel panel-success panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-users"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Status Anda</small>
                    <h1><?php if($row['status']=='1'){echo "AKTIF";}else{echo "NON-AKTIF";} ?></h1>
                  </div>
                </div><!-- row -->
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        
        <div class="col-sm-6 col-md-4">
          <div class="panel panel-danger panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Pesan Baru</small>
                    <h1><?php echo $hmail; ?></h1>
                  </div>
                </div><!-- row -->
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        
        <div class="col-sm-6 col-md-4">
          <div class="panel panel-primary panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-signal"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Status Router</small>
                    <h1><?php if($conroute){echo "UP";}else{echo "DOWN";} ?></h1>
                  </div>
                </div><!-- row -->
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 --> 
      </div><!-- row -->

      <div class="row">
        <div class="col-sm-6 col-md-6">
          <div class="panel panel-success">
            <div class="panel-heading"><?php //var_dump($conroute); ?>
              <!-- <h5 class="panel-title">Server Info</h5> -->
              <p>Platform</p>
              <span"><?php if($info){echo $info['platform']." ".$info['version'];}else{echo "N/A";} ?></span>
              
              <p>Board Name</p>
              <span><?php if($info){echo $info['board-name'];}else{echo "N/A";}?></span>

              <p>Architecture</p>
              <span><?php if($info){echo $info['architecture-name'];}else{echo "N/A";}?></span>
            </div>
          </div>
        </div><!-- col-sm-9 -->
        <div class="col-sm-6 col-md-6">
          <div class="panel panel-success">
            <div class="panel-heading">
              <!-- <h5 class="panel-title">Server Info</h5> -->
              <p>CPU</p>
              <span><?php if($info){echo $info['cpu']." (".$info['cpu-count']." core) ~ ".$info['cpu-frequency']."MHz";}else{echo "N/A";}?></span>

              <p>Total Memory</p>
              <span><?php if($info){echo formatBytes($info['total-memory']);}else{echo "N/A";}?></span>
              
              <p>Total HDD</p>
              <span><?php if($info){echo formatBytes($info['total-hdd-space']);}else{echo "N/A";}?></span>
            </div>
          </div>
        </div><!-- col-sm-4 -->
      </div><!-- row -->
    
  <!-- </div>mainpanel -->
  
<!-- </section> -->

<?php include '../footer.php'; }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  } ?>
