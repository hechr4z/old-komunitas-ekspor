<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Video Categories and Videos Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">Kategori Video</h4>
                </div>
            </div>
        </div>

        <?php if (empty($videoCategories)) : ?>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="container text-center" style="min-height: 50vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <p>Tidak Ada Kategori Video Terkait</p>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php foreach ($videoCategories as $category) : ?>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="text-uppercase font-weight-bold mb-0" style="margin-bottom: 5px;"><?= $category->nama_kategori_video ?></h5>
                            <a href="<?= base_url('/videos/' . $category->id_katvideo) ?>" class="btn btn-primary">Selengkapnya</a>
                        </div>
                        <hr style="border-top: 2px solid #000; margin-top: 15px;">
                        <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4 pt-2">
                            <?php
                            $hasVideos = false; // Flag to check if there are videos in this category
                            foreach ($videos as $video) :
                                if ($video->id_katvideo == $category->id_katvideo) :
                                    $hasVideos = true; // Set flag to true if a video is found
                            ?>
                                    <div class="col-4" style="max-width: 250px;">
                                        <a href="<?= base_url('/video/detail/' . $video->id_video) ?>" style="text-decoration: none; color: inherit;">
                                            <div class="card" style="width: 100%; height: 380px; display: flex; flex-direction: column; cursor: pointer; border-radius: 8px; transition: box-shadow 0.3s, transform 0.3s;"> <!-- Add border-radius and transition effects -->
                                                <img src="uploads/thumbnails/<?= $video->thumbnail ?>" class="card-img-top" alt="<?= $video->judul_video ?>" style="height: 200px; object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;"> <!-- Apply border-radius to the top of the image -->
                                                <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                                                    <h6 class="card-title" style="flex-grow: 0; margin-bottom: 10px; word-wrap: break-word; white-space: normal;"><?= $video->judul_video ?></h6>
                                                    <p class="card-text" style="flex-grow: 1; word-wrap: break-word; white-space: normal;">
                                                        <?= strlen($video->deskripsi_video) > 45 ? substr($video->deskripsi_video, 0, 45) . '...' : $video->deskripsi_video ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                endif;
                            endforeach;
                            if (!$hasVideos) : // If no videos were found, display the message
                                ?>
                                <div class="container text-center">
                                    <p>Tidak Ada Video yang Tersedia</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<!-- Video Categories and Videos End -->

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

    @media (max-width: 768px) {
        .card-text {
            display: none;
        }
    }

    .scrolling-wrapper {
        overflow-x: scroll;
        /* Allows horizontal scrolling */
        -ms-overflow-style: none;
        /* Hides scrollbar in IE and Edge */
        scrollbar-width: none;
        /* Hides scrollbar in Firefox */
    }

    .scrolling-wrapper::-webkit-scrollbar {
        display: none;
        /* Hides scrollbar in Chrome, Safari, and Opera */
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
    }
</style>

<?= $this->endSection('content'); ?>