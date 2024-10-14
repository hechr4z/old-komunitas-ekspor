<?php

namespace App\Models;

use CodeIgniter\Model;

class FounderModels extends Model
{
    protected $table = 'tb_founder';
    protected $primaryKey = 'id_founder';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_founder', 'foto_founder','jabatan_founder', 'deskripsi_founder'];

    public function getAllFounders()
    {
        return $this->findAll();
    }
}
