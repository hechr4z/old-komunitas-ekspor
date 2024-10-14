<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Link Founder</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/link_founder/proses_edit/' . $linkFounder->id_link_founder) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Link Founder</label>
                                <input type="text" class="form-control" name="nama_link_founder" value="<?= $linkFounder->nama_link_founder ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Icon Link Founder</label>
                                <input type="file" class="form-control" name="icon_link_founder">
                                <?php if ($linkFounder->icon_link_founder): ?>
                                    <img src="<?= base_url('uploads/icons/' . $linkFounder->icon_link_founder) ?>" alt="Icon Link Founder" class="img-thumbnail mt-2" style="max-width: 100px;">
                                    <input type="hidden" name="old_icon_link_founder" value="<?= $linkFounder->icon_link_founder ?>">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Link Founder</label>
                                <input type="url" class="form-control" name="link_founder" value="<?= $linkFounder->link_founder ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Founder</label>
                                <select class="form-control" name="id_founder" required>
                                    <?php foreach ($founders as $founder) : ?>
                                        <option value="<?= $founder->id_founder ?>" <?= $linkFounder->id_founder == $founder->id_founder ? 'selected' : '' ?>><?= $founder->nama_founder ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/link_founder/index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->


<?= $this->endSection(); ?>
