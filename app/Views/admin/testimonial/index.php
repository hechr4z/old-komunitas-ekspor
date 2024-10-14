<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Testimonial</h1>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
        <hr class="mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url('admin/testimonial/tambah') ?>" class="btn btn-primary me-md-2"> + Testimonial</a>
        </div>
        <div class="row g-4 settings-section">
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Member</th>
                                    <th>Foto</th>
                                    <th>Jabatan</th>
                                    <th>Deskripsi Testimonial</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($testimonial as $index => $item) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $item['nama_member'] ?></td>
                                        <td>
                                            <?php if ($item['foto_testimonial']) : ?>
                                                <img src="<?= base_url('uploads/testimonial/' . $item['foto_testimonial']) ?>" alt="Icon testimonial" class="img-icon-testimonial" style="max-width: 100px;">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $item['jabatan_testimonial'] ?></td>
                                        <td><?= $item['deskripsi_testimonial'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/testimonial/edit/' . $item['id_testimonial']) ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <form action="<?= base_url('admin/testimonial/delete/' . $item['id_testimonial']) ?>" method="POST" style="display:inline-block;">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
