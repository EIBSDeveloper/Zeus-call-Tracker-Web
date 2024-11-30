<?php $this->load->view("common.php"); ?>
<style>
.dataTables_scroll {
    position: relative;
    overflow: auto;
    min-height: 260px;
    max-height: 260px;
    /*the maximum height you want to achieve*/
    width: 100%;
}

.dataTables_scroll thead {

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
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-lg-4 mb-2">
                                <div class="card bg-primary">
                                    <div class="card-body text-center pb-2 px-2">
                                        <label class="text-white fw-bold fs-2">Total Subscribers</label>
                                        <div class="d-block text-center">
                                            <span
                                                class="text-white fw-bold fs-1"><?php echo sprintf("%02d", $total_subscriber->count); ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start px-2 mb-2">
                                        <label class="me-2">
                                            <i class="fa-solid fa-circle-info fs-6 text-white"></i>
                                        </label>
                                        <label class="d-block fs-7 fw-bold text-white">Upto (<?php echo date("F");?>)
                                            Month</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="card bg-success" style="background-color:#767260 !important;">
                                    <div class="card-body text-center pb-2 px-2">
                                        <label class="text-white fw-bold fs-2">Active Subscribers</label>
                                        <div class="d-block text-center">
                                            <span
                                                class="text-white fw-bold fs-1"><?php echo sprintf("%02d", $active_subscriber->count); ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start px-2 mb-2">
                                        <label class="me-2">
                                            <i class="fa-solid fa-circle-info fs-6 text-white"></i>
                                        </label>
                                        <label class="d-block fs-7 fw-bold text-white">Current Month
                                            (<?php echo date("F");?>)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="card bg-info" style="background-color:#0A7810 !important;">
                                    <div class="card-body text-center pb-2 px-2">
                                        <label class="text-white fw-bold fs-2">Expired Subscribers</label>
                                        <div class="d-block text-center">
                                            <span
                                                class="text-white fw-bold fs-1"><?php echo sprintf("%02d", $expired_subscriber->count); ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start px-2 mb-2">
                                        <label class="me-2">
                                            <i class="fa-solid fa-circle-info fs-6 text-white"></i></label>
                                        <label class="d-block fs-7 fw-bold text-white">Upto (<?php echo date("F");?>)
                                            Month</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card card-body">
                                    <div class="card-header border-bottom-0 py-0 mb-0 px-0">
                                        <h3 class="text-black d-flex align-items-center">
                                            New Subscribers (Recent 5)</h3>
                                        <div class="card-toolbar py-0">
                                            <a href="<?php echo base_url(); ?>Subscription_management"
                                                class="btn btn-primary btn-sm">View All</a>
                                        </div>
                                    </div>
                                    <table
                                        class="table align-middle table-striped table-hover fs-7 gy-3 gs-2 list_page">
                                        <thead>
                                            <tr class="text-start text-white fw-bold fs-6 gs-0 bg-primary">
                                                <th class="min-w-150px">Subscriber</th>
                                                <th class="min-w-80px">Company / Mobile No</th>
                                                <th class="min-w-80px">Package</th>
                                                <th class="min-w-100px">Start / End Date</th>
                                                <th class="min-w-100px">Renewal Days</th>
                                                <th class="min-w-80px">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-800 fw-bold fs-7">
                                            <?php if(isset($subscriber_data)){?>
                                            <?php foreach ($subscriber_data as $i => $sublist) { ?>
                                            <?php 
															$duration = $sublist->duration == '3'? 'Life Time':( $sublist->duration == '1' ? 'Month':'Year')
														?>
                                            <?php
														$first_character = isset($sublist->name) && $sublist->name ? $sublist->name[0] : 'A';
														$str = strtoupper($first_character);

														$photo_url = base_url() . 'assets/Images/users/' . $sublist->image;
														$letter_url = base_url() . 'assets/Images/Letters/' . $str . '.png';
														$photo_path = FCPATH . 'assets/Images/users/' . $sublist->image;
														$letter_path = FCPATH . 'assets/Images/Letters/' . $str . '.png';
														?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <?php if (!empty($sublist->image) && file_exists($photo_path)) { ?>
                                                        <a class="d-block overlay text-center me-3"
                                                            href="<?php echo $photo_url; ?>"
                                                            data-fslightbox="lightbox-basic_list">
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px"
                                                                style="background-image:url('<?php echo $photo_url; ?>')">
                                                            </div>
                                                            <div
                                                                class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
                                                                <i class="bi bi-eye-fill text-white fs-2"></i>
                                                            </div>
                                                        </a>
                                                        <?php } else if (file_exists($letter_path)) { ?>
                                                        <a class="d-block overlay text-center me-3"
                                                            href="<?php echo $letter_path; ?>"
                                                            data-fslightbox="lightbox-basic_list">
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-45px h-45px"
                                                                style="background-image:url('<?php echo $letter_path; ?>')">
                                                            </div>
                                                            <div
                                                                class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow w-45px h-45px">
                                                                <i class="bi bi-eye-fill text-white fs-2"></i>
                                                            </div>
                                                        </a>

                                                        <?php } ?>
                                                        <div class="mb-0 me-2">
                                                            <label
                                                                class="fs-7 fw-semibold text-black"><?php echo $sublist->name ?></label>
                                                            <label
                                                                class="cursor-pointer fs-7 fw-semibold text-black ms-1"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="<?php echo $sublist->email_id ?>">
                                                                <i class="fa-solid fa-envelope fs-5 text-black"></i>
                                                            </label>
                                                            <div class="d-block fs-8 fw-semibold text-gray-600"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Created Date">
                                                                <?php echo date($common_date,strtotime($sublist->created_at)) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-start">
                                                    <label
                                                        class="fs-7 text-black"><?php echo $sublist->company_name ?></label>
                                                    <div class="d-block">
                                                        <div class="badge badge-secondary fw-bold text-black fs-8">
                                                            <?php echo $sublist->mobile_no ?></div>
                                                    </div>
                                                </td>
                                                <td class="text-start">
                                                    <label
                                                        class="fs-7 text-black"><?php echo $sublist->package_name ?></label>
                                                    <label class="fs-7 text-black ms-1 me-1">/</label>
                                                    <label
                                                        class="fs-7 text-black"><?php echo $sublist->duration == '3'? ' '.$duration: $sublist->period .' '.$duration ?></label>
                                                    <div class="d-block">
                                                        <label class="badge badge-warning fs-8 text-black me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Caller Count"><?php echo $sublist->no_of_callers ?></label>
                                                        <label class="badge badge-info">
                                                            <span class="fs-8 text-black">
                                                                <i
                                                                    class="fa-solid fa-indian-rupee-sign fs-8 text-white me-1"></i>
                                                            </span>
                                                            <span
                                                                class="fs-8 text-white"><?php echo IND_money_format($sublist->amount);  ?></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td align="start">
                                                    <div class="badge badge-success fs-7">
                                                        <?php echo date($common_date,strtotime($sublist->start_date)) ?>
                                                    </div>
                                                    <div class="d-block mt-1">
                                                        <div class="badge badge-danger fs-7">
                                                            <?php echo date($common_date,strtotime($sublist->end_date)) ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td align="start">
                                                    <div class="badge badge-warning text-black fs-7">
                                                        <?php echo renewal_days_count($sublist->subscriber_id)?> Days
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if($sublist->status==0) { ?>
                                                    <button
                                                        class="badge badge-success text-white fw-bold fs-7 rounded border-0"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                        data-kt-menu-overflow="true">Active Subscriber</button>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px mt-1"
                                                        data-kt-menu="true">
                                                        <div class="py-3">
                                                            <div class="menu-item px-3">
                                                                <a href="javascript:;" class="menu-link px-3"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_block_subscriber"
                                                                    onclick="block_func(<?php echo $sublist->user_id;?>,'<?php echo $sublist->name;?>')">Block
                                                                    Subscriber</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } else if($sublist->status == 1) { ?>
                                                    <button
                                                        class="badge badge-warning text-black fw-bold fs-7 rounded border-0"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                        data-kt-menu-overflow="true"
                                                        style="background-color: #FF7F00 !important;">Blocked
                                                        Subscriber</button>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px mt-1"
                                                        data-kt-menu="true">
                                                        <div class="py-3">
                                                            <div class="menu-item px-3">
                                                                <a href="javascript:;" class="menu-link px-3"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_unblock_subscriber"
                                                                    onclick="unblock_func(<?php echo $sublist->user_id;?>,'<?php echo $sublist->name;?>')">Unblock
                                                                    Subscriber</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }else if($sublist->status ==3) { ?>
                                                    <div class="badge badge-danger text-white fw-bold fs-7 rounded">
                                                        Expired</div>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-10 mb-3 mb-xl-5">
                            <!-- <div class="col-lg-6">
									<div class="card card-body">
						    		<div id="chart_weekly_work_summary"></div>
						    	</div>
						    </div> -->
                            <!-- <div class="col-lg-6">
									<div class="card card-body">
						    		<div id="chart_weekly_subscriber_creation_summary"></div>
						    	</div>
						    </div> -->
						
                            <div class="col-lg-12">
                                <div class="card card-body h-500px">
                                    <div id="chart_monthly_withdraw_summary"></div>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
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
			// "ordering": false,
			"aaSorting": [],
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
			"dom": "<'row'" +
				// "<'col-sm-6 d-flex align-items-center justify-conten-start my-3'l>" +
				// "<'col-sm-12 d-flex align-items-center justify-content-end my-3'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				// "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"
		});
		$('.list_page').wrap('<div class="dataTables_scroll" />');
    </script>  

    <!-- Monthly Withdraw Summary Start -->
	<script>
		// Assuming data is dynamically generated in PHP
		var data = <?php echo json_encode($all_month); ?>;

		// Initialize arrays
		var monthlyData = Array(12).fill(0); // Initialize array with 0 for each month
		var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

		// Fill monthlyData with actual values from data
		data.forEach(function(item) {
			var monthIndex = parseInt(item.month) - 1; // Convert month number to zero-based index
			monthlyData[monthIndex] = Math.round(item.count); // Round the count to the nearest integer
		});

		// Calculate maximum value in monthlyData
		var maxValue = Math.max(...monthlyData);

		// Determine Y-axis max value: if maxValue < 11, use 10; otherwise let ApexCharts handle it
		var yAxisMax = maxValue < 11 ? 10 : undefined;

		var options = {
			series: [{
				name: 'Subscribers',
				data: monthlyData
			}],
			yaxis: {
				labels: {
					formatter: function(value) {
						return Math.round(value); // Round the axis labels to integers
					}
				},
				max: yAxisMax // Set Y-axis maximum value dynamically
			},
			chart: {
				type: 'area',
				height: '450px',
				zoom: {
					enabled: false
				}
			},
			title: {
				text: 'Monthly Subscribers Summary (<?php echo date("M-Y"); ?>)',
				align: 'center',
				fontWeight: 'bold',
				style: {
					fontSize: '18px',
				}
			},
			legend: {
				position: 'bottom',
				horizontalAlign: 'right',
				fontSize: "12px"
			},
			colors: ["#7239ea"],
			dataLabels: {
				enabled: false
			},
			stroke: {
				curve: 'smooth'
			},
			xaxis: {
				tooltip: {
					enabled: false
				},
				labels: {
					show: true,
				},
				categories: months
			}
		};

		var chart = new ApexCharts(document.querySelector("#chart_monthly_withdraw_summary"), options);
		chart.render();
	</script>
	<!-- Monthly Withdraw Summary end -->

    <script>
		$('#kt_modal_transaction_password').on('shown.bs.modal', function() {
			$('#code_1').focus();
		})

		"use strict";
		var KTSigninTwoFactor = function() {
			var t, e;
			return {
				init: function() {
					var n, i, o, u, r, c;
					t = document.querySelector("#kt_view_dashboard_form");
					n = t.querySelector("[name=code_1]"), i = t.querySelector("[name=code_2]"), o = t.querySelector(
						"[name=code_3]"), u = t.querySelector("[name=code_4]"), n.focus(), n.addEventListener(
						"keyup", (function() {
							1 === this.value.length && i.focus()
						})), i.addEventListener("keyup", (function() {
						1 === this.value.length && o.focus()
					})), o.addEventListener("keyup", (function() {
						1 === this.value.length && u.focus()
					})), u.addEventListener("keyup", (function() {
						1 === this.value.length && r.focus()
					}))
				}
			}
		}();
		KTUtil.onDOMContentLoaded((function() {
			KTSigninTwoFactor.init()
		}));
    </script>

</body>
<!--end::Body-->

</html>
