<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Tentang</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/tentang/proses_edit/' . $tentang['id_tentang']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Tentang</label>
                                <input type="text" class="form-control" name="nama_tentang" value="<?= esc($tentang['nama_tentang']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Visi</label>
                                <textarea class="form-control" name="visi"><?= esc($tentang['visi']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Misi</label>
                                <textarea class="form-control" name="misi"><?= esc($tentang['misi']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi_tentang"><?= esc($tentang['deskripsi_tentang']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Video Tentang</label>
                                <input type="url" class="form-control" name="video_tentang" value="<?= esc($tentang['video_tentang']) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control" name="logo">
                                <?php if ($tentang['logo']): ?>
                                    <img src="<?= base_url('uploads/gambar/' . $tentang['logo']) ?>" alt="Logo" class="img-thumbnail mt-2" style="max-width: 100px;">
                                    <input type="hidden" name="old_logo" value="<?= esc($tentang['logo']) ?>">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Favicon</label>
                                <input type="file" class="form-control" name="favicon">
                                <?php if ($tentang['favicon']): ?>
                                    <img src="<?= base_url('uploads/gambar/' . $tentang['favicon']) ?>" alt="Favicon" class="img-thumbnail mt-2" style="max-width: 50px;">
                                    <input type="hidden" name="old_favicon" value="<?= esc($tentang['favicon']) ?>">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Copyright</label>
                                <input type="text" class="form-control" name="copyright" value="<?= esc($tentang['copyright']) ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/tentang/index') ?>" class="btn btn-secondary">Kembali</a>
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
