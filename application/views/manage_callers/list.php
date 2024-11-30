<?php $this->load->view("common.php");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        min-height: 300px;
        max-height: 300px;/*the maximum height you want to achieve*/
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
		<script>
			var defaultThemeMode = "light"; var themeMode; 
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
				} document.documentElement.setAttribute("data-bs-theme", themeMode); 
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
					<?php $this->load->view("header.php");?>
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
								<!--begin::Col-->
								<div class="col-xxl-12">
									<div class="card">
										<ul class="nav nav-tabs nav-line-tabs fs-4 px-10 pt-5">
									    <li class="nav-item">
									        <a class="nav-link active text-black fw-bold" data-bs-toggle="tab" href="#kt_tab_users">Manage Callers</a>
									    </li>
									    <li class="nav-item">
									        <a class="nav-link text-black fw-bold"  href="<?php echo base_url(); ?>Manage_callers/subscription_list">Manage Subscription</a>
									    </li>
										</ul>
										<div class="card-body pt-2">
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_tab_users" role="tabpanel">
													<div class="row mt-4">
														<div class="col-lg-2 mb-2">
															<div class="text-center">
																<label class="form-label fs-2 fw-bold">Callers</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold"><?php echo sprintf("%02d", $user_data->available_callers);?></label>
															</div>
														</div>
														<div class="col-lg-2 mb-2">
															<!-- <div class="text-center">
																<label class="form-label fs-2 fw-bold">Package</label>
															</div>
															<div class="text-center">
																<label class="text-success fs-2 fw-bold">02</label>
															</div> -->
														</div>
														<div class="col-lg-8 mb-2">
															<div class="d-flex justify-content-end gap-2 mb-2 mt-2">
																<button type="button" class="btn btn-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-static="true"><i class="fa-solid fa-filter fs-7"></i>Filter</button>
																<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
																	<div class="px-7 py-5" data-kt-user-table-filter="form">
																		<div class="scroll-y mh-325px">
																			<div class="mb-2">
																				<label class="form-label">Caller</label>
																				<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Caller Name">
																			</div>
																			<div class="mb-2">
																				<label class="form-label">Department</label>
																				<select class="form-select form-select-solid" data-control="select2">
																					<option value="all">All</option>
																					<option value="1">Sales</option>
																					<option value="2">Production</option>
																					<option value="3">Accounts</option>
																					<option value="4">Finance</option>
																					<option value="5">Human Resources</option>
																					<option value="6">Internal Support</option>
																					<option value="7">Others</option>
																				</select>
																			</div>
																			<div class="mb-2">
																				<label class="form-label">Mobile No</label>
																				<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Mobile No">
																			</div>
																			<div class="mb-2">
																				<label class="form-label">Package</label>
																				<select class="form-select form-select-solid" data-control="select2">
																					<option value="all">All</option>
																					<option value="1">Silver Package</option>
																					<option value="2">Gold Package</option>
																				</select>
																			</div>
																			<div class="mb-2">
																				<div class="d-flex justify-content-between">
																					<div class="form-check mt-4">
																					    <input class="form-check-input" type="checkbox" />
																					    <label class="form-check-label fw-semibold fs-6 text-black">Manager</label>
																					</div>
																					<div class="form-check mt-4">
																					    <input class="form-check-input" type="checkbox" />
																					    <label class="form-check-label fw-semibold fs-6 text-black">In-active Caller</label>
																					</div>
																				</div>
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
																<?php if($user_data->available_callers <$user_data->no_of_callers){?>
																<a href="javascript:;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_callers">
																	<span class="me-2"><i class="fa-solid fa-plus fs-7 fw-bold"></i></span>Add Callers
																</a>
																<?php }?>
															</div>
														</div>
													</div>
													<div class="d-flex align-items-center justify-content-end mt-2 mb-2">
														<div class="badge badge-danger rounded fw-bold border border-black w-25px h-25px" style="background-color: #ffa5a5 !important;"> </div>
														<div class="text-black fw-bold ms-2">Deactive Callers</div>
													</div>
													<div class="row">
														<div class="col-lg-12">
															<table class="table align-middle table-hover fs-7 gy-3 gs-2 list_page">
																<thead>
																	<tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
																		<th class="min-w-200px">Callers</th>
																		<th class="min-w-100px text-center">Department / Package</th>
																		<th class="min-w-80px text-center">Last Login</th>
																		<th class="min-w-50px text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incoming Call">IC</th>
																		<th class="min-w-50px text-center">
																			<span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Outgoing Call">OC /</span>
																			<span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Average Outgoing Call (%)">Avg(%)</span>
																		</th>
																		<th class="min-w-50px text-center">
																			<span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Missed Call">MC /</span>
																			<span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Average Missed Call (%)">Avg(%)</span>
																		</th>
																		<th class="min-w-50px text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Rejected Call">RC</th>
																		<th class="min-w-80px">Status</th>
																		<th class="min-w-125px"><span class="text-end">Actions</span></th>
																	</tr>
																</thead>
																<tbody class="text-gray-800 fw-bold fs-7">
																<?php if(isset($caller_list)){?>
																	<?php foreach ($caller_list as $i => $caller) { ?>
																		<?php
																		$first_character = isset($caller->name) && $caller->name ? $caller->name[0] : 'A';
																		$str = strtoupper($first_character);

																		$photo_url = base_url() . 'assets/Images/user/' . $caller->image;
																		$letter_url = base_url() . 'assets/Images/Letters/' . $str . '.png';
																		$photo_path = FCPATH . 'assets/Images/user/' . $caller->image;
																		$letter_path = FCPATH . 'assets/Images/Letters/' . $str . '.png';
																		?>
																	<tr style="<?php if ($caller->status==3){ ?>background-color: #ffa5a5 !important;<?php }?>">
																		<td>
																			<div class="d-flex align-items-center">
																				 <?php if (!empty($caller->image) && file_exists($photo_path)) { ?>
																				<a class="d-block overlay text-center me-3" href="<?php echo $photo_url; ?>" data-fslightbox="lightbox-basic_list">
																					<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px" style="background-image:url('<?php echo $photo_url; ?>')">
																					</div>
																					<div class="overlay-layer card-rounded rounded-circle bg-dark bg-opacity-25 shadow w-45px h-45px">
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
																					<label class="fs-7 fw-semibold text-black"><?php echo $caller->name; ?></label>
																					<?php if($caller->is_manager==1){?>
																					<label class="cursor-pointer fs-7 fw-semibold text-black ms-1"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Manager">
																				    	<i class="fa-solid fa-user-tie fs-3 text-black"></i>
																					</label>
																					<?php }?>
																					<div class="d-block">
																						<label class="badge badge-success fs-7 fw-bold text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mobile No"><?php echo $caller->phone_no ?></label>
																					</div>
																				</div>
																		 	</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black"><?php echo $caller->department_name ;?></label>
																			<div class="d-block">
																				<label class="badge badge-warning fs-7 text-black me-1"><?php echo $caller->package_name ;?></label>
																			</div>
																		</td>
																		<?php $last_login_time = last_login($caller->user_id); ?>
																		<td class="text-center">
																			<div class="badge badge-secondary fw-bold text-black fs-7"><?php echo $last_login_time ? date('d-M-Y h:i:s A', strtotime($last_login_time)) :' - ' ?></div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">05</label>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">08</label>
																			<div class="d-block text-center">
																				<label class="badge badge-success fs-8 text-white me-1">95 %</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">02</label>
																			<div class="d-block text-center">
																				<label class="badge badge-info fs-8 text-white me-1">98 %</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black text-center fw-bold">02</label>
																		</td>
																		<td>
																			<!-- <div class="form-check form-switch form-check-custom form-check-solid"> -->
																			    <!-- <input class="form-check-input w-35px h-20px" type="checkbox" < ?php echo $caller->status== "0" ? "checked":($caller->status== "3"? "disabled":"") ?>  /> -->
																				<div
																				class="form-check form-switch form-check-custom form-check-solid">
																				<span
																					class="m-switch m-switch--sm m-switch--success"
																					data-toggle="m-tooltip" data-placement="top"
																					title="<?php if ($caller->status == 0) {
																								echo 'Active';
																							} else if($caller->status == 1) {
																								echo 'In Active';
																							} ?>">

																					<input type="checkbox"
																						class="form-check-input w-35px h-20px"
																						<?php if ($caller->status == 0) {
																							echo "checked";} 
																							else if($caller->status == 3) {
																								echo 'disabled';
																							} ?>
																						name="activeunactive_<?php echo $i; ?>"
																						id="activeunactive_<?php echo $i; ?>"
																						onchange="activeunactive(<?php echo $caller->user_id; ?>,<?php echo $i; ?>)"
																						value="<?php echo $caller->status; ?>">


																				</span>
																			</div>
																			<!-- </div> -->
																		</td>
																		<td>
																			<span class="text-end">
																			<?php if ($caller->status!=3){ ?>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deactive_callers" onclick="deactivate_caller_func('<?php echo $caller->user_id; ?>','<?php echo $caller->name; ?>','<?php echo $caller->phone_no; ?>')">
																					<i class="fa-solid fa-ban fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deactive Caller"></i>
																				</a>
																				<?php }?>
																				<a href="<?php echo base_url(); ?>Manage_callers/view_callers/<?php echo $caller->user_id; ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																					<i class="fa-solid fa-clock-rotate-left fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="History"></i>
																				</a>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_callers" onclick="edit_caller_func(<?php echo $caller->user_id; ?>)">
																					<i class="fa-solid fa-pen-to-square fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
																				</a>
																			</span>
																		</td>
																	</tr>
																		<?php }?>
																	<?php }?>

																	<!-- <tr>
																		<td>
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
																						<label class="badge badge-success fs-7 fw-bold text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mobile No">9894444710</label>
																					</div>
																				</div>
																		 	</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black">Production</label>
																			<div class="d-block">
																				<label class="badge badge-warning fs-7 text-black me-1">Silver Package</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<div class="badge badge-secondary fw-bold text-black fs-7">29-Sep-2024 11:20:40 PM</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">02</label>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">02</label>
																			<div class="d-block text-center">
																				<label class="badge badge-success fs-8 text-white me-1">98 %</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">0</label>
																			<div class="d-block text-center">
																				<label class="badge badge-info fs-8 text-white me-1">100 %</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black text-center fw-bold">0</label>
																		</td>
																		<td>
																			<div class="form-check form-switch form-check-custom form-check-solid">
																			    <input class="form-check-input w-35px h-20px" type="checkbox" checked />
																			</div>
																		</td>
																		<td>
																			<span class="text-end">
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_deactive_callers">
																					<i class="fa-solid fa-ban fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deactive Caller"></i>
																				</a>
																				<a href="<?php echo base_url(); ?>Manage_callers/view_callers" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																					<i class="fa-solid fa-clock-rotate-left fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="History"></i>
																				</a>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_callers">
																					<i class="fa-solid fa-pen-to-square fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
																				</a>
																			</span>
																		</td>
																	</tr> -->
																	<!-- <tr style="background-color: #ffa5a5 !important;">
																		<td>
																			<div class="d-flex align-items-center">
																				<a class="d-block overlay text-center me-3" href="<?php echo base_url(); ?>assets/Images/member_1.png" data-fslightbox="lightbox-basic_list">
																				    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px" style="background-image:url('<?php echo base_url(); ?>assets/Images/member_1.png')">
																				    </div>
																				    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
																				        <i class="bi bi-eye-fill text-white fs-2"></i>
																				    </div>
																			 	</a>
																			 	<div class="mb-0 me-2">
																					<label class="fs-7 fw-semibold text-black">Raghu S</label>
																					<div class="d-block">
																						<label class="badge badge-success fs-7 fw-bold text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mobile No">8220018177</label>
																					</div>
																				</div>
																		 	</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black">Production</label>
																			<div class="d-block">
																				<label class="badge badge-warning fs-7 text-black me-1">Gold Package</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<div class="badge badge-secondary fw-bold text-black fs-7">28-Sep-2024 10:30:40 AM</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">09</label>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">24</label>
																			<div class="d-block text-center">
																				<label class="badge badge-success fs-8 text-white me-1">76 %</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black fw-bold text-center">32</label>
																			<div class="d-block text-center">
																				<label class="badge badge-info fs-8 text-white me-1">68 %</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black text-center fw-bold">11</label>
																		</td>
																		<td>
																			<div class="form-check form-switch form-check-custom form-check-solid">
																			    <input class="form-check-input w-35px h-20px" type="checkbox" disabled />
																			</div>
																		</td>
																		<td>
																			<span class="text-end">
																				<a href="<?php echo base_url(); ?>Manage_callers/view_callers" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																					<i class="fa-solid fa-clock-rotate-left fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="History"></i>
																				</a>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_callers">
																					<i class="fa-solid fa-pen-to-square fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
																				</a>
																			</span>
																		</td>
																	</tr>-->
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="kt_tab_user_log" role="tabpanel">
													<div class="d-flex justify-content-end gap-2 mb-2 mt-2">
														<button type="button" class="btn btn-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-static="true"><i class="fa-solid fa-filter fs-7"></i>Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<div class="scroll-y mh-325px">
																	<div class="mb-2">
																		<label class="form-label">Package</label>
																		<select class="form-select form-select-solid" data-control="select2">
																			<option value="all">All</option>
																			<option value="1">Silver Package</option>
																			<option value="2">Gold Package</option>
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label">Status</label>
																		<select class="form-select form-select-solid" data-control="select2">
																			<option value="all">All</option>
																			<option value="1">New Purchased</option>
																			<option value="2">Renewal</option>
																			<option value="3">Expired</option>
																		</select>
																	</div>
																	<div class="mb-2">
																		<label class="form-label">Date</label>
																		<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="dt_fill_loan_list_subs" onchange="date_filt_subs();">
																			<option value="all">All</option>
																			<option value="today" selected>Today</option>
																			<option value="week">This Week</option>
																			<option value="monthly">This Month</option>
																			<option value="custom_date">Custom Date</option>
																		</select>
																	</div>
																	<div class="mb-2 fv-row" id="today_dt_subs" style="display:block;">
																		<label class="form-label">Today</label>
																		<div class="d-flex align-items-center">
																			<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																					<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																					<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																				</svg>
																			</span>
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="today_date_fillter_subs" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_from_dt_subs" style="display:none;">
																		<label class="form-label">From</label>
																		<div class="d-flex align-items-center">
																			<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																					<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																					<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																				</svg>
																			</span>
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_from_date_fillter_subs" value="" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="week_to_dt_subs" style="display:none;">
																		<label class="form-label">To</label>
																		<div class="d-flex align-items-center">
																			<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																					<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																					<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																				</svg>
																			</span>
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Date" id="week_to_date_fillter_subs" value="<?php echo date("d-m-Y"); ?>" disabled />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="monthly_dt_subs" style="display:none;">
																		<label class="form-label">This Month</label>
																		<div class="d-flex align-items-center">
																			<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																					<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																					<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																				</svg>
																			</span>
																			<input class="form-control form-control-solid ps-12" name="" placeholder="Month" id="monthly_date_fillter_subs" value="<?php echo date("m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="from_dt_subs" style="display:none;">
																		<label class="form-label">From</label>
																		<div class="d-flex align-items-center">
																			<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																					<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																					<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																				</svg>
																			</span>
																			<input class="form-control form-control-solid ps-12" name="" placeholder="From Date" id="from_date_fillter_subs" value="<?php echo date("d-m-Y"); ?>" />
																		</div>
																	</div>
																	<div class="mb-2 fv-row" id="to_dt_subs" style="display:none;">
																		<label class="form-label">To</label>
																		<div class="d-flex align-items-center">
																			<span class="svg-icon position-absolute ms-4 svg-icon-2 dt text-gray-800">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																					<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																					<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																				</svg>
																			</span>
																			<input class="form-control form-control-solid ps-12" name="" placeholder="To Date" id="to_date_fillter_subs" value="<?php echo date("d-m-Y"); ?>"/>
																		</div>
																	</div>
																</div>
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-sm btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																	<button type="submit" class="btn btn-sm btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																</div>
															</div>
														</div>
														<!-- <a href="javascript:;" class="btn btn-primary btn-sm">
															<span class="me-2"><i class="fa-solid fa-file-export fs-7"></i></span>Export
														</a> -->
														<a href="<?php echo base_url(); ?>Landing_page" class="btn btn-primary btn-sm">
															<span class="me-2"><i class="fa-solid fa-plus fs-7 fw-bold"></i></span>Purchase Packages
														</a>
													</div>
													<div class="row">
														<div class="col-lg-12">
															<table class="table align-middle table-striped table-hover fs-7 gy-3 gs-2 list_page">
																<thead>
																	<tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
																		<th class="min-w-80px">Purchase Date</th>
																		<th class="min-w-150px text-center">Package</th>
																		<th class="min-w-80px">Start / End Date</th>
																		<th class="min-w-80px">Amount</th>
																		<th class="min-w-80px">Mode / Trans.ID</th>
																		<th class="min-w-80px">Status</th>
																		<th class="min-w-80px"><span class="text-end">Actions</span></th>
																	</tr>
																</thead>
																<tbody class="text-gray-800 fw-bold fs-7">
																	<tr>
																		<td align="start">
																			<label>28-Sep-2024</label>
																			<div class="d-block">
																				<label class="badge badge-warning text-black fs-7" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Days">30 Days</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black">Silver Package</label>
																			<label class="fs-7 text-black ms-1 me-1">/</label>
																			<label class="fs-7 text-black">1 Month</label>
																			<div class="d-block text-center mt-1">
																				<label class="badge badge-danger fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Available Caller Count">07</label>
																				<label class="fs-7 text-black ms-1 me-1">/</label>
																				<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Total Caller Count">10</label>
																			</div>
																		</td>
																		<td align="start">
																			<div class="badge badge-success fs-7 me-2">28-Sep-2024</div>
																			<div class="d-block mt-1">
																				<div class="badge badge-danger fs-7">27-Oct-2024</div>
																			</div>
																		</td>
																		<td align="right">
																			<label class="fs-6 text-black">
																				<i class="fa-solid fa-indian-rupee-sign fs-7 text-black"></i>
																			</label>
																			<label class="fs-6 text-black">2,500</label>
																		</td>
																		<td align="start">
																			<div class="text-black fw-bold fs-7">G-Pay</div>
																			<div class="d-block">
																				<div class="badge badge-secondary text-black fs-7">TTCNI022000800594</div>
																			</div>
																		</td>
																		<td>
																			<div class="badge badge-warning text-black fw-bold fs-7 rounded">New Purchased</div>
																		</td>
																		<td>
																			<span class="text-end">
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_buy_more_callers">
																					<i class="fa-solid fa-cart-plus fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Buy More Callers"></i>
																				</a>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_subscription_history_1_month">
																					<i class="fa-solid fa-clock-rotate-left fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="History"></i>
																				</a>
																			</span>
																		</td>
																	</tr>
																	<tr>
																		<td align="start">
																			<label>15-Mar-2024</label>
																			<div class="d-block">
																				<label class="badge badge-warning text-black fs-7"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Days">0 Days</label>
																			</div>
																		</td>
																		<td class="text-center">
																			<label class="fs-7 text-black">Gold Package</label>
																			<label class="fs-7 text-black ms-1 me-1">/</label>
																			<label class="fs-7 text-black">6 Months</label>
																			<div class="d-block text-center mt-1">
																				<label class="badge badge-danger fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Available Caller Count">08</label>
																				<label class="fs-7 text-black ms-1 me-1">/</label>
																				<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Total Caller Count">15</label>
																			</div>
																		</td>
																		<td align="start">
																			<div class="badge badge-success fs-7 me-2">15-Mar-2024</div>
																			<div class="d-block mt-1">
																				<div class="badge badge-danger fs-7">14-Sep-2024</div>
																			</div>
																		</td>
																		<td align="right">
																			<label class="fs-6 text-black">
																				<i class="fa-solid fa-indian-rupee-sign fs-7 text-black"></i>
																			</label>
																			<label class="fs-6 text-black">22,500</label>
																		</td>
																		<td align="start">
																			<div class="text-black fw-bold fs-7">G-Pay</div>
																			<div class="d-block">
																				<div class="badge badge-secondary text-black fs-7">TTCNI022000855590</div>
																			</div>
																		</td>
																		<td>
																			<div class="badge badge-danger text-white fw-bold fs-7 rounded">Expired</div>
																		</td>
																		<td>
																			<span class="text-end">
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_renewal_subscriber">
																					<i class="fa-solid fa-repeat fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Package"></i>
																				</a>
																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_subscription_history">
																					<i class="fa-solid fa-clock-rotate-left fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="History"></i>
																				</a>
																			</span>
																		</td>
																	</tr>
																</tbody>
															</table>
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
					<?php $this->load->view("footer.php");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->

	<!--begin::Modal - Create Callers-->
	<div class="modal fade" id="kt_modal_add_callers" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
              <div class="text-center">
                  <h1 class="mb-3">
                  	<label>Create Callers &nbsp; - &nbsp;</label>
                  	<label class="badge badge-danger text-white fs-3 fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Available Callers Count"><?php echo sprintf("%02d", $user_data->available_callers); ?></label>
                  	<label class="text-black fs-3 fw-bold">/</label>
                  	<label class="badge badge-info text-white fs-3 fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Total Callers Count"><?php echo $user_data->no_of_callers ?></label>
                  </h1>
              </div>
			  <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Manage_callers/add_caller" id="add_caller_form">
              <div class="d-flex align-items-center justify-content-end">
					<?php if(!$caller_data){?>
					<div class="form-check mt-4">
						<input class="form-check-input" type="checkbox" value="1" id="is_manager" name="is_manager" checked />
						<label class="form-check-label fw-semibold fs-6 text-black">Manager</label>
					</div>
					<?php }?>
				</div>
              <div class="row">
              	<div class="col-lg-3">
					<input type="hidden" name="subscription_id" value="<?php echo $user_data->subscriber_id ; ?> ">
					<label class="col-form-label required fw-semibold fs-6">Packages</label>
					<div class="fv-row">
						<select class="form-select form-select-solid text-dark" data-control="select2" data-hide-search="false"  data-dropdown-parent="#kt_modal_add_callers" id="package_id" name="package_id">
							<option value="">Select Packages</option>
							<?php if(isset($sub_package)) {?>
							<?php foreach ($sub_package as $i => $c_list) { ?>
								<?php 
									$duration = $c_list->duration == '3'? 'Life Time':( $c_list->duration == '1' ? 'Month':'Year')
								?>
								<option value="<?php echo  $c_list->package_id  ?>">
									<?php echo  $c_list->package_name ?> - <?php echo $c_list->duration == '3'? ' '.$duration: $c_list->period .' '.$duration ?></option>
							<?php } ?>
							<?php } ?>
						</select>
						<div class="fv-plugins-message-container invalid-feedback" id=""></div>
					</div>
					
				</div>
              	<div class="col-lg-3">
              		<label class="col-form-label required fw-semibold fs-6">First Name</label>
              		<div class="fv-row">
              			<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter First Name" value="" id="first_name" name="first_name">
              			<div class="fv-plugins-message-container invalid-feedback"></div>
              		</div>
              	</div>
              	<div class="col-lg-3">
              		<label class="col-form-label required fw-semibold fs-6">Last Name</label>
              		<div class="fv-row">
              			<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Last Name" value="" id="last_name" name="last_name">
              			<div class="fv-plugins-message-container invalid-feedback"></div>
              		</div>
              	</div>
              	<div class="col-lg-3">
					<label class="col-form-label required fw-semibold fs-6">Department</label>
					<div class="fv-row">
						<select class="form-select form-select-solid text-dark" data-control="select2" data-hide-search="false"  data-dropdown-parent="#kt_modal_add_callers" id="dept_id" name="dept_id">
							<option value="">Select Department</option>
							<?php if(isset($dept_list)) {?>
							<?php foreach ($dept_list as $i => $c_list) { ?>
								<option value="<?php echo  $c_list->department_id   ?>">
									<?php echo  $c_list->department_name ?></option>
							<?php } ?>
							<?php } ?>
						</select>
						<div class="fv-plugins-message-container invalid-feedback" id=""></div>
					</div>
					
				</div>
              	<div class="col-lg-3">
              		<label class="col-form-label required fw-semibold fs-6">Mobile No</label>
              		<div class="fv-row">
              			<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Mobile No" value="" id="mobile_no" name="mobile_no" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10)">
              			<div class="fv-plugins-message-container invalid-feedback"></div>
              		</div>
              	</div>
              	<div class="col-lg-6">
					<label class="col-form-label fw-semibold fs-6">Description</label>
					<textarea class="form-control form-control-solid" rows="1" placeholder="Enter Description" name="descrip_caller"></textarea>
					<div class="fv-plugins-message-container invalid-feedback"></div>
				</div>
				<div class="col-lg-3 text-center mt-3">
					<div class="image-input image-input-outline" data-kt-image-input="true" >
						<div class="image-input-wrapper w-100px h-100px" style="background-image: url('<?php echo base_url() ?>assets/Images/member_1.png')"></div>
						<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
							<i class="fa-solid fa-pen fs-7 text-black"></i>
							<input type="file" name="logo" id="logo"
							accept=".png, .jpg, .jpeg">
							<input type="hidden" name="edit_id" value="">
							<input type="hidden" name="old_logo" value="">
							<input type="hidden" name="avatar_remove">
						</label>
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
						<i class="fa-solid fa-x fs-8 text-black"></i>
						</span>
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
							<i class="fa-solid fa-x fs-8 text-black"></i>
						</span>
					</div>
					<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
				</div>
              </div>
				<div class="d-flex align-items-center justify-content-end mt-4">
						<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
					<button type="button" id="add_submit" class="btn btn-sm btn-primary" onclick="add_caller_validation();">Create Callers</button>
				</div>
				</form>
            </div>
        </div>
        <!--end::Modal dialog-->
    </div>
	</div>
	<!--end::Modal - Create Callers-->

	<!--begin::Modal - Update Callers-->
	<div class="modal fade" id="kt_modal_edit_callers" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
	               <div id="edit_caller_div"></div>
	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Update Callers-->

	<!--begin::Modal - Buy More Callers-->
	<div class="modal fade" id="kt_modal_buy_more_callers" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
                <div class="text-center">
                    <!-- <h1 class="mb-6">
                    	<label>Buy More Callers &emsp; - &emsp;</label>
                    	<label class="badge badge-warning fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Days">30 Days</label>
                    </h1> -->
                    <h1 class="mb-6">Buy More Callers</h1>
                </div>
                <div class="row mb-2">
									<div class="col-lg-6">
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Subscriber</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">Abdul Nizamuddin M</label>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Company</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">Spacedot Private Limited</label>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Mobile No</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">9685747485</label>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Email ID</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">abdulnizamuddinm@gmail.com</label>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Package</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">Silver Package</label>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">No. of Callers / Duration</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<div class="col-6 fs-5 fw-bold">
												<label class="badge badge-warning text-black fs-6 fw-bold">10</label>
												<label class="fs-5 fw-bold ms-1 me-1">/</label>
												<label class="fs-5 fw-bold">1 Month</label>
											</div>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Start / End Date</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<div class="col-6 fs-5 fw-bold">
												<label class="badge badge-success text-white fs-6 fw-bold">28-Sep-2024</label>
												<label class="fs-5 fw-bold text-black">/</label>
												<label class="badge badge-danger text-white fs-6 fw-bold">27-Oct-2024</label>
											</div>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Renewal Days</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<div class="col-6 fs-5 fw-bold">
												<label class="badge badge-warning text-black fs-6 fw-bold">30 Days</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
                		<label class="col-form-label required fw-semibold fs-6">No.of Additional Callers</label>
                		<div class="fv-row">
                			<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter No.of Additional Callers" value="5">
                			<div class="fv-plugins-message-container invalid-feedback"></div>
                		</div>
                	</div>
                	<div class="col-lg-3">
                		<label class="col-form-label fw-semibold fs-6">End Date</label>
                		<div class="fv-row">
                			<input type="text" class="form-control form-control-lg_1 form-control-solid" value="27-Oct-2024" disabled>
                			<div class="fv-plugins-message-container invalid-feedback"></div>
                		</div>
                	</div>
								</div>
								<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
                	<label class="fw-bold fs-3 me-13">Sub Total</label>
              		<div class="fw-bold fs-2">
              			<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
              			<label class="fs-2">1,250</label>
              		</div>
              	</div>
              	<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
                	<div class="fw-bold fs-3 me-13">GST(18 %)
                		<div class="d-block fs-8 text-center">[Exclusive]</div>
                	</div>
              		<div class="fw-bold fs-2">
              			<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
              			<label class="fs-2">225</label>
              		</div>
              	</div>
              	<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
                	<label class="fw-bold fs-2 me-13">Grand Total</label>
              		<div class="fw-bold fs-2">
              			<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
              			<label class="fs-2">1,475</label>
              		</div>
              	</div>
              	<div class="d-flex align-items-center justify-content-end mt-8">
									<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
									<a href="javascript:;" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Pay Now</a>
								</div>
	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Buy More Callers-->

	<!--begin::Modal - Subscription History-->
	<div class="modal fade" id="kt_modal_subscription_history_1_month" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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

	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Subscription History-->

	<!--begin::Modal - Subscription History-->
	<div class="modal fade" id="kt_modal_subscription_history" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
	                <div class="text-center">
	                    <h1 class="mb-6">Subscription History</h1>
	                </div>
					<div class="row">
						<div class="col-lg-6">
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Package</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">Gold Package</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Duration</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">6 Months</label>
							</div>
						</div>
						<div class="col-lg-12">
							<table class="table align-middle table-striped table-hover fs-7 gy-3 gs-2 list_page_scroll">
								<thead>
									<tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
										<th class="min-w-80px">Purchase Date</th>
										<th class="min-w-100px text-center">Callers</th>
										<th class="min-w-80px">Start / End Date</th>
										<th class="min-w-80px">Amount</th>
										<th class="min-w-80px">Mode / Trans.ID</th>
										<th class="min-w-80px">Status</th>
									</tr>
								</thead>
								<tbody class="text-gray-800 fw-bold fs-7">
									<tr>
										<td align="start">
											<label>15-Mar-2024</label>
											<div class="d-block">
												<label class="badge badge-warning text-black fs-7"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Days">0 Days</label>
											</div>
										</td>
										<td class="text-center">
											<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Purchased Caller Count">15</label>
										</td>
										<td align="start">
											<div class="badge badge-success fs-7 me-2">15-Mar-2024</div>
											<div class="d-block mt-1">
												<div class="badge badge-danger fs-7">14-Sep-2024</div>
											</div>
										</td>
										<td align="right">
											<label class="fs-6 text-black">
												<i class="fa-solid fa-indian-rupee-sign fs-7 text-black"></i>
											</label>
											<label class="fs-6 text-black">22,500</label>
										</td>
										<td align="start">
											<div class="text-black fw-bold fs-7">G-Pay</div>
											<div class="d-block">
												<div class="badge badge-secondary text-black fs-7">TTCNI022000855590</div>
											</div>
										</td>
										<td>
											<div class="badge badge-danger text-white fw-bold fs-7 rounded">Expired</div>
										</td>
									</tr>
									<tr>
										<td align="start">15-Mar-2024</td>
										<td class="text-center">
											<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Purchased Caller Count">15</label>
										</td>
										<td align="start">
											<div class="badge badge-success fs-7 me-2">15-Mar-2024</div>
											<div class="d-block mt-1">
												<div class="badge badge-danger fs-7">14-Sep-2024</div>
											</div>
										</td>
										<td align="right">
											<label class="fs-6 text-black">
												<i class="fa-solid fa-indian-rupee-sign fs-7 text-black"></i>
											</label>
											<label class="fs-6 text-black">22,500</label>
										</td>
										<td align="start">
											<div class="text-black fw-bold fs-7">G-Pay</div>
											<div class="d-block">
												<div class="badge badge-secondary text-black fs-7">TTCNI022000855590</div>
											</div>
										</td>
										<td>
											<div class="badge badge-danger text-black fw-bold fs-7 rounded" style="background-color: #FF7F00 !important;">Renewal</div>
										</td>
									</tr>
									<tr>
										<td align="start">21-Nov-2023</td>
										<td class="text-center">
											<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Purchased Caller Count">10</label>
										</td>
										<td align="start">
											<div class="badge badge-success fs-7 me-2">16-Sep-2023</div>
											<div class="d-block mt-1">
												<div class="badge badge-danger fs-7">15-Mar-2024</div>
											</div>
										</td>
										<td align="right">
											<label class="fs-6 text-black">
												<i class="fa-solid fa-indian-rupee-sign fs-7 text-black"></i>
											</label>
											<label class="fs-6 text-black">9,660</label>
										</td>
										<td align="start">
											<div class="text-black fw-bold fs-7">G-Pay</div>
											<div class="d-block">
												<div class="badge badge-secondary text-black fs-7">TTCNI022000855111</div>
											</div>
										</td>
										<td>
											<div class="badge badge-warning text-black fw-bold fs-7 rounded">Callers Added</div>
										</td>
									</tr>
									<tr>
										<td align="start">16-Sep-2023</td>
										<td class="text-center">
											<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Purchased Caller Count">05</label>
										</td>
										<td align="start">
											<div class="badge badge-success fs-7 me-2">16-Sep-2023</div>
											<div class="d-block mt-1">
												<div class="badge badge-danger fs-7">15-Mar-2024</div>
											</div>
										</td>
										<td align="right">
											<label class="fs-6 text-black">
												<i class="fa-solid fa-indian-rupee-sign fs-7 text-black"></i>
											</label>
											<label class="fs-6 text-black">7,500</label>
										</td>
										<td align="start">
											<div class="text-black fw-bold fs-7">G-Pay</div>
											<div class="d-block">
												<div class="badge badge-secondary text-black fs-7">TTCNI022000855880</div>
											</div>
										</td>
										<td>
											<div class="badge badge-warning text-black fw-bold fs-7 rounded">New Purchased</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Subscription History-->

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
				<div class="text-center">
					<h1 class="mb-6">
						<label>Renewal Package &nbsp; - &nbsp;</label>
						<label class="badge badge-danger fs-2 text-white">Expired</label>
					</h1>
				</div>
				<div class="row mb-2">
									<div class="col-lg-6">
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Subscriber</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">Abdul Nizamuddin M</label>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Company</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">Spacedot Private Limited</label>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Mobile No</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">9685747485</label>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Email ID</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">abdulnizamuddinm@gmail.com</label>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Package</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<label class="col-6 fs-5 fw-bold">Gold Package</label>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">No. of Callers / Duration</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<div class="col-6 fs-5 fw-bold">
												<label class="badge badge-warning text-black fs-6 fw-bold">15</label>
												<label class="fs-5 fw-bold ms-1 me-1">/</label>
												<label class="fs-5 fw-bold">6 Month</label>
											</div>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Start / End Date</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<div class="col-6 fs-5 fw-bold">
												<label class="badge badge-success text-white fs-6 fw-bold">15-Mar-2024</label>
												<label class="fs-5 fw-bold text-black">/</label>
												<label class="badge badge-danger text-white fs-6 fw-bold">14-Sep-2024</label>
											</div>
										</div>
										<div class="row mb-2">
											<label class="col-5 fs-6 fw-semibold">Renewal Days</label>
											<label class="col-1 fs-6 fw-bold">:</label>
											<div class="col-6 fs-5 fw-bold">
												<label class="badge badge-warning text-black fs-6 fw-bold">0 Days</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
						<label class="col-form-label fw-semibold fs-6">Package</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Package" value="Gold Package - 6 Months" disabled>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
									<div class="col-lg-3">
						<label class="col-form-label required fw-semibold fs-6">No.of Callers</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter No.of Callers" value="15">
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<?php
			$monday = strtotime("last sunday");
			$monday = date('w', $monday) == date('w') ? $monday + 7 * 86400 : $monday;
			$sunday = strtotime(date("d-m-Y", $monday) . " +6 days");
			$this_week_start = date("d-m-Y", $monday);
			$this_week_end = date("d-m-Y", $sunday);
			// echo "$this_week_start to $this_week_end ";

			?>
					<div class="col-lg-3">
						<label class="col-form-label fw-semibold fs-6">Start Date</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" value="<?php echo date("d-M-Y"); ?>" disabled>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<div class="col-lg-3">
						<label class="col-form-label fw-semibold fs-6">End Date</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" value="<?php echo date('d-M-Y', strtotime("+180 days")); ?>" disabled>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
								</div>
								<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
					<label class="fw-bold fs-3 me-13">Sub Total</label>
						<div class="fw-bold fs-2">
							<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
							<label class="fs-2">22,500</label>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
					<div class="fw-bold fs-3 me-13">GST(18 %)
						<div class="d-block fs-8 text-center">[Exclusive]</div>
					</div>
						<div class="fw-bold fs-2">
							<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
							<label class="fs-2">4,050</label>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
					<label class="fw-bold fs-2 me-13">Grand Total</label>
						<div class="fw-bold fs-2">
							<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
							<label class="fs-2">26,550</label>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-end mt-8">
									<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
									<a href="javascript:;" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Pay Now</a>
								</div>
				</div>
			</div>
			<!--end::Modal dialog-->
		</div>
	</div>

	<div class="modal fade" id="kt_modal_renewal_subscriber_1" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
	                <div class="text-center">
	                    <h1 class="mb-6">
	                    	<label>View Subscriber &nbsp; - &nbsp;</label>
	                    	<label class="badge badge-danger text-white fs-3 fw-bold">Expired</label>
	                    </h1>
	                </div>
	                <div class="row mb-2">
						<div class="col-lg-6">
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Created Date</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">15-Mar-2024</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Subscriber</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">Amaran D</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Company</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">Black Forest Cakes</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Mobile No</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">9090858685</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Email ID</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">amaran@gmail.com</label>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Package</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">Gold Package</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">No. of Callers / Duration</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<div class="col-6 fs-5 fw-bold">
									<label class="badge badge-warning text-black fs-6 fw-bold">15</label>
									<label class="fs-5 fw-bold ms-1 me-1">/</label>
									<label class="fs-5 fw-bold">6 Months</label>
								</div>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Paid Amount</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<div class="col-6">
									<label class="fs-5 fw-bold">
										<i class="fa-solid fa-indian-rupee-sign fs-5 text-black"></i>
									</label>
									<label class="fs-5 fw-bold">22,500</label>
								</div>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Start / End Date</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<div class="col-6 fs-5 fw-bold">
									<label class="badge badge-success text-white fs-6 fw-bold">15-Mar-2024</label>
									<label class="fs-5 fw-bold text-black">/</label>
									<label class="badge badge-danger text-white fs-6 fw-bold">14-Oct-2024</label>
								</div>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Renewal Days</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<div class="col-6 fs-5 fw-bold">
									<label class="badge badge-warning text-black fs-6 fw-bold">0 Days</label>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<label class="col-form-label fw-semibold fs-6">Photo</label>
							<div class="d-block">
								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url(); ?>assets/Images/member_1.png')">
									<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url(); ?>assets/Images/member_1.png')"></div>
								</div>
							</div>
						</div>
					</div>
	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Renewal Subscriber-->

	<!--begin::Modal - Deactive Callers-->
	<div class="modal fade" id="kt_modal_deactive_callers" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
	  <!--begin::Modal dialog-->
	  <div class="modal-dialog modal-m">
	    <!--begin::Modal content-->
	    <div class="modal-content rounded">
		<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Manage_callers/deactivate_caller">
	      <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
	        <div class="swal2-icon-content">?</div>
	      </div>
	      <div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Deactive Callers ?
	        <div class="d-block fw-bold fs-5 py-2">
				<input type="hidden" name="deactivate_id" id="deactivate_id">
	          <label id="deactivate_name">Selva Kumar D</label>
	          <label class="me-1 ms-1">-</label>
	          <label id="deactivate_phn">9790464324</label>
	        </div>
	      </div>
	      <div class="d-flex justify-content-center align-items-center pt-8">
	        <button type="submit" class="btn btn-sm btn-primary me-3" data-bs-dismiss="modal">Yes</button>
	        <button type="reset" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
	      </div><br><br>
		</form>
	    </div>
	    <!--end::Modal content-->
	  </div>
	  <!--end::Modal dialog-->
	</div>
	<!--end::Modal - Deactive Callers-->

		<?php $this->load->view("script.php");?>
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
		var baseurl = '<?php echo base_url(); ?>';
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
			function date_filt_subs()
			{
				var dt_fill_loan_list_subs = document.getElementById('dt_fill_loan_list_subs').value;
				var today_dt_subs = document.getElementById('today_dt_subs');
				var week_from_dt_subs = document.getElementById('week_from_dt_subs');
				var week_to_dt_subs = document.getElementById('week_to_dt_subs');
				var monthly_dt_subs = document.getElementById('monthly_dt_subs');
				var from_dt_subs = document.getElementById('from_dt_subs');
				var to_dt_subs = document.getElementById('to_dt_subs');
				var from_date_fillter_subs = document.getElementById('from_date_fillter_subs');
				var to_date_fillter_subs = document.getElementById('to_date_fillter_subs');

				if (dt_fill_loan_list_subs == "today")
				{
					today_dt_subs.style.display = "block";
					monthly_dt_subs.style.display = "none";
					from_dt_subs.style.display = "none";
					to_dt_subs.style.display = "none";
					week_from_dt_subs.style.display = "none";
					week_to_dt_subs.style.display = "none";
					$("#today_date_fillter_subs").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_loan_list_subs == "week")
				{
					today_dt_subs.style.display = "none";
					week_from_dt_subs.style.display = "block";
					week_to_dt_subs.style.display = "block";
					monthly_dt_subs.style.display = "none";
					from_dt_subs.style.display = "none";
					to_dt_subs.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_subs').val(firstday);
					$('#week_to_date_fillter_subs').val(lastday);

				}
				else if (dt_fill_loan_list_subs == "monthly")
				{
					today_dt_subs.style.display = "none";
					monthly_dt_subs.style.display = "block";
					from_dt_subs.style.display = "none";
					to_dt_subs.style.display = "none";
					week_from_dt_subs.style.display = "none";
					week_to_dt_subs.style.display = "none";
					$("#monthly_date_fillter_subs").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_loan_list_subs == "custom_date")
				{
					today_dt_subs.style.display = "none";
					monthly_dt_subs.style.display = "none";
					from_dt_subs.style.display = "block";
					to_dt_subs.style.display = "block";
					week_from_dt_subs.style.display = "none";
					week_to_dt_subs.style.display = "none";

					$("#from_date_fillter_subs").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_subs").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_subs.style.display = "none";
					monthly_dt_subs.style.display = "none";
					from_dt_subs.style.display = "none";
					to_dt_subs.style.display = "none";
					week_from_dt_subs.style.display = "none";
					week_to_dt_subs.style.display = "none";
				}
			}
		</script>
		<script>
			$(".list_page").DataTable({
				// "ordering": false,
				"aaSorting":[],
				// "pagingType": 'simple_numbers',
				"pagingType": "full_numbers",
				// "sorting":false,
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
		</script>
		<script>
			$(".list_page_scroll").DataTable({
				"ordering": false,
				"aaSorting":[],
				// "pagingType": 'simple_numbers',
				// "pagingType": "full_numbers",
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
				  "<'col-sm-12 d-flex align-items-center justify-content-end my-3'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('.list_page_scroll').wrap('<div class="dataTables_scroll" />');
		</script>

		<!-- add caller validation -->
		<script>
			var baseurl = '<?php echo base_url(); ?>';
			function add_caller_validation () {
				$("#add_submit").prop('disabled', true);
				let err = 0;
				
				var package_id = $('#package_id').val();
				var first_name = $('#first_name').val();
				var last_name = $('#last_name').val();
				var dept_id = $('#dept_id').val();
				var mobile_no = $('#mobile_no').val();
				
			
				
				$('#package_id').siblings('.invalid-feedback').text('').show();
				$('#first_name').siblings('.invalid-feedback').text('').show();
				$('#last_name').siblings('.invalid-feedback').text('').show();
				$('#dept_id').siblings('.invalid-feedback').text('').show();
				$('#mobile_no').siblings('.invalid-feedback').text('').show();

				// Initialize error flag
				let hasError = false;
				if (package_id === '') {
					$('#package_id').siblings('.invalid-feedback').text('Package is Required.').show();
					hasError = true;
				}
				if (first_name === '') {
					$('#first_name').siblings('.invalid-feedback').text('First Name is Required.').show();
					hasError = true;
				}
				if (last_name === '') {
					$('#last_name').siblings('.invalid-feedback').text('Last Name is Required.').show();
					hasError = true;
				}
				if (dept_id === '') {
					$('#dept_id').siblings('.invalid-feedback').text('Department is Required.').show();
					hasError = true;
				}
				if (mobile_no === '') {
					$('#mobile_no').siblings('.invalid-feedback').text('Mobile Number is Required.').show();
					hasError = true;
				}else if(mobile_no){
					var datastring = "&mobile_no=" + mobile_no;
					$.ajax({
						type: "POST",
						url: baseurl + 'Manage_callers/chk_mobile_unique',
						data: datastring,
						cache: false,
						dataType: "html",
						success: function(result) {
							if (result > 0) {
								$('#mobile_no').siblings('.invalid-feedback').text('Mobile Number is already exists.').show();
								hasError = true;
							}
						},
						error: function() {
							$('#mobile_no').siblings('.invalid-feedback').text('An error occurred. Please try again.').show();
						}
					});

				}
				// If there are errors, return false immediately
				if (hasError) {
					$("#add_submit").prop('disabled', false);
					return false;
				}
				else{
					$("#add_submit").prop('disabled', true);
					// return false;
					$('#add_caller_form').submit();
				}
			}
		</script>

		<!-- deactivate caller -->
		 <script>
			function deactivate_caller_func(user_id,name,mobile){
				$('#deactivate_id').val(user_id);
				$('#deactivate_name').text(name);
				$('#deactivate_phn').text(mobile);
			}
		</script>

<!-- status change -->
 <script>
	function activeunactive(val, ival) {
			var unactive;
			var unactv;
			var a = $("#activeunactive_" + ival).val();
			if (a == 1) {
				unactive = 0;
				unactv = "Active"
			} else {
				unactive = 1;
				unactv = "In-Active"
			}

			var datastring = "id=" + val + "&status=" + unactive;
			$.ajax({
				type: "POST",
				url: baseurl + 'Manage_callers/change_status',
				data: datastring,
				cache: false,
				dataType: "html",
				success: function(result) {
					if (unactive == 0) {
						$('#active_success').show();
						$('#inactive_success').hide();
						setTimeout(function() {
							location.reload();
						}, 500);
					} else {
						$('#active_success').hide();
						$('#inactive_success').show();
						setTimeout(function() {
							location.reload();
						}, 500);
					}
				}
			});
		}
 </script>

 <!-- edit caller -->
 		<script>
			function edit_caller_func(val) {
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>Manage_callers/edit_caller',
					data: {
						id: val
					},
					dataType: "html",
					success: function(response) {
						if (response) {
							$('#edit_caller_div').empty().append(response);
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
