<div class="main-panel addmargin bg-panel">
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card bg-tabel">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title" style="color: white">Prospect</h4>
							<button class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addProspect">
								<i class="fa fa-plus"></i>
								Add Prospect
							</button>
						</div>
					</div>
					<div class="card-body bg-body-tabel">
						<!-- Modal -->
						<div class="modal fade" id="addProspect" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content bg-modal">
									<div class="modal-header bg-head-modal no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
												Add Prospect</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body bg-body-modal">

										<!-- Awal Form -->

										<form action="<?= base_url('Prospect_am/addProspect') ?>" method="post">

											<div class="form-group">
												<label>Prospect Name</label>
												<input name="nama_project" id="nama_project" type="text" class="form-control" placeholder="Fill Prospect Name" required>
											</div>

											<div class="form-group">
												<label>CF</label>
												<select id="cf" name="cf" class="form-control" required>
													<option value="" disabled selected hidden>Choose CF</option>
													<option value="30">30%</option>
													<option value="60">60%</option>
													<option value="90">90%</option>
													<option value="100">100%</option>
												</select>
											</div>

											<div class="form-group ui-front">
												<label>Customer</label>
												<input id="customer" name="customer" type="text" class="form-control" placeholder="Fill Customer" required>
												<input id="id" name="id_customer" type="hidden" class="form-control" placeholder="Fill Customer" required>

											</div>

											<div class="form-group">
												<label>Est Value</label>
												<input name="est_value" id="est_value" type="text" class="form-control" placeholder="Fill Est Value" required>
											</div>

											<div class="form-group">
												<label>Lead</label>
												<select id="lead" name="lead" class="form-control" required>
													<option value="" disabled selected hidden>Choose Lead</option>
													<option value="Existing Klien">Existing Klien</option>
													<option value="Event">Event</option>
													<option value="Partner">Partner</option>
													<option value="Self Genereated">Self Generated</option>
													<option value="Worth of Mouth">Worth of Mouth</option>
													<option value="Digital Marketing">Digital Marketing</option>
													<option value="Tim Teknis">Tim Teknis</option>
													<option value="Management">Management</option>
													<option value="Info Email">Info Email</option>
												</select>

											</div>
									</div>
									<div class="modal-footer bg-footer-modal no-bd">
										<input type="submit" id="addProspect" name="addProspect" class="btn btn-primary" value="Add">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
									</form>

									<!-- akhir form -->

								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table id="multi-filter-select" cellspacing="0" width="100%" class="display table table-striped table-hover table-border">
								<thead>
									<tr>
										<th>Prospect Name</th>
										<th>Customer Name</th>
										<th>CF</th>
										<th>Est Value</th>
										<th>Lead</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Project Name</th>
										<th>Customer Name</th>
										<th>CF</th>
										<th>Est Value</th>
										<th>Lead</th>
									</tr>
								</tfoot>
								<tbody>
									<?php

									foreach ($prospects as $pros) {
									?>
										<tr>
											<td><?= $pros->nama_project; ?></td>
											<td><?= $pros->nama_customer; ?></td>
											<td> <?= $pros->cf; ?> <?= "%"; ?></td>
											<td><?php echo "Rp " . number_format($pros->est_value, 2, ',', '.'); ?></td>
											<td><?= $pros->lead; ?></td>
											<td>

												<a id="buttonEditProspect" class="btn btn-xs btn-warning text-white" data-toggle="modal" data-idprospect="<?= $pros->id_prospect ?>" data-namaprospect="<?= $pros->nama_project ?>" data-cf="<?= $pros->cf ?>" data-namacust="<?= $pros->nama_customer ?>" data-idcust="<?= $pros->id_customer ?>" data-estvalue="<?= $pros->est_value ?>" data-leads="<?= $pros->lead ?>" data-target="#editProspect"><i data-toggle="tooltip" title="Edit Data" class="fas fa-pen-square"></i></a>
												<a class="btn btn-xs  btn-danger Prospectdelete" href="<?= base_url(); ?>prospect_am/fail/<?= $pros->id_prospect ?>" data-toggle="tooltip" title="Fail"><i class="fas fa-times"></i></a>

											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>



						<!-- Modal Edit-->
						<div class="modal fade" id="editProspect" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content bg-modal">
									<div class="modal-header bg-head-modal no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
												Edit Prospect</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<!-- Awal form edit -->

									<div class="modal-body bg-body-modal">
										<form action="<?= base_url('prospect_am/UpdateProspect') ?>" method="post">
											<div class="form-group">
												<label>Prospect Name</label>
												<input name="EditIdProspect" id="EditIdProspect" type="hidden" class="form-control" required>
												<input name="EditNameProspect" id="EditNameProspect" type="text" class="form-control" required>
											</div>

											<div class="form-group">
												<label>CF</label>
												<select name="EditCf" id="EditCf" class="form-control" required>
													<option value="30">30%</option>
													<option value="60">60%</option>
													<option value="90">90%</option>
													<option value="100">100%</option>
												</select>
											</div>

											<div class="form-group ui-front">
												<label>Customer</label>
												<input id="EditNameCust" name="EditNameCust" type="text" class="form-control" placeholder="Fill Customer" required>
												<input id="EditIdCust" name="EditIdCust" type="hidden" class="form-control" placeholder="Fill Customer" required>

											</div>

											<div class="form-group">
												<label>Est Value</label>
												<input name="EditEstValue" id="EditEstValue" class="form-control" required>
											</div>

											<div class="form-group">
												<label>Lead</label>
												<select id="EditLead" name="EditLead" class="form-control" required>
													<option value="Existing Klien">Existing Klien</option>
													<option value="Event">Event</option>
													<option value="Partner">Partner</option>
													<option value="Self Genereated">Self Generated</option>
													<option value="Worth of Mouth">Worth of Mouth</option>
													<option value="Digital Marketing">Digital Marketing</option>
													<option value="Tim Teknis">Tim Teknis</option>
													<option value="Management">Management</option>
													<option value="Info Email">Info Email</option>
												</select>
											</div>

											<div class="modal-footer bg-footer-modal no-bd">
												<input type="submit" id="updateProspect" name="updateProspect" class="btn btn-primary" value="Edit">
												<button type="button" class="btn btn-warning" data-dismiss="modal">Back</button>
											</div>
										</form>
									</div>

									<!-- Akhir Form edit -->

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>
<script>
	$(document).on('click', '#buttonEditProspect', function() {

		var EditIdProspect = $(this).data('idprospect');
		var EditNameProspect = $(this).data('namaprospect');
		var EditCf = $(this).data('cf');
		var EditIdCust = $(this).data('idcust');
		var EditNameCust = $(this).data('namacust');
		var EditEstValue = $(this).data('estvalue');
		var EditLead = $(this).data('leads');

		$("#EditIdProspect").val(EditIdProspect);
		$("#EditNameProspect").val(EditNameProspect);
		$("#EditCf").val(EditCf);
		$("#EditIdCust").val(EditIdCust);
		$("#EditNameCust").val(EditNameCust);
		$("#EditEstValue").val(EditEstValue);
		$("#EditLead").val(EditLead);

	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#EditNameCust').autocomplete({
			minLength: 0,
			source: "<?php echo base_url('Prospect_am/get_autocomplete'); ?>",
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
			source: "<?php echo base_url('Prospect_am/get_autocomplete'); ?>",
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
					"width": "20%"
				},
				null,
				null,
				null,
				null,
				{
					"width": "20%"
				}
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