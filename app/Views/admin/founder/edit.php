<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit </h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/founder/proses_edit/' . $founder->id_founder) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Founder</label>
                                <input type="text" class="form-control" name="nama_founder" value="<?= $founder->nama_founder ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jabatan Founder</label>
                                <textarea class="form-control" name="jabatan_founder"><?= $founder->jabatan_founder?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto Founder</label>
                                <input type="file" class="form-control" name="thumbnail">
                                <?php if ($founder->foto_founder): ?>
                                    <img src="<?= base_url('uploads/foto_founder/' . $founder->foto_founder) ?>" alt="foto_founder" class="img-foto_founder mt-2" style="max-width: 100px;">
                                    <input type="hidden" name="old_foto_founder" value="<?= $founder->foto_founder ?>">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Founder</label>
                                <textarea class="form-control" name="deskripsi_founder"><?= $founder->deskripsi_founder?></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/founder/index') ?>" class="btn btn-secondary">Kembali</a>
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
