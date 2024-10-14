<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriVideoModels extends Model
{
    protected $table = 'tb_kategori_video';
    protected $primaryKey = 'id_katvideo';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kategori_video', 'slug'];
    
}