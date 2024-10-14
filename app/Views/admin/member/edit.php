<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Member</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/member/proses_edit/' . $member->id_member) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $member->username ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Member</label>
                                <input type="text" class="form-control" name="nama_member" value="<?= $member->nama_member ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Provinsi</label>
                                <select class="form-control" name="id_provinsi" required>
                                    <?php foreach ($provinsi as $prov) : ?>
                                        <option value="<?= $prov->id_provinsi ?>" <?= $member->id_provinsi == $prov->id_provinsi ? 'selected' : '' ?>><?= $prov->nama_provinsi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kabkota</label>
                                <select class="form-control" name="id_kabkota" required>
                                    <?php foreach ($kabkota as $kab) : ?>
                                        <option value="<?= $kab->id_kabkota ?>" <?= $member->id_kabkota == $kab->id_kabkota ? 'selected' : '' ?>><?= $kab->nama_kabkota ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Kepengurusan</label>
                                <input type="text" class="form-control" name="status_kepengurusan" value="<?= $member->status_kepengurusan ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Member</label>
                                <textarea class="form-control" name="alamat_member"><?= $member->alamat_member ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No HP Member</label>
                                <input type="text" class="form-control" name="no_hp_member" value="<?= $member->no_hp_member ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Member</label>
                                <input type="email" class="form-control" name="email_member" value="<?= $member->email_member ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Instagram</label>
                                <input type="text" class="form-control" name="ig_member" value="<?= $member->ig_member ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="fb_member" value="<?= $member->fb_member ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pendidikan</label>
                                <textarea class="form-control" name="pendidikan_member"><?= $member->pendidikan_member ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <textarea class="form-control" name="pekerjaan_member"><?= $member->pekerjaan_member ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sertifikasi</label>
                                <textarea class="form-control" name="sertifikasi_member"><?= $member->sertifikasi_member ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="Laki-laki" <?= $member->jenis_kelamin == "Laki-laki" ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= $member->jenis_kelamin == "Perempuan" ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Member</label>
                                <input type="file" class="form-control" name="foto_member">
                                <?php if ($member->foto_member): ?>
                                    <img src="<?= base_url('uploads/photos/' . $member->foto_member) ?>" alt="Foto Member" class="img-thumbnail mt-2" style="max-width: 100px;">
                                    <input type="hidden" name="old_foto_member" value="<?= $member->foto_member ?>">
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">CV Member (PDF)</label>
                                <input type="file" class="form-control" name="cv_member" accept=".pdf">
                                <?php if ($member->cv_member): ?>
                                    <a href="<?= base_url('uploads/cv_member/' . $member->cv_member) ?>" target="_blank">Lihat CV</a>
                                    <input type="hidden" name="old_cv_member" value="<?= $member->cv_member ?>">
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/member/index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<!-- JavaScript untuk toggle password visibility -->
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
    });
</script>

<?= $this->endSection(); ?>
