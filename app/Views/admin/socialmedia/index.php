<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4"> 
    <div class="container-xl">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Social Media</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('admin/socialmedia/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Social Media</a>
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
                                        <th class="text-center" valign="middle">Icon</th>
                                        <th class="text-center" valign="middle">Nama Platform</th>
                                        <th class="text-center" valign="middle">URL</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($all_social_media as $socialMedia) : ?>
                                        <tr>
                                            <td class="text-center" valign="middle"><?= $i++; ?></td>
                                            <td class="text-center" valign="middle">
                                                <?php
                                                $iconPath = 'uploads/socialmedia_icons/' . $socialMedia->icon_sosmed;
                                                $defaultIconPath = 'uploads/socialmedia_icons/default_icon.png';
                                                ?>
                                                <img src="<?= base_url(file_exists($iconPath) ? $iconPath : $defaultIconPath) ?>" alt="Icon" class="img-socialmedia_icons" style="max-width: 100px;">
                                            </td>
                                            <td class="text-center" valign="middle"><?= esc($socialMedia->nama_sosmed) ?></td>
                                            <td class="text-center" valign="middle"><a href="<?= esc($socialMedia->link_sosmed) ?>" target="_blank"><?= esc($socialMedia->link_sosmed) ?></a></td>
                                            <td class="text-center" valign="middle">
                                                <div class="text-center">
                                                    <a href="<?= base_url('admin/socialmedia/delete/' . $socialMedia->id_sosmed) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                    <a href="<?= base_url('admin/socialmedia/edit/' . $socialMedia->id_sosmed) ?>" class="btn btn-primary">Ubah</a>
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

<?= $this->endSection('content') ?>