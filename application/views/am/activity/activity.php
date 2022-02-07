<div class="main-panel addmargin bg-panel">
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card bg-tabel">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title " style="color: white">Activity</h4>
							<button id="showModal" class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addActivity">
								<i class="fa fa-plus"></i>
								Add Activity
							</button>
						</div>
					</div>

					<div class="card-body bg-body-tabel">
						<!-- Modal -->
						<div class="modal fade" id="addActivity" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content bg-modal">
									<div class="modal-header bg-head-modal no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
												Add Activity</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body bg-body-modal">
										<form action="<?= base_url('activity_am/addActivity') ?>" method="post">
											<div class="row">
												<div class="col-6">
													<div class="form-group">
														<label>Name Activity</label>
														<input id="name_activity" name="name_activity" type="text" class="form-control" placeholder="Fill Name Activity" required>
													</div>

													<div class="form-group">
														<label>Type</label>
														<select id="type" name="type" class="form-control" required>
															<option value="" disabled selected hidden>Choose Activities Type</option>
															<option value="1">Call</option>
															<option value="2">Administration</option>
															<option value="3">Email/Fax</option>
															<option value="4">Customer Meeting</option>
															<option value="5">Visitation</option>
															<option value="6">Product Presentation</option>
														</select>
													</div>

													<div class="form-group ui-front">
														<label>Customer</label>
														<input id="customer" name="customer" type="text" class="form-control" placeholder="Fill Customer" required>
														<input id="id" name="id_customer" type="hidden" class="form-control" placeholder="Fill Customer" required>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label>Stage</label>
														<select id="stage" name="stage" class="form-control" required>
															<option value="" disabled selected hidden>Choose Activities Stage</option>
															<option value="1">Open Prospect</option>
															<option value="2">Prospecting Progress </option>
															<option value="3">Closing Deal</option>
															<option value="4">Fail</option>
															<option value="5">Project Progress</option>
														</select>
													</div>
													<div class="form-group">
														<label>Date</label>
														<input id="time" name="time" required placeholder="dd/mm/yyyy" type="" class="form-control time">
													</div>
													<div class="form-group">
														<label>Noted</label>
														<textarea name="note" id="note" class="form-control"></textarea>
													</div>
													<input type="hidden" name="done" id="done" value="1" class="form-control">
												</div>
											</div>
									</div>
									<div class="modal-footer bg-footer-modal no-bd">
										<input type="submit" id="addActivity" name="addActivity" class="btn btn-primary" value="Add">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
									</form>
								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Date</th>
										<th>Activity</th>
										<th>Customer Name</th>
										<th>Type</th>
										<th>Stage</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Date</th>
										<th>Activity</th>
										<th>Customer Name</th>
										<th>Type</th>
										<th>Stage</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
									foreach ($activities as $act) {
									?>
										<tr>
											<td>
												<?php if ($act->time == "0000-00-00") {
													echo "Not Set Yet";
												} else {
													echo date("d-F-Y", strtotime($act->time));
												} ?>
											</td>
											<td><?= $act->name_activity; ?></td>
											<td><?= $act->nama_customer; ?></td>
											<td><?= $act->type; ?></td>
											<td><?= $act->stage; ?></td>

											<td class="text-white">
												<a class="btn btn-xs btn-warning text-white" data-toggle="modal" data-target="#editActivity" id="buttonEditAct" data-time="<?= date("d-m-Y", strtotime($act->time)); ?>" data-idact="<?= $act->id_activity ?>" data-nama="<?= $act->name_activity ?>" data-type="<?= $act->id_type ?>" data-customer="<?= $act->nama_customer ?>" data-idcust="<?= $act->id_customer ?>" data-idstage="<?= $act->id_stage ?>" data-noted="<?= $act->note  ?> "><i data-toggle="tooltip" title="Detail Data" class="fas fa-pen-square"></i></a>
												<a class="btn btn-xs btn-danger activityDelete" href="<?= base_url('activity_am/activity?id=' . $act->id_activity); ?>"><i data-toggle="tooltip" title="Delete Data" class="fas fa-trash"></i></a>
											</td>
										</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>

						<!-- Modal Edit-->
						<div class="modal fade" id="editActivity" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content bg-modal">
									<div class="modal-header bg-head-modal no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
												Edit Activity</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body bg-body-modal">
										<form action="<?= base_url('activity_am/UpdateActivity') ?>" method="post">
											<div class="row">
												<div class="col-6">
													<div class="form-group">
														<label>Name Activity</label>
														<input name="EditIdAct" id="EditIdAct" type="hidden" class="form-control" value="<?= $idPlan; ?>" required>
														<input name="EditNameAct" id="EditNameAct" type="text" class="form-control" value="<?= $namaPlan; ?>" required>
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

													<div class="form-group ui-front">
														<label>Customer</label>
														<input id="EditNameCust" name="EditNameCust" type="text" class="form-control" placeholder="Fill Customer" required>
														<input id="EditIdCust" name="EditIdCust" type="hidden" class="form-control" placeholder="Fill Customer" required>
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
														<input id="EditTime" name="EditTime" required placeholder="dd/mm/yyyy" type="" class="form-control time">
													</div>
													<div class="form-group">
														<label>Noted</label>
														<textarea name="EditNote" id="EditNote" value="" class="form-control"></textarea>
													</div>
												</div>
											</div>
									</div>
									<div class="modal-footer bg-footer-modal no-bd">
										<input type="submit" id="updatePlan" name="updatePlan" class="btn btn-primary" value="Edit">
										<button type="button" class="btn btn-warning" data-dismiss="modal">Back</button>
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
	$(document).on('click', '#showModal', function() {
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = (day) + "-" + (month) + "-" + now.getFullYear();
		$('#time').val(today);

	});
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
<script type="text/javascript">
	$(document).ready(function() {

		$('.time').datepicker({
			dateFormat: 'dd-mm-yy'
		});
		$("#customer").autocomplete({
			minLength: 0,
			source: "<?php echo base_url('activity_am/get_autocomplete'); ?>",
			select: function(event, ui) {
				$('[name="customer"]').val(ui.item.customer);
				$('[name="id_customer"]').val(ui.item.id);
			},
			change: function(event, ui) {
				if (ui.item == null || ui.item == undefined) {
					$("#customer").val("");
					$("#customer").attr("disabled", false);
				} else {
					$("#customer").attr("disabled", false);
				}
			}
		}).focus(function() {
			$(this).autocomplete("search", $(this).val());
		});


		$('#EditNameCust').autocomplete({
			minLength: 0,
			source: "<?php echo base_url('activity_am/get_autocomplete'); ?>",
			select: function(event, ui) {
				$('[name="EditNameCust"]').val(ui.item.EditNameCust);
				$('[name="EditIdCust"]').val(ui.item.id);
			},
			change: function(event, ui) {
				if (ui.item == null || ui.item == undefined) {
					$("#EditNameCust").val("");
					$("#EditNameCust").attr("disabled", false);
				} else {
					$("#EditNameCust").attr("disabled", false);
				}
			}

		}).focus(function() {
			$(this).autocomplete("search", $(this).val());
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#multi-filter-select').DataTable({
			"columns": [{
					"width": "15%"
				},
				{
					"width": "25%"
				},
				null,
				null,
				null,
				{
					"width": "15%"
				}
			],
			"order": [
				[0, "desc"]
			],

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