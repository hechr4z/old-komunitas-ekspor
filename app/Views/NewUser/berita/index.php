<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- berita section start -->
<section class="berita-section">
    <div class="container">
        <h2>Berita</h2>
        <p>Berita terkini yang bisa kamu raih website ini yuk kepoin!</p>
    </div>
</section>
<!-- berita section end -->

<!-- berita-list-section start -->
<section class="berita-list-section">
    <div class="container">
        <div class="row justify-content-center text-center" id="berita-container">
            <!-- Initial berita -->
            <?php foreach ($activeBerita as $item): ?>
                <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-sm border-0 h-100">
                        <!-- Gambar berita -->
                        <img src="<?= base_url('uploads/foto_berita/' . $item['poster_berita']) ?>" class="card-img-top" alt="<?= esc($item['judul_berita']) ?>">

                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title font-weight-bold"><?= esc($item['judul_berita']) ?></h5>
                            <p class="card-text"><?= character_limiter(strip_tags($item['deskripsi_berita']), 100) ?></p>
                            <p class="text-muted small"><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($item['mulai_berita'])) ?></p>
                            <a href="/berita/<?= esc($item['slug']) ?>" class="btn btn-gold btn-block mt-3">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (current_url() !== site_url('berita/all')): ?>
            <div class="text-center mt-4">
                <a href="/berita/all" class="view-all-info" style="font-weight: bold">
                    Tampilkan Lebih Banyak <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- berita-list-section end -->

<!-- css for berita-list-section -->
<style>
    /* Berita Section */
    .berita-list-section {
        padding: 50px 0;
        background-color: #FFFFFF;
    }

    .berita-list-section .sec-title h2 {
        color: #87D5C8;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .berita-list-section .card {
        transition: all 0.3s ease-in-out;
    }

    .berita-list-section .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .berita-list-section .card-title {
        color: #333;
        font-size: 1.25rem;
        margin-top: 10px;
    }

    .berita-list-section .card-text {
        color: #555;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .berita-list-section .btn-gold {
        background-color: #FFD700;
        color: #333;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .berita-list-section .btn-gold:hover {
        background-color: #FFC107;
        color: #FFF;
    }

    .view-all-info {
        color: #87D5C8;
        font-size: 1.1rem;
        text-decoration: none;
    }

    .view-all-info:hover {
        color: #FFD700;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .berita-list-section .card-title {
            font-size: 1.15rem;
        }

        .berita-list-section .card-text {
            font-size: 0.9rem;
        }

        .berita-list-section .btn-gold {
            font-size: 0.9rem;
        }
    }
</style>

<!-- berita css -->
<style>
    .berita-section {
        position: relative;
        padding: 50px 15px;
        background: url('<?= base_url('assets-new/images/bg2.jpg') ?>') no-repeat center center;
        background-size: cover;
        min-height: 50vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .berita-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #FFFFFF;
        margin-bottom: 10px;
        border-bottom: 3px solid #FFFFFF;
        display: inline-block;
        padding-bottom: 5px;
    }

    .berita-section p {
        font-size: 1.2rem;
        color: #FFFFFF;
    }
</style>

<?= $this->endsection('content'); ?>
