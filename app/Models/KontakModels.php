<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModels extends Model
{
    protected $table = 'tb_kontak';
    protected $primaryKey = 'id_kontak';
    protected $allowedFields = ['deskripsi', 'kontak', 'email', 'no_hp', 'alamat', 'embed_code'];
}