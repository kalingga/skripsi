<?php
/**
 * @file 	: login.php
 * @author 	: Sukmo
 * @email 	: dev@ipnudiy.or.id
 * @date 	: 2017-01-09 23:09:13
 * @modified: sukmo wijoyo
 * @time 	: 2017-01-21 04:42:36
 */
require 'core/config.php'; //require 'inc/auth.php';
if(!empty($_SESSION['username']) && !empty($_SESSION['level'])){
  Redirect(base_url.'/index.php');
}
include 'header.php';

?>
<body class="signin">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span> <?php echo app_name; ?> <span>]</span></h1>
                    </div><!-- logopanel -->
                	
                    <div class="mb20"></div>
                
                    <h5><strong>Selamat Datang di</strong></h5>
                    <?php echo app_desc; ?>
                    <div class="mb20"></div>
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            <div class="col-md-5"><?php ViewMessage(); ?>
                <form method="POST" action="action/signin.php">
                    <h4 class="nomargin">Sign In</h4>
                    <p class="mt5 mb20">Login to access your account.</p>
                
                    <input type="text" class="form-control uname" name="username" placeholder="Username" />
                    <input type="password" class="form-control pword" name="password" placeholder="Password" />
                    <div id="sejajar"><small>
                      <div class="ritem radio">
                        <label><input type="radio" name="level" value="member" checked> Member</label>
                      </div>
                      <div class="ritem radio">
                        <label><input type="radio" name="level" value="admin"> Admin</label>
                      </div>
                    </small></div>
                    <button class="btn btn-success btn-block">Masuk</button>

                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        <div class="signup-footer">
            <div class="pull-left">
                &copy; <?php echo date('Y'); ?>. All Rights Reserved.
            </div>
            <div class="pull-right">
                Coded with <i title="Arni Juliawati" class="fa fa-heart"></i> <a href="http://lorosukmo.github.io/" alt="Arni Juliawati" target="_blank">sukmo</a>
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>

<?php
include 'footer.php';
?>