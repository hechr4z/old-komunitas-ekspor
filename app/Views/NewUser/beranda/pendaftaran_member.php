<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<link href="<?= base_url('assets-new/css/pendaftaran_member.css') ?>" rel="stylesheet">

<!-- Tambahkan konten tambahan di sini -->
<div class="pendaftaran-section">
    <h2 class="text-custom-title">Cara Pendaftaran</h2>
    <p class="text-custom-paragraph">Ayo gabung dengan pelatihan Jago Digital Marketing dan jadi sukses bareng kami</p>
</div>

<!-- Tampilkan Pesan Error Jika Ada -->
<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <p><?= esc($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Form Pendaftaran -->
<div class="container-center">
    <div class="form-container">
        <h2>Dukung  2 Usaha Anda Untuk Mendapatkan Persiapan Terbaik</h2>

        <!-- Form pendaftaran -->
        <form id="pendaftaranForm" action="<?= base_url('/pendaftaran_member/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?> <!-- Tambahkan ini untuk memasukkan CSRF token -->

            <!-- Hidden field for role -->
            <input type="hidden" name="role" value="user">

            <!-- Nama Lengkap -->
            <div class="form-group">
                <label for="nama_member">Nama Lengkap:</label>
                <input type="text" id="nama_member" name="nama_member" required placeholder="Masukkan Nama">
            </div>

            <!-- Nomor WhatsApp -->
            <div class="form-group">
                <label for="no_hp_member">Nomor WhatsApp:</label>
                <input type="text" id="no_hp_member" name="no_hp_member" required placeholder="Masukkan No WhatsApp">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email_member">Email:</label>
                <input type="email" id="email_member" name="email_member" required placeholder="Masukkan Email">
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat_member">Alamat:</label>
                <input type="text" id="alamat_member" name="alamat_member" required placeholder="Masukkan Alamat">
            </div>

            <!-- Provinsi -->
            <div class="form-group">
                <label for="id_provinsi">Provinsi:</label>
                <select name="id_provinsi" id="id_provinsi">
                    <?php foreach ($provinsi as $prov) : ?>
                        <option value="<?= $prov->id_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Kabupaten/Kota -->
            <div class="form-group">
                <label for="id_kabkota">Kabupaten/Kota:</label>
                <select name="id_kabkota" id="id_kabkota">
                    <?php foreach ($kabkota as $kota) : ?>
                        <option value="<?= $kota->id_kabkota ?>"><?= $kota->nama_kabkota ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pekerjaan -->
            <div class="form-group">
                <label for="pekerjaan_member">Pekerjaan:</label>
                <input type="text" id="pekerjaan_member" name="pekerjaan_member" required placeholder="Masukkan Pekerjaan">
            </div>

            <!-- Pendidikan -->
            <div class="form-group">
                <label for="pendidikan_member">Pendidikan:</label>
                <input type="text" id="pendidikan_member" name="pendidikan_member" required placeholder="Masukkan Pendidikan">
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Masukkan Username">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan Password">
            </div>

            <!-- Foto Profil -->
            <div class="form-group">
                <label for="foto_member">Foto Profil:</label>
                <input type="file" id="foto_member" name="foto_member" accept="image/*">
            </div>

            <!-- Upload CV -->
            <div class="form-group">
                <label for="cv_member">Upload CV:</label>
                <input type="file" id="cv_member" name="cv_member" accept=".pdf,.doc,.docx">
            </div>

            <!-- Upload Sertifikasi -->
            <div class="form-group">
                <label for="sertifikasi_member">Upload Sertifikasi (Opsional):</label>
                <input type="file" id="sertifikasi_member" name="sertifikasi_member" accept=".pdf,.doc,.docx">
            </div>

            <!-- Slug -->
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" id="slug" name="slug" required placeholder="Masukkan Slug">
            </div>

            <!-- Instagram -->
            <div class="form-group">
                <label for="ig_member">Instagram:</label>
                <input type="text" id="ig_member" name="ig_member" placeholder="Masukkan Instagram">
            </div>

            <!-- Facebook -->
            <div class="form-group">
                <label for="fb_member">Facebook:</label>
                <input type="text" id="fb_member" name="fb_member" placeholder="Masukkan Facebook">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</div>

<!-- Pop-up Konfirmasi -->
<div id="popup-konfirmasi" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mendaftar sekarang?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="confirm-daftar" class="btn btn-primary">Ya, Daftar Sekarang</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('btn-daftar').addEventListener('click', function(event) {
        event.preventDefault();
        $('#popup-konfirmasi').modal('show');
    });

    document.getElementById('confirm-daftar').addEventListener('click', function() {
        document.getElementById('pendaftaranForm').submit();
    });
</script>

<?= $this->endsection('content'); ?>
