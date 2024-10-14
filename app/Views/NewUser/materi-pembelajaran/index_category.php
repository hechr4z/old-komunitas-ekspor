<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- Category Details Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">Kategori Video: <?= $selectedCategory->nama_kategori_video ?></h4>
                </div>
            </div>
        </div>

        <?php if (empty($videos)) : ?>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="container text-center" style="min-height: 50vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <p>Tidak Ada Video yang Tersedia dalam Kategori Ini</p>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="row mt-3">
                <?php foreach ($videos as $video) : ?>
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <a href="<?= base_url('/video/detail/' . $video->slug) ?>" style="text-decoration: none; color: inherit;">
                            <div class="card" style="width: 100%; height: 380px; display: flex; flex-direction: column; cursor: pointer; border-radius: 8px; transition: box-shadow 0.3s, transform 0.3s;">
                                <img src="/uploads/thumbnails/<?= $video->thumbnail ?>" class="card-img-top" alt="<?= $video->judul_video ?>" style="height: 200px; object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                                <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                                    <h6 class="card-title" style="flex-grow: 0; margin-bottom: 10px; word-wrap: break-word; white-space: normal;"><?= $video->judul_video ?></h6>
                                    <p class="card-text" style="flex-grow: 1; word-wrap: break-word; white-space: normal;">
                                        <?= strlen($video->deskripsi_video) > 45 ? substr($video->deskripsi_video, 0, 45) . '...' : $video->deskripsi_video ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Category Details End -->

<!-- Menyesuaikan tata letak untuk memastikan footer tetap di bagian bawah -->
<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
    }
</style>

<?= $this->endSection('content'); ?>
