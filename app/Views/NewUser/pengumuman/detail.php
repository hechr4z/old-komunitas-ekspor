<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- pengumuman-detail section start -->
<section class="pengumuman-detail-section">
    <div class="container">
        <!-- Pengumuman Header -->
        <div class="pengumuman-detail-header text-center">
            <h1><?= esc($pengumuman->judul_pengumuman) ?></h1>
        </div>

        <!-- Pengumuman Content -->
        <div class="pengumuman-detail-content">
            <img src="<?= base_url('uploads/foto_pengumuman/' . $pengumuman->poster_pengumuman) ?>" class="pengumuman-img" alt="<?= esc($pengumuman->judul_pengumuman) ?>">
            <div class="pengumuman-text">
                <?= esc(strip_tags($pengumuman->deskripsi_pengumuman, '<b><i><u>')) ?>
            </div>


        </div>

        <!-- Back Button -->
        <div class="pengumuman-detail-footer text-center">
            <a href="<?= base_url('/pengumuman') ?>" class="btn btn-primary">Kembali ke Pengumuman</a>
        </div>
    </div>
</section>
<!-- pengumuman-detail section end -->

<!-- recommended pengumuman section start -->
<section class="recommended-pengumuman-section">
    <div class="container">
        <h2 class="text-center">Pengumuman Rekomendasi</h2>
        <div class="row">
            <?php foreach ($recommendedPengumuman as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="<?= base_url('uploads/foto_pengumuman/' . $item->poster_pengumuman) ?>" class="card-img-top" alt="<?= esc($item->judul_pengumuman) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($item->judul_pengumuman) ?></h5>
                            <p class="card-text"><?= character_limiter(strip_tags($item->deskripsi_pengumuman), 100) ?></p>
                            <a href="/pengumuman/<?= esc($item->slug) ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- recommended pengumuman section end -->

<style>
    /* Pengumuman Detail Section */
    .pengumuman-detail-section {
        padding: 60px 15px;
        background-color: #f9f9f9;
        border-bottom: 1px solid #ddd;
    }

    .pengumuman-detail-header h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 10px;
    }

    .pengumuman-detail-header p {
        font-size: 1rem;
        color: #777;
    }

    .pengumuman-detail-content {
        margin-top: 30px;
        text-align: center;
    }

    .pengumuman-img {
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

    .pengumuman-text {
        margin-top: 20px;
        line-height: 1.6;
        font-size: 1.1rem;
        color: #555;
    }

    .pengumuman-detail-footer {
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

    /* Recommended Pengumuman Section */
    .recommended-pengumuman-section {
        padding: 60px 15px;
        background-color: #fff;
    }

    .recommended-pengumuman-section h2 {
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
        .pengumuman-detail-header h1 {
            font-size: 2rem;
        }

        .pengumuman-detail-content {
            padding: 0 15px;
        }

        .pengumuman-text {
            font-size: 1rem;
        }
    }
</style>

<?= $this->endsection('content'); ?>