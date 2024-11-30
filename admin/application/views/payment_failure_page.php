<?php $this->load->view("common.php"); ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled success_animation">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid pt-0" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid py-0" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<div class="row g-5 g-xl-10 mb-0 mb-xl-0">
								<!--begin::Col-->
								<div class="col-xxl-12">
									<div class="card bg-transparent border-0 shadow-none">
										<div class="card-body px-6">
											<div class="d-flex flex-center mb-3">
												<a href="javascript:;" class="text-center">
									                <img alt="Logo" src="<?php echo base_url();?>assets/Images/logo_bg.png" class="w-lg-300px h-lg-90px w-200px h-lg-90px">
									            </a>
											</div>
											<!-- <div class="d-flex align-items-center justify-content-center flex-center mb-0">
												<h1 class="fw-bold text-black fs-2hx text-center pb-4 pt-4">Your Package's</h1>
											</div> -->
											<div class="d-grid flex-center">
												<div class="card bg-danger h-100 w-lg-350px shadow" style="background-color:#e94747 !important;">
													<div class="card-body pt-2">
														<div class="text-center">
															<svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<g id="SVGRepo_bgCarrier" stroke-width="0"/>
																<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
																<g id="SVGRepo_iconCarrier"> <path d="M16 8L8 16M8.00001 8L16 16M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </g>
															</svg>
														</div>
														<h1 class="fw-bold text-white text-center mb-0 pb-2 pt-4">Payment Error !</h1>
														<div class="fs-5 fw-semibold mb-3 text-center text-white">Oops! Something went wrong here</div>
														<hr class="text-gray-100">
														<div class="fs-6 fw-semibold mb-3 text-center text-white">Your payment wasn't completed</div>
														<div class="text-center">
															<a href="<?php echo base_url(); ?>Landing_page" class="badge badge-light-secondary ms-1 fs-7 fw-semibold"><u> Try Again</u></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-black order-2 order-md-1">
								<span class="text-black fw-semibold me-1"><?php echo date("Y");?> &copy;</span>
								<a href="javascript:;" class="text-black text-hover-primary fw-semibold me-2 fs-6">Zeus Call Tracker Powered By EiBS</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->

		<?php $this->load->view("script.php"); ?>
	</body>
	<!--end::Body-->
</html>