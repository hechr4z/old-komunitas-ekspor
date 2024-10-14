<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- Video Details Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="position-relative mb-3">
                    <div class="bg-light border border-top-0 p-4 rounded shadow-sm">
                        <!-- Category Badge -->
                        <div class="mb-3">
                            <?php if (isset($video->nama_kategori_video) && isset($video->category_slug)): ?>
                                <a class="badge text-uppercase font-weight-semi-bold p-2 mr-2 custom-badge-color"
                                    href="<?= base_url('/video/kategori/' . $video->category_slug) ?>"><?= htmlspecialchars($video->nama_kategori_video, ENT_QUOTES, 'UTF-8') ?></a>
                            <?php endif; ?>
                        </div>



                        <!-- Video Title -->
                        <h4 class="mb-3 text-dark text-uppercase font-weight-bold"><?= $video->judul_video; ?></h4>
                        <!-- Video Player Start -->
                        <div class="embed-responsive embed-responsive-16by9 mb-3">
                            <iframe
                                id="my-video"
                                class="embed-responsive-item rounded"
                                controls
                                preload="auto"
                                src="<?= $video->video_url; ?>"
                                sandbox="allow-scripts allow-same-origin"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <!-- Video Player End -->
                        <!-- Description -->
                        <div class="mb-3">
                            <h5 class="text-dark font-weight-bold">Deskripsi</h5>
                            <p><?= $video->deskripsi_video; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Related Videos Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">
                            Video Lainnya
                            <?php if (!empty($related_videos)): ?>
                                <?php if (!empty($related_videos[0]->nama_kategori_video)): ?>
                                    <a class="badge badge-secondary text-uppercase font-weight-semi-bold p-1 mr-2 text-truncate"
                                        href="<?= base_url('kategori/' . $related_videos[0]->id_katvideo) ?>"
                                        style="font-size: 10px;">
                                        <?= $related_videos[0]->nama_kategori_video ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </h4>
                    </div>
                    <div class="bg-light border border-top-0 p-3 rounded shadow-sm">
                        <?php if (!empty($related_videos)): ?>
                            <?php foreach ($related_videos as $related_video) : ?>
                                <div class="d-flex align-items-center bg-white mb-3 rounded border border-light overflow-hidden shadow-sm">
                                    <img class="img-fluid" style="object-fit: cover; width: 100px; height: 100px;"
                                        src="<?= base_url('uploads/thumbnails/' . $related_video->thumbnail) ?>" alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                        <a href="<?= base_url('/video/detail/' . $related_video->slug) ?>"
                                            class="text-dark text-uppercase font-weight-bold text-truncate"
                                            style="font-size: 12px; flex-grow: 0; margin-bottom: 10px; word-wrap: break-word; white-space: normal;">
                                            <?= $related_video->judul_video; ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center text-muted">Tidak ada video terkait.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Related Videos End -->
            </div>
        </div>
    </div>
</div>
<!-- Video Details End -->

<style>
    .embed-responsive {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
        /* 16:9 Aspect Ratio */
        overflow: hidden;
    }

    .embed-responsive-item {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .rounded {
        border-radius: 8px;
    }

    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .d-flex {
        display: flex;
    }

    .bg-light {
        background-color: #f8f9fa;
    }

    .text-dark {
        color: #343a40;
    }



    .custom-badge-color {
        color: #007bff;
        /* Adjust the color to your preference */
    }

    .custom-badge-color:hover {
        color: #0056b3;
        /* Darker shade for hover effect */
    }
</style>

<?= $this->endSection(); ?>