<?php
/**
 * @File  : nav.php
 * @Author: sukmo <dev@ipnudiy.or.id>
 * @Date  : 2017-01-12 05:20:13
 * @Modif : sukmo
 * @Time  : 2017-02-04 21:48:26
 */
?>
<div class="headerbar">
  
  <a class="menutoggle"><i class="fa fa-bars"></i></a>
 
  <div class="header-right">
    <ul class="headermenu">
      <li>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="ikon"><i class="glyphicon glyphicon-user"></i></span> <?php echo $fullname; ?> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-usermenu pull-right">

            <li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
            <li><a href="../action/logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
          </ul>
        </div>
      </li>
      <li><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
    </ul>
  </div><!-- header-right -->
  
</div><!-- headerbar -->