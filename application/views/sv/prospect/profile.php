<div class="main-panel addmargin bg-panel">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card bg-tabel">
                    <div class="card-header">
                        <div>
                            <h4 class="card-title" align="center" style="color: white">My Profile</h4>
                        </div>
                    </div>
                    <div class="card-body bg-body-tabel">
                        <center>
                            <div class="avatar avatar-xxl">
                                <img src=" <?php echo base_url('assets/image/'); ?><?php echo $profile->foto_am; ?> " width="100" height="110">
                                <h5 class="card-title" align="center"> <?= $profile->nama_am; ?></h5>
                            </div>
                        </center>

                        <?php echo form_open_multipart('prospect_sv/UpdateProfile'); ?>

                        <form method="post" action="<?= base_url('activity_am/UpdateProfile') ?>">
                            <div class="form-group">
                                <label for="username">Code</label>
                                <input type="text" class="form-control" id="kode_am" name="kode_am" value="<?= $profile->kode_am; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="nama_am" name="name_am" value="<?= $profile->nama_am; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password-field" name="password" value="<?= $profile->password; ?>">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <label for="previlege">Previlege</label>
                                <input type="text" class="form-control" id="previlege" name="previlege" value="<?= $profile->previlege; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Photo</label>
                                <input type="file" class="form-control" id="foto_am" name="foto_am">
                            </div>
                            <div class="modal-footer no-bd">
                                <button type="submit" name="change" class="btn no-bd btn-warning">Change</button>
                            </div>
                            <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/') ?>js/core/jquery.3.2.1.min.js"></script>
<script>
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