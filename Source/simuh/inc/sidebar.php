<?php 
/**
 * @File  : sidebar.php
 * @Author: sukmo <dev@ipnudiy.or.id>
 * @Date  : 2017-01-12 05:20:14
 * @Modif : lorosukmo
 * @Time  : 2017-02-17 16:07:42
 */

?>

<div class="leftpanel">
    
  <div class="logopanel">
      <h1><span>[</span> <?php echo app_name; ?> <span>]</span></h1>
  </div><!-- logopanel -->
      
  <div class="leftpanelinner">    
         
    <h5 class="sidebartitle">Navigation</h5>
    <ul class="nav nav-pills nav-stacked nav-bracket">
      <li <?php classAktif("index.php"); ?>><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li <?php classAktif("pesan.php") || classAktif("add-pesan.php") || classAktif("v-pesan.php") ||classAktif("out-pesan.php"); ?>><a href="pesan.php">
      <?php  ?>
      <i class="fa fa-envelope-o"></i> <span>Pesan</span><span id="tPesan"></span></a></li>
      <li <?php classAktif("paket.php") || classAktif("add-paket.php") || classAktif("edit-paket.php"); ?>><a href="paket.php"><i class="fa fa-th-list"></i> <span>Paket</span></a>
      </li>
      <li <?php classAktif("billing.php"); ?>><a href="billing.php"><i class="fa fa-clock-o"></i> <span>Billing</span></a>

      </li>
      <li <?php classAktif("member.php") || classAktif("add-member.php") || classAktif("edit-member.php"); ?>><a href="<?php if($level=='member'){echo 'profile.php';}else{echo 'member.php';} ?>"><i class="fa fa-users"></i> <span><?php if($_SESSION['level']=='member'){echo 'Profil';}else{echo 'Member';}?></span></a></li><?php if($_SESSION['level']=='admin'){ ?>
      <li <?php classAktif("config.php"); ?>><a href="config.php"><i class="fa fa-cogs"></i> <span>Konfigurasi</span></a></li><?php } ?>
    </ul>
    <div class="infosummary">
        <h5 class="sidebartitle">Hari ini</h5>    
        <ul>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Tanggal</span>
                    <h4 id="tgl"></h4>
                </div>   
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Jam</span>
                    <h4 id="jam"></h4>
                </div>
            </li> 
            <li>
              <div id="jamU" title="Jam" class="progress progress-sm" style="height: 3px">
              </div>
              <div id="metU" title="Menit" class="progress progress-sm" style="height: 3px">
              </div> 
              <div id="detU" title="Detik" class="progress progress-sm" style="height: 3px">
              </div>   
            </li>
        </ul>
      </div>
  </div><!-- leftpanelinner -->
</div><!-- leftpanel -->
