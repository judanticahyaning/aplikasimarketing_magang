<div class="main-panel addmargin bg-panel">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-tabel">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title" style="color: white">Customer Data</h4>

                        </div>
                    </div>

                    <div class="card-body bg-body-tabel">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>AM Name</th>
                                        <th>Nama Customer</th>
                                        <th>Segment</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>AM Name</th>
                                        <th>Nama Customer</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php

                                    foreach ($customer as $dataCust) {

                                    ?>
                                        <tr>
                                            <td><?= $dataCust->nama_am; ?></td>
                                            <td><?= $dataCust->nama_customer; ?></td>
                                            <td>
                                                <?php if ($dataCust->segment == 'Goverment') { ?>
                                                    <center>
                                                        <a class="badge badge-warning text-white"> Goverment </a>
                                                    </center>
                                                <?php } elseif ($dataCust->segment == 'Corporate') { ?>
                                                    <center>
                                                        <a class="badge badge-success text-white"> Corporate </a>
                                                    </center>
                                                <?php } elseif ($dataCust->segment == 'BUMN') { ?>
                                                    <center>
                                                        <a class="badge badge-dark text-white"> BUMN </a>
                                                    </center>
                                                <?php } else { ?>
                                                    <center>
                                                        <a class="badge badge-primary text-white"> Academy </a>
                                                    </center>
                                                <?php } ?>

                                            </td>
                                            <td><?= $dataCust->email; ?></td>
                                            <?php if ($dataCust->id_am == $this->session->userdata('id_am')) {
                                            ?>
                                            <?php } else {
                                            ?>
                                                <td>
                                                    <a class="btn btn-xs btn-warning text-white" id="ButtonIdCust" data-idcustomer="<?= $dataCust->id_customer; ?>" data-toggle="modal" data-target="#editCustomer<?= $dataCust->id_customer; ?>"><i data-toggle="tooltip" title="Detail Data" class="fas fa-pen-square"></i></a>
                                                </td>
                                            <?php }; ?>
                                        </tr>
                                    <?php    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Edit-->
                    <?php
                    foreach ($customer as $dataCust) {
                        $idAm = $dataCust->id_am;
                        $nama_am = $dataCust->nama_am;
                        $idCust = $dataCust->id_customer;
                        $namaCust = $dataCust->nama_customer;
                        $segment = $dataCust->segment;
                        $email = $dataCust->email;
                        $contact = $dataCust->contact;

                    ?>

                        <div class="modal fade" id="editCustomer<?= $idCust; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content bg-modal">
                                    <div class="modal-header bg-head-modal no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Customer Detail</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-body-modal">
                                        <form action="<?= base_url('activity_sv/editCustomer') ?>" method="post">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>ID AM</label>
                                                        <select class="form-control" name="amCust" id="amCust" required>
                                                            <?php foreach ($am as $ams) { ?>
                                                                <option <?php if ($idAm == $ams->id_am) { ?> selected <?php } ?> value="<?= $ams->id_am ?>"><?= $ams->nama_am ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Name Customer</label>
                                                        <input name="EditIdCust" id="EditIdCust" type="hidden" class="form-control" value="<?= $idCust; ?>">
                                                        <input name="EditNameCust" id="EditNameCust" type="text" class="form-control" value="<?= $namaCust; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Segment</label>
                                                        <select class="form-control" name="SegmentCust" id="SegmentCust" require="">
                                                            <option value="Goverment" <?php if ($segment == "Goverment") {
                                                                                            echo "selected=\"selected\"";
                                                                                        } ?>>Goverment</option>
                                                            <option value="Corporate" <?php if ($segment == "Corporate") {
                                                                                            echo "selected=\"selected\"";
                                                                                        } ?>>Corporate</option>
                                                            <option value="BUMN" <?php if ($segment == "BUMN") {
                                                                                        echo "selected=\"selected\"";
                                                                                    } ?>>BUMN</option>
                                                            <option value="Academy" <?php if ($segment == "Academy") {
                                                                                        echo "selected=\"selected\"";
                                                                                    } ?>>Academy</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input name="Email" id="Email" class="form-control" value="<?= $email ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telephone</label>
                                                        <input name="Contact" id="Contact" class="form-control" value="<?= $contact ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>PIC</label>
                                                        <table class="" id="dynamic_fields<?= $dataCust->id_customer ?>">
                                                            <?php $i = 0;
                                                            foreach ($pic as $dataPic) {

                                                                if ($dataPic->id_customer == $dataCust->id_customer && $dataCust->id_am = $this->session->userdata('id_am')) {
                                                                    if ($i == 0) {
                                                                        $i++; ?>
                                                                        <tr id="<?= $dataCust->id_customer ?>rows">
                                                                            <td><input value="<?= $dataPic->nama_pic ?>" type="text" name="namaPIC[]" placeholder="Nama PIC" class="form-control name_list" /></td>
                                                                            <td><input value="<?= $dataPic->email ?>" type="text" name="emailPIC[]" placeholder="Email" class="form-control name_list" /></td>
                                                                            <td><input value="<?= $dataPic->telp ?>" type="text" name="telpPIC[]" placeholder="No. Telp" class="form-control name_list" /></td>
                                                                            <td><button type="button" name="adds<?= $dataCust->id_customer ?>" id="adds<?= $dataCust->id_customer ?>" onclick="reply_clickA(this.id,this.value)" value="<?= $dataCust->id_customer ?>" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
                                                                        </tr>
                                                                    <?php } else {
                                                                        $i++; ?>
                                                                        <tr id="<?= $dataCust->id_customer ?>rows<?= $i  ?>" class="dynamic-added">
                                                                            <td><input value=" <?= $dataPic->nama_pic ?>" type="text" name="namaPIC[]" placeholder="Nama PIC" class="form-control name_list" /> </td>
                                                                            <td><input value="<?= $dataPic->email ?>" type="text" name="emailPIC[]" placeholder="Email" class="form-control name_list" /></td>
                                                                            <td><input value="<?= $dataPic->telp ?>" type="text" name="telpPIC[]" placeholder="No. Telp" class="form-control name_list" /></td>
                                                                            <td><button type="button" name="remove" id="<?= $i ?>" class="btn btn-danger btn_removedA "><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                                                        </tr>
                                                                    <?php }
                                                                } else if (!$dataPic->id && $dataPic->id_customer == $dataCust->id_customer && $dataCust->id_am == $this->session->userdata('id_am')) {
                                                                    if ($i == 0) {
                                                                        $i++; ?>
                                                                        <tr id="<?= $dataCust->id_customer ?>rows">
                                                                            <td><input value="" type="text" name="namaPIC[]" placeholder="Nama PIC" class="form-control name_list" /></td>
                                                                            <td><input value="" type="text" name="emailPIC[]" placeholder="Email" class="form-control name_list" /></td>
                                                                            <td><input value="" type="text" name="telpPIC[]" placeholder="No. Telp" class="form-control name_list" /></td>
                                                                            <td><button type="button" name="adds<?= $dataCust->id_customer ?>" id="adds<?= $dataCust->id_customer ?>" onclick="reply_clickA(this.id,this.value)" value="<?= $dataCust->id_customer ?>" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                } else if ($dataPic->id_customer == $dataCust->id_customer && $dataCust->id_am != $this->session->userdata('id_am')) { ?>

                                                                    <tr id="<?= $dataCust->id_customer ?>rows">
                                                                        <td><input value="" type="text" name="namaPIC[]" placeholder="Nama PIC" class="form-control name_list" /></td>
                                                                        <td><input value="" type="text" name="emailPIC[]" placeholder="Email" class="form-control name_list" /></td>
                                                                        <td><input value="" type="text" name="telpPIC[]" placeholder="No. Telp" class="form-control name_list" /></td>
                                                                        <td><input value="" type="text" name="telpPIC[]" placeholder="No. Telp" class="form-control name_list" /></td>
                                                                    </tr>

                                                            <?php }
                                                            } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer bg-footer-modal no-bd">
                                        <input type="submit" id="updatePlan" name="updatePlan" class="btn btn-warning" value="Edit">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
<script src="<?= base_url('assets/') ?>js/core/jquery.min.js"></script>
<script src="<?= base_url('/assets/js/plugin/datatables/datatables.min.js') ?>"></script>

<script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>

<script type="text/javascript">
    let i = <?= $i ?>;
    let idcustomer = 0;
    let clickid;
    $(document).on('click', '#ButtonIdCust', function() {
        idcustomer = $(this).data('idcustomer');
        console.log("customer" + idcustomer);
    });
    $(document).on('click', '.btn_removedA', function() {
        var button_id = $(this).attr("id");
        console.log("customer" + idcustomer);
        console.log("id" + button_id);
        $('#' + idcustomer + 'rows' + button_id).remove();
    });

    function reply_clickA(clicked_id, customer) {
        console.log(customer);
        clickid = clicked_id,
            idcustomer = customer;

        i++;
        $('#dynamic_fields' + idcustomer).append('<tr id="' + idcustomer + 'rows' + i + '" class="dynamic-addeds">  <td><input type="text" name="namaPIC[]" placeholder="Nama PIC" class="form-control name_list" required="" /></td><td><input type="text" name="emailPIC[]" placeholder="Email" class="form-control name_list" required="" /></td><td><input type="text" name="telpPIC[]" placeholder="No. Telp" class="form-control name_list" required="" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_removedA"><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>');
    }

    function reply_clickB(clicked_id) {
        console.log(clicked_id);
        clickid = clicked_id,
            i++;
        $('#dynamic_field').append('<tr id="' + clickid + 'row' + i + '" class="dynamic-addeds">  <td><input type="text" name="namaPIC[]" placeholder="Nama PIC" class="form-control name_list" required="" /></td><td><input type="text" name="emailPIC[]" placeholder="Email" class="form-control name_list" required="" /></td><td><input type="text" name="telpPIC[]" placeholder="No. Telp" class="form-control name_list" required="" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_removedB"><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>');
    }


    $(document).on('click', '.btn_removedB', function() {
        var button_id = $(this).attr("id");
        $('#addrow' + button_id).remove();
    });
</script>

<script>
    $(document).ready(function() {
        $('#multi-filter-select').DataTable({
            order: [
                [3, 'asc']
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
            },
        });

    });
</script>