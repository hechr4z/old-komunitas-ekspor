<<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

    <!-- News With Sidebar Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="w-100" src="<?= base_url('assets-baru') ?>/img/<?= $pengumuman->poster_pengumuman; ?>" style="max-width: 400px; height: auto; margin: auto; display: block;">
                        <div class="bg-white border border-top-0 p-4">
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?= $pengumuman->judul_pengumuman; ?></h1>
                            <p><?= $pengumuman->deskripsi_pengumuman; ?></p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        </div>
                    </div>
                    <!-- News Detail End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


<?= $this->endSection('content'); ?>