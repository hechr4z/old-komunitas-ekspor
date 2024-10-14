<?php
// Mendapatkan URL segmen pertama untuk menentukan halaman aktif
$uri = service('uri');
$segment = $uri->getSegment(1);
$session = session(); // Start the session to access user data
$loggedIn = $session->get('logged_in');
$username = $session->get('username'); // Get the logged-in user's name
?>

<nav class="navbar navbar-expand-lg bg-light sticky-top" style="padding: 15px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" style="margin-left: 40px; margin-right: 100px;">
            <img src="<?= base_url('assets-new/images/logo.png') ?>" alt="Logo" style="height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($segment == 'index' || $segment == '') ? 'active' : ''; ?>" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($segment == 'about') ? 'active' : ''; ?>" href="/about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($segment == 'artikel') ? 'active' : ''; ?>" href="/artikel" id="artikel-link">Artikel</a>
                </li>
                <li class="nav-item dropdown <?= ($segment == 'materi-pembelajaran') ? 'active' : ''; ?>">
                    <a class="nav-link px-3 <?= ($segment == 'video') ? 'active' : ''; ?>" href="/video">
                        Materi Pembelajaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($segment == 'pendaftaran_member') ? 'active' : ''; ?>" href="/pendaftaran_member" id="pendaftaran_member-link">Cara Pendaftaran</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 <?= ($segment == 'Informasi' || $segment == 'pengumuman' || $segment == 'berita') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?= ($segment == 'pengumuman') ? 'active' : ''; ?>" href="/pengumuman">Pengumuman</a></li>
                        <li><a class="dropdown-item <?= ($segment == 'berita') ? 'active' : ''; ?>" href="/berita">Berita</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($segment == 'kontak') ? 'active' : ''; ?>" href="/kontak" id="kontak-link">Kontak</a>
                </li>
            </ul>

            <!-- User Dropdown or Login Button -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if ($username): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> <!-- User icon -->
                            <?= $username ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if ($loggedIn && $session->get('role') == 'admin'): ?>
                                <li><a class="dropdown-item" href="<?= base_url('admin/dashboard') ?>">Tampilan Admin</a></li>
                                <li><a class="dropdown-item" href="?view=member">Tampilan Member</a></li>
                                <li><a class="dropdown-item" href="?view=nonmember">Tampilan Non Member</a></li>
                            <?php endif; ?>

                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="<?= base_url('login') ?>" style="background-color: #87D5C8 !important; border-color: #87D5C8 !important;">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>