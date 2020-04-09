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
    <!--end::Fonts -->
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
    <link href="<?= themes_url('default') ?>/skins/header/base/light.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('default') ?>/skins/header/menu/light.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('default') ?>/skins/brand/dark.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('default') ?>/skins/aside/dark.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('default/base') ?>/style.bundle.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= themes_url('custom/datatables') ?>/datatables.bundle.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= assets_url('assetsx/parsley/') ?>/parsley.css" rel="stylesheet" type="text/css" />

    <?php echo $css; ?>
    <?php echo $header_assets; ?>
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="<?php echo assets_url('images') ?>/iconpu.png" />
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
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
    <script src="<?php  echo themes_url('general')?>/bootstrap-datepicker/dist/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php  echo themes_url('custom/components/vendors')?>/bootstrap-datepicker/init.js" type="text/javascript"></script>
   
    <script src="<?php echo themes_url('default/base') ?>/scripts.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo themes_url('app/bundle/') ?>/app.bundle.min.js" type="text/javascript"></script>
    <!-- <script src="<?php //echo themes_url('app/custom/general') ?>/dashboard.min.js" type="text/javascript"></script> -->
    <script src="//ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
     <script src="<?php  echo themes_url('custom/datatables/')?>/datatables.bundle.min.js" type="text/javascript"></script>
     <script src="<?php  echo assets_url('assetsx/parsley/')?>/parsley.min.js" type="text/javascript"></script>
     <script src="<?php  echo assets_url('assetsx/parsley/i18n/')?>/id.js" type="text/javascript"></script>
    <script>
    WebFont.load({
        google: {
            "families": [
                "Poppins:300,400,500,600,700"
            ]
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>
    <?php echo $js; ?>
    <?php echo $footer_assets; ?>
    <!--end::Page Scripts -->
</body>
<!-- end::Body -->

</html>