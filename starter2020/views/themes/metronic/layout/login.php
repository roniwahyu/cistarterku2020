<!-- begin::Page loader -->
<!-- end::Page Loader -->
<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
<?php if ($this->ion_auth->logged_in()): ?>
<?php getcomponent('header_mobile'); ?>
<?php endif; ?>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <?php // getcomponent('dashboard_aside'); ?>
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">
            <!-- begin:: Header -->
            <?php if ($this->ion_auth->logged_in()): ?>
            <div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
                <div class="kt-container">
                    <!-- begin:: Brand -->
                    <?php getcomponent('brand'); ?>
                    <!-- end:: Brand -->
                    <!-- begin: Header Menu -->
                    <?php getcomponent('headermenu'); ?>
                    <!-- end: Header Menu -->
                    <!-- begin:: Header Topbar -->
                    <?php getcomponent('headertopbar'); ?>
                    <!-- end:: Header Topbar -->
                </div>
            </div>
            <?php endif; ?>
            <!-- end:: Header -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                        <!-- begin:: Subheader -->
                        <p></p>
                        <!-- end:: Subheader -->
                        <!-- begin:: Content -->
                        <?php //getcomponent('dashboard_content') ?>
                        <div class="kt-content kt-grid__item kt-grid__item--fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                        <div class="kt-portlet__body kt-portlet__body--fit">
                                            <!--begin: Datatable -->
                                            <?php echo $content; ?>
                                            <!--end: Datatable -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php //echo $content; ?>
                            <?php //getcomponent('section_content',$content) ?>
                        </div>
                        <!-- end:: Content -->
                    </div>
                </div>
            </div>
            <!-- begin:: Footer -->
            <?php getcomponent('dashboard_footer_simple',$content) ?>
            <!-- end:: Footer -->
        </div>
    </div>
</div>
<!-- end:: Page -->
<!-- begin::Quick Panel -->
<?php //getcomponent('quickpanel') ?>
<!-- end::Quick Panel -->
<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<!-- end::Scrolltop -->
<!-- begin::Sticky Toolbar -->
<?php //getcomponent('stickytoolbar') ?>
<!-- end::Sticky Toolbar -->
<!-- end::Demo Panel -->
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
var KTAppOptions = {
    "colors": {
        "state": {
            "brand": "#366cf3",
            "light": "#ffffff",
            "dark": "#282a3c",
            "primary": "#5867dd",
            "success": "#34bfa3",
            "info": "#36a3f7",
            "warning": "#ffb822",
            "danger": "#fd3995"
        },
        "base": {
            "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
            "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
        }
    }
};
</script>
<!-- end::Global Config -->
<!--begin:: Global Mandatory Vendors -->
<script src="<?= themes_url('general') ?>/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="<?= themes_url('general') ?>/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="<?= themes_url('general') ?>/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= themes_url('general') ?>/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="<?= themes_url('general') ?>/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?= themes_url('general') ?>/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="<?= themes_url('general') ?>/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="<?= themes_url('general') ?>/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="<?= themes_url('general') ?>/wnumb/wNumb.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->