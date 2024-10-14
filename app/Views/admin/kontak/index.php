<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Kontak</h1>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url('admin/kontak/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Kontak</a>
        </div>
        <div class="row g-4 settings-section">
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th>Kontak</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kontaks as $index => $kontak): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $kontak['deskripsi'] ?></td>
                                    <td><?= $kontak['kontak'] ?></td>
                                    <td><?= $kontak['email'] ?></td>
                                    <td><?= $kontak['no_hp'] ?></td>
                                    <td><?= $kontak['alamat'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/kontak/edit/' . $kontak['id_kontak']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('admin/kontak/delete/' . $kontak['id_kontak']) ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection(); ?>