<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 mt-5" style="border-radius:45px 0 45px 0;">
                            <div class="card-header bg-dark" style="border-radius:45px 0 0 0;"><h3 class="text-center text-white font-weight-light my-4">Reset password</h3></div>
                            <div class="card-body">
                            <?php echo $this->session->flashdata('pesan') ?>
                                <form action="<?php echo base_url() ?>auth/reset_password" method="post">
                                    <div class="form-group">
                                        <label class="small mb-1 ml-3">Password</label>
                                        <input type="password" style="border-radius:20px 0 20px 0;" name="password" class="form-control py-4" value="<?php echo set_value('password'); ?>" placeholder="Username..." />
                                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('password'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1 ml-3">Konfirmasi Password</label>
                                        <input type="password" style="border-radius:20px 0 20px 0;" name="konfirmasi_password" class="form-control py-4" placeholder="Password" />
                                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('konfirmasi_password'); ?></small>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button type="submit" class="btn btn-sm btn-primary" style="border-radius:15px 0 15px 0;">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>