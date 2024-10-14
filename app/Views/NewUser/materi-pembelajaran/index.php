<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<?php
// Get the session object
$session = session();
$loggedIn = $session->get('logged_in');
?>

<?php if ($loggedIn): ?>

    <!-- video section start -->
    <section class="video-section">
        <div class="container">
            <h2>Materi Pembelajaran</h2>
            <p>Temukan materi pembelajaran yang telah disusun oleh mentor-mentor ahli, <br> dan pelajari dengan mendalam melalui video-video yang informatif dan mudah dipahami.</p>
        </div>
    </section>
    <!-- video section end -->

    <!-- Section Video -->
    <section class="video">
        <!-- Video Categories and Videos Start -->
        <div class="container-fluid mt-5 pt-3">
            <div class="container">
                <?php if (empty($kategoriVideoModels)) : ?>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="container text-center" style="min-height: 50vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <p>Tidak Ada Kategori Video Terkait</p>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php foreach ($kategoriVideoModels as $category) : ?>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="text-uppercase font-weight-bold mb-0" style="margin-bottom: 5px;"><?= $category->nama_kategori_video ?></h5>
                                    <a href="<?= base_url('/video/kategori/' . $category->slug) ?>" class="btn btn-primary">Selengkapnya</a>
                                </div>
                                <hr style="border-top: 2px solid #000; margin-top: 15px;">
                                <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4 pt-2">
                                    <?php
                                    $hasVideos = false; // Flag to check if there are videos in this category
                                    foreach ($videoPembelajaranModels as $video) :
                                        if ($video->id_katvideo == $category->id_katvideo) :
                                            $hasVideos = true; // Set flag to true if a video is found
                                    ?>
                                            <div class="col-4" style="max-width: 250px;">
                                                <a href="<?= base_url('/video/detail/' . $video->slug) ?>" style="text-decoration: none; color: inherit;">
                                                    <div class="card" style="width: 100%; height: 380px; display: flex; flex-direction: column; cursor: pointer; border-radius: 8px; transition: box-shadow 0.3s, transform 0.3s;">
                                                        <img src="uploads/thumbnails/<?= $video->thumbnail ?>" class="card-img-top" alt="<?= $video->judul_video ?>" style="height: 200px; object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                                                        <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                                                            <h6 class="card-title" style="flex-grow: 0; margin-bottom: 10px; word-wrap: break-word; white-space: normal;"><?= $video->judul_video ?></h6>
                                                            <p class="card-text" style="flex-grow: 1; word-wrap: break-word; white-space: normal;">
                                                                <?= strlen($video->deskripsi_video) > 45 ? substr($video->deskripsi_video, 0, 45) . '...' : $video->deskripsi_video ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php
                                        endif;
                                    endforeach;
                                    if (!$hasVideos) : // If no videos were found, display the message
                                        ?>
                                        <div class="container text-center">
                                            <p>Tidak Ada Video yang Tersedia</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- Video Categories and Videos End -->
    </section>

<?php else: ?>

    <!-- Section Banner -->
    <section class="banner">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Section -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="hero-text text-center">
                            <h1>Pelatihan <span class="highlight">Pematangan Marketing Digital</span> Guna Memajukan UMKM</h1>
                            <p>Jadikan usaha Anda semakin unggul dengan mengikuti pelatihan pematangan marketing digital agar Anda semakin kompeten bersama mentor-mentor ahli.</p>
                            <a href="#section-id" class="btn btn-custom">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
                <!-- Video/Image Section -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= base_url('assets-new/images/materi1.png') ?>" alt="Materi Pelatihan" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Paragraf Section Start -->
    <section class="paragraf">
        <div class="container">
            <h3>Saat Ini</h3>
            <p>
                Jago Digital Marketing telah berhasil menempatkan 94% UMKM di usaha yang diinginkan. Namun, kami tidak berhenti di situ. Jago Digital Marketing juga telah mendapatkan kepercayaan dari berbagai universitas negeri dan swasta di Indonesia untuk bekerja sama dalam menghasilkan lulusan yang unggul dan berkualitas tinggi.
            </p>
        </div>
    </section>
    <!-- Paragraf Section End -->

    <!-- Benefits Section Start -->
    <section class="benefits-section">
        <div class="container">
            <h2 class="benefits-title">Manfaat yang Akan Didapatkan Saat Mengikuti Pelatihan</h2>
            <div class="benefits-grid">
                <div class="benefit-text">
                    <h4><i class="fas fa-laptop"></i> Learning Management System Terintegrasi</h4>
                    <p>Nikmati kenyamanan dan kemudahan seluruh rangkaian pembelajaran dengan Learning Management System berbasis website yang terintegrasi.</p>
                </div>
                <div class="benefit-image">
                    <img src="<?= base_url('assets-new/images/manfaat/manfaat1.png') ?>" alt="Learning Management System Terintegrasi">
                </div>
                <div class="benefit-image">
                    <img src="<?= base_url('assets-new/images/manfaat/manfaat2.png') ?>" alt="Dukungan Fasilitator">
                </div>
                <div class="benefit-text">
                    <h4><i class="fas fa-headset"></i> Dukungan Fasilitator</h4>
                    <p>Selama pembelajaran berlangsung, mahasiswa Anda akan didampingi oleh fasilitator yang siap membantu peserta dalam aspek-aspek teknis.</p>
                </div>
                <div class="benefit-text">
                    <h4><i class="fas fa-video"></i> Dokumentasi Kelas</h4>
                    <p>Akses selamanya ke video rekaman kelas dan materi pembelajaran melalui Learning Management System yang disediakan.</p>
                </div>
                <div class="benefit-image">
                    <img src="<?= base_url('assets-new/images/manfaat/manfaat3.png') ?>" alt="Dokumentasi Kelas">
                </div>
                <div class="benefit-image">
                    <img src="<?= base_url('assets-new/images/manfaat/manfaat4.png') ?>" alt="Konsultasi dengan Mentor">
                </div>
                <div class="benefit-text">
                    <h4><i class="fas fa-user-friends"></i> Konsultasi dengan Mentor</h4>
                    <p>Manfaatkan layanan konsultasi gratis bersama mentor untuk menjawab segala permasalahan seputar persiapan karier bagi mahasiswa kampus Anda.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefits Section End -->

    <!-- New section with gap and centered title -->
    <section class="gap-section mb-5">
        <div class="text-center">
            <h1 class="title">Cuplikan Beberapa Video Pembelajaran
            </h1>
        </div>
    </section>

    <section class="container-fluid custom-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-custom">
                        <div class="card-body">
                            <!-- Text Section -->
                            <div class="hero-text">
                                <h1 style="color: #87D5C8;">Masih Bingung dan Galau <br> Mau Ikut Pelatihan JDM?</h1>
                                <br>
                                <p style="color:#000000">Coba simak penjelasan singkat dari salah satu mentor Pelatihan Jago <br> Digital Marketing disamping ini.</p>
                            </div>
                            <!-- Video Section -->
                            <div class="hero-video">
                                <iframe
                                    id="my-video"
                                    class="embed-responsive-item rounded"
                                    style="width: 100%; max-width: 100%; height: auto;"
                                    controls
                                    preload="auto"
                                    src=" https://drive.google.com/file/d/1t9j65vDskKEkI4PZ0pEbPOq_rmoGJEa9/preview"
                                    sandbox="allow-scripts allow-same-origin"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid custom-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-custom">
                        <div class="card-body">
                            <!-- Text Section -->
                            <div class="hero-text">
                                <h1 style="color: #87D5C8;">Masih Bingung dan Galau <br> Mau Ikut Pelatihan JDM?</h1>
                                <br>
                                <p style="color:#000000">Coba simak penjelasan singkat dari salah satu mentor Pelatihan Jago <br> Digital Marketing disamping ini.</p>
                            </div>
                            <!-- Video Section -->
                            <div class="hero-video">
                                <iframe
                                    id="my-video"
                                    class="embed-responsive-item rounded"
                                    style="width: 100%; max-width: 100%; height: auto;"
                                    controls
                                    preload="auto"
                                    src=" https://drive.google.com/file/d/1t9j65vDskKEkI4PZ0pEbPOq_rmoGJEa9/preview"
                                    sandbox="allow-scripts allow-same-origin"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid custom-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-custom">
                        <div class="card-body">
                            <!-- Text Section -->
                            <div class="hero-text">
                                <h1 style="color: #87D5C8;">Masih Bingung dan Galau <br> Mau Ikut Pelatihan JDM?</h1>
                                <br>
                                <p style="color:#000000">Coba simak penjelasan singkat dari salah satu mentor Pelatihan Jago <br> Digital Marketing disamping ini.</p>
                            </div>
                            <!-- Video Section -->
                            <div class="hero-video">
                                <iframe
                                    id="my-video"
                                    class="embed-responsive-item rounded"
                                    style="width: 100%; max-width: 100%; height: auto;"
                                    controls
                                    preload="auto"
                                    src=" https://drive.google.com/file/d/1t9j65vDskKEkI4PZ0pEbPOq_rmoGJEa9/preview"
                                    sandbox="allow-scripts allow-same-origin"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid custom-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-custom">
                        <div class="card-body">
                            <!-- Text Section -->
                            <div class="hero-text">
                                <h1 style="color: #87D5C8;">Masih Bingung dan Galau <br> Mau Ikut Pelatihan JDM?</h1>
                                <br>
                                <p style="color:#000000">Coba simak penjelasan singkat dari salah satu mentor Pelatihan Jago <br> Digital Marketing disamping ini.</p>
                            </div>
                            <!-- Video Section -->
                            <div class="hero-video">
                                <iframe
                                    id="my-video"
                                    class="embed-responsive-item rounded"
                                    style="width: 100%; max-width: 100%; height: auto;"
                                    controls
                                    preload="auto"
                                    src=" https://drive.google.com/file/d/1t9j65vDskKEkI4PZ0pEbPOq_rmoGJEa9/preview"
                                    sandbox="allow-scripts allow-same-origin"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid custom-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-custom">
                        <div class="card-body">
                            <!-- Text Section -->
                            <div class="hero-text">
                                <h1 style="color: #87D5C8;">Masih Bingung dan Galau <br> Mau Ikut Pelatihan JDM?</h1>
                                <br>
                                <p style="color:#000000">Coba simak penjelasan singkat dari salah satu mentor Pelatihan Jago <br> Digital Marketing disamping ini.</p>
                            </div>
                            <!-- Video Section -->
                            <div class="hero-video">
                                <iframe
                                    id="my-video"
                                    class="embed-responsive-item rounded"
                                    style="width: 100%; max-width: 100%; height: auto;"
                                    controls
                                    preload="auto"
                                    src=" https://drive.google.com/file/d/1t9j65vDskKEkI4PZ0pEbPOq_rmoGJEa9/preview"
                                    sandbox="allow-scripts allow-same-origin"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid custom-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-custom">
                        <div class="card-body">
                            <!-- Text Section -->
                            <div class="hero-text">
                                <h1 style="color: #87D5C8;">Masih Bingung dan Galau <br> Mau Ikut Pelatihan JDM?</h1>
                                <br>
                                <p style="color:#000000">Coba simak penjelasan singkat dari salah satu mentor Pelatihan Jago <br> Digital Marketing disamping ini.</p>
                            </div>
                            <!-- Video Section -->
                            <div class="hero-video">
                                <iframe
                                    id="my-video"
                                    class="embed-responsive-item rounded"
                                    style="width: 100%; max-width: 100%; height: auto;"
                                    controls
                                    preload="auto"
                                    src=" https://drive.google.com/file/d/1t9j65vDskKEkI4PZ0pEbPOq_rmoGJEa9/preview"
                                    sandbox="allow-scripts allow-same-origin"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<!-- video css -->
<style>
    .video-section {
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

    .video-section h2 {
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

    .video-section p {
        font-size: 1.2rem;
        color: #FFFFFF;
    }
</style>


<!-- css for section kelebihan -->
<style>
    .custom-section .card-custom {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 1200px;
        /* Maksimum lebar kartu */
        margin: 0 auto;
        /* Mengatur kartu agar berada di tengah */
        padding: 20px;
        /* Memberikan ruang internal pad    a kartu */
        box-shadow: 13px 9px 0px 0px rgb(135 213 200);
        /* Memberikan efek bayangan ringan */
        border-radius: 10px;
        /* Membuat sudut kartu menjadi lebih halus */
        box-sizing: border-box;
        /* Memastikan padding dan border termasuk dalam lebar total */
    }

    .custom-section .card-custom .card-body {
        display: flex;
        flex-direction: column;
        /* Menyusun elemen dalam kolom di layar kecil */
        flex: 1;
        /* Memastikan card-body mengambil ruang yang tersedia */
    }

    .custom-section .card-custom .hero-text h1 {
        font-size: 2.5rem;
        /* Sesuaikan ukuran font sesuai kebutuhan */
        line-height: 1.2;
        /* Mengatur jarak antar baris untuk keterbacaan */
    }

    @media (min-width: 768px) {
        .custom-section .card-custom .card-body {
            flex-direction: row;
            align-items: flex-start;
            /* Beralih ke tata letak horizontal di layar yang lebih besar */
        }

        .custom-section .card-custom .hero-text h1 {
            font-size: 2rem;
            font-weight: 700;
            /* Ukuran font yang lebih besar di layar besar */
        }
    }

    .custom-section .card-custom .hero-text {
        flex: 1;
        margin-bottom: 20px;
    }


    .custom-section .card-custom .hero-video iframe {
        width: 100%;
        max-width: 300px;
        height: 500px;
        /* Menyesuaikan tinggi video secara proporsional */
        border-radius: 8px;
    }
</style>

<!-- css for section gap -->
<style>
    /* Gap below the banner */
    .gap-section {
        margin-top: 50px;
        /* Adjust the gap as needed */
    }

    .gap-section .btn-custom {
        margin-top: 20px;
        background-color: #ffd700;
        color: #000000;
        padding: 10px 20px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
        transition: background-color 0.3s, color 0.3s;
    }

    .gap-section .btn-custom:hover {
        background-color: #ffa500;
        color: #ffffff;
    }

    /* Centered title with purple color */
    .gap-section .title {
        font-size: 2rem;
        color: #121212;
        font-weight: 700;
        /* Purple color */
        margin-bottom: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .gap-section .title {
            font-size: 1.5rem;
            font-weight: 600;
            /* Smaller font size and lighter weight for small screens */
        }
    }
</style>

<!-- Menyesuaikan tata letak untuk memastikan footer tetap di bagian bawah -->
<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
    }

    @media (max-width: 768px) {
        .card-text {
            display: none;
        }
    }

    .scrolling-wrapper {
        overflow-x: scroll;
        /* Allows horizontal scrolling */
        -ms-overflow-style: none;
        /* Hides scrollbar in IE and Edge */
        scrollbar-width: none;
        /* Hides scrollbar in Firefox */
    }

    .scrolling-wrapper::-webkit-scrollbar {
        display: none;
        /* Hides scrollbar in Chrome, Safari, and Opera */
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
    }
</style>

<!-- css for banner-section -->
<style>
    /* Section Banner Styles */
    .banner {
        position: relative;
        padding: 100px 15px;
        background: url('<?= base_url('assets-new/images/bg1.jpg') ?>') no-repeat center center;
        background-size: cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .banner .row.align-items-center {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 1200px;
        flex-wrap: wrap;
    }

    .banner .card {
        background-color: transparent;
        border: none;
        box-shadow: none;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .banner .hero-text {
        color: white;
        padding: 20px;
        border-radius: 10px;
    }

    .banner .hero-text .highlight {
        color: #ffb228;
    }

    .banner .hero-text h1 {
        font-size: 3.3rem;
        font-weight: 900;
        color: #ffffff;
        text-align: left;
        margin-bottom: 20px;
    }

    .banner .hero-text p {
        text-align: justify;
        font-size: 1.6rem;
        line-height: 1.5;
        color: #ffffff;
        margin-top: 15px;
    }

    .banner .btn-custom {
        margin-top: 20px;
        background-color: #ffd700;
        color: #000000;
        padding: 10px 20px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
        transition: background-color 0.3s, color 0.3s;
    }

    .banner .btn-custom:hover {
        background-color: #ffa500;
        color: #ffffff;
    }

    .banner .img-fluid {
        border-radius: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .banner .row.align-items-center {
            flex-direction: column;
            text-align: center;
        }

        .banner .col-md-8,
        .banner .col-md-4 {
            max-width: 100%;
        }

        .banner .hero-text h1 {
            font-size: 2rem;
        }
    }
</style>

<!-- CSS for Paragraf Section -->
<style>
    .paragraf {
        background-color: #E0E0E0;
        padding: 50px 20px;
    }

    .paragraf .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .paragraf h3 {
        text-align: left;
        color: #000000;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .paragraf p {
        text-align: justify;
        font-size: 1.2rem;
        color: #333333;
        line-height: 1.6;
    }
</style>

<!-- css for benefit -->
<style>
    /* Benefits Section Styles */
    .benefits-section {
        padding: 50px 20px;
        background-color: transparent;

    }

    .benefit-item {

        /* Putih dengan transparansi 80% */
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        max-width: 300px;
    }

    .benefits-title {
        text-align: center;
        color: #000000;
        font-size: 1.5rem;
        margin-bottom: 30px;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        align-items: center;
        justify-items: center;
    }

    .benefit-text,
    .benefit-image {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
    }

    .benefit-text h4 {
        color: #FFB332;
        margin-bottom: 10px;
    }

    .benefit-text p {
        color: #333333;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .benefit-image img {
        max-width: 100%;
        border-radius: 15px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .benefits-grid {
            grid-template-columns: 1fr;
        }
    }
</style>




<?= $this->endsection('content'); ?>