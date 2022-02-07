<div class="main-panel addmargin bg-panel">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-tabel">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title" style="color: white">AM Data</h4>
                            <button class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addAM">
                                <i class="fa fa-plus"></i>
                                Add AM
                            </button>
                        </div>
                    </div>
                    <div class="card-body bg-body-tabel">
                        <!-- Modal Add-->
                        <div class="modal fade" id="addAM" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content bg-modal">
                                    <div class="modal-header bg-head-modal no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Add AM</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-body-modal">
                                        <form action="<?= base_url('activity_sv/AddAm') ?>" method="post">
                                            <div class="form-group">
                                                <label>AM Code</label>
                                                <input name="code_am" id="code_am" type="text" class="form-control" placeholder="Fill AM Code">
                                            </div>
                                            <div class="form-group">
                                                <label>AM Name</label>
                                                <input name="am_name" id="am_name" type="text" class="form-control" placeholder="Fill AM Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="password" id="password" type="text" class="form-control" placeholder="Fill Password">
                                            </div>
                                    </div>
                                    <div class="modal-footer bg-footer-modal no-bd">
                                        <input type="submit" id="addPlan" name="addPlan" class="btn btn-primary" value="Add">
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
                                        <!-- <th>No</th> -->
                                        <th>AM Code</th>
                                        <th>AM Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($am as $ams) { ?>
                                        <tr>
                                            <!-- <td>?=$bil;?></td> -->
                                            <td><?= $ams->kode_am; ?></td>
                                            <td><?= $ams->nama_am; ?></td>
                                            <td>
                                                <a class="btn btn-xs btn-warning text-white" data-id="<?= $ams->id_am ?>" data-kode="<?= $ams->kode_am ?>" data-nama="<?= $ams->nama_am ?>" data-password="<?= $ams->password ?>" data-toggle="modal" data-target="#editAM" id="buttonEditAM"> <i data-toggle="tooltip" title="Edit Data" class="fas fa-pen-square"></i></a>
                                                <a class="btn btn-danger btn-xs AMdelete" role="button" href="<?= base_url('Prospect_sv/am?id=' . $ams->id_am); ?>"> <i data-toggle="tooltip" title="Delete Data" class=" fas fa-trash"></i></a></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="editAM" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content bg-modal">
                                    <div class="modal-header bg-head-modal no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Edit AM</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-body-modal">
                                        <form action="<?= base_url('/prospect_sv/updateAM') ?>" method="post">
                                            <div class="form-group">
                                                <label>AM Code</label>
                                                <input name="EditKode" id="EditKode" type="text" class="form-control" placeholder="Fill AM Code">
                                                <input name="EditId" id="EditId" type="hidden" class="form-control" placeholder="Fill AM Code">
                                            </div>
                                            <div class="form-group">
                                                <label>AM Name</label>
                                                <input name="EditNama" id="EditNama" type="text" class="form-control" placeholder="Fill AM Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="EditPassword" name="EditPassword">
                                                <span toggle="#EditPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            </div>


                                    </div>
                                    <div class="modal-footer bg-footer-modal no-bd">
                                        <input type="submit" class="btn btn-primary" value="Edit">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).on('click', '#buttonEditAM', function() {
        var EditId = $(this).data('id');
        var EditKode = $(this).data('kode');
        var EditNama = $(this).data('nama');
        var EditPassword = $(this).data('password');
        $("#EditId").val(EditId);
        $("#EditKode").val(EditKode);
        $("#EditNama").val(EditNama);
        $("#EditPassword").val(EditPassword);
    });
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>