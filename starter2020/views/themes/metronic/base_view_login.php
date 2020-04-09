<!DOCTYPE html>
<!-- Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7Author: KeenThemesWebsite: http://www.keenthemes.com/Contact: support@keenthemes.comFollow: www.twitter.com/keenthemesDribbble: www.dribbble.com/keenthemesLike: www.facebook.com/keenthemesPurchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemesRenew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemesLicense: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.-->
<html lang="en">
<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <?php echo $metadata; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script> WebFont.load({
                google: {
                    "families":[
                    "Poppins:300,400,500,600,700"]},
                                    active: function() {
                    sessionStorage.fonts = true;                }            });        </script>
    <!--end::Fonts -->
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="<?php echo themes_url('custom/fullcalendar') ?>/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles -->
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="<?= themes_url('general') ?>/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('general') ?>/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('general') ?>/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href="<?= themes_url('general') ?>/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('custom') ?>/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('custom') ?>/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('custom') ?>/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('custom') ?>/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo themes_url('demo4') ?>/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo themes_url('demo4') ?>/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo themes_url('app/custom') ?>/login/login-v4.demo3.min.css" rel="stylesheet" type="text/css" />
    <?php echo $css; ?>
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="<?php echo assets_url('images') ?>/iconpu.png" />
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body style="background-image: url(<?php echo themes_url('demo4/media/bg') ?>/header.jpg); background-position: center top; background-size: 100% 350px;" class="kt-page--fluid kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-all kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
    <!--[html-partial:include:{"file":"_layout.html"}]/-->
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <?php echo $body ?>
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
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
    </script>
    <!-- end::Global Config -->
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
    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="<?php  echo themes_url('general')?>/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php  echo themes_url('general')?>/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo themes_url('app/custom/login') ?>/login-general.min.js" type="text/javascript"></script>
    <script src="<?php echo themes_url('demo4') ?>/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?php echo themes_url('demo4') ?>/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
    <!--begin::Page Vendors(used by this page) -->
    <!-- <script src="<?php //echo themes_url('custom/fullcalendar') ?>/fullcalendar.bundle.js" type="text/javascript"></script> -->
    <!--end::Page Vendors -->
    <!--begin::Page Scripts(used by this page) -->
    <!-- <script src="<?php //echo themes_url('demo4') ?>/dashboard.js" type="text/javascript"></script> -->
    <?php echo $js; ?>
    <?php echo $assets; ?>
    <!--end::Page Scripts -->
</body>
<!-- end::Body -->

</html>