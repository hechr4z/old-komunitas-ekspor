<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\KategoriVideoModels;
use App\Models\MetaModel;
use App\Models\VideoPembelajaranModels;

class VideoController extends BaseController
{
    protected $kategoriVideoModels;
    protected $videoPembelajaranModels;

    public function __construct()
    {
        parent::__construct();

        $this->kategoriVideoModels = new KategoriVideoModels();
        $this->videoPembelajaranModels = new VideoPembelajaranModels();
    }

    public function index()
    {
        $kategoriVideoModels = $this->kategoriVideoModels->findAll();
        $videoPembelajaranModels = $this->videoPembelajaranModels->findAll();

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Materi Pembelajaran')->first();
        $canonicalUrl = base_url('about');

        return $this->render('NewUser/materi-pembelajaran/index', [
            'kategoriVideoModels' => $kategoriVideoModels,
            'videoPembelajaranModels' => $videoPembelajaranModels,
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }

    public function categoryDetails($slug)
    {
        // Fetch the category using slug instead of the ID
        $data['selectedCategory'] = $this->kategoriVideoModels
            ->where('slug', $slug)
            ->first();

        // Fetch the videos for this category
        if ($data['selectedCategory']) {
            $data['videos'] = $this->videoPembelajaranModels
                ->where('id_katvideo', $data['selectedCategory']->id_katvideo)
                ->findAll();
        } else {
            $data['videos'] = [];
        }

        return $this->render('NewUser/materi-pembelajaran/index_category', $data);
    }

    public function detail($slug)
    {
        // Fetch the video by its slug
        $video = $this->videoPembelajaranModels->getVideoWithCategory($slug);

        // Ensure the video exists before proceeding
        if (!$video) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Video not found.');
        }

        // Fetch related videos in the same category, excluding the current video by its ID
        $related_videos = $this->videoPembelajaranModels->getRelatedVideos($video->id_video, $video->id_katvideo);

        // Limit the related videos to 4 and shuffle them
        $related_videos = array_slice($related_videos, 0, 4); // Limit to 4 videos
        shuffle($related_videos); // Shuffle to ensure randomness

        // Pass data to the view
        return $this->render('NewUser/materi-pembelajaran/detail', [
            'video' => $video,
            'related_videos' => $related_videos
        ]);
    }
}
