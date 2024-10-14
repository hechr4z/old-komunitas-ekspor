<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
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

    // Method to list video categories
    public function index()
    {
        $data = [
            'videoCategories' => $this->kategoriVideoModels->findAll(),
            'videos' => $this->videoPembelajaranModels->findAll(),
            'dpd' => $this->DPDModels->findAll(),
        ];

        return view('user/video/index', $data);
    }

    public function detail($id)
    {
        // Fetch the video by ID
        $video = $this->videoPembelajaranModels->getVideoWithCategory($id);

        // Fetch related videos in the same category, excluding the current video
        $related_videos = $this->videoPembelajaranModels->getRelatedVideos($id, $video->id_katvideo);

        // Limit the related videos to 4 and shuffle them
        $related_videos = array_slice($related_videos, 0, 4); // Limit to 4 videos
        shuffle($related_videos); // Shuffle to ensure randomness
        
        // Pass data to the view
        return view('user/video/detail', [
            'video' => $video,
            'related_videos' => $related_videos
        ]);
    }

    
    public function categoryDetails($id_katvideo)
    {
        $data['selectedCategory'] = $this->kategoriVideoModels->find($id_katvideo);
        $data['videos'] = $this->videoPembelajaranModels->where('id_katvideo', $id_katvideo)->findAll();
        return view('user/video/index_category', $data);
    }

    public function videoCategories()
    {
        // Fetch all video categories
        $data['videoCategories'] = $this->kategoriVideoModels->findAll();

        // Load the view with video categories data
        return view('user/layout/nav', $data);
    }
}