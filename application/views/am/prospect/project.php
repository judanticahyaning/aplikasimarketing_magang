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

						<div class="table-responsive">
							<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Project</th>
										<th>Customer</th>
										<th>Revenue</th>
										<th>Est Gross</th>
										<th>Start</th>
										<th>End</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Project</th>
										<th>Customer</th>
										<th>Revenue</th>
										<th>Est Gross</th>
										<th>Start</th>
										<th>End</th>
									</tr>
								</tfoot>
								<tbody>
									<?php

									foreach ($projects as $pro) {
										$idProject = $pro->id_project;
										$idProspect = $pro->id_prospect;
										$namaProject = $pro->nama_project;
										$namaCust = $pro->nama_customer;
										$idCust = $pro->id_customer;
										$Revenue = $pro->revenue;
										$estGross = $pro->est_gross;
										$Start = $pro->start;
										$End = $pro->end;
									?>

										<tr>
											<td><?= $namaProject ?></td>
											<td><?= $namaCust; ?></td>
											<td>
												<?php
												echo "Rp " . number_format($Revenue, 2, ',', '.');
												?>
											</td>
											<td>
												<?= "Rp " . number_format($estGross, 2, ',', '.');
												?>
											</td>
											<td>
												<?php if ($Start == "0000-00-00") {
													echo "Not Set Yet";
												} else {
													echo $Start = date("d-F-Y", strtotime($Start));
												} ?>
											</td>
											<td>
												<?php if ($End == "0000-00-00") {
													echo "Not Set Yet";
												} else {
													echo $End = date("d-F-Y", strtotime($End));
												} ?>
											</td>

											<td><a id="modalEditProject" class="btn btn-xs btn-warning modalEditProject" data-toggle="modal" data-idproject="<?= $idProject ?>" data-idprospect="<?= $idProspect ?>" data-namaproject="<?= $namaProject ?>" data-namacust="<?= $namaCust ?>" data-idcust="<?= $idCust ?>" data-revenue="<?= $Revenue ?> " data-estgross="<?= $estGross ?>" data-start="<?= $pro->start ?>" data-end="<?= $pro->end ?>" data-target="#editProject"><i data-toggle="tooltip" title="Detail Data" class="fas fa-pen-square"></i></a></td>


										</tr>
									<?php }
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- modal edit -->
				<div class="modal fade  " id="editProject" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content bg-modal">
							<div class="modal-header bg-head-modal no-bd">
								<h5 class="modal-title">
									<span class="fw-mediumbold">
										Edit Project</span>
								</h5>
								<button type="button" class="close close-file" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!-- Awal form edit -->
							<div class="modal-body bg-body-modal ">
								<?php echo form_open_multipart('prospect_am/UpdateProject'); ?>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label>Project Name</label>
											<input name="EditIdProject" id="EditIdProject" type="hidden" class="form-control" required>
											<input name="EditIdProspect" id="EditIdProspect" type="hidden" class="form-control" required>
											<input name="EditIdFile" id="EditIdFile" type="hidden" class="form-control" required>
											<input name="EditNameProspect" id="EditNameProspect" type="text" class="form-control" required>
										</div>

										<div class="form-group ui-front">
											<label>Customer</label>
											<input id="EditNameCust" name="EditNameCust" type="text" class="form-control" placeholder="Fill Customer" required>
											<input id="EditIdCust" name="EditIdCust" type="hidden" class="form-control" placeholder="Fill Customer" required>

										</div>

										<div class="form-group">
											<label>Revenue</label>
											<input id="EditRevenue" name="EditRevenue" title="<?= $Revenue ?>" type="text" class="form-control">
										</div>
										<div class="row">
											<div class="col-4">
												<div class="form-group" id="FormPercentGross">
													<label>Est Gross (%)</label>
													<input id="EditPercentGross" name="EditPercentGross" type="text" class="form-control">
												</div>
											</div>
											<div class="col-8">
												<div class="form-group" id="FormEstGross">
													<label>Est Gross</label>
													<input id="EditEstGross" name="EditEstGross" type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Start</label>

											<input id="EditStart" name="EditStart" type="date" class="form-control">
										</div>
										<div class="form-group">
											<label>End</label>
											<input id="EditEnd" name="EditEnd" type="date" class="form-control">
										</div>
										<div class="form-group">
											<label class="">Upload File</label>
											<input id="doc" name="nama_doc[]" type="file" class="form-control">
										</div>

										<div class="form-group" id="UploadedFiles">
											<label>Uploaded File</label>
											<hr class="minusmargin">

											<table class="table form-control table-hover DynamicFiles">


											</table>

										</div>
										<div class="modal-footer bg-footer-modal no-bd">
											<input type="submit" id="updateProject" name="updateProject" class="btn btn-primary" value="Edit">
											<button type="button" class="btn btn-warning close-file" data-dismiss="modal">Back</button>
										</div>
									</div>
								</div>
								<?php echo form_close(); ?>
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
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/js/plugin/datatables/datatables.min.js') ?>"></script>
<script>
	$(document).on('click', '.modalEditProject', function() {
		$(".DynamicFiles tr").remove();

		var EditIdProject = $(this).data('idproject');
		var EditIdProspect = $(this).data('idprospect');
		var EditNameProspect = $(this).data('namaproject');
		var EditNameCust = $(this).data('namacust');
		var EditIdCust = $(this).data('idcust');
		var EditRevenue = $(this).data('revenue');
		var EditEstGross = $(this).data('estgross');
		var EditStart = $(this).data('start');
		var EditEnd = $(this).data('end');
		var allfiles = $(this).data('allfile')
		console.log(EditStart);
		$("#EditIdProject").val(EditIdProject);
		$("#EditIdProspect").val(EditIdProspect);
		$("#EditNameProspect").val(EditNameProspect);
		$("#EditNameCust").val(EditNameCust);
		$("#EditIdCust").val(EditIdCust);
		$("#EditEstGross").val(EditEstGross);
		$("#EditRevenue").val(EditRevenue);
		$("#EditStart").val(EditStart);
		$("#EditEnd").val(EditEnd);

		if ($("#EditEstGross").val() != null) {
			let percentage = ($("#EditEstGross").val() * 100) / $("#EditRevenue").val()
			$("input#EditPercentGross").val(percentage);
		} else if ($("#EditEstGross").val() == 0) {
			$("#EditPercentGross").val("0");
		} else {
			$("	#EditPercentGross").val("0");
		}
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
						$('.DynamicFiles').append('<tr class="row-file" id="rowfile' + i + '"><td><input name="listFile[]" type="hidden" value="' + FileProject.id_doc + '"><a download="<?= base_url('assets/file/') ?>' + FileProject.nama_doc + '" href="<?= base_url('assets/file/') ?>' + FileProject.nama_doc + '" class=""><h4>' + FileProject.nama_doc + '</h4></a></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-xs btn-danger btn_removedB"><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>');
					}
				}
				if (cekfile == 0) {
					$('.DynamicFiles').append('<tr class="row-file" id="rowfile0"><td><h4>No File Project Uploaded.</h4></a></td></tr>');

				}
			}
		});

	});
	$(document).on('click', '.btn_removedB', function() {
		var button_id = $(this).attr("id");
		$('#rowfile' + button_id).remove();
	});

	$(document).on('click', '.close-file', function() {
		$(".DynamicFiles tr").remove();
	});
</script>

<script type="text/javascript">
	let revenue = 0;
	let gross = 0;
	let percent = 0;

	$(document).ready(function() {
		//this calculates values automatically 			
		$("input#EditPercentGross").on('keypress keydown keyup', function() {
			revenue = $("#EditRevenue").val();
			estgross();
		});

		$("input#EditEstGross").on('keypress keydown keyup', function() {
			revenue = $("#EditRevenue").val();
			estpercent();
		});
	});

	function estgross() {
		//iterate through each textboxes and add the values
		$("input#EditPercentGross").each(function() {
			//add only if the value is number
			if (!isNaN(this.value) && this.value.length != 0) {
				gross = revenue * (parseFloat(this.value) / 100.00);
				// $(this).css("background-color", "#FEFFB0");
				$("#FormPercentGross").removeClass("has-error");
			} else if (this.value.length != 0) {
				$("#FormPercentGross").addClass("has-error");
			}
		});

		$("input#EditEstGross").val(gross.toFixed(2));
	}

	function estpercent() {
		//iterate through each textboxes and add the values
		$("input#EditEstGross").each(function() {
			//add only if the value is number
			if (!isNaN(this.value) && this.value.length != 0) {
				percent = ((parseFloat(this.value) * 100) / revenue);
				$("#FormEstGross").removeClass("has-error");
				// $(this).css("background-color", "#FEFFB0");
			} else if (this.value.length != 0) {
				$("#FormEstGross").addClass("has-error");
			}
		});

		$("input#EditPercentGross").val(percent.toFixed(2));
	}
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