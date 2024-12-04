<?php $common_date = get_general_settings()->date_format ?? 'd-M-Y';?>
		<?php 
				$duration = $package_detail->duration == '3'? 'Life Time':( $package_detail->duration == '1' ? 'Month':'Year')
			?>
			<div class="text-center">
	                    <h1 class="mb-6">Subscription History</h1>
	                </div>
					<div class="row">
						<div class="col-lg-6">
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Package</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold"><?php echo $package_detail->package_name ?></label>
							</div>
							<div class="row mb-2">
								<label class="col-5 fs-6 fw-semibold">Duration</label>
								<label class="col-1 fs-6 fw-bold">:</label>
								<label class="col-6 fs-5 fw-bold"><?php echo $package_detail->duration == '3'? ' '.$duration: $package_detail->period .' '.$duration ?></label>
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
									<?php if(isset($sub_history)){?>
										<?php foreach ($sub_history as $i => $sublist) { ?>
											<tr>
												<td align="start">
													<label><?php echo date($common_date,strtotime($sublist->created_at)) ?></label>
													<div class="d-block">
														<?php if($sublist->status == "4") {?>
														<label class="badge badge-warning text-black fs-7"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Renewal Days"><?php echo renewal_days_count($sublist->subscriber_id)?> Days</label>
														<?php }?>
													</div>
												</td>
												<td class="text-center">
													<label class="badge badge-info fs-8 text-white me-1"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Purchased Caller Count"><?php echo sprintf("%02d", $sublist->no_of_callers); ?></label>
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
													<?php if($sublist->status == "4") {?>
														<div class="badge badge-danger text-white fw-bold fs-7 rounded">Expired</div>
													<?php } else if($sublist->status == "3") {?>
														<div class="badge badge-danger text-black fw-bold fs-7 rounded" style="background-color: #FF7F00 !important;">Renewal</div>
													<?php } else if($sublist->status == "1") {?>
														<div class="badge badge-warning text-black fw-bold fs-7 rounded">Callers Added</div>
													<?php } else if($sublist->status == "0") {?>
														<div class="badge badge-warning text-black fw-bold fs-7 rounded">New Purchased</div>
													<?php } ?>
												</td>
											</tr>
										<?php }?>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
