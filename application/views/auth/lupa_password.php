<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 mt-5" style="border-radius:45px 0 45px 0;">
                            <div class="card-header bg-dark" style="border-radius:45px 0 0 0;"><h3 class="text-center text-white font-weight-light my-4">Lupa Password ?</h3></div>
                            <div class="card-body">
                            <?php echo $this->session->flashdata('pesan') ?>
                                <form action="<?php echo base_url() ?>auth/lupa_password" method="post">
                                    <div class="form-group">
                                        <label class="small mb-1 ml-3">Email</label>
                                        <input type="text" style="border-radius:20px 0 20px 0;" name="email" class="form-control py-4" value="<?php echo set_value('email'); ?>" placeholder="Username..." />
                                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="<?php echo base_url() ?>auth">Login</a>
                                        <button type="submit" class="btn btn-sm btn-primary" style="border-radius:15px 0 15px 0;">Kirim</button>
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