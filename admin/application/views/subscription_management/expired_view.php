<?php $common_date = get_general_settings()->date_format ?? 'd-M-Y';?>
<div class="text-center">
    <h1 class="mb-6">
        <label>Renewal Subscriber &nbsp; - &nbsp;</label>
        <label class="badge badge-danger text-white fs-3 fw-bold">Expired</label>
    </h1>
</div>
	<?php
	$first_character = isset($view->name) && $view->name ? $view->name[0] : 'A';
	$str = strtoupper($first_character);

	$photo_url = base_url() . 'assets/Images/users/' . $view->image;
	$letter_url = base_url() . 'assets/Images/Letters/' . $str . '.png';
	$photo_path = FCPATH . 'assets/Images/users/' . $view->image;
	$letter_path = FCPATH . 'assets/Images/Letters/' . $str . '.png';
	?>
	<?php
	$duration = $view->duration == '3' ? 'Life Time' : ($view->duration == '1' ? 'Month' : 'Year')
	?>
<div class="row mb-2">
    <div class="col-lg-6">
        <div class="row mb-2">
            <label class="col-5 fs-6 fw-semibold">Created Date</label>
            <label class="col-1 fs-6 fw-bold">:</label>
            <label class="col-6 fs-5 fw-bold"><?php echo date($common_date, strtotime($view->created_at)) ?></label>
        </div>
        <div class="row mb-2">
            <label class="col-5 fs-6 fw-semibold">Subscriber</label>
            <label class="col-1 fs-6 fw-bold">:</label>
            <label class="col-6 fs-5 fw-bold"><?php echo $view->name; ?></label>
        </div>
        <div class="row mb-2">
            <label class="col-5 fs-6 fw-semibold">Company</label>
            <label class="col-1 fs-6 fw-bold">:</label>
            <label class="col-6 fs-5 fw-bold"><?php echo $view->user_company; ?></label>
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
            <label class="col-5 fs-6 fw-semibold">No. of Callers / Duration</label>
            <label class="col-1 fs-6 fw-bold">:</label>
            <div class="col-6 fs-5 fw-bold">
                <label class="badge badge-warning text-black fs-6 fw-bold"><?php echo $view->no_of_callers; ?></label>
                <label class="fs-5 fw-bold ms-1 me-1">/</label>
                <label
                    class="fs-5 fw-bold"><?php echo $view->duration == '3' ? ' ' . $duration : $view->period . ' ' . $duration ?></label>
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-5 fs-6 fw-semibold">Paid Amount</label>
            <label class="col-1 fs-6 fw-bold">:</label>
            <div class="col-6">
                <label class="fs-5 fw-bold">
                    <i class="fa-solid fa-indian-rupee-sign fs-5 text-black"></i>
                </label>
                <label class="fs-5 fw-bold"><?php echo IND_money_format($view->amount); ?></label>
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-5 fs-6 fw-semibold">Start / End Date</label>
            <label class="col-1 fs-6 fw-bold">:</label>
            <div class="col-6 fs-5 fw-bold">
                <label
                    class="badge badge-success text-white fs-6 fw-bold"><?php echo date($common_date, strtotime($view->start_date)) ?></label>
                <label class="fs-5 fw-bold text-black">/</label>
                <label
                    class="badge badge-danger text-white fs-6 fw-bold"><?php echo date($common_date, strtotime($view->end_date)) ?></label>
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
			<?php if (!empty($view->image) && file_exists($photo_path)) { ?>
				<div class="image-input image-input-outline" data-kt-image-input="true"
					style="background-image: url('<?php echo $photo_url; ?>')">
					<div class="image-input-wrapper w-125px h-125px"
						style="background-image: url('<?php echo $photo_url; ?>')"></div>
				</div>
			<?php } else if (file_exists($letter_path)) { ?>
				<div class="image-input image-input-outline" data-kt-image-input="true"
                	style="background-image: url('<?php echo $letter_url ?>')">
					<div class="image-input-wrapper w-125px h-125px"
						style="background-image: url('<?php echo $letter_url ?>')"></div>
				</div>
			<?php } ?>
        </div>
    </div>
</div>
