<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Manage_callers/update_caller" id="edit_caller_form">
<div class="text-center">
			<?php 
				$duration = $user_data->duration == '3'? 'Life Time':( $user_data->duration == '1' ? 'Month':'Year')
			?>
			<h1 class="mb-3">
				<label>Update Callers</label>
				<label class="me-1 ms-1">-</label>
				<label class="badge badge-warning text-black fw-bold fs-2"><?php echo $user_data->package_name ?> -  <?php echo $user_data->duration == '3'? ' '.$duration: $user_data->period .' '.$duration ?></label>
			</h1>
		</div>
		<div class="d-flex align-items-center justify-content-end">
			<?php if($user_data->is_manager == 1){?>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value ="<?php echo $user_data->is_manager ?>" <?php echo $user_data->is_manager == 1 ? "checked" : "" ;?> name="is_manager" />
				<label class="form-check-label fw-semibold fs-6 text-black">Manager</label>
			</div>
			<?php }?>
		</div>
		<input type="hidden" name="user_id" value="<?php echo $user_data->user_id;?>">
		<div class="row">
			<div class="col-lg-3">
				<label class="col-form-label required fw-semibold fs-6">First Name</label>
				<div class="fv-row">
					<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter First Name" value="<?php echo $user_data->name?>"  id="first_name_edit" name="first_name">
					<div class="fv-plugins-message-container invalid-feedback"></div>
				</div>
			</div>
			<div class="col-lg-3">
				<label class="col-form-label required fw-semibold fs-6">Last Name</label>
				<div class="fv-row">
					<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Last Name" value="<?php echo $user_data->nick_name?>" id="last_name_edit" name="last_name">
					<div class="fv-plugins-message-container invalid-feedback"></div>
				</div>
			</div>
			<div class="col-lg-3">
				<label class="col-form-label required fw-semibold fs-6">Department</label>
				<div class="fv-row">
					<select class="form-select form-select-solid text-dark" data-control="select2" data-hide-search="false"  data-dropdown-parent="#kt_modal_edit_callers" id="dept_id_edit" name="dept_id" >
						<option value="">Select Department</option>
						<?php if(isset($dept_list)) {?>
							<?php foreach ($dept_list as $i => $c_list) { ?>
								<option value="<?php echo  $c_list->department_id   ?>" <?php echo  $c_list->department_id ==  $user_data->department_id ? "selected":"" ; ?>>
									<?php echo  $c_list->department_name ?></option>
							<?php } ?>
							<?php } ?>
					</select>
					<div class="fv-plugins-message-container invalid-feedback"></div>
				</div>
			</div>
			<div class="col-lg-3">
				<label class="col-form-label fw-semibold fs-6">Mobile No</label>
				<div class="fv-row">
					<input type="text" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Mobile No" value="<?php echo $user_data->phone_no; ?>" disabled>
					<div class="fv-plugins-message-container invalid-feedback"></div>
				</div>
			</div>
			<div class="col-lg-6">
				<label class="col-form-label fw-semibold fs-6">Description</label>
				<textarea class="form-control form-control-solid" rows="1" placeholder="Enter Description" name="descrip_caller"><?php echo $user_data->description ?? "-";?></textarea>
				<div class="fv-plugins-message-container invalid-feedback"></div>
			</div>
			<div class="col-lg-3 text-center mt-3">
			<?php
				$user_photo = $user_data ? $user_data->image : '';
				$user_name  = $user_data ? $user_data->name : '';

				?>
				<?php
				$photo_path = FCPATH . 'assets/Images/user/' . $user_photo;
				$photo_url = base_url() . 'assets/Images/user/' . $user_photo; ?>
				
				<div class="image-input image-input-outline" data-kt-image-input="true" >
				<?php if (file_exists($photo_path) && $user_photo) {
				?>
					<div class="image-input-wrapper w-100px h-100px" style="background-image: url('<?php echo $photo_url; ?>')"></div>
					<?php } else {
						$first_character = isset($user_name) && $user_name ? $user_name[0] : 'A';
						$str = strtoupper($first_character);
						$letter_path = FCPATH . 'assets/Images/Letters/' . $str . '.png';
						$letter_url = base_url() . 'assets/Images/Letters/' . $str . '.png';
						?>
						<div class="image-input-wrapper w-100px h-100px" style="background-image: url('<?php echo $letter_url; ?>')"></div>
							<?php
							}
								?>
					<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
						<i class="fa-solid fa-pen fs-7 text-black"></i>
						<input type="file" name="edit_logo" id="edit_logo_new" accept=".png, .jpg, .jpeg">
						<input type="hidden" name="old_logo" value="<?php echo $user_data->image ?? '' ?>">
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
			<button type ="button" id="editbtnsubmit" class="btn btn-sm btn-primary" onclick="edit_validation()">Update Callers</button>
		</div>
</form>
	<?php $this->load->view("script.php");?>

		<script>
			var baseurl = '<?php echo base_url(); ?>';
			function edit_validation() {
				$("#editbtnsubmit").prop('disabled', true);
				let err = 0;
				
				
				var first_name = $('#first_name_edit').val();
				var last_name = $('#last_name_edit').val();
				var dept_id = $('#dept_id_edit').val();
				
				$('#first_name_edit').siblings('.invalid-feedback').text('').show();
				$('#last_name_edit').siblings('.invalid-feedback').text('').show();
				$('#dept_id_edit').siblings('.invalid-feedback').text('').show();
				

				// Initialize error flag
				let hasError = false;
				if (first_name === '') {
					$('#first_name_edit').siblings('.invalid-feedback').text('First Name is Required.').show();
					hasError = true;
				}
				if (last_name === '') {
					$('#last_name_edit').siblings('.invalid-feedback').text('Last Name is Required.').show();
					hasError = true;
				}
				if (dept_id === '') {
					$('#dept_id_edit').siblings('.invalid-feedback').text('Department is Required.').show();
					hasError = true;
				}
			
				// If there are errors, return false immediately
				if (hasError) {
					$("#editbtnsubmit").prop('disabled', false);
					return false;
				}
				else{
					$("#editbtnsubmit").prop('disabled', true);
					// return false;
					$('#edit_caller_form').submit();
				}
			}
		</script>


