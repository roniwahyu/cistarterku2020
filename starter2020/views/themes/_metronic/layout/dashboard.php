		<!-- begin::Page loader -->

		<!-- end::Page Loader -->

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<?php getcomponent('header_mobile') ?>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
						<div class="kt-container">

							<!-- begin:: Brand -->
							<div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
								<a class="kt-header__brand-logo" href="index.html">
									<img alt="Logo" src="<?php echo themes_url('media') ?>/logos/logo-4.png" class="kt-header__brand-logo-default" />
									<img alt="Logo" src="<?php echo themes_url('media') ?>/logos/logo-4-sm.png" class="kt-header__brand-logo-sticky" />
								</a>
							</div>

							<!-- end:: Brand -->

							<!-- begin: Header Menu -->
							<?php getcomponent('headermenu') ?>

							<!-- end: Header Menu -->

							<!-- begin:: Header Topbar -->
							<?php getcomponent('headertopbar') ?>

							<!-- end:: Header Topbar -->
						</div>
					</div>

					<!-- end:: Header -->
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
						<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
							<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

								<!-- begin:: Subheader -->
								<?php getcomponent('dashboard_subheader') ?>
								<!-- end:: Subheader -->

								<!-- begin:: Content -->
								<div class="kt-content kt-grid__item kt-grid__item--fluid">

									<!--Begin::Dashboard 4-->

									<?php //getcomponent('dashboard_content') 
										echo $content;
									?>
									<!--End::Dashboard 4-->
								</div>

								<!-- end:: Content -->
							</div>
						</div>
					</div>

					<!-- begin:: Footer -->
					<?php getcomponent('footer-demo4') ?>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Panel -->
		<?php getcomponent('quickpanel') ?>

		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		
		<!-- begin::Demo Panel -->
		<?php getcomponent('demopanel') ?>
