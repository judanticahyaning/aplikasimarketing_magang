<div class="main-panel addmargin bg-panel">
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card bg-tabel">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title" style="color: white">Prospect</h4>

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

										<form action="<?= base_url('Prospect_sv/addProspect') ?>" method="post">

											<div class="form-group">
												<label>Prospect Name</label>
												<input name="nama_project" id="nama_project" type="text" class="form-control" placeholder="Fill Prospect Name">
											</div>

											<div class="form-group">
												<label>CF</label>
												<select id="cf" name="cf" class="form-control">
													<option value="30">30%</option>
													<option value="60">60%</option>
													<option value="90">90%</option>
													<option value="100">100%</option>
												</select>
											</div>

											<div class="form-group ui-front">
												<label>Customer</label>
												<input id="customer" name="customer" type="text" class="form-control" placeholder="Fill Customer">
												<input id="id" name="id_customer" type="hidden" class="form-control" placeholder="Fill Customer">

												<!-- Autocomplete customer -->
												<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
												<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
												<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
												<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
												<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>

												<script type="text/javascript">
													$(document).ready(function() {

														$('#customer').autocomplete({
															source: "<?php echo base_url('activity_am/get_autocomplete'); ?>",
															select: function(event, ui) {
																$('[name="customer"]').val(ui.item.customer);
																$('[name="id_customer"]').val(ui.item.id);
															}
														});
													});
												</script>
												<!--  END Autocomplete customer -->
												<a href="<?php echo base_url('activity_am/customer'); ?>" class="btn btn-warning">Add Customer</a>
											</div>

											<div class="form-group">
												<label>Est Value</label>
												<input name="est_value" id="est_value" type="text" class="form-control" placeholder="Fill Est Value">
											</div>

											<div class="form-group">
												<label>Lead</label>
												<input name="lead" id="lead" class="form-control" placeholder="Fill Lead">
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
							<table id="multi-filter-select" class="display table table-striped table-hover table-border">
								<thead>
									<tr>
										<th>AM Name</th>
										<th>Project Name</th>
										<th>Customer Name</th>
										<th>CF</th>
										<th>Est Value</th>
										<th>Lead</th>

									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>AM Name</th>
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
											<td><?= $pros->nama_am; ?></td>
											<td><?= $pros->nama_project; ?></td>
											<td><?= $pros->nama_customer; ?></td>
											<td> <?= $pros->cf; ?> <?= "%"; ?></td>
											<td><?php echo "Rp " . number_format($pros->est_value, 2, ',', '.'); ?></td>
											<td><?= $pros->lead; ?></td>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>


					<!-- Modal Edit-->
					<?php
					foreach ($prospects as $pros) {
						$idProspect = $pros->id_prospect;
						$namaProspect = $pros->nama_project;
						$CF = $pros->cf;
						$namaCust = $pros->nama_customer;
						$idCust = $pros->id_customer;
						$value = $pros->est_value;
						$leads = $pros->lead;
					?>

						<div class="modal fade" id="editProspect<?= $pros->id_prospect; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
												<input name="EditIdAct" id="id_prospect" type="hidden" class="form-control" value="<?= $idProspect; ?>">
												<input name="EditNameAct" id="EditNameAct" type="text" class="form-control" value="<?= $namaProspect; ?>">
											</div>

											<div class="form-group">
												<label>CF</label>
												<select name="EditCf" id="EditCf" class="form-control">
													<option value="30">30%</option>
													<option value="60">60%</option>
													<option value="90">90%</option>
													<option value="100">100%</option>
												</select>
											</div>

											<div class="form-group ui-front">
												<label>Customer</label>
												<input id="EditNameCust" name="EditNameCust" type="text" value="<?= $namaCust; ?>" class="form-control" placeholder="Fill Customer">
												<input id="id" name="EditIdCust" type="hidden" value="<?= $idCust; ?>" class="form-control" placeholder="Fill Customer">

												<!-- Autocomplete customer -->
												<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
												<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
												<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
												<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
												<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>

												<script type="text/javascript">
													$(document).ready(function() {

														$('#EditNameCust').autocomplete({
															source: "<?php echo base_url('Prospect_am/get_autocomplete'); ?>",
															select: function(event, ui) {
																$('[name="EditNameCust"]').val(ui.item.EditNameCust);
																$('[name="EditIdCust"]').val(ui.item.id);
															}
														});
													});
												</script>
												<!--  END Autocomplete customer -->
												<a href="<?php echo base_url('Prospect_am/customer'); ?>" class="btn btn-warning">Add Customer</a>
											</div>

											<div class="form-group">
												<label>Est Value</label>
												<input name="EditEst_value" id="EditEst_value" class="form-control" value="<?= $value; ?>">
											</div>

											<div class="form-group">
												<label>Lead</label>
												<input name="EditLead" id="EditLead" class="form-control" value="<?= $leads; ?>">
											</div>
									</div>
									<div class="modal-footer bg-footer-modal no-bd">
										<input type="submit" id="updateProspect" name="updateProspect" class="btn btn-primary" value="Update">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
									</form>
								</div>

								<!-- Akhir Form edit -->

							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('/assets/js/plugin/datatables/datatables.min.js') ?>"></script>
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