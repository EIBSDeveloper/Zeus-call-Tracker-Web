<?php $this->load->view("common.php"); ?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 200px;
        max-height: 200px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{

    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 2;
  }
</style>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<?php $this->load->view("header.php"); ?>
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Row-->
							<div class="row g-5 g-xl-3 mb-5 mb-xl-3">
								<div class="col-lg-3">
									<div class="card bg-body">
						    		<div class="card-body text-center pb-2 px-2">
						    			<div class="d-flex align-items-center justify-content-center mb-2">
							    			<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
													<svg width="27px" height="30px"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.26" xml:space="preserve">
														<style type="text/css">.row_col_1_fst{fill:#7239EA !important;} .row_1_col_scd{fill:#7239EA !important;}</style>
														<g>
															<path class="row_col_1_fst fs-5" d="M66.38,47.05c0.16-0.2,0.33-0.39,0.51-0.59L95.96,17.9l-7.46-0.39c-3.19-0.16-5.65-2.88-5.49-6.07 c0.16-3.19,2.88-5.65,6.07-5.49L109.84,7c2.84,0.14,5.11,2.32,5.45,5.05l0,0l2.77,21.94c0.4,3.18-1.83,6.08-5.02,6.49 c-3.18,0.4-6.08-1.83-6.49-5.02l-1.2-9.52l-29.5,30.58L66.38,47.05L66.38,47.05z"/>
															<path class="row_1_col_scd" d="M33.84,50.26c4.13,7.45,8.89,14.6,15.08,21.12c6.19,6.57,13.9,12.54,23.89,17.62 c0.73,0.37,1.44,0.37,2.06,0.11c0.96-0.37,1.91-1.14,2.88-2.1c0.73-0.73,1.66-1.92,2.62-3.2c3.83-5.05,8.59-11.32,15.3-8.19 c0.15,0.07,0.26,0.15,0.41,0.22l22.36,12.87c0.07,0.04,0.15,0.11,0.22,0.15c2.95,2.02,4.17,5.15,4.21,8.7 c0,3.61-1.33,7.67-3.28,11.1c-2.58,4.53-6.38,7.52-10.76,9.51c-4.17,1.91-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.28-1.7 c-6.57-2.02-13.17-5.39-20.39-9.84l-0.52-0.34c-3.31-2.06-6.9-4.28-10.4-6.9C31.11,93.31,18.03,79.3,9.51,63.89 C2.36,50.94-1.55,36.97,0.58,23.66c1.18-7.3,4.32-13.94,9.77-18.32c4.75-3.83,11.17-5.93,19.47-5.2c0.96,0.07,1.81,0.63,2.25,1.44 l14.35,24.26c2.1,2.73,2.36,5.42,1.22,8.12c-0.96,2.21-2.88,4.24-5.5,6.16c-0.77,0.66-1.7,1.33-2.66,2.02 c-3.2,2.32-6.86,5.01-5.61,8.19L33.84,50.26L33.84,50.26L33.84,50.26z"/>
														</g>
													</svg>
												</a>
						    				<label class="text-black fw-bold fs-2">Total Outgoing Calls</label>
						    			</div>
					    				<div class="d-flex align-items-center justify-content-center gap-5">
					    					<label class="badge badge-info text-white fw-bold fs-1 me-5">78</label>
					    					<label class="badge badge-info text-white fw-bold fs-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Average Ratio">40%</label>
					    				</div>
						    		</div>
						    		<div class="d-flex align-items-center justify-content-start px-2 mb-2">
						    			<label class="me-2">
						    				<i class="fa-solid fa-circle-info fs-6 text-black"></i>
						    			</label>
						    			<label class="d-block fs-7 fw-bold text-black">Today (30-Sep-2024)</label>
						    		</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="card bg-body">
						    		<div class="card-body text-center pb-2 px-2">
						    			<div class="d-flex align-items-center justify-content-center mb-2">
							    			<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
													<svg width="27px" height="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.26" xml:space="preserve">
														<style type="text/css">.row_2_fst{fill:#50cd89;} .row_2_scd{fill:#50cd89;}</style>
														<g>
															<path class="row_2_fst fs-5" d="M118.11,15.41c-0.16,0.2-0.33,0.39-0.51,0.59L88.53,44.56l7.46,0.39c3.19,0.16,5.65,2.88,5.49,6.07 c-0.16,3.19-2.88,5.65-6.07,5.49l-20.76-1.05c-2.84-0.14-5.11-2.32-5.45-5.05l0,0l-2.77-21.94c-0.4-3.18,1.83-6.08,5.02-6.49 c3.18-0.4,6.08,1.83,6.49,5.02l1.2,9.52l29.5-30.58L118.11,15.41L118.11,15.41z"/>
															<path class="row_2_scd" d="M33.84,50.26c4.13,7.45,8.89,14.6,15.08,21.12c6.19,6.57,13.9,12.54,23.89,17.62 c0.73,0.37,1.44,0.37,2.06,0.11c0.96-0.37,1.91-1.14,2.88-2.1c0.73-0.73,1.66-1.92,2.62-3.2c3.83-5.05,8.59-11.32,15.3-8.19 c0.15,0.07,0.26,0.15,0.41,0.22l22.36,12.87c0.07,0.04,0.15,0.11,0.22,0.15c2.95,2.02,4.17,5.15,4.21,8.7 c0,3.61-1.33,7.67-3.28,11.1c-2.58,4.53-6.38,7.52-10.76,9.51c-4.17,1.91-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.28-1.7 c-6.57-2.02-13.17-5.39-20.39-9.84l-0.52-0.34c-3.31-2.06-6.9-4.28-10.4-6.9C31.11,93.31,18.03,79.3,9.51,63.89 C2.36,50.94-1.55,36.97,0.58,23.66c1.18-7.3,4.32-13.94,9.77-18.32c4.75-3.83,11.17-5.93,19.47-5.2c0.96,0.07,1.81,0.63,2.25,1.44 l14.35,24.26c2.1,2.73,2.36,5.42,1.22,8.12c-0.96,2.21-2.88,4.24-5.5,6.16c-0.77,0.66-1.7,1.33-2.66,2.02 c-3.2,2.32-6.86,5.01-5.61,8.19L33.84,50.26L33.84,50.26L33.84,50.26z"/>
														</g>
													</svg>
												</a>
						    				<label class="text-black fw-bold fs-2">Total Incoming Calls</label>
						    			</div>
					    				<div class="d-flex align-items-center justify-content-center">
					    					<label class="badge badge-success text-white fw-bold fs-1 me-5">89</label>
					    				</div>
						    		</div>
						    		<div class="d-flex align-items-center justify-content-start px-2 mb-2">
						    			<label class="me-2">
						    				<i class="fa-solid fa-circle-info fs-6 text-black"></i>
						    			</label>
						    			<label class="d-block fs-7 fw-bold text-black">Today (30-Sep-2024)</label>
						    		</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="card bg-body">
						    		<div class="card-body text-center pb-2 px-2">
						    			<div class="d-flex align-items-center justify-content-center mb-2">
							    			<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
													<svg fill="#FF7F00" width="27px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
														<g id="SVGRepo_bgCarrier" stroke-width="0"/>
														<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
														<g id="SVGRepo_iconCarrier">
														<path d="M6,7.49a1,1,0,0,0,1-1V5.9L9.88,8.78a3,3,0,0,0,4.24,0l4.59-4.59a1,1,0,0,0,0-1.41,1,1,0,0,0-1.42,0L12.71,7.36a1,1,0,0,1-1.42,0L8.41,4.49H9a1,1,0,0,0,0-2H6a1,1,0,0,0-.92.61A1.09,1.09,0,0,0,5,3.49v3A1,1,0,0,0,6,7.49Zm15.94,7.36a16.27,16.27,0,0,0-19.88,0,2.69,2.69,0,0,0-1,2,2.66,2.66,0,0,0,.78,2.07L3.6,20.72A2.68,2.68,0,0,0,7.06,21l.47-.32a8.13,8.13,0,0,1,1-.55,1.85,1.85,0,0,0,1-2.3l-.09-.24a10.49,10.49,0,0,1,5.22,0l-.09.24a1.85,1.85,0,0,0,1,2.3,8.13,8.13,0,0,1,1,.55l.47.32a2.58,2.58,0,0,0,1.54.5,2.72,2.72,0,0,0,1.92-.79l1.81-1.82A2.66,2.66,0,0,0,23,16.83,2.69,2.69,0,0,0,21.94,14.85ZM20.8,17.49,19,19.3a.68.68,0,0,1-.86.1c-.19-.14-.38-.27-.59-.4a11.65,11.65,0,0,0-1.09-.61l.4-1.09a1,1,0,0,0-.6-1.28,12.42,12.42,0,0,0-8.5,0,1,1,0,0,0-.6,1.28l.4,1.1a9.8,9.8,0,0,0-1.1.6l-.58.4A.66.66,0,0,1,5,19.3L3.2,17.49A.67.67,0,0,1,3,17a.76.76,0,0,1,.28-.53,14.29,14.29,0,0,1,17.44,0A.76.76,0,0,1,21,17,.67.67,0,0,1,20.8,17.49Z"/>
														</g>
													</svg>
												</a>
						    				<label class="text-black fw-bold fs-2">Total Missed Calls</label>
						    			</div>
					    				<div class="d-flex align-items-center justify-content-center gap-5">
					    					<label class="badge badge-warning text-white fw-bold fs-1 me-5" style="background-color:#FF7F00 !important;">15</label>
					    					<label class="badge badge-warning text-white fw-bold fs-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Average Ratio" style="background-color:#FF7F00 !important;">13%</label>
					    				</div>
						    		</div>
						    		<div class="d-flex align-items-center justify-content-start px-2 mb-2">
						    			<label class="me-2">
						    				<i class="fa-solid fa-circle-info fs-6 text-black"></i>
						    			</label>
						    			<label class="d-block fs-7 fw-bold text-black">Today (30-Sep-2024)</label>
						    		</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="card bg-body">
						    		<div class="card-body text-center pb-2 px-2">
						    			<div class="d-flex align-items-center justify-content-center mb-2">
							    			<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
													<svg fill="#ff0000" width="27px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
														<g id="SVGRepo_bgCarrier" stroke-width="0"/>
														<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
														<g id="SVGRepo_iconCarrier"> <g data-name="Layer 2"> <g data-name="phone-missed"> <rect width="24" height="24" opacity="0"/> <path d="M21.94 16.64a4.34 4.34 0 0 0-.19-.73 1 1 0 0 0-.72-.65l-6-1.37a1 1 0 0 0-.92.26c-.14.13-.15.14-.8 1.38a10 10 0 0 1-4.88-4.89C9.71 10 9.72 10 9.85 9.85a1 1 0 0 0 .26-.92L8.74 3a1 1 0 0 0-.65-.72 3.79 3.79 0 0 0-.72-.18A3.94 3.94 0 0 0 6.6 2 4.6 4.6 0 0 0 2 6.6 15.42 15.42 0 0 0 17.4 22a4.6 4.6 0 0 0 4.6-4.6 4.77 4.77 0 0 0-.06-.76zM17.4 20A13.41 13.41 0 0 1 4 6.6 2.61 2.61 0 0 1 6.6 4h.33L8 8.64l-.55.29c-.87.45-1.5.78-1.17 1.58a11.85 11.85 0 0 0 7.18 7.21c.84.34 1.17-.29 1.62-1.16l.29-.55L20 17.07v.33a2.61 2.61 0 0 1-2.6 2.6z"/> <path d="M15.8 8.7a1.05 1.05 0 0 0 1.47 0L18 8l.73.73a1 1 0 0 0 1.47-1.5l-.73-.73.73-.73a1 1 0 0 0-1.47-1.47L18 5l-.73-.73a1 1 0 0 0-1.47 1.5l.73.73-.73.73a1.05 1.05 0 0 0 0 1.47z"/> </g> </g> </g>
													</svg>
												</a>
						    				<label class="text-black fw-bold fs-2">Total Rejected Calls</label>
						    			</div>
					    				<div class="d-flex align-items-center justify-content-center">
					    					<label class="badge badge-danger text-white fw-bold fs-1 me-5">12</label>
					    				</div>
						    		</div>
						    		<div class="d-flex align-items-center justify-content-start px-2 mb-2">
						    			<label class="me-2">
						    				<i class="fa-solid fa-circle-info fs-6 text-black"></i>
						    			</label>
						    			<label class="d-block fs-7 fw-bold text-black">Today (30-Sep-2024)</label>
						    		</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="card bg-body">
										<div class="card-header border-bottom-0 pt-0 pb-0 align-items-center">
											<h3 class="card-title align-items-start flex-column">
												<div class="text-dark fw-bold mb-1 fs-2">Packages</div>
												<!-- <div class="d-block text-gray-600 fw-semibold mb-1 fs-7">Subscription Plan</div> -->
											</h3>
											<div class="d-flex align-items-start justify-content-lg-end justify-content-center gap-2">
												<label class="badge badge-info text-white fw-bold fs-2">02</label>
											</div>
										</div>
						    		<div class="card-body pt-0 text-center">
						    			<div id="kt_sliders_1" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="5000">
						    				<div class="carousel-inner mb-0">
													<div class="carousel-item active show px-lg-13">
														<div class="d-flex flex-column align-items-center justify-content-center">
															<div class="d-block mb-4 gap-3">
																<div class="badge badge-light-info">
																	<label class="fw-bold fs-2 text-black">Silver Package</label>
																	<label class="fw-bold fs-2 text-black">( 1 Month )</label>
																</div>
															</div>
														</div>
														<div class="row mb-2 text-start">
															<label class="col-5 fs-6 fw-semibold">Start / End Date</label>
															<label class="col-1 fs-6 fw-bold">:</label>
															<div class="col-6 fs-5 fw-bold">
																<label class="badge badge-success fw-semibold fs-6">28-Sep-2024</label>
																<label>&nbsp;/&nbsp;</label>
																<label class="badge badge-danger fw-semibold fs-6">27-Oct-2024</label>
															</div>
														</div>
														<div class="row mb-2 text-start">
															<label class="col-5 fs-6 fw-semibold">Renewal Days</label>
															<label class="col-1 fs-6 fw-bold">:</label>
															<div class="col-6 fs-5 fw-bold">
																<label class="badge badge-warning text-black fs-6 fw-bold">30 Days</label>
															</div>
														</div>
														<div class="d-flex align-items-center justify-content-center mb-2 gap-3">
															<div class="border border-info border-dashed rounded px-2 py-2 mb-0">
																<label class="fw-bold fs-4 text-black">Callers</label>
																<div class="d-block">
																	<label class="badge badge-success fw-bold fs-4 text-white">03</label>
																</div>
															</div>
															<div class="border border-info border-dashed rounded px-2 py-2 mb-0">
																<label class="fw-bold fs-4 text-black">Available Callers</label>
																<div class="d-block">
																	<label class="badge badge-danger fw-bold fs-4 text-white">07</label>
																</div>
															</div>
															<div class="border border-info border-dashed rounded px-2 py-2 mb-0">
																<label class="fw-bold fs-4 text-black">Total Callers</label>
																<div class="d-block">
																	<label class="badge badge-info fw-bold fs-4 text-white">10</label>
																</div>
															</div>
														</div>
													</div>
													<div class="carousel-item px-lg-13">
														<div class="d-flex flex-column align-items-center justify-content-center">
															<div class="d-block mb-4 gap-3">
																<div class="badge badge-light-info">
																	<label class="fw-bold fs-2 text-black">Gold Package</label>
																	<label class="fw-bold fs-2 text-black">( 6 Month )</label>
																</div>
																<label class="badge badge-danger fw-bold fs-2 text-white ms-2">Expired</label>
															</div>
														</div>
														<div class="row mb-2 text-start">
															<label class="col-5 fs-6 fw-semibold">Start / End Date</label>
															<label class="col-1 fs-6 fw-bold">:</label>
															<div class="col-6 fs-5 fw-bold">
																<label class="badge badge-success fw-semibold fs-6">15-Mar-2024</label>
																<label>&nbsp;/&nbsp;</label>
																<label class="badge badge-danger fw-semibold fs-6">14-Sep-2024</label>
															</div>
														</div>
														<div class="row mb-2 text-start">
															<label class="col-5 fs-6 fw-semibold">Renewal Days</label>
															<label class="col-1 fs-6 fw-bold">:</label>
															<div class="col-6 fs-5 fw-bold">
																<label class="badge badge-warning text-black fs-6 fw-bold">0 Days</label>
															</div>
														</div>
														<div class="d-flex align-items-center justify-content-center mb-2 gap-3">
															<div class="border border-info border-dashed rounded px-2 py-2 mb-0">
																<label class="fw-bold fs-4 text-black">Callers</label>
																<div class="d-block">
																	<label class="badge badge-success fw-bold fs-4 text-white">02</label>
																</div>
															</div>
															<div class="border border-info border-dashed rounded px-2 py-2 mb-0">
																<label class="fw-bold fs-4 text-black">Available Callers</label>
																<div class="d-block">
																	<label class="badge badge-danger fw-bold fs-4 text-white">13</label>
																</div>
															</div>
															<div class="border border-info border-dashed rounded px-2 py-2 mb-0">
																<label class="fw-bold fs-4 text-black">Total Callers</label>
																<div class="d-block">
																	<label class="badge badge-info fw-bold fs-4 text-white">15</label>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="d-flex justify-content-end align-items-center">
													<ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
														<li data-bs-target="#kt_sliders_1" data-bs-slide-to="0" class="active ms-1"></li>
														<li data-bs-target="#kt_sliders_1" data-bs-slide-to="1" class="ms-1"></li>
													</ol>
												</div>
												<button class="carousel-control-prev btn btn-icon btn-bg-primary btn-sm" type="button" data-bs-target="#kt_sliders_1" data-bs-slide="prev">
											    <span class="carousel-control-prev-icon text-black" aria-hidden="true"></span>
											  </button>
											  <button class="carousel-control-next btn btn-icon btn-bg-primary btn-sm" type="button" data-bs-target="#kt_sliders_1" data-bs-slide="next">
											    <span class="carousel-control-next-icon text-black" aria-hidden="true"></span>
											  </button>
						    			</div>
						    		</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="card bg-body mb-2">
						    		<div class="card-body text-center pb-2 px-2">
						    			<div class="d-flex align-items-center justify-content-center mb-1">
							    			<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
													<svg width="40px" height="40px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet">
														<path fill="#CCD6DC" d="M30 26a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h22a4 4 0 0 1 4 4v22z"></path><path fill="#F5F8FA" d="M28 26a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h22a2 2 0 0 1 2 2v22z"></path><path fill="#50A5E6" d="M6 26a1 1 0 0 1-1-1V13a1 1 0 1 1 2 0v12a1 1 0 0 1-1 1z"></path><path fill="#77B255" d="M10 26a1 1 0 0 1-1-1V8a1 1 0 1 1 2 0v17a1 1 0 0 1-1 1z"></path><path fill="#DD2F45" d="M14 26a1 1 0 0 1-1-1v-7a1 1 0 1 1 2 0v7a1 1 0 0 1-1 1z"></path><path fill="#226798" d="M36 36v-2c0-3.314-2.685-6-6-6H14a6 6 0 0 0-6 6v2h28z"></path><path fill="#3A87C2" d="M16.667 36H20.2L17 28h-2l-1 6l3 1zm10.666 0H23.8l3.2-8h2l1 6l-3 1z"></path><path fill="#F6DDCD" d="M17.64 28.101c1.744 1.268 2.857 2.032 4.37 2.032c1.512 0 2.606-.766 4.35-2.032V24.29h-8.72v3.811z"></path><path fill="#ECC0AC" d="M17.632 25.973c1.216 1.374 2.724 1.746 4.364 1.746c1.639 0 3.147-.373 4.363-1.746v-3.491h-8.728v3.491z"></path><path fill="#F6DDCD" d="M15.445 15.936c0 1.448-.734 2.622-1.639 2.622s-1.639-1.174-1.639-2.622s.734-2.623 1.639-2.623s1.639 1.174 1.639 2.623m16.388 0c0 1.448-.733 2.622-1.639 2.622c-.905 0-1.639-1.174-1.639-2.622s.733-2.623 1.639-2.623s1.639 1.174 1.639 2.623"></path><path fill="#F6DDCD" d="M13.478 16.96c0-5.589 3.816-10.121 8.523-10.121s8.523 4.532 8.523 10.121s-3.816 10.121-8.523 10.121c-4.707-.001-8.523-4.532-8.523-10.121"></path><path fill="#C1694F" d="M22 23.802c-2.754 0-3.6-.705-3.741-.848a.655.655 0 0 1 .902-.95c.052.037.721.487 2.839.487c2.2 0 2.836-.485 2.842-.49a.638.638 0 0 1 .913.015a.669.669 0 0 1-.014.938c-.141.143-.987.848-3.741.848m.75-4.052h-1.5c-.413 0-.75-.337-.75-.75s.337-.75.75-.75h1.5c.413 0 .75.337.75.75s-.337.75-.75.75"></path><path fill="#662213" d="M26 17c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1s1 .45 1 1v1c0 .55-.45 1-1 1m-8 0c-.55 0-1-.45-1-1v-1c0-.55.45-1 1-1s1 .45 1 1v1c0 .55-.45 1-1 1"></path><path fill="#292F33" d="M22 3.48c5.648 0 9.178 4.168 9.178 7.641s-.706 4.863-1.412 3.473l-1.412-2.778s-4.235 0-5.647-1.39c0 0 2.118 4.168-2.118 0c0 0 .706 2.779-3.53-.694c0 0-2.118 1.389-2.824 4.862c-.196.964-1.412 0-1.412-3.473C12.822 7.648 15.646 3.48 22 3.48"></path><path fill="#CCD6DC" d="M20.461 36H24l2-4l-3.99-1.867L18 32l2 4z"></path><path fill="#9F1D22" d="M22.031 33.957c.744 0 1.246 1.025 1.562 2.043h.549c-.394-1.262-.841-2.438-.841-2.438s.375-.625.531-.906c.184-.33.453-1.57.453-1.57l-2.188-.963c0-.006-.16.006-.16.006l-.184.043l-.172.062c-.217.07.094.008.094.014l-1.973.838s.287 1.24.469 1.57c.156.281.529.906.529.906s-.43 1.106-.797 2.438h.559c.319-1.018.826-2.043 1.569-2.043z"></path><path fill="#DD2F45" d="M22.031 33.957c-.744 0-1.25 1.025-1.57 2.043h3.132c-.316-1.018-.818-2.043-1.562-2.043zm-.027-3.144c.391-.023 1.543.771 1.422 1.25c-.461 1.826-.848 1.391-1.391 1.391c-.611 0-.963.473-1.391-1.312c-.091-.388.797-1.298 1.36-1.329"></path><path fill="#F4F7F9" d="M26.719 26.75c-.567.566-4.709 3.383-4.709 3.383s2.127 1.242 4.084 3.533c.197.23 1.543-4.625 1.584-5.709c.011-.303-.688-1.478-.959-1.207m-9.418 0c.566.566 4.709 3.383 4.709 3.383s-2.127 1.242-4.084 3.533c-.197.23-1.543-4.625-1.584-5.709c-.012-.303.687-1.478.959-1.207"></path>
													</svg>
												</a>
						    				<label class="text-black fw-bold fs-2">Total No. of Callers</label>
						    			</div>
					    				<div class="d-flex align-items-center justify-content-center">
					    					<label class="badge badge-primary text-white fw-bold fs-1 me-5">05</label>
					    				</div>
						    		</div>
						    		<div class="d-flex align-items-center justify-content-start px-2 mb-2">
						    			<label class="me-2">
						    				<i class="fa-solid fa-circle-info fs-6 text-black"></i>
						    			</label>
						    			<label class="d-block fs-7 fw-bold text-black">Upto (September) Month</label>
						    		</div>
									</div>
									<div class="card bg-body mb-0 mt-2">
						    		<div class="card-body text-center pb-2 px-2">
						    			<div class="d-flex align-items-center justify-content-center mb-1">
							    			<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
													<svg width="40px" height="40px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg">
														<path d="M896 896H128V192l384-149.333333 384 149.333333z" fill="#C5CAE9" /><path d="M128 896h768v42.666667H128z" fill="#9FA8DA" /><path d="M426.666667 746.666667h170.666666v192h-170.666666z" fill="#BF360C" /><path d="M661.333333 576h128v106.666667h-128zM448 576h128v106.666667h-128zM234.666667 576h128v106.666667h-128zM661.333333 746.666667h128v106.666666h-128zM234.666667 746.666667h128v106.666666h-128zM661.333333 405.333333h128v106.666667h-128zM448 405.333333h128v106.666667h-128zM234.666667 405.333333h128v106.666667h-128zM661.333333 234.666667h128v106.666666h-128zM448 234.666667h128v106.666666h-128zM234.666667 234.666667h128v106.666666h-128z" fill="#1565C0" />
													</svg>
												</a>
						    				<label class="text-black fw-bold fs-2">Total Departments</label>
						    			</div>
					    				<div class="d-flex align-items-center justify-content-center">
					    					<label class="badge badge-danger text-white fw-bold fs-1 me-5">02</label>
					    				</div>
						    		</div>
						    		<div class="d-flex align-items-center justify-content-start px-2 mb-2">
						    			<label class="me-2">
						    				<i class="fa-solid fa-circle-info fs-6 text-black"></i>
						    			</label>
						    			<label class="d-block fs-7 fw-bold text-black">Upto (September) Month</label>
						    		</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="card h-100 bg-body">
						    		<div class="card-body pb-2 pt-4 px-6">
						    			<label class="text-black fw-bold fs-2 mb-2">Department Based Callers</label>
						    			<table class="table align-middle table-striped table-hover fs-7 gy-3 gs-2 list_page">
												<thead>
													<tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
														<th class="min-w-100px">Department</th>
														<th class="min-w-50px">Callers</th>
													</tr>
												</thead>
												<tbody class="text-gray-800 fw-bold fs-7">
													<tr>
														<td class="text-start">
															<label class="fs-7 text-black">Sales</label>
														</td>
														<td align="start">
															<div class="badge badge-warning text-black fs-7">02</div>
														</td>
													</tr>
													<tr>
														<td class="text-start">
															<label class="fs-7 text-black">Production</label>
														</td>
														<td align="start">
															<div class="badge badge-warning text-black fs-7">03</div>
														</td>
													</tr>
												</tbody>
											</table>
						    		</div>
						    		<div class="d-flex align-items-center justify-content-start px-2 mb-2">
						    			<label class="me-2">
						    				<i class="fa-solid fa-circle-info fs-6 text-black"></i>
						    			</label>
						    			<label class="d-block fs-7 fw-bold text-black">Upto (September) Month</label>
						    		</div>
									</div>
								</div>
							</div>
							<!--end::Row-->
							<!--begin::Row-->
							<div class="row g-5 g-xl-3 mb-5 mb-xl-3">
					    	<div class="col-lg-6 mb-3">
									<div class="card h-100">
										<div class="card-body pb-8">
											<div class="fs-3 text-center fw-bold text-black">Today Calls Summary (30-Sep-2024)</div>
							    		<div id="chart_today_calls_summary"></div>
							    	</div>
						    	</div>
						    </div>
						    <div class="col-lg-6 mb-3">
									<div class="card h-100">
										<div class="card-body">
											<div class="fs-3 text-center fw-bold text-black mb-2">Weekly Calls Summary (29-Sep-2024 to 05-Oct-2024 )</div>
												<!-- (< ?php
															$monday = strtotime("last sunday");
															$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
															$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
															$this_week_start = date("d-m-Y",$monday);
															$this_week_end = date("d-m-Y",$sunday);
															echo "$this_week_start to $this_week_end ";
														 ?>) -->
											<div class="row">
												<div class="col-lg-6 mb-2"></div>
												<div class="col-lg-6 mb-2">
													<select class="form-select form-select-solid p-2" data-control="select2" id="weekly_based_callers_reports" onchange="weekly_based_callers_reports_func()">
														<option value="reports_1">Selva Kumar D</option>
														<option value="reports_2">Thensidhaa M</option>
														<option value="reports_3">Raghu S</option>
														<option value="reports_4">Arul Kumaran A</option>
														<option value="reports_5">Vimal G</option>
													</select>
												</div>
											</div>
							    		<div id="chart_weekly_calls_summary"></div>
							    		<!-- <div id="chart"></div> -->
							    	</div>
						    	</div>
						    </div>
						    <div class="col-lg-12 mb-3">
									<div class="card h-100">
										<div class="card-body">
											<div class="fs-3 text-center fw-bold text-black">Callers Summary (Sep-2024)</div>
							    		<div id="chart_monthly_calls_summary"></div>
							    	</div>
						    	</div>
						    </div>
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<?php $this->load->view("footer.php"); ?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script src="<?php echo base_url();?>assets/custom_js/highchart.js"></script>
		<?php $this->load->view("script.php"); ?>

		
		<script>
			$(".list_page").DataTable({
				// "ordering": false,
				"aaSorting":[],
				// "pagingType": 'simple_numbers',
				"pagingType": "full_numbers",
				// "sorting":false,
				"paging": false,
				// "buttons": [
				//             'copy', 'csv', 'excel', 'pdf', 'print'
				//         ],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				  // "pageLength": 5,
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start my-3'l>" +
				  // "<'col-sm-12 d-flex align-items-center justify-content-end my-3'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('.list_page').wrap('<div class="dataTables_scroll" />');
		</script>

		<!-- Today Calls Summary Start -->
		<script>
			Highcharts.chart('chart_today_calls_summary', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: 'false',
			        type: 'pie'
			    },
			    title: {
			        text: '',
			        align: 'center'
			    },
			    tooltip: {
			    	style: {
			            // color: 'blue',
			            fontSize:'15px'
			        },
			    	pointFormat: '<b>{series.name}</b>: {point.y}'
			        // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    credits: {
					    enabled: false
					},
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            innerSize: '40%',
			            size: 280,
			            dataLabels: {
			            	style: {
			                    fontSize: '12'  
			                },
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.y}'
			                // format: '<b>{point.name}</b>: {point.y:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Summary',
			        colorByPoint: true,
			        data: [{
			            name: 'Incoming Calls',
			            y: 78
			            // sliced: true,
			            // selected: true
			        }, {
			            name: 'Outgoing Calls',
			            y: 89
			        },  {
			            name: 'Missed Calls',
			            y: 15
			        }, {
			            name: 'Rejected Calls',
			            y: 12
			        }]
			    }]
			});
		</script>
		<!-- Today Calls Summary End -->

		<!-- Weekly Calls Summary Start -->
		<script type="text/javascript">
			var reports_1 = [{
		        name: 'Incoming Calls',
		        data: [44, 55, 41, 37, 22, 43, 21]
		    }, {
		        name: 'Outgoing Calls',
		        data: [53, 32, 33, 52, 13, 43, 32]
		    }, {
		        name: 'Missed Calls',
		        data: [12, 17, 11, 9, 15, 11, 20]
		    }, {
		        name: 'Rejected Calls',
		        data: [9, 7, 5, 8, 6, 9, 4]
		    }];

		    var reports_2 = [{
		        name: 'Incoming Calls',
		        data: [30, 40, 35, 50, 45, 60, 55]
		    }, {
		        name: 'Outgoing Calls',
		        data: [40, 30, 25, 35, 45, 50, 60]
		    }, {
		        name: 'Missed Calls',
		        data: [20, 15, 30, 20, 25, 30, 35]
		    }, {
		        name: 'Rejected Calls',
		        data: [25, 35, 30, 25, 20, 15, 10]
		    }];

		    var reports_3 = [{
		        name: 'Incoming Calls',
		        data: [40, 30, 25, 35, 45, 50, 60]
		    }, {
		        name: 'Outgoing Calls',
		        data: [30, 40, 35, 50, 45, 60, 55]
		    }, {
		        name: 'Missed Calls',
		        data: [25, 35, 30, 25, 20, 15, 10]
		    }, {
		        name: 'Rejected Calls',
		        data: [20, 15, 30, 20, 25, 30, 35]
		    }];


		    var reports_4 = [{
		        name: 'Incoming Calls',
		        data: [25, 35, 30, 25, 20, 15, 10]
		    }, {
		        name: 'Outgoing Calls',
		        data: [20, 15, 30, 20, 25, 30, 35]
		    }, {
		        name: 'Missed Calls',
		        data: [30, 40, 35, 50, 45, 60, 55]
		    }, {
		        name: 'Rejected Calls',
		        data: [25, 35, 30, 25, 20, 15, 10]
		    }];


		    var reports_5 = [{
		        name: 'Incoming Calls',
		        data: [20, 15, 30, 20, 25, 30, 35]
		    }, {
		        name: 'Outgoing Calls',
		        data: [40, 30, 25, 35, 45, 50, 60]
		    }, {
		        name: 'Missed Calls',
		        data: [20, 15, 30, 20, 25, 30, 35]
		    }, {
		        name: 'Rejected Calls',
		        data: [30, 40, 35, 50, 45, 60, 55]
		    }];

			var options = {
				series: reports_1,
		          chart: {
		          type: 'area',
		          zoom: {
		            enabled: false
		          },
		        },
		        title: {
			        text: '',
			        align: 'center',
			         fontWeight: 'bold',
			        style: {
			            fontSize: '18px',
			            
			          }
			    },
			    legend: {
		          position: 'bottom',
		          horizontalAlign: 'right',
		          fontSize: "16px"
		        },
		        dataLabels: {
		          enabled: false
		        },
		        stroke: {
		          curve: 'smooth'
		        },
		        xaxis: {
		          tooltip: {
				          enabled: false
				        },
				        labels: {
				          show: true,
				         },
		          // categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
		          categories: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']
		        }
		        };

		        var chart = new ApexCharts(document.querySelector("#chart_weekly_calls_summary"), options);
		        chart.render();

		        function weekly_based_callers_reports_func() {
				        var selectedValue = document.getElementById("weekly_based_callers_reports").value;
				        if (selectedValue === "reports_1") {
				            chart.updateSeries(reports_1);
				        }
				        else if (selectedValue === "reports_2") {
				            chart.updateSeries(reports_2);
				        }
				        else if (selectedValue === "reports_3") {
				            chart.updateSeries(reports_3);
				        }
				        else if (selectedValue === "reports_4") {
				            chart.updateSeries(reports_4);
				        }
				         else {
				            chart.updateSeries(reports_5);
				        }
				    };
		</script>
		<!-- Weekly Calls Summary End -->

		<!-- Monthly Calls Summary Start -->
		<script type="text/javascript">
			var options = {
          series: [{
          name: 'Incoming Calls',
          color: '#7239EA',
          data: [44, 55, 41, 37, 22]
        }, {
          name: 'Outgoing Calls',
          color: '#17C653',
          data: [53, 32, 33, 52, 13]
        }, {
          name: 'Missed Calls',
          color: '#FE7E01',
          data: [12, 17, 11, 9, 15]
        }, {
          name: 'Rejected Calls',
          color: '#FF0000',
          data: [9, 7, 5, 8, 6]
        }],
          chart: {
          type: 'bar',
          height: 350,
          stacked: true,
        },
        plotOptions: {
          bar: {
            horizontal: false,
            dataLabels: {
              total: {
                enabled: true,
                offsetX: 0,
                style: {
                  fontSize: '13px',
                  fontWeight: 900
                }
              }
            }
          },
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        title: {
          text: ''
        },
        xaxis: {
          categories: ['Selva Kumar D', 'Thensidhaa M', 'Raghu S', 'Arul Kumaran A', 'Vimal G'],
          labels: {
            formatter: function (val) {
              return val
            }
          }
        },
        yaxis: {
          title: {
            text: undefined
          },
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val
            }
          }
        },
        fill: {
          opacity: 1
        },
        legend: {
          position: 'bottom',
          horizontalAlign: 'right',
          offsetX: 40,
          fontSize: '18px'
        }
        };

        var chart_monthly_calls_summary = new ApexCharts(document.querySelector("#chart_monthly_calls_summary"), options);
        chart_monthly_calls_summary.render();
		</script>
		<!-- Monthly Calls Summary End -->

	</body>
	<!--end::Body-->
<!-- </html> -->