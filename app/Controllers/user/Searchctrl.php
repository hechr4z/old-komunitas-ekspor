<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\KategoriModel;
use App\Models\ArtikelModel;

class searchctrl extends BaseController
{
    private $KategoriModel;
    private $ArtikelModel;
    

    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
        $this->ArtikelModel = new ArtikelModel();
    }

    public function search()
    {
        $keyword = $this->request->getGet('q');

        // Lakukan pencarian ke database dengan menggunakan model
        $data = [
            'kategori' => $this->KategoriModel->getKategori(),
            'artikel' => $this->ArtikelModel->searchArtikel($keyword),
        ];

        // Kirim data hasil pencarian ke tampilan yang sesuai (misalnya, halaman home)
        return view('user/search', $data);
    }
}