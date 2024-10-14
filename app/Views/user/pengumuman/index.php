<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Pengumuman</h4>
        </div>
        <div class="row">
            <?php foreach ($pengumuman as $row) : ?>
                <div class="col-md-4 penulis-item mb-4">
                    <div class="position-relative overflow-hidden" style="height: 400px;">
                        <a href="<?= base_url('/detail/' . $row->id_pengumuman); ?>">
                            <img class="img-fluid" src="<?= base_url('assets-baru') ?>/img/<?= $row->poster_pengumuman; ?>" style="object-fit: cover;">
                        </a>
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="<?= base_url('/detail/' . $row->id_pengumuman); ?>"><?= substr($row->judul_pengumuman, 0, 22) ?></a>
                            </div>
                            <a class="h7 m-0 text-white" href="<?= base_url('/detail/' . $row->id_pengumuman); ?>"><?= substr($row->deskripsi_pengumuman, 0, 17) ?>...</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>
