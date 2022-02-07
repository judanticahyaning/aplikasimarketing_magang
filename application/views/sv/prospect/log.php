<style>
    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
        visibility: hidden;
    }

    .dataTables_wrapper {
        margin-top: -3%;
    }
</style>
<div class="main-panel addmargin" style="background: linear-gradient(#8ACCED,#00A1F1)">
    <div class="page-inner ">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-tabel">
                    <div class="card-header">
                        <div class="row justify-content-center  ">
                            <div class="col-12 col-md-10 col-lg-8">
                                <form class="card card-sm">
                                    <div class="card-body bg-body-tabel row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <i class="h4 text-body"></i>
                                        </div>
                                        <!--end of col-->
                                        <div class="col ">
                                            <input class="form-control form-control-lg form-control-borderless" id="customSearchBox" type="search" placeholder="Search activity or keywords">
                                        </div>
                                        <!--end of col-->
                                        <div class="col-auto">
                                            <i class="fas fa-search fa-3x"></i>
                                        </div>
                                        <!--end of col-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-body-tabel">


                        <div class="table-responsive">
                            <table id="multi-filter-select" cellspacing="0" width="100%" class="display table table-striped table-hover table-border">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
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
                                                <?php if ($pros->cf == 0) { ?>
                                                    <center>
                                                        <a class="badge badge-danger text-white" data-toggle="modal"> Fail </a>
                                                    </center><?php } elseif ($pros->cf == 100) { ?>
                                                    <center>
                                                        <a class="badge badge-success text-white" data-toggle="modal" data-target="#editProspect<?= $pros->id_prospect; ?>"> Closing </a>
                                                    </center>
                                                <?php        } else { ?>

                                                    <center>
                                                        <a class="badge badge-warning text-white" data-toggle="modal" data-target="#editProspect<?= $pros->id_prospect; ?>"> On Progress </a>
                                                    </center>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
    $(document).ready(function() {

        var users = $('#multi-filter-select').DataTable({
            "columns": [{
                    "width": "20%"
                }, null, null, {
                    "width": "20%"
                },
                null,
                {
                    "width": "20%"
                }
            ],
            "info": true,
            "pageLength": 10,
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
        $('#customSearchBox').keyup(function() {
            users.search($(this).val()).draw();
        })

    });
</script>