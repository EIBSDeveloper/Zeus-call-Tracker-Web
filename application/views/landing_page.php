<?php $this->load->view("common.php"); ?>
<style>
	body {
        background-image: url('<?php echo base_url()?>assets/Images/landing_page_logo_3.jpg');
    }
	.login_own {
/*	    background: rgba(255, 255, 255, 0.19);*/
	    background: rgb(0 0 0 / 35%);
	    border-radius: 16px;
	    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
	    backdrop-filter: blur(10px);
	    -webkit-backdrop-filter: blur(2.5px);
	    border: 1px solid rgba(255, 255, 255, 0.3);
	  }

	  .cross_symbol {
		  del {
		    text-decoration: none;
		    position: relative;
		    &:before {
		      content: " ";
		      width: 100%;
		      border-top: 1px solid #252f4a;
		      height: 4px;
		      position: absolute;
		      bottom: 6px;
/*		      top: 20%;*/
		      left: 0;
		      transform: rotate(-11deg);
		    }
		    &:after {
		      content: " ";
		      display: block;
		      width: 100%;
		      border-top: 1px solid #252f4a;
		      height: 4px;
		      position: absolute;
		      bottom: 6px;
/*		      top: 20%;*/
		      left: 0;
		      transform: rotate(11deg);
		    }
		  }
		}
 

</style>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled auth-bg bgi-size-cover bgi-position-center">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; 
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
				<div class="wrapper d-flex flex-column flex-row-fluid pt-0" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex bg-cover flex-column flex-column-fluid py-0" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<div class="row g-0 g-xl-0 mb-0 mb-xl-0">
								<!--begin::Col-->
								<div class="col-xxl-12">
									<div class="card bg-transparent border-0 shadow-none">
										<div class="card-body mt-0 pb-0 mb-0 px-6">
											<div class="d-flex flex-center">
												<a href="javascript:;" class="text-center">
									                <img alt="Logo" src="<?php echo base_url();?>assets/Images/logo_bg.png" class="w-250px h-120px me-2">
									            </a>
											</div>
											<div class="d-flex flex-center">
												<h1 class="fw-bold text-white fs-2hx text-center py-4 pt-4">Choose Your Packages</h1>
											</div>
											<div class="d-flex justify-content-lg-between justify-content-center flex-wrap h-100">
												<!-- <div class="row"> -->
												<?php foreach ($package_list as $i => $pcklist) { ?>
													<?php 
														$duration = $pcklist->duration == '3'? 'Life Time':( $pcklist->duration == '1' ? 'Month':'Year')
													?>
													<!-- <div class="col-lg-4 mb-3"> -->
														<div class="card h-auto login_own w-lg-350px w-300px shadow ribbon ribbon-top ribbon-clip mb-3">
															<?php if($pcklist->offer_check == '1'){?>
															<div class="ribbon-label bg-info text-black fw-bold px-2 py-0">
																<label class="fs-5 fw-bold mb-1 text-center text-white">
																	<span class="fs-6">Discount</span><br>
																	<span class="fw-bold"><?php echo ($pcklist->percentage);?>%</span>
																</label>
															</div>
															<?php }?>
															<div class="card-body px-6 py-3">
																<div class="row mt-8 mb-2">
																	<div class="col-12 text-center">
																		<label class="fs-1 fw-bold mb-1 text-white"><?php echo ($pcklist->package_name);?></label>
																	</div>
																</div>
																<div class="d-flex align-items-center justify-content-center mb-1">
																	<div class="fs-2 fw-bold text-white rounded px-3 py-1" style="background-color:#FF7F00 !important;">
																		<label>
																			<span><i class="fa-solid fa-indian-rupee-sign fs-3 text-white"></i></span>
																			<span><?php echo IND_money_format($pcklist->package_amount);?></span>
																		</label>
																		<label class="me-1 ms-1">/</label>
																		<label><?php echo $pcklist->duration == '3'? ' '.$duration: $pcklist->period .' '.$duration ?></label>
																		<?php if($pcklist->offer_check == '1'){?>
																		<div class="d-block fs-4 fw-bold text-white text-center" >
																			<!-- <label>
																				<del class="text-black" ><span><i class="fa-solid fa-indian-rupee-sign fs-5 text-white"></i></span>
																				<span class="text-white">< ?php echo IND_money_format($pcklist->amount);?></span></del>
																			</label> -->
																			<label class="cross_symbol">
																				<del><span><i class="fa-solid fa-indian-rupee-sign fs-5 text-white"></i></span>
																				<span class="text-white"><?php echo IND_money_format($pcklist->amount);?></span></del>
																			</label>
																		</div>
																		<?php }?>
																	</div>
																</div>
																<?php foreach ($pcklist->descriptions_arr as $i => $desclist) { ?> 
																<div class="row">
																	<div class="col-10 d-flex flex-column mb-2">
																		<li class="d-flex align-items-center py-2">
																			<label class="bullet bullet-vertical h-20px w-5px bg-primary me-3" style="background-color:#FF7F00 !important;"></label>
																			<label class="fw-bold text-white"><?php echo $desclist['description'] ?></label>
																		</li>
																	</div>
																	<div class="col-2 mb-2 d-flex align-items-center justify-content-center">
																		<div class="fs-8 fw-bold mb-1" title="">
																		<?php if($desclist['yes_no'] == '1'){?>
																			 <i class="fa-solid fa-check text-success fs-3 fw-bold"></i>
																			 <?php } else{?>
																				<i class="fa-solid fa-xmark text-danger fs-3 fw-bold"></i>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<?php }?>
															</div>
															<div class="d-flex justify-content-center align-items-end bottom-0 position-relative mb-4	">
																<button href="javascript:;" class="btn btn-sm btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#kt_modal_purchase_package" onclick="purchase_package('<?php echo $pcklist->package_id; ?>')">
																	<span class="me-2"><i class="fa-solid fa-cart-shopping fs-4"></i></span>
																	<span class="fs-5">Purchase</span>
																</button>
															</div>
														</div>
													<!-- </div> -->
													<?php }?>
												<!-- </div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!-- < ?php $this->load->view("footer.php"); ?> -->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-white order-2 order-md-1">
								<span class="text-white fw-semibold me-1"><?php echo date("Y");?> &copy;</span>
								<a href="javascript:;" class="text-white fw-semibold me-2 fs-6">Zeus Call Tracker Powered By EiBS</a>
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

	<!--begin::Modal - Purchase Package-->
	<div class="modal fade" id="kt_modal_purchase_package" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static" data-bs-focus="false">
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
					<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Landing_page/purchase_package" id="purchase_form">
						<div class="text-center">
							<h1 class="mb-6">Purchase Package</h1>
						</div>
						<input type="hidden" id="package_hidden_id" name="package_hidden_id">
						<div class="d-flex justify-content-center align-items-center flex-lg-row flex-column gap-2 flex-wrap mb-1">
							<div class="border border-dashed border-danger rounded text-center fw-bold px-8 py-2 mb-1 gap-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Package">
								<div class="text-black text-center fs-3 mb-1" id="package_name_label">Silver Package</div>
								<div class="d-block">
									<div class="badge bg-info rounded fw-bold fs-7 text-white mb-0">
										<span class="me-1"><i class="fa-solid fa-indian-rupee-sign fs-4 text-white"></i></span>
										<span class="fs-2" id="package_amount_label">250</span>
										<span class="fs-3 ms-1">/ <span id="duration_label">1 Month</span> </span>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-6">
							<div class="col-lg-4">
								<label class="col-form-label required fw-semibold fs-6">Company</label>
								<div class="fv-row">
									<input type="hidden" name="user_id_hidden" id="user_id_hidden" value="<?php echo $subscriber_details->user_id?>">
									<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Company Name" id="company_name" name="company_name" value="<?php echo $subscriber_details->company_name?>" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label required fw-semibold fs-6">First Name</label>
								<div class="fv-row">
									<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter First Name" name="sub_first_name" id="sub_first_name" value="<?php echo $subscriber_details->name?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label fw-semibold fs-6">Last Name</label>
								<div class="fv-row">
									<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Last Name" name="sub_last_name" id="sub_last_name" value="<?php echo $subscriber_details->nick_name?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label required fw-semibold fs-6">Email ID</label>
								<div class="fv-row">
									<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Email ID" name="email_id" id="email_id" value="<?php echo $subscriber_details->email_id?>" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._-]/g, '')">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label required fw-semibold fs-6">Mobile No</label>
								<div class="fv-row">
									<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Mobile No" value="<?php echo $subscriber_details->phone_no?>" name="mobile_no" id="mobile_no" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10)" readonly>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label required fw-semibold fs-6">No.of Callers</label>
								<input type="hidden" name="package_amount_hidden" id="package_amount_hidden">
								<div class="fv-row">
									<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter No.of Callers" name="no_of_callers" id="no_of_caller"  value="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); cal_per_caller_amt(this.value);">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
							<label class="fw-bold fs-3 me-13">Sub Total</label>
							<div class="fw-bold fs-2">
								<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
								<label class="fs-2" id="sub_total_label">2,500</label>
								<input type="hidden" id="sub_total" name="sub_total">
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
							<div class="fw-bold fs-3 me-13">GST(<?php echo get_general_settings()->gst_percentage ?? 18; ?> %)
								<div class="d-block fs-8 text-center">[Exclusive]</div>
							</div>
							<input type="hidden" id="gst_per" name="gst_per" value="<?php echo get_general_settings()->gst_percentage ?? 18; ?>">
							<div class="fw-bold fs-2">
								<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
								<label class="fs-2" id="gst_amount_label">450</label>
								<input type="hidden" id="gst_amount" name="gst_amount">
							</div>

						</div>
						<div class="d-flex align-items-center justify-content-end mb-2 gap-5">
							<label class="fw-bold fs-2 me-13">Grand Total</label>
							<div class="fw-bold fs-2">
								<label><i class="fa-solid fa-indian-rupee-sign fs-4 text-black"></i></label>
								<label class="fs-2" id="total_amount_label">2,950</label>
								<input type="hidden" id="total_amount" name="total_amount">
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-end gap-3 mt-13">
							<a href="javascript:;" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</a>
							<!-- <a href="<?php echo base_url(); ?>Landing_page/payment_failure" class="btn btn-sm btn-primary">Payment Failure</a> -->
							<!-- <a href="< ?php echo base_url(); ?>Landing_page/payment_success" class="btn btn-sm btn-primary">Pay Now</a> -->
							<button type="button" id="btnSubmit_pay" class="btn btn-sm btn-primary" onclick="purchase_validation()">Pay Now</button>
						</div>
					</form>
	            </div>
	        </div>
	        <!--end::Modal dialog-->
	    </div>
	</div>
	<!--end::Modal - Purchase Package-->

		<?php $this->load->view("script.php"); ?>
<!-- purchase script -->
<script>
	var baseurl = '<?php echo base_url(); ?>';

	function purchase_package(id) {
		
		$.ajax({
			type: "POST",
			url: baseurl + 'Landing_page/purchase_by_id',
			data: {
				id: id  // Corrected: Using the correct 'id' parameter
			},
			dataType: "json",  // Corrected: Expecting a JSON response, not HTML
			success: function(response) {
				if (response) {

					var duration =response.duration=="1" ?response.period+" Month": (response.duration=="2" ? response.period+" Year" :"Life Time")
					$('#package_name_label').text(response.package_name);
					$('#package_amount_label').text(response.package_amount);
					$('#package_amount_hidden').val(response.package_amount);
					$('#package_hidden_id').val(response.package_id);
					$('#duration_label').text(duration );
					var gst_per =   $('#gst_per').val(); 


					var no_of_caller= $('#no_of_caller').val();

					var amount=response.package_amount;
					var total_caller_amount =amount*no_of_caller ;

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


</script>

<script>
		function cal_per_caller_amt(no_of_caller) {

			var add_caller =no_of_caller ? no_of_caller : 0;
			var per_caller_amount=$('#package_amount_hidden').val();
			const gst_per = parseFloat($('#gst_per').val());
			const amount = per_caller_amount*add_caller; 

			// Pass the per-caller amount to GST calculation
			gst_calculation(amount, gst_per);
		}
	</script>

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
        $('#sub_total_label').text(amount.toFixed(2));          // Display the original amount
        $('#sub_total').val(amount.toFixed(2));                // Display the original amount
        $('#gst_per').val(gst_per.toFixed(2));                  // Display the GST percentage
        $('#gst_amount_label').text(gst_amount.toFixed(2));     // Display the GST amount
        $('#gst_amount').val(gst_amount.toFixed(2));           // Display the GST amount
        $('#total_amount_label').text(total_amount.toFixed(2)); // Display the total amount (including GST)
        $('#total_amount').val(total_amount.toFixed(2));       // Display the total amount (including GST)
    }
</script>

<script>
	function purchase_validation () {
				$("#btnSubmit_pay").prop('disabled', true);
				let err = 0;
				var company_name = $('#company_name').val();
				var sub_first_name = $('#sub_first_name').val();
				var sub_last_name = $('#sub_last_name').val();
				var email_id = $('#email_id').val();
				var mobile_no = $('#mobile_no').val();
				var no_of_caller = $('#no_of_caller').val();
				// var duration = $('#sub_last_name').val();
				
				// console.log(offer_chk)
				// Clear previous errors
				$('#company_name').siblings('.invalid-feedback').text('').show();
				$('#sub_first_name').siblings('.invalid-feedback').text('').show();
				$('#sub_last_name').siblings('.invalid-feedback').text('').show();
				$('#email_id').siblings('.invalid-feedback').text('').show();
				$('#no_of_caller').siblings('.invalid-feedback').text('').show();
				$('#mobile_no').siblings('.invalid-feedback').text('').show();

				// Initialize error flag
				let hasError = false;

				if (company_name === '') {
					$('#company_name').siblings('.invalid-feedback').text('Company Name is Required.').show();
					hasError = true;
				}

				if (sub_first_name === '') {
					$('#sub_first_name').siblings('.invalid-feedback').text('First Name is Required.').show();
					hasError = true;
				}
				

				if (email_id === '') {
					$('#email_id').siblings('.invalid-feedback').text('Email ID is Required.').show();
					hasError = true;
				}
				if (mobile_no === '') {
					$('#mobile_no').siblings('.invalid-feedback').text('Mobile No is Required.').show();
					hasError = true;
				}
				if (no_of_caller === '' || no_of_caller === '0') {
					$('#no_of_caller').siblings('.invalid-feedback').text('No.of Callers is Required.').show();
					hasError = true;
				}

				

				// If there are errors, return false immediately
				if (hasError) {
					$("#btnSubmit_pay").prop('disabled', false);
					return false;
				}
				else{
					$("#btnSubmit_pay").prop('disabled', true);
					// return false;
					$('#purchase_form').submit();
				}
			}
</script>

	</body>
	<!--end::Body-->
</html>
