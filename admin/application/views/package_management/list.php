<?php $this->load->view("common.php"); ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; 
		var themeMode; if ( document.documentElement ) { 
			if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
			} else { 
				if ( localStorage.getItem("data-bs-theme") !== null ) { 
					themeMode = localStorage.getItem("data-bs-theme"); 
				} else { 
					themeMode = defaultThemeMode; 
				} 
			} if (themeMode === "system") { 
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
			} 
			document.documentElement.setAttribute("data-bs-theme", themeMode); 
		}
		</script>
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
							<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
								<!--begin::Col-->
								<div class="col-xxl-12">
									<div class="card">
										<div class="card-header pt-5 mb-2">
											<h3 class="card-title align-items-start flex-column">
												<div class="text-dark fw-bold mb-2 fs-3">Package Management</div>
												<div class="d-flex">
													<a href="<?php echo base_url(); ?>Dashboard" class="d-flex align-items-center fw-semibold text-gray-500 fs-6 me-2">Home</a>
													<!-- <div class="d-flex align-items-center me-2">
														<i class="fa-solid fa-chevron-right fs-7 text-gray-500"></i>
													</div>
													<a href="< ?php echo base_url(); ?>Usermanage" class="d-flex align-items-center fw-semibold text-gray-500 fs-6">Manage Role</a> -->
												</div>
											</h3>
											<div class="card-toolbar">
												<div class="d-flex justify-content-end gap-2 mb-2">
													<!-- <button type="button" class="btn btn-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-static="true"><i class="fa-solid fa-filter fs-7"></i>Filter</button>
													<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
														<div class="px-7 py-5" data-kt-user-table-filter="form">
															<div class="scroll-y mh-325px">
																<div class="mb-2">
																	<label class="form-label">Member Name</label>
																	<input type="text" id="" name="" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Member Name">
																</div>
																<div class="mb-2">
																	<label class="form-label">Username</label>
																	<input type="text" id="" name="" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Username">
																</div>
																<div class="mb-2">
																	<label class="form-label">Date</label>
																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_loan_list" onchange="date_filt();">
																		<option value="all">All</option>
																		<option value="today" selected>Today</option>
																		<option value="week">This Week</option>
																		<option value="monthly">This Month</option>
																		<option value="custom_date">Custom Date</option>
																	</select>
																</div>
																<div class="mb-2 fv-row" id="today_dt" style="display:block;">
																	<label class="form-label">Today</label>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_from_dt" style="display:none;">
																	<label class="form-label">From</label>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter" value="" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="week_to_dt" style="display:none;">
																	<label class="form-label">To</label>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="monthly_dt" style="display:none;">
																	<label class="form-label">This Month</label>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter" value="<?php echo date("m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="from_dt" style="display:none;">
																	<label class="form-label">From</label>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter" value="<?php echo date("d-m-Y"); ?>" />
																	</div>
																</div>
																<div class="mb-2 fv-row" id="to_dt" style="display:none;">
																	<label class="form-label">To</label>
																	<div class="d-flex align-items-center">
																		<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter" value="<?php echo date("d-m-Y"); ?>"/>
																	</div>
																</div>
															</div>
															<div class="d-flex justify-content-end">
																<button type="reset" class="btn btn-sm btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																<button type="submit" class="btn btn-sm btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
															</div>
														</div>
													</div>
													<a href="javascript:;" class="btn btn-primary btn-sm">
														<span class="me-2"><i class="fa-solid fa-file-export fs-7"></i></span>Export
													</a> -->
													<a href="javascript:;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_package">
														<span class="me-2"><i class="fa-solid fa-plus fs-7 fw-bold"></i></span>Add Package
													</a>
												</div>
											</div>
										</div>
										<div class="card-body">
											<div class="row">
												<?php foreach ($package_list as $i => $pcklist) { ?>
													<?php 
														$duration = $pcklist->duration == '3'? 'Life Time':( $pcklist->duration == '1' ? 'Month':'Year')
													?>
													<div class="col-sm-6 col-xl-4 mb-4">
														<div class="card card-flush h-100 w-100 shadow ribbon ribbon-top ribbon-clip">
															<div class="ribbon-label bg-info fs-3 text-black fw-bold">
																<label class="fs-4 fw-bold mb-1 text-white">
																	<span><i class="fa-solid fa-indian-rupee-sign fs-6 text-white me-1"></i></span>
																	<span><?php echo IND_money_format($pcklist->package_amount);?></span><br>
																	<?php if($pcklist->offer_check == '1'){?>
																	<span><i class="fa-solid fa-indian-rupee-sign fs-8 text-white mt-2"></i></span>
																	<span class="fs-7 fw-bold"><del><?php echo IND_money_format($pcklist->amount);?></del></span>
																	<?php }?>
																</label>
																<label class="fs-4 fw-bold mb-1 ms-1 me-1 text-white">/</label>
																<label class="fs-7 fw-bold mb-1 text-white"><?php echo $pcklist->duration == '3'? ' '.$duration: $pcklist->period .' '.$duration ?></label>
															</div>
															<div class="card-body px-4">
																<div class="row mt-8">
																	<div class="col-8 py-4">
																		<label class="fs-3 fw-bold mb-1"><?php echo $pcklist->package_name;?></label>
																	</div>
																	<div class="col-4 py-4">
																		<div class="d-flex align-items-center justify-content-end">
																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-3 px-2 py-2" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_package" onclick="edit_package('<?php echo $pcklist->package_id; ?>')">
																				<i class="fa-solid fa-pen-to-square fs-4 text-black"></i>
																			</a>
																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm px-2 py-2" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_package" title="Delete" onclick="lt_delete('<?php echo $pcklist->package_id; ?>','<?php echo $pcklist->package_name; ?>')">
																				<i class="fa-solid fa-trash-can fs-4 text-black"></i>
																			</a>
																		</div>
																	</div>
																</div>
																<?php foreach ($pcklist->descriptions_arr as $i => $desclist) { ?>  
																<div class="row">
																	<div class="col-8 d-flex flex-column mb-2">
																		<li class="d-flex align-items-center py-2">
																			<label class="bullet bullet-vertical h-20px w-5px bg-primary me-3"></label>
																			<label class="fw-bold"><?php echo $desclist['description'] ?></label>
																		</li>
																	</div>
																	<div class="col-4 mb-2 d-flex align-items-center justify-content-center">
																		<div class="fs-8 fw-bold mb-1" title="Dashboards View">
																			<?php if($desclist['yes_no'] == '1'){?>
																			 <i class="fa-solid fa-check text-success fs-3 fw-bold"></i>
																			 <?php } else{?>
																				<i class="fa-solid fa-xmark text-danger fs-3 fw-bold"></i>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<?php }?>
																<!-- <div class="d-flex justify-content-end align-items-center">
																	<a href="javascript:;" class="fs-6 fw-bold mb-1 text-black text-hover-primary" data-bs-toggle="modal" data-bs-target="#view_manage_package">View More ...</a>
																</div> -->
															</div>
														</div>
													</div>
												<?php }?>
											</div>
										</div>
									</div>
								</div>
							</div>
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

	<!--begin::Modal - Create Package-->
	<div class="modal fade" id="kt_modal_add_package" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static" data-bs-focus="false">
	    <div class="modal-dialog modal-lg">
	        <!--begin::Modal content-->
	        <div class="modal-content rounded">
	            <!--begin::Modal header-->
	            <div class="modal-header justify-content-end border-0 pb-0">
	                <!--begin::Close-->
	                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
	                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
	                    <span class="svg-icon svg-icon-1">
	                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
	                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
	                        </svg>
	                    </span>
	                    <!--end::Svg Icon-->
	                </div>
	                <!--end::Close-->
	            </div>
	            <!--end::Modal header-->
	            <div class="modal-body pt-0 pb-15 px-5 px-xl-10">
	                <!--begin::Heading-->
	                <div class="text-center">
	                    <h1 class="mb-3">Create Package</h1>
	                </div>
					<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Package_management/add" id="package_form">
						<div class="row mb-1">
							<div class="col-lg-6">
								<label class="col-form-label required fw-semibold fs-6">Package</label>
								<div class="fv-row">
									<input type="text" id="package_name_add" name="package_name" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Package Name">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-lg-6">
								
								<label class="col-form-label required fw-semibold fs-6">Period</label>
								<div class="d-flex align-items-center">
									<div class="me-2" id="period_shw_add">
										<input type="text" class="form-control form-control-lg_1 form-control-solid" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter Value" id="period_input_tbox" name="period_input_tbox">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="ms-2">
										<select class="form-select form-select-solid" data-width="200px" data-control="select2" data-dropdown-parent="#kt_modal_add_package" id="period_tbox" name="period_tbox" onchange="period_func();">
										<option value="">Select</option>
										<option value="1">Month</option>
										<option value="2">Years</option>
										<option value="3">Life Time</option>
										</select>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label required fw-semibold fs-6">Amount</label>
								<div class="fv-row">
									<input type="text" id="amount" name="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Amount">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-lg-4 col-form-label">
								<label class="form-check form-check-inline form-check-solid is-invalid mb-3">
									<input class="form-check-input border border-gray-600 me-2" name="offers_chk_add" value="0" type="checkbox" id="offers_chk_add" onclick="package_func_add();">
									<span class="fs-6 fw-semibold">Offer (%)</span>
									<span class="fs-6 fw-semibold text-danger" id="offer_dang_label_add"></span>
								</label>
								<input type="text" class="form-control form-control-lg_1 form-control-solid" id="offer_tbox_add" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); if (parseFloat(this.value) > 100) this.value = '100';" placeholder="Enter Offer Percentage" name="percentage" style="display: none;"/>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<div class="col-lg-4 mb-1 text-center">
								<label class="fs-3 fw-bold mb-1 mt-3">Total Amount</label>
								<div class="d-block align-items-center ">
									<label class="fs-3 fw-bold mb-1">
										<i class="fa-solid fa-indian-rupee-sign fs-4 text-success"></i>
									</label>
									<label class="fs-3 fw-bold mb-1 text-success" id="package_amount_label_add">0.00</label>
									<input type="hidden" id="package_amount_add" name="package_amount">
								</div>
							</div>
						</div>
						<div class="scroll-y mh-300px px-3">
							<div class="form-repeater_package_add" id="repeater_block">
								<div data-repeater-list="group-a_led_question">
									<div data-repeater-item>
										<div class="row" id="add_more_desc_1">
											<div class="col-lg-9 mb-1">
												<label class="col-form-label required fw-semibold fs-6">Description</label>
												<textarea type="text" rows="1" class="form-control form-control-solid sender-id" id="package_desc_1" name="package_desc[]" placeholder="Enter Description"></textarea>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<div class="col-lg-2 col-form-label mb-1">
												<label class="form-check form-check-inline form-check-solid mt-10">
													<input type="hidden" name="package_available[]" value="0">
													<input class="form-check-input border border-gray-600 me-2" type="checkbox" id="package_available_1" name="package_available[]" value="1" > 
													<span class="fs-6 fw-semibold">Available</span>
												</label>
											</div>
											<div class="col-lg-1">
												<a href="javascript:;" class="btn btn-secondary mt-10 px-1 py-2 package_add_del" id="package_add_del" style="display: none !important;" onclick="rmv_prp_target_spec(1);">
													<i class="fa-solid fa-trash-can fs-4 ms-1"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-1 mt-1">
						<input type="hidden" name="repeater_block_pckg_desc" id="repeater_block_pckg_desc" value="1">
						<button type="button" class="btn btn-primary package_add px-4 py-2 fw-semibold fs-7" data-repeater-create id="package_add" onclick="add_prp_vendor_details()">
							<i class="fa-solid fa-plus ms-1"></i>Add More
						</button>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
							<button type="button" id="btnSubmit_add" class="btn btn-sm btn-primary" onclick="package_validation()">Create Package</button>
						</div>
					</form>
	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Create Package-->


	<!--begin::Modal - Update Package-->
	<div class="modal fade" id="kt_modal_edit_package" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static" data-bs-focus="false">
	    <div class="modal-dialog modal-lg">
	        <!--begin::Modal content-->
	        <div class="modal-content rounded">
	            <!--begin::Modal header-->
	            <div class="modal-header justify-content-end border-0 pb-0">
	                <!--begin::Close-->
	                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
	                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
	                    <span class="svg-icon svg-icon-1">
	                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
	                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
	                        </svg>
	                    </span>
	                    <!--end::Svg Icon-->
	                </div>
	                <!--end::Close-->
	            </div>
	            <!--end::Modal header-->
	            <div class="modal-body pt-0 pb-15 px-5 px-xl-10">
					<div id="edit_package_div">

					</div>
	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Update Package-->

	<!--begin::Modal - Delete Package-->
	<div class="modal fade" id="kt_modal_delete_package" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
	  <!--begin::Modal dialog-->
	  <div class="modal-dialog modal-m">
	    <!--begin::Modal content-->
	    <div class="modal-content rounded">
	      <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
	        <div class="swal2-icon-content">?</div>
	      </div>
		  <form method="POST" id="delete_form" action="Package_management/package_delete">
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete Package ?
				<div class="d-block fw-bold fs-5 py-2">
					<input type="hidden" id="delete_package_id" name="delete_package_id">
					<input type="hidden" id="delete_package_name_save" name="delete_package_name_save">
					<label id="delete_package_name"></label>
				</div>
			</div>
			<div class="d-flex justify-content-center align-items-center pt-8">
				<button type="submit" id="del_Btn" class="btn btn-danger me-3">Yes, delete!</button>
				<button type="reset" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No,cancel</button>
			</div><br><br>
		  </form>
	    </div>
	    <!--end::Modal content-->
	  </div>
	  <!--end::Modal dialog-->
	</div>
	<!--end::Modal - Delete Package-->

		<?php $this->load->view("script.php"); ?>
		
		<script>
			function period_func()
			{
				var period_tbox = document.getElementById("period_tbox").value;
				var period_input_tbox = document.getElementById("period_input_tbox");

				if (period_tbox == "3") {
					$('#period_shw_add').hide();
					period_input_tbox.disabled = true;
				}
				else
				{
					$('#period_shw_add').show();
					period_input_tbox.disabled = false;
				}
			}
		</script>
		<script>
			function package_func_add() {	
				var offers_chk_add = document.getElementById("offers_chk_add");
				var offer_tbox_add = document.getElementById("offer_tbox_add");
				
				if (offers_chk_add.checked) {
					$('#offers_chk_add').val('1');
				offer_tbox_add.style.display = "block";
				document.getElementById("offer_dang_label_add").innerHTML = "*";
				} else {
					$('#offers_chk_add').val('0');
				offer_tbox_add.style.display = "none";
				document.getElementById("offer_dang_label_add").innerHTML = "";
				}
			}

			
		</script>
		<script>
		//   $('.package_add').on('click', e => {


		//     var bt = parseFloat($('.form-repeater_package_add').length);
		//     let $clone = $('.form-repeater_package_add').first().clone().hide();
		//     $clone.insertBefore('.form-repeater_package_add:first').slideDown();
		//     if (bt == 1) {
		//       $('.package_add_del').attr('style', 'display: block !important');
		//     } else {
		//       $('.package_add_del').attr('style', 'display: block !important');
		//     }
		//   });

		//   $(document).on('click', '.form-repeater_package_add .package_add_del', e => {
		//     var bt = parseFloat($('.package_add_del').length);
		//     // alert(bt);
		//     $(e.target).closest('.form-repeater_package_add').slideUp(400, function() {
		//       $(this).remove()
		//     });
		//     if (bt == 2) {
		//       $('.package_add_del').attr('style', 'display: none !important');
		//     } else {}


		//   });
		</script>


	

		<!-- //edit package modal -->
		<script>
		var baseurl = '<?php echo base_url(); ?>';
			function edit_package(val) {
				$.ajax({
					type: "POST",
					url: baseurl + 'Package_management/edit',
					data: {
						id: val
					},
					dataType: "html",
					success: function(response) {
						if (response) {
							$('#edit_package_div').empty().append(response);
							$(".select_value").each(function() {
								if ($(this).hasClass('select2-hidden-accessible')) {
									$(this).select2('destroy');
								}
								$(this).select2({
									// Add your Select2 options here
								});
							});

						} else {
							console.error('Invalid response received');
						}
					},
					error: function(xhr, status, error) {
						console.error('AJAX error:', status, error);
					}
				});
			}
		</script>
		<!-- // delete Package -->
		<script>
		function lt_delete(val, name) {
			console.log(val)
			$('#delete_package_id').empty().val(val);
			$('#delete_package_name').html(name);
			$('#delete_package_name_save').val(name);
		}
		</script>

		<script>
		// Function to calculate the discount and update the total amount
			function updateTotalAmount() {
				// Get the value of amount
				var amount = parseFloat(document.getElementById("amount").value) || 0;
				
				// Get the discount offer checkbox status
				var isOfferChecked = document.getElementById("offers_chk_add").checked;
				
				// Get the offer percentage, ensure it doesn't exceed 100
				var offerPercentage = parseFloat(document.getElementById("offer_tbox_add").value) || 0;
				if (offerPercentage > 100) {
					offerPercentage = 100;  // Limit offer percentage to 100
				}

				// Calculate the discount amount if the offer checkbox is checked
				var discountAmount = 0;
				if (isOfferChecked && offerPercentage > 0) {
					discountAmount = (offerPercentage / 100) * amount;
				}

				// Calculate the total amount after discount
				var totalAmount = amount - discountAmount;

				// Update the displayed total amount
				document.getElementById("package_amount_label_add").textContent = totalAmount.toFixed(2);
				
				// Update the hidden input with the total amount
				document.getElementById("package_amount_add").value = totalAmount.toFixed(2);
			}

			// Event listener for changes in the amount field
			document.getElementById("amount").addEventListener("input", function() {
				updateTotalAmount();
			});

			// Event listener for changes in the offer checkbox
			document.getElementById("offers_chk_add").addEventListener("change", function() {
				updateTotalAmount();
			});

			// Event listener for changes in the offer percentage field
			document.getElementById("offer_tbox_add").addEventListener("input", function() {
				updateTotalAmount();
			});
		</script>

		<script>
			function add_prp_vendor_details() {
				var cp_inc = $('#repeater_block_pckg_desc').val();
				cp_inc = Number(cp_inc) + 1;

				$('#repeater_block').append(`
					<div class="row" id="add_more_desc_${cp_inc}">
						<div class="col-lg-9 mb-1">
							<label class="col-form-label required fw-semibold fs-6">Description</label>
							<textarea type="text" rows="1" class="form-control form-control-solid sender-id" id="package_desc_${cp_inc}" name="package_desc[]" placeholder="Enter Description"></textarea>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<div class="col-lg-2 col-form-label mb-1">
							<label class="form-check form-check-inline form-check-solid mt-10">
								<input type="hidden" name="package_available[]" value="0">
								<input class="form-check-input border border-gray-600 me-2" type="checkbox" id="package_available_${cp_inc}" name="package_available[]" value="1" >
								<span class="fs-6 fw-semibold">Available</span>
							</label>
						</div>
						<div class="col-lg-1">
							<a href="javascript:;" class="btn btn-secondary mt-10 px-1 py-2 package_add_del" onclick="rmv_prp_target_spec(${cp_inc});">
								<i class="fa-solid fa-trash-can fs-4 ms-1"></i>
							</a>
						</div>
					</div>
				`);

				$('#repeater_block_pckg_desc').val(cp_inc); // Update the hidden input field to track the count
			}

			
			
			// Function to remove a description field
			function rmv_prp_target_spec(lid) {
				$('#add_more_desc_' + lid).remove();
				lid = lid - 1;
				$('#repeater_block_pckg_desc').val(lid); // Update the count
			}
		</script>

			<!-- // package Add Validation -->
		<script>
			function package_validation() {
				$("#btnSubmit_add").prop('disabled', true);
				let err = 0;
				var package_name = $('#package_name_add').val();
				var period = $('#period_input_tbox').val();
				var duration = $('#period_tbox').val();
				var amount = $('#amount').val();
				var percentage = $('#offer_tbox_add').val();
				var offer_chk = $('#offers_chk_add').val();
				// var duration = $('#period_tbox').val();
				
				// console.log(offer_chk)
				// Clear previous errors
				$('#package_name_add').siblings('.invalid-feedback').text('').show();
				$('#period_input_tbox').siblings('.invalid-feedback').text('').show();
				$('#period_tbox').siblings('.invalid-feedback').text('').show();
				$('#amount').siblings('.invalid-feedback').text('').show();
				$('#offer_tbox_add').siblings('.invalid-feedback').text('').show();

				// Initialize error flag
				let hasError = false;

				if (package_name === '') {
					$('#package_name_add').siblings('.invalid-feedback').text('Package Name is Required.').show();
					hasError = true;
				}else if(package_name){
					var datastring = "&package_name=" + package_name;
					$.ajax({
						type: "POST",
						url: baseurl + 'Package_management/chk_package_unique',
						data: datastring,
						cache: false,
						dataType: "html",
						success: function(result) {
							if (result > 0) {
								$('#package_name_add').siblings('.invalid-feedback').text('Package Name is already exists.').show();
								hasError = true;
							}
						},
						error: function() {
							$('#package_name_add').siblings('.invalid-feedback').text('An error occurred. Please try again.').show();
						}
					});

				}

				if (duration === '') {
					$('#period_tbox').siblings('.invalid-feedback').text('Duration is Required.').show();
					hasError = true;
				}
				
				if(duration != '3' || duration == ''){
					
					if (period === '') {
						$('#period_input_tbox').siblings('.invalid-feedback').text('period is Required.').show();
						hasError = true;
					}
				}
				if (amount === '') {
					$('#amount').siblings('.invalid-feedback').text('Amount is Required.').show();
					hasError = true;
				}

				if(offer_chk == '1'){
					if (percentage === '') {
					$('#offer_tbox_add').siblings('.invalid-feedback').text('Percentage is Required.').show();
					hasError = true;
				}
				}

				var count = $("#repeater_block_pckg_desc").val();

				// Loop over all the added description fields
				for (var i = 1; i <= count; i++) {
					var package_desc = $("#package_desc_" + i).val();
					
					if (package_desc == '') {
						$("#package_desc_" + i).siblings('.invalid-feedback').text('Package Description is Required.').show();
						hasError = true;
					} else {
						$("#package_desc_" + i).siblings('.invalid-feedback').text('').hide();
					}

					var checkbox = $("#package_available_" + i);
		
					// If the checkbox is checked, it will pass 1; if unchecked, 0
					if (checkbox.is(":checked")) {
						checkbox.val('1');
						$("#package_available_" + i).siblings('input[type="hidden"]').remove();

					} else {
						checkbox.val('0');
					}
				}

				// If there are errors, return false immediately

				if (hasError) {
					$("#btnSubmit_add").prop('disabled', false);
					return false;
				}
				else{
					$("#btnSubmit_add").prop('disabled', true);
					// return false;
					$('#package_form').submit();
				}
			}
		</script>

	</body>
	<!--end::Body-->
</html>
