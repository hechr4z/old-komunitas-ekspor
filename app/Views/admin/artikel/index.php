<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Artikel</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('admin/artikel/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Artikel</a>
            </div>
        </div>
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Judul Artikel</th>
                                        <th class="text-center align-middle">Foto Artikel</th>
                                        <th class="text-center align-middle">Kategori</th>
                                        <th class="text-center align-middle" style="width: 120px;">Deskripsi</th>
                                        <th class="text-center align-middle">Tags</th>
                                        <th class="text-center align-middle">Views</th>
                                        <th class="text-center align-middle" style="width: 60px;">Slug</th>
                                        <th class="text-center align-middle" style="width: 60px;">Meta Title</th>
                                        <th class="text-center align-middle" style="width: 60px;">Meta Description</th>
                                        <th class="text-center align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($all_data_artikel as $artikel) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $i++; ?></td>
                                            <td class="text-center align-middle"><?= $artikel['judul_artikel']; ?></td>
                                            <td class="text-center align-middle">
                                                <img src="<?= base_url('uploads/upload_artikel/' . $artikel['foto_artikel']); ?>" alt="Foto Artikel" class="img-fluid" style="max-width: 80px;">
                                            </td>
                                            <td class="text-center align-middle"><?= $artikel['id_kategori']; ?></td>
                                            <td class="text-center align-middle" style="width: 120px;">
                                                <div style="max-height: 100px; overflow-y: auto;">
                                                    <?= $artikel['deskripsi_artikel']; ?>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle"><?= $artikel['tags']; ?></td>
                                            <td class="text-center align-middle"><?= $artikel['views']; ?></td>
                                            <td class="text-center align-middle"><?= $artikel['slug']; ?></td>
                                            <td class="text-center align-middle"><?= $artikel['meta_title']; ?></td>
                                            <td class="text-center align-middle"><?= $artikel['meta_description']; ?></td>
                                         
                                            <td class="text-center align-middle">
                                                <div class="d-grid gap-2">
                                                    <a href="<?= base_url('admin/artikel/delete/' . $artikel['id_artikel']); ?>" class="btn btn-danger">Hapus</a>
                                                    <a href="<?= base_url('admin/artikel/edit/' . $artikel['id_artikel']); ?>" class="btn btn-primary">Ubah</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<?= $this->endSection('content'); ?>