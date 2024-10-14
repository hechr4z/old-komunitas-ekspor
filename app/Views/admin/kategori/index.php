<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Kategori</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-primary">+ Tambah Kategori</a>
        </div>
        <table class="table app-table-hover mb-0 text-left">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($all_data_kategori as $kategori) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td class="text-center"><?= $kategori['nama_kategori'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/kategori/edit/' . $kategori['id_kategori']) ?>" class="btn btn-primary">Ubah</a>
                            <a href="<?= base_url('admin/kategori/delete/' . $kategori['id_kategori']) ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>