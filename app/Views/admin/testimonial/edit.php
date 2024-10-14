<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Testimonial</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/testimonial/proses_edit/' . $testimonial['id_testimonial']) ?>" method="post" enctype="multipart/form-data">

                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Member</label>
                                <input type="text" class="form-control" name="nama_member" value="<?=  $testimonial['nama_member'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto Testimonial</label>
                                <input type="file" class="form-control" name="foto_testimonial">
                                <?php if ($testimonial['foto_testimonial']): ?>
                                    <img src="<?= base_url('uploads/icons/' . $testimonial['foto_testimonial']) ?>" alt="foto_testimonial" class="img-foto_testimonial mt-2" style="max-width: 100px;">
                                    <input type="hidden" name="old_foto_testimonial" value="<?= $testimonial['foto_testimonial'] ?>">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jabata</label>
                                <input type="text" class="form-control" name="jabatan_testimonial" value="<?=  $testimonial['jabatan_testimonial'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Testimonial</label>
                                <textarea class="form-control" name="deskripsi_testimonial"><?= $testimonial['deskripsi_testimonial'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/testimonial/index') ?>" class="btn btn-secondary">Kembali</a>
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
