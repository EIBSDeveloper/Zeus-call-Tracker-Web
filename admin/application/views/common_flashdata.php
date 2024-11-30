<!-- Flash Data::Start -->
<?php if ($this->session->flashdata('g_success')) { ?>
	<div class="menu-item px-3">
		<a href="javascript:;" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#success_modal"></a>
	</div>
<?php } ?>
<?php if ($this->session->flashdata('g_err')) { ?>
	<div class="menu-item px-3">
		<a href="javascript:;" id="pop_up_success" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#error_modal"></a>
	</div>
<?php } ?>
<div class="modal fade" id="success_modal" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered modal-m">
		<!--begin::Modal content-->
		<div class="modal-content rounded">
			<div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
				<div class="swal2-icon-content">&#x2713;</div>
			</div>
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
				<b><span> <?php echo $this->session->flashdata('g_success'); ?></span></b>
			</div>
			<div class="d-flex flex-center flex-row-fluid pt-12">
				<button type="button" class="btn btn-primary me-3 close_popup" data-bs-dismiss="modal">OK</button>

			</div><br><br>
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<div class="modal fade" id="error_modal" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered modal-m">
		<!--begin::Modal content-->
		<div class="modal-content rounded">
			<div class="swal2-icon swal2-icon-show" style="display: flex;border: 3px solid red !important;">
				<div class="swal2-icon-content" style="color:red">&#x2715;</div>
			</div>
			<div class="swal2-html-container" id="swal2-html-container" style="display: block;">
				<b><span> <?php echo $this->session->flashdata('g_err'); ?></span></b>
			</div>
			<div class="d-flex flex-center flex-row-fluid pt-12">
				<button type="button" class="btn btn-primary me-3 close_popup" data-bs-dismiss="modal">OK</button>

			</div><br><br>
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<!-- Flash Data::End -->
