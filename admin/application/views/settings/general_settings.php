<?php $this->load->view("common.php"); ?>
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
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
									<div class="card-header pt-5 mb-6">
										<h3 class="card-title align-items-start flex-column">
											<div class="text-dark fw-bold mb-2 fs-3">General Settings</div>
											<div class="d-flex">
												<a href="<?php echo base_url(); ?>Dashboard" class="d-flex align-items-center fw-semibold text-gray-500 fs-6 me-2">Home</a>
												<div class="d-flex align-items-center me-2">
													<i class="fa-solid fa-chevron-right fs-7 text-gray-500"></i>
												</div>
												<a href="javascript:;" class="d-flex align-items-center fw-semibold text-gray-500 fs-6">Settings</a>
											</div>
										</h3>
									</div>
									<form name="generalsetting_form" id="generalsetting_form" method="POST" action="<?php echo base_url(); ?>Generalsettings/general_settings_update" enctype="multipart/form-data" onsubmit="return gs_validation();">
										<!-- Add your form fields here -->
										<!-- <input type="hidden" name="oldlogo" value="<?php echo !empty($g_settings->logo) ?? ''; ?>"> -->
										<div class="card-body">
											<div class="row mt-2">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-lg-4 col-form-label required fw-semibold fs-6 text-center">Logo</label>
														<div class="col-lg-8">
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url();?>assets/Images/<?php echo $g_settings?$g_settings->logo:'default_logo.png'; ?>')">
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url();?>assets/Images/<?php echo $g_settings?$g_settings->logo:'default_logo.png'; ?>')"></div>
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<input type="file" name="upload[logo]" id="logo" accept=".png, .jpg, .jpeg" value="">
																	<input type="hidden" name="old_logo" value="<?php echo $g_settings?$g_settings->logo:''; ?>">
																	<input type="hidden" name="avatar_remove">
																</label>
																<!-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-x fs-2"></i>
																</span> -->
															</div>
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-lg-4 col-form-label required fw-semibold fs-6 text-center">Fav Icon</label>
														<div class="col-lg-8">
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url(); ?>assets/Images/<?php echo $g_settings ? $g_settings->fav_icon : 'default_fav_icon.png'; ?>')">
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url(); ?>assets/Images/<?php echo $g_settings ? $g_settings->fav_icon : 'default_fav_icon.png'; ?>')">
																</div>
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<input type="file" name="upload[fav_icon]" id="fav_icon" accept=".png, .jpg, .jpeg" value="">
																	<input type="hidden" name="old_fav" value="<?php echo $g_settings ? $g_settings->fav_icon : ''; ?>">
																	<input type="hidden" name="avatar_remove">
																</label>
															</div>
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">Title</label>
													<input type="text" name="title" id="title" class="form-control form-control-solid" placeholder="Enter Title" oninput="this.value = this.value.replace(/^\w/, function(txt) { return txt.toUpperCase(); });" value="<?php echo isset($g_settings) ? $g_settings->title : ''; ?>">
													<div class="fv-plugins-message-container invalid-feedback" id="title_err"></div>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">Date Format</label>
													<div class="fv-row">
														<select class="form-select form-select-solid text-dark st_dt" data-control="select2" name="date_format" id="date_format" data-hide-search="false">
															<option value="">Select Date Format</option>
															<?php $date_format = $g_settings->date_format ? $g_settings->date_format : '';  ?>

															<option value="d-m-Y" <?php if ($date_format == "d-m-Y") {
																						echo 'selected';
																					} else {
																						echo '';
																					} ?>>dd-mm-yyyy</option>

															<option value="Y-m-d" <?php if ($date_format == "Y-m-d") {
																						echo 'selected';
																					} else {
																						echo '';
																					} ?>>yyyy-mm-dd</option>

															<option value="Y/m/d" <?php if ($date_format == "Y/m/d") {
																						echo 'selected';
																					} else {
																						echo '';
																					} ?>>yyyy/mm/dd</option>

															<option value="d-M-Y" <?php if ($date_format == "d-M-Y") {
																						echo 'selected';
																					} else {
																						echo '';
																					} ?>>dd-mmm-yyyy</option>

															<option value="d/M/Y" <?php if ($date_format == "d/M/Y") {
																						echo 'selected';
																					} else {
																						echo '';
																					} ?>>dd/mmm/yyyy</option>
														</select>
													</div>
													<div class="fv-plugins-message-container invalid-feedback" id="date_format_err"></div>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label  fw-semibold fs-6">Email</label>
													<input type="text" name="email" id="email" class="form-control form-control-solid" placeholder="Enter Email" value="<?php echo isset($g_settings) ? $g_settings->email : ''; ?>" oninput="this.value = this.value.toLowerCase();">
													<div class="fv-plugins-message-container invalid-feedback" id="email_err"></div>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">Website</label>
													<input type="text" name="website_link" id="website_link" class="form-control form-control-solid" placeholder="Enter Website" value="<?php echo isset($g_settings) ? $g_settings->website : ''; ?>">
													<div class="fv-plugins-message-container invalid-feedback" id="website_link_err"></div>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">Phone No</label>
													<input type="text" name="phone_no" id="phone_no" class="form-control form-control-solid" placeholder="Enter Phone Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo isset($g_settings) ? $g_settings->phone_no : ''; ?>">
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">Mobile No</label>
													<input type="text" name="mobile_no" id="mobile_no" class="form-control form-control-solid" placeholder="Enter Mobile Number" maxlength="10" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$" title="Enter Valid mobile number ex.6311111111" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo isset($g_settings) ? $g_settings->mobile_no : ''; ?>">
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">Country</label>
													<div class="fv-row">
														<select class="form-select form-select-solid text-dark" data-control="select2" name="country" id="country" onchange="state_list()" data-hide-search="false">
															<option value="">Select Country</option>
															<?php if (!empty($country_lists)) {
																foreach ($country_lists as $key => $country_list) { ?>
																	<option value="<?php echo $country_list->id; ?>" 
																	<?php if ($country_list->id == (isset($g_settings) ? $g_settings->country_id : '')) {
																echo 'selected';
															} ?>><?php echo $country_list->name; ?></option>
															<?php }
															} ?>
														</select>
													</div>
													<div class="fv-plugins-message-container invalid-feedback" id="country_err"></div>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">State</label>
													<div class="fv-row">
														<select class="form-select form-select-solid text-dark" data-control="select2" name="state" id="state" onchange="city_list()" data-hide-search="false">
															<option value="">Select State</option>
														</select>
													</div>
													<div class="fv-plugins-message-container invalid-feedback" id="state_err"></div>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">City</label>
													<div class="fv-row">
														<select class="form-select form-select-solid text-dark" data-control="select2" name="city" id="city" data-hide-search="false">
															<option value="">Select City</option>
														</select>
													</div>
													<div class="fv-plugins-message-container invalid-feedback" id="city_err"></div>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">Area/Street</label>
													<textarea class="form-control form-control-solid" rows="1" name="company_address" id="company_address" placeholder="Enter Area/Street" oninput="this.value = this.value.replace(/^\w/, function(txt) { return txt.toUpperCase(); });"><?php echo isset($g_settings) ? $g_settings->area_street : ''; ?></textarea>
													<div class="fv-plugins-message-container invalid-feedback" id="company_address_err"></div>
												</div>
												<div class="col-lg-4">
													<label class="col-form-label required fw-semibold fs-6">Pincode</label>
													<input type="text" name="pincode" id="pincode" class="form-control form-control-solid" placeholder="Enter Pincode" value="<?php echo isset($g_settings) ? $g_settings->pincode : ''; ?>">
													<div class="fv-plugins-message-container invalid-feedback" id="pincode_err"></div>
												</div>
											</div>
											<div class="d-flex justify-content-end align-items-center mt-4">
												<a href="<?php echo base_url(); ?>Dashboard" class="btn btn-sm btn-secondary me-3">Cancel</a>
												<button type="submit" class="btn btn-sm btn-primary me-3">Update</button>
											</div>
										</div>
									</form>
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



	<?php $this->load->view("common_flashdata.php"); ?>
	<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
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
	<!-- Flash Data Script::End -->

	<script>
		$(".st_dt").flatpickr({
			enableTime: true,
			dateFormat: "d-M-Y H:i",
		});
	</script>
	<script>
		// Function to fetch state list based on selected country
		function state_list() {
			var country = $('#country').val();
			var base = '<?php echo base_url(); ?>';

			$.ajax({
				type: "POST",
				url: base + 'Generalsettings/state_list',
				data: {
					country: country
				},
				success: function(response) {
					$('#state').empty().append(response);
					$('#state').val('<?php echo $g_settings->state_id ?? ''; ?>').change();
					city_list();
				}
			});
		}

		// Trigger state_list function on page load
		$(document).ready(function() {
			state_list();
		});
	</script>
	<script>
		function city_list() {
			var state = $('#state').val();
			var base = '<?php echo base_url(); ?>';
			$.ajax({
				type: "POST",
				url: base + 'Generalsettings/city_list',
				data: "state=" + state,
				success: function(response) {
					$('#city').val('');
					$('#city').empty().append(response);
					$('#city').val('<?php echo $g_settings->city_id ?? ''; ?>').change();
				}
			});
		}
	</script>
	<script>
		function gs_validation() {
			var err = 0;

			// Helper function to show error message using Swal.fire
			function showError(message) {
				Swal.fire({
					icon: 'error',
					title: 'Validation Error',
					text: message,
				});
				err++;
			}

			// Validate Title
			var title = document.getElementById('title').value.trim();
			if (title === '') {
				showError('Title is required.');
				return false;
			}

			// Validate Date Format
			var dateFormat = document.getElementById('date_format').value.trim();
			if (dateFormat === '') {
				showError('Date Format is required.');
				return false;
			}

			// Validate Email
			// var email = document.getElementById('email').value.trim();
			// var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			// if (email === '' || !emailPattern.test(email)) {
			//     showError('Enter Email is required.');
			//     return false;
			// }

			// Validate Website
			var website = document.getElementById('website_link').value.trim();
			var websitePattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;
			if (website === '' || !websitePattern.test(website)) {
				showError('Enter Website URL is required.');
				return false;
			}

			// Validate Phone No
			var phoneNo = document.getElementById('phone_no').value.trim();
			if (phoneNo === '' || phoneNo.length !== 10) {
				showError('Phone Number must be 10 digits.');
				return false;
			}

			// Validate Mobile No
			var mobileNo = document.getElementById('mobile_no').value.trim();
			var mobileNoPattern = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/;
			if (mobileNo === '' || !mobileNoPattern.test(mobileNo)) {
				showError('Enter Mobile Number is required.');
				return false;
			}

			// Validate Country
			var country = document.getElementById('country').value.trim();
			if (country === '') {
				showError('Select Country is required.');
				return false;
			}

			// Validate State
			var state = document.getElementById('state').value.trim();
			if (state === '') {
				showError('Select State is required.');
				return false;
			}

			// Validate City
			var city = document.getElementById('city').value.trim();
			if (city === '') {
				showError('Select City is required.');
				return false;
			}

			// Validate Area/Street
			var areaStreet = document.getElementById('company_address').value.trim();
			if (areaStreet === '') {
				showError('Enter Area/Street is required.');
				return false;
			}

			// Validate Pincode
			var pincode = document.getElementById('pincode').value.trim();
			if (pincode === '') {
				showError('Enter Pincode is required.');
				return false;
			}

			var auto_logout = document.getElementById('auto_logout').value.trim();
			if (auto_logout === '') {
				showError('Enter Admin Auto Logout Time is required.');
				return false;
			}
			var user_auto_logout = document.getElementById('user_auto_logout').value.trim();
			if (user_auto_logout === '') {
				showError('Enter User Auto Logout Time is required.');
				return false;
			}

			


			// If no errors, allow form submission
			return err === 0;
		}
	</script>
	<script>
		$("#logo").change(function() {
			var file = this.files[0];
			var ext = file.name.split('.').pop().toLowerCase();

			if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
				// Invalid file type
				$(this).val(''); // Clear the input
				$('#btnsubmit').prop('disabled', true); // Disable submit button
				$('#product_logo_err').html('Upload file allows only file types of GIF, PNG, JPG, and JPEG');
			} else {
				// Valid file type
				$('#btnsubmit').prop('disabled', false); // Enable submit button
				$('#product_logo_err').html(''); // Clear any previous error message

				var reader = new FileReader();
				reader.onload = function(e) {
					$('#newuploadedphoto').attr('src', e.target.result); // Show preview
				}
				reader.readAsDataURL(file); // Read the file as data URL
			}
		});
		// To validate favicon
		$("#favicon").change(function() {

			var ext = document.getElementById('favicon').value.split('.').pop().toLowerCase();
			if (ext) {
				if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'ico']) == -1) {
					$(this).val('');
					$('#btnsubmit').prop('disabled', true);
					$('#favicon_err').html('Upload file allows only file types of GIF, PNG, JPG, ICO and JPEG');
					error++;
				} else {
					$('#btnsubmit').prop('disabled', false);
					$('#favicon_err').html('');
					error = 0;
				}
			} else {
				$('#btnsubmit').prop('disabled', false);
				$('#favicon_err').html('');
				error = 0;
			}
		});
	</script>
	<script>
		//     var err = 0;
		//     var title = check_input_empty_values($('#title').val(), 'title_err', 'Title');
		//     var website = $('#website').val();
		//     var pincode = check_input_empty_values($('#pincode').val(), 'pincode_err', 'Pincode');
		//     var date_format = check_input_empty_values($('#date_format').val(), 'date_format_err', 'Date Format');


		//     if (title) {
		//         err++;
		//     }

		//     if (website == '') {
		//         $('#website_err').html('Valid Website is required!');
		//         err++;
		//     } else {
		//         $('#website_err').html('');
		//     }

		//     if (date_format) {
		//         err++;
		//     }

		//     if (pincode) {
		//         err++;
		//     }


		//     if (err > 0) {
		//         return false;
		//     } else {
		//         return true;
		//     }
		// }

		// To validate product logo
		// $("#logo").change(function() {

		//     // alert("hi");
		//     var ext = document.getElementById('logo').value.split('.').pop().toLowerCase();
		//     if (ext) {
		//         if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
		//             $(this).val('');
		//             $('#btnsubmit').prop('disabled', true);
		//             $('#product_logo_err').html('Upload file allows only file types of GIF, PNG, JPG and JPEG');
		//             error++;
		//         } else {
		//             // alert($("#logo").val());
		//             $('#btnsubmit').prop('disabled', false);
		//             $('#product_logo_err').html('');
		//             $('#newuploadedphoto').attr('src', 'assets/Images/' + response);
		//             error = 0;
		//         }
		//     } else {
		//         $('#btnsubmit').prop('disabled', false);
		//         $('#product_logo_err').html('');
		//         error = 0;
		//     }


		// });

		//     $("#logo").change(function() {
		//     var ext = this.value.split('.').pop().toLowerCase();
		//     if (ext) {
		//         if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
		//             // Invalid file type
		//             $(this).val(''); // Clear the input
		//             $('#btnsubmit').prop('disabled', true); // Disable submit button
		//             $('#product_logo_err').html('Upload file allows only file types of GIF, PNG, JPG, and JPEG');
		//             error++;
		//         } else {
		//             // Valid file type
		//             $('#btnsubmit').prop('disabled', false); // Enable submit button
		//             $('#product_logo_err').html(''); // Clear any previous error message
		//             var file = this.files[0];
		//             var reader = new FileReader();
		//             reader.onload = function(e) {
		//                 $('#newuploadedphoto').attr('src', e.target.result); // Show preview
		//             }
		//             reader.readAsDataURL(file); // Read the file as data URL
		//             error = 0; // Reset error count
		//         }
		//     } else {
		//         // No file selected
		//         $('#btnsubmit').prop('disabled', false); // Enable submit button
		//         $('#product_logo_err').html(''); // Clear any previous error message
		//         error = 0; // Reset error count
		//     }
		// });
	</script>
</body>
<!--end::Body-->

</html>
