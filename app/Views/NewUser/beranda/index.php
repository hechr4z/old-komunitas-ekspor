<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<section class="banner">
    <div class="container"> <!-- Wrapped with container -->
        <div class="row align-items-center">
            <!-- Text Section -->
            <div class="col-md-8">
                <div class="card">
                    <div class="hero-text text-center">
                        <h1><span class="highlight">Jago</span> Digital <span class="highlight">Marketing</span></h1>
                        <p>Jago Digital Marketing adalah pelatihan untuk meningkatkan keterampilan pemasaran digital,
                            mencakup dasar pemasaran online, strategi konten, dan penggunaan iklan digital.
                            Cocok untuk pemula dan profesional, program ini membantu peserta meningkatkan keterampilan
                            dan daya saing bisnis. Bergabunglah untuk membawa bisnis Anda ke level berikutnya!</p>
                        <a href="<?= base_url('pendaftaran_member'); ?>" class="btn btn-custom">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
            <!-- Video Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="hero-video">
                        <iframe
                            id="my-video"
                            class="embed-responsive-item rounded"
                            controls
                            preload="auto"
                            src="https://drive.google.com/file/d/1t9j65vDskKEkI4PZ0pEbPOq_rmoGJEa9/preview"
                            sandbox="allow-scripts allow-same-origin"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            loading="lazy"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- New section with gap and centered title -->
<section class="gap-section mb-5">
    <h1 class="text-center title">Apa sih kelebihan Jago Digital Marketing?</h1>
</section>

<section class="container-fluid features-section">
    <div class="content-wrapper">
        <div class="row feature-details" style="background-color: #87D5C8;
        color: #ffffff; border-radius: 15px; padding: 40px;">
            <div class="col-md-6">
                <div class="feature-header">
                    <h1>Kenapa Jago Digital Marketing<br>Paling Tepat Buat Upskilling?</h1>
                    <p>Melalui Jago Digital Marketing kamu dapat meng-upgrade kemampuan kamu dalam hal softskill dibidang marketing.</p>
                    <p>Berikut beberapa alasan keren kenapa kamu harus ikut kegiatan Jago Digital Marketing :</p>
                    <hr>
                </div>
                <div class="feature-stats">
                    <h1>1087+</h1>
                    <p>Lulusan Pelatihan dengan berbagai background, mulai dari lulusan SMA sampai Professional.</p>
                </div>
                <div class="feature-stats">
                    <h1>630+</h1>
                    <p>Facilitator sudah berpartisipasi dalam mencetak talenta-talenta digital melalui Pelatihan.</p>
                </div>
                <div class="feature-stats">
                    <h1>120+</h1>
                    <p>Perusahaan hiring partner di Indonesia yang siap dikoneksikan dengan Pelatihan.</p>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column align-items-center">
                <?php foreach ($keuntungan as $item): ?>
                    <div class="card-custom">
                        <img src="<?= base_url('uploads/icons/' . $item['icon_keuntungan']) ?>" alt="<?= $item['judul_keuntungan'] ?>" class="profile-img" loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item['judul_keuntungan'] ?></h5>
                            <p class="card-text"><?= $item['deskripsi_keuntungan'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</section>

<!-- New section with gap and centered title -->
<section class="gap-section mb-5">
    <div class="text-center">
        <h1 class="title">Pilih Jago Digital Marketing Yang Sudah <br>
            Terpecaya Untuk Kembangkan Usahamu!
        </h1>
        <h5>
            Ayo pelajari lebih lanjut apa sih Jago Digital Marketing? Yuk kepoin!
        </h5>
        <a href="<?= base_url('pendaftaran_member'); ?>" class="btn btn-custom">Daftar Sekarang</a>
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
                                loading="lazy"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="founders-section">
    <h2>Founder of Jago Digital Marketing</h2>
    <p>Siapa sih pendiri dari Jago Digital Marketing? Yuk kenalan dulu!</p>
    <div class="founders">
        <?php foreach ($founder as $founder): ?>
            <div class="founder-card">
                <img src="<?= base_url('uploads/foto_founder/' . $founder->foto_founder) ?>" alt="<?= $founder->nama_founder ?>" class="profile-img" loading="lazy">
                <img src="<?= base_url('assets-new/images/logo.png') ?>" class="logo" alt="Logo">
                <div class="info">
                    <h3 class="card-title"><?= $founder->nama_founder ?></h3>
                    <p class="card-text"><?= $founder->jabatan_founder ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<section class="event-section">
    <h2>Pengumuman Terkini dari Jago Digital Marketing</h2>
    <p class="subheading">
        "Jangan lewatkan kesempatan ini untuk bergabung dengan para ahli di Pengumuman Terkini dari Jago Digital Marketing!"
    </p>
    <div class="events-container">
        <?php foreach ($pengumuman as $event): ?>
            <div class="event-card">
                <div class="image-container">
                    <img src="<?= base_url('uploads/foto_pengumuman/' . $event['poster_pengumuman']) ?>" loading="lazy" alt="<?= esc($event['judul_pengumuman']) ?> ">
                </div>
                <div class="event-details">
                    <h3><?= esc($event['judul_pengumuman']) ?></h3>
                    <p><?= esc(strip_tags($event['deskripsi_pengumuman'])) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="view-all-btn" onclick="window.location.href='/pengumuman'">Lihat semua</button>

</section>


<!-- New section with gap and centered title -->
<section class="gap-section mb-5">
    <div class="text-center">
        <h1 class="title">Cerita Sukses Alumni Jago Digital Marketing
        </h1>
        <h5>
            Mereka sudah merasakan serunya belajar skill digital marketing dan meraih kesuksesan yang mereka inginkan.
            <br> Kamu selanjutnya?
        </h5>
    </div>
</section>

<section class="testimoni">
    <div class="container">
        <div class="row">
            <?php if (!empty($testimoni)): ?>
                <?php foreach ($testimoni as $item): ?>
                    <div class="col-md-4">
                        <div class="card testimoni-card">
                            <div class="card-body">
                                <blockquote class="testimoni-quote">
                                    <p><?= $item['deskripsi_testimonial'] ?></p>
                                </blockquote>
                                <div class="testimoni-author">
                                    <img src="<?= base_url('uploads/testimonial/' . $item['foto_testimonial']) ?>" loading="lazy" alt="<?= $item['nama_member'] ?>" class="author-image">
                                    <div class="author-info">
                                        <h5 class="author-name"><?= $item['nama_member'] ?></h5>
                                        <p class="author-title"><?= $item['jabatan_testimonial'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada testimoni yang tersedia saat ini.</p>
            <?php endif; ?>
        </div>
    </div>
</section>



<!-- css for event -->
<style>
    .event-section {
        text-align: center;
        padding: 50px;
        background-color: #FFFFFF;
    }

    .event-section h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #333;
    }

    .subheading {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 40px;
    }

    .events-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .event-card {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        width: 320px;
        display: flex;
        flex-direction: column;
    }

    .image-container {
        position: relative;
    }

    .image-container img {
        width: 100%;
        height: auto;
    }

    .category-label {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px 10px;
        font-weight: bold;
        color: #333;
        border-radius: 3px;
    }

    .event-details {
        padding: 20px;
        text-align: left;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .event-details h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #333;
    }

    .event-details p {
        font-size: 1rem;
        color: #777;
        margin-bottom: 10px;
        flex-grow: 1;
    }

    .event-location {
        font-size: 1.2rem;
        /* Ukuran teks sedikit diperbesar */
        color: #ff8c00;
        /* Warna oranye */
        font-weight: bold;
    }

    .view-all-btn {
        background-color: #ff8c00;
        color: white;
        border: none;
        padding: 15px 30px;
        font-size: 1rem;
        margin-top: 30px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .view-all-btn:hover {
        background-color: #e67e00;
    }
</style>

<!-- css for founder -->
<style>
    .founders-section {
        position: relative;
        text-align: center;
        padding: 30px 20px;
        border-radius: 20px;
        margin: 90px auto 20px;
        /* Added 50px margin-top for space above */
        max-width: 1000px;
        box-sizing: border-box;
        overflow: hidden;
    }


    .founders-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 70%;
        border-radius: 20px;
        background-color: #87D5C8;
        z-index: -1;
        border-radius: 20px 20px 0 0;
    }



    .founders-section h2,
    .founders-section p {
        margin: 0;
        padding: 0 20px;
        color: #fff;
    }

    .founders-section h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .founders-section p {
        margin-bottom: 30px;
    }

    .founders {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .founder-card {
        position: relative;
        /* Needed for absolute positioning within the card */
        background-color: #fff;
        border-radius: 20px;
        overflow: hidden;
        width: 250px;
        /* Adjust width as needed */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        box-sizing: border-box;
        margin-bottom: 20px;
    }

    .founder-card img {
        border-radius: 20px;
        width: 100%;
        height: auto;

    }

    .founder-card .logo {
        position: absolute;
        top: 10px;
        left: 10px;
        width: 50px;
        /* Adjust the width as needed */
        height: auto;
        /* Maintain aspect ratio */
        object-fit: contain;
        /* Ensure image is contained within the width */
    }


    .founder-card .info {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(255, 152, 0, 0.9);
        /* Semi-transparent background for the text */
        color: #fff;
        padding: 10px;
        box-sizing: border-box;
        text-align: left;
        border-radius: 0 0 20px 20px;
        /* Match the bottom border-radius */
    }

    .founder-card h3 {
        font-size: 18px;
        /* Adjusted font size for the smaller card */
        margin: 0;
    }

    .founder-card p {
        font-size: 14px;
        /* Adjusted font size for the smaller card */
        margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 900px) {
        .founders {
            flex-direction: column;
            align-items: center;
        }

        .founder-card {
            width: 80%;
        }
    }

    @media (max-width: 600px) {
        .founder-card {
            width: 100%;
            padding: 15px;
        }

        .founders-section h2 {
            font-size: 24px;
        }

        .founders-section p {
            font-size: 14px;
        }

        .founder-card h3 {
            font-size: 18px;
        }

        .founder-card p {
            font-size: 14px;
        }
    }
</style>

<!-- css for banner -->
<style>
    /* Section Banner Styles */
    .banner {
        position: relative;
        padding: 50px 15px;
        /* Reduced from 100px to 50px */
        background: url('<?= base_url('assets-new/images/bg1.jpg') ?>') no-repeat center center;
        background-size: cover;
        min-height: 50vh;
        /* Adjusted from 0vh to 50vh for better height control */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .banner .row.align-items-center {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 1200px;
        flex-wrap: wrap;
        /* Allow wrapping of content on smaller screens */
    }

    .banner .card {
        background-color: transparent;
        /* Fully transparent background */
        border: none;
        box-shadow: none;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .banner .card-body {
        padding: 20px;
    }

    .banner .hero-text {
        color: white;
        text-align: justify;
        padding: 20px;
        border-radius: 10px;
        max-width: 100%;
    }

    .banner .hero-text .highlight {
        color: #ffb228;
    }

    .banner .hero-text h1 {
        font-size: 2.5rem;
        font-weight: 900;
        color: #ffffff;
        margin-bottom: 20px;
    }

    .banner .hero-text p {
        text-align: justify;
        font-size: 1rem;
        line-height: 1.5;
        color: #ffffff;
        margin-top: 15px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
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

    .banner .hero-video iframe {
        width: 100%;
        height: 200px;
        border-radius: 10px;
    }

    /* Responsive adjustments */
    @media (min-width: 768px) {
        .banner .hero-text h1 {
            font-size: 3rem;
        }

        .banner .hero-video iframe {
            height: 250px;
        }
    }

    @media (max-width: 767px) {
        .banner .row.align-items-center {
            flex-direction: column;
            align-items: center;
        }

        .banner .hero-text {
            margin-bottom: 20px;
        }

        .banner .hero-text p {
            text-align: justify;
        }
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

<!-- css for fitur -->
<style>
    .features-section {
        padding-inline-start: 100px;
        padding-inline-end: 100px;
    }

    .feature-header h1,
    .feature-stats h1 {
        font-size: 2rem;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 20px;

    }

    .feature-header p,
    .feature-stats p {
        font-size: 1rem;
        color: #ffffff;

    }

    .feature-header {
        margin-bottom: 20px;
    }

    .feature-stats {
        margin-bottom: 20px;
    }

    .feature-stats h1 {
        margin-bottom: 10px;
    }

    .features-section .card-custom {
        display: flex;
        align-items: center;
        color: #700707;
        height: 70%;
        width: 100%;
        margin-bottom: 30px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 20px;
    }

    .features-section .card-custom img.profile-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        margin-right: 15px;
        border-radius: 50%;
        margin-left: 2rem;
    }

    .features-section .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #333;
    }

    .features-section .card-text {
        font-size: 1rem;
        color: #555;
    }

    .features-section .gap-section {
        margin-top: 50px;
    }

    .features-section .title {
        font-size: 2rem;
        color: #933393;
        font-weight: 700;
    }

    .features-section .content-wrapper {
        padding: 0px;
    }

    /* Existing styles for .card-custom remain unchanged */

    /* Existing styles for .card-custom remain unchanged */

    @media (max-width: 768px) {
        .features-section {
            padding-inline-start: 50px;
            padding-inline-end: 50px;
        }

        .features-section .card-custom {
            flex-direction: column;
            align-items: center;
            /* Center align items horizontally */
            padding: 15px;
            /* Optional: Add padding for better spacing on smaller screens */
            width: 100%;
            /* Make card take full width */
        }

        .features-section .card-custom img.profile-img {
            margin-right: 0;
            /* Remove margin-right */
            margin-bottom: 15px;
            /* Add margin-bottom to separate image from text */
            margin-left: 0;
            /* Adjust margin-left if needed */
        }

        .features-section .card-body {
            text-align: center;
            /* Center align text */
            width: 100%;
            /* Ensure the card-body takes full width */
        }

        .features-section .card-title,
        .features-section .card-text {
            margin: 0 auto;
            /* Center align text within the card-body */
        }
    }



    @media (min-width: 992px) {
        .features-section .content-wrapper {
            padding: 20px;
        }
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

<!-- css for testimoni -->
<style>
    /* Testimoni Section */
    .testimoni {
        padding: 60px 15px;
        background-color: #FFFFFF;
        overflow-x: auto;
        /* Enable horizontal scroll */
        scrollbar-width: none;
        /* Hide scrollbar in Firefox */
        -ms-overflow-style: none;
        /* Hide scrollbar in IE and Edge */
    }

    .testimoni .row {
        display: flex;
        flex-wrap: nowrap;
        /* Prevent wrapping of cards */
    }

    .testimoni .col-md-4 {
        flex: 0 0 auto;
        width: 30.33%;
        /* Set width for each card (33% for 3 cards) */
        max-width: 30.33%;
        /* Ensure width doesn't exceed 33% */
    }

    .testimoni .testimoni-card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Center content vertically */
        height: 100%;
        padding: 20px;
        /* Optional padding for better spacing */
        margin-right: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* Hover effect */
    }

    .testimoni .testimoni-card:hover {
        transform: scale(1.05);
        /* Slightly increase size on hover */
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        /* Intensify shadow on hover */
    }

    .testimoni .testimoni-quote {
        font-size: 1.1rem;
        line-height: 1.5;
        color: #3C3C3C;
        margin: auto;
        /* Center the quote both horizontally and vertically */
        font-style: italic;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        /* Center text horizontally */
        flex-grow: 1;
    }

    .testimoni-card .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Center content vertically */
        height: 100%;
        padding: 20px;
        /* Optional padding for better spacing */
    }

    .testimoni .testimoni-author {
        margin-top: auto;
        /* Pushes the author section to the bottom of the card */
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 20px;
    }

    .testimoni .author-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .testimoni .author-info {
        text-align: left;
    }

    .testimoni .author-name {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: #000000;
    }

    .testimoni .author-title {
        font-size: 0.875rem;
        color: #666666;
    }

    .testimoni .author-title strong {
        font-weight: 600;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .testimoni {
            overflow-x: auto;
            /* Hide horizontal scroll on small screens */
            scrollbar-width: none;
            /* Hide scrollbar in Firefox */
            -ms-overflow-style: none;
            /* Hide scrollbar in IE and Edge */
        }

        .testimoni .row {
            flex-wrap: nowrap;
            /* Ensure cards don't wrap */
        }

        .testimoni .col-md-4 {
            width: 100%;
            /* Make each card take full width */
            max-width: 100%;
            margin-right: 0;
            /* Remove right margin */
        }

        .testimoni .testimoni-card {
            margin-right: 0;
        }
    }
</style>

<?= $this->endsection('content'); ?>