<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Pengumuman</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/pengumuman/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Judul Pengumuman</label>
                                        <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" value="<?= old('judul_pengumuman') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Pengumuman</label>
                                        <textarea class="form-control tiny" id="deskripsi_pengumuman" name="deskripsi_pengumuman" row="5" value="<?= old('deskripsi_pengumuman') ?>"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mulai Pengumuman</label>
                                        <input type="date" class="form-control" id="mulai_pengumuman" name="mulai_pengumuman" value="<?= old('mulai_pengumuman') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Akhir Pengumuman</label>
                                        <input type="date" class="form-control" id="akhir_pengumuman" name="akhir_pengumuman" value="<?= old('akhir_pengumuman') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Poster Pengumuman</label>
                                        <input class="form-control <?= ($validation->hasError('poster_pengumuman')) ? 'is-invalid' : '' ?>" type="file" id="poster_pengumuman" name="poster_pengumuman">
                                        <?= $validation->getError('poster_pengumuman') ?>
                                    </div>
                                    <p>*Ukuran foto maksimal 572x572 pixels</p>
                                    <p>*Foto harus berekstensi jpg/png/jpeg</p>
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