<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Member</h1>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
        <hr class="mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url('admin/member/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Member</a>
        </div>
        <div class="row g-4 settings-section">
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <!-- Membungkus tabel dengan div yang memiliki properti overflow -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Member</th>
                                        <th>Provinsi</th>
                                        <th>Kabkota</th>
                                        <th>Status Kepengurusan</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Instagram</th>
                                        <th>Facebook</th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan</th>
                                        <th>Sertifikasi</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Foto</th>
                                        <th>CV</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($members as $index => $member) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $member->username ?></td>
                                            <td><?= $member->nama_member ?></td>
                                            <td><?= $member->nama_provinsi ?></td>
                                            <td><?= $member->nama_kabkota ?></td>
                                            <td><?= $member->status_kepengurusan ?></td>
                                            <td><?= $member->alamat_member ?></td>
                                            <td><?= $member->no_hp_member ?></td>
                                            <td><?= $member->email_member ?></td>
                                            <td><?= $member->ig_member ?></td>
                                            <td><?= $member->fb_member ?></td>
                                            <td><?= $member->pendidikan_member ?></td>
                                            <td><?= $member->pekerjaan_member ?></td>
                                            <td><?= $member->sertifikasi_member ?></td>
                                            <td><?= $member->jenis_kelamin ?></td>
                                            <td>
                                                <?php if ($member->foto_member) : ?>
                                                    <img src="<?= base_url('uploads/photos/' . $member->foto_member) ?>" alt="Foto" class="img-thumbnail" style="max-width: 50px;">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($member->cv_member) : ?>
                                                    <a href="<?= base_url('uploads/cv/' . $member->cv_member) ?>" target="_blank">Download CV</a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/member/edit/' . $member->id_member) ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                                                <a href="<?= base_url('admin/member/delete/' . $member->id_member) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection(); ?>
