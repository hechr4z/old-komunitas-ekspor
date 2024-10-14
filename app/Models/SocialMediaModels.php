<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialMediaModels extends Model
{
    protected $table = 'tb_sosmed';
    protected $primaryKey = 'id_sosmed';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['icon_sosmed', 'link_sosmed', 'nama_sosmed'];


    public function getSocialMedia()
    {
        return $this->db->table('tb_sosmed')->get()->getResultArray();
    }
}
