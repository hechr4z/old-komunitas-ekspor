<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- about us section start -->
<section class="about-us-section">
    <div class="container">
        <h2>About Us</h2>
        <p>Ketahui lebih dalam apa sih Jago Digital Marketing itu.</p>
    </div>
</section>
<!-- about us section end -->

<!-- paragraf section start -->
<section class="paragraf-section">
    <div class="container">
        <h4>
            <?= isset($tentang['deskripsi_tentang']) ? esc($tentang['deskripsi_tentang']) : 'Deskripsi tidak tersedia.'; ?>
        </h4>
    </div>
</section>
<!-- paragraf section end -->

<section class="perjalanan">
    <div class="container">
        <h2 class="section-title">Perjalanan</h2>
        <p class="perjalanan-description">
            Jago Digital Marketing didirikan sejak tahun 2024 dengan tim yang terdiri dari orang-orang yang memiliki passion di bidang digital marketing dan digital advertising. Keahlian dan pengalaman kami telah menghadirkan jasa digital marketing yang efektif dan terjangkau untuk meningkatkan efektivitas pemasaran online bisnis Anda.
        </p>
    </div>
</section>

<section class="visi-misi">
    <div class="container">
        <div class="visi">
            <h3>Visi</h3>
            <p><?= isset($tentang['visi']) ? esc($tentang['visi']) : 'Visi tidak tersedia.'; ?></p>
        </div>
        <div class="misi">
            <h3>Misi</h3>
            <p><?= isset($tentang['misi']) ? esc($tentang['misi']) : 'Misi tidak tersedia.'; ?></p>
        </div>
    </div>
</section>

<section class="founders-section">
    <h2>Founder of Jago Digital Marketing</h2>
    <p>Siapa sih pendiri dari Jago Digital Marketing? Yuk kenalan dulu!</p>
    <div class="founders">
        <?php if (!empty($founder)): ?>
            <?php foreach ($founder as $founderItem): ?>
                <div class="founder-card">
                    <!-- Founder Photo -->
                    <div class="profile-wrapper">
                        <img src="<?= base_url('uploads/foto_founder/' . $founderItem->foto_founder) ?>" alt="<?= esc($founderItem->nama_founder) ?>" class="profile-img">
                    </div>

                    <!-- Founder Info -->
                    <div class="info">
                        <h3><?= esc($founderItem->nama_founder) ?></h3>
                        <p class="role"><?= esc($founderItem->jabatan_founder) ?></p>

                        <!-- Founder Description -->
                        <p class="description"><?= esc($founderItem->deskripsi_founder ?? 'Deskripsi tidak tersedia') ?></p>

                        <!-- Social Media Links -->
                        <?php if (!empty($founderItem->links)): ?>
                            <div class="social-media">
                                <?php foreach ($founderItem->links as $socialMedia): ?>
                                    <a href="<?= esc($socialMedia->link_founder) ?>" target="_blank" class="social-link">
                                        <img src="<?= base_url('uploads/icons/' . $socialMedia->icon_link_founder) ?>" alt="<?= esc($socialMedia->nama_link_founder) ?>" class="social-icon">
                                        <span class="social-text"><?= esc($socialMedia->nama_link_founder) ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p>Sosial media tidak tersedia.</p>
                        <?php endif; ?>


                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Informasi pendiri tidak tersedia.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Updated CSS -->
<style>
    .founders-section {
        padding: 40px 20px;
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
        background-color: #f2f2f2;
        border-radius: 10px;
    }

    .founders {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .founder-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        transition: transform 0.3s ease;
        width: 100%;
        max-width: 350px;
        position: relative;
    }

    .founder-card:hover {
        transform: translateY(-10px);
    }

    .profile-wrapper {
        width: 100%;
        padding-top: 100%;
        position: relative;
    }

    .profile-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-bottom-left-radius: 50%;
        border-bottom-right-radius: 50%;
    }

    .info {
        padding: 20px;
        background-color: #fff;
        text-align: center;
    }

    .info h3 {
        font-size: 22px;
        margin-bottom: 5px;
    }


    .social-media {
        display: flex;
        flex-direction: column;
        /* Mengatur elemen secara vertikal */
        align-items: center;
        /* Menyelaraskan elemen ke tengah */
       
        margin-top: 15px;
        /* Jarak atas jika diperlukan */
    }

    .social-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000000;
    }

    .social-icon {
        width: 24px;
        /* Ukuran ikon */
        height: 24px;
        /* Ukuran ikon */
        margin-right: 8px;
        /* Jarak kanan antara ikon dan teks */
    }

    .social-text {
        font-size: 16px;
        /* Ukuran teks */
        line-height: 24px;
        /* Menyelaraskan tinggi baris dengan tinggi ikon */
    }


    .social-link:hover .social-icon {
        transform: scale(1.2);
    }


    .info .role {
        font-size: 18px;
        color: #FF9800;
        margin-bottom: 10px;
    }

    .description {
        font-size: 16px;
        margin-bottom: 15px;
        text-align: justify;
    }

    .social-media {
        margin-top: 15px;
    }

    .social-link {
        display: inline-block;
        margin-right: 10px;
    }

    .social-icon {
        width: 50px;
        height: 50px;
        transition: transform 0.3s ease;
    }

    .social-link:hover .social-icon {
        transform: scale(1.2);
    }

    @media (max-width: 768px) {
        .founders {
            flex-direction: column;
            align-items: center;
        }

        .founder-card {
            width: 100%;
        }
    }
</style>




<!-- about us css -->
<style>
    .about-us-section {
        position: relative;
        padding: 50px 15px;
        /* Reduced from 100px to 50px */
        background: url('<?= base_url('assets-new/images/bg2.jpg') ?>') no-repeat center center;
        background-size: cover;
        min-height: 50vh;
        /* Adjusted from 0vh to 50vh for better height control */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .about-us-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #FFFFFF;
        /* Warna teks dan garis bawah */
        margin-bottom: 10px;
        border-bottom: 3px solid #FFFFFF;
        /* Warna garis bawah */
        display: inline-block;
        padding-bottom: 5px;
        /* Memberikan sedikit ruang antara teks dan garis bawah */
    }

    .about-us-section p {
        font-size: 1.2rem;
        color: #FFFFFF;
    }
</style>

<!-- paragraf us css -->
<style>
    .paragraf-section {
        background-color: #FFFFFF;
        padding: 20px 20px;
        /* Tambahkan padding horizontal */
        text-align: center;
    }

    .paragraf-section h4 {
        color: #202020;
        margin: 0 auto 30px;
        /* Mengatur margin bawah dan sentralisasi */
        max-width: 800px;
        /* Mengatur lebar maksimal paragraf */
        line-height: 1.6;
        /* Menambah jarak antar baris */
    }
</style>

<!-- visi misi css -->
<style>
    .visi-misi-section {
        padding: 50px 0;
        background-color: #FFFFFF;
        /* Warna background sesuai dengan bagian lain */
        text-align: center;
    }

    .visi-misi-section .row {
        display: flex;
        justify-content: space-between;
    }

    .visi-misi-section .col {
        flex: 0 0 48%;
        /* Mengatur lebar kolom agar seimbang */
    }

    .visi-misi-section h3 {
        color: #000000;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .visi-misi-section p,
    .visi-misi-section ul {
        font-size: 1.2rem;
        color: #555;
        line-height: 1.6;
    }

    .visi-misi-section ul {
        padding-left: 20px;
        /* Memberikan indentasi pada daftar */
        list-style-type: disc;
        /* Menggunakan tanda bullet pada daftar */
    }
</style>

<!-- perjalanan for section -->
<style>
    /* Perjalanan Section */
    .perjalanan {
        background-color: #87D5C8;
        padding: 40px 0;
        text-align: center;
        color: white;
    }

    .perjalanan .section-title {
        font-size: 35px;
        color: white;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .perjalanan-description {
        max-width: 800px;
        margin: 0 auto;
        font-size: 18px;
    }

    /* Visi & Misi Section */
    .visi-misi {
        position: relative;
        padding: 40px 0;
    }

    .visi-misi::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 35%;
        /* Adjusted to 35% as per your preference */
        background-color: #87D5C8;
        z-index: -1;
        /* Sends the background behind the content */
    }

    .visi-misi .container {
        display: flex;
        justify-content: space-around;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .visi,
    .misi {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: -1px 0px 0px 7px rgba(0, 0, 0, 0.1);
        width: 45%;
        position: relative;
        z-index: 1;
        /* Ensures the cards appear above the background color */

        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Vertically centers the content */
        align-items: center;
        /* Horizontally centers the content */
        text-align: center;
        /* Centers text horizontally */
    }

    .visi h3,
    .misi h3 {
        font-size: 22px;
        font-weight: bold;
        text-decoration: underline;
        /* Adds an underline to the title */
        margin-bottom: 15px;
    }

    .visi p,
    .misi p {
        font-size: 16px;
        text-align: center;
        /* Centers text horizontally */
    }
</style>


<?= $this->endsection('content'); ?>