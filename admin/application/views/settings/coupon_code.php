<?php $this->load->view("common.php"); ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<!--begin::Theme mode setup on page load-->
		<script>
		var defaultThemeMode = "light";
		 var themeMode; 
		 if ( document.documentElement ) 
		 { if ( document.documentElement.hasAttribute("data-bs-theme-mode"))
			 { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); }
			  else { if ( localStorage.getItem("data-bs-theme") !== null ) 
				{ themeMode = localStorage.getItem("data-bs-theme"); }
				 else { themeMode = defaultThemeMode; } }
				  if (themeMode === "system")
				   { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } 
				   document.documentElement.setAttribute("data-bs-theme", themeMode); }
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
												<div class="text-dark fw-bold mb-2 fs-3">Coupon Code</div>
												<div class="d-flex">
									                <a href="<?php echo base_url(); ?>Dashboard" class="d-flex align-items-center fw-semibold text-gray-500 fs-6 me-2">Home</a>
									                <div class="d-flex align-items-center me-2">
									                	<i class="fa-solid fa-chevron-right fs-7 text-gray-500"></i>
									                </div>
									                <a href="javascript:;" class="d-flex align-items-center fw-semibold text-gray-500 fs-6">Settings</a>
										        </div>
											</h3>
											<div class="card-toolbar gap-2">
												<!-- <a href="#" class="btn btn-primary btn-sm">
													<span class="me-2"><i class="fa-solid fa-file-import fs-7"></i></span>Import
												</a>
												<a href="#" class="btn btn-primary btn-sm">
													<span class="me-2"><i class="fa-solid fa-file-export fs-7"></i></span>Export
												</a> -->
												<a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_coupon_code">
													<span class="me-2"><i class="fa-solid fa-plus fs-7 fw-semibold"></i></span>Add Coupon Code
												</a>
											</div>
										</div>
										<div class="card-body pt-0">
											<div class="row">
												<div class="col-lg-12">
													<table class="table align-middle table-striped table-hover fs-7 gy-2 gs-2 list_page">
														<thead>
															<tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
																<th class="min-w-50px text-start">S.No</th>
																<th class="min-w-100px">Coupon</th>
																<th class="min-w-100px">Package</th>
																<th class="min-w-100px">Coupon Code</th>
																<th class="min-w-80px">Status</th>
																<th class="min-w-100px"><span class="text-end">Actions</span></th>
															</tr>
														</thead>
														<tbody class="text-gray-800 fw-semibold fs-7">
														<?php  foreach($coupon_list as $i => $clist){ ?>
															<tr>
																<td class="text-start"><?php echo $i+1;?></td>
																<td>
																	<div class="d-flex align-items-center">
																		<label><?php echo $clist['coupon_name'];?></label>
																		<a href="javascript:;" class="ms-2" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo $clist['description'] ?? '-' ?>"><i class="fa-solid fa-circle-question text-black fs-6"></i></a>
																	</div>
																</td>
																<td><?php echo $clist['package_name'];?></td>
																<td>
																	<div class="d-flex align-items-center">
																		<label id="kt_clipboard" class="me-2"><?php echo $clist['coupon_code'];?></label>
																		<button class="btn btn-icon btn-sm btn-light h-30px w-30px" data-clipboard-target="#kt_clipboard">
																			<i class="fa-solid fa-copy fs-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Copy"></i>
																		</button>
																	</div>
																</td>
																<td>
																	<div class="form-check form-switch form-check-custom form-check-solid">
																	    <input class="form-check-input w-35px h-20px" type="checkbox" 
																		  <?php if($clist['status']==0){ echo "checked";} ?>
                                                                            name="activeunactive_<?php echo $i;?>"
                                                                            id="activeunactive_<?php echo $i;?>"
                                                                            onchange="activeunactive(<?php echo $clist['sno']; ?>,<?php echo $i; ?>)"
                                                                            value="<?php echo $clist['status'];?>" />
																	</div>
																</td>
																<td>
																	<span class="text-end">
																		<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_coupon_code"  onclick="lc_edit('<?php echo $clist['sno'];?>')">
																			<i class="fa-solid fa-pen-to-square fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
																		</a>
																		<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_coupon_code"  onclick="lc_delete('<?php echo $clist['sno'];?>','<?php echo $clist['coupon_name'];?>')">
																			<i class="fa-solid fa-trash-can fs-3 text-black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i>
																		</a>
																	</span>
																</td>
															</tr>
															<?php } ?>
														</tbody>
													</table>
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


	<!--begin::Modal - add Coupon Code-->
	<div class="modal fade" id="kt_modal_add_coupon_code" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
				<form name="coupon_code" id="coupon_code" method="POST" action="<?php echo base_url() ?>Couponcode/coupon_save" enctype="multipart/form-data" onsubmit="return coupon_validation();">
				<div class="modal-body pt-0 pb-15 px-5 px-xl-10">
					<!--begin::Heading-->
					<div class="text-center">
						<h1 class="mb-3">Create Coupon Code</h1>
					</div>
					<div class="row mb-4">
						<div class="col-lg-12 mb-2" >
							<label class="col-form-label required fw-semibold fs-6">Coupon Name</label>
							<input type="text" class="form-control form-control-solid" id="coupon_name" name="coupon_name" 
							oninput="this.value = this.value.replace(/^\w/, function(txt) { return txt.toUpperCase(); });"
                            onkeyup='chk_coupon_name_unique()'
							placeholder="Enter Coupon Name"/>
							<span id="coupon_name_err" class="text-danger"></span>
						</div>
						<div class="col-lg-12">
							<label class="col-form-label required fw-semibold fs-6">Package</label>
							<div class="fv-row">
								<select class="form-select form-select-solid text-dark" data-control="select2" name="package_id" id="package_id" data-hide-search="false"  data-dropdown-parent="#kt_modal_add_coupon_code" >
									<option value="">Select Package</option>
									<option value="1">All</option>
									<option value="2">Silver Package</option>
									<option value="3">Gold Package</option>
									<option value="4">Platinum Package</option>
								</select>
								<span id="package_id_err" class="text-danger"></span>
							</div>
							<div class="fv-plugins-message-container invalid-feedback" id=""></div>
						</div>
						<div class="col-lg-8 mb-2 text-center col-form-label">
							<label class="fw-bold fs-4">Coupon Code</label>
							<div class="d-block">
								<label class="badge bg-info fw-bold text-white fs-4" id="coupon_code_tbox"></label>
								<input type="hidden" id="coupon_code_input" name="coupon_code"/>
							</div>
						</div>
						<div class="col-lg-4 mb-2 col-form-label text-center">
							<button type="button" class="btn btn-sm btn-primary" id="coupon_code_generate">Generate</button>
						</div>
						<div class="col-lg-12">
							<label class="col-form-label fw-semibold fs-6">Description</label>
							<textarea class="form-control form-control-solid" rows="1" placeholder="Enter Description" id="desc" name="desc"></textarea>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-center mt-4">
						<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
						<button  type="submit" id="btnSubmit" class="btn btn-sm btn-primary" >Create Coupon Code</button>
					</div>
				</div>
				</form>
			</div>
			<!--end::Modal dialog-->
		</div>
	</div>
	<!--end::Modal - add Coupon Code-->

	<!--begin::Modal - edit Coupon Code-->
	<div class="modal fade" id="kt_modal_edit_coupon_code" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
				<form method="POST" enctype="multipart/form-data"
                        action="<?php echo base_url(); ?>Couponcode/coupon_update"
                        onsubmit="return edit_coupon_validation()">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-10">
						<!--begin::Heading-->
						<div class="text-center">
							<h1 class="mb-3">Update Coupon Code</h1>
						</div>
						<div class="row mb-4">
						<input type="hidden" id="edit_coupon_id" name="edit_coupon_id">
							<div class="col-lg-12 mb-2">
								<label class="col-form-label required fw-semibold fs-6">Coupon Name</label>
								<input type="text" class="form-control form-control-solid" placeholder="Enter Coupon Name" name="coupon_name_edit" id="coupon_name_edit" 
								oninput="this.value = this.value.replace(/^\w/, function(txt) { return txt.toUpperCase(); });"/>
								<span id="coupon_name_edit_err" class="text-danger"></span>
							</div>
							<div class="col-lg-12">
								<label class="col-form-label required fw-semibold fs-6">Package</label>
								<div class="fv-row">
									<select class="form-select form-select-solid text-dark" data-control="select2" data-hide-search="false" name="package_id_edit" id="package_id_edit" data-dropdown-parent="#kt_modal_edit_coupon_code" >
										<option value="">Select Package</option>
										<option value="1" selected>All</option>
										<option value="2">Silver Package</option>
										<option value="3">Gold Package</option>
										<option value="4">Platinum Package</option>
									</select>
									<span id="package_id_edit_err" class="text-danger"></span>
								</div>
								<div class="fv-plugins-message-container invalid-feedback" id=""></div>
							</div>
							<div class="col-lg-8 mb-2 text-center col-form-label">
								<label class="fw-bold fs-4">Coupon Code</label>
								<div class="d-block">
									<label class="badge bg-info fw-bold text-white fs-4" id="coupon_code_tbox_edit"></label>
									<label class="badge bg-info fw-bold text-white fs-4" id="coupon_code_tbox_edit_show"></label>
									<input type="hidden" id="coupon_code_edit" name="coupon_code_edit"/>
								</div>
							</div>
							<div class="col-lg-4 mb-2 col-form-label text-center">
								<button  type="button"  class="btn btn-sm btn-primary" id="coupon_code_generate_edit">Generate</button>
							</div>
							<div class="col-lg-12">
								<label class="col-form-label fw-semibold fs-6">Description</label>
								<textarea class="form-control form-control-solid" rows="1" placeholder="Enter Description" name="desc_edit" id="desc_edit"></textarea>
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
							<button type="submit" id="editbtnSubmit"  class="btn btn-sm btn-primary" >Update Coupon Code</button>
						</div>
					</div>
				</form>
			</div>
			<!--end::Modal dialog-->
		</div>
	</div>
	<!--end::Modal - edit Coupon Code-->

	<!--begin::Modal - Delete Coupon Code-->
	<div class="modal fade" id="kt_modal_delete_coupon_code" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
	  <!--begin::Modal dialog-->
	  <div class="modal-dialog modal-m">
	    <!--begin::Modal content-->
		<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Couponcode/coupon_code_delete">
			<div class="modal-content rounded">
			<div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
				<div class="swal2-icon-content">?</div>
			</div>
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete Coupon Code ?
				<div class="d-block fw-bold fs-5 py-2">
				<input type="hidden" id="delete_coupon_id" name="delete_coupon_id">
				<label id="delete_coupon_name"></label>
				
				</div>
			</div>
			<div class="d-flex justify-content-center align-items-center pt-8">
				<button type="submit" class="btn btn-sm btn-danger me-3">Yes, delete!</button>
				<button type="reset" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No,cancel</button>
			</div><br><br>
			</div>
		</form>
	    <!--end::Modal content-->
	  </div>
	  <!--end::Modal dialog-->
	</div>
	<!--end::Modal - Delete Coupon Code-->


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
		var baseurl = '<?php echo base_url(); ?>';
		function lc_edit(val)
		{
			$.ajax({
				type: "POST",
				url: baseurl+'Couponcode/Coupon_edit',
				async: false,
				data: "sno="+val,
				dataType: "json",
				success: function(response)
				{
					$('#coupon_name_edit').val(response.coupon_name);
					$('#package_id_edit').val(response.package_id).trigger('change');
					$('#edit_coupon_id').val(response.sno);
					// $('#coupon_code_edit').val(response.coupon_code);
					$('#coupon_code_tbox_edit_show').text(response.coupon_code);
					$('#desc_edit').val(response.description);
				}
			});
		}
	</script>
	
		<?php $this->load->view("script.php"); ?>
		<script>
			// Select elements
			const target = document.getElementById('kt_clipboard');
			const button = target.nextElementSibling;

			// Init clipboard -- for more info, please read the offical documentation: https://clipboardjs.com/
			clipboard = new ClipboardJS(button, {
			    target: target,
			    text: function () {
			        return target.innerHTML;
			    }
			});

			// Success action handler
			clipboard.on('success', function (e) {
			    var checkIcon = button.querySelector('.fa-check');
			    var copyIcon = button.querySelector('.fa-copy');

			    // Exit check icon when already showing
			    if (checkIcon) {
			        return;
			    }

			    // Create check icon
			    checkIcon = document.createElement('i');
			    checkIcon.classList.add('fa-solid');
			    checkIcon.classList.add('fa-check');
			    checkIcon.classList.add('fs-5');

			    // Append check icon
			    button.appendChild(checkIcon);

			    // Highlight target
			    const classes = ['text-success', 'fw-boldest'];
			    target.classList.add(...classes);

			    // Highlight button
			    button.classList.add('btn-success');

			    // Hide copy icon
			    copyIcon.classList.add('d-none');

			    // Revert button label after 3 seconds
			    setTimeout(function () {
			        // Remove check icon
			        copyIcon.classList.remove('d-none');

			        // Revert icon
			        button.removeChild(checkIcon);

			        // Remove target highlight
			        target.classList.remove(...classes);

			        // Remove button highlight
			        button.classList.remove('btn-success');
			    }, 3000)
			});
		</script>
		 <script>
	        function generateRandomString(length) {
	            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	            let coupon_code_tbox = '';
	            for (let i = 0; i < length; i++) {
	                const randomIndex = Math.floor(Math.random() * characters.length);
	                coupon_code_tbox += characters[randomIndex];
	            }
	            return coupon_code_tbox;
	        }

	        document.getElementById('coupon_code_generate').onclick = function() {
	            const randomString = generateRandomString(6);
	            document.getElementById('coupon_code_tbox').textContent = randomString;
	            document.getElementById('coupon_code_input').innerText  = randomString;
				document.getElementById('coupon_code_input').value = randomString;
				
	        };
	    </script>
	    <script>
	        function generateRandomString_edit(length) {
	            const characters_edit = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	            let coupon_code_tbox_edit = '';
	            for (let i = 0; i < length; i++) {
	                const randomIndex = Math.floor(Math.random() * characters_edit.length);
	                coupon_code_tbox_edit += characters_edit[randomIndex];
	            }
	            return coupon_code_tbox_edit;
	        }

	        document.getElementById('coupon_code_generate_edit').onclick = function() {
	            const randomString_edit = generateRandomString_edit(6);
	            document.getElementById('coupon_code_tbox_edit').textContent = randomString_edit;
	            document.getElementById('coupon_code_edit').value = randomString_edit;
	        };
	    </script>
	    <!-- <script>
			function chk_coupon_name_unique() {
				var val = $('#coupon_name').val();
				$.ajax({
					type: "POST",
					url: baseurl + 'Couponcode/chk_coupon_name_unique',
					data: {
						'coupon_name': val
					},
					cache: false,
					dataType: "html",
					success: function(result) {
						if (result > 0) {
							$('#name_err').html('Coupon Name is already exists!');
							$('#btnSubmit').prop('disabled', true);
							err = 1;
						} else {
							$('#name_err').html('');
							$('#btnSubmit').prop('disabled', false);
							err = 0;
						}
					}
				});
			}
		</script> -->
		<script>
			function coupon_validation(){
				var err = 0
				var coupon_name =$('#coupon_name').val();
				if(coupon_name ===""){
					$('#coupon_name_err').html('Coupon Name is required!');
					err++;
				}

				var package_id =$('#package_id').val();
				if(package_id ===""){
					$('#package_id_err').html('Package is required!');
					err++;
				}


				if (err > 0) {
					return false;
				} else {
					return true;
				}
			}
		</script>

		<script>
			function edit_coupon_validation(){
				var err = 0
					var coupon_name_edit =$('#coupon_name_edit').val();
					if(coupon_name_edit ===""){
						$('#coupon_name_edit_err').html('Coupon Name is required!');
						err++;
					}

					var package_id_edit =$('#package_id_edit').val();
					if(package_id_edit ===""){
						$('#package_id_edit_err').html('Package is required!');
						err++;
					}


					if (err > 0) {
						return false;
					} else {
						return true;
					}
			}
		</script>
	
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
					url: baseurl + 'Couponcode/lc_change_status',
					data: datastring,
					cache: false,
					dataType: "html",
					success: function(result) {
						if (unactive == 0) {
							setTimeout(function() {
							location.reload();
							}, 500);
						} else {
							setTimeout(function() {
							location.reload();
							}, 500);
						}
					}
				});
			}
		</script>
		<script>
				function lc_delete(val,name){
					$('#delete_coupon_id').empty().val(val);
					$('#delete_coupon_name').html(name);
					$('#delete_user_no').html(no);
					
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
	</body>
	<!--end::Body-->
</html>