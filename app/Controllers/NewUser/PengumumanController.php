<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\MetaModel;
use App\Models\PengumumanModels;

class PengumumanController extends BaseController
{
    public function pengumuman()
    {
        helper('text'); // Load text helper if needed

        $pengumumanModel = new PengumumanModels();
        $today = date('Y-m-d'); // Get today's date

        // Fetch active announcements for today with a limit
        $activePengumuman = $pengumumanModel->getHomePengumuman($today);

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Informasi/Pengumuman')->first();
        $canonicalUrl = base_url('pengumuman');

        return $this->render('NewUser/pengumuman/index', [
            'activePengumuman' => $activePengumuman,
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }


    public function all()
    {
        helper('text');
        $pengumumanModel = new PengumumanModels();
        $today = date('Y-m-d'); // Get today's date
        // Get all pengumuman

        $activePengumuman = $pengumumanModel->getHomePengumumanAll($today);

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Informasi/Pengumuman')->first();
        $canonicalUrl = base_url('pengumuman');

        // Pass data to the view
        return $this->render('NewUser/pengumuman/index', [
            'activePengumuman' => $activePengumuman,
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }

    public function detail($slug)
    {
        helper('text');

        $model = new PengumumanModels();

        // Fetch the announcement based on slug
        $pengumuman = $model->where('slug', $slug)->first();

        if (!$pengumuman) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengumuman tidak ditemukan');
        }

        // Fetch 3 random recommended announcements
        $recommendedPengumuman = $model->orderBy('RAND()')->findAll(3);

        return $this->render('NewUser/pengumuman/detail', [
            'title' => 'Detail Pengumuman',
            'pengumuman' => $pengumuman,
            'recommendedPengumuman' => $recommendedPengumuman
        ]);
    }
}
