
<?php $this->load->view("common.php"); ?>
<?php $common_date= get_general_settings()->date_format ?? 'd-M-Y'; ?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
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
		<script>var defaultThemeMode = "light"; var themeMode; 
		if ( document.documentElement ) { 
			if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } 
				else { 
					if ( localStorage.getItem("data-bs-theme") !== null ) { 
						themeMode = localStorage.getItem("data-bs-theme"); } 
						else { 
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
										<div class="card-header pt-5 align-items-center">
											<h3 class="card-title align-items-start flex-column">
												<div class="text-dark fw-bold mb-2 fs-3">
													<label>Manage Log</label>
													<label class="me-2 ms-2">-</label>
													<label class="badge badge-warning fw-bold fs-3 text-black">Date [<?php echo date('01-M-Y'); ?> to <?php echo date('t-M-Y'); ?>]</label>
												</div>
												<div class="d-flex">
					                <a href="<?php echo base_url(); ?>Dashboard" class="d-flex align-items-center fw-semibold text-gray-500 fs-6 me-2">Home</a>
										    </div>
											</h3>
											<div class="d-flex justify-content-lg-end justify-content-center gap-2">
												<button type="button" class="btn btn-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-static="true"><i class="fa-solid fa-filter fs-7"></i>Filter</button>
												<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
													<div class="px-7 py-5" data-kt-user-table-filter="form">
														<div class="scroll-y mh-325px">
															<div class="mb-2">
																<label class="form-label">Communicator</label>
																<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Communicator Name">
															</div>
															<div class="mb-2">
																<label class="form-label">Caller</label>
																<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Caller Name">
															</div>
															<div class="mb-2">
																<label class="form-label">Mobile No</label>
																<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Mobile No">
															</div>
															<div class="mb-2">
																<label class="form-label">Status</label>
																<select class="form-select form-select-solid" data-control="select2">
																	<option value="all">All</option>
																	<option value="1">Incoming Calls</option>
																	<option value="2">Outgoing Calls</option>
																	<option value="2">Missed Calls</option>
																	<option value="2">Rejected Calls</option>
																</select>
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
												</a>
											</div>
										</div>
										<!--begin::Card body-->
										<div class="card-body">
											<div class="row">
												<div class="col-lg-3 mb-2">
													<div class="d-flex align-items-center justify-content-center fs-2 fw-bold text-center form-label mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Outgoing Call">
														<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
															<svg width="25px" height="23px"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.26" xml:space="preserve">
																<style type="text/css">.row_col_1_fst{fill:#7239EA !important;} .row_1_col_scd{fill:#7239EA !important;}</style>
																<g>
																	<path class="row_col_1_fst fs-5" d="M66.38,47.05c0.16-0.2,0.33-0.39,0.51-0.59L95.96,17.9l-7.46-0.39c-3.19-0.16-5.65-2.88-5.49-6.07 c0.16-3.19,2.88-5.65,6.07-5.49L109.84,7c2.84,0.14,5.11,2.32,5.45,5.05l0,0l2.77,21.94c0.4,3.18-1.83,6.08-5.02,6.49 c-3.18,0.4-6.08-1.83-6.49-5.02l-1.2-9.52l-29.5,30.58L66.38,47.05L66.38,47.05z"/>
																	<path class="row_1_col_scd" d="M33.84,50.26c4.13,7.45,8.89,14.6,15.08,21.12c6.19,6.57,13.9,12.54,23.89,17.62 c0.73,0.37,1.44,0.37,2.06,0.11c0.96-0.37,1.91-1.14,2.88-2.1c0.73-0.73,1.66-1.92,2.62-3.2c3.83-5.05,8.59-11.32,15.3-8.19 c0.15,0.07,0.26,0.15,0.41,0.22l22.36,12.87c0.07,0.04,0.15,0.11,0.22,0.15c2.95,2.02,4.17,5.15,4.21,8.7 c0,3.61-1.33,7.67-3.28,11.1c-2.58,4.53-6.38,7.52-10.76,9.51c-4.17,1.91-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.28-1.7 c-6.57-2.02-13.17-5.39-20.39-9.84l-0.52-0.34c-3.31-2.06-6.9-4.28-10.4-6.9C31.11,93.31,18.03,79.3,9.51,63.89 C2.36,50.94-1.55,36.97,0.58,23.66c1.18-7.3,4.32-13.94,9.77-18.32c4.75-3.83,11.17-5.93,19.47-5.2c0.96,0.07,1.81,0.63,2.25,1.44 l14.35,24.26c2.1,2.73,2.36,5.42,1.22,8.12c-0.96,2.21-2.88,4.24-5.5,6.16c-0.77,0.66-1.7,1.33-2.66,2.02 c-3.2,2.32-6.86,5.01-5.61,8.19L33.84,50.26L33.84,50.26L33.84,50.26z"/>
																</g>
															</svg>
														</a>
														<label>Outgoing Call</label>
													</div>
													<div class="text-center">
														<label class="badge badge-info text-white fs-2 fw-bold"><?php echo sprintf("%02d", $outgoingcall_count); ?></label>
														<label class="text-black fs-2 fw-bold me-1 ms-1">/</label>
														<label class="badge badge-info text-white fs-2 fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Average Outgoing Call Ratio">99%</label>
													</div>
												</div>
												<div class="col-lg-3 mb-2">
													<div class="d-flex align-items-center justify-content-center fs-2 fw-bold text-center form-label mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incoming Call">
														<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
															<svg width="25px" height="23px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.26" xml:space="preserve">
																<style type="text/css">.row_2_fst{fill:#50cd89;} .row_2_scd{fill:#50cd89;}</style>
																<g>
																	<path class="row_2_fst fs-5" d="M118.11,15.41c-0.16,0.2-0.33,0.39-0.51,0.59L88.53,44.56l7.46,0.39c3.19,0.16,5.65,2.88,5.49,6.07 c-0.16,3.19-2.88,5.65-6.07,5.49l-20.76-1.05c-2.84-0.14-5.11-2.32-5.45-5.05l0,0l-2.77-21.94c-0.4-3.18,1.83-6.08,5.02-6.49 c3.18-0.4,6.08,1.83,6.49,5.02l1.2,9.52l29.5-30.58L118.11,15.41L118.11,15.41z"/>
																	<path class="row_2_scd" d="M33.84,50.26c4.13,7.45,8.89,14.6,15.08,21.12c6.19,6.57,13.9,12.54,23.89,17.62 c0.73,0.37,1.44,0.37,2.06,0.11c0.96-0.37,1.91-1.14,2.88-2.1c0.73-0.73,1.66-1.92,2.62-3.2c3.83-5.05,8.59-11.32,15.3-8.19 c0.15,0.07,0.26,0.15,0.41,0.22l22.36,12.87c0.07,0.04,0.15,0.11,0.22,0.15c2.95,2.02,4.17,5.15,4.21,8.7 c0,3.61-1.33,7.67-3.28,11.1c-2.58,4.53-6.38,7.52-10.76,9.51c-4.17,1.91-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.28-1.7 c-6.57-2.02-13.17-5.39-20.39-9.84l-0.52-0.34c-3.31-2.06-6.9-4.28-10.4-6.9C31.11,93.31,18.03,79.3,9.51,63.89 C2.36,50.94-1.55,36.97,0.58,23.66c1.18-7.3,4.32-13.94,9.77-18.32c4.75-3.83,11.17-5.93,19.47-5.2c0.96,0.07,1.81,0.63,2.25,1.44 l14.35,24.26c2.1,2.73,2.36,5.42,1.22,8.12c-0.96,2.21-2.88,4.24-5.5,6.16c-0.77,0.66-1.7,1.33-2.66,2.02 c-3.2,2.32-6.86,5.01-5.61,8.19L33.84,50.26L33.84,50.26L33.84,50.26z"/>
																</g>
															</svg>
														</a>
														<label>Incoming Call</label>
													</div>
													<div class="text-center">
														<label class="badge badge-success text-white fs-2 fw-bold"><?php echo sprintf("%02d", $incoming_call_count); ?></label>
													</div>
												</div>
												<div class="col-lg-3 mb-2">
													<div class="d-flex align-items-center justify-content-center fs-2 fw-bold text-center form-label mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Missed Call">
														<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
															<svg fill="#FF7F00" width="25px" height="23px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
																<g id="SVGRepo_bgCarrier" stroke-width="0"/>
																<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
																<g id="SVGRepo_iconCarrier">
																<path d="M6,7.49a1,1,0,0,0,1-1V5.9L9.88,8.78a3,3,0,0,0,4.24,0l4.59-4.59a1,1,0,0,0,0-1.41,1,1,0,0,0-1.42,0L12.71,7.36a1,1,0,0,1-1.42,0L8.41,4.49H9a1,1,0,0,0,0-2H6a1,1,0,0,0-.92.61A1.09,1.09,0,0,0,5,3.49v3A1,1,0,0,0,6,7.49Zm15.94,7.36a16.27,16.27,0,0,0-19.88,0,2.69,2.69,0,0,0-1,2,2.66,2.66,0,0,0,.78,2.07L3.6,20.72A2.68,2.68,0,0,0,7.06,21l.47-.32a8.13,8.13,0,0,1,1-.55,1.85,1.85,0,0,0,1-2.3l-.09-.24a10.49,10.49,0,0,1,5.22,0l-.09.24a1.85,1.85,0,0,0,1,2.3,8.13,8.13,0,0,1,1,.55l.47.32a2.58,2.58,0,0,0,1.54.5,2.72,2.72,0,0,0,1.92-.79l1.81-1.82A2.66,2.66,0,0,0,23,16.83,2.69,2.69,0,0,0,21.94,14.85ZM20.8,17.49,19,19.3a.68.68,0,0,1-.86.1c-.19-.14-.38-.27-.59-.4a11.65,11.65,0,0,0-1.09-.61l.4-1.09a1,1,0,0,0-.6-1.28,12.42,12.42,0,0,0-8.5,0,1,1,0,0,0-.6,1.28l.4,1.1a9.8,9.8,0,0,0-1.1.6l-.58.4A.66.66,0,0,1,5,19.3L3.2,17.49A.67.67,0,0,1,3,17a.76.76,0,0,1,.28-.53,14.29,14.29,0,0,1,17.44,0A.76.76,0,0,1,21,17,.67.67,0,0,1,20.8,17.49Z"/>
																</g>
															</svg>
														</a>
														<label>Missed Call</label>
													</div>
													<div class="text-center">
														<label class="badge badge-info text-black fs-2 fw-bold" style="background-color:#FF7F00 !important;"><?php echo sprintf("%02d", $missedcall_count); ?></label>
														<label class="text-black fs-2 fw-bold me-1 ms-1">/</label>
														<label class="badge badge-info text-black fs-2 fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Average Missed Call Ratio" style="background-color:#FF7F00 !important;"><?php echo number_format($missed_call_ratio); ?>%</label>
													</div>
												</div>
												<div class="col-lg-3 mb-2">
													<div class="d-flex align-items-center justify-content-center fs-2 fw-bold text-center form-label mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Rejected Call">
														<a href="javascript:;" class="bg-gray-200 align-items-center badge badge-light me-2">
															<svg fill="#ff0000" width="25px" height="23px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
																<g id="SVGRepo_bgCarrier" stroke-width="0"/>
																<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
																<g id="SVGRepo_iconCarrier"> <g data-name="Layer 2"> <g data-name="phone-missed"> <rect width="24" height="24" opacity="0"/> <path d="M21.94 16.64a4.34 4.34 0 0 0-.19-.73 1 1 0 0 0-.72-.65l-6-1.37a1 1 0 0 0-.92.26c-.14.13-.15.14-.8 1.38a10 10 0 0 1-4.88-4.89C9.71 10 9.72 10 9.85 9.85a1 1 0 0 0 .26-.92L8.74 3a1 1 0 0 0-.65-.72 3.79 3.79 0 0 0-.72-.18A3.94 3.94 0 0 0 6.6 2 4.6 4.6 0 0 0 2 6.6 15.42 15.42 0 0 0 17.4 22a4.6 4.6 0 0 0 4.6-4.6 4.77 4.77 0 0 0-.06-.76zM17.4 20A13.41 13.41 0 0 1 4 6.6 2.61 2.61 0 0 1 6.6 4h.33L8 8.64l-.55.29c-.87.45-1.5.78-1.17 1.58a11.85 11.85 0 0 0 7.18 7.21c.84.34 1.17-.29 1.62-1.16l.29-.55L20 17.07v.33a2.61 2.61 0 0 1-2.6 2.6z"/> <path d="M15.8 8.7a1.05 1.05 0 0 0 1.47 0L18 8l.73.73a1 1 0 0 0 1.47-1.5l-.73-.73.73-.73a1 1 0 0 0-1.47-1.47L18 5l-.73-.73a1 1 0 0 0-1.47 1.5l.73.73-.73.73a1.05 1.05 0 0 0 0 1.47z"/> </g> </g> </g>
															</svg>
														</a>
														<label>Rejected Call</label>
													</div>
													<div class="text-center">
														<label class="badge badge-danger text-white fs-2 fw-bold"><?php echo sprintf("%02d", $rejected_call_count); ?></label>
													</div>
												</div>
												<div class="col-lg-12">
													<table class="table align-middle table-hover fs-7 gy-3 gs-2 list_page">
														<thead>
															<tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
																<th class="min-w-50px">Caller</th>
																<th class="min-w-50px">Communicator</th>
																<th class="min-w-50px">Call Date</th>
																<th class="min-w-50px text-start">Start Time</th>
																<th class="min-w-50px text-start">End Time</th>
																<th class="min-w-50px text-start">Duration</th>
																<th class="min-w-80px">Status</th>
															</tr>
														</thead>
														<tbody class="text-gray-800 fw-bold fs-7">
															<?php if(isset($caller_log)){ ?>
															<?php foreach ($caller_log as $i=> $c_list){ ?>
																<?php 
																	if ($c_list->status == 0) {
																		$sts = 'Outgoing Call';
																		$sts_bgcolor='';
																	} elseif ($c_list->status == 1) {
																		$sts = 'Incoming Call';
																		$sts_bgcolor='';
																	} elseif ($c_list->status == 2) {
																		$sts = 'Missed Call';
																		$sts_bgcolor='#ffc184 !important';
																	} else {
																		$sts = 'Rejected Call';
																		$sts_bgcolor='#ff7979 !important';
																	}
																	?>
																	<?php
																		$first_character = isset($c_list->name) && $c_list->name ? $c_list->name[0] : 'A';
																		$str = strtoupper($first_character);

																		$photo_url = base_url() . 'assets/Images/user/' . $c_list->image;
																		$letter_url = base_url() . 'assets/Images/Letters/' . $str . '.png';
																		$photo_path = FCPATH . 'assets/Images/user/' . $c_list->image;
																		$letter_path = FCPATH . 'assets/Images/Letters/' . $str . '.png';
																		?>
															<tr style="background-color: <?php echo $sts_bgcolor; ?>">
																<td class="text-start">
																	<div class="d-flex align-items-center">
																		<?php if (!empty($c_list->image) && file_exists($photo_path) ) { ?>
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
																		<?php }?>
																	 	<div class="mb-0 me-2">
																			<label class="fs-7 fw-semibold text-black"><?php echo $c_list->name;?></label>
																			<?php if ($c_list->is_manager==1 ) { ?>
																			<label class="cursor-pointer fs-7 fw-semibold text-black ms-1"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Manager">
																		    	<i class="fa-solid fa-user-tie fs-3 text-black"></i>
																			</label>
																			<?php }?>
																			<div class="d-block">
																				<label class="fs-8 text-black fw-bold">+91 <?php echo $c_list->caller_no;?></label>
																			</div>
																		</div>
																 	</div>
																</td>
																<td class="text-start">
																	<div class="d-flex align-items-center">
																		<a class="d-block overlay text-center me-3" href="javascript:;">
																		    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded">
																			<?php if ($c_list->status == 0) {?>
																					<a href="javascript:;" class="align-items-center badge badge-light me-2">
																						<svg class="h-20px w-23px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.26" xml:space="preserve">
																							<style type="text/css">.row_col_1_fst{fill:#7239EA !important;} .row_1_col_scd{fill:#7239EA !important;}</style>
																							<g>
																								<path class="row_col_1_fst fs-5" d="M66.38,47.05c0.16-0.2,0.33-0.39,0.51-0.59L95.96,17.9l-7.46-0.39c-3.19-0.16-5.65-2.88-5.49-6.07 c0.16-3.19,2.88-5.65,6.07-5.49L109.84,7c2.84,0.14,5.11,2.32,5.45,5.05l0,0l2.77,21.94c0.4,3.18-1.83,6.08-5.02,6.49 c-3.18,0.4-6.08-1.83-6.49-5.02l-1.2-9.52l-29.5,30.58L66.38,47.05L66.38,47.05z"/>
																								<path class="row_1_col_scd" d="M33.84,50.26c4.13,7.45,8.89,14.6,15.08,21.12c6.19,6.57,13.9,12.54,23.89,17.62 c0.73,0.37,1.44,0.37,2.06,0.11c0.96-0.37,1.91-1.14,2.88-2.1c0.73-0.73,1.66-1.92,2.62-3.2c3.83-5.05,8.59-11.32,15.3-8.19 c0.15,0.07,0.26,0.15,0.41,0.22l22.36,12.87c0.07,0.04,0.15,0.11,0.22,0.15c2.95,2.02,4.17,5.15,4.21,8.7 c0,3.61-1.33,7.67-3.28,11.1c-2.58,4.53-6.38,7.52-10.76,9.51c-4.17,1.91-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.28-1.7 c-6.57-2.02-13.17-5.39-20.39-9.84l-0.52-0.34c-3.31-2.06-6.9-4.28-10.4-6.9C31.11,93.31,18.03,79.3,9.51,63.89 C2.36,50.94-1.55,36.97,0.58,23.66c1.18-7.3,4.32-13.94,9.77-18.32c4.75-3.83,11.17-5.93,19.47-5.2c0.96,0.07,1.81,0.63,2.25,1.44 l14.35,24.26c2.1,2.73,2.36,5.42,1.22,8.12c-0.96,2.21-2.88,4.24-5.5,6.16c-0.77,0.66-1.7,1.33-2.66,2.02 c-3.2,2.32-6.86,5.01-5.61,8.19L33.84,50.26L33.84,50.26L33.84,50.26z"/>
																							</g>
																						</svg>
																					</a>
																				<?php } elseif ($c_list->status == 1) {?>
																					<a href="javascript:;" class="align-items-center badge badge-light me-2">
																						<svg class="h-20px w-23px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.26" xml:space="preserve">
																							<style type="text/css">.row_2_fst{fill:#50cd89;} .row_2_scd{fill:#50cd89;}</style>
																							<g>
																								<path class="row_2_fst fs-5" d="M118.11,15.41c-0.16,0.2-0.33,0.39-0.51,0.59L88.53,44.56l7.46,0.39c3.19,0.16,5.65,2.88,5.49,6.07 c-0.16,3.19-2.88,5.65-6.07,5.49l-20.76-1.05c-2.84-0.14-5.11-2.32-5.45-5.05l0,0l-2.77-21.94c-0.4-3.18,1.83-6.08,5.02-6.49 c3.18-0.4,6.08,1.83,6.49,5.02l1.2,9.52l29.5-30.58L118.11,15.41L118.11,15.41z"/>
																								<path class="row_2_scd" d="M33.84,50.26c4.13,7.45,8.89,14.6,15.08,21.12c6.19,6.57,13.9,12.54,23.89,17.62 c0.73,0.37,1.44,0.37,2.06,0.11c0.96-0.37,1.91-1.14,2.88-2.1c0.73-0.73,1.66-1.92,2.62-3.2c3.83-5.05,8.59-11.32,15.3-8.19 c0.15,0.07,0.26,0.15,0.41,0.22l22.36,12.87c0.07,0.04,0.15,0.11,0.22,0.15c2.95,2.02,4.17,5.15,4.21,8.7 c0,3.61-1.33,7.67-3.28,11.1c-2.58,4.53-6.38,7.52-10.76,9.51c-4.17,1.91-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.28-1.7 c-6.57-2.02-13.17-5.39-20.39-9.84l-0.52-0.34c-3.31-2.06-6.9-4.28-10.4-6.9C31.11,93.31,18.03,79.3,9.51,63.89 C2.36,50.94-1.55,36.97,0.58,23.66c1.18-7.3,4.32-13.94,9.77-18.32c4.75-3.83,11.17-5.93,19.47-5.2c0.96,0.07,1.81,0.63,2.25,1.44 l14.35,24.26c2.1,2.73,2.36,5.42,1.22,8.12c-0.96,2.21-2.88,4.24-5.5,6.16c-0.77,0.66-1.7,1.33-2.66,2.02 c-3.2,2.32-6.86,5.01-5.61,8.19L33.84,50.26L33.84,50.26L33.84,50.26z"/>
																							</g>
																						</svg>
																					</a>
																				<?php } elseif ($c_list->status == 2)  {?>
																					<a href="javascript:;" class="align-items-center badge badge-light me-1">
																						<svg fill="#FF7F00" width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
																							<g id="SVGRepo_bgCarrier" stroke-width="0"/>
																							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
																							<g id="SVGRepo_iconCarrier">
																							<path d="M6,7.49a1,1,0,0,0,1-1V5.9L9.88,8.78a3,3,0,0,0,4.24,0l4.59-4.59a1,1,0,0,0,0-1.41,1,1,0,0,0-1.42,0L12.71,7.36a1,1,0,0,1-1.42,0L8.41,4.49H9a1,1,0,0,0,0-2H6a1,1,0,0,0-.92.61A1.09,1.09,0,0,0,5,3.49v3A1,1,0,0,0,6,7.49Zm15.94,7.36a16.27,16.27,0,0,0-19.88,0,2.69,2.69,0,0,0-1,2,2.66,2.66,0,0,0,.78,2.07L3.6,20.72A2.68,2.68,0,0,0,7.06,21l.47-.32a8.13,8.13,0,0,1,1-.55,1.85,1.85,0,0,0,1-2.3l-.09-.24a10.49,10.49,0,0,1,5.22,0l-.09.24a1.85,1.85,0,0,0,1,2.3,8.13,8.13,0,0,1,1,.55l.47.32a2.58,2.58,0,0,0,1.54.5,2.72,2.72,0,0,0,1.92-.79l1.81-1.82A2.66,2.66,0,0,0,23,16.83,2.69,2.69,0,0,0,21.94,14.85ZM20.8,17.49,19,19.3a.68.68,0,0,1-.86.1c-.19-.14-.38-.27-.59-.4a11.65,11.65,0,0,0-1.09-.61l.4-1.09a1,1,0,0,0-.6-1.28,12.42,12.42,0,0,0-8.5,0,1,1,0,0,0-.6,1.28l.4,1.1a9.8,9.8,0,0,0-1.1.6l-.58.4A.66.66,0,0,1,5,19.3L3.2,17.49A.67.67,0,0,1,3,17a.76.76,0,0,1,.28-.53,14.29,14.29,0,0,1,17.44,0A.76.76,0,0,1,21,17,.67.67,0,0,1,20.8,17.49Z"/>
																							</g>
																						</svg>
																					</a>
																				<?php } else  {?>
																					<a href="javascript:;" class="align-items-center badge badge-light me-2">
																						<svg fill="#ff0000" width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
																							<g id="SVGRepo_bgCarrier" stroke-width="0"/>
																							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
																							<g id="SVGRepo_iconCarrier"> <g data-name="Layer 2"> <g data-name="phone-missed"> <rect width="24" height="24" opacity="0"/> <path d="M21.94 16.64a4.34 4.34 0 0 0-.19-.73 1 1 0 0 0-.72-.65l-6-1.37a1 1 0 0 0-.92.26c-.14.13-.15.14-.8 1.38a10 10 0 0 1-4.88-4.89C9.71 10 9.72 10 9.85 9.85a1 1 0 0 0 .26-.92L8.74 3a1 1 0 0 0-.65-.72 3.79 3.79 0 0 0-.72-.18A3.94 3.94 0 0 0 6.6 2 4.6 4.6 0 0 0 2 6.6 15.42 15.42 0 0 0 17.4 22a4.6 4.6 0 0 0 4.6-4.6 4.77 4.77 0 0 0-.06-.76zM17.4 20A13.41 13.41 0 0 1 4 6.6 2.61 2.61 0 0 1 6.6 4h.33L8 8.64l-.55.29c-.87.45-1.5.78-1.17 1.58a11.85 11.85 0 0 0 7.18 7.21c.84.34 1.17-.29 1.62-1.16l.29-.55L20 17.07v.33a2.61 2.61 0 0 1-2.6 2.6z"/> <path d="M15.8 8.7a1.05 1.05 0 0 0 1.47 0L18 8l.73.73a1 1 0 0 0 1.47-1.5l-.73-.73.73-.73a1 1 0 0 0-1.47-1.47L18 5l-.73-.73a1 1 0 0 0-1.47 1.5l.73.73-.73.73a1.05 1.05 0 0 0 0 1.47z"/> </g> </g> </g>
																						</svg>
																					</a>
																				<?php }?>
																		    </div>
																	 	</a>
																	 	<div class="mb-0 me-2">
																		 	<label class="fs-7 fw-semibold text-black"><?php echo $c_list->contact_name ? :"Unknown" ;?></label>
																			<?php if(!$c_list->contact_name){?>
																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm fs-7 text-black fw-bold border h-25px w-25px" data-bs-toggle="modal" data-bs-target="#kt_modal_add_address_book" onclick="save_unknown_func('<?php echo $c_list->contact_book_id;?>')">
																				<i class="fa-solid fa-plus fs-7 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Address Book"></i>
																			</a>
																			<?php }?>
																			<div class="d-block">
																				<label class="fs-8 text-black fw-bold"><?php echo $c_list->phone_no?></label>
																			</div>
																		</div>
																 	</div>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold"><?php echo date($common_date,strtotime($c_list->call_date)) ?></label>
																</td>
																<td class="text-start">
																	<label class="badge badge-light-info fs-7 fw-bold"><?php echo date('h:i:s A', strtotime($c_list->call_time)); ?></label>
																</td>
																<td class="text-start">
																	<label class="badge badge-light-primary fs-7 fw-bold"><?php echo date('h:i:s A', strtotime($c_list->call_end_time)); ?></label>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold"><?php echo $c_list->duration?></label>
																</td>
																<td>
																	<?php if ($c_list->status == 0) {?> 
																	<label class="badge badge-info fs-7 text-white fw-bold"><?php echo $sts ?></label>
																	<?php } elseif ($c_list->status == 1){?> 
																	<label class="badge badge-success fs-7 text-white fw-bold"><?php echo $sts ?></label>
																	<?php } elseif ($c_list->status == 2) {?> 
																	<label class="badge badge-success fs-7 text-black fw-bold" style="background-color:#FF7F00 !important;"><?php echo $sts ?></label>
																	<?php } else{?> 
																	<label class="badge badge-danger fs-7 text-white fw-bold"><?php echo $sts ?></label>
																	<?php }?> 
																</td>
															</tr>
															<?php }?>
															<?php }?>
															<!-- <tr>
																<td class="text-start">
																	<div class="d-flex align-items-center">
																		<a class="d-block overlay text-center me-3" href="<?php echo base_url(); ?>assets/Images/member_1.png" data-fslightbox="lightbox-basic_list">
																		    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px" style="background-image:url('<?php echo base_url(); ?>assets/Images/member_1.png')">
																		    </div>
																		    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
																		        <i class="bi bi-eye-fill text-white fs-2"></i>
																		    </div>
																	 	</a>
																	 	<div class="mb-0 me-2">
																			<label class="fs-7 fw-semibold text-black">Selva Kumar D</label>
																			<label class="cursor-pointer fs-7 fw-semibold text-black ms-1"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Manager">
																		    	<i class="fa-solid fa-user-tie fs-3 text-black"></i>
																			</label>
																			<div class="d-block">
																				<label class="fs-8 text-black fw-bold">+91 9790464324</label>
																			</div>
																		</div>
																 	</div>
																</td>
																<td class="text-start">
																	<div class="d-flex align-items-center">
																		<a class="d-block overlay text-center me-3" href="javascript:;">
																		    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded">
																					<a href="javascript:;" class="align-items-center badge badge-light me-2">
																						<svg class="h-20px w-23px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.26" xml:space="preserve">
																							<style type="text/css">.row_2_fst{fill:#50cd89;} .row_2_scd{fill:#50cd89;}</style>
																							<g>
																								<path class="row_2_fst fs-5" d="M118.11,15.41c-0.16,0.2-0.33,0.39-0.51,0.59L88.53,44.56l7.46,0.39c3.19,0.16,5.65,2.88,5.49,6.07 c-0.16,3.19-2.88,5.65-6.07,5.49l-20.76-1.05c-2.84-0.14-5.11-2.32-5.45-5.05l0,0l-2.77-21.94c-0.4-3.18,1.83-6.08,5.02-6.49 c3.18-0.4,6.08,1.83,6.49,5.02l1.2,9.52l29.5-30.58L118.11,15.41L118.11,15.41z"/>
																								<path class="row_2_scd" d="M33.84,50.26c4.13,7.45,8.89,14.6,15.08,21.12c6.19,6.57,13.9,12.54,23.89,17.62 c0.73,0.37,1.44,0.37,2.06,0.11c0.96-0.37,1.91-1.14,2.88-2.1c0.73-0.73,1.66-1.92,2.62-3.2c3.83-5.05,8.59-11.32,15.3-8.19 c0.15,0.07,0.26,0.15,0.41,0.22l22.36,12.87c0.07,0.04,0.15,0.11,0.22,0.15c2.95,2.02,4.17,5.15,4.21,8.7 c0,3.61-1.33,7.67-3.28,11.1c-2.58,4.53-6.38,7.52-10.76,9.51c-4.17,1.91-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.28-1.7 c-6.57-2.02-13.17-5.39-20.39-9.84l-0.52-0.34c-3.31-2.06-6.9-4.28-10.4-6.9C31.11,93.31,18.03,79.3,9.51,63.89 C2.36,50.94-1.55,36.97,0.58,23.66c1.18-7.3,4.32-13.94,9.77-18.32c4.75-3.83,11.17-5.93,19.47-5.2c0.96,0.07,1.81,0.63,2.25,1.44 l14.35,24.26c2.1,2.73,2.36,5.42,1.22,8.12c-0.96,2.21-2.88,4.24-5.5,6.16c-0.77,0.66-1.7,1.33-2.66,2.02 c-3.2,2.32-6.86,5.01-5.61,8.19L33.84,50.26L33.84,50.26L33.84,50.26z"/>
																							</g>
																						</svg>
																					</a>
																		    </div>
																	 	</a>
																	 	<div class="mb-0 me-2">
																			<label class="fs-7 fw-semibold text-black">Unknown</label>
																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm fs-7 text-black fw-bold border h-25px w-25px" data-bs-toggle="modal" data-bs-target="#kt_modal_add_address_book">
																				<i class="fa-solid fa-plus fs-7 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Address Book"></i>
																			</a>
																			<div class="d-block">
																				<label class="fs-8 text-black fw-bold">+91 8956457841</label>
																			</div>
																		</div>
																 	</div>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold">30-Sep-2024</label>
																</td>
																<td class="text-start">
																	<label class="badge badge-light-info fs-7 fw-bold">01:10:10 PM</label>
																</td>
																<td class="text-start">
																	<label class="badge badge-light-primary fs-7 fw-bold">01:10:30 PM</label>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold">00:00:20</label>
																</td>
																<td>
																	<label class="badge badge-success fs-7 text-white fw-bold">Incoming Call</label>
																</td>
															</tr>
															<tr style="background-color:#ffc184 !important;">
																<td class="text-start">
																	<div class="d-flex align-items-center">
																		<a class="d-block overlay text-center me-3" href="<?php echo base_url(); ?>assets/Images/member_2.png" data-fslightbox="lightbox-basic_list">
																		    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px" style="background-image:url('<?php echo base_url(); ?>assets/Images/member_2.png')">
																		    </div>
																		    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
																		        <i class="bi bi-eye-fill text-white fs-2"></i>
																		    </div>
																	 	</a>
																	 	<div class="mb-0 me-2">
																			<label class="fs-7 fw-semibold text-black">Thensidhaa M</label>
																			<div class="d-block">
																				<label class="fs-8 text-black fw-bold">+91 9894444710</label>
																			</div>
																		</div>
																 	</div>
																</td>
																<td class="text-start">
																	<div class="d-flex align-items-center">
																		<a class="d-block overlay text-center me-3" href="javascript:;">
																		    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded">
																					<a href="javascript:;" class="align-items-center badge badge-light me-1">
																						<svg fill="#FF7F00" width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
																							<g id="SVGRepo_bgCarrier" stroke-width="0"/>
																							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
																							<g id="SVGRepo_iconCarrier">
																							<path d="M6,7.49a1,1,0,0,0,1-1V5.9L9.88,8.78a3,3,0,0,0,4.24,0l4.59-4.59a1,1,0,0,0,0-1.41,1,1,0,0,0-1.42,0L12.71,7.36a1,1,0,0,1-1.42,0L8.41,4.49H9a1,1,0,0,0,0-2H6a1,1,0,0,0-.92.61A1.09,1.09,0,0,0,5,3.49v3A1,1,0,0,0,6,7.49Zm15.94,7.36a16.27,16.27,0,0,0-19.88,0,2.69,2.69,0,0,0-1,2,2.66,2.66,0,0,0,.78,2.07L3.6,20.72A2.68,2.68,0,0,0,7.06,21l.47-.32a8.13,8.13,0,0,1,1-.55,1.85,1.85,0,0,0,1-2.3l-.09-.24a10.49,10.49,0,0,1,5.22,0l-.09.24a1.85,1.85,0,0,0,1,2.3,8.13,8.13,0,0,1,1,.55l.47.32a2.58,2.58,0,0,0,1.54.5,2.72,2.72,0,0,0,1.92-.79l1.81-1.82A2.66,2.66,0,0,0,23,16.83,2.69,2.69,0,0,0,21.94,14.85ZM20.8,17.49,19,19.3a.68.68,0,0,1-.86.1c-.19-.14-.38-.27-.59-.4a11.65,11.65,0,0,0-1.09-.61l.4-1.09a1,1,0,0,0-.6-1.28,12.42,12.42,0,0,0-8.5,0,1,1,0,0,0-.6,1.28l.4,1.1a9.8,9.8,0,0,0-1.1.6l-.58.4A.66.66,0,0,1,5,19.3L3.2,17.49A.67.67,0,0,1,3,17a.76.76,0,0,1,.28-.53,14.29,14.29,0,0,1,17.44,0A.76.76,0,0,1,21,17,.67.67,0,0,1,20.8,17.49Z"/>
																							</g>
																						</svg>
																					</a>
																		    </div>
																	 	</a>
																	 	<div class="mb-0 me-2">
																			<label class="fs-7 fw-semibold text-black">Unknown</label>
																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm fs-7 text-black fw-bold border h-25px w-25px" data-bs-toggle="modal" data-bs-target="#kt_modal_add_address_book">
																				<i class="fa-solid fa-plus fs-7 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Address Book"></i>
																			</a>
																			<div class="d-block">
																				<label class="fs-8 text-black fw-bold">+91 9090969656</label>
																			</div>
																		</div>
																 	</div>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold">30-Sep-2024</label>
																</td>
																<td class="text-start">
																	<label class="badge badge-light-info fs-7 fw-bold">12:50:15 PM</label>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold">-</label>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold">-</label>
																</td>
																<td>
																	<label class="badge badge-success fs-7 text-black fw-bold" style="background-color:#FF7F00 !important;">Missed Call</label>
																</td>
															</tr>
															<tr style="background-color:#ff7979 !important;">
																<td class="text-start">
																	<div class="d-flex align-items-center">
																		<a class="d-block overlay text-center me-3" href="<?php echo base_url(); ?>assets/Images/member_1.png" data-fslightbox="lightbox-basic_list">
																		    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px" style="background-image:url('<?php echo base_url(); ?>assets/Images/member_1.png')">
																		    </div>
																		    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
																		        <i class="bi bi-eye-fill text-white fs-2"></i>
																		    </div>
																	 	</a>
																	 	<div class="mb-0 me-2">
																			<label class="fs-7 fw-semibold text-black">Selva Kumar D</label>
																			<label class="cursor-pointer fs-7 fw-semibold text-black ms-1"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Manager">
																		    	<i class="fa-solid fa-user-tie fs-3 text-black"></i>
																			</label>
																			<div class="d-block">
																				<label class="fs-8 text-black fw-bold">+91 9790464324</label>
																			</div>
																		</div>
																 	</div>
																</td>
																<td class="text-start">
																	<div class="d-flex align-items-center">
																		<a class="d-block overlay text-center me-3" href="javascript:;">
																		    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded">
																					<a href="javascript:;" class="align-items-center badge badge-light me-2">
																						<svg fill="#ff0000" width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
																							<g id="SVGRepo_bgCarrier" stroke-width="0"/>
																							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
																							<g id="SVGRepo_iconCarrier"> <g data-name="Layer 2"> <g data-name="phone-missed"> <rect width="24" height="24" opacity="0"/> <path d="M21.94 16.64a4.34 4.34 0 0 0-.19-.73 1 1 0 0 0-.72-.65l-6-1.37a1 1 0 0 0-.92.26c-.14.13-.15.14-.8 1.38a10 10 0 0 1-4.88-4.89C9.71 10 9.72 10 9.85 9.85a1 1 0 0 0 .26-.92L8.74 3a1 1 0 0 0-.65-.72 3.79 3.79 0 0 0-.72-.18A3.94 3.94 0 0 0 6.6 2 4.6 4.6 0 0 0 2 6.6 15.42 15.42 0 0 0 17.4 22a4.6 4.6 0 0 0 4.6-4.6 4.77 4.77 0 0 0-.06-.76zM17.4 20A13.41 13.41 0 0 1 4 6.6 2.61 2.61 0 0 1 6.6 4h.33L8 8.64l-.55.29c-.87.45-1.5.78-1.17 1.58a11.85 11.85 0 0 0 7.18 7.21c.84.34 1.17-.29 1.62-1.16l.29-.55L20 17.07v.33a2.61 2.61 0 0 1-2.6 2.6z"/> <path d="M15.8 8.7a1.05 1.05 0 0 0 1.47 0L18 8l.73.73a1 1 0 0 0 1.47-1.5l-.73-.73.73-.73a1 1 0 0 0-1.47-1.47L18 5l-.73-.73a1 1 0 0 0-1.47 1.5l.73.73-.73.73a1.05 1.05 0 0 0 0 1.47z"/> </g> </g> </g>
																						</svg>
																					</a>
																		    </div>
																	 	</a>
																	 	<div class="mb-0 me-2">
																			<label class="fs-7 fw-semibold text-black">Nagarajan</label>
																			<div class="d-block">
																				<label class="fs-8 text-black fw-bold">+91 9505500547</label>
																			</div>
																		</div>
																 	</div>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold">30-Sep-2024</label>
																</td>
																<td class="text-start">
																	<label class="badge badge-light-info fs-7 fw-bold">11:50:15 AM</label>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold">-</label>
																</td>
																<td class="text-start">
																	<label class="fs-7 text-black fw-bold">-</label>
																</td>
																<td>
																	<label class="badge badge-danger fs-7 text-white fw-bold">Rejected Call</label>
																</td>
															</tr> -->
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<!--end::Card body-->
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

		<!--begin::Modal - Create Address Book-->
		<div class="modal fade" id="kt_modal_add_address_book" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
		    <div class="modal-dialog modal-md">
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
						<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Manage_log/add_unknown_caller" id="add_caller_form">
		                <div class="text-center">
		                    <h1 class="mb-6">Add Address Book</h1>
		                </div>
		                <div class="row">
		                	<div class="col-lg-12">
								<input type="hidden" id="cb_caller_id" name="cb_caller_id">
		                		<label class="col-form-label required fw-semibold fs-6">Caller Name</label>
		                		<div class="fv-row">
		                			<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Caller Name" id="caller_name" name="caller_name" value="">
		                			<div class="fv-plugins-message-container invalid-feedback"></div>
		                		</div>
		                	</div>
		                </div>
		                <div class="d-flex align-items-center justify-content-center mt-4">
							<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
							<button id="callerAddBtn" type="button" class="btn btn-sm btn-primary" onclick="caller_validation()">Add Address Book</button>
						</div>
						</form>
		            </div>
		        </div>
		        <!--end::Modal dialog-->
		    </div>
		</div>
		<!--end::Modal - Create Address Book-->

		<?php $this->load->view("script.php"); ?>
		<?php $this->load->view("common_flashdata.php"); ?>
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
			function save_unknown_func(id){
				$('#cb_caller_id').val(id)
				console.log(id)
			}
		</script>

		<script>
			var baseurl = '<?php echo base_url(); ?>';
			function caller_validation() {
				$("#callerAddBtn").prop('disabled', true);
				let err = 0;
				var caller_name = $('#caller_name').val();
				
				$('#caller_name').siblings('.invalid-feedback').text('').show();

				// Initialize error flag
				let hasError = false;
				if (caller_name === '') {
					$('#caller_name').siblings('.invalid-feedback').text('Caller Name is Required.').show();
					hasError = true;
				}
				// If there are errors, return false immediately
				if (hasError) {
					$("#callerAddBtn").prop('disabled', false);
					return false;
				}
				else{
					$("#callerAddBtn").prop('disabled', true);
					$('#add_caller_form').submit();
				}
			}
		</script>
		<script>
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
		</script>
		<script>
			$(".list_page").DataTable({
				"ordering": false,
				"aaSorting":[],
				// "pagingType": 'simple_numbers',
				"pagingType": "full_numbers",
				"sorting":false,
				// "paging": false,
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
			// $('.list_page').wrap('<div class="dataTables_scroll" />');
		</script>
	</body>
	<!--end::Body-->
</html>