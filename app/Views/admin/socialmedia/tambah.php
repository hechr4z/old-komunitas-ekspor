<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Social Media</h1>
        <hr class="mb-4">

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Add Form -->
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/socialmedia/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <!-- Nama Platform -->
                            <div class="mb-3">
                                <label class="form-label" for="nama_sosmed">Nama Platform</label>
                                <input type="text" class="form-control" id="nama_sosmed" name="nama_sosmed" value="<?= old('nama_sosmed') ?>" required>
                            </div>

                            <!-- URL -->
                            <div class="mb-3">
                                <label class="form-label" for="link_sosmed">URL</label>
                                <input type="text" class="form-control" id="link_sosmed" name="link_sosmed" value="<?= old('link_sosmed') ?>" required>
                            </div>

                            <!-- Icon -->
                            <div class="mb-3">
                                <label class="form-label" for="icon_sosmed">Icon</label>
                                <input type="file" class="form-control" id="icon_sosmed" name="icon_sosmed" accept="image/*" required>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/socialmedia/index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-xl-->
</div><!--//app-content-->

<?= $this->endSection('content'); ?>
