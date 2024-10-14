<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambah Tentang</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/tentang/proses_tambah') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Tentang</label>
                                <input type="text" class="form-control" name="nama_tentang" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Visi</label>
                                <textarea class="form-control" name="visi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Misi</label>
                                <textarea class="form-control" name="misi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi_tentang"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Video Tentang</label>
                                <input type="url" class="form-control" name="video_tentang">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control" name="logo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Favicon</label>
                                <input type="file" class="form-control" name="favicon">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Copyright</label>
                                <input type="text" class="form-control" name="copyright">
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
