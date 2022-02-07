<!------ Include the above in your HEAD tag ---------->
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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="main-panel addmargin bg-panel">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-tabel">
                    <div class="card-header">
                        <div class="row justify-content-center logmargin  ">
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
                            <table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tiers</th>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>Customer Name</th>
                                        <th>Noted</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($plans as $plan) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                if ($plan->done == 0) {
                                                ?>
                                                    <badge class="badge badge-warning">Plan</badge>
                                                <?php
                                                } else {
                                                ?>
                                                    <badge class="badge badge-success">Done</badge>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($plan->time == "0000-00-00") {
                                                    echo "Not Set Yet";
                                                } else {
                                                    echo date("d-F-Y", strtotime($plan->time));
                                                } ?>
                                            </td>
                                            <td><?= $plan->name_activity; ?></td>
                                            <td><?= $plan->nama_customer; ?></td>
                                            <td><?= $plan->note; ?></td>
                                        </tr>
                                    <?php    } ?>

                                </tbody>
                            </table>
                        </div>
                        <!--end of col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>

<script>
    $(document).ready(function() {

        var users = $('#multi-filter-select').DataTable({
            "columns": [{
                    "width": "10%"
                }, {
                    "width": "15%"
                },
                {
                    "width": "20%"
                },
                {
                    "width": "20%"
                },
                {
                    "width": "25%"
                }
            ],
            "order": [
                [0, "desc"]
            ],

            "bLengthChange": false,
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