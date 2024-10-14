<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModels extends Model
{
    protected $table = "tb_pengumuman";
    protected $primaryKey = "id_pengumuman";
    protected $returnType = "object";
    protected $allowedFields = ['id_pengumuman', 'judul_pengumuman', 'poster_pengumuman', 'deskripsi_pengumuman', 'mulai_pengumuman', 'akhir_pengumuman', 'slug'];


    public function getPengumuman()
    {
         return $this->db->table('tb_pengumuman');  
    }

    public function getHomePengumuman($today)
    {
        return $this->db->table('tb_pengumuman')
            ->where('mulai_pengumuman <=', $today)
            ->where('akhir_pengumuman >=', $today)
            // ->where('mulai_promo >=', date('Y-m-d', strtotime('-7 days', strtotime($today))))
            // ->where('akhir_promo <=', date('Y-m-d', strtotime('+7 days', strtotime($today))))    
            // ->orderBy('RAND()')
            ->limit(3)
            ->get()
            ->getResultArray();
    }
    
    public function getHomePengumumanAll($today)
    {
        return $this->db->table('tb_pengumuman')
            ->where('mulai_pengumuman <=', $today)
            ->where('akhir_pengumuman >=', $today)
            // ->where('mulai_promo >=', date('Y-m-d', strtotime('-7 days', strtotime($today))))
            // ->where('akhir_promo <=', date('Y-m-d', strtotime('+7 days', strtotime($today))))    
            // ->orderBy('RAND()')
            ->get()
            ->getResultArray();
    }
}
