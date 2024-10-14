<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<!-- Video Details Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="position-relative mb-3">
                    <div class="bg-white border border-top-0 p-4 rounded shadow-sm">
                        <!-- Category Badge -->
                        <div class="mb-3">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="<?= base_url('kategori/' . $video->id_katvideo) ?>"><?= $video->nama_kategori_video ?></a>
                            <a class="text-body"></a>
                        </div>
                        <!-- Video Title -->
                        <h4 class="mb-3 text-secondary text-uppercase font-weight-bold"><?= $video->judul_video; ?></h4>
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
                            <h5 class="text-secondary font-weight-bold">Deskripsi</h5>
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
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2 text-truncate"
                                        href="<?= base_url('kategori/' . $related_videos[0]->id_katvideo) ?>"
                                        style="font-size: 10px;">
                                        <?= $related_videos[0]->nama_kategori_video ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3 rounded shadow-sm">
                        <?php if (!empty($related_videos)): ?>
                            <?php foreach ($related_videos as $related_video) : ?>
                                <div class="d-flex align-items-center bg-white mb-3 rounded border border-light overflow-hidden shadow-sm">
                                    <img class="img-fluid" style="object-fit: cover; width: 100px; height: 100px;"
                                        src="<?= base_url('uploads/thumbnails/' . $related_video->thumbnail) ?>" alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                        <a href="<?= base_url('/video/detail/' . $related_video->id_video) ?>"
                                            class="text-secondary text-uppercase font-weight-bold text-truncate"
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
    /* Add this to your CSS file */
    .embed-responsive {
        position: relative;
        display: block;
        width: 100%;
        padding: 0;
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

    /* Add this to your CSS file */
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
</style>

<?= $this->endSection(); ?>