<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- artikel section start -->
<section class="artikel-section">
    <div class="container">
        <h2>Hasil Pencarian Artikel</h2>
        <?php if (!empty($data['keyword'])): ?>
            <p>Menampilkan hasil pencarian untuk: <strong><?= esc($data['keyword']) ?></strong></p>
        <?php endif; ?>

        <!-- Search Bar Start -->
        <form action="/artikel/search" method="GET" class="search-bar">
            <input type="text" name="keyword" id="search-input" placeholder="<?= isset($data['keyword']) ? esc($data['keyword']) : 'Cari artikel...' ?>" aria-label="Cari artikel" required>
            <button type="submit" id="search-button">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <!-- Search Bar End -->

    </div>
</section>
<!-- artikel section end -->

<section class="blog-section">
    <div class="container">
        <!-- Tampilkan Hasil Pencarian -->
        <div class="row justify-content-center text-center" id="artikel-container">
            <?php if (!empty($data['hasilPencarian'])): ?>
                <?php foreach ($data['hasilPencarian'] as $artikel): ?>
                    <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow-sm border-0 h-100">
                            <img src="<?= base_url('uploads/upload_artikel/' . $artikel['foto_artikel']) ?>" class="card-img-top" alt="<?= esc($artikel['judul_artikel']) ?>">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <p class="text-muted small"><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($artikel['created_at'])) ?></p>
                                <h5 class="card-title font-weight-bold"><?= esc($artikel['judul_artikel']) ?></h5>
                                <p class="card-text"><?= character_limiter(strip_tags($artikel['deskripsi_artikel']), 100) ?></p>
                                <a href="/artikel/<?= esc($artikel['slug']) ?>" class="btn btn-gold btn-block mt-3">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada artikel yang ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</section>









<!-- artikel css -->
<style>
    .artikel-section {
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

    .artikel-section h2 {
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

    .artikel-section p {
        font-size: 1.2rem;
        color: #FFFFFF;
    }
</style>

<!-- css for blog-section -->
<style>
    /* Blog Section */
    .blog-section {
        padding: 50px 0;
        background-color: #FFFFFF;
        /* Warna background */
    }

    .blog-section .sec-title h2 {
        color: #87D5C8;
        /* Warna teks judul */
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .blog-section .sec-title mark {
        background-color: transparent;
        /* Menghilangkan background mark */
        color: #87D5C8;
        /* Warna teks dalam mark */
    }

    .blog-section .separator {
        display: inline-block;
        height: 4px;
        width: 80px;
        background-color: #87D5C8;
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
        color: #87D5C8;
        font-size: 1.1rem;
        text-decoration: none;
    }

    .view-all-info:hover {
        color: #FFD700;
    }

    .search-bar {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-bar {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #search-input {
        width: 50%;
        padding: 10px;
        font-size: 16px;
        border: 2px solid #87D5C8;
        border-radius: 5px;
        margin-right: 10px;
    }

    #search-button {
        background-color: #336E64FF;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    #search-button i {
        font-size: 18px;
    }

    #search-button:hover {
        background-color: #6ABDAA;
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

<?= $this->endsection('content'); ?>