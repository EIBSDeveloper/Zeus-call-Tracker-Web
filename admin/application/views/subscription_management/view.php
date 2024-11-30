
<?php $this->load->view("common.php"); ?>
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
<?php $common_date= get_general_settings()->date_format ?? 'd-M-Y'; ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { 
			if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
			} else { if ( localStorage.getItem("data-bs-theme") !== null ) { 
				themeMode = localStorage.getItem("data-bs-theme"); 
			} else { themeMode = defaultThemeMode; 

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
					<?php $this->load->view("header.php"); ?>
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
								<!--begin::Col-->
								<div class="col-xxl-12">
									<div class="card">
										<div class="card-header pt-5 border-bottom-0 align-items-center">
											<h3 class="card-title align-items-start flex-column">
												<div class="text-dark fw-bold mb-2 fs-3">
													<label>View Subscriber</label>
													<label class="me-1 ms-1">-</label>
													<?php if($view->status == 0){?>
													<div class="badge badge-success text-white fw-bold fs-4 rounded">Active Subscriber</div>
													<?php }else if($view->status == 1){?>
													<div class="badge badge-warning text-black fw-bold fs-4 rounded" style="background-color: #FF7F00 !important;">Blocked Subscriber</div>
													<?php }else if($view->status == 0){?>
													<div class="badge badge-danger text-white fw-bold fs-4 rounded"> Expired</div>
													<?php }?>
												</div>
												<div class="d-flex">
					                <a href="<?php echo base_url(); ?>Dashboard" class="d-flex align-items-center fw-semibold text-gray-500 fs-6 me-2">Home</a>
					                <div class="d-flex align-items-center me-2">
					                	<i class="fa-solid fa-chevron-right fs-7 text-gray-500"></i>
					                </div>
					                <a href="<?php echo base_url(); ?>Subscription_management" class="d-flex align-items-center fw-semibold text-gray-500 fs-6">Subscription Management</a>
										    </div>
											</h3>
											<div class="text-center">
												<label class="fw-bold fs-5"><?php echo $view->name; ?>  - <?php echo $view->mobile_no; ?></label>
												<div class="d-block">
													<label class="badge badge-primary fs-5 fw-bold text-white"><?php echo $view->company_name; ?></label>
													<label class="badge badge-danger fs-5 fw-bold text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Days"><?php echo renewal_days_count($view->subscriber_id)?> Days</label>
												</div>
											</div>
										</div>
										<ul class="nav nav-tabs nav-line-tabs fs-5 px-10 mt-2">
										    <li class="nav-item">
										        <a class="nav-link active text-black fw-bold" data-bs-toggle="tab" href="#kt_tab_view_subscriber_details">Subscriber Details</a>
										    </li>
										    <li class="nav-item">
										        <a class="nav-link text-black fw-bold"  href="<?php echo base_url(); ?>Subscription_management/view_payment/<?php echo $view->subscriber_id; ?>">Payment Details</a>
										    </li>
										</ul>
										<!--begin::Card body-->
										<div class="card-body">
											<div class="tab-content" id="view_content">
												<div class="tab-pane fade show active" id="kt_tab_view_subscriber_details" role="tabpanel">
														<?php
														$first_character = isset($view->name) && $view->name ? $view->name[0] : 'A';
														$str = strtoupper($first_character);

														$photo_url = base_url() . 'assets/Images/users/' . $view->image;
														$letter_url = base_url() . 'assets/Images/Letters/' . $str . '.png';
														$photo_path = FCPATH . 'assets/Images/users/' . $view->image;
														$letter_path = FCPATH . 'assets/Images/Letters/' . $str . '.png';
														?>
														<?php 
															$duration = $view->duration == '3'? 'Life Time':( $view->duration == '1' ? 'Month':'Year')
														?>
													<div class="row mb-4">
														<div class="col-lg-4">
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Created Date</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<label class="col-6 fs-5 fw-bold"><?php echo date($common_date,strtotime($view->created_at)) ?></label>
															</div>
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Subscriber</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<label class="col-6 fs-5 fw-bold"><?php echo $view->name; ?></label>
															</div>
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Company</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<label class="col-6 fs-5 fw-bold"><?php echo $view->company_name; ?></label>
															</div>
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Mobile No</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<label class="col-6 fs-5 fw-bold"><?php echo $view->mobile_no; ?></label>
															</div>
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Email ID</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<label class="col-6 fs-5 fw-bold"><?php echo $view->email_id; ?></label>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Package</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<label class="col-6 fs-5 fw-bold"><?php echo $view->package_name; ?></label>
															</div>
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Duration</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<label class="col-6 fs-5 fw-bold"><?php echo $view->duration == '3'? ' '.$duration: $view->period .' '.$duration ?></label>
															</div>
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">No. of Caller</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<div class="col-6 fs-5 fw-bold">
																	<label class="badge badge-warning text-black fs-6 fw-bold"><?php echo $view->no_of_callers; ?></label>
																</div>
															</div>
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Paid Amount</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<div class="col-6">
																	<label class="fs-5 fw-bold">
																		<i class="fa-solid fa-indian-rupee-sign fs-5 text-black"></i>
																	</label>
																	<label class="fs-5 fw-bold"><?php echo IND_money_format($view->amount);  ?></label>
																</div>
															</div>
															<div class="row mb-2">
																<label class="col-5 fs-6 fw-semibold">Start / End Date</label>
																<label class="col-1 fs-6 fw-bold">:</label>
																<div class="col-6 fs-5 fw-bold">
																	<label class="badge badge-success text-white fs-7 fw-bold"><?php echo date($common_date,strtotime($view->start_date)) ?></label>
																	<label class="text-black fs-6 fw-bold me-1 ms-1">|</label>
																	<label class="badge badge-danger text-white fs-7 fw-bold"><?php echo date($common_date,strtotime($view->end_date)) ?></label>
																</div>
															</div>
														</div>
														<div class="col-lg-2">
															<div class="row mb-2">
																<div class="col-12 fs-6 fw-semibold">
																	<div class="d-flex justify-content-center align-items-center">
																	<?php if (!empty($view->image) && file_exists($photo_path)) { ?>
																		<a class="d-block overlay text-center" href="<?php echo $photo_url; ?>" data-fslightbox="lightbox-basic">
																			<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-150px h-150px border border-gray-600 border-dashed" style="background-image:url('<?php echo $photo_url; ?>')" data-fslightbox="lightbox-basic">
																			</div>
																			<div class="overlay-layer card-rounded bg-dark bg-opacity-75 shadow w-150px h-150px">
																				<i class="fa-solid fa-eye text-white fs-2hx text-hover-success"></i>
																			</div>
																		</a>
																		<?php } else if (file_exists($letter_path)) { ?>
																			<a class="d-block overlay text-center" href="<?php echo $letter_url ?>" data-fslightbox="lightbox-basic">
																				<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-150px h-150px border border-gray-600 border-dashed" style="background-image:url('<?php echo $letter_url ?>')" data-fslightbox="lightbox-basic">
																				</div>
																				<div class="overlay-layer card-rounded bg-dark bg-opacity-75 shadow w-150px h-150px">
																					<i class="fa-solid fa-eye text-white fs-2hx text-hover-success"></i>
																				</div>
																			</a>
																		<?php } ?>
																	</div>
																</div>
															</div>
														 </div>
													</div>
												</div>
												<div class="tab-pane fade" id="kt_tab_view_payment_details" role="tabpanel">
													<div class="row">
														<div class="col-lg-12">
															<table class="table table-striped table-row-bordered gy-2 gs-7 list_page">
																<thead>
																	<tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
																		<th class="min-w-80px">Date</th>
																		<th class="min-w-150px">Package</th>
																		<th class="min-w-100px text-start">No.of Callers</th>
																		<th class="min-w-100px">Start / End Date</th>
																		<th class="min-w-100px">Paid Amount</th>
																		<th class="min-w-50px">Renewal Days</th>
																		<th class="min-w-100px">Status</th>
																	</tr>
																</thead>
																<tbody class="text-gray-800 fw-bold fs-7">
																	<tr>
																		<td>28-Sep-2024</td>
																		<td>
																			<label class="fs-7 text-black">Silver Package</label>
																			<label class="fs-7 text-black ms-1 me-1">/</label>
																			<label class="fs-7 text-black">1 Month</label>
																			<div class="d-block">
																				<label class="badge badge-info">
																					<span class="fs-8 text-black">
																						<i class="fa-solid fa-indian-rupee-sign fs-8 text-white me-1"></i>
																					</span>
																					<span class="fs-8 text-white">250</span>
																				</label>
																			</div>
																		</td>
																		<td class="text-start">10</td>
																		<td align="start">
																			<div class="badge badge-success fs-8">28-Sep-2024</div>
																			<div class="d-block mt-1">
																				<div class="badge badge-danger fs-8">27-Oct-2024</div>
																			</div>
																		</td>
																		<td align="right">
																			<div class="badge badge-info fw-semibold fs-7">
																			<label class="text-white me-1">
																				<i class="fa-solid fa-indian-rupee-sign fs-7 text-white"></i>
																			</label>
																			<label>2,500</label>
																			</div>
																		</td>
																		<td>
																			<div class="badge badge-warning text-black fw-semibold fs-7">30 Days</div>
																		</td>
																		<td>
																			<span class="fw-semibold fs-7 badge badge-warning text-black">New Purchased</span>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
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

		<?php $this->load->view("script.php"); ?>
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
