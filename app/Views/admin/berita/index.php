<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>


<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Berita</h1>
            </div>
            </br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?php echo base_url() . "admin/berita/tambah" ?>" class="btn btn-primary me-md-2"> + Tambah Berita</a>
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
                                        <th class="text-center" valign="middle">No</th>
                                        <th class="text-center" valign="middle">Judul Berita</th>
                                        <th class="text-center" valign="middle">Deskripsi Berita</th>
                                        <th class="text-center" valign="middle">Mulai Berita</th>
                                        <th class="text-center" valign="middle">Akhir Berita</th>
                                        <th class="text-center" valign="middle">Poster Berita</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($all_data_berita as $tampilBerita) : ?>
                                        <tr>
                                            <td class="text-center" valign="middle"><?php echo $i; ?></td>
                                            <td class="text-center" valign="middle"><?= $tampilBerita->judul_berita ?></td>
                                            <td class="text-center col-4" valign="middle"><?= $tampilBerita->deskripsi_berita ?></td>
                                            <td class="text-center ritacol-4" valign="middle"><?= $tampilBerita->mulai_berita ?></td>
                                            <td class="text-center col-4" valign="middle"><?= $tampilBerita->akhir_berita ?></td>
                                            <td class="text-center col-2" valign="middle"><img src="<?= base_url() . 'uploads/foto_berita/' . $tampilBerita->poster_berita ?>" class="img-fluid" alt="Poster Berita"></td>
                                            <td valign="middle">
                                                <div class="d-grid gap-2">
                                                    <a href="<?= base_url('admin/berita/delete') . '/' . $tampilBerita->id_berita ?>" class="btn btn-danger">Hapus</a>
                                                    <a href="<?= base_url('admin/berita/edit') . '/' . $tampilBerita->id_berita ?>" class="btn btn-primary">Ubah</a>
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