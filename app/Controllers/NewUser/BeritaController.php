<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\BeritaModels;
use App\Models\MetaModel;

class BeritaController extends BaseController
{
    public function berita()
    {
        helper('text');

        $beritaModel = new BeritaModels();
        $today = date('Y-m-d'); // Mengambil tanggal hari ini

        // Ambil berita yang aktif sesuai dengan tanggal hari ini
        $activeBerita = $beritaModel->getHomeBerita($today);

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Informasi/Berita')->first();
        $canonicalUrl = base_url('berita');

        return $this->render('NewUser/berita/index', [
            'activeBerita' => $activeBerita,
            'meta' => $meta,
            '$canonicalUrl' => $canonicalUrl,
        ]);
    }


    public function all()
    {
        helper('text');
        $beritaModel = new BeritaModels();
        $today = date('Y-m-d'); // Get today's date
        // Get all pengumuman

        $activeBerita = $beritaModel->getHomeBeritaAll($today);

         //SEO
         $metaModel = new MetaModel();
         $meta = $metaModel->where('nama_halaman', 'Informasi/Berita')->first();
         $canonicalUrl = base_url('berita');

        // Pass data to the view
        return $this->render('NewUser/berita/index', [
            'activeBerita' => $activeBerita,
            'meta' => $meta,
            '$canonicalUrl' => $canonicalUrl,
        ]);
    }

    public function detail($slug)
    {
        helper('text');

        $beritaModel = new BeritaModels();

        // Fetch the berita based on slug
        $berita = $beritaModel->where('slug', $slug)->first();

        if (!$berita) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan');
        }

        // Fetch 3 random recommended berita
        $recommendedBerita = $beritaModel->orderBy('RAND()')->findAll(3);

        return $this->render('NewUser/berita/detail', [
            'title' => 'Detail Berita',
            'berita' => $berita,
            'recommendedBerita' => $recommendedBerita
        ]);
    }
}
