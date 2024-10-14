<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- artikel-detail section start -->
<section class="artikel-detail-section">
    <div class="container">
        <!-- Article Header -->
        <div class="artikel-detail-header text-center">
            <h1><?= esc($artikel['judul_artikel']) ?></h1>
            <p class="text-muted"><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($artikel['created_at'])) ?></p>
        </div>

        <div class="artikel-detail-content">
            <div class="image-wrapper">
                <img src="<?= base_url('uploads/upload_artikel/' . $artikel['foto_artikel']) ?>" class="artikel-img" alt="<?= esc($artikel['judul_artikel']) ?>">
            </div>

            <!-- Tags Badges -->
            <div class="tags mt-3">
                <?php
                // Memisahkan tag berdasarkan koma
                $tags = explode(',', $artikel['tags']);

                // Array warna untuk badge
                $colors = [
                    'badge-primary',
                    'badge-secondary',
                    'badge-success',
                    'badge-danger',
                    'badge-warning',
                    'badge-info',
                    'badge-light',
                    'badge-dark'
                ];

                // Looping untuk menampilkan badge
                foreach ($tags as $tag):
                    // Memilih warna secara acak
                    $randomColor = $colors[array_rand($colors)];
                    $trimmedTag = esc(trim($tag)); ?>
                    <a href="<?= base_url('/artikel/search?keyword=' . urlencode($trimmedTag)) ?>" class="badge <?= $randomColor ?>" style="text-decoration: none;">
                        <?= $trimmedTag ?>
                    </a>
                <?php endforeach; ?>
            </div>


            <div class="artikel-text">
                <?= $artikel['deskripsi_artikel'] ?>
            </div>
        </div>

        <!-- Back Button -->
        <div class="artikel-detail-footer text-center">
            <a href="<?= base_url('/artikel') ?>" class="btn btn-primary">Kembali ke Artikel</a>
        </div>
    </div>
</section>
<!-- artikel-detail section end -->

<!-- recommended articles section start -->
<section class="recommended-articles-section">
    <div class="container">
        <h2 class="text-center">Artikel Rekomendasi</h2>
        <div class="row">
            <?php foreach ($recommendedArticles as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="<?= base_url('uploads/upload_artikel/' . $item['foto_artikel']) ?>" class="card-img-top" alt="<?= esc($item['judul_artikel']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($item['judul_artikel']) ?></h5>
                            <p class="card-text"><?= character_limiter(strip_tags($item['deskripsi_artikel']), 100) ?></p>
                            <a href="/artikel/<?= esc($item['slug']) ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- recommended articles section end -->

<style>
    /* Artikel Detail Section */
    .artikel-detail-section {
        padding: 60px 15px;
        background-color: #f9f9f9;
        border-bottom: 1px solid #ddd;
    }

    .artikel-detail-header h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 10px;
    }


    /* Artikel Text Styling */
    .artikel-text h2,
    .artikel-text h3 {
        margin-top: 20px;
        margin-bottom: 10px;
        color: #333;
    }

    .artikel-text p {
        margin-top: 10px;
        margin-bottom: 10px;
        line-height: 1.6;
        color: #555;
    }

    .artikel-text strong,
    .artikel-text b {
        font-weight: bold;
    }

    /* Add spacing between elements */
    .artikel-text *+* {
        margin-top: 20px;
    }


    .image-wrapper {
        text-align: center;
        /* Center the image within this wrapper */
        margin-top: 30px;
    }

    /* Image styling */
    .artikel-img {
        display: inline-block;
        /* Ensure the image is centered */
        width: 100%;
        max-width: 800px;
        max-height: 300px;
        min-height: 200px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .artikel-text {
        margin-top: 20px;
        line-height: 1.6;
        font-size: 1.1rem;
        color: #555;
        padding-inline-start: 50px;
        padding-inline-end: 50px;
        text-align: justify;
    }

    .artikel-detail-footer {
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

    /* Recommended Articles Section */
    .recommended-articles-section {
        padding: 60px 15px;
        background-color: #fff;
    }

    .recommended-articles-section h2 {
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

    @media (max-width: 1100px) {
        .artikel-text {
            padding: 0px;
        }

        .artikel-detail-header h1 {
            font-size: 2rem;
        }

        .artikel-detail-content {
            padding: 0 15px;
        }

        .artikel-text {
            font-size: 1rem;
        }
    }
</style>

<style>
    .tags {
        margin-top: 10px;
        text-align: center;
    }

    .badge {
        display: inline-block;
        padding: 0.5em 1em;
        margin: 0.25em;
        border-radius: 0.5rem;
        color: white;
        /* Warna teks */
        font-size: 0.875rem;
        text-decoration: none;
        /* Menghilangkan garis bawah */
    }

    .badge-primary {
        background-color: #007bff;
        /* Biru */
    }

    .badge-secondary {
        background-color: #6c757d;
        /* Abu-abu */
    }

    .badge-success {
        background-color: #28a745;
        /* Hijau */
    }

    .badge-danger {
        background-color: #dc3545;
        /* Merah */
    }

    .badge-warning {
        background-color: #ffc107;
        /* Kuning */
    }

    .badge-info {
        background-color: #17a2b8;
        /* Biru Muda */
    }

    .badge-light {
        background-color: #f8f9fa;
        /* Putih */
        color: #333;
        /* Warna teks untuk badge light */
    }

    .badge-dark {
        background-color: #343a40;
        /* Hitam */
    }

    /* Hover effects */
    .badge:hover {
        opacity: 0.8;
        /* Efek saat hover */
    }
</style>

<?= $this->endsection('content'); ?>