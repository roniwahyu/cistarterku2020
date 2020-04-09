<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
  <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo themes_url('media/bg') ?>/bg-3.jpg);">
      <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
        <!-- <div class="kt-login__container"> -->
          <div class="kt-login__logo text-center">
            <a href="#">
              <img style="max-height: 80px;" src="<?php echo assets_url('images') ?>/bbws-brantas-bondoyudo.png">   
            </a>
          </div>
          
          <hr style="margin:40px 20px;">
              <h3 class="kt-login__title text-center">Login with Social Media</h3>
            <?php 
                  if($this->session->userdata('sess_logged_in')==0){?>
                    <a href="<?=$google_login_url?>" class="btn btn-google btn-block btn-lg"><i class="socicon-google"></i> Login dengan Google</a>
                    
                  <?php }else{?>
                    <a href="<?=base_url()?>auth/logout" class="btn btn-google btn-block btn-lg"><i class="socicon-google"></i> Logout</a>
                  <?php }
                  ?>
                  <!-- <br> -->
                  <!-- <a href="#" class="btn btn-facebook btn-lg btn-block"><i class="socicon-facebook"></i> Login dengan Facebook</a> -->
          <hr style="margin:40px 20px;">

          <div class="kt-login__signin">
            <div class="kt-login__head">
              <h3 class="text-center">OR</h3>
              <!-- <h1 class="kt-login__title"><?php //echo lang('login_heading');?></h1> -->
              <!-- <div class="col s12 m6 offset-m3 l6 offset-l3"> -->
                  
                
            
                <!-- </div> -->
              <p><?php echo lang('login_subheading');?></p>
            </div>
            


            <div id="infoMessage"><?php echo $message;?></div>
            <form class="" method="post" action="<?php echo base_url('auth/login') ?>">
              <div class="form-group">
              	<label>Username</label>
                <input class="form-control form-control-lg" type="email" placeholder="Email" name="identity" autocomplete="off">
              </div>

              <div class="form-group">
              	<label>Password</label>
                <input class="form-control form-control-lg" type="password" placeholder="Password" name="password">
              </div>
              <div class="row kt-login__extra">
                <div class="col">
                  <label class="kt-checkbox">
                    <input type="checkbox" name="remember"> Remember me
                    <span></span>
                  </label>
                </div>
                <div class="col kt-align-right">
                  <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
                </div>
              </div>
              <div class="row kt-login__extra">
                 <?php //echo $widget;?>
                <?php //echo $script;?>

              </div>
              <div class="kt-login__actions">
               
                <button id="kt_login_signin_submit" class="btn btn-lg btn-brand btn-pill kt-login__btn-primary" >Sign In</button>
              </div>
            </form>
          </div>
          <div class="kt-login__forgot">
            <div class="kt-login__head">
              <h3 class="kt-login__title">Forgotten Password ?</h3>
              <div class="kt-login__desc">Enter your email to reset your password:</div>
            </div>
            <form class="kt-form" action="">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
              </div>
              <div class="kt-login__actions">
                <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                <button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
              </div>
            </form>
          </div>
        
        <!-- </div>   -->
      </div>
    </div>
  </div>  
</div>

