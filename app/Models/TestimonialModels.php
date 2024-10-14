<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModels extends Model
{
    protected $table = 'tb_testimonial';
    protected $primaryKey = 'id_testimonial';
    protected $allowedFields = ['nama_member', 'jabatan_testimonial', 'deskripsi_testimonial', 'foto_testimonial'];

    // Tambahkan fungsi untuk menyimpan gambar
    public function saveIcon($data)
    {
        if (isset($data['foto_testimonial']) && $data['foto_testimonial']->isValid()) {
            $iconName = $data['foto_testimonial']->getRandomName();
            $data['foto_testimonial']->move('uploads/icons/', $iconName);
            $data['foto_testimonial'] = $iconName;
        }
        return $this->save($data);
    }

    public function getAllTestimonial()
    {
        return $this->findAll();
    }
}