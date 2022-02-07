<div class="main-panel addmargin bg-panel">
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card bg-tabel">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title" style="color: #fff">Plan</h4>
							<button id="showModal" class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addPlan">
								<i class="fa fa-plus"></i>
								Add Plan
							</button>
						</div>
					</div>

					<div class="card-body bg-body-tabel">
						<!-- Modal Plan-->
						<div class="modal fade" id="addPlan" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content bg-modal">
									<div class="modal-header bg-head-modal no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
												Add Plan</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true text-white">&times;</span>
										</button>
									</div>
									<div class="modal-body bg-body-modal">
										<form action="<?= base_url('activity_am/addPlan') ?>" method="post">
											<div class="row">
												<div class="col-6">
													<div class="form-group">
														<label>Name Activity</label>
														<input name="name_activity" id="name_activity" type="text" class="form-control" required placeholder="Fill Name Activity">
													</div>
													<div class="form-group ui-front">
														<label>Customer</label>
														<input id="customer" name="customer" type="text" class="form-control" required placeholder="Fill Customer">
														<input id="id" name="id_customer" type="hidden" class="form-control" required placeholder="Fill Customer">
													</div>
													<div class="form-group">
														<label>Type</label>
														<select id="type" name="type" class="form-control" required>
															<option value="" disabled selected hidden>Choose Plan Type</option>
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
														<select id="stage" name="stage" required class="form-control">
															<option value="" disabled selected hidden>Choose Plan Stage</option>
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
												</div>
											</div>
											<div class="modal-footer bg-footer-modal no-bd">
												<input type="submit" id="addingPlan" name="addingPlan" class="btn btn-primary" value="Add">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- Akhir Modal Plan -->

						<div class="table-responsive">
							<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width=100%>
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
									foreach ($plans as $plan) {
									?>
										<tr>
											<td>
												<?php if ($plan->time == "0000-00-00") {
													echo "Not Set Yet";
												} else {
													echo date("d-F-Y", strtotime($plan->time));
												} ?>
											</td>
											<td><?= $plan->name_activity; ?></td>
											<td><?= $plan->nama_customer; ?></td>
											<td> <?= $plan->type; ?></td>
											<td><?= $plan->stage; ?></td>


											<td class="text-white ">
												<a class="btn btn-xs btn-warning text-white" data-toggle="modal" data-target="#editPlan" id="buttonEditPlan" data-idplan="<?= $plan->id_activity ?>" data-nama="<?= $plan->name_activity ?>" data-type="<?= $plan->id_type ?>" data-time="<?= date("d-m-Y", strtotime($plan->time)); ?>" data-customer="<?= $plan->nama_customer ?>" data-idcust="<?= $plan->id_customer ?>" data-idstage="<?= $plan->id_stage ?>" data-noted="<?= $plan->note  ?> "><i data-toggle="tooltip" title="Detail Data" class="fas fa-pen-square"></i></a>
												<a class="btn btn-xs btn-danger planDelete" href="<?= base_url('activity_am/index?id=' . $plan->id_activity); ?>" id="planDelete" data-toggle="tooltip" title="Delete Data"><i class="fas fa-trash"></i> </a>
												<a class="btn btn-xs btn-success planDone" href="<?= base_url(); ?>activity_am/update/<?= $plan->id_activity ?>" id="planDone" data-toggle="tooltip" title="Done"><i class="fas fa-check"></i></a>
											</td>
										</tr>
									<?php    } ?>

								</tbody>
							</table>
						</div>
					</div>


					<!-- Modal Edit -->
					<div class="modal fade" id="editPlan" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content bg-modal">
								<div class="modal-header bg-head-modal no-bd">
									<h5 class="modal-title">
										<span class="fw-mediumbold">
											Edit Plan</span>
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body bg-body-modal">
									<form id="formUpdatePlan" action="<?= base_url('activity_am/UpdatePlan') ?>" method="post">
										<div class="row">
											<div class="col-6">

												<div class="form-group">
													<label>Name Activity</label>
													<input name="EditIdPlan" id="EditIdPlan" type="hidden" class="form-control" required>
													<input name="EditNamePlan" id="EditNamePlan" type="text" class="form-control" required>
												</div>
												<div class="form-group ui-front">
													<label>Customer</label>
													<input id="EditNameCust" name="EditNameCust" type="text" class="form-control" placeholder="Fill Customer" required>
													<input id="EditIdCust" name="EditIdCust" type="hidden" value="" class="form-control" placeholder="Fill Customer" required>
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
													<input id="EditTime" name="EditTime" placeholder="dd / mm / yyyy" type="" class="form-control time">
												</div>
												<div class="form-group">
													<label>Noted</label>
													<textarea name="EditNote" id="EditNote" class="form-control"></textarea>
												</div>
											</div>
										</div>
								</div>
								<div class="modal-footer bg-footer-modal no-bd">
									<input type="submit" id="sweetUpdatePlan" name="updatePlan" class="btn btn-primary" value="Edit">
									<button type="button" class="btn btn-warning" data-dismiss="modal">Back</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					<!--Akhir Edit Plan  -->

				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/js/plugin/datatables/datatables.min.js') ?>"></script>
<script>
	$(document).on('click', '#showModal', function() {
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = (day) + "-" + (month) + "-" + now.getFullYear();
		$('#time').val(today);

	});
	$(document).on('click', '#buttonEditPlan', function() {

		var EditIdPlan = $(this).data('idplan');
		var EditNamePlan = $(this).data('nama');
		var EditType = $(this).data('type');
		var EditNameCust = $(this).data('customer');
		var EditIdCust = $(this).data('idcust');
		var EditStage = $(this).data('idstage');
		var EditNote = $(this).data('noted');
		var EditTime = $(this).data('time');
		$("#EditIdPlan").val(EditIdPlan);
		$("#EditNamePlan").val(EditNamePlan);
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
<script type="text/javascript">
	$(document).ready(function() {

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