<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- pengumuman section start -->
<section class="pengumuman-section">
    <div class="container">
        <h2>Pengumuman</h2>
        <p>Tetap up-to-date dengan pengumuman terbaru dari kami, <br>jangan lewatkan informasi penting yang mungkin berdampak pada kamu.</p>
    </div>
</section>  
<!-- pengumuman section end -->

<!-- pengumuman-list-section start -->
<section class="pengumuman-list-section">
    <div class="container">
        <div class="row justify-content-center text-center" id="pengumuman-container">
            <!-- Initial pengumuman -->
            <?php foreach ($activePengumuman as $item): ?>
                <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-sm border-0 h-100">
                        <!-- Gambar pengumuman -->

                        <img src="<?= base_url('uploads/foto_pengumuman/' . $item['poster_pengumuman']) ?>" class="card-img-top" alt="<?= esc($item['judul_pengumuman']) ?>">

                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title font-weight-bold"><?= esc($item['judul_pengumuman']) ?></h5>
                            <p class="card-text"><?= character_limiter(strip_tags($item['deskripsi_pengumuman']), 100) ?></p>
                            <p class="text-muted small"><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($item['mulai_pengumuman'])) ?></p>
                            <a href="/pengumuman/<?= esc($item['slug']) ?>" class="btn btn-gold btn-block mt-3">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <?php if (current_url() !== site_url('pengumuman/all')): ?>
            <div class="text-center mt-4">
                <a href="/pengumuman/all" class="view-all-info" style="font-weight: bold">
                    Tampilkan Lebih Banyak <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- pengumuman-list-section end -->

<!-- css for pengumuman-section -->
<style>
    /* Pengumuman Section */
    .pengumuman-list-section {
        padding: 50px 0;
        background-color: #FFFFFF;
        /* Warna background */
    }

    .pengumuman-list-section .sec-title h2 {
        color: #87D5C8;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .pengumuman-list-section .card {
        transition: all 0.3s ease-in-out;
    }

    .pengumuman-list-section .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .pengumuman-list-section .card-title {
        color: #333;
        font-size: 1.25rem;
        margin-top: 10px;
    }

    .pengumuman-list-section .card-text {
        color: #555;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .pengumuman-list-section .btn-gold {
        background-color: #FFD700;
        color: #333;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .pengumuman-list-section .btn-gold:hover {
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
        .pengumuman-list-section .card-title {
            font-size: 1.15rem;
        }

        .pengumuman-list-section .card-text {
            font-size: 0.9rem;
        }

        .pengumuman-list-section .btn-gold {
            font-size: 0.9rem;
        }
    }
</style>

<!-- pengumuman css -->
<style>
    .pengumuman-section {
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

    .pengumuman-section h2 {
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

    .pengumuman-section p {
        font-size: 1.2rem;
        color: #FFFFFF;
    }
</style>
<?= $this->endsection('content'); ?>