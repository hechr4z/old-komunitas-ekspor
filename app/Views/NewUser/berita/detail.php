<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- berita-detail section start -->
<section class="berita-detail-section">
    <div class="container">
        <!-- Berita Header -->
        <div class="berita-detail-header text-center">
            <h1><?= esc($berita->judul_berita) ?></h1>
        </div>

        <!-- Berita Content -->
        <div class="berita-detail-content">
            <img src="<?= base_url('uploads/foto_berita/' . $berita->poster_berita) ?>" class="berita-img" alt="<?= esc($berita->judul_berita) ?>">
            <div class="berita-text">
                <?= esc(strip_tags($berita->deskripsi_berita, '<b><i><u>')) ?>
            </div>
        </div>

        <!-- Back Button -->
        <div class="berita-detail-footer text-center">
            <a href="<?= base_url('/berita') ?>" class="btn btn-primary">Kembali ke Berita</a>
        </div>
    </div>
</section>
<!-- berita-detail section end -->

<!-- recommended berita section start -->
<section class="recommended-berita-section">
    <div class="container">
        <h2 class="text-center">Berita Rekomendasi</h2>
        <div class="row">
            <?php foreach ($recommendedBerita as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="<?= base_url('uploads/foto_berita/' . $item->poster_berita) ?>" class="card-img-top" alt="<?= esc($item->judul_berita) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($item->judul_berita) ?></h5>
                            <p class="card-text"><?= character_limiter(strip_tags($item->deskripsi_berita), 100) ?></p>
                            <a href="/berita/<?= esc($item->slug) ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- recommended berita section end -->

<style>
    /* Berita Detail Section */
    .berita-detail-section {
        padding: 60px 15px;
        background-color: #f9f9f9;
        border-bottom: 1px solid #ddd;
    }

    .berita-detail-header h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 10px;
    }

    .berita-detail-header p {
        font-size: 1rem;
        color: #777;
    }

    .berita-detail-content {
        margin-top: 30px;
        text-align: center;
    }

    .berita-img {
        width: 100%;
        max-width: 800px;
        max-height: 300px;
        /* Set a maximum height for images */
        min-height: 200px;
        /* Set a minimum height for images */
        object-fit: cover;
        /* Ensure the image covers the area without distortion */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .berita-text {
        margin-top: 20px;
        line-height: 1.6;
        font-size: 1.1rem;
        color: #555;
    }

    .berita-detail-footer {
        margin-top: 40px;
    }

    .btn-primary {
        background-color: #87D5C8;
        color: #fff;
        font-weight: bold;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #66b2a5;
    }

    /* Recommended Berita Section */
    .recommended-berita-section {
        padding: 60px 15px;
        background-color: #fff;
    }

    .recommended-berita-section h2 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
    }

    .card {
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        /* Ensure uniform card heights */
        height: 100%;
        /* Adjusts to fill the available height */
    }

    .card-img-top {
        width: 100%;
        height: 200px;
        /* Set a fixed height for the card images */
        object-fit: cover;
        /* Ensure the image covers the area without distortion */
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        padding: 20px;
        flex-grow: 1;
        /* Allow the body to grow and fill available space */
        display: flex;
        flex-direction: column;
    }

    .card-title {
        font-size: 1.25rem;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
        flex-grow: 1;
        /* Allow text to grow and fill available space */
    }

    .btn-primary {
        background-color: #87D5C8;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #66b2a5;
    }

    @media (max-width: 768px) {
        .berita-detail-header h1 {
            font-size: 2rem;
        }

        .berita-detail-content {
            padding: 0 15px;
        }

        .berita-text {
            font-size: 1rem;
        }
    }
</style>

<?= $this->endsection('content'); ?>
