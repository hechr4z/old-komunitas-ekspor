<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\videoPembelajaranModels;
use App\Models\KategoriVideoModels;
use App\Models\MemberModels;
use App\Models\DPDModels;

class Videoctrl extends BaseController
{
    private $videoPembelajaranModels;
    private $kategoriVideoModels;
    private $DPDModels;

    public function __construct()
    {
        $this->videoPembelajaranModels = new videoPembelajaranModels();
        $this->kategoriVideoModels = new KategoriVideoModels();
        $this->DPDModels = new DPDModels();
    }
    public function index()
    {
        $data = [
            'dpd' => $this->DPDModels->findAll(),
            'videoCategories' => $this->kategoriVideoModels->findAll(),
            'videos' => $this->VideoPembelajaranModels->findAll(),
        ];
        return view('user/video/index', $data);
    }
    
    public function indexvideo($id)
    {
        $data = [
            'dpd' => $this->DPDModels->findAll(),
            'videoCategories' => $this->kategoriVideoModel->findAll(),
            'videos' => $this->VideoPembelajaranModel->findAll(),
        ];
        return view('user/video/index', $data);
    }
    
    public function viewindex($id_video)
	{
        $detail_video = $this->VideoPembelajaranModel->getDetailVideo($id_video);
        
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