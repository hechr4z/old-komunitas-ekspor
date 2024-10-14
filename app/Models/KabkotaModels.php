<?php

namespace App\Models;

use CodeIgniter\Model;

class KabkotaModels extends Model
{
    protected $table = "tb_kabkota";
    protected $primaryKey = "id_kabkota";
    protected $returnType = "object";
    protected $allowedFields = ['id_kabkota', 'id_provinsi', 'nama_kabkota', 'wilayah_kerja_kabkota'];

    public function getKabkota()
    {
         return $this->db->table('tb_kabkota')->get()->getResultArray();  
    }
    
    public function getKabkotaAdmin()
    {
         return $this->db->table('tb_kabkota')
         ->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_kabkota.id_provinsi')
         ->orderBy('id_kabkota', 'desc')
         ->get()->getResultArray();  
    }
}