<?php
/**
 * @file 	: header.php
 * @author 	: sukmo wijoyo
 * @email 	: dev@ipnudiy.or.id
 * @date 	: 2017-01-10 00:01:35
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 06:10:31
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url;?>/images/favicon.png" type="image/png">
  <title><?php echo app_name.' - '.app_tagline; ?></title>
  <style type="text/css">.progress-sm{height: 3px}</style>
  <link href="<?php echo base_url;?>/css/style.default.css" rel="stylesheet">
  <?php
  $path = basename($_SERVER['PHP_SELF']);
  if($path=='index.php'){
    echo'<link href="'.base_url.'/css/morris.css" rel="stylesheet">';
  }
  
  if($path=='member.php' || $path=='pesan.php' || $path=='out-pesan.php' || $path=='paket.php' || $path=='billing.php'){
    echo '<link href="'.base_url.'/css/jquery.datatables.css" rel="stylesheet">';
    echo '<link rel="stylesheet" href="'.base_url.'/css/chosen.css" rel="stylesheet"/>';
  }

  if($path=="add-pesan.php"){
    echo '<link rel="stylesheet" href="'.base_url.'/css/chosen.css" rel="stylesheet"/>';
  }

  ?>
  <script src="<?php echo base_url; ?>/js/jquery-1.10.2.min.js?code=arni"></script>
  <script type="text/javascript">
    var timeout = setInterval(sApi, 1000); 
    function sApi() {
        $.ajax({
          cache:false,
          dataType: "json",
          url: '<?php echo base_url;?>/inc/mon.php?hit=cpesan',
          type: "GET",
        success: function (loader){
          if(loader.jmlpsn!=null){
            $('#tPesan').html('<span class="badge badge-danger pull-right">'+loader.jmlpsn+'</span>');
          }else {
              loader.jmlpsn = null;
          }
        }
        }); 
        $.ajax({
          cache:false,
          dataType: "json",
          url: '<?php echo base_url;?>/inc/mon.php?hit=tgl',
          type: "GET",
        success: function (loader){
          $('#tgl').html(loader.tgl);
        }
        });
        $.ajax({
          cache:false,
          dataType: "json",
          url: '<?php echo base_url;?>/inc/mon.php?hit=jam',
          type: "GET",
        success: function (loader){
          $('#jam').html(loader.jam+' WIB');
        }
        });
        $.ajax({
          cache:false,
          dataType: "json",
          url: '<?php echo base_url;?>/inc/mon.php?hit=detu',
          type: "GET",
        success: function (loader){
          var det=loader.detu/59*100;
          $('#detU').html('<div style="width: '+det+'%" aria-valuemax="59" aria-valuemin="0" aria-valuenow="'+loader.detu+'" role="progressbar" class="progress-bar progress-bar-success"></div>');
        }
        });
        $.ajax({
          cache:false,
          dataType: "json",
          url: '<?php echo base_url;?>/inc/mon.php?hit=metu',
          type: "GET",
        success: function (loader){
          var det=loader.metu/59*100;
          $('#metU').html('<div style="width: '+det+'%" aria-valuemax="59" aria-valuemin="0" aria-valuenow="'+loader.metu+'" role="progressbar" class="progress-bar progress-bar-warning"></div>');
        }
        });
        $.ajax({
          cache:false,
          dataType: "json",
          url: '<?php echo base_url;?>/inc/mon.php?hit=jamu',
          type: "GET",
        success: function (loader){
          var det=loader.jamu/23*100;
          $('#jamU').html('<div style="width: '+det+'%" aria-valuemax="23" aria-valuemin="0" aria-valuenow="'+loader.jamu+'" role="progressbar" class="progress-bar progress-bar-danger"></div>');
        }
        });
        $.ajax({
          cache:false,
          dataType: "json",
          url: '<?php echo base_url;?>/inc/mon.php?hit=kick',
          type: "GET",
        success: function (loader){
          var det=loader.jamu/12*100;
          $('#kickM').html(loader.jamu);
        }
        });
        <?php if($path=='v-billing.php'){ ?>
        $.ajax({
          cache:false,
          dataType: "json",
          url: "<?php if($level=='admin'){echo base_url.'/admin/v-billing.php?id='.Filter($_GET['id']);}else{ echo base_url.'/member/v-billing.php?id='.Filter($_GET['id']);} ?>&hit=expired",
          type: "GET",
        success: function (loader){
          <?php if($bill['masa_aktif']=='Unlimited'){ ?>
            $('#expiRed').html('<h3>Unlimited</h3>');
          <?php }else{ echo $bill['masa_aktif'];?>
          $('#expiRed').html('<h3>'+loader.bulan+' bulan, '+loader.hari+' hari, '+loader.jam+':'+loader.menit+':'+loader.detik+'</h3>');
          <?php } ?>
        }
        });
       <?php } ?>
      }
  </script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="sApi()">

