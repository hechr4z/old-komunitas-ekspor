<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranMemberModels extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_member'; // Nama tabel di database
    protected $primaryKey       = 'id_member'; // Primary key

    // Field yang dapat diisi ke tabel
    protected $allowedFields = [
        'role',
        'username',
        'password',
        'nama_member',
        'id_provinsi', // Updated field
        'id_kabkota',  // Updated field
        'status_kepengurusan',
        'alamat_member',
        'no_hp_member',
        'email_member',
        'ig_member',
        'fb_member',
        'pendidikan_member',
        'pekerjaan_member',
        'sertifikasi_member',
        'jenis_kelamin',
        'foto_member',
        'cv_member',
        'slug'
    ];

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Dates
    protected $useTimestamps = false; // Ubah ke true jika ingin menggunakan timestamps
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Fungsi untuk hash password sebelum insert
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        }
        return $data;
    }
}