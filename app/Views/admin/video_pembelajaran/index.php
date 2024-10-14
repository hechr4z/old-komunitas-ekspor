<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Video Pembelajaran</h1>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
        <hr class="mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url('admin/video_pembelajaran/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Kategori</a>
        </div>
        <div class="row g-4 settings-section">
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Video</th>
                                    <th>Judul Video</th>
                                    <th>Thumbnail</th>
                                    <th>URL Video</th>
                                    <th>Deskripsi Video</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($videos as $index => $video) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $video->nama_kategori_video?></td>  
                                        <td><?= $video->judul_video ?></td>
                                        <td>
                                            <?php if ($video->thumbnail) : ?>
                                                <img src="<?= base_url('uploads/thumbnails/' . $video->thumbnail) ?>" alt="Thumbnail" class="img-thumbnail" style="max-width: 100px;">
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="<?= $video->video_url ?>" target="_blank"><?= $video->video_url ?></a></td>
                                        <td><?= $video->deskripsi_video ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/video_pembelajaran/edit/' . $video->id_video) ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <form action="<?= base_url('admin/video_pembelajaran/delete/' . $video->id_video) ?>" method="post" style="display:inline-block;">
                                            <a href="<?= base_url('admin/video_pembelajaran/delete/' . $video->id_video) ?>" class="btn btn-danger">Hapus</a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection(); ?>
