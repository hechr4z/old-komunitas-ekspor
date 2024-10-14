<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambah Keuntungan</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/keuntungan/proses_tambah') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label class="form-label">Judul Keuntungan</label>
                                <input type="text" class="form-control" name="judul_keuntungan" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Icon Keuntungan</label>
                                <input type="file" class="form-control" name="icon_keuntungan">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Keuntungan</label>
                                <textarea class="form-control" name="deskripsi_keuntungan"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/keuntungan/index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection(); ?>
