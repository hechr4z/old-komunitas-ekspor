<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Admin</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/user/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Admin</label>
                                            <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= old('nama_user') ?>">
                                        </div>
                                        <!--<div class="mb-3">-->
                                        <!--    <label class="form-label">Role</label>-->
                                        <!--    <select class="form-select" id="role" name="role">-->
                                        <!--        <option value="admin">Admin</option>-->
                                        <!--        <option value="user">User</option>-->
                                                <!-- Tambahkan opsi untuk role lain jika diperlukan -->
                                        <!--    </select>-->
                                        <!--</div>-->
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="text" class="form-control" id="password" name="password" row="5" value="<?= old('password') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    <div class="col">
                                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <?php echo session()->getFlashdata('success') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div><!--//app-card-->

            </div>
        </div><!--//row-->

        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content'); ?>