<div class="main-panel addmargin bg-panel">
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card bg-tabel">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title" style="color: white">Project</h4>

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
										<th>Project</th>
										<th>Customer</th>
										<th>Revenue</th>
										<th>Est Gross</th>
										<th>Start</th>
										<th>End</th>
										<th>File</th>

									</tr>
								</thead>
								<tfoot>
									<tr>
										<!-- <th></th> -->
										<th>AM Name</th>
										<th>Project</th>
										<th>Customer</th>
										<th>Revenue</th>
										<th>Est Gross</th>
										<th>Start</th>
										<th>End</th>
										<th>File</th>
									</tr>
								</tfoot>
								<tbody>
									<?php

									foreach ($projects as $pro) {
									?>
										<tr>
											<td><?= $pro->nama_am; ?></td>
											<td><?= $pro->nama_project; ?></td>
											<td><?= $pro->nama_customer; ?></td>

											<td>
												<?php
												echo "Rp " . number_format($pro->revenue, 2, ',', '.');
												?>
											</td>
											<td><?php echo "Rp " . number_format($pro->est_gross, 2, ',', '.'); ?></td>
											<td>
												<?php if ($pro->start == "0000-00-00") {
													echo "Not Set Yet";
												} else {
													echo date("d-F-Y", strtotime($pro->start));
												} ?>
											</td>
											<td>
												<?php if ($pro->end == "0000-00-00") {
													echo "Not Set Yet";
												} else {
													echo date("d-F-Y", strtotime($pro->end));
												} ?>
											</td>
											<td>
												<a id="showModal" class="btn modalViewProject btn-xs btn-info text-white " data-toggle="modal" data-target="#viewFile" data-idproject=<?= $pro->id_project ?>> <i data-toggle="tooltip" title="View File" class="fas fa-eye"></i></a>
											</td>

											<!-- <td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#editProspect<?= $pros->id_prospect; ?>"> Edit</a></td> -->
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

						<!-- Modal Plan-->
						<div class="modal fade" id="viewFile" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content bg-modal">
									<div class="modal-header bg-head-modal no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
												View File</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true text-white">&times;</span>
										</button>
									</div>
									<div class="modal-body bg-body-modal">

										<hr class="minusmargin">
										<table class="table form-control table-hover DynamicFiles">

										</table>

									</div>
								</div>
							</div>
						</div>
						<!-- Akhir Modal Plan -->


					</div>




				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>

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
	$(document).on('click', '.modalViewProject', function() {
		$(".DynamicFiles tr").remove();

		var EditIdProject = $(this).data('idproject');
		var settings = {
			"url": "getFile",
			"method": "GET",
			"timeout": 0,
		};
		var cekfile = 0;
		$.ajax(settings).done(function(response) {
			ArrayFileProject = JSON.parse(response);
			if (ArrayFileProject[0] == '') {} else {
				for (let i = 0, len = JSON.parse(response).length; i < len; i++) {
					var FileProject = ArrayFileProject[i];
					console.log(FileProject.id_project + " + " + EditIdProject);
					if (FileProject.id_project == EditIdProject) {
						cekfile++;
						$('.DynamicFiles').append('<tr class="row-file" id="rowfile' + i + '"><td><input name="listFile[]" type="hidden" value="' + FileProject.id_doc + '"><a download="<?= base_url('assets/file/') ?>' + FileProject.nama_doc + '" href="<?= base_url('assets/file/') ?>' + FileProject.nama_doc + '" class=""><h4>' + FileProject.nama_doc + '</h4></a></td></tr>');
					}
				}
				if (cekfile == 0) {
					$('.DynamicFiles').append('<tr class="row-file" id="rowfile0"><td><h4>No File Project Uploaded.</h4></a></td></tr>');

				}
			}
		});
	});
</script>