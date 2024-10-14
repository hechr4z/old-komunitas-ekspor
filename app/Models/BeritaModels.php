<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModels extends Model
{
    protected $table = "tb_berita";
    protected $primaryKey = "id_berita";
    protected $returnType = "object";
    protected $allowedFields = ['id_berita', 'judul_berita', 'poster_berita', 'deskripsi_berita', 'mulai_berita', 'akhir_berita', 'slug'];


    public function getberita()
    {
        return $this->db->table('tb_berita');
    }

    public function getHomeberita($today)
    {
        return $this->db->table('tb_berita')
            ->where('mulai_berita <=', $today)
            ->where('akhir_berita >=', $today)
            // ->where('mulai_promo >=', date('Y-m-d', strtotime('-7 days', strtotime($today))))
            // ->where('akhir_promo <=', date('Y-m-d', strtotime('+7 days', strtotime($today))))    
            // ->orderBy('RAND()')
            ->limit(3)
            ->get()
            ->getResultArray();
    }

    public function getHomeBeritaAll($today)
    {
        return $this->db->table('tb_berita')
            ->where('mulai_berita <=', $today)
            ->where('akhir_berita >=', $today)
            // ->where('mulai_promo >=', date('Y-m-d', strtotime('-7 days', strtotime($today))))
            // ->where('akhir_promo <=', date('Y-m-d', strtotime('+7 days', strtotime($today))))    
            // ->orderBy('RAND()')
            ->get()
            ->getResultArray();
    }
}
