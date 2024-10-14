<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Tentang</h1>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
        <hr class="mb-4">

        <?php if (count($tentang) < 1): // Hanya tampilkan tombol "Tambah Tentang" jika data belum ada 
        ?>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('admin/tentang/tambah') ?>" class="btn btn-primary me-md-2">+ Tambah Tentang</a>
            </div>
        <?php endif; ?>

        <div class="row g-4 settings-section">
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tentang</th>
                                    <th>Visi</th>
                                    <th>Misi</th>
                                    <th>Deskripsi Tentang</th>
                                    <th>Video Tentang</th>
                                    <th>Logo</th>
                                    <th>Favicon</th>
                                    <th>Copyright</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tentang as $index => $item) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $item['nama_tentang'] ?></td>
                                        <td><?= $item['visi'] ?></td>
                                        <td><?= $item['misi'] ?></td>
                                        <td><?= $item['deskripsi_tentang'] ?></td>
                                        <td>
                                            <?php if (!empty($item['video_tentang'])) : ?>
                                                <a href="<?= esc($item['video_tentang']) ?>" target="_blank"><?= esc($item['video_tentang']) ?></a>
                                            <?php else : ?>
                                                Tidak ada video
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($item['logo'])) : ?>
                                                <img src="<?= base_url('uploads/gambar/' . $item['logo']) ?>" alt="Logo" class="img-gambar" style="max-width: 100px;">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($item['favicon'])) : ?>
                                                <img src="<?= base_url('uploads/gambar/' . $item['favicon']) ?>" alt="Favicon" class="img-gambar" style="max-width: 50px;">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $item['copyright'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/tentang/edit/' . $item['id_tentang']) ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <form action="<?= base_url('admin/tentang/delete/' . $item['id_tentang']) ?>" method="post" style="display:inline-block;">
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