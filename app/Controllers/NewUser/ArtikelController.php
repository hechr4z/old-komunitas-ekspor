<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\ArtikelModel;
use App\Models\MetaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ArtikelController extends BaseController
{
    public function artikel()
    {
        helper('text');

        $artikelModel = new ArtikelModel();
        // Define the number of articles to display initially
        $initialLimit = 3;

        // Get all articles
        $allArtikel = $artikelModel->orderBy('created_at', 'desc')->findAll();

        // Get only the first 3 articles for initial display
        $initialArtikel = array_slice($allArtikel, 0, $initialLimit);

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Artikel')->first();
        $canonicalUrl = base_url('artikel');

        return $this->render('NewUser/artikel/index', [
            'initialArtikel' => $initialArtikel,
            'allArtikel' => $allArtikel,
            'initialLimit' => $initialLimit,
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }

    public function all()
    {
        helper('text');
        $model = new ArtikelModel();

        // Get all articles
        $allArtikel = $model->orderBy('created_at', 'desc')->findAll();

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Artikel')->first();
        $canonicalUrl = base_url('artikel');

        // Pass data to the view
        return $this->render('NewUser/artikel/index', [
            'initialArtikel' => $allArtikel,
            'allArtikel' => $allArtikel,
            'initialLimit' => count($allArtikel),
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }

    public function detail($slug)
    {
        helper('text');

        $model = new ArtikelModel();

        // Fetch the article based on slug
        $artikel = $model->where('slug', $slug)->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        // Fetch 3 random recommended articles
        $recommendedArticles = $model->orderBy('RAND()')->findAll(3);

        //SEO

        $canonicalUrl = base_url('artikel/' . $artikel['slug']);

        return $this->render('NewUser/artikel/detail', [
            'title' => 'Detail Artikel',
            'artikel' => $artikel,
            'recommendedArticles' => $recommendedArticles,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }


    public function search()
    {
        helper('text');
        // Ambil kata kunci dari query string
        $keyword = $this->request->getGet('keyword');

        // Load model artikel
        $artikelModel = new ArtikelModel();

        // Query untuk mencari artikel berdasarkan keyword
        $hasilPencarian = $artikelModel->like('judul_artikel', $keyword)
            ->orLike('tags', $keyword)
            ->findAll();

        // Cek apakah ada hasil pencarian
        if (count($hasilPencarian) > 0) {
            $data = [
                'keyword' => $keyword,
                'hasilPencarian' => $hasilPencarian,
            ];
        } else {
            $data = [
                'keyword' => $keyword,
                'hasilPencarian' => [],
                'pesan' => 'Tidak ada artikel yang ditemukan untuk "' . esc($keyword) . '".'
            ];
        }

        return $this->render('NewUser/artikel/search', [
            'data' => $data
        ]);
    }
}
