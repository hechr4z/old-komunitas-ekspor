<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MPI - Member PRIBADI Indonesia</title>
    <!-- Favicon -->
    <link href="<?= base_url('/asset-user/images/Favicon_PRIBADI-Indonesia_20012024041928.jpeg') ?>" rel="icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets-baru') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets-baru') ?>/css/style.css" rel="stylesheet">

    <script src="https://unpkg.com/lazysizes@5.3.2/lazysizes.js"></script>
    <script src="<?= base_url('assets/js/tinymce.min.js') ?>"></script>
    <script>
    tinymce.init({
        selector: 'textarea.tiny',
        plugins: 'powerpaste advcode table lists checklist link image media',
        toolbar: 'undo redo | blocks | bold italic | bullist numlist checklist | code | table | link image media'
    });
    </script>
</head>

<body>
    <!-- Topbar Start -->
    <?= $this->include('user/layout/header'); ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?= $this->include('user/layout/nav'); ?>
    <!-- Navbar End -->


   
    <?= $this->renderSection('content'); ?>
    <!-- Main News Slider Start -->

    <!-- Main News Slider End -->


    <!-- Breaking News Start -->

    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->

    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->

    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <?= $this->include('user/layout/footer');  ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <div class="floating-container">
        <a href="https://wa.me/+6282142537231" target="">
            <img src="<?= base_url('assets-baru/img/whatsapp.png'); ?>" alt="Whatsapp" style="width: 60px; height:60px; padding: 10px; transition: background-color 0.3s ease-in-out;">
        </a>
    </div>
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets-baru') ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url('assets-baru') ?>/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('assets-baru') ?>/js/main.js"></script>
   <!-- Tambahkan script berikut di bagian bawah halaman Anda, setelah memuat jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Fungsi untuk menandai tautan sebagai aktif berdasarkan data-page
    function markLinkAsActive(page) {
        // Dapatkan semua tautan dalam menu
        var menuLinks = $(".navbar-nav a");

        // Hapus kelas "active" dari semua tautan
        menuLinks.removeClass("active");

        // Temukan tautan yang sesuai dengan data-page dan tambahkan kelas "active" ke elemen <li> terkait
        var linkToMark = $(".navbar-nav").find('[data-page="' + page + '"]');
        linkToMark.addClass("active");
    }

    // Panggil fungsi markLinkAsActive dengan data-page yang sesuai saat dokumen dimuat
    $(document).ready(function() {
        // Ambil URL halaman saat ini
        var currentURL = window.location.pathname;

        // Tentukan halaman saat ini berdasarkan URL
        var currentPage = 'pengumuman'; // Default: 'home'

        if (currentURL === window.location.origin + '/') {
            currentPage = 'pengumuman';
        } else if (currentURL.includes('/member')) {
            currentPage = 'member';
        } else if (currentURL.includes('/admin')) {
            currentPage = 'admin';
        } else if (currentURL.includes('/profil')) {
            currentPage = 'profil';
        }

        // Panggil fungsi markLinkAsActive dengan currentPage saat dokumen dimuat
        markLinkAsActive(currentPage);
    });
</script>

</body>

</html>