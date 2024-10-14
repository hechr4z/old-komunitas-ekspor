<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\MemberModels;
use App\Models\DPDModels;
use App\Models\DPCModels;
use App\Models\KategoriVideoModels;
use App\Models\VideoPembelajaranModels;

class Memberctrl extends BaseController
{
    private $MemberModels;
    private $kategoriVideoModel;
    private $DPDModels;
    private $DPCModels;

    public function __construct()
    {
        $this->MemberModels = new MemberModels();
        $this->DPDModels = new DPDModels();
        $this->DPCModels = new DPCModels();
        $this->kategoriVideoModel = new KategoriVideoModels();
    }

    // protected $filters = ['usersAuth'];

    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
                return redirect()->to(base_url('login')); 
                // Ubah 'login' sesuai dengan halaman login Anda
        }
        $today = date('Y-m-d');

        $data = [
            'member' => $this->MemberModels->getMemberUser(),
            'dpd' => $this->DPDModels->findAll(), // Pastikan ini ada
            'dpc' => $this->DPCModels->findAll(),
            'videoCategories' => $this->kategoriVideoModel->findAll()
        ];

        // print_r($data);
        // die;

        return view('user/member/index', $data);
    }
    
    public function indexdpd($id_dpd)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
                return redirect()->to(base_url('login')); 
                // Ubah 'login' sesuai dengan halaman login Anda
        }
        $today = date('Y-m-d');

        $data = [
            'member' => $this->MemberModels->getMembersByDPD($id_dpd),
            'dpd' => $this->DPDModels->findAll(), // Pastikan ini ada
            'dpc' => $this->DPCModels->where('id_dpd', $id_dpd)->get()->getResult(),
            'videoCategories' => $this->kategoriVideoModel->findAll()
        ];

        // print_r($data['dpc']);
        // die;

        return view('user/member/index', $data);
    }
    
    public function viewMember($id_member, $slug)
	{
                // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
                return redirect()->to(base_url('login')); 
                // Ubah 'login' sesuai dengan halaman login Anda
        }
        $detail_member = $this->MemberModels->getDetailMember($id_member, $slug);

        // Tambah jumlah views
        // $this->MemberModels->incrementViews($id_member);
        
        $data = [
            'member' => $detail_member[0],
            'member_lain' => $this->MemberModels->getMemberLainnya($id_member, 4),
            'dpd' => $this->DPDModels->findAll(), // Pastikan ini ada
            'videoCategories' => $this->kategoriVideoModel->findAll()
        ];

        // tampilkan 404 error jika data tidak ditemukan
		if (!$data['member']) {
			throw PageNotFoundException::forPageNotFound();
		}
        // var_dump($data);
        

		return view('user/member/detail', $data);
	}
	
	public function search()
    {
        $dpc = $this->request->getGet('dpc');
        $search = $this->request->getGet('search');
    
        // Lakukan pencarian ke database dengan menggunakan model
        $data = [
            'member' => $this->MemberModels->searchMember($dpc, $search),
            'dpd' => $this->DPDModels->findAll(), // Pastikan ini ada
            'dpc' => $this->DPCModels->findAll(),
            'videoCategories' => $this->kategoriVideoModel->findAll()
        ];
    
        // Kirim data hasil pencarian ke tampilan yang sesuai (misalnya, halaman home)
        return view('user/member/index', $data);
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

    public function redirectToHome()
    {
        return redirect()->to('/');
    }
}