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
          <?php if (!$loggedIn || $session->get('role') != 'user'): ?>
            <a class="nav-link px-3 <?= ($segment == 'index' || $segment == '') ? 'active' : ''; ?>" href="/">Beranda</a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <?php if (!$loggedIn || $session->get('role') != 'user'): ?>
            <a class="nav-link px-3 <?= ($segment == 'about') ? 'active' : ''; ?>" href="/about">Tentang Kami</a>
          <?php endif; ?>
        </li>
        <?php if ($loggedIn && ($session->get('role') == 'user' || $session->get('role') != 'admin')): ?>
          <li class="nav-item">
            <a class="nav-link px-3 <?= ($segment == 'pengumuman') ? 'active' : ''; ?>" href="/pengumuman" id="Pengumuman-link">Pengumuman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3 <?= ($segment == 'Seo-Checker') ? 'active' : ''; ?>" href="/Seo-Checker" id="Seo-Checker-link">Seo-Checker</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link px-3 <?= ($segment == 'artikel') ? 'active' : ''; ?>" href="/artikel" id="artikel-link">Artikel</a>
        </li>
        <li class="nav-item dropdown <?= ($segment == 'materi-pembelajaran') ? 'active' : ''; ?>">
          <?php if ($loggedIn): ?>
            <a class="nav-link dropdown-toggle px-3" <?= ($segment == 'video') ? 'active' : ''; ?> href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Materi Pembelajaran
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/video">Video Pembelajaran</a></li>
              <?php if (!empty($categories)): ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php foreach ($categories as $category): ?>
                  <li><a class="dropdown-item" href="<?= base_url('/video/kategori/' . $category->slug) ?>"><?= esc($category->nama_kategori_video) ?></a></li>
                <?php endforeach; ?>
              <?php else: ?>
                <li><a class="dropdown-item" href="#">No Categories Available</a></li>
              <?php endif; ?>
            </ul>
          <?php else: ?>
            <a class="nav-link px-3 <?= ($segment == 'video') ? 'active' : ''; ?>" href="/video">
              Materi Pembelajaran
            </a>
          <?php endif; ?>
        </li>
        <li class="nav-item dropdown <?= ($segment == 'member') ? 'active' : ''; ?>">
          <?php if ($loggedIn): ?>
            <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Member
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= base_url('/member') ?>">All Members</a></li>
              <?php if (!empty($provinsi)): ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php foreach ($provinsi as $province): ?>
                  <li><a class="dropdown-item" href="<?= base_url('/member/provinsi/' . $province->id_provinsi) ?>"><?= esc($province->nama_provinsi) ?></a></li>
                <?php endforeach; ?>
              <?php else: ?>
                <li><a class="dropdown-item" href="#">Tidak ada Provinsi</a></li>
              <?php endif; ?>
            </ul>
          <?php else: ?>
            <a class="nav-link px-3" href="<?= base_url('/member') ?>">
              Member
            </a>
          <?php endif; ?>
        </li>

        <?php if ($loggedIn && ($session->get('role') == 'user' || $session->get('role') != 'admin')): ?>
          <li class="nav-item">
            <a class="nav-link px-3 <?= ($segment == 'berita') ? 'active' : ''; ?>" href="/berita" id="berita-link">Berita</a>
          </li>
        <?php endif; ?>

        <li class="nav-item dropdown <?= ($segment == 'Aplikasi') ? 'active' : ''; ?>">
          <?php if ($loggedIn): ?>
            <a class="nav-link dropdown-toggle px-3" <?= ($segment == 'Aplikasi') ? 'active' : ''; ?> href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Aplikasi
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/content-calendar">Content Calendar</a></li>
              <li><a class="dropdown-item" href="/hashtag">Hashtag Generator</a></li>
            </ul>
          <?php endif; ?>
        </li>

        <li class="nav-item">
          <?php if (!$loggedIn || $session->get('role') != 'user'): ?>
            <a class="nav-link px-3 <?= ($segment == 'cara-pendaftaran') ? 'active' : ''; ?>" href="/cara-pendaftaran" id="cara-pendaftaran-link">Cara Pendaftaran</a>
          <?php endif; ?>
        </li>
        <?php if (!$loggedIn || $session->get('role') != 'user'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle px-3 <?= ($segment == 'Informasi' || $segment == 'pengumuman' || $segment == 'berita') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Informasi
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item <?= ($segment == 'pengumuman') ? 'active' : ''; ?>" href="/pengumuman">Pengumuman</a></li>
              <li><a class="dropdown-item <?= ($segment == 'berita') ? 'active' : ''; ?>" href="/berita">Berita</a></li>
            </ul>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <?php if (!$loggedIn || $session->get('role') != 'user'): ?>
            <a class="nav-link px-3 <?= ($segment == 'kontak') ? 'active' : ''; ?>" href="/kontak" id="kontak-link">Kontak</a>
          <?php endif; ?>
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
              <?php if ($loggedIn && ($session->get('role') == 'admin' || $session->get('role') != 'user')): ?>
                <li><a class="dropdown-item" href="<?= base_url('admin/dashboard') ?>">Tampilan Admin</a></li>
              <?php endif; ?>
              <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="btn btn-primary" #87D5C8 href="<?= base_url('login') ?>">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>