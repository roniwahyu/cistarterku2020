	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
			<?php getcomponent('header_mobile') ?>
		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- Dashboard Aside -->
					<?php getcomponent('sidebar') ?>
					<!-- end:: Aside -->

					<!-- begin:: Aside Menu -->
					<?php getcomponent('aside_menu') ?>

					<!-- end:: Aside Menu -->
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->
						<?php getcomponent('header_menu') ?>

						<!-- end:: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							<!--begin: Search -->

							<!--begin: Search -->
							

							<!--end: Search -->

							<!--end: Search -->

							<!--begin: Notifications -->
							

							<!--end: Notifications -->

							<!--begin: Quick Actions -->
						
							<!--end: Quick Actions -->

							<!--begin: My Cart -->
						

							<!--end: My Cart -->

							<!--begin: Quick panel toggler -->
							

							<!--end: Quick panel toggler -->

							<!--begin: Language bar -->

							<!--end: Language bar -->

							<!--begin: User Bar -->
							<?php getcomponent('userpanel') ?>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<?php getcomponent('subheader') ?>

						<!-- end:: Subheader -->
						<!-- Content Wrapper -->
						<?php //getcomponent('content-wrapper') ?>
						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="kt-portlet">
										

									<div class=" kt-portlet__body">
											<div >asdas</div>
										</div>
									</div>
								</div>
							</div>
							<?php //getcomponent('content-alert') ?>
							<?php //getcomponent('content-grid') ?>
							
						</div>

						<!-- end:: Content -->
					</div>

					<!-- begin:: Footer -->
					<?php getcomponent('footer-link') ?>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Panel -->
		<?php //getcomponent('quick-panel') ?>

		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- begin::Sticky Toolbar -->
		

		<!-- end::Sticky Toolbar -->

		<!-- begin::Demo Panel -->
		<?php //getcomponent('demo-panel') ?>

		<!-- end::Demo Panel -->

		