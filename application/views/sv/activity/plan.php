<div class="main-panel addmargin bg-panel">
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card bg-tabel">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title" style="color: white">Plan SPV</h4>

						</div>
					</div>
					<div class="card-body bg-body-tabel">
						<!-- Modal -->

						<div class="table-responsive">
							<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<!-- <th>No</th> -->
										<th>AM Name</th>
										<th>Date</th>
										<th>Customer Name</th>
										<th>Activity</th>
										<th>Type</th>
										<th>Stage</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>AM Name</th>
										<th>Date</th>
										<th>Activity</th>
										<th>Customer Name</th>
										<th>Type</th>
										<th>Stage</th>

									</tr>
								</tfoot>
								<tbody>
									<?php
									$time = 0;
									$bil = 0;
									foreach ($plans as $plan) { ?>
										<tr>
											<td><?= $plan->nama_am; ?></td>
											<td>
												<?php if ($plan->time == "0000-00-00") {
													echo "Not Set Yet";
												} else {
													echo date("d-F-Y", strtotime($plan->time));
												} ?>
											</td>
											<td><?= $plan->nama_customer; ?></td>
											<td><?= $plan->name_activity; ?></td>
											<td><?= $plan->type; ?></td>
											<td><?= $plan->stage; ?></td>
											<td class="text-white">
												<a class="btn btn-xs btn-info text-white" data-toggle="modal" data-target="#editPlan" id="buttonEditAct" data-time="<?= date("d-F-Y", strtotime($plan->time)); ?>" data-idact="<?= $plan->id_activity ?>" data-nama="<?= $plan->name_activity ?>" data-type="<?= $plan->id_type ?>" data-customer="<?= $plan->nama_customer ?>" data-idcust="<?= $plan->id_customer ?>" data-idstage="<?= $plan->id_stage ?>" data-noted="<?= $plan->note  ?> ">
													<i data-toggle="tooltip" title="Detail Data" class="fas fa-eye"></i></a>
											</td>
										</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>


						<div class="modal fade" id="editPlan" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content bg-modal">
									<div class="modal-header bg-head-modal no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
												Plan Detail</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body bg-body-modal">
										<form action="<?= base_url('') ?>" method="post">
											<div class="row">
												<div class="col-6">
													<div class="form-group">
														<label>Name Activity</label>
														<input name="EditNameAct" id="EditNameAct" type="text" class="form-control" required>
													</div>
													<div class="form-group ui-front">
														<label>Customer</label>
														<input id="EditNameCust" name="EditNameCust" type="text" class="form-control" placeholder="Fill Customer" required>
													</div>
													<div class="form-group">
														<label>Type</label>
														<select id="EditType" name="EditType" class="form-control" required>
															<option value="1">Call</option>
															<option value="2">Administration</option>
															<option value="3">Email/Fax</option>
															<option value="4">Customer Meeting</option>
															<option value="5">Visitation</option>
															<option value="6">Product Presentation</option>
														</select>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label>Stage</label>
														<select id="EditStage" name="EditStage" class="form-control" required>
															<option value="1">Open Prospect</option>
															<option value="2">Prospecting Progress </option>
															<option value="3">Closing Deal</option>
															<option value="4">Fail</option>
															<option value="5">Project Progress</option>
														</select>
													</div>
													<div class="form-group">
														<label>Date</label>
														<input name="EditTime" id="EditTime" type="" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Noted</label>
														<textarea name="EditNote" id="EditNote" value="" class="form-control"></textarea>
													</div>
												</div>
											</div>
									</div>
									<div class="modal-footer bg-footer-modal no-bd">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>
<script>
	$(document).on('click', '#buttonEditAct', function() {

		var EditIdAct = $(this).data('idact');
		var EditNameAct = $(this).data('nama');
		var EditType = $(this).data('type');
		var EditNameCust = $(this).data('customer');
		var EditIdCust = $(this).data('idcust');
		var EditStage = $(this).data('idstage');
		var EditNote = $(this).data('noted');
		var EditTime = $(this).data('time');
		$("#EditIdAct").val(EditIdAct);
		$("#EditNameAct").val(EditNameAct);
		$("#EditType").val(EditType);
		$("#EditNameCust").val(EditNameCust);
		$("#EditIdCust").val(EditIdCust);
		$("#EditStage").val(EditStage);
		$("#EditNote").val(EditNote);
		$("#EditTime").val(EditTime);

	});
</script>
<script>
	$(document).ready(function() {
		$('#multi-filter-select').DataTable({
			"pageLength": 5,
			initComplete: function() {
				this.api().columns().every(function() {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo($(column.footer()).empty())
						.on('change', function() {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function(d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
					});
				});
			}
		});

	});
</script>