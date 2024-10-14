<?php

namespace App\Models;

use CodeIgniter\Model;

class TentangModels extends Model
{
    protected $table            = 'tb_tentang';
    protected $primaryKey       = 'id_tentang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_tentang',
        'visi',
        'misi',
        'deskripsi_tentang',
        'video_tentang',
        'logo',
        'favicon',
        'copyright',
    ];
}
