<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Founder</h1>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
        <hr class="mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url('admin/founder/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Founder</a>
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
                                    <th>Jabatan Founder</th>
                                    <th>Foto Founder</th>
                                    <th>Deskripsi Founder</th>
                
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($founders as $index => $founder) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $founder->nama_founder?></td>
                                        <td><?= $founder->jabatan_founder?></td>  
                                        <td>
                                            <?php if ($founder->foto_founder) : ?>
                                                <img src="<?= base_url('uploads/foto_founder/' . $founder->foto_founder) ?>" alt="Foto_founder" class="img-Foto_founder" style="max-width: 100px;">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $founder->deskripsi_founder ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/founder/edit/' . $founder->id_founder) ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <form action="<?= base_url('admin/founder/delete/' . $founder->id_founder) ?>" method="post" style="display:inline-block;">
                                            <a href="<?= base_url('admin/founder/delete/' . $founder->id_founder) ?>" class="btn btn-danger">Hapus</a>
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
