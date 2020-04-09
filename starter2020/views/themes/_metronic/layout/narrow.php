<?php getcomponent('partials/_header-base-mobile');?>
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <?php getcomponent('partials/_header-base');?>
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                <div class="kt-container kt-body kt-grid kt-grid--ver" id="kt_body">
                    <?php echo $content; ?>
                </div>
            </div>
            <?php getcomponent('partials/_footer-base');?>
        </div>
    </div>
</div>
<?php getcomponent('partials/_layout-quick-panel');?>
<?php getcomponent('partials/_layout-scrolltop');?>
