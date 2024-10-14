<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoPembelajaranModels extends Model
{
    protected $table = 'tb_video';
    protected $primaryKey = 'id_video';
    protected $returnType = 'object';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'judul_video',
        'video_url',
        'thumbnail',
        'deskripsi_video',
        'id_katvideo',
        'slug'
    ];


    public function getVideoWithCategory($slug)
    {
        return $this->select('tb_video.*, tb_kategori_video.nama_kategori_video, tb_kategori_video.slug as category_slug')
            ->join('tb_kategori_video', 'tb_video.id_katvideo = tb_kategori_video.id_katvideo')
            ->where('tb_video.slug', $slug)
            ->first();
    }



    public function getRelatedVideos($currentVideoId, $categoryId)
    {
        return $this->select('tb_video.*, tb_kategori_video.nama_kategori_video')
            ->join('tb_kategori_video', 'tb_video.id_katvideo = tb_kategori_video.id_katvideo')
            ->where('tb_video.id_katvideo', $categoryId) // Filter by category
            ->where('tb_video.id_video !=', $currentVideoId) // Exclude current video
            ->findAll();
    }



    public function getAllVideosWithCategory()
    {
        return $this->select('tb_video.*, tb_kategori_video.nama_kategori_video')
            ->join('tb_kategori_video', 'tb_kategori_video.id_katvideo = tb_video.id_katvideo', 'left')
            ->findAll();
    }
}
