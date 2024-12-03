<?php $this->load->view("common.php"); ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; 
		if ( document.documentElement ) { 
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
												<div class="text-dark fw-bold mb-2 fs-3">Subscription Management</div>
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
													
													<!-- <a href="javascript:;" class="btn btn-primary btn-sm">
														<span class="me-2"><i class="fa-solid fa-file-export fs-7"></i></span>Export
																	
													</a> -->
													<div>
														<button type="button" class="btn btn-sm btn-primary me-3 mb-4" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-static="true"><i class="fa-solid fa-filter fs-7"></i>Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">

																<form method="post" action="<?php echo base_url() ?>Subscription_management" id="fill_form">
																	<div class="scroll-y mh-325px">
																		<div class="mb-2">
																			<label class="form-label">Subscriber</label>
																			<input type="text" class="form-control form-control-solid" name="user_name_fill" id="user_name_fill" placeholder="Enter Subscriber Name"  value="<?php echo $user_name_fill ? $user_name_fill : '' ?>" />
																		</div>
																		<div class="mb-2">
																			<label class="form-label">Company</label>
																			<input type="text" class="form-control form-control-solid" name="comp_name_fill" id="comp_name_fill" placeholder="Enter Member Name" value="<?php echo $comp_name_fill ? $comp_name_fill : '' ?>" />
																			<input type="hidden" class="sorting_filter_class" name="sorting_filter" id="sorting_filter" value="<?php echo $perpage ? $perpage : 10; ?>" />
																		</div>
																		<div class="mb-2">
																			<label class="form-label">Mobile No</label>
																			<input type="text" class="form-control form-control-solid" name="user_mobile_fill" id="user_mobile_fill" placeholder="Enter Mobile No" value="<?php echo $user_mobile_fill ? $user_mobile_fill : '' ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" />
																		</div>
																		<div class="mb-2">
																			<label class="form-label">Package</label>
																			<select class="form-select form-select-solid" data-control="select2" name="package_id_fill">
																				<option value="">All</option>
																				<option value="1" <?php echo $package_id_fill == "1" ? "selected" : '' ?>>Silver Package</option>
																				<option value="2"<?php echo $package_id_fill == "2" ? "selected" : '' ?>>Gold Package</option>
																				<option value="3"<?php echo $package_id_fill == "3" ? "selected" : '' ?>>Premium Package</option>
																			</select>
																		</div>
																		<div class="mb-2">
																			<label class="form-label">Status</label>
																			<select class="form-select form-select-solid" data-control="select2" name="subscriber_status_fill">
																				<option value="">All</option>
																				<option value="0"<?php echo $subscriber_status_fill == "0" ? "selected" : '' ?>>Active Subscriber</option>
																				<option value="1"<?php echo $subscriber_status_fill == "1" ? "selected" : '' ?>>Blocked Subscriber</option>
																				<option value="3"<?php echo $subscriber_status_fill == "3" ? "selected" : '' ?>>Expired Subscriber</option>
																			</select>
																		</div>
																		<!--begin::Input group-->
																		<div class="mb-2">
																			<label class="form-label fs-6 fw-semibold">Date</label>
																			<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="dt_fill_select_value" id="dt_fill_select_value" onchange="date_fill_valdiation();">
																				<option value="all" <?php echo $dt_fill == "all" ? "selected" : '' ?>>All</option>
																				<option value="today" <?php echo $dt_fill == "today" ? "selected" : '' ?>>Today</option>
																				<option value="week" <?php echo $dt_fill == "week" ? "selected" : '' ?>>This Week</option>
																				<option value="monthly" <?php echo $dt_fill == "monthly" ? "selected" : '' ?>>This Month</option>
																				<option value="Custom date" <?php echo $dt_fill == "Custom date" ? "selected" : '' ?>>Custom Date</option>
																			</select>
																			<div class="mb-2 fv-row" id="today_dt_fillter" style="display:none;">
																				<div class="fv-row mt-2">
																					<label class="form-label">Today</label>
																					<div class="d-flex align-items-center">
																						<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																						<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																								<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																								<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																								<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																							</svg>
																						</span>
																						<!--end::Svg Icon-->
																						<input type="text" class="form-control form-control-solid ps-12" placeholder="Today Date" name="today_date_fillter" placeholder="Date" id="today_date_fillter" value="<?php echo date("d-m-Y"); ?>" disabled />
																					</div>
																				</div>
																			</div>

																			<div class="mb-2 fv-row" id="week_from_dt_filter" style="display:none;">
																				<div class="fv-row mt-2">
																					<label class="form-label">From</label>
																					<div class="d-flex align-items-center">
																						<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																						<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																								<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																								<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																								<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																							</svg>
																						</span>
																						<!--end::Svg Icon-->
																						<input type="text" class="ps-12 form-control form-control-solid" name="" placeholder="Date" id="week_from_date_fillter_textbox" value="" disabled />
																					</div>
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="week_to_dt_filter" style="display:none;">
																				<div class="fv-row mt-2">
																					<label class="form-label">To</label>
																					<div class="d-flex align-items-center">
																						<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																						<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																								<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																								<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																								<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																							</svg>
																						</span>
																						<!--end::Svg Icon-->
																						<input type="text" class=" ps-12 form-control form-control-solid" name="" placeholder="Date" id="week_to_date_fillter_textbox" value="<?php echo date("d-m-Y"); ?>" disabled>
																					</div>
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="monthly_dt_filter" style="display:none;">
																				<div class="fv-row mt-2">
																					<label class="form-label">This Month</label>
																					<div class="d-flex align-items-center">
																						<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																						<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																								<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																								<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																								<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																							</svg>
																						</span>
																						<!--end::Svg Icon-->
																						<input type="text" class="ps-12 form-control form-control-solid" name="monthly_date_fillter_textbox" placeholder="Month" id="monthly_date_fillter_textbox" value="<?php echo date("m-Y"); ?>" />
																					</div>
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="from_dt_filter" style="display:none;">
																				<div class="fv-row mt-2">
																					<label class="form-label">From</label>
																					<div class="d-flex align-items-center">
																						<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																						<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																								<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																								<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																								<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																							</svg>
																						</span>
																						<!--end::Svg Icon-->
																						<input type="text" class="ps-12 form-control form-control-solid" name="from_date_fillter_textbox" placeholder="From Date" id="from_date_fillter_textbox" value="<?php echo date("d-m-Y"); ?>" />
																					</div>
																				</div>
																			</div>
																			<div class="mb-2 fv-row" id="to_dt_filter" style="display:none;">
																				<div class="fv-row mt-2">
																					<label class="form-label">To</label>
																					<div class="d-flex align-items-center">
																						<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																						<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																								<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																								<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																								<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																							</svg>
																						</span>
																						<!--end::Svg Icon-->
																						<input type="text" class="ps-12 form-control form-control-solid" name="to_date_fillter_textbox" placeholder="To Date" id="to_date_fillter_textbox" value="<?php echo date("d-m-Y"); ?>" />
																					</div>
																				</div>
																			</div>
																		</div>
																		<!--end::Input group date-->
																	</div>
																	<div class="d-flex justify-content-end">
																		<a href="<?php echo base_url(); ?>Subscription_management" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</a>
																		<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div>
														<button type="button" type="button" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" class="btn btn-sm btn-primary me-3 mb-4"> <i class="fa-solid fa-file-export fs-7"></i> Export</button>
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
															<div data-kt-user-table-filter="form_1">
																<div class="menu-item px-3">
																	<a href="javascript:;" class="menu-link px-3" id="export_excel">
																		<i class="fas fa-file-excel fs-4 me-3"></i>
																		Excel
																	</a>
																</div>
																<div class="menu-item px-3">
																	<a href="javascript:;" class="menu-link px-3" id="export_csv">
																		<i class="fas fa-file-csv fs-4 me-3"></i>
																		CSV
																	</a>
																</div>
																<div class="menu-item px-3">
																	<a href="javascript:;" class="menu-link px-3" id="export_pdf">
																		<i class="fas fa-file-pdf fs-4 me-3"></i>
																		PDF
																	</a>
																</div>
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
										 <?php $common_date= get_general_settings()->date_format ?? 'd-M-Y'; ?>
										

										<div class="card-body pt-2">
											<div class="row">
												<div class="col-lg-12 mb-4">
													<?php $perpage_count = $perpage ? $perpage : 10; ?>
													<div class="col-lg-2">
														<span>Show Entries</span>
														<br>
														<select id="perpage" name="perpage" class="form-select form-select-sm  form-select-solid w-80px" data-width="80px" data-control="select2" onchange="sort_filter(this.value);">

															<?php
															$options = [10, 25, 100, 500]; // Define available options
															?>
															<?php foreach ($options as $option): ?>
																<option value="<?php echo $option; ?>" <?php echo ($perpage_count == $option) ? 'selected' : ''; ?>>
																	<?php echo $option; ?>
																</option>
															<?php endforeach; ?>

														</select>
													</div>
												</div>
												<div class="col-lg-12">
													<table class="table align-middle table-striped table-hover fs-7 gy-3 gs-2 list_page">
														<thead>
															<tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
																<th class="min-w-150px">Subscriber</th>
																<th class="min-w-80px">Company / Mobile No</th>
																<th class="min-w-80px">Package</th>
																<th class="min-w-100px">Start / End Date</th>
																<th class="min-w-100px">Renewal Days</th>
																<th class="min-w-80px">Status</th>
																<th class="min-w-100px"><span class="text-end">Actions</span></th>
															</tr>
														</thead>
														<tbody class="text-gray-800 fw-bold fs-7">
															<?php if(isset($subscriber_data)){?>
																<?php foreach ($subscriber_data as $i => $sublist) { ?>
																	<?php 
																		$duration = $sublist->duration == '3'? 'Life Time':( $sublist->duration == '1' ? 'Month':'Year')
																	?>
																	<?php
																	$first_character = isset($sublist->name) && $sublist->name ? $sublist->name[0] : 'A';
																	$str = strtoupper($first_character);

																	$photo_url = base_url() . 'assets/Images/users/' . $sublist->image;
																	$letter_url = base_url() . 'assets/Images/Letters/' . $str . '.png';
																	$photo_path = FCPATH . 'assets/Images/users/' . $sublist->image;
																	$letter_path = FCPATH . 'assets/Images/Letters/' . $str . '.png';
																	?>
																	<tr>
																		<td>
																			<div class="d-flex align-items-center">
																				<?php if (!empty($sublist->image) && file_exists($photo_path)) { ?>
																				<a class="d-block overlay text-center me-3" href="<?php echo $photo_url; ?>" data-fslightbox="lightbox-basic_list">
																					<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px" style="background-image:url('<?php echo $photo_url; ?>')">
																					</div>
																					<div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
																						<i class="bi bi-eye-fill text-white fs-2"></i>
																					</div>
																				</a>
																				<?php } else if (file_exists($letter_path)) { ?>
																					<a class="d-block overlay text-center me-3" href="<?php echo $letter_path; ?>" data-fslightbox="lightbox-basic_list">
																						<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px" style="background-image:url('<?php echo $letter_path; ?>')">
																						</div>
																						<div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
																							<i class="bi bi-eye-fill text-white fs-2"></i>
																						</div>
																					</a>

																				<?php } ?>
																				<div class="mb-0 me-2">
																					<label class="fs-7 fw-semibold text-black"><?php echo $sublist->name ?></label>
																					<label class="cursor-pointer fs-7 fw-semibold text-black ms-1"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $sublist->email_id ?>">
																						<i class="fa-solid fa-envelope fs-5 text-black"></i>
																					</label>
																					<div class="d-block fs-8 fw-semibold text-gray-600"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Created Date"><?php echo date($common_date,strtotime($sublist->created_at)) ?></div>
																				</div>
																			</div>
																		</td>
																		<td class="text-start">
																			<label class="fs-7 text-black"><?php echo $sublist->user_company ?></label>
																			<div class="d-block">
																				<div class="badge badge-secondary fw-bold text-black fs-8"><?php echo $sublist->mobile_no ?></div>
																			</div>
																		</td>
																		<td class="text-start">
																			<label class="fs-7 text-black"><?php echo $sublist->package_name ?></label>
																			<label class="fs-7 text-black ms-1 me-1">/</label>
																			<label class="fs-7 text-black"><?php echo $sublist->duration == '3'? ' '.$duration: $sublist->period .' '.$duration ?></label>
																			<div class="d-block">
																				<label class="badge badge-warning fs-8 text-black me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Caller Count"><?php echo $sublist->no_of_callers ?></label>
																				<label class="badge badge-info">
																					<span class="fs-8 text-black">
																						<i class="fa-solid fa-indian-rupee-sign fs-8 text-white me-1"></i>
																					</span>
																					<span class="fs-8 text-white"><?php echo IND_money_format($sublist->amount);  ?></span>
																				</label>
																			</div>
																		</td>
																		<td align="start">
																			<div class="badge badge-success fs-7"><?php echo date($common_date,strtotime($sublist->start_date)) ?></div>
																			<div class="d-block mt-1">
																				<div class="badge badge-danger fs-7"><?php echo date($common_date,strtotime($sublist->end_date)) ?></div>
																			</div>
																		</td>
																		<td align="start">
																			<div class="badge badge-warning text-black fs-7"><?php echo renewal_days_count($sublist->subscriber_id)?> Days</div>
																		</td>
																		<td>
																			<?php if($sublist->status==0) { ?>
																				<button class="badge badge-success text-white fw-bold fs-7 rounded border-0" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">Active Subscriber</button>
																				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px mt-1" data-kt-menu="true">
																					<div class="py-3">
																						<div class="menu-item px-3">
																							<a href="javascript:;" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_block_subscriber" onclick="block_func(<?php echo $sublist->user_id;?>,'<?php echo $sublist->name;?>')">Block Subscriber</a>
																						</div>
																					</div>
																				</div>
																			<?php } else if($sublist->status == 1) { ?>
																				<button class="badge badge-warning text-black fw-bold fs-7 rounded border-0" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true" style="background-color: #FF7F00 !important;">Blocked Subscriber</button>
																				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px mt-1" data-kt-menu="true">
																					<div class="py-3">
																						<div class="menu-item px-3">
																							<a href="javascript:;" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_unblock_subscriber" onclick="unblock_func(<?php echo $sublist->user_id;?>,'<?php echo $sublist->name;?>')">Unblock Subscriber</a>
																						</div>
																					</div>
																				</div>
																			<?php }else if($sublist->status ==3) { ?>
																				<div class="badge badge-danger text-white fw-bold fs-7 rounded">Expired</div>
																			<?php } ?>
																		</td>
																		<td>
																			<span class="text-end">
																				<?php if($sublist->status ==3) { ?>
																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_renewal_subscriber" onclick="view_expired_func(<?php echo $sublist->subscriber_id;?>)">
																						<i class="fa-solid fa-repeat fs-2 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Subscriber"></i>
																					</a>
																				<?php } ?>
																				<a href="<?php echo base_url(); ?>Subscription_management/view_subscriber/<?php echo $sublist->subscriber_id; ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																					<i class="fa-solid fa-eye fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View"></i>
																				</a>
																				<!-- <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_user">
																					<i class="fa-solid fa-trash-can fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i>
																				</a> -->
																			</span>
																		</td>
																	</tr>
																<?php }?>
															<?php }?>
															
														</tbody>
													</table>
														<div class="row">
															<div class="col-lg-3">Showing <?php echo $page; ?> to <?php echo (($page + $perpage_count) > count($subscriber_data)) ? count($subscriber_data) : $page + $perpage_count; ?> of <?php echo count($subscriber_data); ?> entries</div>
																<div class="col-lg-9 d-flex justify-content-end">
																	<?php
																	$coun = ceil($count ?? 10 / 10);
																	$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
																	?>
																	<?php
																	function get_paging_info1($tot_rows, $pp, $curr_page)
																	{
																		$pages = ceil($tot_rows / $pp); // calc pages

																		$data = array(); // start out array
																		$data['si']        = ($curr_page * $pp) - $pp; // what row to start at
																		$data['pages']     = $pages;                   // add the pages
																		$data['curr_page'] = $curr_page;               // Whats the current page
																		$paging_info['curr_url'] = base_url();
																		return $data; //return the paging data

																	} ?>
																	<?php $paging_info = get_paging_info1($count ?? 10, 10, $c_page); ?>

																	<form method="POST" id="filter_form" action="" enctype="multipart/form-data">
																		<!-- SET FILTER pAGINATION -->
																		<input type="hidden" id="comp_name_fill" name="comp_name_fill" value="<?php echo $comp_name_fill ?? ''; ?>">
																		<input type="hidden" id="subscriber_status_fill" name="subscriber_status_fill" value="<?php echo $subscriber_status_fill ?? ''; ?>">
																		<input type="hidden" id="dt_fill_select_value" name="dt_fill_select_value" value="<?php echo $dt_fill ?? ''; ?>">
																		<input type="hidden" id="from_date_fillter_textbox" name="from_date_fillter_textbox" value="<?php echo $from_date_fillter ?? ''; ?>">
																		<input type="hidden" id="to_date_fillter_textbox" name="to_date_fillter_textbox" value="<?php echo $to_date_fillter ?? ''; ?>">
																		<input type="hidden" id="user_name_fill" name="user_name_fill" value="<?php echo $user_name_fill ?? ''; ?>">
																		<input type="hidden" id="package_id_fill" name="package_id_fill" value="<?php echo $package_id_fill ?? ''; ?>">
																		<input type="hidden" id="user_mobile_fill" name="user_mobile_fill" value="<?php echo $user_mobile_fill ?? ''; ?>">
																		<input type="hidden" class="sorting_filter_class" name="sorting_filter" id="sorting_filter" value="<?php echo $perpage ? $perpage : 10; ?>" />

																		<ul class="pagination" style="float:right;">
																			<!-- If the current page is more than 1, show the First and Previous links -->
																			<?php if ($paging_info['curr_page'] > 1) : ?>

																				<li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] - 1); ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer' title='Page <?php echo ($paging_info['curr_page'] - 1); ?>'>
																						<< </a>
																				</li>

																			<?php endif; ?>



																			<?php
																			//setup starting point

																			//$max is equal to number of links shown
																			$max = 3;
																			if ($paging_info['curr_page'] < $max)
																				$sp = 1;
																			elseif ($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)))
																				$sp = $paging_info['pages'] - $max + 1;
																			elseif ($paging_info['curr_page'] >= $max)
																				$sp = $paging_info['curr_page']  - floor($max / 2);
																			?>

																			<!-- If the current page >= $max then show link to 1st page -->
																			<?php if ($paging_info['curr_page'] >= $max) : ?>

																				<li class='paginate_button page-item move_to' value="1"><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link cursor-pointer' onclick="form_submit()" title='Page 1'>1</a></li>
																				<!--<li class='paginate_button page-item '><input type="submit" name="first_page" value="Update" />  </li>-->
																				..
																			<?php endif; ?>
																			<!-- Loop though max number of pages shown and show links either side equal to $max / 2 -->
																			<?php for ($i = $sp; $i <= ($sp + $max - 1); $i++) : ?>

																				<?php
																				if ($i > $paging_info['pages'])
																					continue;
																				?>

																				<?php if ($paging_info['curr_page'] == $i) : ?>

																					<li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer text-hover-dark' title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

																				<?php else : ?>

																					<li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link cursor-pointer' title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

																				<?php endif; ?>

																			<?php endfor; ?>
																			<!-- If the current page is less than say the last page minus $max pages divided by 2-->
																			<!-- < ?php if ($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

																				..
																				<li class='paginate_button page-item  move_to' value="< ?php echo $paging_info['pages']; ?>"><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer' title='Page < ?php echo $paging_info['pages']; ?>'>< ?php echo $paging_info['pages']; ?></a></li>

																			< ?php endif; ?> -->

																			<!-- Show last two pages if we're not near them -->
																			<?php if ($paging_info['curr_page'] < $paging_info['pages']) : ?>

																				<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link cursor-pointer ' title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'> >> </a></li>



																			<?php endif; ?>
																		</ul>
																	</form>
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
					<?php $this->load->view("footer.php"); ?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->

	<!--begin::Modal - Renewal Subscriber-->
	<div class="modal fade" id="kt_modal_renewal_subscriber" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
	    <div class="modal-dialog modal-xl">
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
					<div id="view_expired_div"></div>
	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Renewal Subscriber-->

	<!--begin::Modal - Unblock Subscriber-->
	<div class="modal fade" id="kt_modal_unblock_subscriber" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
	  <!--begin::Modal dialog-->
	  <div class="modal-dialog modal-m">
	    <!--begin::Modal content-->
	    <div class="modal-content rounded">
			<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Subscription_management/unblock_subscriber" >
				<div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
					<div class="swal2-icon-content">?</div>
				</div>
				<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Unblock Subscriber ?
					<div class="d-block fw-bold fs-5 py-2">
					<label id="unblock_name"></label>
					<input type="hidden" name="user_id" id="unblock_id">
					</div>
				</div>
				<div class="d-flex justify-content-center align-items-center pt-8">
					<button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">No</button>
					<button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Yes</button>
				</div><br><br>
			</form>
	    </div>
	    <!--end::Modal content-->
	  </div>
	  <!--end::Modal dialog-->
	</div>
	<!--end::Modal - Unblock Subscriber-->

	<!--begin::Modal - Block Subscriber-->
	<div class="modal fade" id="kt_modal_block_subscriber" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
	  <!--begin::Modal dialog-->
	  <div class="modal-dialog modal-m">
	    <!--begin::Modal content-->
	    <div class="modal-content rounded">
			<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Subscription_management/block_subscriber">
				<div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
					<div class="swal2-icon-content">?</div>
				</div>
				<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Block Subscriber ?
					<div class="d-block fw-bold fs-5 py-2">
					<label id="block_name"></label>
					<input type="hidden" name="user_id" id="block_id">
					</div>
				</div>
				<div class="d-flex justify-content-center align-items-center pt-8">
					<button type="reset" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">No</button>
					<button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Yes</button>
				</div><br><br>
			</form>
	    </div>
	    <!--end::Modal content-->
	  </div>
	  <!--end::Modal dialog-->
	</div>
	<!--end::Modal - Block Subscriber-->

	<!--begin::Modal - Delete User-->
	<div class="modal fade" id="kt_modal_delete_user" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
	  <!--begin::Modal dialog-->
	  <div class="modal-dialog modal-m">
	    <!--begin::Modal content-->
	    <div class="modal-content rounded">
	      <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
	        <div class="swal2-icon-content">?</div>
	      </div>
	      <div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete User ?
	        <div class="d-block fw-bold fs-5 py-2">
	          <label>Sana S</label>
	        </div>
	      </div>
	      <div class="d-flex justify-content-center align-items-center pt-8">
	        <button type="submit" class="btn btn-sm btn-danger me-3" data-bs-dismiss="modal">Yes, delete!</button>
	        <button type="reset" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No,cancel</button>
	      </div><br><br>
	    </div>
	    <!--end::Modal content-->
	  </div>
	  <!--end::Modal dialog-->
	</div>
	<!--end::Modal - Delete User-->
	

		<?php $this->load->view("common_flashdata.php"); ?>
		<?php $this->load->view("script.php"); ?>
		<!-- Flash Data Script::start -->
		<script>
			<?php if ($this->session->flashdata('g_success') || $this->session->flashdata('g_err')) { ?>
				$(document).ready(function() {
					document.getElementById("pop_up_success").click();

					<?php
					$_SESSION['g_success'] = '';
					$_SESSION['g_err'] = '';
					?>
				});
			<?php } ?>
		</script>
		<script>
			$(document).ready(function() {
				$(".move_to").on("click", function() {
					value = $(this).val();
					// alert(value);
					$('#filter_form').attr('action', "<?php echo base_url(); ?>Subscription_management/?page=" + value);
					$("#filter_form").submit();
					e.preventDefault();
				});
			});
		</script>
		<!-- Flash Data Script::End -->
		<!-- <script>
			function date_filt()
			{
				var dt_fill_loan_list = document.getElementById('dt_fill_loan_list').value;
				var today_dt = document.getElementById('today_dt');
				var week_from_dt = document.getElementById('week_from_dt');
				var week_to_dt = document.getElementById('week_to_dt');
				var monthly_dt = document.getElementById('monthly_dt');
				var from_dt = document.getElementById('from_dt');
				var to_dt = document.getElementById('to_dt');
				var from_date_fillter = document.getElementById('from_date_fillter');
				var to_date_fillter = document.getElementById('to_date_fillter');

				if (dt_fill_loan_list == "today") 
				{
					today_dt.style.display = "block";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
					$("#today_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_loan_list == "week")
				{
					today_dt.style.display = "none";
					week_from_dt.style.display = "block";
					week_to_dt.style.display = "block";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter').val(firstday);
					$('#week_to_date_fillter').val(lastday);
					
				}
				else if (dt_fill_loan_list == "monthly")
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "block";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
					$("#monthly_date_fillter").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_loan_list == "custom_date")
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "none";
					from_dt.style.display = "block";
					to_dt.style.display = "block";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";

					$("#from_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt.style.display = "none";
					monthly_dt.style.display = "none";
					from_dt.style.display = "none";
					to_dt.style.display = "none";
					week_from_dt.style.display = "none";
					week_to_dt.style.display = "none";
				}
			}
		</script> -->

		<!-- <script>
			$(".list_page").DataTable({
				"ordering": false,
				// "aaSorting":[],
				// "pagingType": 'simple_numbers',
				"pagingType": "full_numbers",
				"sorting":false,
				"paging": false,
				// "sorting": false,
				// "buttons": [
				//             'copy', 'csv', 'excel', 'pdf', 'print'
				//         ],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				  // "pageLength": 5,
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start my-3'l>" +
				  "<'col-sm-6 d-flex align-items-center justify-content-end my-3'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script> -->
		
		<script>
			function date_fill_valdiation() {
				var dt_fill_select_value = document.getElementById('dt_fill_select_value').value;
				var today_dt_fillter = document.getElementById('today_dt_fillter');
				var week_from_dt_filter = document.getElementById('week_from_dt_filter');
				var week_to_dt_filter = document.getElementById('week_to_dt_filter');
				var monthly_dt_filter = document.getElementById('monthly_dt_filter');
				var from_dt_filter = document.getElementById('from_dt_filter');
				var to_dt_filter = document.getElementById('to_dt_filter');
				var from_date_fillter_textbox = document.getElementById('from_date_fillter_textbox');
				var to_date_fillter_textbox = document.getElementById('to_date_fillter_textbox');

				if (dt_fill_select_value == "today") {
					today_dt_fillter.style.display = "block";
					monthly_dt_filter.style.display = "none";
					from_dt_filter.style.display = "none";
					to_dt_filter.style.display = "none";
					week_from_dt_filter.style.display = "none";
					week_to_dt_filter.style.display = "none";
					$("#today_date_fillter").flatpickr({
						dateFormat: "d-m-Y",
					});
				} else if (dt_fill_select_value == "week") {
					today_dt_fillter.style.display = "none";
					week_from_dt_filter.style.display = "block";
					week_to_dt_filter.style.display = "block";
					monthly_dt_filter.style.display = "none";
					from_dt_filter.style.display = "none";
					to_dt_filter.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0, 10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0, 10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_textbox').val(firstday);
					$('#week_to_date_fillter_textbox').val(lastday);

				} else if (dt_fill_select_value == "monthly") {
					today_dt_fillter.style.display = "none";
					monthly_dt_filter.style.display = "block";
					from_dt_filter.style.display = "none";
					to_dt_filter.style.display = "none";
					week_from_dt_filter.style.display = "none";
					week_to_dt_filter.style.display = "none";
					$("#monthly_date_fillter_textbox").flatpickr({
						dateFormat: "m-Y",
					});
				} else if (dt_fill_select_value == "Custom date") {
					today_dt_fillter.style.display = "none";
					monthly_dt_filter.style.display = "none";
					from_dt_filter.style.display = "block";
					to_dt_filter.style.display = "block";
					week_from_dt_filter.style.display = "none";
					week_to_dt_filter.style.display = "none";

					$("#from_date_fillter_textbox").flatpickr({
						dateFormat: "d-m-Y",
					});
					$("#to_date_fillter_textbox").flatpickr({
						dateFormat: "d-m-Y",
					});
				} else {
					today_dt_fillter.style.display = "none";
					monthly_dt_filter.style.display = "none";
					from_dt_filter.style.display = "none";
					to_dt_filter.style.display = "none";
					week_from_dt_filter.style.display = "none";
					week_to_dt_filter.style.display = "none";
				}
			}
		</script>
		<!-- sort filter -->
		<script>
			function sort_filter(val){
				if(val!=""){
					$('.sorting_filter_class').val(val);
					$('#fill_form').submit();
				}else{
					$('.sorting_filter_class').val(10);
					$('#fill_form').submit();
				}
			}
		</script>

		<!-- block and unblock script start -->
		 <script>
			function block_func(user_id,name){
				$('#block_id').val(user_id);
				$('#block_name').text(name);
			}
		 </script>
		 <script>
			function unblock_func(user_id,name){
				$('#unblock_id').val(user_id);
				$('#unblock_name').text(name);
			}
		 </script>
		<!-- block script end -->

		<!-- export -->

		<script>
			var DatatablesExtensionButtons = {
			init: function() {
				var t;
				t = $(".list_page").DataTable({
						"sorting": false,
						"ordering": false,
						"paging": false,
						"info": false,
						// aaSorting: [],
						stateSave: true,
				

						buttons: [
						
							{
								extend: 'excelHtml5',
								title: 'Subscriber List',
								exportOptions: {
									columns: [0, 1, 2, 3]
								}
							},
							{
								extend: 'csvHtml5',
								title: 'Subscriber List',
								exportOptions: {
									columns: [0, 1, 2, 3]
								}
							},
							{
								extend: 'pdfHtml5',
								title: 'Subscriber List',
								exportOptions: {
									columns: [0, 1, 2, 3]
								}
							},
						],
						"language": {
							"lengthMenu": "Show _MENU_",
						},
					}),
					console.log(t)

					$("#export_excel").on("click", function(e) {
						e.preventDefault(), t.button(0).trigger()
					}), $("#export_csv").on("click", function(e) {
						e.preventDefault(), t.button(1).trigger()
					}), $("#export_pdf").on("click", function(e) {
						e.preventDefault(), t.button(2).trigger()
					})
			}
		};
		jQuery(document).ready(function() {
			DatatablesExtensionButtons.init()
		});
	</script>
		 
		 <!-- view expired -->
		  <script>
			function view_expired_func(val) {
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>Subscription_management/view_expired',
					data: {
						id: val
					},
					dataType: "html",
					success: function(response) {
						if (response) {
							$('#view_expired_div').empty().append(response);
							$('[data-bs-toggle="tooltip"]').tooltip();
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


	</body>
	<!--end::Body-->
</html>
