<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Link Founder</h1>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
        <hr class="mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url('admin/link_founder/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Link Founder</a>
        </div>
        <div class="row g-4 settings-section">
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Founder</th>
                                    <th>Nama Link</th>
                                    <th>Icon</th>
                                    <th>Link URL</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($linkFounders as $index => $link) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $link->nama_founder ?></td>
                                        <td><?= $link->nama_link_founder ?></td>
                                        <td>
                                            <?php if ($link->icon_link_founder) : ?>
                                                <img src="<?= base_url('uploads/icons/' . $link->icon_link_founder) ?>" alt="Icon" class="img-thumbnail" style="max-width: 50px;">
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="<?= $link->link_founder ?>" target="_blank"><?= $link->link_founder ?></a></td>
                                        <td>
                                            <a href="<?= base_url('admin/link_founder/edit/' . $link->id_link_founder) ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <a href="<?= base_url('admin/link_founder/delete/' . $link->id_link_founder) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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
