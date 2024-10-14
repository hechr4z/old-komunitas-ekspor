<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <!-- Display validation errors if any -->
        <?php if(isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Edit Profil</h4>
        </div>
        <div class="bg-white border border-top-0 p-4 mb-3">
            <div class="row gy-4">
                <form action="<?= base_url('/profil/proses_edit') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="username" class="form-label mt-4"><strong>Username</strong></label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $profil_pengguna[0]['username']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label mt-4"><strong>Password</strong></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" value="<?= $profil_pengguna[0]['password']; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent border-0" id="togglePassword">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Nama Member</strong></label>
                        <input type="text" class="form-control" id="nama_member" name="nama_member" value="<?= $profil_pengguna[0]['nama_member']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Alamat Member</strong></label>
                        <textarea type="text" class="form-control tiny" id="alamat_member" name="alamat_member" rows="4" cols="50" style="height:100%;"><?= $profil_pengguna[0]['alamat_member']; ?></textarea>
                    </div>
                    <!-- <div class="mb-3">-->
                    <!--    <label for="nama_member" class="form-label mt-4"><strong>Jenis Kelamin Member</strong></label>-->
                    <!--    <select class="form-select red-theme" id="jenis_kelamin" name="jenis_kelamin">-->
                    <!--        <option value="Laki-laki" <?= ($profil_pengguna[0]['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>-->
                    <!--        <option value="Perempuan" <?= ($profil_pengguna[0]['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>-->
                    <!--    </select>-->
                    <!--    <small>*dropdown jenis kelamin</small>-->
                    <!--</div>-->
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label mt-4"><strong>Jenis Kelamin Member</strong></label>
                        <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-laki" <?= ($profil_pengguna[0]['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($profil_pengguna[0]['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                        <small>*dropdown jenis kelamin</small>
                    </div>

                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Nomor Telepon</strong></label>
                        <input type="text" class="form-control" id="no_hp_member" name="no_hp_member" value="<?= $profil_pengguna[0]['no_hp_member']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Email Member</strong></label>
                        <input type="text" class="form-control" id="email_member" name="email_member" value="<?= $profil_pengguna[0]['email_member']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Instagram Member</strong></label>
                        <input type="text" class="form-control" id="ig_member" name="ig_member" value="<?= $profil_pengguna[0]['ig_member']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Facebook Member</strong></label>
                        <input type="text" class="form-control" id="fb_member" name="fb_member" value="<?= $profil_pengguna[0]['fb_member']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Pendidikan Member</strong></label>
                        <textarea type="text" class="form-control tiny" id="pendidikan_member" name="pendidikan_member" rows="4" cols="50" style="height:100%;"><?= $profil_pengguna[0]['pendidikan_member']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Pekerjaan Member</strong></label>
                        <textarea type="text" class="form-control tiny" id="pekerjaan_member" name="pekerjaan_member" rows="4" cols="50" style="height:100%;"><?= $profil_pengguna[0]['pekerjaan_member']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama_member" class="form-label mt-4"><strong>Sertifikasi Member</strong></label>
                        <textarea type="text" class="form-control tiny" id="sertifikasi_member" name="sertifikasi_member" rows="4" cols="50" style="height:100%;"><?= $profil_pengguna[0]['sertifikasi_member']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Foto Member</strong></label>
                        <input type="file" class="form-control" id="foto_member" name="foto_member">
                        <img width="150px" class="img-thumbnail" src="<?= base_url() . "assets-baru/img/" . $profil_pengguna[0]['foto_member']; ?>">
                    </div>
                    <p>*Ukuran foto minimal 572x572 pixels</p>
                    <p>*Foto harus berekstensi jpg/png/jpeg</p>
                    <div class="mb-3">
                        <label class="form-label"><strong>CV Member</strong></label>
                        <input type="file" class="form-control" id="cv_member" name="cv_member">
                        <!--<img width="150px" class="img-thumbnail" src="<?= base_url() . "assets-baru/img/" . $profil_pengguna[0]['cv_member']; ?>">-->
                        <?php
                            $cvPath = base_url("assets-baru/img/") . $profil_pengguna[0]['cv_member'];
                            $fileExtension = pathinfo($profil_pengguna[0]['cv_member'], PATHINFO_EXTENSION);
                        
                            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                // Jika itu gambar, tampilkan gambar
                                echo '<img width="150px" class="img-thumbnail" src="' . $cvPath . '" alt="CV Member">';
                            } elseif ($fileExtension === 'pdf') {
                                // Jika itu PDF, tampilkan nama file
                                echo '<p>Nama File: ' . $profil_pengguna[0]['cv_member'] . '</p>';
                            } else {
                                // Jika bukan gambar atau PDF, tampilkan nama file tanpa tampilan tambahan
                                echo '<p>Nama File: ' . $profil_pengguna[0]['cv_member'] . '</p>';
                            }
                            ?>
                    </div>
                    <p>*Ukuran foto minimal 572x572 pixels</p>
                    <p>*Foto harus berekstensi jpg/png/jpeg</p>
                    <button type="submit" class="input-group-text bg-primary text-dark border-0 px-3">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    });
</script>

<?= $this->endSection('content') ?>
