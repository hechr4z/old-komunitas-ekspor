<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Berita</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/berita/proses_edit/' . $beritaData->id_berita) ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Judul Berita</label>
                                        <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?= $beritaData->judul_berita; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Berita</label>
                                        <textarea class="form-control tiny" id="deskripsi_berita" name="deskripsi_berita"><?= $beritaData->deskripsi_berita; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mulai Berita</label>
                                        <input type="date" class="form-control" id="mulai_berita" name="mulai_berita" value="<?= $beritaData->mulai_berita; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Akhir Berita</label>
                                        <input type="date" class="form-control" id="akhir_berita" name="akhir_berita" value="<?= $beritaData->akhir_berita; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Poster Berita</label>
                                        <input type="file" class="form-control" id="poster_berita" name="poster_berita">
                                        <img width="150px" class="img-thumbnail" src="<?= base_url() . "uploads/foto_berita/" . $beritaData->poster_berita; ?>">
                                        <?= $validation->getError('poster_berita') ?>
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

<?= $this->endSection('content') ?>