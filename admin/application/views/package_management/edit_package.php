 <!--begin::Heading-->
 	<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Package_management/update" id="package_form_edit">
	 <div class="text-center">
	                    <h1 class="mb-3">Update Package</h1>
	                </div>
	                <div class="row mb-1">
						<input type="hidden" id="package_edit_id" name="package_edit_id" value="<?php echo $edit->package_id?>">
	                	<div class="col-lg-6">
	                		<label class="col-form-label required fw-semibold fs-6">Package</label>
	                		<div class="fv-row">
									<input type="text" id="package_name_edit" name="package_name" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Package Name" value="<?php echo $edit->package_name?>">
									<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
	                	</div>
	                	<div class="col-lg-6">
							<label class="col-form-label required fw-semibold fs-6">Period</label>
							<div class="d-flex align-items-center">
								<div class="me-2" id="period_shw_add">
									<input type="text" class="form-control form-control-lg_1 form-control-solid" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter Value" value="<?php echo $edit->period ?? 0?>" id="period_input_tbox_edit" name="period_input_tbox_edit">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<div class="ms-2">
									<select class="form-select form-select-solid" data-width="200px" data-control="select2" data-dropdown-parent="#kt_modal_edit_package" id="period_tbox_edit" name="period_tbox_edit" onchange="period_func();">
									<option value="" >Select</option>
									<option value="1" <?php echo $edit->duration =='1' ? "selected": ''?>>Month</option>
									<option value="2"<?php echo $edit->duration =='2' ? "selected":''?>>Years</option>
									<option value="3"<?php echo $edit->duration =='3' ? "selected":""?>>Life Time</option>
									</select>
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
						</div>
	                	<div class="col-lg-4">
							<label class="col-form-label required fw-semibold fs-6">Amount</label>
							<div class="fv-row">
								<input type="text" id="amount_edit" name="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Amount" value="<?php echo $edit->amount?>">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
	                	<div class="col-lg-4 col-form-label">
							<label class="form-check form-check-inline form-check-solid is-invalid mb-3">
								<input class="form-check-input border border-gray-600 me-2" name="offers_chk_edit" value="<?php echo $edit->offer_check ?>" <?php echo $edit->offer_check == "1"?'checked':'' ?> type="checkbox" id="offers_chk_edit" onclick="package_func_edit();">
								<span class="fs-6 fw-semibold">Offer (%)</span>
								<span class="fs-6 fw-semibold text-danger" id="offer_dang_label_edit"></span>
							</label>
							<input type="text" class="form-control form-control-lg_1 form-control-solid" id="offer_tbox_edit" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); if (parseFloat(this.value) > 100) this.value = '100';" placeholder="Enter Offer Percentage" name="percentage" style="display:none;" value="<?php echo $edit->percentage ?>" />
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<div class="col-lg-4 mb-1 text-center">
							<label class="fs-3 fw-bold mb-1 mt-3">Total Amount</label>
							<div class="d-block align-items-center ">
								<label class="fs-3 fw-bold mb-1">
									<i class="fa-solid fa-indian-rupee-sign fs-4 text-success"></i>
								</label>
								<label class="fs-3 fw-bold mb-1 text-success" id="package_amount_label_edit"><?php echo IND_money_format($edit->package_amount) ?></label>
								<input type="hidden" id="package_amount_edit" name="package_amount" value="<?php echo $edit->package_amount; ?>">
							</div>
						</div>
	                </div>
						<?php 
						if (is_array($edit->descriptions_arr)) {
							$desc_count = count($edit->descriptions_arr);
						} else {
							 $desc_count =0;
						} ?>
	                <div class="scroll-y mh-300px px-3">
						<div class="form-repeater_package_add" id="repeater_block_edit">
			          		<div data-repeater-list="group-a_led_question">
				            	<div data-repeater-item>
								<?php foreach ($edit->descriptions_arr as $i => $desclist) { ?>  
									<div class="row" id="add_more_desc_edit_<?php echo $i+1?>">
										<div class="col-lg-9 mb-1">
											<label class="col-form-label required fw-semibold fs-6">Description</label>
											<textarea type="text" rows="1" class="form-control form-control-solid sender-id" id="package_desc_edit_<?php echo $i+1?>" name="package_desc[]" placeholder="Enter Description"><?php echo $desclist['description']?></textarea>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>	
										<div class="col-lg-2 col-form-label mb-1">
											<label class="form-check form-check-inline form-check-solid mt-10">
												<input type="hidden" name="package_available[]" value="0">
												<input class="form-check-input border border-gray-600 me-2" type="checkbox" id="package_available_edit_<?php echo $i+1?>" <?php echo $desclist['yes_no'] =='1' ?'checked':'' ?> name="package_available[]" value="<?php echo $desclist['yes_no'] ?>" > 
												<span class="fs-6 fw-semibold">Available</span>
											</label>
										</div>
						                <div class="col-lg-1">
											<a href="javascript:;" class="btn btn-secondary mt-10 px-1 py-2 package_add_del" id="package_add_del"  onclick="rmv_prp_target_spec(<?php echo $i+1?>);">
												<i class="fa-solid fa-trash-can fs-4 ms-1"></i>
											</a>
										</div>
					              	</div>
									<?php }?>
					          	</div>
			            	</div>
			          	</div>
			        </div>
			        <div class="mb-1 mt-1">
						<input type="hidden" name="repeater_block_pckg_desc_edit" id="repeater_block_pckg_desc_edit" value="<?php echo $desc_count;?>">
						<button type="button" class="btn btn-primary package_add px-4 py-2 fw-semibold fs-7" data-repeater-create id="package_add" onclick="add_prp_vendor_details_edit()">
							<i class="fa-solid fa-plus ms-1"></i>Add More
						</button>
					</div>
	                <div class="d-flex align-items-center justify-content-center mt-4">
	                    <a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
	                    <button type="button" id="btnSubmit_edit" class="btn btn-sm btn-primary" onclick="package_validation_edit()">Update Package</button>
	                </div>
				
			</form>
					<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
					<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
					<!-- package function onchange -->
					<script>
						$(document).ready(function() {
							var offers_chk_edit_fetch =<?php echo $edit->offer_check ?>;
							
							// console.log(offers_chk_edit_fetch)
							if (offers_chk_edit_fetch=="1") {
								// console.log(true)
								$('#offer_tbox_edit').show();
								document.getElementById("offer_dang_label_edit").innerHTML = "*";
							} else {
								$('#offer_tbox_edit').hide();
								document.getElementById("offer_dang_label_edit").innerHTML = "";
							}
						});
						function package_func_edit() {	
							var offers_chk_edit = document.getElementById("offers_chk_edit");
							var offer_tbox_edit = document.getElementById("offer_tbox_edit");
							
							if (offers_chk_edit.checked) {
								$('#offers_chk_edit').val('1');
								$('#offer_tbox_edit').show();
								document.getElementById("offer_dang_label_edit").innerHTML = "*";
							} else {
								$('#offers_chk_edit').val('0');
								$('#offer_tbox_edit').hide();
							document.getElementById("offer_dang_label_edit").innerHTML = "";
							}
						}
					</script>

			<!-- // package Edit Validation -->
		<script>
			function package_validation_edit () {
				$("#btnSubmit_edit").prop('disabled', true);
				let err = 0;
				var package_name = $('#package_name_edit').val();
				var period = $('#period_input_tbox_edit').val();
				var duration = $('#period_tbox_edit').val();
				var amount_edit = $('#amount_edit').val();
				var percentage = $('#offer_tbox_edit').val();
				var offer_chk = $('#offers_chk_edit').val();
				// var duration = $('#period_tbox_edit').val();
				
				// console.log(offer_chk)
				// Clear previous errors
				$('#package_name_edit').siblings('.invalid-feedback').text('').show();
				$('#period_input_tbox_edit').siblings('.invalid-feedback').text('').show();
				$('#period_tbox_edit').siblings('.invalid-feedback').text('').show();
				$('#amount_edit').siblings('.invalid-feedback').text('').show();
				$('#offer_tbox_edit').siblings('.invalid-feedback').text('').show();

				// Initialize error flag
				let hasError = false;

				if (package_name === '') {
					$('#package_name_edit').siblings('.invalid-feedback').text('Package Name is Required.').show();
					hasError = true;
				}

				if (duration === '') {
					$('#period_tbox_edit').siblings('.invalid-feedback').text('Duration is Required.').show();
					hasError = true;
				}
				
				if(duration != '3' || duration == ''){
					
					if (period === '') {
						$('#period_input_tbox_edit').siblings('.invalid-feedback').text('period is Required.').show();
						hasError = true;
					}
				}
				if (amount_edit === '') {
					$('#amount_edit').siblings('.invalid-feedback').text('Amount is Required.').show();
					hasError = true;
				}

				if(offer_chk == '1'){
					if (percentage === '') {
					$('#offer_tbox_edit').siblings('.invalid-feedback').text('Percentage is Required.').show();
					hasError = true;
				}
				}

				var count = $("#repeater_block_pckg_desc_edit").val();
				console.log(count);
				// Loop over all the added description fields
				for (var i = 1; i <= count; i++) {
					var package_desc = $("#package_desc_edit_" + i).val();
					
					if (package_desc == '') {
						$("#package_desc_edit_" + i).siblings('.invalid-feedback').text('Package Description is Required.').show();
						hasError = true;
					} else {
						$("#package_desc_edit_" + i).siblings('.invalid-feedback').text('').hide();
					}

					var checkbox = $("#package_available_edit_" + i);
		
					// If the checkbox is checked, it will pass 1; if unchecked, 0
					if (checkbox.is(":checked")) {
						checkbox.val('1');
						$("#package_available_edit_" + i).siblings('input[type="hidden"]').remove();

					} else {
						checkbox.val('0');
					}
				}

				// If there are errors, return false immediately
				if (hasError) {
					$("#btnSubmit_edit").prop('disabled', false);
					return false;
				}
				else{
					console.log($('#package_amount_edit').val())
					$("#btnSubmit_edit").prop('disabled', true);
					// return false;
					$('#package_form_edit').submit();
				}
			}
			
		</script>
		<!-- addmore repeater -->
		<script>
			function add_prp_vendor_details_edit() {
				var cp_inc = $('#repeater_block_pckg_desc_edit').val();
				cp_inc = Number(cp_inc) + 1;

				$('#repeater_block_edit').append(`
					<div class="row" id="add_more_desc_edit_${cp_inc}">
						<div class="col-lg-9 mb-1">
							<label class="col-form-label required fw-semibold fs-6">Description</label>
							<textarea type="text" rows="1" class="form-control form-control-solid sender-id" id="package_desc_edit_${cp_inc}" name="package_desc[]" placeholder="Enter Description"></textarea>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<div class="col-lg-2 col-form-label mb-1">
							<label class="form-check form-check-inline form-check-solid mt-10">
								<input type="hidden" name="package_available[]" value="0">
								<input class="form-check-input border border-gray-600 me-2" type="checkbox" id="package_available_edit_${cp_inc}" name="package_available[]" value="1" >
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

				$('#repeater_block_pckg_desc_edit').val(cp_inc); // Update the hidden input field to track the count
			}

			
			
			// Function to remove a description field
			function rmv_prp_target_spec(lid) {
				$('#add_more_desc_edit_' + lid).remove();
				lid = lid - 1;
				$('#repeater_block_pckg_desc_edit').val(lid); // Update the count
			}
		</script>
		<script>
		// Function to calculate the discount and update the total amount
			function updateTotalAmount_edit() {
				// Get the value of amount
				var amount = parseFloat(document.getElementById("amount_edit").value) || 0;
				
				// Get the discount offer checkbox status
				var isOfferChecked = document.getElementById("offers_chk_edit").checked;
				
				// Get the offer percentage, ensure it doesn't exceed 100
				var offerPercentage = parseFloat(document.getElementById("offer_tbox_edit").value) || 0;
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
				document.getElementById("package_amount_label_edit").textContent = totalAmount.toFixed(2);
				
				// Update the hidden input with the total amount
				document.getElementById("package_amount_edit").value = totalAmount.toFixed(2);
			}

			// Event listener for changes in the amount field
			document.getElementById("amount_edit").addEventListener("input", function() {
				updateTotalAmount_edit();
			});

			// Event listener for changes in the offer checkbox
			document.getElementById("offers_chk_edit").addEventListener("change", function() {
				updateTotalAmount_edit();
			});

			// Event listener for changes in the offer percentage field
			document.getElementById("offer_tbox_edit").addEventListener("input", function() {
				updateTotalAmount_edit();
			});
		</script>

		
