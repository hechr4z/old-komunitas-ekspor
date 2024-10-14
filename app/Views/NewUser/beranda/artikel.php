<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- artikel section start -->
<section class="artikel-section">
    <div class="container">
        <h2>Artikel</h2>
        <p>Gali potensi yang selama ini kamu yakini bersama mentor yang ahli dibidangnya, <br>kamu bakal dipandu sampai bener bener paham.</p>
    </div>
</section>
<!-- artikel section end -->


<!-- {{-- blog-section start --}} -->
<section class="blog-section">
    <div class="container">
        <div class="sec-title text-center">
            <h2>
                <mark>
                    Blog
                </mark>
            </h2>
            <span class="separator"
                style="background-image: url('assets/images/icons/separator-1.png');"></span>
        </div>
        <div class="row justify-content-center text-center">
            <!-- Artikel Statis 1 -->
            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card shadow-sm border-0 h-100">
                    <img src="<?= base_url('assets-new/images/blog/1.jpeg') ?>" class="card-img-top" alt="Artikel 1">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <p class="text-muted small"><i class="fas fa-calendar-alt"></i> 15 Aug 2024</p>
                        <h5 class="card-title font-weight-bold">Judul Artikel 1</h5>
                        <p class="card-text">Ini adalah potongan konten dari artikel pertama. Konten ini hanya sebagai contoh...</p>
                        <a href="#" class="btn btn-gold btn-block mt-3">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Artikel Statis 2 -->
            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card shadow-sm border-0 h-100">
                    <img src="<?= base_url('assets-new/images/blog/2.jpeg') ?>" class="card-img-top" alt="Artikel 2">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <p class="text-muted small"><i class="fas fa-calendar-alt"></i> 10 Aug 2024</p>
                        <h5 class="card-title font-weight-bold">Judul Artikel 2</h5>
                        <p class="card-text">Ini adalah potongan konten dari artikel kedua. Konten ini hanya sebagai contoh...</p>
                        <a href="#" class="btn btn-gold btn-block mt-3">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Artikel Statis 3 -->
            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card shadow-sm border-0 h-100">
                    <img src="<?= base_url('assets-new/images/blog/3.jpeg') ?>" class="card-img-top" alt="Artikel 3">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <p class="text-muted small"><i class="fas fa-calendar-alt"></i> 05 Aug 2024</p>
                        <h5 class="card-title font-weight-bold">Judul Artikel 3</h5>
                        <p class="card-text">Ini adalah potongan konten dari artikel ketiga. Konten ini hanya sebagai contoh...</p>
                        <a href="#" class="btn btn-gold btn-block mt-3">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/blog" class="view-all-info" style="font-weight: bold">
                Tampilkan Lebih Banyak <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- {{-- blog-section end --}} -->


<!-- css for blog-section -->
<style>
    /* Blog Section */
    .blog-section {
        padding: 50px 0;
        background-color: #FFFFFF;
        /* Warna background */
    }

    .blog-section .sec-title h2 {
        color: #933393;
        /* Warna teks judul */
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .blog-section .sec-title mark {
        background-color: transparent;
        /* Menghilangkan background mark */
        color: #933393;
        /* Warna teks dalam mark */
    }

    .blog-section .separator {
        display: inline-block;
        height: 4px;
        width: 80px;
        background-color: #933393;
        margin: 10px auto 30px auto;
    }

    .blog-section .card {
        transition: all 0.3s ease-in-out;
    }

    .blog-section .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .blog-section .card-img-top {
        border-radius: 5px 5px 0 0;
        height: 200px;
        object-fit: cover;
    }

    .blog-section .card-title {
        color: #333;
        font-size: 1.25rem;
        margin-top: 10px;
    }

    .blog-section .card-text {
        color: #555;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .blog-section .btn-gold {
        background-color: #FFD700;
        color: #333;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .blog-section .btn-gold:hover {
        background-color: #FFC107;
        color: #FFF;
    }

    .view-all-info {
        color: #933393;
        font-size: 1.1rem;
        text-decoration: none;
    }

    .view-all-info:hover {
        color: #FFD700;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .blog-section .card-img-top {
            height: 150px;
            /* Mengurangi tinggi gambar pada layar kecil */
        }

        .blog-section .card-title {
            font-size: 1.15rem;
        }

        .blog-section .card-text {
            font-size: 0.9rem;
        }

        .blog-section .btn-gold {
            font-size: 0.9rem;
        }
    }
</style>

<!-- artikel css -->
<style>
    .artikel-section {
        background-color: #FFF4FF;
        padding: 100px 0;
        text-align: center;
    }

    .artikel-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #933393;
        /* Warna teks dan garis bawah */
        margin-bottom: 10px;
        border-bottom: 3px solid #933393;
        /* Warna garis bawah */
        display: inline-block;
        padding-bottom: 5px;
        /* Memberikan sedikit ruang antara teks dan garis bawah */
    }

    .artikel-section p {
        font-size: 1.2rem;
        color: #555;
    }
</style>

<?= $this->endsection('content'); ?>