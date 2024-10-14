<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\KategoriVideoModels;
use App\Models\VideoPembelajaranModels;
use App\Models\MemberModels;
use App\Models\DPDModels;


class Videocategoriesctrl extends BaseController
{
    protected $kategoriVideoModel;
    protected $videoModel;
    private $memberModels;
    private $DPDModels;

    public function __construct()
    {
        $this->kategoriVideoModel = new KategoriVideoModels();
        $this->videoModel = new VideoPembelajaranModels();
        $this->memberModels = new MemberModels();
        $this->DPDModels = new DPDModels();
    }

    public function index()
    {
        $data['videoCategories'] = $this->kategoriVideoModel->findAll();
        $data['videos'] = $this->videoModel->findAll();
        $data['memberCategories'] = $this->memberModels->findAll(); // Fetch member categories
        $data['dpd'] = $this->DPDModels->findAll(); // Fetch member categories

        return view('user/video/index', $data);
    }

    public function viewCategory($id)
    {
        $data['videoCategories'] = $this->kategoriVideoModel->findAll();
        $data['videos'] = $this->videoModel->where('id_katvideo', $id)->findAll();
        $data['memberCategories'] = $this->memberModels->findAll(); // Fetch member categories
        $data['dpd'] = $this->DPDModels->findAll(); // Fetch member categories

        return view('user/video/index', $data);
    }

    public function viewVideo($id)
    {
        $data['video'] = $this->videoModel->find($id);
        $data['related_videos'] = $this->videoModel->where('id_katvideo', $data['video']['id_katvideo'])->where('id_video !=', $id)->findAll();
        
        return view('user/video/detail', $data);
    }
}