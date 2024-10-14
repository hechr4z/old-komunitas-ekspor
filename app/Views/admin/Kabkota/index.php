<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Wilayah Kabupaten / Kota</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('admin/kabkota/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah</a>
            </div>
        </div>
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover table-bordered mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center" valign="middle">No</th>
                                        <th class="text-center" valign="middle">Nama Provinsi</th>
                                        <th class="text-center" valign="middle">Nama Kabupaten / Kota</th>
                                        <th class="text-center" valign="middle">Wilayah Kerja Kabupaten / Kota</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($all_data_Kabkota as $tampilKabkota) : ?>
                                        <tr>
                                            <td class="text-center" valign="middle"><?= $i; ?></td>
                                            <td class="text-center" valign="middle"><?= $tampilKabkota['nama_provinsi'] ?></td>
                                            <td class="text-center" valign="middle"><?= $tampilKabkota['nama_kabkota'] ?></td>
                                            <td class="text-center" valign="middle"><?= $tampilKabkota['wilayah_kerja_kabkota'] ?></td>
                                            <td valign="middle">
                                                <div class="text-center">
                                                    <a href="<?= base_url('admin/kabkota/delete') . '/' . $tampilKabkota['id_kabkota'] ?>" class="btn btn-danger">Hapus</a>
                                                    <a href="<?= base_url('admin/kabkota/edit') . '/' . $tampilKabkota['id_kabkota'] ?>" class="btn btn-primary">Ubah</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
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

<?= $this->endSection('content') ?>