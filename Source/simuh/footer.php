<?php
/**
 * @file 	: footer.php
 * @author 	: Sukmo
 * @email 	: dev@ipnudiy.or.id
 * @date 	: 2017-01-10 08:00:33
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 06:30:37
 */

$self=basename($_SERVER['PHP_SELF']);
if($self!=='login.php'){
	print_r('<div class="signup-footer">
    <div class="pull-left">
        © '.date("Y").'. All Rights Reserved.
    </div>
    <div class="pull-right">
        Coded with <i title="Arni Juliawati" class="fa fa-heart"></i> <a href="http://lorosukmo.github.io/" alt="Arni Juliawati" target="_blank">sukmo</a>
    </div>
</div>
</div><!-- mainpanel -->
  
</section>');
}
?>



<script src="<?php echo base_url; ?>/js/jquery-migrate-1.2.1.min.js?code=arni"></script>
<script src="<?php echo base_url; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url; ?>/js/modernizr.min.js"></script>
<script src="<?php echo base_url; ?>/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url; ?>/js/toggles.min.js"></script>
<script src="<?php echo base_url; ?>/js/retina.min.js"></script>
<script src="<?php echo base_url; ?>/js/jquery.cookies.js?code=arni"></script>

<script src="<?php echo base_url; ?>/js/flot/flot.min.js"></script>
<script src="<?php echo base_url; ?>/js/flot/flot.resize.min.js"></script>
<!-- <script src="<?php //echo base_url; ?>/js/charts.js"></script> -->
<!-- <script src="<?php //echo base_url; ?>/js/raphael-2.1.0.min.js"></script> -->



<script src="<?php echo base_url; ?>/js/custom.js"></script>
<!-- <script src="<?php //echo base_url; ?>/js/dashboard.js"></script> -->
<?php
$jspkt="<script>
function formSelect() {
    if (document.getElementById('jnsSelect').value == '0'){
        document.getElementById('jenis').disabled = true;
        document.getElementById('jenis').placeholder = 'Unlimited';
    }else{
        document.getElementById('jenis').disabled = false;
        document.getElementById('jenis').placeholder = 'Masa Aktif (dalam hari)';
    }
}
</script>";

$jsm="<script>

</script>";
if($path=='index.php'){
    echo $jsm;

  }

$jst="<script>
$(document).ready(function () {
    jQuery('#tblmember').dataTable({
        \"iDisplayLength\": 5,
        \"aLengthMenu\": [[5, 10, 15, 20, -1], [5, 10, 15, 20, \"Semua\"]]
    });
    
});
</script>";
if($path=='add-paket.php' || 'v-paket.php'){
    echo $jspkt;
}
if($path=='member.php' || $path=='pesan.php' || $path=='out-pesan.php' || $path=='paket.php' || $path=='billing.php'){
    echo $jst;
    echo '<script src="'.base_url.'/js/jquery.datatables.min.js"></script>
    <script src="'.base_url.'/js/chosen.jquery.min.js"></script>';
  }
if($path=="add-pesan.php"){
    echo '<script src="'.base_url.'/js/chosen.jquery.min.js"></script>
    <script>
    jQuery(document).ready(function(){
      jQuery(".chosen-select").chosen({\'width\':\'100%\',\'white-space\':\'nowrap\'});
    })
    </script>';
}
?>


</body>
</html>