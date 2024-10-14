<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuntunganModel extends Model
{
    protected $table = 'tb_keuntungan';
    protected $primaryKey = 'id_keuntungan';
    protected $allowedFields = ['judul_keuntungan', 'deskripsi_keuntungan', 'icon_keuntungan'];

    // Tambahkan fungsi untuk menyimpan gambar
    public function saveIcon($data)
    {
        if (isset($data['icon_keuntungan']) && $data['icon_keuntungan']->isValid()) {
            $iconName = $data['icon_keuntungan']->getRandomName();
            $data['icon_keuntungan']->move('uploads/icons/', $iconName);
            $data['icon_keuntungan'] = $iconName;
        }
        return $this->save($data);
    }

    public function getAllKeuntungan()
    {
        return $this->findAll();
    }
}