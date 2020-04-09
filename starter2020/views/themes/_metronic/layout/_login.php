<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                <div class="kt-container kt-body kt-grid kt-grid--ver" id="kt_body">

                    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
                        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin bg-white" id="kt_login">
                            <!-- <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php     echo themes_url('media/bg') ?>/bg-3.jpg);"> -->
                                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                                    <div class="kt-login__container">
                                        <div class="kt-login__logo text-center">
                                        <a href="#">
                                            <img class="img-responsive" style="max-height: 75px;" src="<?php echo assets_url('images') ?>/bbws-brantas-bondoyudo.png">   
                                        </a>
                                        </div>
                                        <div class="content">
                                            
                                        <?php echo $content; ?>
                                        </div>
                                    </div>  
                                </div>
                            <!-- </div> -->
                        </div>  
                    </div>


                </div>
            </div>
            <?php getcomponent('partials/_footer');?>
        </div>
    </div>
</div>
<?php //getcomponent('partials/_layout-scrolltop');?>
