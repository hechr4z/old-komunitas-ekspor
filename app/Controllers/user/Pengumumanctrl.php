<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\PengumumanModels;
use App\Models\DPDModels;
use App\Models\KategoriVideoModels;
use App\Models\MemberModels;
use App\Models\VideoPembelajaranModels;

class Pengumumanctrl extends BaseController
{
    private $PengumumanModels;
    private $DPDModels;
    private $kategoriVideoModel;

    public function __construct()
    {
        $this->PengumumanModels = new PengumumanModels();
        $this->kategoriVideoModel = new KategoriVideoModels();
    }

    public function index()
    {
                // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
                return redirect()->to(base_url('login')); 
                // Ubah 'login' sesuai dengan halaman login Anda
        }
        $tanggal_hari_ini = date('Y-m-d');

        // Ambil data pengumuman dengan tanggal mulai yang lebih besar atau sama dengan tanggal hari ini
        $pengumuman_terdekat = $this->PengumumanModels->where('akhir_pengumuman >=', $tanggal_hari_ini)->findAll();

        $data = [
            'pengumuman' => $pengumuman_terdekat,
            'videoCategories' => $this->kategoriVideoModel->findAll()
        ];

        return view('user/pengumuman/index', $data);
    }

    public function viewpengumuman($id_pengumuman)
    {
                // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
                return redirect()->to(base_url('login')); 
                // Ubah 'login' sesuai dengan halaman login Anda
        }
        $data = [
            'pengumuman' => $this->PengumumanModels->find($id_pengumuman),
    
            'videoCategories' => $this->kategoriVideoModel->findAll()
        ];


        return view('user/pengumuman/detail', $data);
    }

    public function members()
    {
        $memberModel = new MemberModels();
        $data['members'] = $memberModel->findAll();
        $data['videoCategories'] = $this->kategoriVideoModel->findAll();
        
        return view('user/members', $data);
    }

    public function videoCategories()
    {
        $videoModel = new VideoPembelajaranModels();
        
        $data['videoCategories'] = $this->kategoriVideoModel->findAll();
        $data['videos'] = $videoModel->getAllVideosWithCategory();
        
        return view('user/video_categories', $data);
    }
}