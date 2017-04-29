<?php
require '../core/config.php'; require '../inc/auth.php';


$id=Filter($_GET['id']);
if($_SESSION['level']=='member'){
$db->go("SELECT * FROM billing WHERE id_billing='$id'");
$bill=$db->fetchArray();
$expi=$bill['expire'];
$username=$bill['username'];
switch ($_GET['hit']) {
	case 'expired':
		$vs1 = Date('Y-m-d H:i:s');
		$vs2 = Date($expi);
		$awal  = date_create();
  		$akhir = date_create($vs2);	
		$diff  = date_diff( $awal, $akhir );
		// echo $awal.' :-: '.$akhir;
		// if ($awal>=$akhir) {echo "ya";}else{echo "no";}
		// //$vs1=$awal;$vs2=$akhir;
		// var_dump($vs1);
		if ($awal>=$akhir && $vs2!=='') {
			$db->go("UPDATE tbl_member AS mem INNER JOIN tbl_billing AS bill ON (mem.id_member= bill.id_user) SET mem.status='0', bill.status = '0' WHERE bill.status = '1' AND bill.expire = '$vs2'");
    		$conroute->set("/ip/hotspot/user", array(".id"=>"$username", "disabled"=>"yes", "limit-uptime"=>"0","profile"=>"default"));

			$exp = array('tahun' => 0, 'bulan' => 00, 'hari'=>00, 'jam'=>00, 'menit'=>00, 'detik'=>00, 'jarak'=>00);
			echo json_encode($exp);
		}elseif($vs2==''){
			$exp = array('tipe' =>'Unlimited');
			echo json_encode($exp);
		}else{
			$exp = array('tahun' => $diff->y, 'bulan' => $diff->m, 'hari'=>$diff->d, 'jam'=>$diff->h, 'menit'=>$diff->i, 'detik'=>$diff->s, 'jarak'=>$diff->days);
			echo json_encode($exp);
		}
		break;

	default:
	include '../header.php'; 	
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

      <div class="panel panel-default"><?php echo ViewMessage(); ?>
        <!-- <div class="panel-heading">
          <h4 class="panel-title">Biodata < <?php //echo $row['username']; ?> ></h4>
        </div> -->
        <div class="panel-body panel-body-nopadding">
          <form class="form-horizontal form-bordered"> 
            <div class="form-group">
              <label class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-6">
              	<strong>
                	<?php echo $bill['member']." ( ".$bill['username']." )"; ?>
                </strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Paket</label>
              <div class="col-sm-6">
                <strong>
                	<?php echo $bill['nama_paket']; ?>
                </strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Status</label>
              <div class="col-sm-4">
                <strong>
                	<?php if($bill['status']=='1'){echo "Aktif";}elseif($bill['status']=='0' && $akhir>=$awal){ echo "<span class='badge badge-danger'>Blocked</span>";}else{echo "Non-Aktif";} ?>
                </strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal Daftar</label>
              <div class="col-sm-4">
                <?php echo indodate($bill['daftar']).' WIB'; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal Berakhir</label>
              <div class="col-sm-4">
                <?php if($bill['masa_aktif']=='Unlimited'){echo "Unlimited";}else{echo indodate($bill['expire']).' WIB';} ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Sisa</label>
              <div class="col-sm-4">
                <span id="expiRed"></span>
              </div>
            </div> 
          
          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <a class="btn btn-default" href="billing.php" name="batal"><i class="fa fa-times"></i> Kembali</a>
        </div>
       </div>
      </div><!-- panel-footer -->
      
    </div><!-- contentpanel -->
  <!-- </div>mainpanel -->
  
<!-- </section> -->
<?php  include '../footer.php';} }elseif($_SESSION['level']=='member'){
  Redirect(base_url.'/member/index.php');
  }

		break;
?>