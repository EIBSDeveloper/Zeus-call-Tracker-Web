<?php $this->load->view("common.php"); ?>
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
		var defaultThemeMode = "light"; 
		var themeMode; if ( document.documentElement ) { 
			if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
			} else { 
				if ( localStorage.getItem("data-bs-theme") !== null ) {
					 themeMode = localStorage.getItem("data-bs-theme"); 
					} else { themeMode = defaultThemeMode; 

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
										<ul class="nav nav-tabs nav-line-tabs fs-4 px-10 pt-5">
									    <li class="nav-item">
									        <a class="nav-link  text-black fw-bold" href="<?php echo base_url(); ?>Manage_callers">Manage Callers</a>
									    </li>
									    <li class="nav-item">
									        <a class="nav-link active text-black fw-bold" data-bs-toggle="tab" href="#kt_tab_user_log">Manage Subscription</a>
									    </li>
										</ul>
										<div class="card-body pt-2">
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade" id="kt_tab_users" role="tabpanel">
												</div>
												<div class="tab-pane fade show active" id="kt_tab_user_log" role="tabpanel">
													<div class="d-flex justify-content-end gap-2 mb-2 mt-2">
														<button type="button" class="btn btn-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-static="true"><i class="fa-solid fa-filter fs-7"></i>Filter</button>
														<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
															<div class="px-7 py-5" data-kt-user-table-filter="form">
																<form method="post" action="<?php echo base_url() ?>Manage_callers/subscription_list" id="fill_form">
																	<div class="scroll-y mh-325px">
																		
																		<div class="mb-2">
																			<label class="form-label">Package</label>
																			<select class="form-select form-select-solid" data-control="select2" name="package_id_fill">
																				<option value="">All</option>
																				<?php if(isset($package_list)) {?>
																				<?php foreach ($package_list as $i => $c_list) { ?>
																					<option value="<?php echo  $c_list->package_id  ?>" <?php echo $package_id_fill == $c_list->package_id ? "selected" : '' ?>>
																						<?php echo  $c_list->package_name ?></option>
																				<?php } ?>
																				<?php } ?>
																			</select>
																		</div>
																		<div class="mb-2">
																			<label class="form-label">Status</label>
																			<select class="form-select form-select-solid" data-control="select2" name="subscriber_status_fill">
																				<option value="">All</option>
																				<option value="0"<?php echo $subscriber_status_fill == "0" ? "selected" : '' ?>>New Purchased</option>
																				<option value="1"<?php echo $subscriber_status_fill == "1" ? "selected" : '' ?>>Renewal</option>
																				<option value="3"<?php echo $subscriber_status_fill == "3" ? "selected" : '' ?>>Expired</option>
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
																		<a href="<?php echo base_url(); ?>Manage_callers/subscription_list" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</a>
																		<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
																	</div>
																</form>
															</div>
														</div>
														<!-- <a href="javascript:;" class="btn btn-primary btn-sm">
															<span class="me-2"><i class="fa-solid fa-file-export fs-7"></i></span>Export
														</a> -->

														<a href="<?php echo base_url(); ?>Landing_page" class="btn btn-primary btn-sm">
															<span class="me-2"><i class="fa-solid fa-plus fs-7 fw-bold"></i></span>Purchase Packages
														</a>
													</div>
													<?php $common_date= get_general_settings()->date_format ?? 'd-M-Y'; ?>
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
																	
																	<?php if(isset($subscriber_data)){?>
																		<?php foreach ($subscriber_data as $i => $sublist) { ?>
																			<?php 
																				$duration = $sublist->duration == '3'? 'Life Time':( $sublist->duration == '1' ? 'Month':'Year')
																			?>
																			<tr>
																				<td align="start">
																					<label><?php echo date($common_date,strtotime($sublist->created_at)) ?></label>
																					<div class="d-block">
																						<label class="badge badge-warning text-black fs-7"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Days"><?php echo renewal_days_count($sublist->subscriber_id)?> Days</label>
																					</div>
																				</td>
																				<td class="text-center">
																					<label class="fs-7 text-black"><?php echo $sublist->package_name ?></label>
																					<label class="fs-7 text-black ms-1 me-1">/</label>
																					<label class="fs-7 text-black"><?php echo $sublist->duration == '3'? ' '.$duration: $sublist->period .' '.$duration ?></label>
																					<div class="d-block text-center mt-1">
																						<label class="badge badge-danger fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Available Caller Count"><?php echo sprintf("%02d", $sublist->available_callers); ?></label>
																						<label class="fs-7 text-black ms-1 me-1">/</label>
																						<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Total Caller Count"><?php echo $sublist->no_of_callers ?></label>
																					</div>
																				</td>
																				<td align="start">
																					<div class="badge badge-success fs-7 me-2"><?php echo date($common_date,strtotime($sublist->start_date)) ?></div>
																					<div class="d-block mt-1">	
																						<div class="badge badge-danger fs-7"><?php echo date($common_date,strtotime($sublist->end_date)) ?></div>
																					</div>
																				</td>
																				<td align="right">
																					<label class="fs-6 text-black">
																						<i class="fa-solid fa-indian-rupee-sign fs-7 text-black"></i>
																					</label>
																					<label class="fs-6 text-black"><?php echo IND_money_format($sublist->amount);  ?></label>
																				</td>
																				<td align="start">
																					<div class="text-black fw-bold fs-7">G-Pay</div>
																					<div class="d-block">
																						<div class="badge badge-secondary text-black fs-7">TTCNI022000855590</div>
																					</div>
																				</td>
																				<td>
																					<?php if($sublist->status==3){?>
																					<div class="badge badge-danger text-white fw-bold fs-7 rounded">Expired</div>
																					<?php }else{?>
																					<div class="badge badge-warning text-black fw-bold fs-7 rounded">New Purchased</div>
																					<?php }?>
																				</td>
																				<td>
																					<span class="text-end">
																					<?php if($sublist->status==3){?>
																						<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_renewal_subscriber" onclick=" renew_caller_modal_func(<?php echo $sublist->subscriber_id;?>)">
																							<i class="fa-solid fa-repeat fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Package"></i>
																						</a>
																					<?php }else{?>
																						<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_buy_more_callers" onclick=" buy_caller_modal_func(<?php echo $sublist->subscriber_id;?>)">
																							<i class="fa-solid fa-cart-plus fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Buy More Callers"></i>
																						</a>
																					<?php }?>
																						<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_subscription_history" onclick="view_history_func(<?php echo $sublist->subscriber_id;?>)">
																							<i class="fa-solid fa-clock-rotate-left fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="History"></i>
																						</a>
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
																		<input type="hidden" id="package_id_fill" name="package_id_fill" value="<?php echo $package_id_fill ?? ''; ?>">
																		<input type="hidden" id="subscriber_status_fill" name="subscriber_status_fill" value="<?php echo $subscriber_status_fill ?? ''; ?>">
																		<input type="hidden" id="dt_fill_select_value" name="dt_fill_select_value" value="<?php echo $dt_fill ?? ''; ?>">
																		<input type="hidden" id="from_date_fillter_textbox" name="from_date_fillter_textbox" value="<?php echo $from_date_fillter ?? ''; ?>">
																		<input type="hidden" id="to_date_fillter_textbox" name="to_date_fillter_textbox" value="<?php echo $to_date_fillter ?? ''; ?>">																																			
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
						<label class="badge badge-danger text-white fs-3 fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Available Callers Count">09</label>
						<label class="text-black fs-3 fw-bold">/</label>
						<label class="badge badge-info text-white fs-3 fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Total Callers Count">10</label>
					</h1>
				</div>
				<div class="d-flex align-items-center justify-content-end">
									<div class="form-check mt-4">
										<input class="form-check-input" type="checkbox" checked />
										<label class="form-check-label fw-semibold fs-6 text-black">Manager</label>
									</div>
								</div>
				<div class="row">
					<div class="col-lg-3">
										<label class="col-form-label required fw-semibold fs-6">Packages</label>
										<div class="fv-row">
											<select class="form-select form-select-solid text-dark" data-control="select2" data-hide-search="false"  data-dropdown-parent="#kt_modal_add_callers">
												<option value="">Select Packages</option>
												<option value="1">Silver Packages - 1 Month</option>
												<option value="2">Gold Packages - 6 Months</option>
											</select>
										</div>
										<div class="fv-plugins-message-container invalid-feedback" id=""></div>
									</div>
					<div class="col-lg-3">
						<label class="col-form-label required fw-semibold fs-6">First Name</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter First Name" value="">
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<div class="col-lg-3">
						<label class="col-form-label required fw-semibold fs-6">Last Name</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Last Name" value="">
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<div class="col-lg-3">
										<label class="col-form-label required fw-semibold fs-6">Department</label>
										<div class="fv-row">
											<select class="form-select form-select-solid text-dark" data-control="select2" data-hide-search="false"  data-dropdown-parent="#kt_modal_add_callers" >
												<option value="">Select Department</option>
												<option value="1">Sales</option>
												<option value="2">Production</option>
												<option value="3">Accounts</option>
												<option value="4">Finance</option>
												<option value="5">Human Resources</option>
												<option value="6">Internal Support</option>
												<option value="7">Others</option>
											</select>
										</div>
										<div class="fv-plugins-message-container invalid-feedback" id=""></div>
									</div>
					<div class="col-lg-3">
						<label class="col-form-label required fw-semibold fs-6">Mobile No</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Mobile No" value="">
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<div class="col-lg-6">
										<label class="col-form-label fw-semibold fs-6">Description</label>
										<textarea class="form-control form-control-solid" rows="1" placeholder="Enter Description">-</textarea>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<div class="col-lg-3 text-center mt-3">
										<div class="image-input image-input-outline" data-kt-image-input="true" >
											<div class="image-input-wrapper w-100px h-100px" style="background-image: url('<?php echo base_url()?>assets/Images/member_1.png')"></div>
											<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="fa-solid fa-pen fs-7 text-black"></i>
												<input type="file" name="upload[logo]" id="logo" accept=".png, .jpg, .jpeg" value="">
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
									<a href="javascript:;" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Create Callers</a>
								</div>
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
	                <div class="text-center">
	                    <h1 class="mb-3">
	                    	<label>Update Callers</label>
	                    	<label class="me-1 ms-1">-</label>
	                    	<label class="badge badge-warning text-black fw-bold fs-2">Silver Package - 1 Month</label>
	                    </h1>
	                </div>
	                <div class="d-flex align-items-center justify-content-end">
										<div class="form-check">
										    <input class="form-check-input" type="checkbox" checked />
										    <label class="form-check-label fw-semibold fs-6 text-black">Manager</label>
										</div>
									</div>
	                <div class="row">
	                	<div class="col-lg-3">
	                		<label class="col-form-label required fw-semibold fs-6">First Name</label>
	                		<div class="fv-row">
	                			<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter First Name" value="Selva">
	                			<div class="fv-plugins-message-container invalid-feedback"></div>
	                		</div>
	                	</div>
	                	<div class="col-lg-3">
	                		<label class="col-form-label required fw-semibold fs-6">Last Name</label>
	                		<div class="fv-row">
	                			<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Last Name" value="Kumar D">
	                			<div class="fv-plugins-message-container invalid-feedback"></div>
	                		</div>
	                	</div>
	                	<div class="col-lg-3">
	                		<label class="col-form-label required fw-semibold fs-6">Department</label>
	                		<div class="fv-row">
												<select class="form-select form-select-solid text-dark" data-control="select2" data-hide-search="false"  data-dropdown-parent="#kt_modal_edit_callers" >
													<option value="">Select Department</option>
													<option value="1" selected>Sales</option>
													<option value="2">Production</option>
													<option value="3">Accounts</option>
													<option value="4">Finance</option>
													<option value="5">Human Resources</option>
													<option value="6">Internal Support</option>
													<option value="7">Others</option>
												</select>
											</div>
	                	</div>
	                	<div class="col-lg-3">
	                		<label class="col-form-label fw-semibold fs-6">Mobile No</label>
	                		<div class="fv-row">
	                			<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Mobile No" value="9790464324" disabled>
	                			<div class="fv-plugins-message-container invalid-feedback"></div>
	                		</div>
	                	</div>
	                	<div class="col-lg-6">
											<label class="col-form-label fw-semibold fs-6">Description</label>
											<textarea class="form-control form-control-solid" rows="1" placeholder="Enter Description">-</textarea>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<div class="col-lg-3 text-center mt-3">
											<div class="image-input image-input-outline" data-kt-image-input="true" >
												<div class="image-input-wrapper w-100px h-100px" style="background-image: url('<?php echo base_url()?>assets/Images/member_1.png')"></div>
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="fa-solid fa-pen fs-7 text-black"></i>
													<input type="file" name="upload[logo]" id="logo" accept=".png, .jpg, .jpeg" value="">
													<input type="hidden" name="edit_id" value="">
													<input type="hidden" name="old_logo" value="">
													<input type="hidden" name="avatar_remove">
												</label>
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
												<i class="fa-solid fa-x fs-7 text-black"></i>
												</span>
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
													<i class="fa-solid fa-x fs-7 text-black"></i>
												</span>
											</div>
											<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
										</div>
	                </div>
	                <div class="d-flex align-items-center justify-content-end mt-4">
										<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
										<a href="javascript:;" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Update Callers</a>
									</div>
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
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Manage_callers/buy_more_caller" id="add_more_caller_form">
					<div class="row mb-2">
						<div class="col-lg-6">
							<input type="hidden" name="subscriber_id_buy" id="subscriber_id_buy">
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Subscriber</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold" id="subscriber_name">Abdul Nizamuddin M</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Company</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold" id="company_name_buy">Spacedot Private Limited</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Mobile No</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold" id="phn_buy">9685747485</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Email ID</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold" id="email_buy">abdulnizamuddinm@gmail.com</label>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Package</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold" id="packg_buy">Silver Package</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">No. of Callers / Duration</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<div class="col-6 fs-5 fw-bold">
									<label class="badge badge-warning text-black fs-6 fw-bold" id="no_of_caller_buy">10</label>
									<label class="fs-5 fw-bold ms-1 me-1">/</label>
									<label class="fs-5 fw-bold" id="duration_buy">1 Month</label>
								</div>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Start / End Date</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<div class="col-6 fs-5 fw-bold">
									<label class="badge badge-success text-white fs-6 fw-bold" id="start_date_buy">28-Sep-2024</label>
									<label class="fs-5 fw-bold text-black">/</label>
									<label class="badge badge-danger text-white fs-6 fw-bold" id="end_date_buy">27-Oct-2024</label>
								</div>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Renewal Days</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<div class="col-6 fs-5 fw-bold">
									<label class="badge badge-warning text-black fs-6 fw-bold" id="renewal_days_buy">30 Days</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label class="col-form-label required fw-semibold fs-6">No.of Additional Callers</label>
							<div class="fv-row">
								<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter No.of Additional Callers" value="5" name="add_more_caller" id="add_more_caller" oninput="this.value = this.value.replace(/[^0-9]/g, ''); cal_per_caller_amt(this.value);"  >
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<input type="hidden" id="total_caller_hidden">
						<input type="hidden" id="per_caller_rate">
						<div class="col-lg-3">
							<label class="col-form-label fw-semibold fs-6">End Date</label>
							<div class="fv-row">
								<input type="text" class="form-control form-control-lg_1 form-control-solid" value="27-Oct-2024" name="end_date_add" id="end_date_add" disabled>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						</div>
						<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
						<label class="fw-bold fs-3 me-13">Sub Total</label>
						<div class="fw-bold fs-2">
							<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
							<label class="fs-2" id="sub_amount_buy" >1,250</label>
							<input type="hidden" name="sub_amount_buy" id="sub_amount_buy_hidden">
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
						<div class="fw-bold fs-3 me-13">GST(<?php echo get_general_settings()->gst_percentage ?? 18; ?>  %)
							<div class="d-block fs-8 text-center">[Exclusive]</div>
							<input type="hidden" name="gst_per_buy" id="gst_per_buy" value="<?php echo get_general_settings()->gst_percentage ?? 18; ?>">
						</div>
						<div class="fw-bold fs-2">
							<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
							<label class="fs-2" id="gst_amount_buy">225</label>
							<input type="hidden" name="gst_amount_buy" id="gst_amount_buy_hidden">
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
						<label class="fw-bold fs-2 me-13">Grand Total</label>
						<div class="fw-bold fs-2">
							<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
							<label class="fs-2" id="total_amount_buy">1,475</label>
							<input type="hidden" name="total_amount_buy" id="total_amount_buy_hidden">
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-end mt-8">
						<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
						<button type="button" id="submit_add_caller" onclick="buy_caller_validation();"  class="btn btn-sm btn-primary" >Pay Now</button>
					</div>
				</form>
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
					<div class="text-center">
						<h1 class="mb-6">Subscription History</h1>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Package</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">Silver Package</label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Duration</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold">1 Month</label>
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
											<label>28-Sep-2024</label>
											<div class="d-block">
												<label class="badge badge-warning text-black fs-7"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Days">30 Days</label>
											</div>
										</td>
										<td class="text-center">
											<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Purchased Caller Count">10</label>
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
					<div id="sub_history_view"></div>
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
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Manage_callers/renew_subscriber" id="renewal_caller_form">
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
							<label class="col-6 fs-5 fw-bold" id="subscriber_name_renew"></label>
						</div>
						<div class="row mb-2">
							<label class="col-5 fs-6 fw-semibold">Company</label>
							<label class="col-1 fs-6 fw-bold">:</label>
							<label class="col-6 fs-5 fw-bold" id="company_name_renew"></label>
						</div>
						<div class="row mb-2">
							<label class="col-5 fs-6 fw-semibold">Mobile No</label>
							<label class="col-1 fs-6 fw-bold">:</label>
							<label class="col-6 fs-5 fw-bold" id="phn_renew"></label>
						</div>
						<div class="row mb-2">
							<label class="col-5 fs-6 fw-semibold">Email ID</label>
							<label class="col-1 fs-6 fw-bold">:</label>
							<label class="col-6 fs-5 fw-bold" id="email_renew"></label>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row mb-2">
							<label class="col-5 fs-6 fw-semibold">Package</label>
							<label class="col-1 fs-6 fw-bold">:</label>
							<label class="col-6 fs-5 fw-bold" id="packg_renew"></label>
						</div>
						<div class="row mb-2">
							<label class="col-5 fs-6 fw-semibold">No. of Callers / Duration</label>
							<label class="col-1 fs-6 fw-bold">:</label>
							<div class="col-6 fs-5 fw-bold">
								<label class="badge badge-warning text-black fs-6 fw-bold" id="no_of_caller_renew"></label>
								<label class="fs-5 fw-bold ms-1 me-1">/</label>
								<label class="fs-5 fw-bold" id="duration_renew"></label>
							</div>
						</div>
						<div class="row mb-2">
							<label class="col-5 fs-6 fw-semibold">Start / End Date</label>
							<label class="col-1 fs-6 fw-bold">:</label>
							<div class="col-6 fs-5 fw-bold">
								<label class="badge badge-success text-white fs-6 fw-bold" id="start_date_renew">15-Mar-2024</label>
								<label class="fs-5 fw-bold text-black">/</label>
								<label class="badge badge-danger text-white fs-6 fw-bold" id="end_date_renew">14-Sep-2024</label>
							</div>
						</div>
						<div class="row mb-2">
							<label class="col-5 fs-6 fw-semibold">Renewal Days</label>
							<label class="col-1 fs-6 fw-bold">:</label>
							<div class="col-6 fs-5 fw-bold">
								<label class="badge badge-warning text-black fs-6 fw-bold" id="renewal_days_renew">0 Days</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<label class="col-form-label fw-semibold fs-6">Package</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Package" value="" id="renew_package_name" value="renew_package_name"  disabled>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
									<div class="col-lg-3">
						<label class="col-form-label required fw-semibold fs-6">No.of Callers</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter No.of Callers" value="" id="renew_add_more_caller" name="renew_add_more_caller">
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<?php
						$monday = strtotime("last sunday");
						$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
						$sunday = strtotime(date("d-m-Y",$monday)." +6 days");
						$this_week_start = date("d-m-Y",$monday);
						$this_week_end = date("d-m-Y",$sunday);
						// echo "$this_week_start to $this_week_end ";
						
						?>
					<div class="col-lg-3">
						<label class="col-form-label fw-semibold fs-6">Start Date</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" value="<?php echo date("d-M-Y"); ?>" id="renew_start_date" disabled>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<div class="col-lg-3">
						<label class="col-form-label fw-semibold fs-6">End Date</label>
						<div class="fv-row">
							<input type="text" class="form-control form-control-lg_1 form-control-solid" value="" id="renew_end_date" disabled>
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
						<button type="button" class="btn btn-sm btn-primary" id="submit_renew_caller" onclick="renew_caller_validation()">Pay Now</button>
					</div>
				</div>
				</form>
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
								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/Images/member_1.png')">
									<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url();?>assets/Images/member_1.png')"></div>
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
	      <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
	        <div class="swal2-icon-content">?</div>
	      </div>
	      <div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to Deactive Callers ?
	        <div class="d-block fw-bold fs-5 py-2">
	          <label>Selva Kumar D</label>
	          <label class="me-1 ms-1">-</label>
	          <label>9790464324</label>
	        </div>
	      </div>
	      <div class="d-flex justify-content-center align-items-center pt-8">
	        <button type="submit" class="btn btn-sm btn-primary me-3" data-bs-dismiss="modal">Yes</button>
	        <button type="reset" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
	      </div><br><br>
	    </div>
	    <!--end::Modal content-->
	  </div>
	  <!--end::Modal dialog-->
	</div>
	<!--end::Modal - Deactive Callers-->

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

		<!-- date format -->
		<script>
			function formatDate(dateString) {
				// Parse the input date string into a Date object
				const date = new Date(dateString);

				// Define an array of month abbreviations
				const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

				// Extract the day, month, and year
				const day = date.getDate(); // Day of the month (1-31)
				const month = months[date.getMonth()]; // Month name from the array
				const year = date.getFullYear(); // Full year (e.g., 2024)

				// Return the formatted date string
				return `${day}-${month}-${year}`;
			}
		</script>
		<!-- buy more caller start -->
		<script>
			var baseurl = '<?php echo base_url(); ?>';
			function buy_caller_modal_func(id){

				$.ajax({
					type: "POST",
					url: baseurl + 'Manage_callers/get_subscriber_by_id',
					data: {
						id: id  // Corrected: Using the correct 'id' parameter
					},
					dataType: "json",  // Corrected: Expecting a JSON response, not HTML
					success: function(response) {
						if (response) {
							console.log(response)
							var duration =response.duration=="1" ?response.period+" Month": (response.duration=="2" ? response.period+" Year" :"Life Time")
							$('#subscriber_id_buy').val(response.subscriber_id);
							$('#subscriber_name').text(response.name);
							$('#company_name_buy').text(response.company_name);
							$('#phn_buy').text(response.mobile_no);
							$('#email_buy').text(response.email_id);
							$('#no_of_caller_buy').text(response.no_of_callers);
							$('#packg_buy').text(response.package_name);
							$('#start_date_buy').text(formatDate(response.start_date));
							$('#end_date_buy').text(formatDate(response.end_date));
							$('#renewal_days_buy').text(response.renewal_days_count + " Days" );
							$('#duration_buy').text(duration );
							$('#end_date_add').val(formatDate(response.end_date));
							var gst_per = $('#gst_per_buy').val(); 
							var add_caller = $('#add_more_caller').val(); 

							var no_of_caller=response.no_of_callers;

							var amount=response.package_amount;
							var per_caller_amount = amount/no_of_caller;
							var total_caller_amount =per_caller_amount*add_caller ;
							$('#total_caller_hidden').val(no_of_caller);
							$('#per_caller_rate').val(per_caller_amount);
							gst_calculation(total_caller_amount, gst_per)
							
						} else {
							console.error('Invalid response received');
						}
					},
					error: function(xhr, status, error) {
						console.error('AJAX error:', status, error);
					}
				});

			}

			function buy_caller_validation () {
				$("#submit_add_caller").prop('disabled', true);
				let err = 0;
				var no_of_caller = $('#add_more_caller').val();
				// var duration = $('#sub_last_name').val();
			
				
				$('#add_more_caller').siblings('.invalid-feedback').text('').show();

				// Initialize error flag
				let hasError = false;
				if (no_of_caller === '') {
					$('#add_more_caller').siblings('.invalid-feedback').text('No.of Callers is Required.').show();
					hasError = true;
				}
				if (no_of_caller === '0' ) {
					$('#add_more_caller').siblings('.invalid-feedback').text('No.of Callers is Required.').show();
					hasError = true;
				}
				// If there are errors, return false immediately
				if (hasError) {
					$("#submit_add_caller").prop('disabled', false);
					return false;
				}
				else{
					$("#submit_add_caller").prop('disabled', true);
					// return false;
					$('#add_more_caller_form').submit();
				}
			}
		</script>
		
		<!-- gst calculation -->
		<script>
			function gst_calculation(amount, gst_per) {
				// Ensure that 'amount' is a valid number
				amount = parseFloat(amount);  // Convert to float (or use Number(amount) if preferred)
				gst_per = parseFloat(gst_per); // Ensure gst_per is also a number

				if (isNaN(amount) || isNaN(gst_per)) {
					console.error("Invalid input: amount and gst_per must be numbers.");
					return;  // Exit if the input is invalid
				}

				// Calculate GST amount
				const gst_amount = (amount * gst_per) / 100;
				const total_amount = amount + gst_amount;

				// Update the DOM with the calculated values
				$('#sub_amount_buy').text(amount.toFixed(2));          // Display the original amount
				$('#sub_amount_buy_hidden').val(amount.toFixed(2));                // Display the original amount
				$('#gst_per_buy').val(gst_per.toFixed(2));                  // Display the GST percentage
				$('#gst_amount_buy').text(gst_amount.toFixed(2));     // Display the GST amount
				$('#gst_amount_buy_hidden').val(gst_amount.toFixed(2));           // Display the GST amount
				$('#total_amount_buy').text(total_amount.toFixed(2)); // Display the total amount (including GST)
				$('#total_amount_buy_hidden').val(total_amount.toFixed(2));       // Display the total amount (including GST)
			}
		</script>

		<script>
			function cal_per_caller_amt(no_of_caller) {

				var add_caller =no_of_caller ? no_of_caller : 0;
				var no_of_caller=$('#total_caller_hidden').val();
				var per_caller_amount=$('#per_caller_rate').val();
				const gst_per = parseFloat($('#gst_per_buy').val());
				const amount = per_caller_amount*add_caller; 

				// Pass the per-caller amount to GST calculation
				gst_calculation(amount, gst_per);
			}
		</script>

		<!-- renewal  -->
		<script>
			var baseurl = '<?php echo base_url(); ?>';
			function renew_caller_modal_func(id){

				$.ajax({
					type: "POST",
					url: baseurl + 'Manage_callers/get_subscriber_by_id',
					data: {
						id: id  // Corrected: Using the correct 'id' parameter
					},
					dataType: "json",  // Corrected: Expecting a JSON response, not HTML
					success: function(response) {
						if (response) {
							console.log(response)
							var duration =response.duration=="1" ?response.period+" Month": (response.duration=="2" ? response.period+" Year" :"Life Time")
							$('#subscriber_id_renew').val(response.subscriber_id);
							$('#subscriber_name_renew').text(response.name);
							$('#company_name_renew').text(response.sub_company_name);
							$('#phn_renew').text(response.mobile_no);
							$('#email_renew').text(response.email_id);
							$('#no_of_caller_renew').text(response.no_of_callers);
							$('#renew_add_more_caller').val(response.no_of_callers);
							$('#packg_renew').text(response.package_name);
							$('#renew_package_name').val(response.package_name);
							$('#start_date_renew').text(formatDate(response.start_date));
							$('#end_date_renew').text(formatDate(response.end_date));
							$('#renewal_days_renew').text(response.renewal_days_count + " Days" );
							$('#duration_renew').text(duration );
							$('#end_date_renew').val(formatDate(response.end_date));
							var gst_per = $('#gst_per_renew').val(); 
							var add_caller = $('#renewal_caller').val(); 

							var no_of_caller=$('#renew_add_more_caller').val();
							
							$('#renew_end_date').val(formatDate(response.renewal_end_date));
							var amount=response.package_amount;
							var per_caller_amount = amount/no_of_caller;
							var total_caller_amount =per_caller_amount*add_caller ;
							$('#total_caller_hidden_renew').val(no_of_caller);
							$('#per_caller_rate_renew').val(per_caller_amount);
							gst_calculation(total_caller_amount, gst_per)
							
						} else {
							console.error('Invalid response received');
						}
					},
					error: function(xhr, status, error) {
						console.error('AJAX error:', status, error);
					}
				});

			}

			function renew_caller_validation () {
				$("#submit_renew_caller").prop('disabled', true);
				let err = 0;
				var no_of_caller = $('#renew_add_more_caller').val();
				// var duration = $('#sub_last_name').val();
			
				
				$('#renew_add_more_caller').siblings('.invalid-feedback').text('').show();

				// Initialize error flag
				let hasError = false;
				if (no_of_caller === '') {
					$('#renew_add_more_caller').siblings('.invalid-feedback').text('No.of Callers is Required.').show();
					hasError = true;
				}
				if (no_of_caller === '0' ) {
					$('#renew_add_more_caller').siblings('.invalid-feedback').text('No.of Callers is Required.').show();
					hasError = true;
				}
				// If there are errors, return false immediately
				if (hasError) {
					$("#submit_renew_caller").prop('disabled', false);
					return false;
				}
				else{
					$("#submit_renew_caller").prop('disabled', true);
					// return false;
					$('#renewal_caller_form').submit();
				}
			}
		</script>

		 <!-- view history -->
		<script>
			function view_history_func(val) {
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>Manage_callers/get_subscriber_history_view',
					data: {
						id: val
					},
					dataType: "html",
					success: function(response) {
						if (response) {
							$('#sub_history_view').empty().append(response);
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
<!-- pagination -->
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
			


	</body>
	<!--end::Body-->
</html>
